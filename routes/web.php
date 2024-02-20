<?php

use App\Http\Controllers\Admin\ArtigoController;
use App\Http\Controllers\Admin\TemaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Caos\FuncaoController;
use App\Http\Controllers\Caos\ModuloController;
use App\Http\Controllers\Caos\OperacaoController;
use App\Http\Controllers\Caos\PerfilController;
use App\Http\Controllers\Caos\PrincipalController;
use App\Http\Controllers\Caos\SegurancaController;
use App\Http\Controllers\Caos\SetorController;
use App\Http\Controllers\Cetea\AtendimentoController;
use App\Http\Controllers\Cetea\FeriadoController;
use App\Http\Controllers\Cetea\MedicoTerapeutaController;
use App\Http\Controllers\Cetea\PacienteController;
use App\Http\Controllers\Cetea\TerapiaController;
use App\Http\Controllers\Cetea\TipoAtendimentoController;
use App\Http\Controllers\Cetea\TipoTratamentoController;
use App\Http\Controllers\Cetea\TratamentoController;
use App\Http\Controllers\HomeController as ControllersHomeController;
use App\Http\Controllers\Page\AgendaPacienteController;
use App\Http\Controllers\Page\ComentarioController;
use App\Http\Controllers\Page\HomeController;
use App\Http\Controllers\Page\TemaArtigoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\Page\HomeController::class, 'master'])->name('home');

Route::group(['middleware' => ['auth']],function(){

Route::prefix('admin')->name('admin.')->group(function(){

    Route::prefix('artigos')->name('artigos.')->group(function(){
        Route::get('/index/{color}',[ArtigoController::class,'index'])->name('index');         
        Route::get('/create/{color}',[ArtigoController::class,'create'])->name('create');
        Route::put('/store',[ArtigoController::class,'store'])->name('store');
        Route::get('/edit/{id}/{color}',[ArtigoController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[ArtigoController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[ArtigoController::class,'destroy'])->name('delete');        
        Route::put('/imagemtemp-upload',[ArtigoController::class,'armazenarImagemTemporaria']);
        Route::delete('/delete-imgtemp',[ArtigoController::class,'excluirImagemTemporaria']);
        Route::put('/upload-docs/{id}',[ArtigoController::class,'uploadDocs']);
        Route::delete('/delete-docs/{id}',[ArtigoController::class,'deleteDocs']);
        Route::get('/abrir-doc/{id}',[ArtigoController::class,'abrirDoc']);    
    });  
    Route::prefix('tema')->name('tema.')->group(function(){
        Route::get('/index/{color}',[TemaController::class,'index'])->name('index');
        Route::put('/store',[TemaController::class,'store']);
        Route::get('/edit/{id}/{color}',[TemaController::class,'edit']);
        Route::put('/update/{id}',[TemaController::class,'update']);
        Route::delete('/delete/{id}',[TemaController::class,'destroy']);
      }); 

    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/index',[UserController::class,'index'])->name('index');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::put('/store',[UserController::class,'store']);
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[UserController::class,'update']);
        Route::delete('/delete/{id}',[UserController::class,'destroy']);
        Route::put('/sistema/{id}',[UserController::class,'sistemaUsuario']);
        Route::put('/inativo/{id}', [UserController::class,'inativoUsuario']);
        Route::put('/admin/{id}', [UserController::class,'adminUsuario']);
        Route::put('/armazenar-imgtemp',[UserController::class,'armazenarImgTemp']);
        Route::delete('/delete-imgtemp',[UserController::class,'deleteImgTemp']);
      });    
       
    
    }); //fim do group admin

    Route::prefix('ceteaadmin')->name('ceteaadmin.')->group(function(){

        Route::prefix('cetea')->name('cetea.')->group(function(){
        Route::get('/index',[ControllersHomeController::class,'index'])->name('index');
      }); 

       Route::prefix('modulo')->name('modulo.')->group(function(){
        Route::get('/index-modulo',[ModuloController::class,'index'])->name('index');
        Route::get('/create-modulo',[ModuloController::class,'create'])->name('create');
        Route::post('/delete-modulo/{id}',[ModuloController::class,'destroy']);
        Route::get('/edit-modulo/{id}',[ModuloController::class,'edit'])->name('edit');
        Route::put('/update-modulo/{id}',[ModuloController::class,'update']);
        Route::put('/store-modulo',[ModuloController::class,'store'])->name('store');
        Route::put('/moduloimagemtemp-upload',[ModuloController::class,'armazenarImagemTemporaria']);        
        Route::delete('/delete-imgmodulo',[ModuloController::class,'excluirImagemTemporaria']);
        Route::get('/modulo-operacao/{operacao_id}',[ModuloController::class,'modulosXoperacoes'])->name('moduloxoperacao');
      }); 

      Route::prefix('operacao')->name('operacao.')->group(function(){
        Route::get('/index-operacao',[OperacaoController::class,'index'])->name('index');
        Route::get('/create-operacao',[OperacaoController::class,'create'])->name('create');
        Route::post('/delete-operacao/{id}',[OperacaoController::class,'destroy']);
        Route::get('/edit-operacao/{id}',[OperacaoController::class,'edit'])->name('edit');
        Route::put('/update-operacao/{id}',[OperacaoController::class,'update']);
        Route::put('/store-operacao',[OperacaoController::class,'store'])->name('store');
        Route::put('/operacaoimagemtemp-upload',[OperacaoController::class,'armazenarImagemTemporaria']);        
        Route::delete('/delete-imgoperacao',[OperacaoController::class,'excluirImagemTemporaria']);
        Route::get('/operacao-modulo/{modulo_id}',[OperacaoController::class,'operacoesXmodulos'])->name('operacaoxmodulo');
      }); 

      Route::prefix('seguranca')->name('seguranca.')->group(function(){
        Route::get('/index-seguranca',[SegurancaController::class,'index_seguranca'])->name('index');
      });

      Route::prefix('principal')->name('principal.')->group(function(){   //navegação módulos autorizados
        Route::get('/index',[PrincipalController::class,'index'])->name('index'); //módulos
        Route::get('/operacoes/{id}',[PrincipalController::class,'operacoes'])->name('operacoes');  //operações
      });
      

      Route::prefix('funcao')->name('funcao.')->group(function(){
        Route::get('/index-funcao',[FuncaoController::class,'index'])->name('index');        
        Route::delete('/delete-funcao/{id}',[FuncaoController::class,'destroy']);
        Route::get('/edit-funcao/{id}',[FuncaoController::class,'edit'])->name('edit');
        Route::put('/update-funcao/{id}',[FuncaoController::class,'update']);
        Route::put('/store-funcao',[FuncaoController::class,'store'])->name('store');        
      }); 

      Route::prefix('setor')->name('setor.')->group(function(){
        Route::get('/index-setor',[SetorController::class,'index'])->name('index');        
        Route::delete('/delete-setor/{id}',[SetorController::class,'destroy']);
        Route::get('/edit-setor/{id}',[SetorController::class,'edit'])->name('edit');
        Route::put('/update-setor/{id}',[SetorController::class,'update']);
        Route::put('/store-setor',[SetorController::class,'store'])->name('store');        
      }); 

      Route::prefix('perfil')->name('perfil.')->group(function(){
        Route::get('/index-perfil',[PerfilController::class,'index'])->name('index');        
        Route::delete('/delete-perfil/{id}',[PerfilController::class,'destroy']);
        Route::get('/edit-perfil/{id}',[PerfilController::class,'edit'])->name('edit');
        Route::put('/update-perfil/{id}',[PerfilController::class,'update']);
        Route::put('/store-perfil',[PerfilController::class,'store'])->name('store');
        Route::get('/list-authorizations/{id}',[PerfilController::class,'listAuthorizations']);
        Route::put('/store-authorizations/{id}',[PerfilController::class,'storeAuthorizations']); 
      }); 

      Route::prefix('paciente')->name('paciente.')->group(function(){
        Route::get('/index/{color}',[PacienteController::class,'index'])->name('index');
        Route::get('/create/{color}',[PacienteController::class,'create'])->name('create');
        Route::put('/store',[PacienteController::class,'store']);
        Route::get('/edit/{id}/{color}',[PacienteController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[PacienteController::class,'update']);
        Route::delete('/delete/{id}',[PacienteController::class,'destroy']);        
        Route::put('/upload-docs/{id}',[PacienteController::class,'uploadDocs']);
        Route::delete('/delete-docs/{id}',[PacienteController::class,'deleteDocs']);
        Route::get('/abrir-doc/{id}',[PacienteController::class,'abrirDoc']);
    });  

    Route::prefix('tipotratamento')->name('tipotratamento.')->group(function(){
        Route::get('/index/{color}',[TipoTratamentoController::class,'index'])->name('index');        
        Route::delete('/delete/{id}',[TipoTratamentoController::class,'destroy']);
        Route::get('/edit/{id}',[TipoTratamentoController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[TipoTratamentoController::class,'update']);
        Route::put('/store',[TipoTratamentoController::class,'store']);
      }); 

    Route::prefix('tratamento')->name('tratamento.')->group(function(){
        Route::get('/index/{color}',[TratamentoController::class,'index'])->name('index');        
        Route::delete('/delete/{id}',[TratamentoController::class,'destroy']);
        Route::get('/edit/{id}',[TratamentoController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[TratamentoController::class,'update']);
        Route::put('/store',[TratamentoController::class,'store']);
      });

      Route::prefix('medicoterapeuta')->name('medicoterapeuta.')->group(function(){
        Route::get('/index/{color}',[MedicoTerapeutaController::class,'index'])->name('index');
        Route::get('/create',[MedicoTerapeutaController::class,'create'])->name('create');
        Route::delete('/delete/{id}',[MedicoTerapeutaController::class,'destroy']);
        Route::get('/edit/{id}',[MedicoTerapeutaController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[MedicoTerapeutaController::class,'update']);
        Route::put('/store',[MedicoTerapeutaController::class,'store'])->name('store');        
        Route::get('/medico-tratamento/{tratamento_id}',[MedicoTerapeutaController::class,'medicosXtratamentos'])->name('medicoxtratamento');        
      });
      
      Route::prefix('tipoatendimento')->name('tipoatendimento.')->group(function(){
        Route::get('/index/{color}',[TipoAtendimentoController::class,'index'])->name('index');        
        Route::delete('/delete/{id}',[TipoAtendimentoController::class,'destroy']);
        Route::get('/edit/{id}',[TipoAtendimentoController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[TipoAtendimentoController::class,'update']);
        Route::put('/store',[TipoAtendimentoController::class,'store']);
      });

      Route::prefix('atendimento')->name('atendimento.')->group(function(){
        Route::get('/index/{color}',[AtendimentoController::class,'index'])->name('index');
        Route::get('/create/{color}',[AtendimentoController::class,'create'])->name('create');
        Route::put('/store',[AtendimentoController::class,'store']);
        Route::get('/edit/{id}/{color}',[AtendimentoController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[AtendimentoController::class,'update']);
        Route::delete('/delete/{id}',[AtendimentoController::class,'destroy']);        
        Route::put('/upload-docs/{id}',[AtendimentoController::class,'uploadDocs']);
        Route::delete('/delete-docs/{id}',[AtendimentoController::class,'deleteDocs']);
        Route::get('/abrir-doc/{id}',[AtendimentoController::class,'abrirDoc']);        
        Route::get('/medicoxtratamento/{medico_id}',[AtendimentoController::class,'medicoxtratamento']);
        Route::put('/cria-atendimento/{id}',[AtendimentoController::class,'criaAtendimento']);
        Route::get('/diascolorir',[AtendimentoController::class,'diasColorir'])->name('colorir');
      });
      
      Route::prefix('terapia')->name('terapia.')->group(function(){
        Route::get('/index/{color}',[TerapiaController::class,'index'])->name('index');                
        Route::get('/edit/{id}/{color}',[TerapiaController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[TerapiaController::class,'update']);        
        Route::put('/upload-docs/{id}',[TerapiaController::class,'uploadDocs']);
        Route::delete('/delete-docs/{id}',[TerapiaController::class,'deleteDocs']);
        Route::get('/abrir-doc/{id}',[TerapiaController::class,'abrirDoc']);        
        Route::get('/medicoxtratamento/{medico_id}',[TerapiaController::class,'medicoxtratamento']);
        Route::put('/store_anamneseinicial',[TerapiaController::class,'storeAnamneseInicial']);
        Route::get('/edit_anamneseinicial/{id}',[TerapiaController::class,'editAnamneseInicial']);
        Route::put('/update_anamneseinicial/{id}',[TerapiaController::class,'updateAnamneseInicial']);
        Route::put('/store_anamnesehistpregressa',[TerapiaController::class,'storeAnamneseHistPregressa']);
        Route::get('/edit_anamnesehistpregressa/{id}',[TerapiaController::class,'editAnamneseHistPregressa']);
        Route::put('/update_anamnesehistpregressa/{id}',[TerapiaController::class,'updateAnamneseHistPregressa']);
        Route::get('/diascolorir/{id}',[TerapiaController::class,'diasColorir'])->name('colorir');
        Route::put('/store_anamnese_desenvolvimento',[TerapiaController::class,'storeAnamneseDesenvolvimento']);
        Route::get('/edit_anamnese_desenvolvimento/{id}',[TerapiaController::class,'editAnamneseDesenvolvimento']);
        Route::put('/update_anamnese_desenvolvimento/{id}',[TerapiaController::class,'updateAnamneseDesenvolvimento']);
        Route::put('/store_histdesversaopaisinicial',[TerapiaController::class,'storeHistDesVersaoPaisInicial']);
        Route::get('/edit_histdesversaopaisinicial/{id}',[TerapiaController::class,'editHistDesVersaoPaisInicial']);
        Route::put('/update_histdesversaopaisinicial/{id}',[TerapiaController::class,'updateHistDesVersaoPaisInicial']);
        Route::put('/store_histdesversaopaislinguagem',[TerapiaController::class,'storeHistDesVersaoPaisLinguagem']);
        Route::get('/edit_histdesversaopaislinguagem/{id}',[TerapiaController::class,'editHistDesVersaoPaisLinguagem']);
        Route::put('/update_histdesversaopaislinguagem/{id}',[TerapiaController::class,'updateHistDesVersaoPaisLinguagem']);
        Route::put('/store_histdesversaopaisdesenvsocial',[TerapiaController::class,'storeHistDesVersaoPaisDesenvSocial']);
        Route::get('/edit_histdesversaopaisdesenvsocial/{id}',[TerapiaController::class,'editHistDesVersaoPaisDesenvSocial']);
        Route::put('/update_histdesversaopaisdesenvsocial/{id}',[TerapiaController::class,'updateHistDesVersaoPaisDesenvSocial']);
        Route::put('/store_histdesversaopaisbrincadeiras',[TerapiaController::class,'storeHistDesVersaoPaisBrincadeiras']);
        Route::get('/edit_histdesversaopaisbrincadeiras/{id}',[TerapiaController::class,'editHistDesVersaoPaisBrincadeiras']);
        Route::put('/update_histdesversaopaisbrincadeiras/{id}',[TerapiaController::class,'updateHistDesVersaoPaisbrincadeiras']);
        Route::put('/store_histdesversaopaiscomportamentos',[TerapiaController::class,'storeHistDesVersaoPaisComportamentos']);
        Route::get('/edit_histdesversaopaiscomportamentos/{id}',[TerapiaController::class,'editHistDesVersaoPaisComportamentos']);
        Route::put('/update_histdesversaopaiscomportamentos/{id}',[TerapiaController::class,'updateHistDesVersaoPaisComportamentos']);
        Route::put('/store_histdesversaopaisindependencia',[TerapiaController::class,'storeHistDesVersaoPaisIndependencia']);
        Route::get('/edit_histdesversaopaisindependencia/{id}',[TerapiaController::class,'editHistDesVersaoPaisIndependencia']);
        Route::put('/update_histdesversaopaisindependencia/{id}',[TerapiaController::class,'updateHistDesVersaoPaisIndependencia']);
        Route::put('/store_histdesversaopaisdesenvmotor',[TerapiaController::class,'storeHistDesVersaoPaisDesenvMotor']);
        Route::get('/edit_histdesversaopaisdesenvmotor/{id}',[TerapiaController::class,'editHistDesVersaoPaisDesenvMotor']);
        Route::put('/update_histdesversaopaisdesenvmotor/{id}',[TerapiaController::class,'updateHistDesVersaoPaisDesenvMotor']);
        Route::put('/store_histdesversaopaishistescolar',[TerapiaController::class,'storeHistDesVersaoPaisHistEscolar']);
        Route::get('/edit_histdesversaopaishistescolar/{id}',[TerapiaController::class,'editHistDesVersaoPaisHistEscolar']);
        Route::put('/update_histdesversaopaishistescolar/{id}',[TerapiaController::class,'updateHistDesVersaoPaisHistEscolar']);
        Route::put('/store_histdesversaopaiscompcasa',[TerapiaController::class,'storeHistDesVersaoPaisCompCasa']);
        Route::get('/edit_histdesversaopaiscompcasa/{id}',[TerapiaController::class,'editHistDesVersaoPaisCompCasa']);
        Route::put('/update_histdesversaopaiscompcasa/{id}',[TerapiaController::class,'updateHistDesVersaoPaisCompCasa']);
        Route::put('/store_histdesrotalim',[TerapiaController::class,'storeHistDesRotAlim']);
        Route::get('/edit_histdesrotalim/{id}',[TerapiaController::class,'editHistDesRotAlim']);
        Route::put('/update_histdesrotalim/{id}',[TerapiaController::class,'updateHistDesRotAlim']);
        Route::put('/store_histdeshistmedico',[TerapiaController::class,'storeHistDesHistMedico']);
        Route::get('/edit_histdeshistmedico/{id}',[TerapiaController::class,'editHistDesHistMedico']);
        Route::put('/update_histdeshistmedico/{id}',[TerapiaController::class,'updateHistDesHistMedico']);
      });

      Route::prefix('feriado')->name('feriado.')->group(function(){
        Route::get('/index/{color}',[FeriadoController::class,'index'])->name('index');        
        Route::delete('/delete/{id}',[FeriadoController::class,'destroy']);
        Route::get('/edit/{id}',[FeriadoController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[FeriadoController::class,'update']);
        Route::put('/store',[FeriadoController::class,'store']);
      });


    }); //fim ceteaadmin

}); //fim do escopo do middleware auth

///parte do site front-page

Route::namespace('Page')->name('page.')->group(function(){    
    Route::get('/',[HomeController::class,'master'])->name('master');
    Route::get('/artigo/{slug}',[HomeController::class,'detail'])->name('detail');
    Route::get('/download-arquivo/{id}',[HomeController::class,'downloadArquivo'])->name('download');
    Route::get('/tema/{slug}',[TemaArtigoController::class,'index'])->name('tema');
    Route::get('/show-perfil/{id}',[HomeController::class,'showPerfil'])->name('showperfil');
    Route::put('/perfil/{id}',[HomeController::class,'perfilUsuario'])->name('perfil');  
    Route::put('/fototemp-upload',[HomeController::class,'fotoTempUpload']);
    Route::delete('/delete-fototemp',[HomeController::class,'deleteFotoTemp']);
    Route::post('/salvar-comentario',[ComentarioController::class,'salvarComentario']);
    Route::delete('/delete-comentario/{id}',[ComentarioController::class,'deleteComentario']);

});
    
  Route::group(['middleware' => ['auth']],function(){
    //agenda
  Route::prefix('pagina')->name('pagina.')->group(function(){
    Route::prefix('minhaagenda')->name('minhaagenda.')->group(function(){
      Route::get('/index',[AgendaPacienteController::class,'index'])->name('index');
      Route::get('/create',[AgendaPacienteController::class,'create'])->name('create');
      Route::delete('/delete/{id}',[AgendaPacienteController::class,'destroy']);
      Route::get('/edit/{id}',[AgendaPacienteController::class,'edit'])->name('edit');
      Route::put('/update/{id}',[AgendaPacienteController::class,'update']);
      Route::put('/store',[AgendaPacienteController::class,'store']);
      Route::get('/medicoxtratamento/{medico_id}',[AgendaPacienteController::class,'medicoxtratamento']);
      Route::get('/diascolorir',[AgendaPacienteController::class,'diasColorir'])->name('colorir');
    });
    //fim agenda
    });
  });

  
  //busca o cep  
  Route::get('/cep/{cep}', function ($cep)
  {    
     $cep = strval($cep);
     $link = 'http://viacep.com.br/ws/'.$cep.'/json/';
    
     $url = sprintf($link);     

     $json = json_decode(file_get_contents($url), true);

     return response()->json([
      'status'=>200,
      'localizacao' => $json,
    ]);
  });