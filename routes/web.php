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
use App\Http\Controllers\HomeController as ControllersHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\Page\HomeController::class, 'master'])->name('home');

Route::group(['middleware' => ['auth']],function(){

Route::prefix('admin')->name('admin.')->group(function(){

    Route::prefix('artigos')->name('artigos.')->group(function(){
        Route::get('/index',[ArtigoController::class,'index'])->name('index');         
        Route::get('/create',[ArtigoController::class,'create'])->name('create');
        Route::put('/store',[ArtigoController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ArtigoController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[ArtigoController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[ArtigoController::class,'destroy'])->name('delete');        
        Route::put('/imagemtemp-upload',[ArtigoController::class,'armazenarImagemTemporaria']);
        Route::delete('/delete-imgtemp',[ArtigoController::class,'excluirImagemTemporaria']);
        Route::put('/upload-docs/{id}',[ArtigoController::class,'uploadDocs']);
        Route::delete('/delete-docs/{id}',[ArtigoController::class,'deleteDocs']);
        Route::get('/abrir-doc/{id}',[ArtigoController::class,'abrirDoc']);    
    });  
    Route::prefix('tema')->name('tema.')->group(function(){
        Route::get('/index',[TemaController::class,'index'])->name('index');
        Route::put('/store',[TemaController::class,'store']);
        Route::get('/edit/{id}',[TemaController::class,'edit']);
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


    }); //fim ceteaadmin

}); //fim do escopo do middleware auth


Route::namespace('App\Http\Controllers\Page')->name('page.')->group(function(){
    Route::get('/','HomeController@master')->name('master');
    Route::get('/artigo/{slug}','HomeController@detail')->name('detail');
    Route::get('/download-arquivo/{id}','HomeController@downloadArquivo')->name('download');
    Route::get('/tema/{slug}','TemaArtigoController@index')->name('tema');
    Route::get('/show-perfil/{id}','HomeController@showPerfil')->name('showperfil');
    Route::put('/perfil/{id}','HomeController@perfilUsuario')->name('perfil');  
    Route::put('/fototemp-upload','HomeController@fotoTempUpload');
    Route::delete('/delete-fototemp','HomeController@deleteFotoTemp');
    Route::post('/salvar-comentario','ComentarioController@salvarComentario');
    Route::delete('/delete-comentario/{id}','ComentarioController@deleteComentario');    
  });
