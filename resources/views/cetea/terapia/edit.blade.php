@extends('adminlte::page')

@section('title', 'Edição de Terapia')

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
                            <h2 class="subheading">Anamnese & Terapia</h2>                            
                        </div>   
                </div>                                                            
                 <div class="ml-1 w-100">
                        <div class="container-fluid btn-group bg-light d-flex rounded text-white stats">
                            <div class="row">
                            <div class="col-md-2">
                               <div class="btn-group"> 
                                    <button type="button" class="btn btn-none dropdown-toggle bg-light" data-toggle="dropdown" aria-expanded="false">Anamnese</button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_anamnese_inicial)<i id="anamnese_inicial{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="anamnese_inicial{{$atendimento->id}}"></i>@endif Inicial</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_anamnese_hist_pregressa)<i id="anamnese_hist_pregressa{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="anamnese_hist_pregressa{{$atendimento->id}}"></i>@endif História pregressa</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_anamnese_desenvolvimento)<i id="anamnese_desenvolvimento{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="anamnese_desenvolvimento{{$atendimento->id}}"></i>@endif Desenvolvimento</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-none dropdown-toggle bg-light" data-toggle="dropdown" aria-expanded="false">História do desenvolvimento</button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_inicial)<i id="histdes_versaopais_inicial{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_versaopais_inicial{{$atendimento->id}}"></i>@endif Inicial</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_linguagem)<i id="histdes_versaopais_linguagem{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_versaopais_linguagem{{$atendimento->id}}"></i>@endif Linguagem</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_desenvsocial)<i id="histdes_versaopais_desenvsocial{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_versaopais_desenvsocial{{$atendimento->id}}"></i>@endif Desenvolvimento Social</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_brincadeiras)<i id="histdes_versaopais_brincadeiras{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_versaopais_brincadeiras{{$atendimento->id}}"></i>@endif Brincadeiras</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_comportamentos)<i id="histdes_versaopais_comportamentos{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_versaopais_comportamentos{{$atendimento->id}}"></i>@endif Comportamentos</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_independencia)<i id="histdes_versaopais_independencia{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_versaopais_independencia{{$atendimento->id}}"></i>@endif Independência</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_desenvmotor)<i id="histdes_versaopais_desenvmotor{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_versaopais_desenvmotor{{$atendimento->id}}"></i>@endif Desenvolvimento Motor</a></li>    
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_histescolar)<i id="histdes_versaopais_histescolar{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_versaopais_histescolar{{$atendimento->id}}"></i>@endif Histórico Escolar</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_compcasa)<i id="histdes_versaopais_compcasa{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_versaopais_compcasa{{$atendimento->id}}"></i>@endif Comportamento em Casa</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_anexo1_rotalim)<i id="histdes_anexo1_rotalim{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_anexo1_rotalim{{$atendimento->id}}"></i>@endif Rotina Alimentar</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_anexo2_histmedico)<i id="histdes_anexo2_histmedico{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_anexo2_histmedico{{$atendimento->id}}"></i>@endif Histórico Médico</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_anexo3_infosensoriais)<i id="histdes_anexo3_infosensoriais{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="histdes_anexo3_infosensoriais{{$atendimento->id}}"></i>@endif Informações Sensoriais</a></li>                                        
                                    </ul>                                
                                </div>            
                            </div>
                            <div class="col-md-2">                     
                                <div class="btn-group">
                                    <button type="button" class="btn btn-none dropdown-toggle bg-light" data-toggle="dropdown" aria-expanded="false">Evolução</button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_evolucao)<i id="evolucao{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i id="evolucao{{$atendimento->id}}"></i>@endif Registro</a></li>
                                    </ul>
                                </div>            
                            </div>
                            <div class="col-md-1">                    
                                <div class="btn-group">
                                    <button type="button" class="btn btn-none dropdown-toggle bg-light" data-toggle="dropdown" aria-expanded="false">MChat</button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">Registro</a></li>
                                    </ul>
                                </div>            
                            </div>
                            <div class="col-md-2">                                                    
                                <div class="btn-group"> 
                                    <button type="button" class="btn btn-none dropdown-toggle bg-light" data-toggle="dropdown" aria-expanded="false">Questionários</button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">Questionário 1</a></li>
                                    </ul>
                                </div>      
                            </div>
                             </div>                 
                        </div>
                    </div>
                </div>   
               
                  <fieldset>
                    <legend>Dados do Atendimento</legend>                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Paciente</label><br>
                                <label for="">{{$atendimento->paciente}}</label>
                                <input type="hidden" id="idpaciente" value="{{$atendimento->paciente_id}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="idtipoatendimento">Tipo de atendimento</label>
                                <select name="idtipoatendimento" id="idtipoatendimento" class="idtipoatendimento custom-select">
                                    @foreach ($tiposatendimentos as $tipo)
                                    <option value="{{$tipo->id}}" {{old('tipo_atendimento_id',$atendimento->tipo_atendimento_id ?? '') === $tipo->id ? 'selected' : ''}}>{{$tipo->nome}}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="adddata">Data</label>
                                <input type="date" name="adddata" id="adddata" class="addata form-control" required pattern="\d{4}-\d{2}-\d{2}" autocomplete="on" value="{{date('Y-m-d', strtotime($atendimento->data_atendimento))}}"/>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="idmedicoterapeuta">Médico Terapeuta</label>
                                <select name="idmedicoterapeuta" id="idmedicoterapeuta" class="idmedicoterapeuta custom-select">
                                    @foreach ($medicosterapeutas as $terapeuta)
                                    <option value="{{$terapeuta->id}}" {{old('medico_terapeuta_id',$atendimento->medico_terapeuta_id ?? '') === $terapeuta->id ? 'selected' : ''}}>{{$terapeuta->nome}}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="idtratamento">Tratamentos/Terapias</label>
                                <select name="idtratamento" id="idtratamento" class="idtratamento custom-select">
                                    @foreach ($tratamentos as $tratamento)
                                    <option value="{{$tratamento->id}}" {{old('tratamento_id',$atendimento->tratamento_id ?? '') === $tratamento->id ? 'selected' : ''}}>{{$tratamento->nome}}</option>
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
                                <input type="text" class="form-control" name="responsavel" id="responsavel" value="{{$atendimento->responsavel_do_paciente}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parentesco">Parentesco do responsável</label>
                                <input type="text" class="form-control" name="parentesco" id="parentesco" value="{{$atendimento->responsavel_parentesco}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Encaminhamento</label><br>
                                <label for="">{{$atendimento->encaminhamento}}</label>
                            </div>
                        </div>
                    </div>
                </fieldset>                               
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-footer">
                            <button type="button" data-color="{{$color}}" class="cancelar_btn btn btn-default">Cancelar</button>
                            <button data-color="{{$color}}" data-id="{{$atendimento->id}}" class="salvar_btn btn btn-{{$color}}" type="button"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
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
    
    $(document).on('click','.salvar_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');   
        var color = $(this).data("color");
        var id = $(this).data("id");
        var loading = $('#imgadd');
            loading.show();

        var data = new FormData();        
            
            data.append('paciente',$('#idpaciente').val());            
            data.append('tipo_atendimento',$('#idtipoatendimento').val());
            data.append('terapeuta',$('#idmedicoterapeuta').val());
            data.append('data',formatDate($('#adddata').val()))
            data.append('tratamento',$('#idtratamento').val());            
            data.append('responsavel',$('#responsavel').val());
            data.append('parentesco',$('#parentesco').val());            
            data.append('_token',CSRF_TOKEN);
            data.append('_method','PUT');              

        $.ajax({
            url: '/ceteaadmin/terapia/update/'+id,
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
                    location.replace('/ceteaadmin/terapia/index/'+color);
                }  
            }  
        });

    });  


    //cancelar o registro
    
    $(document).on('click','.cancelar_btn',function(e){
        e.preventDefault();
        var color = $(this).data("color");
        location.replace('/ceteaadmin/terapia/index/'+color);
    });


    $(document).on('change','#idmedicoterapeuta',function(){   ///master-detail entre o select medico e o select tratamentos    

        var medicoid = $('#idmedicoterapeuta').val();        

        $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }                    
                });

         $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/ceteaadmin/terapia/medicoxtratamento/'+medicoid,
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


    //formatação str para date
        function formatDate(data, formato) {
        if (formato == 'pt-BR') {
            return (data.substr(0, 10).split('-').reverse().join('/'));
        } else {
            return (data.substr(0, 10).split('/').reverse().join('-'));
        }
        } 
    //fim formatDate


});

</script>

@stop