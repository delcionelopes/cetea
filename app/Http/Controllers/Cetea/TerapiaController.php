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

public function storeHistDesVersaoPaisDesenvSocial(Request $request){
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
            $data['id'] = $this->maxId_HistDesVersaoPaisDesenvSocial();
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['h1_idade_prim_sorrisos'] = $request->input('h1_idade_prim_sorrisos');
            $data['h2_olha_p_face_qdobrinca_c_ele'] = $request->input('h2_olha_p_face_qdobrinca_c_ele');
            $data['h2_obs'] = $request->input('h2_obs');
            $data['h3_sorriso_esp_pess_familiares'] = $request->input('h3_sorriso_esp_pess_familiares');
            $data['h3_obs'] = $request->input('h3_obs');
            $data['h4_sorriso_esp_pess_nfamiliares'] = $request->input('h4_sorriso_esp_pess_nfamiliares');
            $data['h4_obs'] = $request->input('h4_obs');
            $data['h5_sorria_em_resp_sorriso'] = $request->input('h5_sorria_em_resp_sorriso');
            $data['h5_obs'] = $request->input('h5_obs');
            $data['h6_vc_conseg_ident_exp_faciais_nfilho'] = $request->input('h6_vc_conseg_ident_exp_faciais_nfilho');
            $data['h6_obs'] = $request->input('h6_obs');
            $data['h7_apres_expr_emo_contexto'] = $request->input('h7_apres_expr_emo_contexto');
            $data['h7_obs'] = $request->input('h7_obs');
            $data['h8_compartilha_interesses'] = $request->input('h8_compartilha_interesses');
            $data['h8_obs'] = $request->input('h8_obs');
            $data['h9_dem_preoc_cpais'] = $request->input('h9_dem_preoc_cpais');
            $data['h9_obs'] = $request->input('h9_obs');
            $data['h10_fazcoment_verbais_ou_gestos'] = $request->input('h10_fazcoment_verbais_ou_gestos');
            $data['h10_obs'] = $request->input('h10_obs');
            $data['h11_olha_p_ondevc_olhando'] = $request->input('h11_olha_p_ondevc_olhando');
            $data['h11_obs'] = $request->input('h11_obs');
            $data['h12_olha_p_ondevc_aponta'] = $request->input('h12_olha_p_ondevc_aponta');
            $data['h12_obs'] = $request->input('h12_obs');
            $data['h13_resp_conv_p_brincarcadultos'] = $request->input('h13_resp_conv_p_brincarcadultos');
            $data['h13_apos_insistencia'] = $request->input('h13_apos_insistencia');
            $data['h13_obs'] = $request->input('h13_obs');
            $data['h14_resp_conv_p_brincarccriancas'] = $request->input('h14_resp_conv_p_brincarccriancas');
            $data['h14_apos_insistencia'] = $request->input('h14_apos_insistencia');
            $data['h14_obs'] = $request->input('h14_obs');
            $data['h15_busca_comp_out_criancas'] = $request->input('h15_busca_comp_out_criancas');
            $data['h15_obs'] = $request->input('h15_obs');
            $data['h16_cm_reag_a_criancasdesc_festa'] = $request->input('h16_cm_reag_a_criancasdesc_festa');
            $data['h16_fica_ansioso'] = $request->input('h16_fica_ansioso');
            $data['h17_perm_som_algtipo_brinc'] = $request->input('h17_perm_som_algtipo_brinc');
            $data['h17_obs'] = $request->input('h17_obs');
            $data['h18_pref_brinc_par_nfc_vontemgr'] = $request->input('h18_pref_brinc_par_nfc_vontemgr');
            $data['h18_obs'] = $request->input('h18_obs');
            $data['h19_evita_ctt_c_pessoas'] = $request->input('h19_evita_ctt_c_pessoas');
            $data['h19_obs'] = $request->input('h19_obs');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $this->histdes_versaopais_desenvsocial->create($data);

            return response()->json([
                'status' => 200,
            ]);

        }
    }    

    protected function maxId_HistDesVersaoPaisDesenvSocial(){
        $histdes_versaopais_desenvsocial = $this->histdes_versaopais_desenvsocial->orderByDesc('id')->first();
        if($histdes_versaopais_desenvsocial){
            $codigo = $histdes_versaopais_desenvsocial->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

    public function editHistDesVersaoPaisDesenvSocial(int $id){
        $busca_pelo_paciente = $this->histdes_versaopais_desenvsocial->wherePaciente_id($id)->first();        
        $histdes_versaopais_desenvsocial = $this->histdes_versaopais_desenvsocial->find($busca_pelo_paciente->id);
        return response()->json([
            'status' => 200,
            'histdesversaopaisdesenvsocial' => $histdes_versaopais_desenvsocial,
        ]);
    }

    public function updateHistDesVersaoPaisDesenvSocial(Request $request, int $id){
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
            $busca_pelo_paciente = $this->histdes_versaopais_desenvsocial->wherePaciente_id($id)->first();
            $desenvsocial = $this->histdes_versaopais_desenvsocial->find($busca_pelo_paciente->id);
            $user = auth()->user();            
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['h1_idade_prim_sorrisos'] = $request->input('h1_idade_prim_sorrisos');
            $data['h2_olha_p_face_qdobrinca_c_ele'] = $request->input('h2_olha_p_face_qdobrinca_c_ele');
            $data['h2_obs'] = $request->input('h2_obs');
            $data['h3_sorriso_esp_pess_familiares'] = $request->input('h3_sorriso_esp_pess_familiares');
            $data['h3_obs'] = $request->input('h3_obs');
            $data['h4_sorriso_esp_pess_nfamiliares'] = $request->input('h4_sorriso_esp_pess_nfamiliares');
            $data['h4_obs'] = $request->input('h4_obs');
            $data['h5_sorria_em_resp_sorriso'] = $request->input('h5_sorria_em_resp_sorriso');
            $data['h5_obs'] = $request->input('h5_obs');
            $data['h6_vc_conseg_ident_exp_faciais_nfilho'] = $request->input('h6_vc_conseg_ident_exp_faciais_nfilho');
            $data['h6_obs'] = $request->input('h6_obs');
            $data['h7_apres_expr_emo_contexto'] = $request->input('h7_apres_expr_emo_contexto');
            $data['h7_obs'] = $request->input('h7_obs');
            $data['h8_compartilha_interesses'] = $request->input('h8_compartilha_interesses');
            $data['h8_obs'] = $request->input('h8_obs');
            $data['h9_dem_preoc_cpais'] = $request->input('h9_dem_preoc_cpais');
            $data['h9_obs'] = $request->input('h9_obs');
            $data['h10_fazcoment_verbais_ou_gestos'] = $request->input('h10_fazcoment_verbais_ou_gestos');
            $data['h10_obs'] = $request->input('h10_obs');
            $data['h11_olha_p_ondevc_olhando'] = $request->input('h11_olha_p_ondevc_olhando');
            $data['h11_obs'] = $request->input('h11_obs');
            $data['h12_olha_p_ondevc_aponta'] = $request->input('h12_olha_p_ondevc_aponta');
            $data['h12_obs'] = $request->input('h12_obs');
            $data['h13_resp_conv_p_brincarcadultos'] = $request->input('h13_resp_conv_p_brincarcadultos');
            $data['h13_apos_insistencia'] = $request->input('h13_apos_insistencia');
            $data['h13_obs'] = $request->input('h13_obs');
            $data['h14_resp_conv_p_brincarccriancas'] = $request->input('h14_resp_conv_p_brincarccriancas');
            $data['h14_apos_insistencia'] = $request->input('h14_apos_insistencia');
            $data['h14_obs'] = $request->input('h14_obs');
            $data['h15_busca_comp_out_criancas'] = $request->input('h15_busca_comp_out_criancas');
            $data['h15_obs'] = $request->input('h15_obs');
            $data['h16_cm_reag_a_criancasdesc_festa'] = $request->input('h16_cm_reag_a_criancasdesc_festa');
            $data['h16_fica_ansioso'] = $request->input('h16_fica_ansioso');
            $data['h17_perm_som_algtipo_brinc'] = $request->input('h17_perm_som_algtipo_brinc');
            $data['h17_obs'] = $request->input('h17_obs');
            $data['h18_pref_brinc_par_nfc_vontemgr'] = $request->input('h18_pref_brinc_par_nfc_vontemgr');
            $data['h18_obs'] = $request->input('h18_obs');
            $data['h19_evita_ctt_c_pessoas'] = $request->input('h19_evita_ctt_c_pessoas');
            $data['h19_obs'] = $request->input('h19_obs');           
            $data['updated_at'] = now();
            $data['updater_user'] = $user->id;
            $desenvsocial->update($data);            

            return response()->json([
                'status' => 200,                
            ]);        
    }
    }

public function storeHistDesVersaoPaisBrincadeiras(Request $request){
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
            $data['id'] = $this->maxId_HistDesVersaoPaisBrincadeiras();
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['i1_brincadeira_favorita'] = $request->input('l1_brincadeira_favorita');
            $data['i2_brinquedos_favoritos'] = $request->input('l2_brinquedos_favoritos');
            $data['i3_vc_o_considera_obcecado'] = $request->input('l3_vc_o_considera_obcecado');
            $data['i3_ele_ja_foi_obcecado_por_algo'] = $request->input('l3_ele_ja_foi_obcecado_por_algo');
            $data['i4_tem_inter_p_cheiro_textura'] = $request->input('l4_tem_inter_p_cheiro_textura');
            $data['i4_obs'] = $request->input('l4_obs');
            $data['i5_brinca_de_form_repet'] = $request->input('l5_brinca_de_form_repet');
            $data['i5_obs'] = $request->input('l5_obs');
            $data['i6_brinca_de_form_func'] = $request->input('l6_brinca_de_form_func');
            $data['i6_obs'] = $request->input('l6_obs');
            $data['i7_brinca_de_form_simb_mini'] = $request->input('l7_brinca_de_form_simb_mini');
            $data['i7_obs'] = $request->input('l7_obs');
            $data['i8_brinca_de_form_simb_objetos'] = $request->input('l8_brinca_de_form_simb_objetos');
            $data['i8_obs'] = $request->input('l8_obs');
            $data['i9_brinca_de_form_simb_atrpapeis'] = $request->input('l9_brinca_de_form_simb_atrpapeis');
            $data['i9_obs'] = $request->input('l9_obs');
            $data['i10_segue_regras_de_brincadeiras'] = $request->input('l10_segue_regras_de_brincadeiras');
            $data['i10_obs'] = $request->input('l10_obs');
            $data['i11_bom_fazer_amizades'] = $request->input('l11_bom_fazer_amizades');
            $data['i11_obs'] = $request->input('l11_obs');
            $data['i12_e_solitario'] = $request->input('l12_e_solitario');
            $data['i12_obs'] = $request->input('l12_obs');
            $data['i13_e_timido'] = $request->input('l13_e_timido');
            $data['i13_obs'] = $request->input('l13_obs');
            $data['i14_tem_melhor_amigo'] = $request->input('l14_tem_melhor_amigo');
            $data['i14_obs'] = $request->input('l14_obs');
            $data['i15_prefer_criancas_mesma_idade'] = $request->input('l15_prefer_criancas_mesma_idade');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $this->histdes_versaopais_brincadeiras->create($data);

            return response()->json([
                'status' => 200,
            ]);

        }
    }    

    protected function maxId_HistDesVersaoPaisBrincadeiras(){
        $histdes_versaopais_brincadeiras = $this->histdes_versaopais_brincadeiras->orderByDesc('id')->first();
        if($histdes_versaopais_brincadeiras){
            $codigo = $histdes_versaopais_brincadeiras->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

    public function editHistDesVersaoPaisBrincadeiras(int $id){
        $busca_pelo_paciente = $this->histdes_versaopais_brincadeiras->wherePaciente_id($id)->first();        
        $histdes_versaopais_brincadeiras = $this->histdes_versaopais_brincadeiras->find($busca_pelo_paciente->id);
        return response()->json([
            'status' => 200,
            'histdesversaopaisbrincadeiras' => $histdes_versaopais_brincadeiras,
        ]);
    }

    public function updateHistDesVersaoPaisBrincadeiras(Request $request, int $id){
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
            $busca_pelo_paciente = $this->histdes_versaopais_brincadeiras->wherePaciente_id($id)->first();
            $brincadeiras = $this->histdes_versaopais_brincadeiras->find($busca_pelo_paciente->id);
            $user = auth()->user();            
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['i1_brincadeira_favorita'] = $request->input('l1_brincadeira_favorita');
            $data['i2_brinquedos_favoritos'] = $request->input('l2_brinquedos_favoritos');
            $data['i3_vc_o_considera_obcecado'] = $request->input('l3_vc_o_considera_obcecado');
            $data['i3_ele_ja_foi_obcecado_por_algo'] = $request->input('l3_ele_ja_foi_obcecado_por_algo');
            $data['i4_tem_inter_p_cheiro_textura'] = $request->input('l4_tem_inter_p_cheiro_textura');
            $data['i4_obs'] = $request->input('l4_obs');
            $data['i5_brinca_de_form_repet'] = $request->input('l5_brinca_de_form_repet');
            $data['i5_obs'] = $request->input('l5_obs');
            $data['i6_brinca_de_form_func'] = $request->input('l6_brinca_de_form_func');
            $data['i6_obs'] = $request->input('l6_obs');
            $data['i7_brinca_de_form_simb_mini'] = $request->input('l7_brinca_de_form_simb_mini');
            $data['i7_obs'] = $request->input('l7_obs');
            $data['i8_brinca_de_form_simb_objetos'] = $request->input('l8_brinca_de_form_simb_objetos');
            $data['i8_obs'] = $request->input('l8_obs');
            $data['i9_brinca_de_form_simb_atrpapeis'] = $request->input('l9_brinca_de_form_simb_atrpapeis');
            $data['i9_obs'] = $request->input('l9_obs');
            $data['i10_segue_regras_de_brincadeiras'] = $request->input('l10_segue_regras_de_brincadeiras');
            $data['i10_obs'] = $request->input('l10_obs');
            $data['i11_bom_fazer_amizades'] = $request->input('l11_bom_fazer_amizades');
            $data['i11_obs'] = $request->input('l11_obs');
            $data['i12_e_solitario'] = $request->input('l12_e_solitario');
            $data['i12_obs'] = $request->input('l12_obs');
            $data['i13_e_timido'] = $request->input('l13_e_timido');
            $data['i13_obs'] = $request->input('l13_obs');
            $data['i14_tem_melhor_amigo'] = $request->input('l14_tem_melhor_amigo');
            $data['i14_obs'] = $request->input('l14_obs');
            $data['i15_prefer_criancas_mesma_idade'] = $request->input('l15_prefer_criancas_mesma_idade');        
            $data['updated_at'] = now();
            $data['updater_user'] = $user->id;
            $brincadeiras->update($data);            

            return response()->json([
                'status' => 200,                
            ]);        
    }
    }

public function storeHistDesVersaoPaisComportamentos(Request $request){
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
            $data['id'] = $this->maxId_HistDesVersaoPaisComportamentos();
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['j1_alinha_enfileira_objetos'] = $request->input('j1_alinha_enfileira_objetos');
            $data['j1_obs'] = $request->input('j1_obs');
            $data['j2_empilha_objetos'] = $request->input('j2_empilha_objetos');
            $data['j2_obs'] = $request->input('j2_obs');
            $data['j3_abrefecha_gav_port'] = $request->input('j3_abrefecha_gav_port');
            $data['j3_obs'] = $request->input('j3_obs');
            $data['j4_apagaacende_luz'] = $request->input('j4_apagaacende_luz');            
            $data['j4_obs'] = $request->input('j4_obs');
            $data['j5_inter_objetos_giram'] = $request->input('j5_inter_objetos_giram');
            $data['j5_obs'] = $request->input('j5_obs');
            $data['j6_outras_manias'] = $request->input('j6_outras_manias');
            $data['j7_inter_objetos_giram_2'] = $request->input('j7_inter_objetos_giram_2');
            $data['j7_reacao_quando_interr'] = $request->input('j7_reacao_quando_interr');
            $data['j8_brinca_form_simbol_insist'] = $request->input('j8_brinca_form_simbol_insist');
            $data['j8_obs'] = $request->input('j8_obs');
            $data['j9_resiste_mud_rotina'] = $request->input('j9_resiste_mud_rotina');
            $data['j9_obs'] = $request->input('j9_obs');
            $data['j10_gosta_msm_ordem_horario'] = $request->input('j10_gosta_msm_ordem_horario');
            $data['j10_obs'] = $request->input('j10_obs');
            $data['j11_ritual_ordem_determinada'] = $request->input('j11_ritual_ordem_determinada');
            $data['j11_obs'] = $request->input('j11_obs');
            $data['j12_coisas_msm_lugar'] = $request->input('j12_coisas_msm_lugar');
            $data['j12_obs'] = $request->input('j12_obs');
            $data['j13_gstmsm_roupas_alim_lugar'] = $request->input('j13_gstmsm_roupas_alim_lugar');
            $data['j13_obs'] = $request->input('j13_obs');
            $data['j14_cm_reage_frustr_contr'] = $request->input('j14_cm_reage_frustr_contr');
            $data['j15_chup_os_dedos'] = $request->input('j15_chup_os_dedos');
            $data['j15_roe_unhas'] = $request->input('j15_roe_unhas');
            $data['j15_estalar_dedos'] = $request->input('j15_estalar_dedos');
            $data['j15_morder_labios'] = $request->input('j15_morder_labios');
            $data['j15_mast_publico'] = $request->input('j15_mast_publico');
            $data['j15_torce_cabelo'] = $request->input('j15_torce_cabelo');
            $data['j15_balanc_corpo'] = $request->input('j15_balanc_corpo');
            $data['j15_bater_maos'] = $request->input('j15_bater_maos');
            $data['j15_flapping_maos'] = $request->input('j15_flapping_maos');
            $data['j15_andar_ponta_pes'] = $request->input('j15_andar_ponta_pes');
            $data['j15_flex_ext_punhos'] = $request->input('j15_flex_ext_punhos');
            $data['j15_morde_pp_corpo'] = $request->input('j15_morde_pp_corpo');
            $data['j15_bater_a_cabeca'] = $request->input('j15_bater_a_cabeca');
            $data['j15_outros'] = $request->input('j15_outros');
            $data['j16_sensivel_barulho'] = $request->input('j16_sensivel_barulho');
            $data['j16_obs'] = $request->input('j16_obs');
            $data['j17_tocarcheirarabracarinadpessobj'] = $request->input('j17_tocarcheirarabracarinadpessobj');
            $data['j17_obs'] = $request->input('j17_obs');
            $data['j18_par_nsentir_dor_frio'] = $request->input('j18_par_nsentir_dor_frio');
            $data['j18_obs'] = $request->input('j18_obs');
            $data['j19_fascinado_luzes'] = $request->input('j19_fascinado_luzes');
            $data['j19_obs'] = $request->input('j19_obs');
            $data['j20_sensivel_ao_toque'] = $request->input('j20_sensivel_ao_toque');
            $data['j20_obs'] = $request->input('j20_obs');
            $data['j21_texturas_incomodam'] = $request->input('j21_texturas_incomodam');
            $data['j21_obs'] = $request->input('j21_obs');
            $data['j22_reacao_text_alim'] = $request->input('j22_reacao_text_alim');
            $data['j22_obs'] = $request->input('j22_obs');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $this->histdes_versaopais_comportamentos->create($data);

            return response()->json([
                'status' => 200,
            ]);

        }
    }    

    protected function maxId_HistDesVersaoPaisComportamentos(){
        $histdes_versaopais_comportamentos = $this->histdes_versaopais_comportamentos->orderByDesc('id')->first();
        if($histdes_versaopais_comportamentos){
            $codigo = $histdes_versaopais_comportamentos->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

    public function editHistDesVersaoPaisComportamentos(int $id){
        $busca_pelo_paciente = $this->histdes_versaopais_comportamentos->wherePaciente_id($id)->first();        
        $histdes_versaopais_comportamentos = $this->histdes_versaopais_comportamentos->find($busca_pelo_paciente->id);
        return response()->json([
            'status' => 200,
            'histdesversaopaiscomportamentos' => $histdes_versaopais_comportamentos,
        ]);
    }

    public function updateHistDesVersaoPaisComportamentos(Request $request, int $id){
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
            $busca_pelo_paciente = $this->histdes_versaopais_comportamentos->wherePaciente_id($id)->first();
            $comportamentos = $this->histdes_versaopais_comportamentos->find($busca_pelo_paciente->id);
            $user = auth()->user();            
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['j1_alinha_enfileira_objetos'] = $request->input('j1_alinha_enfileira_objetos');
            $data['j1_obs'] = $request->input('j1_obs');
            $data['j2_empilha_objetos'] = $request->input('j2_empilha_objetos');
            $data['j2_obs'] = $request->input('j2_obs');
            $data['j3_abrefecha_gav_port'] = $request->input('j3_abrefecha_gav_port');
            $data['j3_obs'] = $request->input('j3_obs');
            $data['j4_apagaacende_luz'] = $request->input('j4_apagaacende_luz');            
            $data['j4_obs'] = $request->input('j4_obs');
            $data['j5_inter_objetos_giram'] = $request->input('j5_inter_objetos_giram');
            $data['j5_obs'] = $request->input('j5_obs');
            $data['j6_outras_manias'] = $request->input('j6_outras_manias');
            $data['j7_inter_objetos_giram_2'] = $request->input('j7_inter_objetos_giram_2');
            $data['j7_reacao_quando_interr'] = $request->input('j7_reacao_quando_interr');
            $data['j8_brinca_form_simbol_insist'] = $request->input('j8_brinca_form_simbol_insist');
            $data['j8_obs'] = $request->input('j8_obs');
            $data['j9_resiste_mud_rotina'] = $request->input('j9_resiste_mud_rotina');
            $data['j9_obs'] = $request->input('j9_obs');
            $data['j10_gosta_msm_ordem_horario'] = $request->input('j10_gosta_msm_ordem_horario');
            $data['j10_obs'] = $request->input('j10_obs');
            $data['j11_ritual_ordem_determinada'] = $request->input('j11_ritual_ordem_determinada');
            $data['j11_obs'] = $request->input('j11_obs');
            $data['j12_coisas_msm_lugar'] = $request->input('j12_coisas_msm_lugar');
            $data['j12_obs'] = $request->input('j12_obs');
            $data['j13_gstmsm_roupas_alim_lugar'] = $request->input('j13_gstmsm_roupas_alim_lugar');
            $data['j13_obs'] = $request->input('j13_obs');
            $data['j14_cm_reage_frustr_contr'] = $request->input('j14_cm_reage_frustr_contr');
            $data['j15_chup_os_dedos'] = $request->input('j15_chup_os_dedos');
            $data['j15_roe_unhas'] = $request->input('j15_roe_unhas');
            $data['j15_estalar_dedos'] = $request->input('j15_estalar_dedos');
            $data['j15_morder_labios'] = $request->input('j15_morder_labios');
            $data['j15_mast_publico'] = $request->input('j15_mast_publico');
            $data['j15_torce_cabelo'] = $request->input('j15_torce_cabelo');
            $data['j15_balanc_corpo'] = $request->input('j15_balanc_corpo');
            $data['j15_bater_maos'] = $request->input('j15_bater_maos');
            $data['j15_flapping_maos'] = $request->input('j15_flapping_maos');
            $data['j15_andar_ponta_pes'] = $request->input('j15_andar_ponta_pes');
            $data['j15_flex_ext_punhos'] = $request->input('j15_flex_ext_punhos');
            $data['j15_morde_pp_corpo'] = $request->input('j15_morde_pp_corpo');
            $data['j15_bater_a_cabeca'] = $request->input('j15_bater_a_cabeca');
            $data['j15_outros'] = $request->input('j15_outros');
            $data['j16_sensivel_barulho'] = $request->input('j16_sensivel_barulho');
            $data['j16_obs'] = $request->input('j16_obs');
            $data['j17_tocarcheirarabracarinadpessobj'] = $request->input('j17_tocarcheirarabracarinadpessobj');
            $data['j17_obs'] = $request->input('j17_obs');
            $data['j18_par_nsentir_dor_frio'] = $request->input('j18_par_nsentir_dor_frio');
            $data['j18_obs'] = $request->input('j18_obs');
            $data['j19_fascinado_luzes'] = $request->input('j19_fascinado_luzes');
            $data['j19_obs'] = $request->input('j19_obs');
            $data['j20_sensivel_ao_toque'] = $request->input('j20_sensivel_ao_toque');
            $data['j20_obs'] = $request->input('j20_obs');
            $data['j21_texturas_incomodam'] = $request->input('j21_texturas_incomodam');
            $data['j21_obs'] = $request->input('j21_obs');
            $data['j22_reacao_text_alim'] = $request->input('j22_reacao_text_alim');
            $data['j22_obs'] = $request->input('j22_obs');        
            $data['updated_at'] = now();
            $data['updater_user'] = $user->id;
            $comportamentos->update($data);            

            return response()->json([
                'status' => 200,                
            ]);        
    }
    }

//////////////////

public function storeHistDesVersaoPaisIndependencia(Request $request){
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
            $data['id'] = $this->maxId_HistDesVersaoPaisIndependencia();
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['j1_veste_roupa_soz'] = $request->input('j1_veste_roupa_soz');
            $data['j1_parcial'] = $request->input('j1_parcial');
            $data['j1_obs'] = $request->input('j1_obs');
            $data['j2_retira_roupa_soz'] = $request->input('j2_retira_roupa_soz');
            $data['j2_parcial'] = $request->input('j2_parcial');
            $data['j2_obs'] = $request->input('j2_obs');
            $data['j3_toma_banho_soz'] = $request->input('j3_toma_banho_soz');
            $data['j3_parcial'] = $request->input('j3_parcial');
            $data['j3_obs'] = $request->input('j3_obs');
            $data['j4_jg_lenc_pp_no_lix'] = $request->input('j4_jg_lenc_pp_no_lix');
            $data['j4_obs'] = $request->input('j4_obs');
            $data['j6_come_ref_na_mesa'] = $request->input('j6_come_ref_na_mesa');
            $data['j6_obs'] = $request->input('j6_obs');
            $data['j7_usa_colher_ind'] = $request->input('j7_usa_colher_ind');
            $data['j7_obs'] = $request->input('j7_obs');
            $data['j8_usa_garfo_ind'] = $request->input('j8_usa_garfo_ind');
            $data['j8_obs'] = $request->input('j8_obs');
            $data['j9_tol_nov_alim'] = $request->input('j9_tol_nov_alim');
            $data['j9_obs'] = $request->input('j9_obs');
            $data['j10_usacopo_aberto'] = $request->input('j10_usacopo_aberto');
            $data['j10_obs'] = $request->input('j10_obs');
            $data['j11_perm_parc_mesa'] = $request->input('j11_perm_parc_mesa');
            $data['j11_obs'] = $request->input('j11_obs');
            $data['j12_desp_roup_ind'] = $request->input('j12_desp_roup_ind');
            $data['j12_obs'] = $request->input('j12_obs');
            $data['j13_limpa_nariz'] = $request->input('j13_limpa_nariz');
            $data['j13_obs'] = $request->input('j13_obs');
            $data['j14_usa_garf_cpab_sderr'] = $request->input('j14_usa_garf_cpab_sderr');
            $data['j14_obs'] = $request->input('j14_obs');
            $data['j15_abrefecha_moch_lanch_aut'] = $request->input('j15_abrefecha_moch_lanch_aut');
            $data['j15_obs'] = $request->input('j15_obs');
            $data['j16_usa_banh_aut'] = $request->input('j16_usa_banh_aut');
            $data['j16_obs'] = $request->input('j16_obs');
            $data['j17_tp_boca_qdtoss_esp'] = $request->input('j17_tp_boca_qdtoss_esp');
            $data['j17_obs'] = $request->input('j17_obs');
            $data['j18_ajuda_escovacao'] = $request->input('j18_ajuda_escovacao');
            $data['j18_obs'] = $request->input('j18_obs');
            $data['j19_de_detalhes_aut'] = $request->input('j19_de_detalhes_aut');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $this->histdes_versaopais_independencia->create($data);

            return response()->json([
                'status' => 200,
            ]);

        }
    }    

    protected function maxId_HistDesVersaoPaisIndependencia(){
        $histdes_versaopais_independencia = $this->histdes_versaopais_independencia->orderByDesc('id')->first();
        if($histdes_versaopais_independencia){
            $codigo = $histdes_versaopais_independencia->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

    public function editHistDesVersaoPaisIndependencia(int $id){
        $busca_pelo_paciente = $this->histdes_versaopais_independencia->wherePaciente_id($id)->first();        
        $histdes_versaopais_independencia = $this->histdes_versaopais_independencia->find($busca_pelo_paciente->id);
        return response()->json([
            'status' => 200,
            'histdesversaopaisindependencia' => $histdes_versaopais_independencia,
        ]);
    }

    public function updateHistDesVersaoPaisIndependencia(Request $request, int $id){
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
            $busca_pelo_paciente = $this->histdes_versaopais_independencia->wherePaciente_id($id)->first();
            $independencia = $this->histdes_versaopais_independencia->find($busca_pelo_paciente->id);
            $user = auth()->user();            
            $data['atendimento_id'] = $request->input('atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $data['j1_veste_roupa_soz'] = $request->input('j1_veste_roupa_soz');
            $data['j1_parcial'] = $request->input('j1_parcial');
            $data['j1_obs'] = $request->input('j1_obs');
            $data['j2_retira_roupa_soz'] = $request->input('j2_retira_roupa_soz');
            $data['j2_parcial'] = $request->input('j2_parcial');
            $data['j2_obs'] = $request->input('j2_obs');
            $data['j3_toma_banho_soz'] = $request->input('j3_toma_banho_soz');
            $data['j3_parcial'] = $request->input('j3_parcial');
            $data['j3_obs'] = $request->input('j3_obs');
            $data['j4_jg_lenc_pp_no_lix'] = $request->input('j4_jg_lenc_pp_no_lix');
            $data['j4_obs'] = $request->input('j4_obs');
            $data['j6_come_ref_na_mesa'] = $request->input('j6_come_ref_na_mesa');
            $data['j6_obs'] = $request->input('j6_obs');
            $data['j7_usa_colher_ind'] = $request->input('j7_usa_colher_ind');
            $data['j7_obs'] = $request->input('j7_obs');
            $data['j8_usa_garfo_ind'] = $request->input('j8_usa_garfo_ind');
            $data['j8_obs'] = $request->input('j8_obs');
            $data['j9_tol_nov_alim'] = $request->input('j9_tol_nov_alim');
            $data['j9_obs'] = $request->input('j9_obs');
            $data['j10_usacopo_aberto'] = $request->input('j10_usacopo_aberto');
            $data['j10_obs'] = $request->input('j10_obs');
            $data['j11_perm_parc_mesa'] = $request->input('j11_perm_parc_mesa');
            $data['j11_obs'] = $request->input('j11_obs');
            $data['j12_desp_roup_ind'] = $request->input('j12_desp_roup_ind');
            $data['j12_obs'] = $request->input('j12_obs');
            $data['j13_limpa_nariz'] = $request->input('j13_limpa_nariz');
            $data['j13_obs'] = $request->input('j13_obs');
            $data['j14_usa_garf_cpab_sderr'] = $request->input('j14_usa_garf_cpab_sderr');
            $data['j14_obs'] = $request->input('j14_obs');
            $data['j15_abrefecha_moch_lanch_aut'] = $request->input('j15_abrefecha_moch_lanch_aut');
            $data['j15_obs'] = $request->input('j15_obs');
            $data['j16_usa_banh_aut'] = $request->input('j16_usa_banh_aut');
            $data['j16_obs'] = $request->input('j16_obs');
            $data['j17_tp_boca_qdtoss_esp'] = $request->input('j17_tp_boca_qdtoss_esp');
            $data['j17_obs'] = $request->input('j17_obs');
            $data['j18_ajuda_escovacao'] = $request->input('j18_ajuda_escovacao');
            $data['j18_obs'] = $request->input('j18_obs');
            $data['j19_de_detalhes_aut'] = $request->input('j19_de_detalhes_aut');  
            $data['updated_at'] = now();
            $data['updater_user'] = $user->id;
            $independencia->update($data);            

            return response()->json([
                'status' => 200,                
            ]);        
    }
    }



}
