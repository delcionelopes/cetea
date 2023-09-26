<?php

namespace App\Http\Controllers\Cetea;

use App\Http\Controllers\Controller;
use App\Models\Tipo_Tratamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoTratamentoController extends Controller
{
    private $tipotratamento;

    public function __construct(Tipo_Tratamento $tipotratamento)
    {
        $this->tipotratamento = $tipotratamento;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(is_null($request->pesquisa)){
            $tipotratamentos = $this->tipotratamento->orderByDesc('id')->paginate(6);
        }else{
            $query = $this->tipotratamento->query()
                          ->where('nome','LIKE','%'.strtoupper($request->pesquisa).'%');
            $tipotratamentos = $query->orderByDesc('id')->paginate(6);
        }
        return view('cetea.tipotratamento.index',[
            'tipotratamentos' => $tipotratamentos,
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
            'nome' => ['required','max:20'],
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
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;

            $tipotratamento = $this->tipotratamento->create($data);

            return response()->json([
                'status' => 200,
                'tipotratamento' => $tipotratamento,
                'message' => 'Tipo de tratamento criado com sucesso!',
            ]);
        }
    }
    
    public function show(int $id)
    {
        //
    }

    
    public function edit(int $id)
    {
        $tipotratamento = $this->tipotratamento->find($id);
        return response()->json([
            'status' => 200,
            'tipotratamento' => $tipotratamento,
        ]);
    }

    
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(),[
            'nome' => ['required','max:20'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $tipotratamento = $this->tipotratamento->find($id);
            if($tipotratamento){

            $user = auth()->user();
            
            $data['nome'] = strtoupper($request->input('nome'));            
            $data['updated_at'] = now();            
            $data['updater_user'] = $user->id;

            $tipotratamento->update($data);
            $tt = Tipo_Tratamento::find($id);

            return response()->json([
                'status' => 200,
                'tipotratamento' => $tt,
                'message' => 'Tipo de tratamento atualizado com sucesso!',
            ]);
        }else{
            return response()->json([
                'status' => 404,                
                'message' => 'Tipo de tratamento não localizado!',
            ]);
        }
    }
}

    
    public function destroy(int $id)
    {
        $tipotratamento = $this->tipotratamento->find($id);
        $tratamentos = $tipotratamento->tratamento->count();
        if($tratamentos){
            return response()->json([
                'status' => 400,
                'errors' => 'Este tipo de tratamento não pode ser excluído. Pois há outros que dependem dele.',
            ]);
        }
        $tipotratamento->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Tipo de tratamento excluído com sucesso!',
        ]);
    }

    protected function maxId(){
        $tipotratamento = $this->tipotratamento->orderByDesc('id')->first();
        if($tipotratamento){
            $codigo = $tipotratamento->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }
}
