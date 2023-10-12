<?php

namespace App\Http\Controllers\Cetea;

use App\Http\Controllers\Controller;
use App\Models\Atendimento;
use App\Models\Atendimento_Docs;
use App\Models\HistDes_Anexo3_R18_Docs;
use App\Models\Medico_Terapeuta;
use App\Models\Paciente;
use App\Models\Tipo_Atendimento;
use App\Models\Tratamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AtendimentoController extends Controller
{
    private $atendimento;
    private $medicoterapeuta;
    private $tipoatendimento;
    private $tratamento;
    private $paciente;
    private $arquivoatendimento;
    private $histdes_anexo3_docs;

    public function __construct(Atendimento $atendimento, Medico_Terapeuta $medicoterapeuta,
                                Tipo_Atendimento $tipoatendimento, Tratamento $tratamento, Paciente $paciente,
                                Atendimento_Docs $arquivoatendimento, HistDes_Anexo3_R18_Docs $histdes_anexo3_docs)
    {
        $this->atendimento = $atendimento;
        $this->medicoterapeuta = $medicoterapeuta;
        $this->tipoatendimento = $tipoatendimento;
        $this->tratamento = $tratamento;
        $this->paciente = $paciente;
        $this->arquivoatendimento = $arquivoatendimento;
        $this->histdes_anexo3_docs = $histdes_anexo3_docs;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(is_null($request->pesquisa)){
            $atendimentos = $this->atendimento->orderByDesc('id')->paginate(10);
        }else{
            $query = $this->atendimento->with('paciente')
                                       ->where(strtoupper('paciente.nome'),'LIKE','%'.strtoupper($request->pesquisa).'%');
            $atendimentos = $query->orderByDesc('id')->paginate(10);
        }
        return view('cetea.atendimento.index',[
            'atendimentos' => $atendimentos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = $this->paciente->orderByDesc('id')->get();
        $medicosterapeutas = $this->medicoterapeuta->orderByDesc('id')->get();
        $tratamentos = $this->tratamento->orderByDesc('id')->get();
        $tiposdeatendimento = $this->tipoatendimento->orderByDesc('id')->get();
        return view('cetea.atendimento.create',[
            'pacientes' => $pacientes,
            'medicosterapeuras' => $medicosterapeutas,
            'tratamentos' => $tratamentos,
            'tiposatendimento' => $tiposdeatendimento,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'tipo_atendimento' => ['required'],
            'terapeuta' => ['required'],
            'tratamento' => ['required'],
            'paciente' => ['required'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $user = auth()->user();
            $id = $this->maxId();
            $data['id'] = $id;
            $data['tipo_atendimento_id'] = $request->input('tipo_atendimento');
            $data['medico_terapeuta_id'] = $request->input('terapeuta');
            $data['tratamento_id'] = $request->input('tratamento');
            $data['paciente_id'] = $request->input('paciente');
            $data['responsavel_do_paciente'] = strtoupper($request->input('responsavel_do_paciente'));
            $data['responsavel_parentesco'] = strtoupper($request->input('responsavel_parentesco'));
            if($request->input('tipo_atendimento')==1){ //atendimento no programa
                $data['data_atendimento'] = now(); //atendimento
                $data['data_agendamento'] = null; //outro médico
                $data['data_retorno'] = null; //mesmo médico
            }elseif($request->input('tipo_atendimento')==2){ //retorno
                $data['data_atendimento'] = null; //atendimento
                $data['data_agendamento'] = null; //outro médico
                $data['data_retorno'] = $request->input('data_retorno'); //mesmo médico
            }else{ //  agendamento
                $data['data_atendimento'] = null; //atendimento
                $data['data_agendamento'] = $request->input('data_agendamento');  //outro médico
                $data['data_retorno'] = null; //mesmo médico
            }
            $data['encaminhamento'] = $request->input('encaminhamento');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $atendimento = $this->atendimento->create($data);
            return response()->json([
                'status' => 200,                
            ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $atendimento = $this->atendimento->find($id);        
        $medicosterapeutas = $this->medicoterapeuta->orderByDesc('id')->get();
        $tratamentos = $this->tratamento->orderByDesc('id')->get();
        $tiposdeatendimento = $this->tipoatendimento->orderByDesc('id')->get();
        //levar informações dos atendimentos anteriores?
        return response()->json([
            'status' => 200,
            'atendimento' => $atendimento,
            'medicosterapeutas' => $medicosterapeutas,
            'tratamentos' => $tratamentos,
            'tiposdeatendimento' => $tiposdeatendimento,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(),[
            'tipo_atendimento' => ['required'],
            'terapeuta' => ['required'],
            'tratamento' => ['required'],            
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $atendimento = $this->atendimento->find($id);
            if($atendimento){
            $user = auth()->user();                        
            $data['tipo_atendimento_id'] = $request->input('tipo_atendimento');
            $data['medico_terapeuta_id'] = $request->input('terapeuta');
            $data['tratamento_id'] = $request->input('tratamento');            
            $data['responsavel_do_paciente'] = strtoupper($request->input('responsavel_do_paciente'));
            $data['responsavel_parentesco'] = strtoupper($request->input('responsavel_parentesco'));
            if($request->input('tipo_atendimento')==1){ //atendimento no programa
                $data['data_atendimento'] = now(); //atendimento
                $data['data_agendamento'] = null; //outro médico
                $data['data_retorno'] = null; //mesmo médico
            }elseif($request->input('tipo_atendimento')==2){ //retorno                
                $data['data_agendamento'] = null; //outro médico
                $data['data_retorno'] = $request->input('data_retorno'); //mesmo médico
            }else{ //  agendamento                
                $data['data_agendamento'] = $request->input('data_agendamento');  //outro médico
                $data['data_retorno'] = null; //mesmo médico
            }
            $data['encaminhamento'] = $request->input('encaminhamento');            
            $data['updated_at'] = now();            
            $data['updater_user'] = $user->id;
            $atendimento->update($data);
            return response()->json([
                'status' => 200,                
            ]);

        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Atendimento não localizado!',
            ]);
        }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $atendimento = $this->atendimento->find($id);

        $anamnese_inicial = $atendimento->anamnese_inicial->count();
        $anamnese_hist_pregressa = $atendimento->anamnese_hist_pregressa->count();
        $anamnese_desenvolvimento = $atendimento->anamnese_desenvolvimento->count();
        $histdes_versaopais_inicial = $atendimento->histdes_versaopais_inicial->count();
        $histdes_versaopais_linguagem = $atendimento->histdes_versaopais_linguagem->count();
        $histdes_versaopais_desenvsocial = $atendimento->histdes_versaopais_desenvsocial->count();
        $histdes_versaopais_brincadeiras = $atendimento->histdes_versaopais_brincadeiras->count();
        $histdes_versaopais_comportamentos = $atendimento->histdes_versaopais_comportamentos->count();
        $histdes_versaopais_independencia = $atendimento->histdes_versaopais_independencia->count();
        $histdes_versaopais_desenvmotor = $atendimento->histdes_versaopais_desenvmotor->count();
        $histdes_versaopais_histescolar = $atendimento->histdes_versaopais_histescolar->count();
        $histdes_versaopais_compcasa = $atendimento->histdes_versaopais_compcasa->count();
        $histdes_anexo1_rotalim = $atendimento->histdes_anexo1_rotalim->count();
        $histdes_anexo2_histmedico = $atendimento->histdes_anexo2_histmedico->count();
        $histdes_anexo3_infosensoriais = $atendimento->histdes_anexo3_infosensoriais->count();
        $evolucao = $atendimento->evolucao->count();
        $mchat = $atendimento->mchat->count();
        $atendimentoarqs = $atendimento->arquivos_atendimento->count();

        if($atendimento->tipo_atendimento_id==1){
            if($anamnese_inicial){
                $anam_ini = $atendimento->anamnese_inicial; 
                $atendimento->anamnese_inicial()->detach($anam_ini);
            }
            if($anamnese_hist_pregressa){
                $anam_hist_preg = $atendimento->anamnese_hist_pregressa; 
                $atendimento->anamnese_hist_pregressa()->detach($anam_hist_preg);
            }
            if($anamnese_desenvolvimento){
                $anam_desenv = $atendimento->anamnese_desenvolvimento; 
                $atendimento->anamnese_desenvolvimento()->detach($anam_desenv);
            }
            if($histdes_versaopais_inicial){
                $histdes_vpais_inicial = $atendimento->histdes_versaopais_inicial; 
                $atendimento->histdes_versaopais_inicial()->detach($histdes_vpais_inicial);
            }
            if($histdes_versaopais_linguagem){
                $histdes_vpais_ling = $atendimento->histdes_versaopais_linguagem; 
                $atendimento->histdes_versaopais_linguagem()->detach($histdes_vpais_ling);
            }
            if($histdes_versaopais_desenvsocial){
                $histdes_vpais_dessocial = $atendimento->histdes_versaopais_desenvsocial; 
                $atendimento->histdes_versaopais_desenvsocial()->detach($histdes_vpais_dessocial);
            }
            if($histdes_versaopais_brincadeiras){
                $histdes_vpais_brinc = $atendimento->histdes_versaopais_brincadeiras; 
                $atendimento->histdes_versaopais_brincadeiras()->detach($histdes_vpais_brinc);
            }
            if($histdes_versaopais_comportamentos){
                $histdes_vpais_comp = $atendimento->histdes_versaopais_comportamentos; 
                $atendimento->histdes_versaopais_comportamentos()->detach($histdes_vpais_comp);
            }
            if($histdes_versaopais_independencia){
                $histdes_vpais_indep = $atendimento->histdes_versaopais_independencia; 
                $atendimento->histdes_versaopais_independencia()->detach($histdes_vpais_indep);
            }
            if($histdes_versaopais_desenvmotor){
                $histdes_vpais_desmotor = $atendimento->histdes_versaopais_desenvmotor; 
                $atendimento->histdes_versaopais_desenvmotor()->detach($histdes_vpais_desmotor);
            }
            if($histdes_versaopais_histescolar){
                $histdes_vpais_histesc = $atendimento->histdes_versaopais_histescolar; 
                $atendimento->histdes_versaopais_histescolar()->detach($histdes_vpais_histesc);
            }
            if($histdes_versaopais_compcasa){
                $histdes_vpais_comcasa = $atendimento->histdes_versaopais_compcasa; 
                $atendimento->histdes_versaopais_compcasa()->detach($histdes_vpais_comcasa);
            }
            if($histdes_anexo1_rotalim){
                $histdes_anexo1_ralim = $atendimento->histdes_anexo1_rotalim; 
                $atendimento->histdes_anexo1_rotalim()->detach($histdes_anexo1_ralim);
            }
            if($histdes_anexo2_histmedico){
                $histdes_anexo2_hmed = $atendimento->histdes_anexo2_histmedico; 
                $atendimento->histdes_anexo2_histmedico()->detach($histdes_anexo2_hmed);
            }
            if($histdes_anexo3_infosensoriais){
                $histdes_anexo3_docs = $this->histdes_anexo3_docs->where('hisdes_anexo3_infosensoriais_id','=', $atendimento->histdes_anexo3_infosensoriais->id)->get();
                foreach ($histdes_anexo3_docs as $doc) {
                    //deleção do arquivo na pasta /storage/arquivos_histdesanexo3/
                    if($doc){            
                    $arquivoPath = public_path('/storage/'.$doc->path);
                    if(file_exists($arquivoPath)){
                        unlink($arquivoPath);
                    }    
                    //exclui o registro
                    $arq = HistDes_Anexo3_R18_Docs::find($doc->id);
                    $arq->delete();
                }  
                }              
                $histdes_anexo3_infsens = $atendimento->histdes_anexo3_inforsensoriais; 
                $atendimento->histdes_anexo3_infosensoriais()->detach($histdes_anexo3_infsens);
            }
            if($evolucao){
                $ev = $atendimento->evolucao; 
                $atendimento->evolucao()->detach($ev);
            }
            if($mchat){
                $m = $atendimento->mchat; 
                $atendimento->mchat()->detach($m);
            }
            if($atendimentoarqs){
                $arqs = $atendimento->arquivos_atendimento;
                foreach ($arqs as $arq) {
                //deleção do arquivo na pasta /storage/arquivos_atendimento/
                if($arq){            
                $arquivoPath = public_path('/storage/'.$arq->path);
                if(file_exists($arquivoPath)){
                    unlink($arquivoPath);
                }    
                //exclui o registro
                    $a = Atendimento_Docs::find($arq->id);
                    $a->delete();
                }
                }
            }
            $atendimento->delete();
            return response()->json([
            'status' => 200,
            'message' => 'Atendimento excluído com sucesso!',
            ]);
        }else{
        if($anamnese_inicial || $anamnese_hist_pregressa || $anamnese_desenvolvimento ||
           $histdes_versaopais_inicial || $histdes_versaopais_linguagem || $histdes_versaopais_desenvsocial ||
           $histdes_versaopais_brincadeiras || $histdes_versaopais_comportamentos || $histdes_versaopais_independencia ||
           $histdes_versaopais_desenvmotor || $histdes_versaopais_histescolar || $histdes_versaopais_compcasa ||
           $histdes_anexo1_rotalim || $histdes_anexo2_histmedico || $histdes_anexo3_infosensoriais || 
           $evolucao || $mchat || $atendimentoarqs){
            return response()->json([
                'status' => 400,
                'erros' => 'Este atendimento não pode ser excluído! Pois há outros registros que dependem dele.',
            ]);
           }else{
            $atendimento->delete();
            return response()->json([
            'status' => 200,
            'message' => 'Atendimento excluído com sucesso!',
            ]);
           }           
        }


        
        
    }

    protected function maxId(){
        $atendimento = $this->atendimento->orderByDesc('id')->first();
        if($atendimento){
            $codigo = $atendimento->id;
        }else{
            $codigo = 0;
        }
        return $codigo + 1;
    }


    public function uploadDocs(Request $request, int $id){             
         if ($request->TotalFiles>0) 
         {
           $user = auth()->user();
           $arquivo = $this->arquivoatendimento->orderByDesc('id')->first();
           if($arquivo){
            $maxid = $arquivo->id;
           }else{
            $maxid = 0;
           }

           for($x = 0; $x < $request->TotalFiles; $x++) 
           {                                              
              if($request->hasFile('arquivo'.$x))
              {
                    $file = $request->file('arquivo'.$x);
                    $fileLabel = $file->getClientOriginalName();
                    $fileName = $id.'_'.$fileLabel;                        
                    $filePath = 'arquivos_atendimento/'.$fileName;
                    $storagePath = public_path().'/storage/arquivos_atendimento/';
                    $file->move($storagePath,$fileName);                                                 

                    $maxid++;
                    
                    $data[$x]['id'] = $maxid;                    
                    $data[$x]['paciente_id'] = $id;                    
                    $data[$x]['nome'] = $fileLabel;
                    $data[$x]['nomearq'] = $fileName;
                    $data[$x]['path'] = $filePath;                    
                    $data[$x]['created_at'] = now();
                    $data[$x]['updated_at'] = now();
                    $data[$x]['creater_user'] = $user->id;
                    $data[$x]['updater_user'] = $user->id;
                } 
           }                      
             Atendimento_Docs::insert($data);                                                                  
         }    
             $atendimento = $this->atendimento->find($id);             
             $arquivos = $atendimento->arquivos_atendimento;
             return response()->json([
                 'atendimento' => $atendimento,                 
                 'arquivos' => $arquivos,
                 'status' => 200,                 
             ]);  

    }

    public function deleteDocs(int $id){                
            $arquivo = $this->arquivoatendimento->find($id);    
            $atendimentoid = $arquivo->atendimento_id;
            //deleção do arquivo na pasta /storage/arquivos_atendimento/
            if($arquivo){            
            $arquivoPath = public_path('/storage/'.$arquivo->path);
            if(file_exists($arquivoPath)){
                unlink($arquivoPath);
            }    
        }
            //excluir na tabela                             
            $arquivo->delete();
            $atendimento = $this->atendimento->find($atendimentoid);    
            return response()->json([
                'atendimento' => $atendimento,
                'status' => 200,                
            ]);        
    }

    public function abrirDoc(int $id){
        $arquivo = $this->arquivoatendimento->find($id);
        return response()->json([
            'status' => 200,
            'arquivo' => $arquivo,
        ]);
    }



}
