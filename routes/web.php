<?php

use App\Http\Controllers\Caos\FuncaoController;
use App\Http\Controllers\Caos\ModuloController;
use App\Http\Controllers\Caos\OperacaoController;
use App\Http\Controllers\Caos\PerfilController;
use App\Http\Controllers\Caos\SegurancaController;
use App\Http\Controllers\Caos\SetorController;
use App\Http\Controllers\HomeController as ControllersHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\Page\HomeController::class, 'master'])->name('home');

Route::group(['middleware' => ['auth']],function(){

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin.')->group(function(){

    Route::prefix('artigos')->name('artigos.')->group(function(){
        Route::get('/index','ArtigoController@index')->name('index');         
        Route::get('/create','ArtigoController@create')->name('create');
        Route::post('/store','ArtigoController@store')->name('store');
        Route::get('/edit/{id}','ArtigoController@edit')->name('edit');
        Route::put('/update/{id}','ArtigoController@update')->name('update');
        Route::delete('/delete/{id}','ArtigoController@destroy')->name('delete');
        Route::get('/edit-capa/{id}','ArtigoController@editCapa');
        Route::put('/upload-capa/{id}','ArtigoController@uploadCapa');
        Route::post('/delete-capa/{id}','ArtigoController@deleteCapa');
        Route::get('/edit-arquivo/{id}','ArtigoController@editArquivo');
        Route::put('/upload-arquivo/{id}','ArtigoController@uploadArquivo');
        Route::delete('/delete-arquivo/{id}','ArtigoController@deleteArquivo');            
    });  
    Route::prefix('tema')->name('tema.')->group(function(){
        Route::get('/index','TemaController@index')->name('index');
        Route::post('/store','TemaController@store');
        Route::get('/edit/{id}','TemaController@edit');
        Route::put('/update/{id}','TemaController@update');
        Route::delete('/delete/{id}','TemaController@destroy');
      }); 

    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/index','UserController@index')->name('index');
        Route::put('/store','UserController@store');
        Route::get('/edit/{id}','UserController@edit');
        Route::put('/update/{id}','UserController@update');
        Route::delete('/delete/{id}','UserController@destroy');
        Route::post('/moderador/{id}', 'UserController@moderadorUsuario');
        Route::post('/inativo/{id}', 'UserController@inativoUsuario');
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
    Route::post('/salvar-comentario','ComentarioController@salvarComentario');
    Route::delete('/delete-comentario/{id}','ComentarioController@deleteComentario');    
  });
