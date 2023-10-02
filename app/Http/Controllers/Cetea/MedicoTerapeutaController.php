<?php

namespace App\Http\Controllers\Cetea;

use App\Http\Controllers\Controller;
use App\Models\Medico_Terapeuta;
use App\Models\Tratamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicoTerapeutaController extends Controller
{
    
    private $medicoterapeuta;
    private $tratamento;

    public function __construct(Medico_Terapeuta $medicoterapeuta, Tratamento $tratamento)
    {
        $this->medicoterapeuta = $medicoterapeuta;
        $this->tratamento = $tratamento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(is_null($request->pesquisa)){
            $medicosterapeutas = $this->medicoterapeuta->orderByDesc('id')->paginate(6);
        }else{
            $query = $this->medicoterapeuta->query()
                          ->where('nome','LIKE','%'.$request->pesquisa.'%');
            $medicosterapeutas = $query->orderByDesc('id')->paginate(6);
        }
            $tratamentos = $this->tratamento->all('id','nome');
        return view('cetea.medicoterapeuta.index',[
            'medicosterapeutas' => $medicosterapeutas,
            'tratamentos' => $tratamentos,
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
            'cr_registro' => ['required','max:20'],
            'cr_sigla' => ['required','max:10'],
            'nome' => ['required','max:50'],
            'especialidade' => ['required','max:100'],            
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
            $data['nome'] = $request->input('nome');
            $data['crm_registro'] = $request->input('cr_registro');
            $data['sigla_crm'] = $request->input('cr_sigla');
            $data['especialidade'] = $request->input('especialidade');
            $data['celular'] = $request->input('celular');
            $data['telefone'] = $request->input('telefone');
            $data['email'] = $request->input('email');
            $data['site'] = $request->input('site');
            $data['redesocial'] = $request->input('redesocial');
            $data['ativo'] = $request->input('ativo');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $medicoterapeuta = $this->medicoterapeuta->create($data);
            $medico = Medico_Terapeuta::find($id);
            $medico->tratamentos()->sync(json_decode($request->input('tratamentos')));

            return response()->json([
                'status' => 200,
                'medicoterapeuta' => $medicoterapeuta,
                'message' => 'Médico terapeuta foi criado com sucesso!',
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
       $medicoterapeuta = $this->medicoterapeuta->find($id);
       $tratamentosrelacionados = $medicoterapeuta->tratamentos;
       return response()->json([
        'status' => 200,
        'medicoterapeuta' => $medicoterapeuta,
        'tratamentosrelacionados' => $tratamentosrelacionados,
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
            'cr_registro' => ['required','max:20'],
            'cr_sigla' => ['required','max:10'],
            'nome' => ['required','max:50'],
            'especialidade' => ['required','max:100'],            
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $medicoterapeuta = $this->medicoterapeuta->find($id);
            if($medicoterapeuta){            
            $user = auth()->user();            
            $data['nome'] = $request->input('nome');
            $data['crm_registro'] = $request->input('cr_registro');
            $data['sigla_crm'] = $request->input('cr_sigla');
            $data['especialidade'] = $request->input('especialidade');
            $data['celular'] = $request->input('celular');
            $data['telefone'] = $request->input('telefone');
            $data['email'] = $request->input('email');
            $data['site'] = $request->input('site');
            $data['redesocial'] = $request->input('redesocial');
            $data['ativo'] = $request->input('ativo');            
            $data['updated_at'] = now();            
            $data['updater_user'] = $user->id;
            $medicoterapeuta->update($data);
            $medico = Medico_Terapeuta::find($id);
            $medico->tratamentos()->sync(json_decode($request->input('tratamentos')));

            return response()->json([
                'status' => 200,
                'medicoterapeuta' => $medicoterapeuta,
                'message' => 'Médico(a) terapeuta foi atualizado com sucesso!',
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Médico(a) não localizado!',
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
        $medicoterapeuta = $this->medicoterapeuta->find($id);
        $tratamentos = $medicoterapeuta->tratamentos->count();
        $atendimentos = $medicoterapeuta->atendimentos->count();
        if($tratamentos){
            return response()->json([
                'status' => 400,
                'errors' => 'Este(a) médico(a) não pode ser excluído(a)! Pois há tratamentos que dependem dele(a).',
            ]);            
        }
        if($atendimentos){
            return response()->json([
                'status' => 400,
                'errors' => 'Este(a) médico(a) não pode ser excluído(a)! Pois há atendimentos que dependem dele(a).',
            ]);
        }
        $medicoterapeuta->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Médico(a) excluído(a) com sucesso!',
        ]);
    }

    protected function maxId(){
        $medicoterapeuta = $this->medicoterapeuta->orderByDesc('id')->first();
        if($medicoterapeuta){
            $codigo = $medicoterapeuta->id;
        }else{
            $codigo = 0;
        }
        return $codigo + 1;
    }

    public function medicosXtratamentos(int $tratamento_id){
        $tratamento = $this->tratamento->whereId($tratamento_id)->first();
        $medicosterapeutas = $tratamento->medicos()->paginate(6);
        $tratamentos = $this->tratamento->all('id','nome');
        return view('cetea.medicoterapeuta.index_medicoXtratamentos',[
            'medicosterapeutas' => $medicosterapeutas,
            'tratamentos' => $tratamentos,
        ]);
    }
}
