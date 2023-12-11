<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Atendimento;
use App\Models\Medico_Terapeuta;
use App\Models\Paciente;
use App\Models\Tratamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgendaPacienteController extends Controller
{
    private $paciente;
    private $atendimento;
    private $medicoterapeuta;
    private $tratamento;

    public function __construct(Paciente $paciente, Atendimento $atendimento, Medico_Terapeuta $medicoterapeuta, Tratamento $tratamento)
    {
        $this->paciente = $paciente;
        $this->atendimento = $atendimento;
        $this->medicoterapeuta = $medicoterapeuta;
        $this->tratamento = $tratamento;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cpf)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $paciente = $this->paciente->whereCpf($cpf)->first();
        $medicosterapeutas = $this->medicoterapeuta->orderByDesc('id')->get();
        $tratamentos = $this->tratamento->orderBy('id')->get();
        $query = $this->atendimento->where('paciente_id','=',$paciente->id)
                                   ->where(function($query){
                                    $query->whereDate('data_retorno','>=',date("Y-m-d"))
                                          ->orwhereDate('data_encaminhamento','>=',date("Y-m-d"))
                                          ->orwhereDate('data_agonline','>=',date("Y-m-d"))
                                          ->orwhereDate('data_agendamento','>=',date("Y-m-d"));
                                   });
        $atendimentos = $query->orderBy('data_atendimento')->paginate(2);

        if($paciente){
            $ispaciente = true;
        }else{
            $ispaciente = false;
        }

        return view('page.agenda.index',[
            'atendimentos' => $atendimentos,
            'paciente' => $paciente,
            'medicosterapeutas' => $medicosterapeutas,
            'tratamentos' => $tratamentos,
            'ispaciente' => $ispaciente,
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
                $yesterday = \Carbon\Carbon::yesterday(); 
                $data['id'] = $id;
                $data['tipo_atendimento_id'] = $request->input('tipo_atendimento');
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
        $atendimento = $this->atendimento->find($id);
        $paciente = $this->paciente->find($atendimento->paciente_id);
        $medicosterapeutas = $this->medicoterapeuta->orderByDesc('id')->get();        
        $tratamentos = $this->tratamento->orderBy('id')->get();
        return view('cetea.atendimento.edit',[
            'status' => 200,
            'atendimento' => $atendimento,
            'paciente' => $paciente,
            'medicosterapeutas' => $medicosterapeutas,            
            'tratamentos' => $tratamentos,
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
            $user = auth()->user();       
            $yesterday = \Carbon\Carbon::yesterday();                  
            $data['tipo_atendimento_id'] = $request->input('tipo_atendimento');
            $data['paciente_id'] = $request->input('paciente');
            $paciente = $this->paciente->find($request->input('paciente'));
            $data['paciente'] = $paciente->nome;
            $data['atendido'] = 0;
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

    
}
