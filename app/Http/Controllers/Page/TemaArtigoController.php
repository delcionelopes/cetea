<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Models\Tema;
use Illuminate\Http\Request;

class TemaArtigoController extends Controller
{
    private $tema;
    private $paciente;

    public function __construct(Tema $tema,Paciente $paciente)
    {
        $this->tema = $tema;
        $this->paciente = $paciente;
    }

    public function index($slug){
        $tema = $this->tema->whereSlug($slug)->first();
        $artigos = $tema->artigos()->paginate(5);

        $user = auth()->user();
        if($user){
        $paciente = $this->paciente->whereCpf($user->cpf)->first();
        if($paciente){
            $ispaciente = true;
        }else{
            $ispaciente = false;
        }
        }else{
            $ispaciente = false;
        }

        return view('page.temas',[
            'tema' => $tema,
            'artigos' =>$artigos,
            'ispaciente' => $ispaciente,
        ]);
    }
}
