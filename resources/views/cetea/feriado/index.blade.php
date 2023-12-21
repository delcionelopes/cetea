@extends('adminlte::page')

@section('title', 'Feriado')

@section('content')

<style>
    .tooltip-inner {
    text-align: left;
}
</style>

<!--AddFeriadoModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="AddFeriadoModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-{{$color}}">
                <h5 class="modal-title" id="titleModalLabel" style="color: white;">Adicionar Feriado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="addform" name="addform" class="form-horizontal" role="form">                 
                <ul id="saveform_errList"></ul>                   
                <div class="form-group mb-3">
                    <label for="adddescricao">Descrição</label>
                    <input type="text" id="adddescricao" class="descricao form-control">
                </div>                     
                <div class="form-group mb-3">
                    <label for="adddia">Dia</label>
                    <input type="text" id="adddia" class="dia form-control" placeholder="00" data-mask="00" data-mask-reverse="true">
                </div>                     
                <div class="form-group mb-3">
                    <label for="addmes">Mês</label>
                    <input type="text" id="addmes" class="mes form-control" placeholder="00" data-mask="00" data-mask-reverse="true">
                </div>                                     
            </form>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-{{$color}} add_feriado"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
            </div>
        </div>
    </div>

</div>
<!--End AddFeriadoModal-->

<!--EditFeriadoModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="editFeriadoModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-{{$color}}">
                <h5 class="modal-title" id="titleModalLabel" style="color: white;">Editar e atualizar Feriado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="editform" name="editform" class="form-horizontal" role="form">                
                <ul id="updateform_errList"></ul>               
                <input type="hidden" id="edit_feriado_id">
                <div class="form-group mb-3">
                    <label for="edit_descricao">Descrição</label>
                    <input type="text" id="edit_descricao" class="descricao form-control">
                </div>  
                 <div class="form-group mb-3">
                    <label for="edit_dia">Dia</label>
                    <input type="text" id="edit_dia" class="dia form-control" placeholder="00" data-mask="00" data-mask-reverse="true">
                </div>                     
                <div class="form-group mb-3">
                    <label for="edit_mes">Mês</label>
                    <input type="text" id="edit_mes" class="mes form-control" placeholder="00" data-mask="00" data-mask-reverse="true">
                </div>                   
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-{{$color}} update_feriado"><img id="imgedit" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Atualizar</button>
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
    <form action="{{route('ceteaadmin.feriado.index',['color'=>$color])}}" class="form-search" method="GET">
        <div class="col-sm-12">
            <div class="input-group rounded">            
            <input type="text" name="pesquisa" class="form-control rounded float-left" placeholder="descrição do feriado" aria-label="Search"
            aria-describedby="search-addon">
            <button type="submit" class="pesquisa_btn input-group-text border-0" id="search-addon" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="bottom" data-toggle="popover" title="Pesquisa<br>Informe e tecle ENTER">
                <i class="fas fa-search"></i>
            </button>        
            <button type="button" class="AddFeriadoModal_btn input-group-text border-0 animate__animated animate__bounce" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="top" data-toggle="popover" title="Novo registro">
                <i class="fas fa-plus"></i>
            </button>                
            </div>            
            </div>        
            </form>                     
  
    </section>    
            
                    <table class="table table-hover">
                        <thead class="bg-{{$color}}" style="color: white">
                            <tr>                                
                                <th scope="col">Descrição</th>                    
                                <th scope="col">Dia/Mes</th>
                                <th scope="col">AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody id="lista_feriado">
                        <tr id="novo" style="display:none;"></tr>
                        @forelse($feriados as $feriado)   
                            <tr id="feriado{{$feriado->id}}">                                
                                <th scope="row">{{$feriado->descricao}}</th>
                                <th scope="row">{{$feriado->dia}}/{{$feriado->mes}}</th>
                                <td>                                    
                                        <div class="btn-group">                                           
                                            <button type="button" data-id="{{$feriado->id}}" data-descricao="{{$feriado->descricao}}" class="edit_feriado fas fa-edit" style="background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="left" data-toggle="popover" title="Editar"></button>
                                            <button type="button" data-id="{{$feriado->id}}" data-descricao="{{$feriado->descricao}}" class="delete_feriado_btn fas fa-trash" style="background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="right" data-toggle="popover" title="Excluir"></button>
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
                    {{$feriados->links()}}
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
    
        $(document).on('click','.delete_feriado_btn',function(e){   ///inicio delete
            e.preventDefault();          
            var linklogo = "{{asset('storage')}}";
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   
            var id = $(this).data("id");            
            var descricao = $(this).data("descricao");
            
            Swal.fire({
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                title:descricao,
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
                    url: '/ceteaadmin/feriado/delete/'+id,
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
                            $("#feriado"+id).remove();     
                            $("#success_message").replaceWith('<div id="success_message"></div>');                       
                            $("#success_message").addClass('alert alert-success');
                            $("#success_message").text(response.message);         
                        }
                    }
                }); 
            } 
        });   
      
        });  ///fim delete
        //início da exibição do form Edit
        $("#editFeriadoModal").on('shown.bs.modal',function(){
            $("#edit_descricao").focus();
        });
        $(document).on('click','.edit_feriado',function(e){  
            e.preventDefault();            
            var id = $(this).data("id");            
            
            $("#editform").trigger('reset');
            $("#editFeriadoModal").modal('show');          
            $("#updateform_errList").replaceWith('<ul id="updateform_errList"></ul>');      
    
            $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
            $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/ceteaadmin/feriado/edit/'+id,                                
                success: function(response){           
                    if(response.status==200){                           
                        $(".descricao").val(response.feriado.descricao);
                        $(".dia").val(response.feriado.dia);
                        $(".mes").val(response.feriado.mes);
                        $("#edit_feriado_id").val(response.feriado.id);
                    }      
                }
            });        
    
        }); //fim da da exibição do form Edit
    
        $(document).on('click','.update_feriado',function(e){ //inicio da atualização de registro
            e.preventDefault();
            var loading = $("#imgedit");
                loading.show();
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');            
    
            var id = $("#edit_feriado_id").val();
    
            var data = {
                'descricao' : $("#edit_descricao").val(),
                'dia' : $("#edit_dia").val(),
                'mes' : $("#edit_mes").val(),                
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            }
            
            $.ajax({     
                type: 'POST',                          
                data: data,
                dataType: 'json',    
                url: '/ceteaadmin/feriado/update/'+id,         
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
                        $("#editFeriadoModal").modal('hide');                  
                        
                        //atualizando a linha na tabela html                      
    
                            var linha = '<tr id="feriado'+response.feriado.id+'">\
                                    <th scope="row">'+response.feriado.descricao+'</th>\
                                    <th scope="row">'+response.feriado.dia+'/'+response.feriado.mes+'</th>\
                                    <td><div class="btn-group">\
                                    <button type="button" data-id="'+response.feriado.id+'" data-descricao="'+response.feriado.descricao+'" class="edit_feriado fas fa-edit" style="background:transparent;border:none"></button>\
                                    <button type="button" data-id="'+response.feriado.id+'" data-descricao="'+response.feriado.descricao+'" class="delete_feriado_btn fas fa-trash" style="background:transparent;border:none"></button>\
                                    </div></td>\
                                    </tr>';                             
                        $("#feriado"+id).replaceWith(linha);                                                                                
    
                    }
                }
            });    
    
        
    
        }); //fim da atualização do registro
    
        //exibe form de adição de registro
        $("#AddFeriadoModal").on('shown.bs.modal',function(){
            $(".descricao").focus();
        });
        $(document).on('click','.AddFeriadoModal_btn',function(e){  //início da exibição do form Add
            e.preventDefault();            
            $("#addform").trigger('reset');
            $("#AddFeriadoModal").modal('show'); 
            $("#saveform_errList").replaceWith('<ul id="saveform_errList"></ul>');    
        });
    
        //fim exibe form de adição de registro
    
        $(document).on('click','.add_feriado',function(e){ //início da adição de Registro
            e.preventDefault();
            var loading = $("#imgadd");
                loading.show();
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   
            var data = {
                'descricao': $(".descricao").val(),
                'dia': $(".dia").val(),
                'mes': $(".mes").val(),
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            } 
            
            $.ajax({
                type: 'POST',
                url: '/ceteaadmin/feriado/store',
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
                        $("#AddFeriadoModal").modal('hide');
    
                        //adiciona a linha na tabela html                      
                            
                        var tupla = "";
                        var linha0 = "";
                        var linha1 = "";
                            linha0 = '<tr id="novo" style="display:none;"></tr>';
                            linha1 = '<tr id="feriado'+response.feriado.id+'">\
                                    <th scope="row">'+response.feriado.descricao+'</th>\
                                    <th scope="row">'+response.feriado.dia+'/'+response.feriado.mes+'</th>\
                                    <td><div class="btn-group">\
                                    <button type="button" data-id="'+response.feriado.id+'" data-descricao="'+response.feriado.descricao+'" class="edit_feriado fas fa-edit" style="background:transparent;border:none"></button>\
                                    <button type="button" data-id="'+response.feriado.id+'" data-descricao="'+response.feriado.descricao+'" class="delete_feriado_btn fas fa-trash" style="background:transparent;border:none"></button>\
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
        $(".AddFeriadoModal_btn").tooltip();
        $(".pesquisa_btn").tooltip();        
        $(".delete_feriado_btn").tooltip();
        $(".edit_feriado").tooltip();    
    });
    ///fim tooltip

    
    }); ///Fim do escopo do script
    
    </script>
@stop