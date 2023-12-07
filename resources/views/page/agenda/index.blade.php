@extends('layouts.page')
@section('content')

<style>
    .tooltip-inner {
    text-align: left;
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

<!-- início AddAgendamentoModal -->
<div class="modal fade animate__animated animate__bounce animate__faster" id="AddAgendamentoModal" tabindex="-1" role="dialog" aria-labelledby="titleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header navbar-dark bg-success">
                <h5 class="modal-title" id="titleModalLabel" style="color: white;">Agendamento para: {{$paciente->nome}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white;">&times;</span>
                </button>                
            </div>
            <div class="modal-body form-horizontal">
            <form id="addform" name="addform" class="form-horizontal" role="form">
                <input type="hidden" id="add_paciente_id" value="{{$paciente->id}}">
                <ul id="saveform_errList"></ul>                                   
                <div class="form-group mb-3">
                    <label for="adddata">Para quando deseja agendar?</label>
                    <input type="date" name="adddata" id="adddata" class="addata form-control" required pattern="\d{4}-\d{2}-\d{2}" autocomplete="on" value="{{date('Y-m-d')}}"/>
                </div>
                <div class="form-group mb-3">
                    <label for="addmedicoterapeuta">Para qual terapeuta?</label>
                    <select name="addmedicoterapeuta" id="addmedicoterapeuta" class="addmedicoterapeuta custom-select">
                                    @foreach ($medicosterapeutas as $terapeuta)
                                    <option value="{{$terapeuta->id}}">{{$terapeuta->nome}}</option>
                                    @endforeach                                    
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="addtratamento">Qual terapia?</label>
                    <select name="addtratamento" id="addtratamento" class="addtratamento custom-select">
                                   <option value=""></option>
                    </select>
                </div>
                <fieldset>
                    <legend>Outras informações</legend>
                    <div class="form-group mb-3">
                        <label for="addresponsavel">Nome do responsável?</label>
                        <input type="text" class="form-control" name="addresponsavel" id="addresponsavel">
                    </div>
                    <div class="form-group mb-3">
                        <label for="addparentesco">Qual o parentesco do responsável?</label>
                        <input type="text" class="form-control" name="addparentesco" id="addparentesco">
                    </div>
                </fieldset>
            </form>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success add_agendamento"><img id="imgadd" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
            </div>
        </div>
    </div>

</div>
<!-- fim AddAgendamentoModal -->


@auth
@if(!(auth()->user()->inativo))
<div class="container px-4 px-lg-5">
    <div class="container-fluid py-5">
        <div id="success_message"></div>
        <section class="border p-4 mb-4 d-flex align-items-left">
            <div class="col-sm-12">
            <div class="input-group rounded">
                <button type="button" class="addAgendaModal_Btn btn btn-default" style="background: transparent;border: none; white-space: nowrap;" data-html="true" data-placement="top" data-toggle="popover" title="Marcação de atendimento"><i class="fas fa-plus"></i> Novo Agendamento</button>
            </div>            
            </div>
        </section>
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="bg-success" style="color: white">
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Médico/Terapeuta</th>
                            <th scope="col">Tratamento</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="lista_agendamento">
                        <tr id="novo" style="display: none"></tr>
                        @forelse($atendimentos as $atendimento)
                        <tr id="atendimento{{$atendimento->id}}">
                            @if($atendimento->tipo_atendimento_id==2) <!--retorno -->
                            <th scope="row">{{$atendimento->data_retorno}}</th>
                            @endif
                            @if($atendimento->tipo_atendimento_id==3) <!--encaminhamento -->
                            <th scope="row">{{$atendimento->data_encaminhamento}}</th>
                            @endif
                            @if($atendimento->tipo_atendimento_id==4) <!--agendamento -->
                            <th scope="row">{{$atendimento->data_agendamento}}</th>
                            @endif
                            @if($atendimento->tipo_atendimento_id==5) <!--agenda online -->
                            <th scope="row">{{$atendimento->data_agonline}}</th>
                            @endif
                            <td>{{$atendimento->medico_terapeuta->nome}}</td>
                            <td>{{$atendimento->tratamento->nome}}</td>
                            @if($atendimento->tipo_atendimento_id==5)
                            <td>
                                <div class="btn-group">
                                    <button type="button" data-id="{{$atendimento->id}}" data-nome="{{$atendimento->paciente->nome}}" class="edit_agendamento fas fa-edit" style="background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="left" data-toggle="popover" title="Editar"></button>
                                    <button type="button" data-id="{{$atendimento->id}}" data-nome="{{$atendimento->paciente->nome}}" class="delete_agendamento_btn fas fa-trash" style="background:transparent;border:none; white-space: nowrap;" data-html="true" data-placement="right" data-toggle="popover" title="Excluir"></button>
                                </div>
                            </td>
                            @else
                            <td></td>
                            @endif
                        </tr>
                        @empty
                        <tr id="nadaencontrado">
                            <td colspan="4">Nenhuma agenda foi registrada!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex hover justify-content-center">
                    {{$atendimentos->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@else
<i class="fas fa-lock"></i><b class="title">USUÁRIO INATIVO. COMPAREÇA NO CETEA PARA SER REATIVADO.</b>
@endif
@endauth

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
@endsection