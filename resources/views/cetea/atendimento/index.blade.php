@extends('adminlte::page')

@section('title', 'Atendimento')

@section('content')

<style>
    .tooltip-inner {
    text-align: left;
}
</style>


<!--index-->
@auth
@if(!(auth()->user()->inativo))
<div class="container-fluid py-5">   
    <div id="success_message"></div>    

    <section class="border p-4 mb-4 d-flex align-items-left">
    
    <form action="{{route('ceteaadmin.atendimento.index',['color'=>$color])}}" class="form-search" method="GET">
        <div class="col-sm-12">
            <div class="input-group rounded">            
            <input type="text" name="pesquisa" class="form-control rounded float-left" placeholder="nome do paciente" aria-label="Search"
            aria-describedby="search-addon">
            <button type="submit" class="pesquisa_btn input-group-text border-0" id="search-addon" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="bottom" data-toggle="popover" title="Pesquisa<br>Informe e tecle ENTER">
                <i class="fas fa-search"></i>
            </button>            
            
            <a href="{{route('ceteaadmin.atendimento.create',['color'=>$color])}}" type="button" class="AddAtendimentoModal_btn input-group-text border-0 animate__animated animate__bounce" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="top" data-toggle="popover" title="Novo registro"><i class="fas fa-plus"></i></a>
            
            </div>            
            </div>        
            </form>                     
  
    </section>    
            
                    <table class="table table-hover">
                        <thead class="bg-{{$color}}" style="color: white">
                            <tr>                                
                                <th scope="col">ATENDIMENTO(s)</th>
                                <th scope="col">TIPO(s)</th>
                                <th scope="col">DATA</th>
                                <th scope="col">ANEXOS</th>                                
                                <th scope="col">AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody id="lista_paciente">
                        <tr id="novo" style="display:none;"></tr>
                        @forelse($atendimentos as $atendimento)
                        @if($atendimento->tipo_atendimento_id===1)
                            <tr id="atendimento{{$atendimento->id}}" class="bg-success">
                        @else
                            <tr id="atendimento{{$atendimento->id}}">
                        @endif        
                                <th scope="row">{{$atendimento->paciente}}</th>
                                <td>{{$atendimento->tipo_atendimento->nome}}</td>
                                @if($atendimento->tipo_atendimento_id===1)
                                <td>{{date('d/m/Y H:i:s',strtotime($atendimento->data_atendimento))}}</td>
                                @else @if($atendimento->tipo_atendimento_id===2)
                                      <td>{{date('d/m/Y',strtotime($atendimento->data_retorno))}}</td>
                                      @else @if($atendimento->tipo_atendimento_id===3)
                                            <td>{{date('d/m/Y', strtotime($atendimento->data_encaminhamento))}}</td>
                                            @else
                                            <td>{{date('d/m/Y', strtotime($atendimento->data_agendamento))}}</td>
                                            @endif
                                      @endif
                                @endif      
                                <td>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="btn-group" id="docs{{$atendimento->id}}">
                                        <button type="button" class="btn btn-none dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-file-pdf"></i><span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" id="listdocs{{$atendimento->id}}">
                                        <li class="dropdown-item files_enviar_btn" data-id="{{$atendimento->id}}">
                                             <span class="btn btn-{{$color}} fileinput-button"><i class="fas fa-folder-open" style="color: red"></i>
                                                <input data-id="{{$atendimento->id}}" id="arquivo{{$atendimento->id}}" class="arquivo" type="file" name="arquivo[]" accept="application/pdf" multiple>
                                             </span>  
                                        </li>
                                            @foreach($atendimento->arquivos_atendimento as $doc)
                                            <li id="doc{{$doc->id}}" class="dropdown-item">                                                 
                                                    <a href="#!" id="btn_excluir" data-id="{{$doc->id}}" data-filename="{{$doc->nome}}" class="btn_excluir_doc fas fa-trash" style="color: red"></a>
                                                    <a href="#!" id="btn_abrir" data-id="{{$doc->id}}" type="button" class="btn_abrir_doc btn btn-none" style="color: blue">{{$doc->nome}}</a>
                                            </li>                                            
                                            @endforeach                                        
                                        </ul>                                        
                                    </div>     
                                    </form>
                                </td>                                
                                <td>                                    
                                    @if(($atendimento->tipo_atendimento_id===1) || ($atendimento->tipo_atendimento_id===4 && date('Y-m-d', strtotime($atendimento->data_atendimento))===date('Y-m-d')))
                                        <div class="btn-group">                                           
                                            <a href="{{route('ceteaadmin.atendimento.edit',['id'=>$atendimento->id,'color'=>$color])}}" type="button" data-id="{{$atendimento->id}}" class="edit_atendimento fas fa-edit" style="color: black; background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="left" data-toggle="popover" title="Editar"></a>
                                            <button type="button" data-id="{{$atendimento->id}}" data-nome="{{$atendimento->paciente}}" class="delete_atendimento_btn fas fa-trash" style="background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="right" data-toggle="popover" title="Excluir"></button>
                                        </div>
                                    @else
                                        <div class="btn-group">                                           
                                            <button type="button" data-id="{{$atendimento->id}}" data-nome="{{$atendimento->paciente}}" data-color="{{$color}}" class="cria_atendimento fas fa-file" style="color: black; background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="left" data-toggle="popover" title="Criar atendimento"></button>
                                        </div>
                                    @endif                                    
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
                    {{$atendimentos->links()}}
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

<link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    
@stop

@section('js')

<script type="text/javascript">

$(document).ready(function(){

     $(document).on('click','.delete_atendimento_btn',function(e){   ///inicio delete
            e.preventDefault();           
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   
            var id = $(this).data("id");
            var linklogo = "{{asset('storage')}}";

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
                    url: '/ceteaadmin/atendimento/delete/'+id,
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        'id': id,                                         
                        '_token':CSRF_TOKEN,
                        '_method':'delete',
                    },
                    success:function(response){
                        if(response.status==200){                        
                            //remove linha correspondente da tabela html
                            $("#atendimento"+id).remove();     
                            $('#success_message').replaceWith('<div id="success_message"></div>');                       
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);         
                        }else{
                            //Não pôde excluir por causa dos relacionamentos    
                            $('#success_message').replaceWith('<div id="success_message"></div>');                                                    
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.errors);         
                        }
                    }
                }); 
            }  
        });        
       
      
    });  ///fim delete

   //inicio enviar docs
    $(document).on('change','.arquivo',function(){
            var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            var formData = new FormData();            
            let id = $(this).data('id');      
            let TotalFiles = $('#arquivo'+id)[0].files.length;
            let files = $('#arquivo'+id)[0];    

            for(let i=0; i < TotalFiles; i++){
                formData.append('arquivo'+i, files.files[i]);                            
            }

            formData.append('TotalFiles',TotalFiles);                    
            formData.append('_token',CSRF_TOKEN);
            formData.append('_enctype','multipart/form-data');
            formData.append('_method','PUT'); 
            
            $('.arquivo').val(""); ///limpa o input
                                
            $.ajax({                                             
                url: '/ceteaadmin/atendimento/upload-docs/'+id,              
                type:'POST',
                dataType: 'json',        
                data:formData,
                cache:false,        
                contentType: false,        
                processData: false, 
                async: true,       
                success: function(response){                              
                if(response.status==200){                      
                      $.each(response.arquivos,function(key,docs){  
                        $('#doc'+docs.id).remove();                                                                                                         
                        $('#listdocs'+id).append('<li id="doc'+docs.id+'" class="dropdown-item">\
                                                    <a href="#!" id="btn_excluir_doc" data-id="'+docs.id+'" data-filename="'+docs.nome+'" class="fas fa-trash" style="color: red"></a>\
                                                    <a href="#!" id="btn_abrir_doc" data-id="'+docs.id+'" type="button" class="btn btn-none" style="color: blue">'+docs.nome+'</a>\
                                                  </li>');
                      });       
                }   
                }                                  
        });  
    });
    ////fim enviar docs
    ///delete doc
     $(document).on('click','.btn_excluir_doc',function(e){ 
            e.preventDefault();           
            var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            var id = $(this).data("id");            
                      
                $.ajax({
                    url: '/ceteaadmin/atendimento/delete-docs/'+id,
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        'id': id,
                        '_method': 'DELETE',                    
                        '_token':CSRF_TOKEN,
                    },
                    success:function(response){
                        if(response.status==200){                        
                            $('#doc'+id).remove();
                        }
                    }
                });            
      
      
        }); 
    ///fim delete doc
    ////Abrir doc
    $(document).on('click','.btn_abrir_doc',function(e){
        e.preventDefault();            
            var id = $(this).data("id"); 

               $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
            $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/ceteaadmin/atendimento/abrir-doc/'+id,                                
                success: function(response){ 
                    if(response.status==200){
                      var link = "{{asset('')}}"+"storage/"+response.arquivo.path;
                      //visualizar o pdf no browser                
                          window.open(link);                    
                    }
                }
            });

    });
    ///fim abrir doc   

    $(document).on('click','.cria_atendimento',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var id = $(this).data("id");
        var color = $(this).data("color");

        var linklogo = "{{asset('storage')}}";

            var nome = $(this).data("nome");
            
            Swal.fire({
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                title:'Paciente: '+nome,
                text: "Deseja CRIAR ATENDIMENTO para este paciente?",
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
                    url: '/ceteaadmin/atendimento/cria-atendimento/'+id,
                    type: 'POST',
                    dataType: 'json',
                    data:{
                        'id': id,                                         
                        '_token':CSRF_TOKEN,
                        '_method':'put',
                    },
                    success:function(response){
                        if(response.status==200){
                            location.replace('/ceteaadmin/atendimento/index/'+color);
                        }
                    }
                }); 
            }  
        });    
    });

    ///tooltip
    $(function(){             
        $(".AddAtendimentoModal_btn").tooltip();
        $(".pesquisa_btn").tooltip();        
        $(".delete_atendimento_btn").tooltip();
        $(".edit_atendimento").tooltip();
        $(".cria_atendimento").tooltip();
    });
    ///fim tooltip



});

</script>

@stop