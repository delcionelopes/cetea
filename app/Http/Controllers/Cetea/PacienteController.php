<?php

namespace App\Http\Controllers\Cetea;

use App\Http\Controllers\Controller;
use App\Models\ArquivosPaciente;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PacienteController extends Controller
{
    private $paciente;
    private $arquivopaciente;

    public function __construct(Paciente $paciente, ArquivosPaciente $arquivopaciente)
    {
        $this->paciente = $paciente;
        $this->arquivopaciente = $arquivopaciente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(is_null($request->pesquisa)){
            $pacientes = $this->paciente->orderByDesc('id')->paginate(6);
        }else{
            $query = $this->paciente->query()
                          ->where(strtoupper('nome'),'LIKE','%'.strtoupper($request->pesquisa).'%');
            $pacientes = $query->orderByDesc('id')->paginate(6);
        }
        return view('cetea.paciente.index',[
            'pacientes' => $pacientes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cetea.paciente.create');
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
            'nome' => ['required','max:50'],
            'cpf' => ['required','cpf'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $user = auth()->user();
            $data['id'] = $this->maxId();
            $data['cartao_sus'] = $request->input('cartao_sus');
            $data['cpf'] = $this->deixaSomenteDigitos($request->input('cpf'));
            $data['data_avaliacao'] = $request->input('data_avaliacao');
            $data['nome'] = $request->input('nome');
            $data['endereco'] = $request->input('endereco');
            $data['numero'] = $request->input('numero');
            $data['bairro'] = $request->input('bairro');
            $data['cidade'] = $request->input('cidade');
            $data['cep'] = $request->input('cep');
            $data['estado'] = $request->input('estado');
            $data['telefone'] = $request->input('telefone');
            $data['data_nascimento'] = $request->input('data_nascimento');
            $data['sexo'] = $request->input('sexo');
            $data['pai'] = $request->input('pai');
            $data['escolaridade_pai'] = $request->input('escolaridade_pai');
            $data['ocupacao_pai'] = $request->input('ocupacao_pai');
            $data['datanasc_pai'] = $request->input('datanasc_pai');
            $data['mae'] = $request->Input('mae');
            $data['escolaridade_mae'] = $request->input('escolaridade_mae');
            $data['ocupacao_mae'] = $request->input('ocupacao_mae');
            $data['datanasc_mae'] = $request->input('datanasc_mae');
            $data['informante'] = $request->input('informante');
            $data['medicacao_atual'] = $request->input('medicacao_atual');
            $data['medico_responsavel'] = $request->input('medico_responsavel');
            $data['encaminhamentos'] = $request->input('encaminhamentos');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;

            $paciente = $this->paciente->create($data);
            return response()->json([
                'status' => 200,
                'paciente' => $paciente,
                'message' => 'Paciente criado com sucesso!',
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
        $paciente = $this->paciente->find($id);
        return view('cetea.paciente.edit',[            
            'paciente' => $paciente,
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
            'nome' => ['required','max:50'],
            'cpf' => ['required','cpf'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $paciente = $this->paciente->find($id);
            if($paciente){
            $user = auth()->user();            
            $data['cartao_sus'] = $request->input('cartao_sus');
            $data['cpf'] = $this->deixaSomenteDigitos($request->input('cpf'));
            $data['data_avaliacao'] = $request->input('data_avaliacao');
            $data['nome'] = $request->input('nome');
            $data['endereco'] = $request->input('endereco');
            $data['numero'] = $request->input('numero');
            $data['bairro'] = $request->input('bairro');
            $data['cidade'] = $request->input('cidade');
            $data['cep'] = $request->input('cep');
            $data['estado'] = $request->input('estado');
            $data['telefone'] = $request->input('telefone');
            $data['data_nascimento'] = $request->input('data_nascimento');
            $data['sexo'] = $request->input('sexo');
            $data['pai'] = $request->input('pai');
            $data['escolaridade_pai'] = $request->input('escolaridade_pai');
            $data['ocupacao_pai'] = $request->input('ocupacao_pai');
            $data['datanasc_pai'] = $request->input('datanasc_pai');
            $data['mae'] = $request->Input('mae');
            $data['escolaridade_mae'] = $request->input('escolaridade_mae');
            $data['ocupacao_mae'] = $request->input('ocupacao_mae');
            $data['datanasc_mae'] = $request->input('datanasc_mae');
            $data['informante'] = $request->input('informante');
            $data['medicacao_atual'] = $request->input('medicacao_atual');
            $data['medico_responsavel'] = $request->input('medico_responsavel');
            $data['encaminhamentos'] = $request->input('encaminhamentos');            
            $data['updated_at'] = now();            
            $data['updater_user'] = $user->id;

            $paciente->update($data);
            $p = Paciente::find($id);
            return response()->json([
                'status' => 200,
                'paciente' => $p,
                'message' => 'Paciente atualizado com sucesso!',
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
    public function destroy(int $id)
    {
        $paciente = $this->paciente->find($id);

        $tratamentos = $paciente->paciente_tratamento->count();
        $atendimento = $paciente->atendimento->count();
        $anamnese_inicial = $paciente->anamnese_inicial->count();
        $questPaciente = $paciente->quest_paciente->count();
        $anamnese_his_pregressa = $paciente->anamnese_his_pregressa->count();
        $anamnese_desenvolvimento = $paciente->anamnese_desenvolvimento->count();
        $histdes_versaopais_inicial = $paciente->histdes_versaopais_inicial->count();
        $histdes_versaopais_linguagem = $paciente->histdes_versaopais_linguagem->count();
        $histdes_versaopais_desenvsocial = $paciente->histdes_versaopais_desenvsocial->count();
        $histdes_versaopais_brincadeiras = $paciente->histdes_versaopais_brincadeiras->count();
        $histdes_versaopais_comportamentos = $paciente->histdes_versaopais_comportamentos->count();
        $histdes_versaopais_independencia = $paciente->histdes_versaopais_independencia->count();
        $histdes_versaopais_desenvmotor = $paciente->histdes_versaopais_desenvmotor->count();
        $histdes_versaopais_histescolar = $paciente->histdes_versaopais_histescolar->count();
        $histdes_versaopais_compcasa = $paciente->histdes_versaopais_compcasa->count();
        $histdes_anexo1_rotalim = $paciente->histdes_anexo1_rotalim->count();
        $histdes_anexo2_histmedico = $paciente->histdes_anexo2_histmedico->count();
        $histdes_anexo3_infosensoriais = $paciente->histdes_anexo3_infosensoriais->count();
        $histdes_anexo3_r18_docs = $paciente->histdes_anexo3_r18_docs->count();
        $evolucao = $paciente->evolucao->count();
        $mchat = $paciente->mchat->count();

        if($tratamentos || $atendimento || $anamnese_inicial || $questPaciente ||
           $anamnese_his_pregressa || $anamnese_desenvolvimento || $histdes_versaopais_inicial ||
           $histdes_versaopais_linguagem || $histdes_versaopais_desenvsocial || $histdes_versaopais_brincadeiras ||
           $histdes_versaopais_comportamentos || $histdes_versaopais_independencia ||
           $histdes_versaopais_desenvmotor || $histdes_versaopais_histescolar || $histdes_versaopais_compcasa || 
           $histdes_anexo1_rotalim || $histdes_anexo2_histmedico || $histdes_anexo3_infosensoriais || 
           $histdes_anexo3_r18_docs || $evolucao || $mchat){
            return response()->json([
                'status' => 400,
                'errors' => 'Este registro não pode ser excluído! Pois há outros que dependem dele.',
            ]);
           }

           if($paciente->arquivos_paciente->count()>0){
            foreach($paciente->arquivos_paciente as $arqs){
                $this->deleteArquivo($arqs->id);
            }
           }


           $paciente->delete();

           return response()->json([
            'status' => 200,
            'message' => 'Registro excluído com sucesso!',
           ]);

    }

    protected function maxId(){
        $paciente = $this->paciente->orderByDesc('id')->first();
        if($paciente){
            $codigo = $paciente->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }

    protected function deixaSomenteDigitos($input){
        return preg_replace('/[^0-9]/','',$input);
    }

    public function uploadDocs(Request $request, int $id){             
         if ($request->TotalFiles>0) 
         {
           $user = auth()->user();
           $arquivo = $this->arquivopaciente->orderByDesc('id')->first();
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
                    $filePath = 'arquivos_paciente/'.$fileName;
                    $storagePath = public_path().'/storage/arquivos_paciente/';
                    $file->move($storagePath,$fileName);                                                 

                    $maxid++;
                    
                    $data[$x]['id'] = $maxid;                    
                    $data[$x]['paciente_id'] = $id;                    
                    $data[$x]['rotulo'] = $fileLabel;
                    $data[$x]['nome'] = $fileName;
                    $data[$x]['path'] = $filePath;                    
                    $data[$x]['created_at'] = now();
                    $data[$x]['updated_at'] = now();
                    $data[$x]['creater_user'] = $user->id;
                    $data[$x]['updater_user'] = $user->id;
                } 
           }                      
             ArquivosPaciente::insert($data);                                                                  
         }    
             $paciente = $this->paciente->find($id);             
             $arquivos = $paciente->arquivos_paciente;
             return response()->json([
                 'paciente' => $paciente,                 
                 'arquivos' => $arquivos,
                 'status' => 200,                 
             ]);  

    }

    public function deleteDocs(int $id){                
            $arquivo = $this->arquivopaciente->find($id);    
            $pacienteid = $arquivo->paciente_id;
            //deleção do arquivo na pasta /storage/arquivos_paciente/
            if($arquivo){            
            $arquivoPath = public_path('/storage/'.$arquivo->path);
            if(file_exists($arquivoPath)){
                unlink($arquivoPath);
            }    
        }
            //excluir na tabela                             
            $arquivo->delete();
            $paciente = $this->paciente->find($pacienteid);    
            return response()->json([
                'paciente' => $paciente,
                'status' => 200,                
            ]);        
    }

    public function abrirDoc(int $id){
        $arquivo = $this->arquivopaciente->find($id);
        return response()->json([
            'status' => 200,
            'arquivo' => $arquivo,
        ]);
    }  

    public function deleteArquivo(int $id){        
        $arquivo = ArquivosPaciente::find($id);
        $pacienteid = $arquivo->paciente_id;  
        //deleção o arquivo na pasta /storage/arquivos_paciente/   
        $arquivoPath = public_path('/storage/'.$arquivo->path);
        if(file_exists($arquivoPath)){
            unlink($arquivoPath);
        }    
        //excluir na tabela                             
        $arquivo->delete();        
        return true;        
    }
}
