<?php

namespace App\Http\Controllers\Cetea;

use App\Http\Controllers\Controller;
use App\Models\Tipo_Tratamento;
use App\Models\Tratamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TratamentoController extends Controller
{
    private $tratamento;

    public function __construct(Tratamento $tratamento)
    {
        $this->tratamento = $tratamento;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $color)
    {
        if(is_null($request->pesquisa)){
            $tratamentos = $this->tratamento->orderByDesc('id')->paginate(6);
        }else{
            $query = $this->tratamento->query()
                          ->where('nome','LIKE','%'.strtoupper($request->pesquisa).'%');
            $tratamentos = $query->orderByDesc('id')->paginate(6);
        }
            $tipos_tratamentos = Tipo_Tratamento::all('id','nome');
        return view('cetea.tratamento.index',[
            'tratamentos' => $tratamentos,
            'tipos_tratamentos' => $tipos_tratamentos,
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
        $validator = Validator::make($request->all(),[
            'nome' => ['required','max:50'],
            'tipo_tratamento' => ['required'],
            'descricao' => ['max:200'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $user = auth()->user();
            $data['id'] = $this->maxId();
            $data['nome'] = strtoupper($request->input('nome'));
            $data['tipo_tratamento_id'] = intval($request->input('tipo_tratamento'));
            $data['descricao'] = $request->input('descricao');
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;

            $tratamento = $this->tratamento->create($data);
            $tipo_tratamento = $tratamento->tipo_tratamento;

            return response()->json([
                'status' => 200,
                'tratamento' => $tratamento,
                'tipo_tratamento' => $tipo_tratamento,
                'message' => 'Tratamento criado com sucesso!',
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
        $tratamento = $this->tratamento->find($id);
        return response()->json([
            'status' => 200,
            'tratamento' => $tratamento,
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
            'tipo_tratamento' => ['required'],
            'descricao' => ['max:200'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $tratamento = $this->tratamento->find($id);
            if($tratamento){
            $user = auth()->user();     
            $data['nome'] = strtoupper($request->input('nome'));
            $data['tipo_tratamento_id'] = intval($request->input('tipo_tratamento'));
            $data['descricao'] = $request->input('descricao');            
            $data['updated_at'] = now();            
            $data['updater_user'] = $user->id;

            $tratamento->update($data);
            $t = Tratamento::find($id);
            $tipo_tratamento = $t->tipo_tratamento;

            return response()->json([
                'status' => 200,
                'tratamento' => $t,
                'tipo_tratamento' => $tipo_tratamento,
                'message' => 'Tratamento atualizado com sucesso!',
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
        $tratamento = $this->tratamento->find($id);
        $atendimentos = $tratamento->atendimentos->count();
        $medicos = $tratamento->medicos->count();
        $pacientes = $tratamento->pacientes->count();
        if($atendimentos || $atendimentos || $medicos || $pacientes){
            return response()->json([
                'status' => 400,
                'message' => 'Este tratamento não pode ser excluído! Pois há outros registros que dependem dele!',
            ]);
        }

        $tratamento->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Tratamento excluído com sucesso!',
        ]);
    }

    protected function maxId(){
        $tratamento = $this->tratamento->orderByDesc('id')->first();
        if($tratamento){
            $codigo = $tratamento->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }
}
