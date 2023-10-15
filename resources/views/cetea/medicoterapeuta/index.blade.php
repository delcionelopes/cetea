@extends('adminlte::page')

@section('title', 'Médico Terapeuta')

@section('content')

<style>
    .tooltip-inner {
    text-align: left;
}
</style>

<!--AddMedicoTerapeutaModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="AddMedicoTerapeutaModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-primary">
                <h5 class="modal-title" id="titleModalLabel" style="color: white;">Adicionar Terapeuta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="addform" name="addform" class="form-horizontal" role="form">                 
                <ul id="saveform_errList"></ul>                   
                <div class="form-group mb-3">
                    <label for="addnome">Nome</label>
                    <input type="text" id="addnome" class="nome form-control">
                </div>
                <fieldset>
                    <legend>Informações profissionais</legend>
                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="addcrm_registro">Registro CR</label>
                            <input type="text" id="addcrm_registro" class="crregistro form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="addcrm_sigla">Sigla CR</label>
                            <input type="text" id="addcrm_sigla" class="crsigla form-control">
                        </div>
                        <div class="form-group mb-4">                            
                                <label for="addcpf">CPF</label>
                                <input type="text" class="cpf form-control" name="addcpf" id="addcpf" placeholder="000.000.000-00" data-mask="000.000.000-00" data-mask-reverse="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="addespecialidade">Especialidade</label>
                            <input type="text" id="addespecialidade" class="especialidade form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="addativo">Ativo</label>
                            <input type="checkbox" class="ativo checkbox" name="ativo" id="addativo" checked>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Contatos</legend>
                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="addcelular">Celular</label>
                            <input type="text" id="addcelular" class="celular form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="addtelefone">Telefone</label>
                            <input type="text" id="addtelefone" class="telefone form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="addemail">e-Mail</label>
                            <input type="text" id="addemail" class="email form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="addsite">Site</label>
                            <input type="text" id="addsite" class="site form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="addredesocial">Rede Social</label>
                            <input type="text" id="addredesocial" class="redesocial form-control">
                        </div>
                    </div>
                </fieldset>
                <div class="card">
                     <div class="card-body"> 
                            <fieldset>
                                <legend>Tratamentos conforme especialidade</legend>
                                <div class="form-check">                                    
                                    @foreach ($tratamentos as $tratamento)
                                    <label class="form-check-label" for="check{{$tratamento->id}}">
                                        <input type="checkbox" id="check{{$tratamento->id}}" name="tratamentos[]" value="{{$tratamento->id}}" class="form-check-input"> {{$tratamento->nome}}
                                    </label><br>
                                    @endforeach
                                </div>
                            </fieldset>   
                     </div>
                </div> 
            </form>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary add_medicoterapeuta"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
            </div>
        </div>
    </div>

</div>
<!--End AddTratamentoModal-->

<!--EditMedicoTerapeutaModal-->

<div class="modal fade animate__animated animate__bounce animate__faster" id="editMedicoTerapeutaModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-primary">
                <h5 class="modal-title" id="titleModalLabel" style="color: white;">Editar e atualizar Terapeuta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="editform" name="editform" class="form-horizontal" role="form">                
                <ul id="updateform_errList"></ul>    
                <input type="hidden" id="edit_medicoterapeuta_id">           
              <div class="form-group mb-3">
                    <label for="editnome">Nome</label>
                    <input type="text" id="editnome" class="nome form-control">
                </div>
                <fieldset>
                    <legend>Informações profissionais</legend>
                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="editcrm_registro">Registro CR</label>
                            <input type="text" id="editcrm_registro" class="crregistro form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="editcrm_sigla">Sigla CR</label>
                            <input type="text" id="editcrm_sigla" class="crsigla form-control">
                        </div>
                        <div class="form-group mb-4">                            
                                <label for="editcpf">CPF</label>
                                <input type="text" class="cpf form-control" name="editcpf" id="editcpf" placeholder="000.000.000-00" data-mask="000.000.000-00" data-mask-reverse="true">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="editespecialidade">Especialidade</label>
                            <input type="text" id="editespecialidade" class="especialidade form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="editativo">Ativo</label>
                            <input type="checkbox" class="ativo checkbox" name="ativo" id="editativo" checked>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Contatos</legend>
                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="editcelular">Celular</label>
                            <input type="text" id="editcelular" class="celular form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="editelefone">Telefone</label>
                            <input type="text" id="edittelefone" class="telefone form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="editemail">e-Mail</label>
                            <input type="text" id="editemail" class="email form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="editsite">Site</label>
                            <input type="text" id="editsite" class="site form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="editredesocial">Rede Social</label>
                            <input type="text" id="editredesocial" class="redesocial form-control">
                        </div>
                    </div>
                </fieldset>
                <div class="card">
                     <div class="card-body"> 
                            <fieldset>
                                <legend>Tratamentos conforme especialidade</legend>
                                <div class="form-check">                                    
                                    @foreach ($tratamentos as $tratamento)
                                    <label class="form-check-label" for="editcheck{{$tratamento->id}}">
                                        <input type="checkbox" id="editcheck{{$tratamento->id}}" name="tratamentos[]" value="{{$tratamento->id}}" class="form-check-input"> {{$tratamento->nome}}
                                    </label><br>
                                    @endforeach
                                </div>
                            </fieldset>   
                     </div>
                </div>
            </form>            
            </div>                                    
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary update_medicoterapeuta"><img id="imgedit" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Atualizar</button>
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
    <form action="{{route('ceteaadmin.medicoterapeuta.index')}}" class="form-search" method="GET">
        <div class="col-sm-12">
            <div class="input-group rounded">            
            <input type="text" name="pesquisa" class="form-control rounded float-left" placeholder="nome do(a) terapeuta" aria-label="Search"
            aria-describedby="search-addon">
            <button type="submit" class="pesquisa_btn input-group-text border-0" id="search-addon" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="bottom" data-toggle="popover" title="Pesquisa<br>Informe e tecle ENTER">
                <i class="fas fa-search"></i>
            </button>        
            <button type="button" class="AddMedicoTerapeutaModal_btn input-group-text border-0 animate__animated animate__bounce" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="top" data-toggle="popover" title="Novo registro">
                <i class="fas fa-plus"></i>
            </button>                
            </div>            
            </div>        
            </form>                     
  
    </section>    
            
                    <table class="table table-hover">
                        <thead class="sidebar-dark-primary" style="color: white">
                            <tr>                                
                                <th scope="col">TERAPEUTAS</th>                    
                                <th scope="col">TRATAMENTOS</th>
                                <th scope="col">AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody id="lista_medicoterapeuta">
                        <tr id="novo" style="display:none;"></tr>
                        @forelse($medicosterapeutas as $terapeuta)   
                            <tr id="terapeuta{{$terapeuta->id}}">                                
                                <th scope="row">{{$terapeuta->nome}}</th>
                                <td>
                                <div class="btn-group">                                
                                        @if($terapeuta->tratamentos->count())                                
                                        <button type="button" class="btn btn-none dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-folder"></i><span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" id="dropdown{{$terapeuta->id}}">
                                            @foreach($terapeuta->tratamentos as $tratamento)                                                                                                            
                                            <li class="dropdown-item"><a href="{{route('ceteaadmin.medicoterapeuta.medicoxtratamento',['tratamento_id'=>$tratamento->id])}}" class="dropdown-item">{{$tratamento->nome}}</a></li>
                                            @endforeach
                                        </ul>                                           
                                        @endif                               
                                </div>       
                                </td>
                                <td>                                    
                                        <div class="btn-group">                                           
                                            <button type="button" data-id="{{$terapeuta->id}}" data-nome="{{$terapeuta->nome}}" class="edit_terapeuta fas fa-edit" style="background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="left" data-toggle="popover" title="Editar"></button>
                                            <button type="button" data-id="{{$terapeuta->id}}" data-nome="{{$terapeuta->nome}}" class="delete_terapeuta_btn fas fa-trash" style="background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="right" data-toggle="popover" title="Excluir"></button>
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
                    {{$medicosterapeutas->links()}}
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
    
        $(document).on('click','.delete_terapeuta_btn',function(e){   ///inicio delete
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
                    url: '/ceteaadmin/medicoterapeuta/delete/'+id,
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
                            $("#terapeuta"+id).remove();     
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
        $("#editMedicoTerapeutaModal").on('shown.bs.modal',function(){
            $("#edit_nome").focus();            
        });
        $(document).on('click','.edit_terapeuta',function(e){  
            e.preventDefault();
            var linklogo = "{{asset('storage')}}";
            var id = $(this).data("id");            
            var nome = $(this).data("nome");
            
            $("#editform").trigger('reset');
            $("#editMedicoTerapeutaModal").modal('show');          
            $("#updateform_errList").replaceWith('<ul id="updateform_errList"></ul>');      
    
            $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }                    
                });
    
    
            $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/ceteaadmin/medicoterapeuta/edit/'+id,                                
                success: function(response){           
                    if(response.status==200){                           
                        $(".nome").val(response.medicoterapeuta.nome);
                        $(".crregistro").val(response.medicoterapeuta.crm_registro);
                        $(".crsigla").val(response.medicoterapeuta.sigla_crm);                       
                        $(".cpf").val(response.medicoterapeuta.cpf);
                        $(".especialidade").val(response.medicoterapeuta.especialidade);
                        if(response.medicoterapeuta.ativo){
                        $(".ativo").attr('checked',true);
                        }else{
                        $(".ativo").attr('checked',false);    
                        }
                        $(".celular").val(response.medicoterapeuta.celular);
                        $(".telefone").val(response.medicoterapeuta.telefone);
                        $(".email").val(response.medicoterapeuta.email);
                        $(".site").val(response.medicoterapeuta.site);
                        $(".redesocial").val(response.medicoterapeuta.redesocial);                        
                        $("#edit_medicoterapeuta_id").val(response.medicoterapeuta.id);

                        $.each(response.tratamentosrelacionados,function(key,values){
                            $("#editcheck"+values.id).attr('checked',true);
                        });
                    }      
                }
            });        
    
        }); //fim da da exibição do form Edit
    
        $(document).on('click','.update_medicoterapeuta',function(e){ //inicio da atualização de registro
            e.preventDefault();
            var loading = $("#imgedit");
                loading.show();
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');            
    
            var id = $("#edit_medicoterapeuta_id").val();        

            var tratamentos = new Array;

            $("input[name='tratamentos[]']:checked").each(function(){
                tratamentos.push($(this).val());
            });
    
            var data = {
                'nome' : $("#editnome").val(),                
                'cr_registro' : $('#editcrm_registro').val(),
                'cr_sigla' : $('#editcrm_sigla').val(),
                'cpf' : $('#editcpf').val(),
                'especialidade' : $('#editespecialidade').val(),
                'celular' : $('#editcelular').val(),
                'telefone' : $('#edittelefone').val(),
                'email' : $('#editemail').val(),
                'site' : $('#editsite').val(),
                'redesocial' : $('#editredesocial').val(),
                'ativo' : $('#editativo').is(":checked")?'true':'false',
                'tratamentos' : JSON.stringify(tratamentos),
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            }
            
            $.ajax({     
                type: 'POST',                          
                data: data,
                dataType: 'json',    
                url: '/ceteaadmin/medicoterapeuta/update/'+id,         
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
                        $("#editMedicoTratamentoModal").modal('hide');
                        
                        location.replace('/ceteaadmin/medicoterapeuta/index');
                       
    
                                                                                                       
    
                    }
                }
            });        
    
        }); //fim da atualização do registro
    
        //exibe form de adição de registro
        $("#AddMedicoTerapeutaModal").on('shown.bs.modal',function(){
            $(".nome").focus();
        });
        $(document).on('click','.AddMedicoTerapeutaModal_btn',function(e){  //início da exibição do form Add
            e.preventDefault();            
            $("#addform").trigger('reset');
            $("#AddMedicoTerapeutaModal").modal('show'); 
            $("#saveform_errList").replaceWith('<ul id="saveform_errList"></ul>');
        });
    
        //fim exibe form de adição de registro
    
        $(document).on('click','.add_medicoterapeuta',function(e){ //início da adição de Registro
            e.preventDefault();
            var loading = $("#imgadd");
                loading.show();
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   

            var tratamentos = new Array;

            $("input[name='tratamentos[]']:checked").each(function(){
                tratamentos.push($(this).val());
            });
    
            var data = {
                'nome' : $("#addnome").val(),                
                'cr_registro' : $('#addcrm_registro').val(),
                'cr_sigla' : $('#addcrm_sigla').val(),
                'cpf' : $('#addcpf').val(),
                'especialidade' : $('#addespecialidade').val(),
                'celular' : $('#addcelular').val(),
                'telefone' : $('#addtelefone').val(),
                'email' : $('#addemail').val(),
                'site' : $('#addsite').val(),
                'redesocial' : $('#addredesocial').val(),
                'ativo' : $('#addativo').is(":checked")?'true':'false',
                'tratamentos' : JSON.stringify(tratamentos),
                '_method':'PUT',
                '_token':CSRF_TOKEN,
            }
            
            $.ajax({
                type: 'POST',
                url: '/ceteaadmin/medicoterapeuta/store',
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
                        $("#AddMedicoTratamentoModal").modal('hide');

                        location.replace('/ceteaadmin/medicoterapeuta/index');
                        
                    }
                    
                }
            });
    
        }); //Fim da adição de registro
    ///tooltip
    $(function(){             
        $(".AddMedicoTerapeutaModal_btn").tooltip();
        $(".pesquisa_btn").tooltip();        
        $(".delete_terapeuta_btn").tooltip();
        $(".edit_terapeuta").tooltip();    
    });
    ///fim tooltip
    
    }); ///Fim do escopo do script
    
    </script>
@stop