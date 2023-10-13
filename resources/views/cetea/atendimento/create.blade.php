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
                                <label for="idpaciente">Paciente</label>
                                 <select name="idpaciente" id="idpaciente" class="idpaciente custom-select" style="height: 75%">
                                    @foreach ($pacientes as $paciente)
                                    <option value="{{$paciente->id}}">{{$paciente->nome}}</option>
                                    @endforeach                                   
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="idmedicoterapeuta">Médico Terapeuta</label>
                                <select name="idmedicoterapeuta" id="idmedicoterapeuta" class="idmedicoterapeuta custom-select" style="height: 75%">
                                    @foreach ($medicosterapeutas as $terapeuta)
                                    <option value="{{$terapeuta->id}}">{{$terapeuta->nome}}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="idtratamento">Tratamentos/Terapias</label>
                                <select name="idtratamento" id="idtratamento" class="idtratamento custom-select" style="height: 75%">
                                    @foreach ($tratamentos as $tratamento)
                                    <option value="{{$tratamento->id}}">{{$tratamento->nome}}</option>
                                    @endforeach                                    
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">                           
                                <label for="encaminhamento">Encaminhamento</label>
                                <input type="text" class="form-control" name="encaminhamento" id="encaminhamento">                            
                            </div>
                        </div>                                                                         
                    </div>
                </fieldset>                               
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-footer">
                            <button type="button" class="cancelar_btn btn btn-default">Cancelar</button>
                            <button class="salvar_btn btn btn-primary" type="button"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
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
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    
@stop

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

    $(".idpaciente").select2({heigth: "resolve", theme: "classic"});
    $(".idtipoatendimento").select2({heigth: "resolve", theme: "classic"});
    $(".idmedicoterapeuta").select2({heigth: "resolve", theme: "classic"});
    $(".idtratamento").select2({heigth: "resolve", theme: "classic"});

    $(document).on('click','.salvar_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   
        var loading = $('#imgadd');
            loading.show();

        var data = new FormData();        
            
            data.append('paciente',$('#idpaciente').val());            
            data.append('tipo_atendimento','1');
            data.append('terapeuta',$('#idmedicoterapeuta').val());
            data.append('tratamento',$('#idtratamento').val());            
            data.append('responsavel',$('#responsavel').val());
            data.append('parentesco',$('#parentesco').val());
            data.append('encaminhamento',$('#encaminhamento').val());                 
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
                     location.replace('/ceteaadmin/atendimento/index');
                }  
            }  
        });

    });  

    //cancelar o registro
    
    $(document).on('click','.cancelar_btn',function(e){
        e.preventDefault();
        location.replace('/ceteaadmin/atendimento/index');
    });



});

</script>

@stop