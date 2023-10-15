@extends('adminlte::page')

@section('title', 'Atendimento')

@section('content')

<form role="form" method="POST">
    @csrf
    @method('PUT')
    <ul id="saveform_errList"></ul> 
    <div class="container-fluid py-5">
        <div class="card">
            <div class="card-body">
              <div class="card p-3" style="background-image: url('/assets/img/banner-docs.webp')">
                <div class="d-flex align-items-center">
                        <div class="form-group mb-3">
                            <h1>CETEA</h1>
                            <h2 class="subheading">Atendimento</h2>                            
                        </div>                
                </div>
                </div>
              
                  <fieldset>
                    <legend>Dados do Atendimento</legend>                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idpaciente">Paciente</label><br>
                                <div class="select2-wrapper">                              
                                 <select placeholder="Selecione o paciente" name="idpaciente" id="idpaciente" class="idpaciente form-control" style="width: 100%;">
                                    @foreach ($pacientes as $paciente)
                                    <option value="{{$paciente->id}}">{{$paciente->nome}}</option>
                                    @endforeach                                   
                                </select>                                
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="idmedicoterapeuta">Médico Terapeuta</label>
                                <select name="idmedicoterapeuta" id="idmedicoterapeuta" class="idmedicoterapeuta custom-select">
                                    @foreach ($medicosterapeutas as $terapeuta)
                                    <option value="{{$terapeuta->id}}">{{$terapeuta->nome}}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="idtratamento">Tratamentos/Terapias</label>
                                <select name="idtratamento" id="idtratamento" class="idtratamento custom-select">                                    
                                    <option value=""></option>                                                                  
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Outras informações</legend>
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="responsavel">Responsável do paciente</label>
                                <input type="text" class="form-control" name="responsavel" id="responsavel">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parentesco">Parentesco do responsável</label>
                                <input type="text" class="form-control" name="parentesco" id="parentesco">
                            </div>
                        </div>
                    </div>                    
                </fieldset>                               
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-footer">
                            <button type="button" data-color="{{$color}}" class="cancelar_btn btn btn-default">Cancelar</button>
                            <button data-color="{{$color}}" class="salvar_btn btn btn-{{$color}}" type="button"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop

@section('css')

<link href="{{asset('css/styles.css')}}" rel="stylesheet" />

    
@stop

@section('js')

<script type="text/javascript">

$(document).ready(function(){

    $("#idpaciente").val('');
    $(".idpaciente").select2({        
        theme:"boostrap",        
        width:"resolve",
        alowClear:"true",
        maximumSelectionSize: 6,
        placeholder:"Selecione um paciente...",
        containerCssClass: ':all:'
    });    
    var select2 = $("#idpaciente").select2();
        select2.data('select2').$selection.css('height', '38px');

    $(document).on('click','.salvar_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   
        var color = $(this).data("color");
        var loading = $('#imgadd');
            loading.show();

        var data = new FormData();        
            
            data.append('paciente',$('#idpaciente').val());            
            data.append('tipo_atendimento','1');
            data.append('terapeuta',$('#idmedicoterapeuta').val());
            data.append('tratamento',$('#idtratamento').val());            
            data.append('responsavel',$('#responsavel').val());
            data.append('parentesco',$('#parentesco').val());            
            data.append('_token',CSRF_TOKEN);
            data.append('_method','PUT');              

        $.ajax({
            url: '/ceteaadmin/atendimento/store',
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
                } else{
                    $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');  
                    loading.hide();
                    location.replace('/ceteaadmin/atendimento/index/'+color);
                }  
            }  
        });

    });  


    //cancelar o registro
    
    $(document).on('click','.cancelar_btn',function(e){
        e.preventDefault();
        var color = $(this).data("color");
        location.replace('/ceteaadmin/atendimento/index/'+color);
    });


    $(document).on('change','#idmedicoterapeuta',function(){   ///master-detail entre o select medico e o select tratamentos

        var medicoid = $(this).val();

        $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }                    
                });

         $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/ceteaadmin/atendimento/medicoxtratamento/'+medicoid,
                success: function(response){           
                    if(response.status==200){                       
                        $('#idtratamento').html('');
                        $.each(response.tratamentos,function(key,tratamentos){
                            $('#idtratamento').append('<option value="'+tratamentos.id+'">'+tratamentos.nome+'</option>');
                        });
                    }
                },

            });
       
    });


});

</script>

@stop