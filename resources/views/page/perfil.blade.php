@extends('layouts.page')
@section('content')

<!-- Cabeçalho-->
<header class="masthead" style="background-image: url('/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>CETEA</h1>
                            <span class="subheading">Obrigado por fazer parte de nossa comunidade!</span>
                        </div>
                    </div>
                </div>
            </div>
</header>
<div class="container px-4 px-lg-5">

<form role="form" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <ul id="saveform_errList"></ul>
    <input type="hidden" id="edit_user_id" value="{{$user->id}}">
    <input type="hidden" id="edit_user_admin" value="{{$user->admin}}">
    <input type="hidden" id="edit_user_sistema" value="{{$user->sistema}}">
    <input type="hidden" id="edit_user_funcao_id" value="{{$user->funcao_id}}">
    <input type="hidden" id="edit_user_perfil_id" value="{{$user->perfil_id}}">
    <input type="hidden" id="edit_user_setor_id" value="{{$user->setor_id}}">
    <div class="container-fluid py-5">
        <div class="card">
            <div class="card-body">
              <div class="card p-3" style="background-image: url('/assets/img/banner-docs.webp')">
                <div class="d-flex align-items-center">
                    <!--arquivo de imagem-->
                    <div class="form-group mb-3">                                                
                       <div class="image">
                        @if($user->avatar)
                            <img src="{{asset('storage/'.$user->avatar)}}" class="imgfoto rounded-circle" width="100" >
                        @else
                            <img src="{{asset('storage/user.png')}}" class="imgfoto rounded-circle" width="100">
                        @endif
                        </div>
                       <label for="">Foto</label>                        
                       <span class="btn btn-none fileinput-button"><i class="fas fa-plus"></i>                          
                          <input id="upimagem" type="file" name="imagem" class="btn btn-primary" accept="image/x-png,image/gif,image/jpeg">
                       </span>                       
                     </div>  
                     <!--arquivo de imagem--> 
                </div>
              </div>
                  <fieldset>
                    <legend>Dados de Identificação</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" required class="form-control" name="nome" id="nome" placeholder="Nome do usuário" value="{{$user->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" required class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00" data-mask="000.000.000-00" data-mask-reverse="true" value="{{$user->cpf}}">
                            </div>
                        </div>
                        @if(($user->sistema)&&(!$user->inativo))
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rg">RG</label>
                                <input type="text" class="form-control" name="rg" id="rg" value="{{$user->rg}}">
                            </div>
                        </div>   
                        <div class="col-md-4">
                              <div class="form-group">
                                <label for="matricula">Matrícula</label>
                                <input type="text" required class="form-control" name="matricula" id="matricula" value="{{$user->matricula}}">
                            </div>
                        </div>
                        @endif
                    </div>                                        
                </fieldset>               

                <fieldset>
                    <legend>Dados de Controle</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">e-Mail</label>
                                <input type="text" class="email form-control" name="email" id="email" placeholder="e-Mail do usuário" value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="password form-control" name="password" id="password">
                            </div>
                        </div>                    
                    </div>      
                    @if(($user->sistema)&&(!$user->inativo))                                 
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="link_instagram">URL Instagram</label>
                                <input type="text" class="link_instagram form-control" name="link_instagram" id="link_instagram" placeholder="https://..instagram" value="{{$user->link_instagram}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="link_facebook">URL Facebook</label>
                                <input type="text" class="link_facebook form-control" name="link_facebook" id="link_facebook" placeholder="https://..facebook" value="{{$user->link_facebook}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="link_site">URL Site</label>
                                <input type="text" class="link_site form-control" name="link_site" id="link_site" placeholder="https://..site" value="{{$user->link_site}}">
                            </div>
                        </div>                 
                    </div>                    
                    @endif
                </fieldset>               
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-footer">
                            <button type="button" class="cancelar_btn btn btn-default">Cancelar</button>
                            <button class="salvar_btn btn btn-primary" type="button"><img id="imgedit" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Atualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
        <!-- Rodapé-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">                        
                        <div class="small text-center text-muted fst-italic">Copyright &copy; prodap</div>
                    </div>
                </div>
            </div>
        </footer>      
@endsection

@section('scripts')
<script type="text/javascript">

//Início escopo geral
$(document).ready(function(){
//Início processo perfil usuário
$(document).on('click','.salvar_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var loading = $('#imgedit');
            loading.show();

        var id = $('#edit_user_id').val();
        
        var data = new FormData();        
            
            data.append('name',$('#nome').val());            
            data.append('imagem',$('#upimagem')[0].files[0]);            
            data.append('email',$('#email').val());
            data.append('password',$('#password').val());
            data.append('sistema',$('#edit_user_sistema').val());
            data.append('inativo',$('#edit_user_inativo').val());
            data.append('admin',$('#edit_user_admin').val());
            data.append('funcao_id',$('#edit_user_funcao_id').val());
            data.append('perfil_id',$('#edit_user_perfil_id').val());
            data.append('setor_id',$('#edit_user_setor_id').val());
            data.append('cpf',$('#cpf').val());
            data.append('rg',$('#rg').val());
            data.append('matricula',$('#matricula').val());            
            data.append('link_instagram',$('#link_instagram').val());
            data.append('link_facebook',$('#link_facebook').val());
            data.append('link_site',$('#link_site').val());           
            data.append('_enctype','multipart/form-data');
            data.append('_token',CSRF_TOKEN);
            data.append('_method','PUT');              

        $.ajax({
            url: '/page/perfil/'+id,
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success: function(response){
                if(response.status==400){
                      $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors,function(key,err_values){
                            $('#saveform_errList').append('<li>'+err_values+'</li>');
                        });
                        loading.hide();
                } else{
                    loading.hide();
                    $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');
                    loading.hide();
                    location.replace('/home');
                }  
            }  
        });

    });

    //upload da foto temporária
         $(document).on('change','#upimagem',function(){  
          
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var fd = new FormData();
            var files = $(this)[0].files;                      

            if(files.length > 0){
            // Append data 
            fd.append('imagem',$(this)[0].files[0]);      
            fd.append('_token',CSRF_TOKEN);
            fd.append('_enctype','multipart/form-data');
            fd.append('_method','put');      
            
        $.ajax({                      
                type: 'POST',                             
                url:'/page/fototemp-upload',                
                dataType: 'json',            
                data: fd,
                cache: false,
                processData: false,
                contentType: false,                                                                                     
                success: function(response){                              
                    if(response.status==400){
                        $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors,function(key,err_values){
                            $('#saveform_errList').append('<li>'+err_values+'</li>');
                        });
                }else{                                                     
                        var arq = response.filepath; 
                            arq = arq.toString();                  ;
                        var linkimagem = '{{asset('')}}'+arq;                        
                        var imagemnova = '<img src="'+linkimagem+'" class="imgfoto rounded-circle" width="100" >';
                        $(".imgfoto").replaceWith(imagemnova);
                    }   
                }                                  
            });
        }
        });   
    //fim upload da foto temporária
    ///excluir imagem temporária pelo cancelamento
    $(document).on('click','.cancelar_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var files = $('#upimagem')[0].files;                      

        if(files.length > 0){
        var data = new FormData();
            data.append('imagem',$('#upimagem')[0].files[0]);
            data.append('_token',CSRF_TOKEN);
            data.append('_enctype','multipart/form-data');
            data.append('_method','delete');   
             $.ajax({                      
                type: 'POST',                             
                url:'/page/delete-fototemp',                
                dataType: 'json',            
                data: data,
                cache: false,
                processData: false,
                contentType: false,                                                                                     
                success: function(response){                              
                    if(response.status==200){
                    $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');
                    location.replace('/home');
                } 
                }                                  
            });

        }else{
            location.replace('/home');
        }

    });
    //fim excluir imagem temporária pelo cancelamento

    ///busca cep
     $(document).on('click','#pesquisacep',function(e){
        e.preventDefault();
        var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var loading = $('#imgpesquisacep');
                var cep = $("#edit_cep").val().replace(/[^0-9]/g,'');
                          $("#imgcorreios").replaceWith('<img id="imgcorreios">')
                loading.show();
                if(cep !== "" && cep.length == 8){
                 $.ajax({
                    url:'/cep/' + cep,
                    type:'GET',
                    dataType:'json',
                    success: function (response) {
                            if(response.status==200){
                                if(response.localizacao.erro){
                                    $('#editpesquisacepresposta').replaceWith('<small id="editpesquisacepresposta" style="color:red;">CEP não localizado!</small>');
                                     loading.hide();
                                     var link = '{{asset('')}}storage/c1.png';
                                     $('#imgcorreios').replaceWith('<img id="imgcorreios" src="'+link+'" class="rounded-circle" width="20">');
                                }else{
                                $(".endereco").val(response.localizacao.logradouro);                                
                                $(".bairro").val(response.localizacao.bairro);
                                $(".cidade").val(response.localizacao.localidade);
                                $(".estado").val(response.localizacao.uf);                                
                                loading.hide();
                                var link = '{{asset('')}}storage/c1.png';
                                $('#imgcorreios').replaceWith('<img id="imgcorreios" src="'+link+'" class="rounded-circle" width="20">');
                                $('#editpesquisacepresposta').replaceWith('<small id="editpesquisacepresposta"></small>');
                                }
                            }
                         }
                });
                }else{
                    $('#editpesquisacepresposta').replaceWith('<small id="editpesquisacepresposta" style="color:red;">CEP deve conter 8 digitos</small>');
                    loading.hide();
                    var link = '{{asset('')}}storage/c1.png';
                    $('#imgcorreios').replaceWith('<img id="imgcorreios" src="'+link+'" class="rounded-circle" width="20">');
                }

     });
    //fim busca cep

});
</script>
@endsection
