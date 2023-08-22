<?php

namespace App\Http\Controllers\Caos;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    private $perfil;

    public function __construct(Perfil $perfil)
    {
        $this->perfil = $perfil;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(is_null($request->pesquisa)){
            $perfis = $this->perfil->orderByDesc('id')->paginate(6);
        }else{
            $query = $this->perfil->query()
                          ->where('nome','LIKE','%'.strtoupper($request->pesquisa).'%');
            $perfis = $query->orderByDesc('id')->paginate(6);
        }
        return view('caos.perfil.index',[
            'perfis' => $perfis,
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
            $data['id'] = $this->maxId();
            $data['nome'] = strtoupper($request->input('nome'));
            $data['created_at'] = now();
            $data['updated_at'] = null;

            $perfil = $this->perfil->create($data);
            return response()->json([
                'perfil' => $perfil,
                'status' => 200,
                'message' => 'Registro criado com sucesso!',
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
        $perfil = $this->perfil->find($id);
        return response()->json([
            'perfil' => $perfil,
            'status' => 200,
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
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors'=> $validator->errors()->getMessages(),
            ]);
        }else{
            $perfil = $this->perfil->find($id);
            if($perfil){
                $data['nome'] = strtoupper($request->input('nome'));
                $data['updated_at'] = now();

                $perfil->update($data);
                $p = Perfil::find($id);

                return response()->json([
                    'perfil' => $p,
                    'status' => 200,
                    'message' => 'Registro atualizado com sucesso!',
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
        $perfil = $this->perfil->find($id);        
        if($perfil->users->count()){
            return response()->json([
                'status' => 400,
                'errors' => 'Este perfil não pode ser excluído. Pois há usuários que dependem dele.',
            ]);
        }
        if($perfil->autorizacao->count()){
            return response()->json([
                'status' => 400,
                'errors' => 'Este perfil não pode ser excluído. Pois há permissões que dependem dele.',
            ]);
        }
        $perfil->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Registro excluído com sucesso!',
        ]);
    }

    protected function maxId(){
        $perfil = $this->perfil->orderByDesc('id')->first();
        if($perfil){
            $codigo = $perfil->id;
        }else{
            $codigo = 0;
        }
        return $codigo+1;
    }
}
