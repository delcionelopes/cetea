<?php

namespace App\Http\Controllers\Cetea;

use App\Http\Controllers\Controller;
use App\Models\Feriado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeriadoController extends Controller
{
    private $feriado;

    public function __construct(Feriado $feriado)
    {
        $this->feriado = $feriado;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $color)
    {
        if(is_null($request->presquisa)){
            $feriados = $this->feriado->orderByDesc('id')->paginate(6);
        }else{
            $query = $this->feriado->query()
                                   ->where('descricao','LIKE','%'.strtoupper($request->pesquisa).'%');
            $feriados = $query->orderByDesc('id')->paginate(6);
        }
        return view('cetea.feriado.index',[
            'feriados' => $feriados,
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
            'dia' => ['required'],
            'mes' => ['required'],
            'descricao' => ['required','max:20'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $user = auth()->user();
            $data['id'] = $this->maxId();
            $data['dia'] = $request->input('dia');
            $data['mes'] = $request->input('mes');
            $data['descricao'] = strtoupper($request->input('descricao'));
            $data['created_at'] = now();
            $data['updated_at'] = null;
            $data['creater_user'] = $user->id;
            $data['updater_user'] = null;

            $feriado = $this->feriado->create($data);

            return response()->json([
                'status' => 200,
                'feriado' => $feriado,
                'message' => 'Feriado criado com sucesso!',
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
        $feriado = $this->feriado->find($id);
        return response()->json([
            'status' => 200,
            'feriado' => $feriado,
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
            'dia' => ['required'],
            'mes' => ['required'],
            'descricao' => ['required','max:20'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $feriado = $this->feriado->find($id);
            if($feriado){

            $user = auth()->user();
            
            $user = auth()->user();            
            $data['dia'] = $request->input('dia');
            $data['mes'] = $request->input('mes');
            $data['descricao'] = strtoupper($request->input('descricao'));            
            $data['updated_at'] = now();            
            $data['updater_user'] = $user->id;

            $feriado->update($data);
            $f = Feriado::find($id);

            return response()->json([
                'status' => 200,
                'feriado' => $f,
                'message' => 'Feriado atualizado com sucesso!',
            ]);
        }else{
            return response()->json([
                'status' => 404,                
                'message' => 'Feriado não localizado!',
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
        $feriado = $this->feriado->find($id);
        $feriado->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Feriado excluído com sucesso!',
        ]);
    }

    protected function maxId(){
        $feriado = $this->feriado->orderByDesc('id')->first();
        if($feriado){
            $codigo = $feriado->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }
}
