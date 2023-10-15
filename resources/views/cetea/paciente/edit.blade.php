@extends('adminlte::page')

@section('title', 'Cadastro de Pacientes')

@section('content')

<form role="form" method="POST">
    @csrf
    @method('PUT')
    <ul id="saveform_errList"></ul> 
    <input type="hidden" id="edit_paciente_id" value="{{$paciente->id}}">
    <div class="container-fluid py-5">
        <div class="card">
            <div class="card-body">
              <div class="card p-3" style="background-image: url('/assets/img/banner-docs.webp')">
                <div class="d-flex align-items-center">
                        <div class="form-group mb-3">
                            <h1>PACIENTE</h1>
                            <h2 class="subheading">Ficha Básica</h2>                            
                        </div>                
                </div>
                </div>
              
                  <fieldset>
                    <legend>Dados de Identificação</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" required class="form-control" name="nome" id="nome" placeholder="Nome do paciente" value="{{$paciente->nome}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                              <div class="form-group">
                                <label for="datanasc">Data de nascimento</label>
                                <input type="text" required class="form-control" name="datanasc" id="datanasc" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true" value="{{date('d/m/Y', strtotime($paciente->data_nascimento))}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" required class="form-control" name="cpf" id="cpf" placeholder="000.000.000-00" data-mask="000.000.000-00" data-mask-reverse="true" value="{{$paciente->cpf}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cartao_sus">Cartão do SUS</label>
                                <input type="text" class="form-control" name="cartao_sus" id="cartao_sus" value="{{$paciente->cartao_sus}}">
                            </div>
                        </div>   
                    </div>
                    <div class="row">
                         <div class="col-md-5">
                            <div class="form-group">
                                <label for="pai">Pai</label>
                                <input type="text" class="form-control" name="pai" id="pai" value="{{$paciente->pai}}">
                            </div>
                        </div>               
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="escolaridade_pai">Escolaridade do Pai</label>
                                <input type="text" class="form-control" name="escolaridade_pai" id="escolaridade_pai" value="{{$paciente->escolaridade_pai}}">
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ocupacao_pai">Ocupação do Pai</label>
                                <input type="text" class="form-control" name="ocupacao_pai" id="ocupacao_pai" value="{{$paciente->ocupacao_pai}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="datanasc_pai">DataNasc do Pai</label>
                                <input type="text" class="form-control" name="datanasc_pai" id="datanasc_pai" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true" value="{{date('d/m/Y',strtotime($paciente->datanasc_pai))}}">
                            </div>
                        </div>                          
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="mae">Mãe</label>
                                <input type="text" class="form-control" name="mae" id="mae" value="{{$paciente->mae}}">
                            </div>
                        </div>               
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="escolaridade_mae">Escolaridade da Mãe</label>
                                <input type="text" class="form-control" name="escolaridade_mae" id="escolaridade_mae" value="{{$paciente->escolaridade_mae}}">
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ocupacao_mae">Ocupação da Mãe</label>
                                <input type="text" class="form-control" name="ocupacao_mae" id="ocupacao_mae" value="{{$paciente->ocupacao_mae}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="datanasc_mae">DataNasc da Mãe</label>
                                <input type="text" class="form-control" name="datanasc_mae" id="datanasc_mae" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true" value="{{date('d/m/Y',strtotime($paciente->datanasc_mae))}}">
                            </div>
                        </div>  
                    </div>                    
                </fieldset>

                <fieldset>
                    <legend>Dados Biológicos</legend>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="sexo custom-select">
                                    <option value="MASCULINO" {{old('sexo',$paciente->sexo ?? '') === 'MASCULINO' ? 'selected' : ''}}>MASCULINO</option>
                                    <option value="FEMININO" {{old('sexo',$paciente->sexo ?? '') === 'FEMININO' ? 'selected' : ''}}>FEMININO</option>                                    
                            </select>
                            </div>
                        </div>                          
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Dados Médicos</legend>
                    <div class="row">
                    <div class="col-md-3">
                            <div class="form-group">
                                <label for="data_avaliacao">Data Avaliação</label>
                                <input type="text" class="form-control" name="data_avaliacao" id="data_avaliacao" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true" value="{{date('d/m/Y',strtotime($paciente->data_avaliacao))}}">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="informante">Informante</label>
                                <input type="text" class="form-control" name="informante" id="informante" value="{{$paciente->informante}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">                           
                                <label for="medicacao_atual">Medicação atual</label>
                                <input type="text" class="form-control" name="medicacao_atual" id="medicacao_atual" value="{{$paciente->medicacao_atual}}">
                            </div>
                        </div>                          
                        <div class="col-md-4">
                            <div class="form-group">                           
                                <label for="medico_responsavel">Médico responsável</label>
                                <input type="text" class="form-control" name="medico_responsavel" id="medico_responsavel" value="{{$paciente->medico_responsavel}}">
                            </div>
                        </div>                          
                        <div class="col-md-4">
                            <div class="form-group">                           
                                <label for="encaminhamentos">Encaminhamentos</label>
                                <input type="text" class="form-control" name="encaminhamentos" id="encaminhamentos" value="{{$paciente->encaminhamentos}}">
                            </div>
                        </div>                          
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Dados de Localização e Contato</legend>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="endereco">Endereco</label>
                                <input type="text" class="endereco form-control" name="endereco" id="endereco" placeholder="Endereço..., nº" value="{{$paciente->endereco}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero">Número</label>
                                <input type="text" class="numero form-control" name="numero" id="numero" placeholder="nº, apt" value="{{$paciente->numero}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="bairro form-control" name="bairro" id="bairro" value="{{$paciente->bairro}}">
                            </div>
                        </div>                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="cidade form-control" name="cidade" id="cidade" value="{{$paciente->cidade}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                         <div class="form-group">                        
                            <label id="addpesquisacep" for="add_cep" style="color: blue;">CEP 
                            <img id="addimgpesquisacep" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"><img id="addimgcorreios" src="{{asset('storage/c1.png')}}" class="rounded-circle" width="20">
                            <small id="addpesquisacepresposta"></small>              
                            </label>          
                            <input type="text" id="add_cep" class="cep form-control" placeholder="00000000" data-mask="00000000" data-mask-reverse="true" value="{{$paciente->cep}}">
                        </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Estado(UF)</label>
                                <select name="estado" id="estado" class="estado custom-select">                            
                                        <option value="AC" {{old('estado',$paciente->estado ?? '') === 'AC' ? 'selected' : ''}}>AC - Acre</option>
                                        <option value="AL" {{old('estado',$paciente->estado ?? '') === 'AL' ? 'selected' : ''}}>AL - Alagoas</option>
                                        <option value="AM" {{old('estado',$paciente->estado ?? '') === 'AM' ? 'selected' : ''}}>AM - Amazonas</option>
                                        <option value="AP" {{old('estado',$paciente->estado ?? '') === 'AP' ? 'selected' : ''}}>AP - Amapá</option>
                                        <option value="BA" {{old('estado',$paciente->estado ?? '') === 'BA' ? 'selected' : ''}}>BA - Bahia</option>
                                        <option value="CE" {{old('estado',$paciente->estado ?? '') === 'CE' ? 'selected' : ''}}>CE - Ceará</option>
                                        <option value="DF" {{old('estado',$paciente->estado ?? '') === 'DF' ? 'selected' : ''}}>DF - Distrito Federal</option>
                                        <option value="ES" {{old('estado',$paciente->estado ?? '') === 'ES' ? 'selected' : ''}}>ES - Espírito Santo</option>
                                        <option value="GO" {{old('estado',$paciente->estado ?? '') === 'GO' ? 'selected' : ''}}>GO - Goiás</option>
                                        <option value="MA" {{old('estado',$paciente->estado ?? '') === 'MA' ? 'selected' : ''}}>MA - Maranhão</option>
                                        <option value="MG" {{old('estado',$paciente->estado ?? '') === 'MG' ? 'selected' : ''}}>MG - Minas Gerais</option>
                                        <option value="MS" {{old('estado',$paciente->estado ?? '') === 'MS' ? 'selected' : ''}}>MS - Mato Grosso do Sul</option>
                                        <option value="MT" {{old('estado',$paciente->estado ?? '') === 'MT' ? 'selected' : ''}}>MT - Mato Grosso</option>
                                        <option value="PA" {{old('estado',$paciente->estado ?? '') === 'PA' ? 'selected' : ''}}>PA - Pará</option>
                                        <option value="PB" {{old('estado',$paciente->estado ?? '') === 'PB' ? 'selected' : ''}}>PB - Paraíba</option>
                                        <option value="PE" {{old('estado',$paciente->estado ?? '') === 'PE' ? 'selected' : ''}}>PE - Pernambuco</option>
                                        <option value="PI" {{old('estado',$paciente->estado ?? '') === 'PI' ? 'selected' : ''}}>PI - Piauí</option>
                                        <option value="PR" {{old('estado',$paciente->estado ?? '') === 'PR' ? 'selected' : ''}}>PR - Paraná</option>
                                        <option value="RJ" {{old('estado',$paciente->estado ?? '') === 'RJ' ? 'selected' : ''}}>RJ - Rio de Janeiro</option>
                                        <option value="RN" {{old('estado',$paciente->estado ?? '') === 'RN' ? 'selected' : ''}}>RN - Rio Grande do Norte</option>
                                        <option value="RO" {{old('estado',$paciente->estado ?? '') === 'RO' ? 'selected' : ''}}>RO - Rondônia</option>
                                        <option value="RR" {{old('estado',$paciente->estado ?? '') === 'RR' ? 'selected' : ''}}>RR - Roraima</option>
                                        <option value="RS" {{old('estado',$paciente->estado ?? '') === 'RS' ? 'selected' : ''}}>RS - Rio Grande do Sul</option>
                                        <option value="SC" {{old('estado',$paciente->estado ?? '') === 'SC' ? 'selected' : ''}}>SC - Santa Catarina</option>
                                        <option value="SE" {{old('estado',$paciente->estado ?? '') === 'SE' ? 'selected' : ''}}>SE - Sergipe</option>
                                        <option value="SP" {{old('estado',$paciente->estado ?? '') === 'SP' ? 'selected' : ''}}>SP - São Paulo</option>
                                        <option value="TO" {{old('estado',$paciente->estado ?? '') === 'TO' ? 'selected' : ''}}>TO - Tocantins</option>
                                </select>                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" class="form-control" name="celular" id="celular" placeholder="(00) 00000-0000" data-mask="(00) 00000-0000" value="{{$paciente->telefone}}">
                            </div>
                        </div>                       
                    </div>                    
                </fieldset>                
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-footer">
                            <button type="button" data-color="{{$color}}" class="cancelar_btn btn btn-default">Cancelar</button>
                            <button class="salvar_btn btn btn-{{$color}}" data-color="{{$color}}" type="button"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
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
        var id = $('#edit_paciente_id').val();
        var color = $(this).data("color");
        var loading = $('#imgadd');
            loading.show();

        var data = new FormData();        
            
            data.append('nome',$('#nome').val());            
            data.append('data_nascimento',formatDate($('#datanasc').val()));
            data.append('data_avaliacao',formatDate($('#data_avaliacao').val()));
            data.append('sexo',$('#sexo').val());            
            data.append('pai',$('#pai').val());
            data.append('escolaridade_pai',$('#escolaridade_pai').val());
            data.append('ocupacao_pai',$('#ocupacao_pai').val());
            data.append('datanasc_pai',formatDate($('#datanasc_pai').val()));
            data.append('mae',$('#mae').val());
            data.append('escolaridade_mae',$('#escolaridade_mae').val());
            data.append('ocupacao_mae',$('#ocupacao_mae').val());
            data.append('datanasc_mae', formatDate($('#datanasc_mae').val()));
            data.append('cpf',$('#cpf').val());
            data.append('cartao_sus',$('#cartao_sus').val());
            data.append('informante',$('#informante').val());
            data.append('medicacao_atual',$('#medicacao_atual').val());
            data.append('medico_responsavel',$('#medico_responsavel').val());
            data.append('encaminhamentos',$('#encaminhamentos').val());
            data.append('telefone',$('#celular').val());            
            data.append('endereco',$('#endereco').val());
            data.append('numero',$('#numero').val());
            data.append('bairro',$('#bairro').val());
            data.append('cidade',$('#cidade').val());
            data.append('cep',$('#add_cep').val());
            data.append('estado',$('#estado').val());            
            data.append('_token',CSRF_TOKEN);
            data.append('_method','PUT');              

        $.ajax({
            url: '/ceteaadmin/paciente/update/'+id,
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
                     location.replace('/ceteaadmin/paciente/index/'+color);
                }  
            }  
        });

    });  

    //cancelar o registro
    
    $(document).on('click','.cancelar_btn',function(e){
        e.preventDefault();
        var color = $(this).data("color");
        location.replace('/ceteaadmin/paciente/index/'+color);
    });

    //busca cep
   $(document).on('click','#addpesquisacep',function(e){
        e.preventDefault();
        var CSRF_TOKEN  = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var loading = $('#addimgpesquisacep');
                var cep = $("#add_cep").val().replace(/[^0-9]/g,'');
                          $("#addimgcorreios").replaceWith('<img id="addimgcorreios">')
                loading.show();
                if(cep !== "" && cep.length == 8){
                 $.ajax({
                    url:'/cep/' + cep,
                    type:'GET',
                    dataType:'json',
                    success: function (response) {
                            if(response.status==200){
                                if(response.localizacao.erro){
                                    $('#addpesquisacepresposta').replaceWith('<small id="addpesquisacepresposta" style="color:red;">CEP não localizado!</small>');
                                     loading.hide();
                                     var link = '{{asset('')}}storage/c1.png';
                                     $('#addimgcorreios').replaceWith('<img id="addimgcorreios" src="'+link+'" class="rounded-circle" width="20">');
                                }else{
                                $(".endereco").val(response.localizacao.logradouro);                                
                                $(".bairro").val(response.localizacao.bairro);
                                $(".cidade").val(response.localizacao.localidade);
                                $(".estado").val(response.localizacao.uf);                                
                                loading.hide();
                                var link = '{{asset('')}}storage/c1.png';
                                $('#addimgcorreios').replaceWith('<img id="addimgcorreios" src="'+link+'" class="rounded-circle" width="20">');
                                $('#addpesquisacepresposta').replaceWith('<small id="addpesquisacepresposta"></small>');
                                }
                            }
                         }
                });
                }else{
                    $('#addpesquisacepresposta').replaceWith('<small id="addpesquisacepresposta" style="color:red;">CEP deve conter 8 digitos</small>');
                    loading.hide();
                    var link = '{{asset('')}}storage/c1.png';
                    $('#addimgcorreios').replaceWith('<img id="addimgcorreios" src="'+link+'" class="rounded-circle" width="20">');
                }

     });
    ///fim busca cep

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