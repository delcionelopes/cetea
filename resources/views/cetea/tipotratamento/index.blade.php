@extends('adminlte::page')

@section('title', 'Tipo de tratamento')

@section('content')

<style>
    .tooltip-inner {
    text-align: left;
}
</style>

<!--AddTipoTratamentoModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="AddTipoTratamentoModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-{{$color}}">
                <h5 class="modal-title" id="titleModalLabel" style="color: white;">Adicionar Tipo de Tratamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="addform" name="addform" class="form-horizontal" role="form">                 
                <ul id="saveform_errList"></ul>                   
                <div class="form-group mb-3">
                    <label for="">Nome</label>
                    <input type="text" class="nome form-control">
                </div>                                    
            </form>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-{{$color}} add_tipotratamento"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
            </div>
        </div>
    </div>

</div>
<!--End AddTipoTratamentoModal-->

<!--EditTipoTratamentoModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="editTipoTratamentoModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-{{$color}}">
                <h5 class="modal-title" id="titleModalLabel" style="color: white;">Editar e atualizar Tipo de Tratamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="editform" name="editform" class="form-horizontal" role="form">                
                <ul id="updateform_errList"></ul>               
                <input type="hidden" id="edit_tipotratamento_id">
                <div class="form-group mb-3">
                    <label for="edit_nome">Nome</label>
                    <input type="text" id="edit_nome" class="nome form-control">
                </div>                         
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-{{$color}} update_tipotratamento"><img id="imgedit" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Atualizar</button>
            </div>
        </div>
    </div>
</div>

<!--index-->
@auth
@if(!(auth()->user()->inativo))
<div class="container-fluid py-5">   
    <div id="success_message"></div>    
    <section class="border p-4 mb-4 d-flex align-items-left">    
    <form action="{{route('ceteaadmin.tipotratamento.index',['color'=>$color])}}" class="form-search" method="GET">
        <div class="col-sm-12">
            <div class="input-group rounded">            
            <input type="text" name="pesquisa" class="form-control rounded float-left" placeholder="nome do tipo" aria-label="Search"
            aria-describedby="search-addon">
            <button type="submit" class="pesquisa_btn input-group-text border-0" id="search-addon" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="bottom" data-toggle="popover" title="Pesquisa<br>Informe e tecle ENTER">
                <i class="fas fa-search"></i>
            </button>        
            <button type="button" class="AddTipoTratamentoModal_btn input-group-text border-0 animate__animated animate__bounce" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="top" data-toggle="popover" title="Novo registro">
                <i class="fas fa-plus"></i>
            </button>                
            </div>            
            </div>        
            </form>                     
  
    </section>    
            
                    <table class="table table-hover">
                        <thead class="bg-{{$color}}" style="color: white">
                            <tr>                                
                                <th scope="col">TIPOS DE TRATAMENTOS</th>                    
                                <th scope="col">AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody id="lista_tipotratamento">
                        <tr id="novo" style="display:none;"></tr>
                        @forelse($tipotratamentos as $tipo)   
                            <tr id="tipo{{$tipo->id}}">                                
                                <th scope="row">{{$tipo->nome}}</th>                                
                                <td>                                    
                                        <div class="btn-group">                                           
                                            <button type="button" data-id="{{$tipo->id}}" data-nome="{{$tipo->nome}}" class="edit_tipotratamento fas fa-edit" style="background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="left" data-toggle="popover" title="Editar"></button>
                                            <button type="button" data-id="{{$tipo->id}}" data-nome="{{$tipo->nome}}" class="delete_tipotratamento_btn fas fa-trash" style="background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="right" data-toggle="popover" title="Excluir"></button>
                                        </div>                                    
                                </td>
                            </tr>  
                            @empty
                            <tr id="nadaencontrado">
                                <td colspan="4">Nada Encontrado!</td>
                            </tr>                      
                            @endforelse                                                    
                        </tbody>
                    </table> 
                    <div class="d-flex hover justify-content-center">
                    {{$tipotratamentos->links()}}
                    </div>  
   
    </div>        
    
</div> 
@else 
  <i class="fas fa-lock"></i><b class="title"> USUÁRIO INATIVO OU NÃO LIBERADO! CONTACTE O ADMINISTRADOR.</b>
@endif
@endauth
<!--End Index-->
@stop

@section('css')
    <!--<link rel="stylesheet" href="/css/admin_custom.css">  -->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>
@stop

@section('js')

<script type="text/javascript">

$(document).ready(function(){        
    
        $(document).on('click','.delete_tipotratamento_btn',function(e){   ///inicio delete
            e.preventDefault();          
            var linklogo = "{{asset('storage')}}";
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   
            var id = $(this).data("id");            
            var nome = $(this).data("nome");
            
            Swal.fire({
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                title:nome,
                text: "Deseja excluir?",
                imageUrl: linklogo+'/logoprodap.jpg',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'imagem do sistema',
                showCancelButton: true,
                confirmButtonText: 'Sim, prossiga!',                
                cancelButtonText: 'Não, cancelar!',                                 
             }).then((result)=>{
             if(result.isConfirmed){             
                $.ajax({
                    url: '/ceteaadmin/tipotratamento/delete/'+id,
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        'id': id,
                        '_method': 'DELETE',                    
                        '_token':CSRF_TOKEN,
                    },
                    success:function(response){
                        if(response.status==200){                        
                            //remove linha correspondente da tabela html
                            $("#tipo"+id).remove();     
                            $("#success_message").replaceWith('<div id="success_message"></div>');                       
                            $("#success_message").addClass('alert alert-success');
                            $("#success_message").text(response.message);         
                        }else{
                            //Não pôde excluir por causa dos relacionamentos    
                            $("#success_message").replaceWith('<div id="success_message"></div>');                        
                            $("#success_message").addClass('alert alert-danger');
                            $("#success_message").text(response.errors);
                        }
                    }
                }); 
            } 
        });   
      
        });  ///fim delete
        //início da exibição do form Edit
        $("#editTipoTratamentoModal").on('shown.bs.modal',function(){
            $("#edit_nome").focus();
        });
        $(document).on('click','.edit_tipotratamento',function(e){  
            e.preventDefault();
            var linklogo = "{{asset('storage')}}";
            var id = $(this).data("id");            
            var nome = $(this).data("nome");
            
            $("#editform").trigger('reset');
            $("#editTipoTratamentoModal").modal('show');          
            $("#updateform_errList").replaceWith('<ul id="updateform_errList"></ul>');      
    
            $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
            $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/ceteaadmin/tipotratamento/edit/'+id,                                
                success: function(response){           
                    if(response.status==200){                           
                        $(".nome").val(response.tipotratamento.nome);                        
                        $("#edit_tipotratamento_id").val(response.tipotratamento.id);                                                                                                       
                    }      
                }
            });        
    
        }); //fim da da exibição do form Edit
    
        $(document).on('click','.update_tipotratamento',function(e){ //inicio da atualização de registro
            e.preventDefault();
            var loading = $("#imgedit");
                loading.show();
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');            
    
            var id = $("#edit_tipotratamento_id").val();        
    
            var data = {
                'nome' : $("#edit_nome").val(),                
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            }
            
            $.ajax({     
                type: 'POST',                          
                data: data,
                dataType: 'json',    
                url: '/ceteaadmin/tipotratamento/update/'+id,         
                success: function(response){                                                    
                    if(response.status==400){
                        //erros
                        $("#updateform_errList").replaceWith('<ul id="updateform_errList"></ul>');
                        $("#updateform_errList").addClass('alert alert-danger');
                        $.each(response.errors,function(key,err_values){
                            $("#updateform_errList").append('<li>'+err_values+'</li>');
                        });
    
                        loading.hide();
    
                    } else if(response.status==404){
                        $("#updateform_errList").replaceWith('<ul id="updateform_errList"></ul>');    
                        $("#success_message").replaceWith('<div id="success_message"></div>');             
                        $("#success_message").addClass('alert alert-warning');
                        $("#success_message").text(response.message);
                        loading.hide();
    
                    } else {
                        $("#updateform_errList").replaceWith('<ul id="updateform_errList"></ul>');      
                        $("#success_message").replaceWith('<div id="success_message"></div>');                 
                        $("#success_message").addClass("alert alert-success");
                        $("#success_message").text(response.message);
                        loading.hide();
    
                        $("#editform").trigger('reset');
                        $("#editTipoTratamentoModal").modal('hide');                  
                        
                        //atualizando a linha na tabela html                      
    
                            var linha = '<tr id="tipo'+response.tipotratamento.id+'">\
                                    <th scope="row">'+response.tipotratamento.nome+'</th>\
                                    <td><div class="btn-group">\
                                    <button type="button" data-id="'+response.tipotratamento.id+'" data-nome="'+response.tipotratamento.nome+'" class="edit_tipotratamento fas fa-edit" style="background:transparent;border:none"></button>\
                                    <button type="button" data-id="'+response.tipotratamento.id+'" data-nome="'+response.tipotratamento.nome+'" class="delete_tipotratamento_btn fas fa-trash" style="background:transparent;border:none"></button>\
                                    </div></td>\
                                    </tr>';                             
                        $("#tipo"+id).replaceWith(linha);                                                                                
    
                    }
                }
            });    
    
        
    
        }); //fim da atualização do registro
    
        //exibe form de adição de registro
        $("#AddTipoTratamentoModal").on('shown.bs.modal',function(){
            $(".nome").focus();
        });
        $(document).on('click','.AddTipoTratamentoModal_btn',function(e){  //início da exibição do form Add
            e.preventDefault();     
            
            var link = "{{asset('storage')}}";           
            
            $("#addform").trigger('reset');
            $("#AddTipoTratamentoModal").modal('show'); 
            $("#saveform_errList").replaceWith('<ul id="saveform_errList"></ul>');    
        });
    
        //fim exibe form de adição de registro
    
        $(document).on('click','.add_tipotratamento',function(e){ //início da adição de Registro
            e.preventDefault();
            var loading = $("#imgadd");
                loading.show();
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   
            var data = {
                'nome': $(".nome").val(),                
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            } 
            
            $.ajax({
                type: 'POST',
                url: '/ceteaadmin/tipotratamento/store',
                data: data,
                dataType: 'json',
                success: function(response){
                    if(response.status==400){
                        $("#saveform_errList").replaceWith('<ul id="saveform_errList"></ul>');
                        $("#saveform_errList").addClass('alert alert-danger');
                        $.each(response.errors,function(key,err_values){
                            $("#saveform_errList").append('<li>'+err_values+'</li>');
                        });
                        loading.hide();
                    } else {
                        $("#saveform_errList").replaceWith('<ul id="saveform_errList"></ul>');     
                        $("#success_message").replaceWith('<div id="success_message"></div>');              
                        $("#success_message").addClass('alert alert-success');
                        $("#success_message").text(response.message);                                        
                        loading.hide();
                        $("#addform").trigger('reset');                    
                        $("#AddTipoTratamentoModal").modal('hide');
    
                        //adiciona a linha na tabela html                      
                            
                        var tupla = "";
                        var linha0 = "";
                        var linha1 = "";
                            linha0 = '<tr id="novo" style="display:none;"></tr>';
                            linha1 = '<tr id="tipo'+response.tipotratamento.id+'">\
                                    <th scope="row">'+response.tipotratamento.nome+'</th>\
                                    <td><div class="btn-group">\
                                    <button type="button" data-id="'+response.tipotratamento.id+'" data-nome="'+response.tipotratamento.nome+'" class="edit_tipotratamento fas fa-edit" style="background:transparent;border:none"></button>\
                                    <button type="button" data-id="'+response.tipotratamento.id+'" data-nome="'+response.tipotratamento.nome+'" class="delete_tipotratamento_btn fas fa-trash" style="background:transparent;border:none"></button>\
                                    </div></td>\
                                    </tr>';
                        if(!$("#nadaencontrado").html==""){
                            $("#nadaencontrado").remove();
                        }
                        tupla = linha0+linha1;                             
                        $("#novo").replaceWith(tupla);                                                     
                        
                    }
                    
                }
            });
    
        }); //Fim da adição de registro
    ///tooltip
    $(function(){             
        $(".AddTipoTratamentoModal_btn").tooltip();
        $(".pesquisa_btn").tooltip();        
        $(".delete_tipotratamento_btn").tooltip();
        $(".edit_tipotratamento").tooltip();    
    });
    ///fim tooltip

    
    }); ///Fim do escopo do script
    
    </script>
@stop