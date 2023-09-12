<?php

namespace App\Http\Controllers\Caos;

use App\Http\Controllers\Controller;
use App\Models\Autorizacao;
use App\Models\Modulo;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    private $modulo;
    private $autorizacao;

    public function __construct(Modulo $modulo, Autorizacao $autorizacao)
    {
        $this->modulo = $modulo;
        $this->autorizacao = $autorizacao;
    }

    public function index(Request $request){
        $user = auth()->user();        
        $autorizacao = $this->autorizacao->query()
                                ->wherePerfil_id($user->perfil_id)
                                ->paginate(4);       
        $modulos = $this->modulo->all();
        return view('caos.principal.index',[
            'autorizacao' => $autorizacao,
            'modulos' => $modulos,
        ]);
    }
}
