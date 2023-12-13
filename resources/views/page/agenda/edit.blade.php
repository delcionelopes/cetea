@extends('layouts.page')
@section('content')

<!-- Cabeçalho-->
<header class="masthead" style="background-image: url('/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>CETEA</h1>
                            <span class="subheading">Minha Agenda</span>
                        </div>
                    </div>
                </div>
            </div>
</header>

<form role="form" method="POST">
    @csrf
    @method('PUT')
    <ul id="saveform_errList"></ul> 
    <div class="container-fluid py-5">
        <div class="card">
            <div class="card-body">              
                  <fieldset>
                    <legend>Dados do Agendamento</legend>                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" style="color: green">Nome do Paciente?</label><br>
                                <label for="" id="nomepaciente">{{$paciente->nome}}</label><br>
                                <input type="hidden" id="idpaciente" value="{{$paciente->id}}">                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="" style="color: green">Tipo de atendimento?</label><br>
                                <label for="">Agendamento On-line</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="adddata" style="color: green">Para quando?</label>
                                <input type="date" name="adddata" id="adddata" class="addata form-control" required pattern="\d{4}-\d{2}-\d{2}" autocomplete="on" value="{{date('Y-m-d', strtotime($atendimento->data_atendimento))}}"/>
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="idmedicoterapeuta" style="color: green">Para qual terapeuta?</label><br>
                                <select name="idmedicoterapeuta" id="idmedicoterapeuta" class="idmedicoterapeuta custom-select">
                                    @foreach ($medicosterapeutas as $terapeuta)
                                    <option value="{{$terapeuta->id}}" {{old('medico_terapeuta_id',$atendimento->medico_terapeuta_id ?? '') === $terapeuta->id ? 'selected' : ''}}>{{$terapeuta->nome}}</option>
                                    @endforeach                                    
                                </select>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="idtratamento" style="color: green">Qual é a terapia/tratamento?</label><br>
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
                                <label for="responsavel">Quem é o(a) responsável do(a) paciente?</label>
                                <input type="text" class="form-control" name="responsavel" id="responsavel" value="{{$atendimento->responsavel_do_paciente}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parentesco">Qual é o grau de parentesco do(a) responsável?</label>
                                <input type="text" class="form-control" name="parentesco" id="parentesco" value="{{$atendimento->responsavel_parentesco}}">
                            </div>
                        </div>
                    </div>                    
                </fieldset>                               
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-footer">
                            <button type="button" class="cancelar_btn btn btn-default">Cancelar</button>
                            <button data-id="{{$atendimento->id}}" class="salvar_btn btn btn-success" type="button"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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
<!-- fim Rodapé-->

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
        var id = $(this).data("id");
        var loading = $('#imgadd');
            loading.show();

        var data = new FormData();        
            
            data.append('paciente',$('#idpaciente').val());                        
            data.append('terapeuta',$('#idmedicoterapeuta').val());
            data.append('data',formatDate($('#adddata').val()))
            data.append('tratamento',$('#idtratamento').val());            
            data.append('responsavel',$('#responsavel').val());
            data.append('parentesco',$('#parentesco').val());            
            data.append('_token',CSRF_TOKEN);
            data.append('_method','PUT');              

        $.ajax({
            url: '/page/minhaagenda/update/'+id,
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
                    location.replace('/page/minhaagenda');
                }  
            }  
        });

    });  


    //cancelar o registro
    
    $(document).on('click','.cancelar_btn',function(e){
        e.preventDefault();        
        location.replace('/page/minhaagenda');
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
                url: '/page/minhaagenda/medicoxtratamento/'+medicoid,
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