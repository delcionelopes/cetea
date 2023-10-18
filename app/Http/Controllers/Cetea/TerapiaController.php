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

class TerapiaController extends Controller
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
    public function index(Request $request, $color)
    {
        $data = date("Y-m-d");

        $user = auth()->user();

        $medicoterapeuta = $this->medicoterapeuta->whereCpf($user->cpf)->first();        
        
        if(is_null($request->pesquisa)){
            $query = $this->atendimento->query()
                                       ->where('medico_terapeuta_id','=',$medicoterapeuta->id)                                       
                                       ->whereDate('data_atendimento','=',$data);                                     
            $atendimentos = $query->orderBy('data_atendimento')->paginate(10);
        }else{
            $query = $this->atendimento->query()            
                                       ->where('paciente','LIKE','%'.$request->pesquisa.'%')
                                       ->where('medico_terapeuta_id','=',$medicoterapeuta->id)
                                       ->whereDate('data_atendimento','=',$data);                                      
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
        $pacientes = $this->paciente->orderByDesc('id')->get();
        $medicosterapeutas = $this->medicoterapeuta->orderByDesc('id')->get();
        $tiposatendimentos = $this->tipoatendimento->whereIn('id',[2,3])->get();
        $tratamentos = $this->tratamento->orderBy('id')->get();        
        return view('cetea.terapia.edit',[
            'status' => 200,
            'atendimento' => $atendimento,
            'pacientes' => $pacientes,
            'medicosterapeutas' => $medicosterapeutas,
            'tiposatendimentos' => $tiposatendimentos,
            'tratamentos' => $tratamentos,
            'color' => $color,
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

    
}
