<?php

namespace App\Http\Controllers\Cetea;

use App\Http\Controllers\Controller;
use App\Models\Tipo_Atendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoAtendimentoController extends Controller
{
    private $tipoatendimento;

    public function __construct(Tipo_Atendimento $tipoatendimento)
    {
        $this->tipoatendimento = $tipoatendimento;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $color)
    {
        if(is_null($request->pesquisa)){
            $tiposatendimentos = $this->tipoatendimento->orderByDesc('id')->paginate(6);
        }else{
            $query = $this->tipoatendimento->query()
                          ->where('nome','LIKE','%'.strtoupper($request->pesquisa).'%');
            $tiposatendimentos = $query->orderByDesc('id')->paginate(6);
        }
        return view('cetea.tipoatendimento.index',[
            'tiposatendimentos' => $tiposatendimentos,
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
            'nome' => ['required','max:20'],
            'descricao' => ['required','max:50'],
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
            $data['nome'] = strtoupper($request->input('nome'));
            $data['descricao'] = strtoupper($request->input('descricao'));
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;
            $tipoatendimento = $this->tipoatendimento->create($data);
            return response()->json([
                'status' => 200,
                'tipoatendimento' => $tipoatendimento,
                'message' => 'Tipo de atendimento criado com sucesso!',
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
        $tipoatendimento = $this->tipoatendimento->find($id);
        return response()->json([
            'status' => 200,
            'tipoatendimento' => $tipoatendimento,
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
            'nome' => ['required','max:20'],
            'descricao' => ['required','max:50'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $tipoatendimento = $this->tipoatendimento->find($id);
            if($tipoatendimento){
            $user = auth()->user();            
            $data['nome'] = strtoupper($request->input('nome'));
            $data['descricao'] = strtoupper($request->input('descricao'));            
            $data['updated_at'] = now();            
            $data['updater_user'] = $user->id;
            $tipoatendimento->update($data);
            $tipo = Tipo_Atendimento::find($id);
            return response()->json([
                'status' => 200,
                'tipoatendimento' => $tipo,
                'message' => 'Tipo de atendimento alterado com sucesso!',
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Tipo de atendimento não localizado!',
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
        $tipoatendimento = $this->tipoatendimento->find($id);
        $atendimentos = $tipoatendimento->atendimentos->count();
        if($atendimentos){
            return response()->json([
                'status' => 400,
                'errors' => 'Este tipo de atendimento não pode ser excluído. Pois há outros que dependem dele.',
            ]);
        }

        $tipoatendimento->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Tipo de atendimento excluído com sucesso!',
        ]);
    }

    protected function maxId(){
        $tipoatendimento = $this->tipoatendimento->orderByDesc('id')->first();
        if($tipoatendimento){
            $codigo = $tipoatendimento->id;
        }else{
            $codigo = 0;
        }
        return $codigo + 1;
    }
}
