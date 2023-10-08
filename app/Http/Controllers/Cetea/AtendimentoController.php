<?php

namespace App\Http\Controllers\Cetea;

use App\Http\Controllers\Controller;
use App\Models\Atendimento;
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

    public function __construct(Atendimento $atendimento, Medico_Terapeuta $medicoterapeuta,
                                Tipo_Atendimento $tipoatendimento, Tratamento $tratamento, Paciente $paciente)
    {
        $this->atendimento = $atendimento;
        $this->medicoterapeuta = $medicoterapeuta;
        $this->tipoatendimento = $tipoatendimento;
        $this->tratamento = $tratamento;
        $this->paciente = $paciente;
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

        if($anamnese_inicial || $anamnese_hist_pregressa || $anamnese_desenvolvimento ||
           $histdes_versaopais_inicial || $histdes_versaopais_linguagem || $histdes_versaopais_desenvsocial ||
           $histdes_versaopais_brincadeiras || $histdes_versaopais_comportamentos || $histdes_versaopais_independencia ||
           $histdes_versaopais_desenvmotor || $histdes_versaopais_histescolar || $histdes_versaopais_compcasa ||
           $histdes_anexo1_rotalim || $histdes_anexo2_histmedico || $histdes_anexo3_infosensoriais || 
           $evolucao || $mchat){
            return response()->json([
                'status' => 400,
                'erros' => 'Este atendimento não pode ser excluído! Pois há outros registros que dependem dele.',
            ]);
           }
        $atendimento->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Atendimento excluído com sucesso!',
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



}
