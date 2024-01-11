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
use JeroenNoten\LaravelAdminLte\View\Components\Form\Input;

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
                    $att = $query->get();
                    $contaAtendimento = $att->count();

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
                    $att = $query->get();
                    $contaAtendimento = $att->count();

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
    

    public function storeAnamneseDesenvolvimento(Request $request){
        $validator = Validator::make($request->all(),[
            'alimentacao_aleitamento_reacoes' => ['required','max:400'],
            'problema_para_mastigar' => ['required','max:200'],            
            'habitos_alimentares' => ['required','max:200'],
            'idade_sust_cabeca' => ['required','max:20'],
            'qdo_sentou_sozinha' => ['required','max:20'],
            'engatinhou_quando' => ['required','max:20'],
            'quando_andou' => ['required','max:20'],
            'anda_adequadamente' => ['required','max:20'],
            'qdo_controlou_os_esfincteres' => ['required','max:50'],
            'caiamuito_qdopequena' => ['required','max:50'],
            'que_idade_se_deu_balbucio' => ['required','max:20'],
            'qdo_falou_primpalavras' => ['required','max:20'],
            'qdo_falou_primfrases' => ['required','max:20'],
            'apres_prob_linguagem' => ['required','max:30'],
            'apres_gagueira' => ['required','max:200'],
            'a_que_h_cost_dormir_a_noite' => ['required','max:20'],
            'dorme_durante_o_dia' => ['required','max:20'],
            'tem_hab_dif_antes_dormir' => ['required','max:20'],
            'dorme_cama_sep' => ['required','max:50'],
            'relacionamento_familiar' => ['required','max:50'],
            'com_quem_e_ondeficacrianca' => ['required','max:50'],
            'tem_amigos' => ['required','max:50'],
            'assiste_tv' => ['required','max:50'],
            'gosta_de_musica' => ['required','max:50'],
            'passeios_locais_freq' => ['required','max:50'],
            'brincar' => ['required','max:200'],
            'comportamento' => ['required','max:200'],
            'higiene' => ['required','max:200'],
            'banho' => ['required','max:200'],
            'vestir_e_despir' => ['required','max:200'],
            'nome_horario_serie' => ['required','max:100'],
            'historico_escolar' => ['required','max:200'],
            'queixa_principal_da_escola' => ['required','max:200'],
            'gosta_da_professora' => ['required','max:100'],
            'quem_ajuda_tar_casa' => ['required','max:100'],
            'como_se_comporta_na_sala' => ['required','max:200'],
            'oque_familia_pensa_da_escola' => ['required','max:200'],
            'oque_familia_pensa_da_professora' => ['required','max:200'],
            'outras_informacoes' => ['required','max:600'],
            'entrevistador' => ['required','max:50'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $user = auth()->user();
            $data['id'] = $this->maxId_AnamneseDesenvolvimento();
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['a1_alimen_aleitamento_reacoes'] = $request->input('alimentacao_aleitamento_reacoes');
            $data['a2_problema_para_mastigar'] = $request->input('problema_para_mastigar');
            $data['a3_habitos_alimentares'] = $request->input('habitos_alimentares');
            $data['b1_idade_sust_cabeca'] = $request->input('idade_sust_cabeca');
            $data['b2_qdo_sentou_sozinha'] = $request->input('qdo_sentou_sozinha');
            $data['b3_engatinhou_quando'] = $request->input('engatinhou_quando');
            $data['b4_quando_andou'] = $request->input('quando_andou');
            $data['b4_anda_adequadamente'] = $request->input('anda_adequadamente');
            $data['b5_qdo_controlou_os_esfincteres'] = $request->input('qdo_controlou_os_esfincteres');
            $data['b6_caiamuito_qdopequena'] = $request->input('caiamuito_qdopequena');
            $data['c1_que_idade_se_deu_balbucio'] = $request->input('que_idade_se_deu_balbucio');
            $data['c2_qdo_falou_primpalavras'] = $request->input('qdo_falou_primpalavras');
            $data['c2_qdo_falou_primfrases'] = $request->input('qdo_falou_primfrases');
            $data['c3_apres_prob_linguagem'] = $request->input('apres_prob_linguagem');
            $data['c4_apres_gagueira'] = $request->input('apres_gagueira');
            $data['d1_calmo'] = $request->input('calmo');
            $data['d1_sua_qd_dorme'] = $request->input('sua_qd_dorme');
            $data['d1_sonambulismo'] = $request->input('sonambulismo');
            $data['d1_agitado'] = $request->input('agitado');
            $data['d1_fala_dormindo'] = $request->input('fala_dormindo');
            $data['d1_range_os_dentes'] = $request->input('range_os_dentes');
            $data['d1_baba_qdo_dorme'] = $request->input('baba_qdo_dorme');
            $data['d2_a_que_h_cost_dormir_a_noite'] = $request->input('a_que_h_cost_dormir_a_noite');
            $data['d3_dorme_durante_o_dia'] = $request->input('dorme_durante_o_dia');
            $data['d4_tem_hab_dif_antes_dormir'] = $request->input('tem_hab_dif_antes_dormir');
            $data['d5_dorme_cama_sep'] = $request->input('dorme_cama_sep');
            $data['e1_usos_chupeta'] = $request->input('usos_chupeta');
            $data['e1_ate_quando'] = $request->input('usos_chupeta_ate_quando');
            $data['e2_chupou_dedo'] = $request->input('chupou_dedo');
            $data['e2_ate_quando'] = $request->input('chupou_dedo_ate_quando');
            $data['e3_roeu_unha'] = $request->input('roeu_unha');
            $data['e3_ate_quando'] = $request->input('roeu_unha_ate_quando');
            $data['e4_teveoutem_tiques'] = $request->input('teveoutem_tiques');
            $data['e4_quais'] = $request->input('teveoutem_tiques_quais');
            $data['f1_relacionamento_familiar'] = $request->input('relacionamento_familiar');
            $data['f2_com_quem_e_ondeficacrianca'] = $request->input('com_quem_e_ondeficacrianca');
            $data['f3_tem_amigos'] = $request->input('tem_amigos');
            $data['f4_assiste_tv'] = $request->input('assiste_tv');
            $data['f5_gosta_de_musica'] = $request->input('gosta_de_musica');
            $data['f6_passeios_locais_freq'] = $request->input('passeios_locais_freq');
            $data['f7_brincar'] = $request->input('brincar');
            $data['h1_comportamento'] = $request->input('comportamento');
            $data['h2_higiene'] = $request->input('higiene');
            $data['h3_banho'] = $request->input('banho');
            $data['h4_vestir_e_despir'] = $request->input('vestir_e_despir');
            $data['i1_nome_horario_serie'] = $request->input('nome_horario_serie');
            $data['i2_historico_escolar'] = $request->input('historico_escolar');
            $data['i3_queixa_principal_da_escola'] = $request->input('queixa_principal_da_escola');
            $data['i4_gosta_da_professora'] = $request->input('gosta_da_professora');
            $data['i5_quem_ajuda_tar_casa'] = $request->input('quem_ajuda_tar_casa');
            $data['i6_como_se_comporta_na_sala'] = $request->input('como_se_comporta_na_sala');
            $data['i7_oque_familia_pensa_da_escola'] = $request->input('oque_familia_pensa_da_escola');
            $data['i8_oque_familia_pensa_professora'] = $request->input('oque_familia_pensa_da_professora');
            $data['j1_outras_informacoes'] = $request->input('outras_informacoes');
            $data['entrevistador'] = $request->input('entrevistador');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $anamnese_desenvolvimento = $this->anamnese_desenvolvimento->create($data);

            return response()->json([
                'status' => 200,
            ]);

        }
    }    

    protected function maxId_AnamneseDesenvolvimento(){
        $anamnese_desenvolvimento = $this->anamnese_desenvolvimento->orderByDesc('id')->first();
        if($anamnese_desenvolvimento){
            $codigo = $anamnese_desenvolvimento->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

    public function editAnamneseDesenvolvimento(int $id){
        $anamnese_desenvolvimento = $this->anamnese_desenvolvimento->wherePaciente_id($id)->first();
        return response()->json([
            'status' => 200,
            'anamnese_desenvolvimento' => $anamnese_desenvolvimento,
        ]);
    }

    public function updateAnamneseDesenvolvimento(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'alimentacao_aleitamento_reacoes' => ['required','max:400'],
            'problema_para_mastigar' => ['required','max:200'],            
            'habitos_alimentares' => ['required','max:200'],
            'idade_sust_cabeca' => ['required','max:20'],
            'qdo_sentou_sozinha' => ['required','max:20'],
            'engatinhou_quando' => ['required','max:20'],
            'quando_andou' => ['required','max:20'],
            'anda_adequadamente' => ['required','max:20'],
            'qdo_controlou_os_esfincteres' => ['required','max:50'],
            'caiamuito_qdopequena' => ['required','max:50'],
            'que_idade_se_deu_balbucio' => ['required','max:20'],
            'qdo_falou_primpalavras' => ['required','max:20'],
            'qdo_falou_primfrases' => ['required','max:20'],
            'apres_prob_linguagem' => ['required','max:30'],
            'apres_gagueira' => ['required','max:200'],
            'a_que_h_cost_dormir_a_noite' => ['required','max:20'],
            'dorme_durante_o_dia' => ['required','max:20'],
            'tem_hab_dif_antes_dormir' => ['required','max:20'],
            'dorme_cama_sep' => ['required','max:50'],
            'relacionamento_familiar' => ['required','max:50'],
            'com_quem_e_ondeficacrianca' => ['required','max:50'],
            'tem_amigos' => ['required','max:50'],
            'assiste_tv' => ['required','max:50'],
            'gosta_de_musica' => ['required','max:50'],
            'passeios_locais_freq' => ['required','max:50'],
            'brincar' => ['required','max:200'],
            'comportamento' => ['required','max:200'],
            'higiene' => ['required','max:200'],
            'banho' => ['required','max:200'],
            'vestir_e_despir' => ['required','max:200'],
            'nome_horario_serie' => ['required','max:100'],
            'historico_escolar' => ['required','max:200'],
            'queixa_principal_da_escola' => ['required','max:200'],
            'gosta_da_professora' => ['required','max:100'],
            'quem_ajuda_tar_casa' => ['required','max:100'],
            'como_se_comporta_na_sala' => ['required','max:200'],
            'oque_familia_pensa_da_escola' => ['required','max:200'],
            'oque_familia_pensa_da_professora' => ['required','max:200'],
            'outras_informacoes' => ['required','max:600'],
            'entrevistador' => ['required','max:50'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $desenvolvimento = $this->anamnese_desenvolvimento->wherePaciente_id($id)->first();            
            $anamnese_desenvolvimento = $this->anamnese_desenvolvimento->find($desenvolvimento->id);
            $user = auth()->user();
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['a1_alimen_aleitamento_reacoes'] = $request->input('alimentacao_aleitamento_reacoes');
            $data['a2_problema_para_mastigar'] = $request->input('problema_para_mastigar');
            $data['a3_habitos_alimentares'] = $request->input('habitos_alimentares');
            $data['b1_idade_sust_cabeca'] = $request->input('idade_sust_cabeca');
            $data['b2_qdo_sentou_sozinha'] = $request->input('qdo_sentou_sozinha');
            $data['b3_engatinhou_quando'] = $request->input('engatinhou_quando');
            $data['b4_quando_andou'] = $request->input('quando_andou');
            $data['b4_anda_adequadamente'] = $request->input('anda_adequadamente');
            $data['b5_qdo_controlou_os_esfincteres'] = $request->input('qdo_controlou_os_esfincteres');
            $data['b6_caiamuito_qdopequena'] = $request->input('caiamuito_qdopequena');
            $data['c1_que_idade_se_deu_balbucio'] = $request->input('que_idade_se_deu_balbucio');
            $data['c2_qdo_falou_primpalavras'] = $request->input('qdo_falou_primpalavras');
            $data['c2_qdo_falou_primfrases'] = $request->input('qdo_falou_primfrases');
            $data['c3_apres_prob_linguagem'] = $request->input('apres_prob_linguagem');
            $data['c4_apres_gagueira'] = $request->input('apres_gagueira');
            $data['d1_calmo'] = $request->input('calmo');
            $data['d1_sua_qd_dorme'] = $request->input('sua_qd_dorme');
            $data['d1_sonambulismo'] = $request->input('sonambulismo');
            $data['d1_agitado'] = $request->input('agitado');
            $data['d1_fala_dormindo'] = $request->input('fala_dormindo');
            $data['d1_range_os_dentes'] = $request->input('range_os_dentes');
            $data['d1_baba_qdo_dorme'] = $request->input('baba_qdo_dorme');
            $data['d2_a_que_h_cost_dormir_a_noite'] = $request->input('a_que_h_cost_dormir_a_noite');
            $data['d3_dorme_durante_o_dia'] = $request->input('dorme_durante_o_dia');
            $data['d4_tem_hab_dif_antes_dormir'] = $request->input('tem_hab_dif_antes_dormir');
            $data['d5_dorme_cama_sep'] = $request->input('dorme_cama_sep');
            $data['e1_usos_chupeta'] = $request->input('usos_chupeta');
            $data['e1_ate_quando'] = $request->input('usos_chupeta_ate_quando');
            $data['e2_chupou_dedo'] = $request->input('chupou_dedo');
            $data['e2_ate_quando'] = $request->input('chupou_dedo_ate_quando');
            $data['e3_roeu_unha'] = $request->input('roeu_unha');
            $data['e3_ate_quando'] = $request->input('roeu_unha_ate_quando');
            $data['e4_teveoutem_tiques'] = $request->input('teveoutem_tiques');
            $data['e4_quais'] = $request->input('teveoutem_tiques_quais');
            $data['f1_relacionamento_familiar'] = $request->input('relacionamento_familiar');
            $data['f2_com_quem_e_ondeficacrianca'] = $request->input('com_quem_e_ondeficacrianca');
            $data['f3_tem_amigos'] = $request->input('tem_amigos');
            $data['f4_assiste_tv'] = $request->input('assiste_tv');
            $data['f5_gosta_de_musica'] = $request->input('gosta_de_musica');
            $data['f6_passeios_locais_freq'] = $request->input('passeios_locais_freq');
            $data['f7_brincar'] = $request->input('brincar');
            $data['h1_comportamento'] = $request->input('comportamento');
            $data['h2_higiene'] = $request->input('higiene');
            $data['h3_banho'] = $request->input('banho');
            $data['h4_vestir_e_despir'] = $request->input('vestir_e_despir');
            $data['i1_nome_horario_serie'] = $request->input('nome_horario_serie');
            $data['i2_historico_escolar'] = $request->input('historico_escolar');
            $data['i3_queixa_principal_da_escola'] = $request->input('queixa_principal_da_escola');
            $data['i4_gosta_da_professora'] = $request->input('gosta_da_professora');
            $data['i5_quem_ajuda_tar_casa'] = $request->input('quem_ajuda_tar_casa');
            $data['i6_como_se_comporta_na_sala'] = $request->input('como_se_comporta_na_sala');
            $data['i7_oque_familia_pensa_da_escola'] = $request->input('oque_familia_pensa_da_escola');
            $data['i8_oque_familia_pensa_professora'] = $request->input('oque_familia_pensa_da_professora');
            $data['j1_outras_informacoes'] = $request->input('outras_informacoes');
            $data['entrevistador'] = $request->input('entrevistador');
            $data['updated_at'] = now();
            $data['updater_user'] = $user->id;
            $anamnese_desenvolvimento->update($data);            

            return response()->json([
                'status' => 200,                
            ]);        
    }
    }


public function storeHistDesVersaoPaisInicial(Request $request){
        $validator = Validator::make($request->all(),[
            'atendimento' => ['required'],
            'paciente' => ['required'],            
            'responsavel_preenchimento' => ['required','max:50'],
            'princ_queixas_comport_filho' => ['required','max:400'],
            'quem_tomaconta_crianca' => ['required','max:400'],
            'idade_primeiros_sinais_preocupacoes' => ['required','max:400'],
            'outras_preocupacoes' => ['required','max:400'],            
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $user = auth()->user();
            $data['id'] = $this->maxId_HistDesVersaoPaisInicial();
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['responsavel_preench'] = $request->input('responsavel_preenchimento');
            $data['princ_queixas_comport_filho'] = $request->input('princ_queixas_comport_filho');
            $data['quem_tomaconta_crianca'] = $request->input('quem_tomaconta_crianca');
            $data['idade_primeiros_sinais_preocupacoes'] = $request->input('idade_primeiros_sinais_preocupacoes');
            $data['desenv_motor'] = $request->input('desenv_motor');
            $data['desenv_linguagem'] = $request->input('desenv_linguagem');
            $data['problemas_sono'] = $request->input('problemas_sono');
            $data['problemas_conduta'] = $request->input('problemas_conduta');
            $data['tiques_esteotipias_manias'] = $request->input('tiques_esteotipias_manias');
            $data['probl_comport_social'] = $request->input('probl_comport_social');
            $data['problemas_c_alimentacao'] = $request->input('problemas_c_alimentacao');
            $data['brincar_incompativel_c_idade'] = $request->input('brincar_incompativel_c_idade');
            $data['outras_preocupacoes'] = $request->input('outras_preocupacoes');            
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $this->histdes_versaopais_inicial->create($data);

            return response()->json([
                'status' => 200,
            ]);

        }
    }    

    protected function maxId_HistDesVersaoPaisInicial(){
        $histdes_versaopais_inicial = $this->histdes_versaopais_inicial->orderByDesc('id')->first();
        if($histdes_versaopais_inicial){
            $codigo = $histdes_versaopais_inicial->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

    public function editHistDesVersaoPaisInicial(int $id){
        $histdes_versaopais_inicial = $this->histdes_versaopais_inicial->wherePaciente_id($id)->first();
        return response()->json([
            'status' => 200,
            'histdesversaopaisinicial' => $histdes_versaopais_inicial,
        ]);
    }

    public function updateHistDesVersaoPaisInicial(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'atendimento' => ['required'],
            'paciente' => ['required'],            
            'responsavel_preenchimento' => ['required','max:50'],
            'princ_queixas_comport_filho' => ['required','max:400'],
            'quem_tomaconta_crianca' => ['required','max:400'],
            'idade_primeiros_sinais_preocupacoes' => ['required','max:400'],
            'outras_preocupacoes' => ['required','max:400'],            
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $busca_pelo_paciente = $this->histdes_versaopais_inicial->wherePaciente_id($id)->first();            
            $histdes_versaopais_inicial = $this->histdes_versaopais_inicial->find($busca_pelo_paciente->id);
            $user = auth()->user();            
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['responsavel_preench'] = $request->input('responsavel_preenchimento');
            $data['princ_queixas_comport_filho'] = $request->input('princ_queixas_comport_filho');
            $data['quem_tomaconta_crianca'] = $request->input('quem_tomaconta_crianca');
            $data['idade_primeiros_sinais_preocupacoes'] = $request->input('idade_primeiros_sinais_preocupacoes');
            $data['desenv_motor'] = $request->input('desenv_motor');
            $data['desenv_linguagem'] = $request->input('desenv_linguagem');
            $data['problemas_sono'] = $request->input('problemas_sono');
            $data['problemas_conduta'] = $request->input('problemas_conduta');
            $data['tiques_esteotipias_manias'] = $request->input('tiques_esteotipias_manias');
            $data['probl_comport_social'] = $request->input('probl_comport_social');
            $data['problemas_c_alimentacao'] = $request->input('problemas_c_alimentacao');
            $data['brincar_incompativel_c_idade'] = $request->input('brincar_incompativel_c_idade');
            $data['outras_preocupacoes'] = $request->input('outras_preocupacoes');            
            $data['updated_at'] = now();
            $data['updater_user'] = $user->id;
            $histdes_versaopais_inicial->update($data);            

            return response()->json([
                'status' => 200,                
            ]);        
    }
    }


public function storeHistDesVersaoPaisLinguagem(Request $request){
        $validator = Validator::make($request->all(),[
            'atendimento' => ['required'],
            'paciente' => ['required'],                    
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $user = auth()->user();
            $data['id'] = $this->maxId_HistDesVersaoPaisInicial();
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['e1_idade_prim_vocalizacoes'] = $request->input('idade_primeiras_vocalizacoes');
            $data['e1_naoapresentou'] = $request->input('prim_vocalizacoes_naoapresentou');
            $data['e1_quais'] = $request->input('quais_prim_vocalizacoes');
            $data['e2_idade_prim_palavras'] = $request->input('idade_primeiras_palavras');
            $data['e2_naoapresentou'] = $request->input('prim_palavras_naoapresentou');
            $data['e2_quais'] = $request->input('quais_prim_palavras');
            $data['e3_idade_prim_frases'] = $request->input('idade_primeiras_frases');
            $data['e3_naoapresentou'] = $request->input('prim_frases_naoapresentou');
            $data['e3_quais'] = $request->input('quais_prim_frases');
            $data['f_considera_que_ha_alg_atraso'] = $request->input('considera_que_ha_alg_atraso');
            $data['g1_aponta_para_pedir_algo'] = $request->input('aponta_para_pedir_algo');
            $data['g2_aponta_para_compartilhar'] = $request->input('aponta_para_compartilhar');
            $data['g3_sim_assentindo_c_cabeca'] = $request->input('sim_assentindo_c_cabeca');
            $data['g4_mandar_beijos'] = $request->input('mandar_beijos');
            $data['g5_da_tchau'] = $request->input('da_tchau');
            $data['g6_nega_c_cabeca'] = $request->input('nega_c_cabeca');
            $data['g7_bate_palmas'] = $request->input('bate_palmas');
            $data['g8_eleva_bracos_pedcolo'] = $request->input('eleva_bracos_pedcolo');
            $data['g9_sacode_indicador_pdizer_nao'] = $request->input('sacode_indicador_pdizer_nao');
            $data['g10_puxvcpela_mao_paraabpg_coisas'] = $request->input('puxvcpela_mao_paraabpg_coisas');
            $data['g11_vcjapensou_qseufilho_surdo'] = $request->input('vcjapensou_qseufilho_surdo');
            $data['g12_imita_gracinhas'] = $request->input('imita_gracinhas');
            $data['g13_seg_seurosto_polhar_palgdirecao'] = $request->input('seg_seurosto_polhar_palgdirecao');
            $data['g14_atend_champnome'] = $request->input('atend_champnome');
            $data['g14_somente_c_insistencia'] = $request->input('somente_c_insistencia');
            $data['g15_pessestranhas_compseufilho_fala'] = $request->input('pessestranhas_compseufilho_fala');
            $data['g16_seufilho_costrepeultpal_ouvida'] = $request->input('g16seufilho_costrepultpal_ouvida');
            $data['g16_as_vezes'] = $request->input('g16as_vezes');
            $data['g17_fala_baixa'] = $request->input('fala_baixa');
            $data['g17_fala_monotona'] = $request->input('fala_monotona');
            $data['g17_fala_alta'] = $request->input('fala_alta');
            $data['g18_cost_rep_frases_ouvidas'] = $request->input('g18cost_rep_frases_ouvidas');
            $data['g18_as_vezes'] = $request->input('g18as_vezes');
            $data['g19_comb_palaforma_estranha'] = $request->input('g19comb_palaforma_estranha');
            $data['g19_as_vezes'] = $request->input('g19as_vezes');
            $data['g20_cost_insis_pvc_dizer_palavras'] = $request->input('g20cost_insist_pvc_dizer_palavras');
            $data['g20_as_vezes'] = $request->input('g20as_vezes');
            $data['g21_cost_comen_inapropriado'] = $request->input('g21cost_comen_inapropriado');
            $data['g21_as_vezes'] = $request->input('g21as_vezes');
            $data['g21_de_exemplos'] = $request->input('g21_de_exemplos');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $this->histdes_versaopais_linguagem->create($data);

            return response()->json([
                'status' => 200,
            ]);

        }
    }    

    protected function maxId_HistDesVersaoPaisLinguagem(){
        $histdes_versaopais_linguagem = $this->histdes_versaopais_linguagem->orderByDesc('id')->first();
        if($histdes_versaopais_linguagem){
            $codigo = $histdes_versaopais_linguagem->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

    public function editHistDesVersaoPaisLinguagem(int $id){
        $busca_pelo_paciente = $this->histdes_versaopais_linguagem->wherePaciente_id($id)->first();        
        $histdes_versaopais_linguagem = $this->histdes_versaopais_linguagem->find($busca_pelo_paciente->id);        
        return response()->json([
            'status' => 200,
            'histdesversaopaislinguagem' => $histdes_versaopais_linguagem,
        ]);
    }

    public function updateHistDesVersaoPaisLinguagem(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'atendimento' => ['required'],
            'paciente' => ['required'],                        
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $busca_pelo_paciente = $this->histdes_versaopais_linguagem->wherePaciente_id($id)->first();
            $linguagem = $this->histdes_versaopais_linguagem->find($busca_pelo_paciente->id);
            $user = auth()->user();            
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['e1_idade_prim_vocalizacoes'] = $request->input('idade_primeiras_vocalizacoes');
            $data['e1_naoapresentou'] = $request->input('prim_vocalizacoes_naoapresentou');
            $data['e1_quais'] = $request->input('quais_prim_vocalizacoes');
            $data['e2_idade_prim_palavras'] = $request->input('idade_primeiras_palavras');
            $data['e2_naoapresentou'] = $request->input('prim_palavras_naoapresentou');
            $data['e2_quais'] = $request->input('quais_prim_palavras');
            $data['e3_idade_prim_frases'] = $request->input('idade_primeiras_frases');
            $data['e3_naoapresentou'] = $request->input('prim_frases_naoapresentou');
            $data['e3_quais'] = $request->input('quais_prim_frases');
            $data['f_considera_que_ha_alg_atraso'] = $request->input('considera_que_ha_alg_atraso');
            $data['g1_aponta_para_pedir_algo'] = $request->input('aponta_para_pedir_algo');
            $data['g2_aponta_para_compartilhar'] = $request->input('aponta_para_compartilhar');
            $data['g3_sim_assentindo_c_cabeca'] = $request->input('sim_assentindo_c_cabeca');
            $data['g4_mandar_beijos'] = $request->input('mandar_beijos');
            $data['g5_da_tchau'] = $request->input('da_tchau');
            $data['g6_nega_c_cabeca'] = $request->input('nega_c_cabeca');
            $data['g7_bate_palmas'] = $request->input('bate_palmas');
            $data['g8_eleva_bracos_pedcolo'] = $request->input('eleva_bracos_pedcolo');
            $data['g9_sacode_indicador_pdizer_nao'] = $request->input('sacode_indicador_pdizer_nao');
            $data['g10_puxvcpela_mao_paraabpg_coisas'] = $request->input('puxvcpela_mao_paraabpg_coisas');
            $data['g11_vcjapensou_qseufilho_surdo'] = $request->input('vcjapensou_qseufilho_surdo');
            $data['g12_imita_gracinhas'] = $request->input('imita_gracinhas');
            $data['g13_seg_seurosto_polhar_palgdirecao'] = $request->input('seg_seurosto_polhar_palgdirecao');
            $data['g14_atend_champnome'] = $request->input('atend_champnome');
            $data['g14_somente_c_insistencia'] = $request->input('somente_c_insistencia');
            $data['g15_pessestranhas_compseufilho_fala'] = $request->input('pessestranhas_compseufilho_fala');
            $data['g16_seufilho_costrepeultpal_ouvida'] = $request->input('g16seufilho_costrepultpal_ouvida');
            $data['g16_as_vezes'] = $request->input('g16as_vezes');
            $data['g17_fala_baixa'] = $request->input('fala_baixa');
            $data['g17_fala_monotona'] = $request->input('fala_monotona');
            $data['g17_fala_alta'] = $request->input('fala_alta');
            $data['g18_cost_rep_frases_ouvidas'] = $request->input('g18cost_rep_frases_ouvidas');
            $data['g18_as_vezes'] = $request->input('g18as_vezes');
            $data['g19_comb_palaforma_estranha'] = $request->input('g19comb_palaforma_estranha');
            $data['g19_as_vezes'] = $request->input('g19as_vezes');
            $data['g20_cost_insis_pvc_dizer_palavras'] = $request->input('g20cost_insist_pvc_dizer_palavras');
            $data['g20_as_vezes'] = $request->input('g20as_vezes');
            $data['g21_cost_comen_inapropriado'] = $request->input('g21cost_comen_inapropriado');
            $data['g21_as_vezes'] = $request->input('g21as_vezes');
            $data['g21_de_exemplos'] = $request->input('g21_de_exemplos');            
            $data['updated_at'] = now();
            $data['updater_user'] = $user->id;
            $linguagem->update($data);            

            return response()->json([
                'status' => 200,                
            ]);        
    }
    }



}
