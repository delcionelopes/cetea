@extends('adminlte::page')

@section('title', 'Edição do cadastro de Módulos')

@section('content')
<form role="form" enctype="multipart/form-data" method="POST">
    @csrf    
    @method('PUT')
    <ul id="saveform_errList"></ul> 
    <input type="hidden" id="editmodulo_id" value="{{$modulo->id}}">
        <div class="card">
            <div class="card-body">
              <div class="card p-3" style="background-image: url('/assets/img/banner-docs.webp')">
                <div class="d-flex align-items-center">
                    <!--arquivo de imagem-->
                    <div class="form-group mb-3">                                                
                       <div class="image">
                        @if($modulo->ico)
                            <img src="{{asset('storage/'.$modulo->ico)}}" class="imgico rounded-circle" width="100" >
                        @else
                            <img src="{{asset('storage/user.png')}}" class="imgico rounded-circle" width="100" >
                        @endif
                        </div>
                       <label for="upimagem">Ícone</label>                        
                       <span class="btn btn-none fileinput-button"><i class="fas fa-plus"></i>
                          <input id="upimagem" type="file" name="imagem" class="btn btn-primary" accept="image/x-png,image/gif,image/jpeg">
                       </span>                       
                     </div>  
                     <!--arquivo de imagem--> 
                  </div>
              </div>
                <fieldset>
                    <legend>Dados do Módulo</legend>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" required class="form-control" name="nome" id="nome" placeholder="Nome do módulo" value="{{$modulo->nome}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                              <div class="form-group">
                                <label for="descricao">Descricao</label>
                                <input type="text" required class="form-control" name="descricao" id="descricao" placeholder="Descrição do módulo" value="{{$modulo->descricao}}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="color" class="form-label">Color</label>
                                <input type="color" required class="form-control form-control-color" name="color" id="color" value="{{$modulo->color}}" title="Escolha a cor">
                            </div>
                        </div>                                                  
                    </div>                    
                   
                </fieldset>
                
                <div class="card">
                     <div class="card-body"> 
                            <fieldset>
                                <legend>Operações do Módulo</legend>                                
                                <div class="form-check">                                                                        
                                    @foreach ($operacoes as $operacao)               
                                    @if ($modulo->operacoes->count())                                                                     
                                        @foreach ($modulo->operacoes as $ope)                                        
                                        @if (($operacao->id)==($ope->id))
                                            <label class="form-check-label" for="check{{$operacao->id}}">
                                                <input type="checkbox" id="check{{$operacao->id}}" name="operacoes[]" value="{{$operacao->id}}" class="form-check-input" checked> {{$operacao->nome}}
                                            </label><br>                                       
                                        @break
                                        @elseif ($loop->last)
                                         <label class="form-check-label" for="check{{$operacao->id}}">
                                                <input type="checkbox" id="check{{$operacao->id}}" name="operacoes[]" value="{{$operacao->id}}" class="form-check-input"> {{$operacao->nome}}
                                            </label><br>   
                                        @endif                                        
                                        @endforeach                   
                                    @else
                                            <label class="form-check-label" for="check{{$operacao->id}}">
                                                <input type="checkbox" id="check{{$operacao->id}}" name="operacoes[]" value="{{$operacao->id}}" class="form-check-input"> {{$operacao->nome}}
                                            </label><br>   
                                    @endif
                                    @endforeach
                                </div>
                            </fieldset>   
                     </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-footer">
                            <button type="button" class="cancelar_btn btn btn-default">Cancelar</button>
                            <button type="button" class="salvar_btn btn btn-primary"><img id="imgedit" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
@stop

@section('css')
    
@stop

@section('js')

<script type="text/javascript">

$(document).ready(function(){

    $(document).on('click','.salvar_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");       
        var id = $('#editmodulo_id').val();

        var loading = $('#imgedit');
            loading.show();

         //Array apenas com os checkboxes marcados
            var operacoes = new Array;
                $("input[name='operacoes[]']:checked").each(function(){
                    operacoes.push($(this).val());
                });
                          
       
           var data = new FormData();        
            
            data.append('nome',$('#nome').val());
            data.append('descricao',$('#descricao').val());
            data.append('color',$('#color').val());            
            data.append('imagem',$('#upimagem')[0].files[0]);            
            data.append('operacoes',JSON.stringify(operacoes)); //array
            data.append('_enctype','multipart/form-data');
            data.append('_token',CSRF_TOKEN);
            data.append('_method','PUT');   
      
        $.ajax({
            url: '/ceteaadmin/modulo/update-modulo/'+id,
            type: 'POST',           
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,            
            contentType:false,            
            async:true,       
            success: function(response){
                if(response.status==400){
                      $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');
                        $('#saveform_errList').addClass('alert alert-danger');
                        $.each(response.errors,function(key,err_values){
                            $('#saveform_errList').append('<li>'+err_values+'</li>');
                        });
                } else{
                    $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');  
                    loading.hide();
                    location.replace('/ceteaadmin/modulo/index-modulo');
                }  
            }  
        });

    });

    //upload da imagem temporária
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
                url:'/ceteaadmin/modulo/moduloimagemtemp-upload',
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
                        var imagemnova = '<img src="'+linkimagem+'" class="imgico rounded-circle" width="100" >';
                        $(".imgico").replaceWith(imagemnova);
                    }   
                }                                  
            });
        }
        });   
    //fim upload da imagem temporária
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
                url:'/ceteaadmin/modulo/delete-imgmodulo',                
                dataType: 'json',            
                data: data,
                cache: false,
                processData: false,
                contentType: false,                                                                                     
                success: function(response){                              
                    if(response.status==200){
                    $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');                         
                    location.replace('/ceteaadmin/modulo/index-modulo');
                } 
                }                                  
            });

        }else{
            location.replace('/ceteaadmin/modulo/index-modulo');
        }

    });
    //fim excluir imagem temporária pelo cancelamento
});

</script>

@stop