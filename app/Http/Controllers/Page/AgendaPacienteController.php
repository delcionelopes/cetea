<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Atendimento;
use App\Models\Feriado;
use App\Models\Medico_Terapeuta;
use App\Models\Paciente;
use App\Models\Tipo_Atendimento;
use App\Models\Tratamento;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgendaPacienteController extends Controller
{
    private $paciente;
    private $atendimento;
    private $medicoterapeuta;
    private $tratamento;
    private $tipo_atendimento;
    private $feriado;

    public function __construct(Paciente $paciente, Atendimento $atendimento, Medico_Terapeuta $medicoterapeuta, 
                                Tratamento $tratamento, Tipo_Atendimento $tipo_atendimento, Feriado $feriado)
    {
        $this->paciente = $paciente;
        $this->atendimento = $atendimento;
        $this->medicoterapeuta = $medicoterapeuta;
        $this->tratamento = $tratamento;
        $this->tipo_atendimento = $tipo_atendimento;
        $this->feriado = $feriado;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $user = auth()->user();
        $paciente = $this->paciente->whereCpf($user->cpf)->first();        
        $medicosterapeutas = $this->medicoterapeuta->orderByDesc('id')->get();
        $tratamentos = $this->tratamento->orderBy('id')->get();        
        $query = $this->atendimento->where('paciente_id','=',$paciente->id)
                                   ->where('atendido','=',0)     
                                   ->where(function($query){
                                    $query->whereDate('data_retorno','>=',date("Y-m-d"))
                                          ->orwhereDate('data_encaminhamento','>=',date("Y-m-d"))
                                          ->orwhereDate('data_agonline','>=',date("Y-m-d"))
                                          ->orwhereDate('data_agendamento','>=',date("Y-m-d"));
                                   });
        $atendimentos = $query->orderBy('data_atendimento')->paginate(2);

        if($atendimentos->count()){
            $iscreate = false;
        }else{
            $iscreate = true;
        }

        $ispaciente = true;        

        return view('page.agenda.index',[
            'atendimentos' => $atendimentos,
            'paciente' => $paciente,
            'medicosterapeutas' => $medicosterapeutas,
            'tratamentos' => $tratamentos,
            'ispaciente' => $ispaciente,
            'iscreate' => $iscreate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        date_default_timezone_set('America/Sao_Paulo');
        
        $medicosterapeutas = $this->medicoterapeuta->orderByDesc('id')->get();
        $tratamentos = $this->tratamento->orderBy('id')->get();

        $user = auth()->user();        
        $paciente = $this->paciente->whereCpf($user->cpf)->first();

        $ispaciente = true;                
            return view('page.agenda.create',[
                'status' => 200,
                'paciente' => $paciente,
                'medicosterapeutas' => $medicosterapeutas,
                'tratamentos' => $tratamentos,
                'ispaciente' => $ispaciente,
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
            'data' => ['required','date'],
            'terapeuta' => ['required'],
            'tratamento' => ['required'],            
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{            

                if(date('w',strtotime($request->input('data')))==0 || date('w',strtotime($request->input('data')))==6){
                    return response()->json([
                        'status' => 401,
                        'message' => 'O agendamento não pode ser em fim de semana! Não tem expediente.',
                    ]);
                }

                if(strtotime($request->input('data'))<strtotime(date('Y-m-d'))){
                    return response()->json([
                        'status' => 401,
                        'message' => 'O agendamento não pode ser anterior à data de hoje!',
                    ]);
                }

                 $tipo_atendimento = $this->tipo_atendimento->find(5);

                 $query = $this->atendimento->where('atendido','=',0)     
                                       ->where('data_agonline','=',$request->input('data'));
                 $atendimento = $query->get();
                 $contaAtendimento = $atendimento->count();

                 if($contaAtendimento==$tipo_atendimento->vagas_limite){
                    return response()->json([
                        'status' => 401,
                        'message' => 'Para esta data o agendamento on-line atingiu o limite! Escolha uma data VERDE.',
                    ]);
                 }    


                $user = auth()->user();
                $id = $this->maxId();
                $yesterday = \Carbon\Carbon::yesterday(); //armazena a data de ontem porque agendamento online não pode aparecer no expediente da data atual
                $data['id'] = $id;
                $data['tipo_atendimento_id'] = 5;
                $data['medico_terapeuta_id'] = $request->input('terapeuta');
                $data['tratamento_id'] = $request->input('tratamento');
                $data['paciente_id'] = $request->input('paciente');
                $data['atendido'] = 0;
                $paciente = $this->paciente->find($request->input('paciente'));
                $data['paciente'] = $paciente->nome;
                $data['responsavel_do_paciente'] = strtoupper($request->input('responsavel'));
                $data['responsavel_parentesco'] = strtoupper($request->input('parentesco'));                                
                $data['data_atendimento'] = $yesterday;
                $data['data_agonline'] = $request->input('data');                
                $data['created_at'] = now();
                $data['updated_at'] = null;
                $data['creater_user'] = $user->id;
                $data['updater_user'] = null;
                $atendimento = $this->atendimento->create($data);
                $terapeuta = $atendimento->medico_terapeuta;
                $tipo_atendimento = $atendimento->tipo_atendimento;
                return response()->json([
                    'status' => 200,
                    'atendimento' => $atendimento,
                    'medico_terapeuta' => $terapeuta,
                    'tipo_atendimento' => $tipo_atendimento,
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
        date_default_timezone_set('America/Sao_Paulo');
        $atendimento = $this->atendimento->find($id);
        $paciente = $this->paciente->find($atendimento->paciente_id);
        $medicosterapeutas = $this->medicoterapeuta->orderByDesc('id')->get();        
        $tratamentos = $this->tratamento->orderBy('id')->get();
        $ispaciente = true;
        
        return view('page.agenda.edit',[
            'status' => 200,
            'atendimento' => $atendimento,
            'paciente' => $paciente,
            'medicosterapeutas' => $medicosterapeutas,            
            'tratamentos' => $tratamentos,
            'ispaciente' => $ispaciente,
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
            'data' => ['required','date'],
            'terapeuta' => ['required'],
            'tratamento' => ['required'],            
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{

            if(date('w',strtotime($request->input('data')))==0 || date('w',strtotime($request->input('data')))==6){
                    return response()->json([
                        'status' => 401,
                        'message' => 'O agendamento não pode ser em fim de semana! Não tem expediente.',
                    ]);
                }

                if(strtotime($request->input('data'))<strtotime(date('Y-m-d'))){
                    return response()->json([
                        'status' => 401,
                        'message' => 'O agendamento não pode ser anterior à data de hoje!',
                    ]);
                }

                 $tipo_atendimento = $this->tipo_atendimento->find(5);

                 $query = $this->atendimento->where('atendido','=',0)     
                                       ->where('data_agonline','=',$request->input('data'));
                 $atendimento = $query->get();
                 $contaAtendimento = $atendimento->count();

                 if($contaAtendimento==$tipo_atendimento->vagas_limite){
                    return response()->json([
                        'status' => 401,
                        'message' => 'Para esta data o agendamento on-line atingiu o limite! Escolha uma data VERDE.',
                    ]);
                 }    


            $atendimento = $this->atendimento->find($id);            
            $user = auth()->user();       
            $yesterday = \Carbon\Carbon::yesterday();                  
            $data['tipo_atendimento_id'] = 5;
            $data['paciente_id'] = $request->input('paciente');
            $paciente = $this->paciente->find($request->input('paciente'));
            $data['paciente'] = $paciente->nome;            
            $data['medico_terapeuta_id'] = $request->input('terapeuta');
            $data['tratamento_id'] = $request->input('tratamento');            
            $data['responsavel_do_paciente'] = strtoupper($request->input('responsavel'));
            $data['responsavel_parentesco'] = strtoupper($request->input('parentesco'));            
            $data['data_atendimento'] = $yesterday;
            $data['data_agonline'] = $request->input('data');            
            $data['updated_at'] = now();            
            $data['updater_user'] = $user->id;
            $atendimento->update($data);
            $att = Atendimento::find($id);
            $terapeuta = $att->medico_terapeuta;
            $tipo_atendimento = $att->tipo_atendimento;
            return response()->json([
                'status' => 200,
                'atendimento' => $att,
                'terapeuta' => $terapeuta,
                'tipo_atendimento' => $tipo_atendimento,
            ]);

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
        $atendimento->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Agendamento excluído com sucesso!',
        ]);
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

        public function medicoxtratamento(int $id){        
        $medicoterapeuta = $this->medicoterapeuta->find($id);        
        $tratamentos = $medicoterapeuta->tratamentos;        
        return response()->json([
            'status' => 200,
            'tratamentos' => $tratamentos,
        ]);
    }


    public function diasColorir(){
        $dataInicio = date('Y-m-d');
        $dataFim = date('Y-m-d',strtotime('+30 days'));        
        $periodo = CarbonPeriod::create($dataInicio,$dataFim);
        $datas = $periodo->toArray();
        $i = 0;
        foreach($datas as $date){
            $query = $this->atendimento->where('atendido','=',0)     
                                       ->where('data_agonline','=',$date->format('Y-m-d'));
            $atendimento = $query->get();
            $contaAtendimento = $atendimento->count();

            $data[$i]['data'] = $date->format('Y-m-d');
            $data[$i]['n_atendimentos'] = $contaAtendimento;
            
            $i++;
        }        
        $tipo_atendimento = $this->tipo_atendimento->find(5);                
        $feriados = $this->feriado->all();        
        return response()->json([
            'status' => 200,
            'datas' => $data,
            'tipo_atendimento' => $tipo_atendimento,
            'feriados' => $feriados,
        ]);
    }    

    
}
