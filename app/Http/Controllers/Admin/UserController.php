<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Funcao;
use App\Models\Perfil;
use App\Models\Setor;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $user;
    private $funcao;
    private $perfil;
    private $setor;

    public function __construct(User $user, Funcao $funcao, Perfil $perfil, Setor $setor)
    {
        $this->user = $user;
        $this->funcao = $funcao;
        $this->perfil = $perfil;
        $this->setor = $setor;
    }

    public function index(Request $request)
    {
        if(is_null($request->pesquisa)){
            $users = $this->user->orderByDesc('id')->paginate(5);
        }else{
            $query = $this->user->query()
                   ->where('name','LIKE','%'.$request->pesquisa.'%');
            $users = $query->orderByDesc('id')->paginate(5);
        }        
        return view('caos.user.index',[
            'users' => $users,
        ]);
    }

    
    public function create()
    {
        $funcoes = $this->funcao->orderBy('id')->get();
        $perfis = $this->perfil->orderBy('id')->get();
        $setores = $this->setor->orderBy('id')->get();
        return view('caos.user.create',[
            'funcoes' => $funcoes,
            'perfis' => $perfis,
            'setores' => $setores,
        ]);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','max:100'],
            'email' => ['required','email','max:100','unique:users'],
            'password' => ['required','min:8','max:100'],
            'cpf' => ['required','cpf'],
            'perfil_id' => ['required','integer'],
            'funcao_id' => ['required','integer'],
            'setor_id' => ['required','integer'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
        $filePath="";
        if($request->hasFile('imagem')){
        $file = $request->file('imagem');                           
        $fileName =  $file->getClientOriginalName();
        $filePath = 'avatar/'.$fileName;
        $storagePath = public_path().'/storage/avatar/';
        $file->move($storagePath,$fileName);

        //excluir foto temporária
        $tempPath = public_path().'/storage/temp/'.$fileName;
        if(file_exists($tempPath)){
            unlink($tempPath);
        }

        }                
           $data['name'] = $request->input('name');
           $data['funcao_id'] = $request->input('funcao_id');
           $data['perfil_id'] = $request->input('perfil_id');
           $data['setor_id'] = $request->input('setor_id');
           $data['email'] = $request->input('email');
           $data['password'] = bcrypt($request->input('password'));
           $data['matricula'] = $request->input('matricula');
           $data['cpf'] = $request->input('cpf');
           $data['rg'] = $request->input('rg');
           $data['sistema'] = $request->input('sistema');
           $data['inativo'] = false;
           $data['admin'] = false;
           if($filePath){
           $data['avatar']  = $filePath;
           }
           $data['link_instagram'] = $request->input('link_instagram');
           $data['link_facebook'] = $request->input('link_facebook');
           $data['link_site'] = $request->input('link_site');
        
        $user = $this->user->create($data);
        return response()->json([
            'user' => $user,
            'status' => 200,
            'message'=> 'Registro incluído com sucesso!',
        ]);
    }

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(int $id)
    {
        $user = $this->user->find($id);
        $perfis = $this->perfil->orderBy('id')->get();
        $funcoes = $this->funcao->orderBy('id')->get();
        $setores = $this->setor->orderBy('id')->get();
        return view('caos.user.edit',[
            'user' => $user,
            'perfis' => $perfis,
            'funcoes' => $funcoes,
            'setores' => $setores,
        ]);

    }

    
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','max:100'],
            'email' => ['required','email','max:100'],
            'cpf' => ['required','cpf'],
            'perfil_id' => ['required','integer'],
            'funcao_id' => ['required','integer'],
            'setor_id' => ['required','integer'],
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{        
        $user = $this->user->find($id);
        if($user){
        $filePath="";
        if($request->hasFile('imagem')){
        //exclui o arquivo de avatar anterior se houver
          if($user->avatar){
            $antigoPath = public_path('/storage/'.$user->avatar);
            if(file_exists($antigoPath)){
            unlink($antigoPath);
            }
          }
        //upload do novo arquivo
        $file = $request->file('imagem');                           
        $fileName =  $user->id.'_'.$file->getClientOriginalName();
        $filePath = 'avatar/'.$fileName;
        $storagePath = public_path().'/storage/avatar/';
        $file->move($storagePath,$fileName);

        //excluir foto temporária
        $tempPath = public_path().'/storage/temp/'.$fileName;
        if(file_exists($tempPath)){
            unlink($tempPath);
        }

        }                
        $data['name'] = $request->input('name');
        $data['funcao_id'] = $request->input('funcao_id');
        $data['perfil_id'] = $request->input('perfil_id');
        $data['setor_id'] = $request->input('setor_id');
        $data['email'] = $request->input('email');
        if($request->password){
        $data['password'] = bcrypt($request->input('password'));
        }
        $data['matricula'] = $request->input('matricula');
        $data['cpf'] = $request->input('cpf');
        $data['rg'] = $request->input('rg');
        $data['sistema'] = $request->input('sistema');
        $data['inativo'] = $request->input('inativo');
        $data['admin'] = $request->input('admin');
        if($filePath!=""){
        $data['avatar']  = $filePath;
        }
        $data['link_instagram'] = $request->input('link_instagram');
        $data['link_facebook'] = $request->input('link_facebook');
        $data['link_site'] = $request->input('link_site');        
        $user->update($data);
        $u = User::find($id);
        return response()->json([
            'user' => $u,
            'status' => 200,
            'message'=> 'Registro atualizado com sucesso!',
        ]);
    }else{
        return response()->json([
            'status' => 404,
            'message' => 'Registro não localizado!',
        ]);
    }
    }

    }

    
    public function destroy(int $id)
    {
        $user = $this->user->find($id);
        //exclusão do arquivo do avatar se houver
        if($user->avatar){
            $avatarPath = public_path('/storage/'.$user->avatar);
            if(file_exists($avatarPath)){
                unlink($avatarPath);
            }
        }
        //exclusão dos comentários
        $comentarios = $user->comentarios;
        $user->comentarios()->delete($comentarios);
        //exclusão dos arquivos pdf
        $arquivos = $user->arquivos;
             foreach($arquivos as $arq){
                 $arqPath = public_path('/storage/'.$arq->path);
                 if(file_exists($arqPath)){
                     unlink($arqPath);
                 }
             }
        $user->arquivos()->delete($arquivos);
        //exclusão dos artigos
        $artigos = $user->artigos;              
              foreach($artigos as $art){
        //excluisão os arquivos de capa dos artigos se houver
                  if($art->imagem){
                  $capaPath = public_path('/storage/'.$art->imagem);
                  if(file_exists($capaPath)){
                      unlink($capaPath);
                  }
                }
                //exclusão da relação com os temas se houver
                $temas = $art->temas;
                if($temas){
                $art->temas()->detach($temas);
                }
              }              
        $user->artigos()->delete($artigos);
        //Exclusão do usuário
        $user->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Registro excluído com sucesso!',
        ]);

    }

    public function sistemaUsuario(Request $request,int $id){
        $user = $this->user->find($id);
        $sistema = $request->input('sistema');
        $data = ['sistema' => $sistema];        
        $user->update($data);
        $u = User::find($id);
        return response()->json([
            'user' => $u,
            'status'=> 200,
        ]);
    }

    public function inativoUsuario(Request $request,int $id){
        $user = $this->user->find($id);
        $inativo = $request->input('inativo');
        $data = ['inativo' => $inativo];        
        $user->update($data);
        $u = User::find($id);
        return response()->json([
            'user' => $u,
            'status'=> 200,
        ]);
    }

    public function adminUsuario(Request $request,int $id){
        $user = $this->user->find($id);
        $admin = $request->input('admin');
        $data = ['admin' => $admin];        
        $user->update($data);
        $u = User::find($id);
        return response()->json([
            'user' => $u,
            'status'=> 200,
        ]);
    }

    public function armazenarImgTemp(Request $request){
        $validator = Validator::make($request->all(),[
             'imagem' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{
            $filePath="";
            if($request->hasFile('imagem')){
            $file = $request->file('imagem');                           
            $fileName =  $file->getClientOriginalName();        
            $storagePath = public_path().'/storage/temp/';
            $filePath = 'storage/temp/'.$fileName;
            $file->move($storagePath,$fileName);            
            }
            return response()->json([
                'status' => 200,
                'filepath' => $filePath,
            ]);
        }
    }

    public function deleteImgtemp(Request $request){
         //exclui o arquivo temporário se houver
                if($request->hasFile('imagem')){
                    $file = $request->file('imagem');
                    $filename = $file->getClientOriginalName();
                    $antigoPath = public_path().'/storage/temp/'.$filename;
                    if(file_exists($antigoPath)){
                        unlink($antigoPath);
                    }
                }     
        return response()->json([
            'status' => 200,            
        ]);
    }

 

}