@extends('layouts.page')
@section('content')

<style>
.indisponivel .ui-state-default{
			background: red !important;
			border-color: red !important;
			color: white !important;
		}
.disponivel .ui-state-default{
			background: green !important;
			border-color: green !important;
			color: white !important;
		}
.feriado .ui-state-default{
			background: blue !important;
			border-color: blue !important;
			color: white !important;
		}

.ui-datepicker-trigger { 
            max-height: 28px;
        }    

</style>


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
                                <input type="text" maxLength="10" name="adddata" id="adddata" class="addata form-control" data-format="00/00/0000"  placeholder="dd/mm/yyyy" value="{{date('d/m/Y', strtotime($atendimento->data_agonline))}}"/>
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

@section('scripts')

<script type="text/javascript">

$(document).ready(function(){

    //convertendo o datepicker para o português
    $(function(){    
    var linklogo = "{{asset('storage')}}";    
    $.datepicker.regional['pt-BR'] = {
               autoclose: true,
               buttonImageOnly: true,
               showAnim: 'slideDown',
               duration: 'fast',
               buttonText: "Calendário",
               showOn: "button",
               changeMonth: true,
               changeYear: true,
               buttonImage: linklogo+"/icons8-calendar-48.png",
               clearBtn: true,
               highlightWeek: true,
               mandatory: true,
                closeText: 'Fechar',
                prevText: '&#x3c;Anterior',
                nextText: 'Pr&oacute;ximo&#x3e;',
                currentText: 'Hoje',
                monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
                'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                'Jul','Ago','Set','Out','Nov','Dez'],
                dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 0,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''        
        };
        $.datepicker.setDefaults($.datepicker.regional['pt-BR']);  
    });    

    //fim convertendo o datepicker para o português
    
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
            url: '/pagina/minhaagenda/update/'+id,
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
                }else if(response.status==401){
                      $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');
                      $('#saveform_errList').addClass('alert alert-danger');
                      $('#saveform_errList').text(response.message);
                      loading.hide();
                }else{
                    $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');  
                    loading.hide();
                    location.replace('/pagina/minhaagenda/index');
                }  
            }  
        });

    });  


    //cancelar o registro
    
    $(document).on('click','.cancelar_btn',function(e){
        e.preventDefault();        
        location.replace('/pagina/minhaagenda/index');
    });


    ///master-detail entre o select medico e o select tratamentos    
    $(document).on('change','#idmedicoterapeuta',function(){   

        var medicoid = $('#idmedicoterapeuta').val();        

        $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }                    
                });

         $.ajax({ 
                type: 'GET',             
                dataType: 'json',                                    
                url: '/pagina/minhaagenda/medicoxtratamento/'+medicoid,
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


    //colorindo o input date

     $(document).on('click','#adddata',function(e){
        e.preventDefault;        

        var dateArray = new Array();        
        var feriados = new Array();        

        $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }                    
                });

        $.ajax({
            type: 'get',
            dataType: 'json',
            url : '/pagina/minhaagenda/diascolorir',
            async: false,
            cache: false,
            data: {},
            success: function(response){                            
                $.each(response.datas,function(key,value){
                    dateArray.push(value.data);                    
                });                

                $('#adddata').datepicker({
                    beforeShowDay: function(date) {
                        var day = date.getDay();
                        var formataData = jQuery.datepicker.formatDate("yy-mm-dd",date);

                        var ano = date.getFullYear();
                        $.each(response.feriados,function(key,value){
                            feriados.push(ano+'-'+value.mes.toString().padStart(2,0)+'-'+value.dia.toString().padStart(2,0));  //formata para dois dígitos dia e mes
                        });                
                        
                        if (day==0|day==6) { //sábados e domingos
                            return [true,"indisponivel","indisponível"];
                        }else if(feriados.find((el)=>el == formataData)){ //feriados                        
                            return [true,"feriado","feriado"];
                        }else{ //critica se na data tem vaga disponível ou não para o agendamento on-line
                             return [true,(dateArray.indexOf(formataData)==-1)?"":(response.datas.findIndex((x)=>x.data == dateArray.indexOf(formataData))?(response.datas.find(el=>el.data == formataData).n_atendimentos == response.tipo_atendimento.vagas_limite)?"indisponivel":"disponivel":"indisponivel")];                             
                        }

                    }                
                });
            }
        });
    }); 
    
 
    //fim colorindo o input date


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