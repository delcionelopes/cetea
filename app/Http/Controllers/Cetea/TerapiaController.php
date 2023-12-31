<?php

namespace App\Http\Controllers\Cetea;

use App\Http\Controllers\Controller;
use App\Models\Anamnese_Desenvolvimento;
use App\Models\Anamnese_Hist_Pregressa;
use App\Models\Anamnese_Inicial;
use App\Models\Atendimento;
use App\Models\Atendimento_Docs;
use App\Models\Evolucao;
use App\Models\Feriado;
use App\Models\HistDes_Anexo1_RotAlim;
use App\Models\HistDes_Anexo2_HistMedico;
use App\Models\HistDes_Anexo3_InfoSensoriais;
use App\Models\HistDes_Anexo3_R18_Docs;
use App\Models\HistDes_VersaoPais_Brincadeiras;
use App\Models\HistDes_VersaoPais_CompCasa;
use App\Models\HistDes_VersaoPais_Comportamentos;
use App\Models\HistDes_VersaoPais_DesenvMotor;
use App\Models\HistDes_VersaoPais_DesenvSocial;
use App\Models\HistDes_VersaoPais_HistEscolar;
use App\Models\HistDes_VersaoPais_Independencia;
use App\Models\HistDes_VersaoPais_Inicial;
use App\Models\HistDes_VersaoPais_Linguagem;
use App\Models\Medico_Terapeuta;
use App\Models\Paciente;
use App\Models\Tipo_Atendimento;
use App\Models\Tratamento;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TerapiaController extends Controller
{
    private $atendimento;
    private $medicoterapeuta;
    private $tipoatendimento;
    private $tratamento;
    private $paciente;
    private $arquivoatendimento;
    private $histdes_anexo3_docs;

    private $anamnese_inicial;
    private $anamnese_hist_pregressa;
    private $anamnese_desenvolvimento;
    private $histdes_versaopais_inicial;
    private $histdes_versaopais_linguagem;
    private $histdes_versaopais_desenvsocial;
    private $histdes_versaopais_brincadeiras;
    private $histdes_versaopais_comportamentos;
    private $histdes_versaopais_independencia;
    private $histdes_versaopais_desenvmotor;
    private $histdes_versaopais_histescolar;
    private $histdes_versaopais_compcasa;
    private $histdes_anexo1_rotalim;
    private $histdes_anexo2_histmedico;
    private $histdes_anexo3_infosensoriais;
    private $evolucao;

    private $feriado;


    public function __construct(Atendimento $atendimento, Medico_Terapeuta $medicoterapeuta,
                                Tipo_Atendimento $tipoatendimento, Tratamento $tratamento, Paciente $paciente,
                                Atendimento_Docs $arquivoatendimento, HistDes_Anexo3_R18_Docs $histdes_anexo3_docs,
                                Anamnese_Inicial $anamnese_inicial, Anamnese_Hist_Pregressa $anamnese_hist_pregressa,
                                Anamnese_Desenvolvimento $anamnese_desenvolvimento, HistDes_VersaoPais_Inicial $histdes_versaopais_inicial,
                                HistDes_VersaoPais_Linguagem $histdes_versaopais_linguagem, HistDes_VersaoPais_DesenvSocial $histdes_versaopais_desenvsocial,
                                HistDes_VersaoPais_Brincadeiras $histdes_versaopais_brincadeiras, HistDes_VersaoPais_Comportamentos $histdes_versaopais_comportamentos,
                                HistDes_VersaoPais_Independencia $histdes_versaopais_independencia, HistDes_VersaoPais_DesenvMotor $histdes_versaopais_desenvmotor,
                                HistDes_VersaoPais_HistEscolar $histdes_versaopais_histescolar, HistDes_VersaoPais_CompCasa $histdes_versaopais_compcasa,
                                HistDes_Anexo1_RotAlim $histdes_anexo1_rotalim, HistDes_Anexo2_HistMedico $histdes_anexo2_histmedico,
                                HistDes_Anexo3_InfoSensoriais $histdes_anexo3_infosensoriais, Evolucao $evolucao, Feriado $feriado)
    {
        $this->atendimento = $atendimento;
        $this->medicoterapeuta = $medicoterapeuta;
        $this->tipoatendimento = $tipoatendimento;
        $this->tratamento = $tratamento;
        $this->paciente = $paciente;
        $this->arquivoatendimento = $arquivoatendimento;
        $this->histdes_anexo3_docs = $histdes_anexo3_docs;

        $this->anamnese_inicial = $anamnese_inicial;
        $this->anamnese_hist_pregressa = $anamnese_hist_pregressa;
        $this->anamnese_desenvolvimento = $anamnese_desenvolvimento;
        $this->histdes_versaopais_inicial = $histdes_versaopais_inicial;
        $this->histdes_versaopais_linguagem = $histdes_versaopais_linguagem;
        $this->histdes_versaopais_desenvsocial = $histdes_versaopais_desenvsocial;
        $this->histdes_versaopais_brincadeiras = $histdes_versaopais_brincadeiras;
        $this->histdes_versaopais_comportamentos = $histdes_versaopais_comportamentos;
        $this->histdes_versaopais_independencia = $histdes_versaopais_independencia;
        $this->histdes_versaopais_desenvmotor = $histdes_versaopais_desenvmotor;
        $this->histdes_versaopais_histescolar = $histdes_versaopais_histescolar;
        $this->histdes_versaopais_compcasa = $histdes_versaopais_compcasa;
        $this->histdes_anexo1_rotalim = $histdes_anexo1_rotalim;
        $this->histdes_anexo2_histmedico = $histdes_anexo2_histmedico;
        $this->histdes_anexo3_infosensoriais = $histdes_anexo3_infosensoriais;
        $this->evolucao = $evolucao;

        $this->feriado = $feriado;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $color)
    {
        $user = auth()->user();

        $medicoterapeuta = $this->medicoterapeuta->whereCpf($user->cpf)->first();        
        
        if(is_null($request->pesquisa)){
            $query = $this->atendimento->where('medico_terapeuta_id','=',$medicoterapeuta->id)
                                       ->where('atendido','=',0)
                                       ->where(function($qry){
                                       $qry->whereDate('data_atendimento','=',date("Y-m-d"));
                                       });
            $atendimentos = $query->orderBy('data_atendimento')->paginate(10);
        }else{
            $query = $this->atendimento->where('paciente','LIKE','%'.$request->pesquisa.'%')
                                       ->where('medico_terapeuta_id','=',$medicoterapeuta->id)
                                       ->where('atendido','=',0)
                                       ->where(function($qry){
                                       $qry->whereDate('data_atendimento','=',date("Y-m-d"));
                                       });
            $atendimentos = $query->orderBy('data_atendimento')->paginate(10);            
        }
        
        return view('cetea.terapia.index',[
            'atendimentos' => $atendimentos,
            'color' => $color,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(int $id, $color)
    {
        $atendimento = $this->atendimento->find($id);        
        $medicosterapeutas = $this->medicoterapeuta->orderByDesc('id')->get();
        $tiposatendimentos = $this->tipoatendimento->whereIn('id',[2,3])->get();
        $tratamentos = $this->tratamento->orderBy('id')->get();
        
        $count_anamnese_inicial = $this->anamnese_inicial->wherePaciente_id($atendimento->paciente_id)->first();
        $count_anamnese_hist_pregressa = $this->anamnese_hist_pregressa->wherePaciente_id($atendimento->paciente_id)->first();
        $count_anamnese_desenvolvimento = $this->anamnese_desenvolvimento->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_versaopais_inicial = $this->histdes_versaopais_inicial->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_versaopais_linguagem = $this->histdes_versaopais_linguagem->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_versaopais_desenvsocial = $this->histdes_versaopais_desenvsocial->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_versaopais_brincadeiras = $this->histdes_versaopais_brincadeiras->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_versaopais_comportamentos = $this->histdes_versaopais_comportamentos->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_versaopais_independencia = $this->histdes_versaopais_independencia->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_versaopais_desenvmotor = $this->histdes_versaopais_desenvmotor->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_versaopais_histescolar = $this->histdes_versaopais_histescolar->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_versaopais_compcasa = $this->histdes_versaopais_compcasa->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_anexo1_rotalim = $this->histdes_anexo1_rotalim->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_anexo2_histmedico = $this->histdes_anexo2_histmedico->wherePaciente_id($atendimento->paciente_id)->first();
        $count_histdes_anexo3_infosensoriais = $this->histdes_anexo3_infosensoriais->wherePaciente_id($atendimento->paciente_id)->first();
        $count_evolucao = $this->evolucao->wherePaciente_id($atendimento->paciente_id)->first();        

        return view('cetea.terapia.edit',[
            'status' => 200,
            'atendimento' => $atendimento,            
            'medicosterapeutas' => $medicosterapeutas,
            'tiposatendimentos' => $tiposatendimentos,
            'tratamentos' => $tratamentos,
            'color' => $color,
            'count_anamnese_inicial' => $count_anamnese_inicial,
            'count_anamnese_hist_pregressa' => $count_anamnese_hist_pregressa,
            'count_anamnese_desenvolvimento' => $count_anamnese_desenvolvimento,
            'count_histdes_versaopais_inicial' => $count_histdes_versaopais_inicial,
            'count_histdes_versaopais_linguagem' => $count_histdes_versaopais_linguagem,
            'count_histdes_versaopais_desenvsocial' => $count_histdes_versaopais_desenvsocial,
            'count_histdes_versaopais_brincadeiras' => $count_histdes_versaopais_brincadeiras,
            'count_histdes_versaopais_comportamentos' => $count_histdes_versaopais_comportamentos,
            'count_histdes_versaopais_independencia' => $count_histdes_versaopais_independencia,
            'count_histdes_versaopais_desenvmotor' => $count_histdes_versaopais_desenvmotor,
            'count_histdes_versaopais_histescolar' => $count_histdes_versaopais_histescolar,
            'count_histdes_versaopais_compcasa' => $count_histdes_versaopais_compcasa,
            'count_histdes_anexo1_rotalim' => $count_histdes_anexo1_rotalim,
            'count_histdes_anexo2_histmedico' => $count_histdes_anexo2_histmedico,
            'count_histdes_anexo3_infosensoriais' => $count_histdes_anexo3_infosensoriais,
            'count_evolucao' => $count_evolucao,            
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
            'paciente' => ['required'],
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
            
            $tipoatendimento = $this->tipoatendimento->find($request->input('tipo_atendimento'));

            if($request->input('tipo_atendimento')==2 || $request->input('tipo_atendimento')==3){
                $date = strtotime($request->input('data'));
                $dia = date('d',$date);
                $mes = date('m',$date);
                $ano = date('y',$date);

                $query = $this->feriado->query()
                                       ->where('dia','=',$dia)
                                       ->where('mes','=',$mes);
                $feriado = $query->first();                
                
                if($feriado){
                    $descricao = $feriado->descricao;
                    return response()->json([
                        'status' => 401,
                        'message' => 'Nesta data não tem expediente! '.$dia.'/'.$mes.'/'.$ano.' - '.$descricao.'.',
                    ]);
                }          

                if(date('w',strtotime($request->input('data')))==0 || date('w',strtotime($request->input('data')))==6){
                    return response()->json([
                        'status' => 401,
                        'message' => 'Este '.$tipoatendimento->nome.' não pode ser em fim de semana! Não tem expediente.',
                    ]);
                }

                if(strtotime($request->input('data'))<strtotime(date('Y-m-d'))){
                    return response()->json([
                        'status' => 401,
                        'message' => 'Este '.$tipoatendimento->nome.' não pode ser anterior à data de hoje!',
                    ]);
                }                

                if($request->input('tipo_atendimento')==2){ //retorno
                    $query = $this->atendimento->where('atendido','=',0)
                                        ->where('tipo_atendimento_id','=',$request->input('tipo_atendimento'))
                                        ->where('data_retorno','=',$request->input('data'));
                    $atendimento = $query->get();
                    $contaAtendimento = $atendimento->count();

                    if($contaAtendimento==$tipoatendimento->vagas_limite){
                        return response()->json([
                            'status' => 401,
                            'message' => 'Para esta data o '.$tipoatendimento->nome.' atingiu o limite! Escolha uma data VERDE.',
                        ]);
                    }

                }else{ //encaminhamento
                    $query = $this->atendimento->where('atendido','=',0)
                                        ->where('tipo_atendimento_id','=',$request->input('tipo_atendimento'))
                                        ->where('data_encaminhamento','=',$request->input('data'));
                    $atendimento = $query->get();
                    $contaAtendimento = $atendimento->count();

                    if($contaAtendimento==$tipoatendimento->vagas_limite){
                        return response()->json([
                            'status' => 401,
                            'message' => 'Para esta data o '.$tipoatendimento->nome.' atingiu o limite! Escolha uma data VERDE.',
                        ]);
                    }


                }

            }
            
            
            $user = auth()->user();                        
            $data['tipo_atendimento_id'] = $request->input('tipo_atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $paciente = $this->paciente->find($request->input('paciente'));
            $data['paciente'] = $paciente->nome;
            $data['medico_terapeuta_id'] = $request->input('terapeuta');
            $data['tratamento_id'] = $request->input('tratamento');            
            $data['responsavel_do_paciente'] = strtoupper($request->input('responsavel'));
            $data['responsavel_parentesco'] = strtoupper($request->input('parentesco'));
            if($request->input('tipo_atendimento')==2){
            $data['data_retorno'] = $request->input('data'); //2 retorno
            }else{            
            $data['data_encaminhamento'] = $request->input('data'); //3 encaminhamento
            $medicoterapeuta = $this->medicoterapeuta->whereCpf($user->cpf)->first();
            $data['encaminhamento'] = $medicoterapeuta->nome;
            }
            $data['updated_at'] = now();            
            $data['updater_user'] = $user->id;
            $atendimento->update($data);
            return response()->json([
                'status' => 200,                
            ]);

        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Registro não localizado!',
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
    public function destroy($id)
    {
        //
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
                    $data[$x]['atendimento_id'] = $id;                    
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

    public function medicoxtratamento(int $id){
        $medicoterapeuta = $this->medicoterapeuta->find($id);        
        $tratamentos = $medicoterapeuta->tratamentos;        
        return response()->json([
            'status' => 200,
            'tratamentos' => $tratamentos,
        ]);
    }

    public function storeAnamneseInicial(Request $request){
        $validator = Validator::make($request->all(),[
            'atendimento' => ['required'],
            'paciente' => ['required'],
            'composicao_familiar' => ['required','max:400'],
            'queixa_motivo_encaminhamento' => ['required','max:200'],
            'idade_constatado_problema' => ['required','max:10'],
            'providencias_tomadas' => ['required','max:400'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $user = auth()->user();
            $data['id'] = $this->maxId_AnamneseInicial();
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['ii_composicao_familiar'] = $request->input('composicao_familiar');
            $data['iii_queixa_motivo_encaminhamento'] = $request->input('queixa_motivo_encaminhamento');
            $data['iii_a_idade_constatado_problema'] = $request->input('idade_constatado_problema');
            $data['iii_b_providencias_tomadas'] = $request->input('providencias_tomadas');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $anamnese_inicial = $this->anamnese_inicial->create($data);

            return response()->json([
                'status' => 200,
            ]);

        }
    }    

    protected function maxId_AnamneseInicial(){
        $anamnese_inicial = $this->anamnese_inicial->orderByDesc('id')->first();
        if($anamnese_inicial){
            $codigo = $anamnese_inicial->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

    public function editAnamneseInicial(int $id){
        $anamnese_inicial = $this->anamnese_inicial->wherePaciente_id($id)->first();
        return response()->json([
            'status' => 200,
            'anamnese_inicial' => $anamnese_inicial,
        ]);
    }

    public function updateAnamneseInicial(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'atendimento' => ['required'],
            'paciente' => ['required'],
            'composicao_familiar' => ['required','max:400'],
            'queixa_motivo_encaminhamento' => ['required','max:200'],
            'idade_constatado_problema' => ['required','max:10'],
            'providencias_tomadas' => ['required','max:400'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $anamnese_inicial = $this->anamnese_inicial->wherePaciente_id($id)->first();            
            $user = auth()->user();            
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['ii_composicao_familiar'] = $request->input('composicao_familiar');
            $data['iii_queixa_motivo_encaminhamento'] = $request->input('queixa_motivo_encaminhamento');
            $data['iii_a_idade_constatado_problema'] = $request->input('idade_constatado_problema');
            $data['iii_b_providencias_tomadas'] = $request->input('providencias_tomadas');
            $data['updated_at'] = now();
            $data['updater_user'] = $user->id;
            $anamnese_inicial->update($data);            

            return response()->json([
                'status' => 200,                
            ]);        
    }
    }


    public function storeAnamneseHistPregressa(Request $request){
        $validator = Validator::make($request->all(),[
            'atendimento' => ['required'],
            'paciente' => ['required'],            
            'detalhe_gestacao' => ['required','max:400'],
            'parto_nascimento' => ['required','max:200'],
            'periodo_neonatal' => ['required','max:200'],
            'tratamentos_anteriores' => ['required','max:200'],
            'internacoes' => ['required','max:200'],
            'vacinas' => ['required','max:200'],
            'antecedentes_alergicos' => ['required','max:200'],            
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $user = auth()->user();
            $data['id'] = $this->maxId_AnamneseInicial();
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['gestacao_planejada'] = $request->input('gestacao_planejada');
            $data['detalhe_gestacao'] = $request->input('detalhe_gestacao');
            $data['parto_nascimento'] = $request->input('parto_nascimento');
            $data['periodo_neonatal'] = $request->input('periodo_neonatal');
            $data['tratamentos_anteriores'] = $request->input('tratamentos_anteriores');
            $data['internacoes'] = $request->input('internacoes');
            $data['vacinas'] = $request->input('vacinas');
            $data['antecedentes_alergicos'] = $request->input('antecedentes_alergicos');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $anamnese_hist_pregressa = $this->anamnese_hist_pregressa->create($data);

            return response()->json([
                'status' => 200,
            ]);

        }
    }    

    protected function maxId_AnamneseHistPregressa(){
        $anamnese_inicial = $this->anamnese_inicial->orderByDesc('id')->first();
        if($anamnese_inicial){
            $codigo = $anamnese_inicial->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

    public function editAnamneseHistPregressa(int $id){
        $anamnese_hist_pregressa = $this->anamnese_hist_pregressa->wherePaciente_id($id)->first();
        return response()->json([
            'status' => 200,
            'anamnese_hist_pregressa' => $anamnese_hist_pregressa,
        ]);
    }

    public function updateAnamneseHistPregressa(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'atendimento' => ['required'],
            'paciente' => ['required'],            
            'detalhe_gestacao' => ['required','max:400'],
            'parto_nascimento' => ['required','max:200'],
            'periodo_neonatal' => ['required','max:200'],
            'tratamentos_anteriores' => ['required','max:200'],
            'internacoes' => ['required','max:200'],
            'vacinas' => ['required','max:200'],
            'antecedentes_alergicos' => ['required','max:200'], 
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $hist_pregressa = $this->anamnese_hist_pregressa->wherePaciente_id($id)->first();            
            $anamnese_hist_pregressa = $this->anamnese_hist_pregressa->find($hist_pregressa->id);
            $user = auth()->user();            
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['gestacao_planejada'] = $request->input('gestacao_planejada');
            $data['detalhe_gestacao'] = $request->input('detalhe_gestacao');
            $data['parto_nascimento'] = $request->input('parto_nascimento');
            $data['periodo_neonatal'] = $request->input('periodo_neonatal');
            $data['tratamentos_anteriores'] = $request->input('tratamentos_anteriores');
            $data['internacoes'] = $request->input('internacoes');
            $data['vacinas'] = $request->input('vacinas');
            $data['antecedentes_alergicos'] = $request->input('antecedentes_alergicos');
            $data['updated_at'] = now();
            $data['updater_user'] = $user->id;
            $anamnese_hist_pregressa->update($data);            

            return response()->json([
                'status' => 200,                
            ]);        
    }
    }
    
public function diasColorir(int $id){
        $dataInicio = date('Y-m-d');
        $dataFim = date('Y-m-d',strtotime('+30 days'));        
        $periodo = CarbonPeriod::create($dataInicio,$dataFim);
        $datas = $periodo->toArray();
        $i = 0;
        if($id==2){ //retorno
            foreach($datas as $date){
            $query = $this->atendimento->where('atendido','=',0)     
                                       ->where('tipo_atendimento_id','=',$id) 
                                       ->where('data_retorno','=',$date->format('Y-m-d'));
            $atendimento = $query->get();
            $contaAtendimento = $atendimento->count();

            $data[$i]['data'] = $date->format('Y-m-d');
            $data[$i]['n_atendimentos'] = $contaAtendimento;
            
            $i++;
        }        

        }else{ //encaminhamento
            foreach($datas as $date){
            $query = $this->atendimento->where('atendido','=',0)     
                                       ->where('tipo_atendimento_id','=',$id) 
                                       ->where('data_encaminhamento','=',$date->format('Y-m-d'));
            $atendimento = $query->get();
            $contaAtendimento = $atendimento->count();

            $data[$i]['data'] = $date->format('Y-m-d');
            $data[$i]['n_atendimentos'] = $contaAtendimento;
            
            $i++;
        }   
        }
        
        $tipoatendimento = $this->tipoatendimento->find($id);
        $feriados = $this->feriado->all();        
        return response()->json([
            'status' => 200,
            'datas' => $data,
            'tipo_atendimento' => $tipoatendimento,
            'feriados' => $feriados,
        ]);
    }    


}
