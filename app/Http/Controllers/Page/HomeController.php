<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Arquivo;
use App\Models\Artigo;
use App\Models\Comentario;
use App\Models\Paciente;
use App\Models\Tema;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    private $artigo;
    private $paciente;
    private $user;

    public function __construct(Artigo $artigo, Paciente $paciente,User $user)
    {
        $this->artigo = $artigo;
        $this->paciente = $paciente;
        $this->user = $user;
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

        $user = auth()->user();
        if($user){
        $user = $this->user->find($user->id);
        $paciente = $this->paciente->whereCpf($user->cpf)->first();
        if($paciente){
            $ispaciente = true;
        }else{
            $ispaciente = false;
        }
        }else{
            $ispaciente = false;
        }

        return view('page.artigos.master',[
            'temas' => $temas,
            'artigos' => $artigos,
            'ispaciente' => $ispaciente,
        ]);
    }

    public function detail($slug){

        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        $artigo = $this->artigo->whereSlug($slug)->first();

        $query = Comentario::query()
                 ->where('artigos_id','=',$artigo->id);
        $comentarios = $query->orderByDesc('id')->paginate(10);
        
        $user = auth()->user();
        if($user){
        $user = $this->user->find($user->id);
        $paciente = $this->paciente->whereCpf($user->cpf)->first();
        if($paciente){
            $ispaciente = true;
        }else{
            $ispaciente = false;
        }
        }else{
            $ispaciente = false;
        }

        return view('page.artigos.detail',[
            'artigo' => $artigo,
            'comentarios' => $comentarios,
            'ispaciente' => $ispaciente,
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
        $user = $this->user->find($id);

        $paciente = $this->paciente->whereCpf($user->cpf)->first();
        if($paciente){
            $ispaciente = true;
        }else{
            $ispaciente = false;
        }

        return view('page.perfil',[
            'user' => $user,
            'ispaciente' => $ispaciente,
            ]);
    }

    public function perfilUsuario(Request $request,$id){        
        $validator = Validator::make($request->all(),[
            'name' => ['required','max:100'],
            'email' => ['required','email','max:100'],
            'cpf' => ['required','cpf'],
            
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
        $fileNameOriginal = $file->getClientOriginalName();
        $fileName =  $user->id.'_'.$fileNameOriginal;
        $filePath = 'avatar/'.$fileName;
        $storagePath = public_path().'/storage/avatar/';
        $file->move($storagePath,$fileName);

        //exclui a imagem temporária
        $tempPath = public_path().'/storage/temp/'.$fileNameOriginal;
        if(file_exists($tempPath)){
            unlink($tempPath);
        }
        }        
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['password'] = bcrypt($request->input('password'));        
        if($filePath!=""){
        $data['avatar']  = $filePath;
        }
        $data['cpf'] = $this->deixaSomenteDigitos($request->input('cpf'));
        $data['rg'] = $request->input('rg');
        $data['matricula'] = $request->input('matricula');        
        $data['admin'] = $request->input('admin');        
        $data['sistema'] = $request->input('sistema');
        $data['funcao_id'] = $request->input('funcao_id');
        $data['perfil_id'] = $request->input('perfil_id');
        $data['setor_id'] = $request->input('setor_id');
        $data['updated_at'] = now();        
        $user->update($data);          
        return response()->json([
            'status' => 200,            
        ]);
    }
    
    }   

public function fotoTempUpload(Request $request){
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

    public function deleteFotoTemp(Request $request){
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
    
    protected function deixaSomenteDigitos($input){
        return preg_replace('/[^0-9]/','',$input);
    }
    
}
