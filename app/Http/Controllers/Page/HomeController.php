<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Arquivo;
use App\Models\Artigo;
use App\Models\Comentario;
use App\Models\Tema;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    private $artigo;

    public function __construct(Artigo $artigo)
    {
        $this->artigo = $artigo;
    }

    public function master(Request $request){

        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        if(is_null($request->pesquisa)){
            $artigos = $this->artigo->orderByDesc('id')->paginate(5);            
        }else{
            $query = $this->artigo->query()
                   ->where('titulo','LIKE','%'.$request->pesquisa.'%');
            $artigos = $query->orderByDesc('id')->paginate(5);
        }
        $temas = Tema::all();
        return view('page.artigos.master',[
            'temas' => $temas,
            'artigos' => $artigos,
        ]);
    }

    public function detail($slug){

        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        $artigo = $this->artigo->whereSlug($slug)->first();

        $query = Comentario::query()
                 ->where('artigos_id','=',$artigo->id);
        $comentarios = $query->orderByDesc('id')->paginate(10);             

        return view('page.artigos.detail',[
            'artigo' => $artigo,
            'comentarios' => $comentarios,
        ]);
    }

    public function downloadArquivo($id){                      
        
        $arquivo = Arquivo::find($id);                
        $downloadPath = public_path('/storage/'.$arquivo->path);                

        $headers = [
            'HTTP/1.1 200 OK',
            'Pragma: public',
            'Content-Type: application/pdf'
        ];                   
        return response()->download($downloadPath,$arquivo->rotulo,$headers);    
    }

    public function showPerfil($id){
        $user = User::find($id);
        return view('page.perfil',[
            'user' => $user,
            ]);
    }

    public function perfilUsuario(Request $request,$id){        
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|min:8|max:100',
            'cpf' => 'required|cpf',
            'reg' => 'required',            
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages(),
            ]);
        }else{         
        $user = User::find($id);        
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
        }        
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['password_2'] = bcrypt($request->input('password'));        
        if($filePath!=""){
        $data['avatar']  = $filePath;
        }
        $data['cpf'] = $request->input('cpf');
        $data['rg'] = $request->input('rg');
        $data['matricula'] = $request->input('matricula');        
        $data['admin'] = $request->input('admin');        
        $data['sistema'] = $request->input('sistema');        
        $data['updated_at'] = now();        
        $user->update($data);          
        return response()->json([
            'status' => 200,            
        ]);
    }
    
    }   


    
}
