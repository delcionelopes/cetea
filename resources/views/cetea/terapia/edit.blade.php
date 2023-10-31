@extends('adminlte::page')

@section('title', 'Edição de Terapia')

@section('content')

<!-- Inicio AddAnamnese_inicialModal -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddAnamnese_inicialModal" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel" style="color: white;">Anamnese Inicial</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_anamnese_inicial" class="form-horizontal" role="form">
                <input type="hidden" id="addpacienteid">
                <input type="hidden" id="addatendimentoid">
                <ul id="saveform_errlist_anamnese_inicial"></ul>
                <fieldset>
                    <legend>Composição Familiar: nome, idade, estado civil, grau de parentesco, instrução, local de trabalho, renda familiar. </legend>
                    <span class="addcomposicao_familiar_caracteres"></span>
                    <textarea name="addcomposicao_familiar" id="addcomposicao_familiar" cols="30" rows="10" class="composicao_familiar form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Queixa ou motivo do encaminhamento?</legend>
                    <span class="addqueixa_motivo_encaminhamento_caracteres"></span>
                    <textarea name="addqueixa_motivo_encaminhamento" id="addqueixa_motivo_encaminhamento" cols="30" rows="10" class="queixa_motivo_encaminhamento form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Idade em que foi constatado o problema?</legend>                    
                    <div class="col-md-4">
                    <span class="addidade_constatado_problema_caracteres"></span>
                    <input type="text" name="addidade_constatado_problema" id="addidade_constatado_problema" class="idade_constatado_problema form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Providências tomadas na ocasião?</legend>
                    <span class="addprovidencias_tomadas_caracteres"></span>
                    <textarea name="addprovidencias_tomadas" id="addprovidencias_tomadas" cols="30" rows="10" class="providencias_tomadas form-control"></textarea>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_anamnese_inicial_btn"><img id="imgaddanamnese_inicial" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddAnamnese_inicialModal -->
<!-- Inicio EditAnamnese_inicialModal -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditAnamnese_inicialModal" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header nav-dark bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel" style="color: white;">Anamnese Inicial</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_anamnese_inicial" class="form-horizontal" role="form">
                <input type="hidden" id="editpacienteid">
                <input type="hidden" id="editatendimentoid">
                <ul id="updateform_errlist_anamnese_inicial"></ul>
                <fieldset>
                    <legend>Composição Familiar: nome, idade, estado civil, grau de parentesco, instrução, local de trabalho, renda familiar. </legend>
                    <span class="editcomposicao_familiar_caracteres"></span>
                    <textarea name="editcomposicao_familiar" id="editcomposicao_familiar" cols="30" rows="10" class="composicao_familiar form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Queixa ou motivo do encaminhamento?</legend>
                    <span class="editqueixa_motivo_encaminhamento_caracteres"></span>
                    <textarea name="editqueixa_motivo_encaminhamento" id="editqueixa_motivo_encaminhamento" cols="30" rows="10" class="queixa_motivo_encaminhamento form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Idade em que foi constatado o problema?</legend>
                    <div class="col-md-4">
                    <span class="editidade_constatado_problema_caracteres"></span>
                    <input type="text" name="editidade_constatado_problema" id="editidade_constatado_problema" class="idade_constatado_problema form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Providências tomadas na ocasião?</legend>
                    <span class="editprovidencias_tomadas_caracteres"></span>
                    <textarea name="editprovidencias_tomadas" id="editprovidencias_tomadas" cols="30" rows="10" class="providencias_tomadas form-control"></textarea>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="button" data-color="{{$color}}" class="btn btn-{{$color}} update_anamnese_inicial_btn"><img id="imgeditanamnese_inicial" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditAnamnese_inicialModal -->

<!-- Inicio AddAnamnese_HistPregressaModal -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddAnamnese_HistPregressaModal" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_histpregressamodal" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_histpregressamodal" style="color: white;">Anamnese História Pregressa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_histpregressamodal" class="form-horizontal" role="form">
                <input type="hidden" id="addpacienteid_histpregressa">
                <input type="hidden" id="addatendimentoid_histpregressa">
                <ul id="saveform_errlist_histpregressa"></ul>
                <fieldset>
                    <legend>Gestação planejada? </legend>             
                    <div class="form-group">
                                <label for="addgestacao_planejada">
                                <input type="checkbox" class="gestacao_planejada checkbox" name="addgestacao_planejada" id="addgestacao_planejada"> Sim</label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Detalhes da gestação: idade, planejada, pré-natal, uso de drogas, medicamentos, ameaça de aborto, dieta, intercorrências.</legend>
                    <span class="adddetalhe_gestacao"></span>
                    <textarea name="adddetalhe_gestacao" id="adddetalhe_gestacao" cols="30" rows="10" class="detalhe_gestacao form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Parto e nascimento: tipo, idade gestacional, peso, cor, choro, intercorrências.</legend>                                        
                    <span class="addparto_nascimento"></span>
                    <textarea name="addparto_nascimento" id="addparto_nascimento" cols="30" rows="10" class="parto_nascimento form-control"></textarea>                    
                </fieldset>
                <fieldset>
                    <legend>Período Neonatal: choro, icterícia, convulsões, succção, movimentação.</legend>
                    <span class="addperiodo_neonatal"></span>
                    <textarea name="addperiodo_neonatal" id="addperiodo_neonatal" cols="30" rows="10" class="periodo_neonatal form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Tratamentos anteriores: médicos, reabilitação, exames.</legend>
                    <span class="addtratamentos_anteriores"></span>
                    <textarea name="addtratamentos_anteriores" id="addtratamentos_anteriores" cols="30" rows="10" class="tratamentos_anteriores form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Internações: infecções, cirurgias.</legend>
                    <span class="addinternacoes"></span>
                    <textarea name="addinternacoes" id="addinternacoes" cols="30" rows="10" class="internacoes form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Vacinas.</legend>
                    <span class="addvacinas"></span>
                    <textarea name="addvacinas" id="addvacinas" cols="30" rows="10" class="vacinas form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Antecedentes alérgicos.</legend>
                    <span class="addantecedentes_alergicos"></span>
                    <textarea name="addantecedentes_alergicos" id="addantecedentes_alergicos" cols="30" rows="10" class="antecedentes_alergicos form-control"></textarea>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_anamnese_hist_pregressa_btn"><img id="imgaddanamnese_histpregressa" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddAnamnese_HistPregressaModal -->

<!-- Inicio EditAnamnese_HistPregressaModal -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditAnamnese_HistPregressaModal" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histpregressamodal" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histpregressamodal" style="color: white;">Anamnese História Pregressa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histpregressamodal" class="form-horizontal" role="form">
                <input type="hidden" id="editpacienteid_histpregressa">
                <input type="hidden" id="editatendimentoid_histpregressa">
                <ul id="updateform_errlist_histpregressa"></ul>
                <fieldset>
                    <legend>Gestação planejada? </legend>             
                    <div class="form-group">
                                <label for="editgestacao_planejada">
                                <input type="checkbox" class="gestacao_planejada checkbox" name="editgestacao_planejada" id="editgestacao_planejada"> Sim</label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Detalhes da gestação: idade, planejada, pré-natal, uso de drogas, medicamentos, ameaça de aborto, dieta, intercorrências.</legend>
                    <span class="editdetalhe_gestacao"></span>
                    <textarea name="editdetalhe_gestacao" id="editdetalhe_gestacao" cols="30" rows="10" class="detalhe_gestacao form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Parto e nascimento: tipo, idade gestacional, peso, cor, choro, intercorrências.</legend>                                        
                    <span class="editparto_nascimento"></span>
                    <textarea name="editparto_nascimento" id="editparto_nascimento" cols="30" rows="10" class="parto_nascimento form-control"></textarea>                    
                </fieldset>
                <fieldset>
                    <legend>Período Neonatal: choro, icterícia, convulsões, succção, movimentação.</legend>
                    <span class="editperiodo_neonatal"></span>
                    <textarea name="editperiodo_neonatal" id="editperiodo_neonatal" cols="30" rows="10" class="periodo_neonatal form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Tratamentos anteriores: médicos, reabilitação, exames.</legend>
                    <span class="edittratamentos_anteriores"></span>
                    <textarea name="edittratamentos_anteriores" id="edittratamentos_anteriores" cols="30" rows="10" class="tratamentos_anteriores form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Internações: infecções, cirurgias.</legend>
                    <span class="editinternacoes"></span>
                    <textarea name="editinternacoes" id="editinternacoes" cols="30" rows="10" class="internacoes form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Vacinas.</legend>
                    <span class="editvacinas"></span>
                    <textarea name="editvacinas" id="editvacinas" cols="30" rows="10" class="vacinas form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Antecedentes alérgicos.</legend>
                    <span class="editantecedentes_alergicos"></span>
                    <textarea name="editantecedentes_alergicos" id="editantecedentes_alergicos" cols="30" rows="10" class="antecedentes_alergicos form-control"></textarea>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_anamnese_hist_pregressa_btn"><img id="imgeditanamnese_histpregressa" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditAnamnese_HistPregressaModal -->


<!-- Inicio Edit Form Atendimento -->
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
                                        <li class="dropdown-item bg-light"><a href="#" class="anamnese_inicial dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
                                            @if($count_anamnese_inicial)<i data-id="1" id="anamnese_inicial{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="anamnese_inicial{{$atendimento->id}}"></i>@endif Inicial</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="anamnese_histpregressa dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
                                            @if($count_anamnese_hist_pregressa)<i data-id="1" id="anamnese_histpregressa{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="anamnese_histpregressa{{$atendimento->id}}"></i>@endif História pregressa</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_anamnese_desenvolvimento)<i data-id="1" id="anamnese_desenvolvimento{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="anamnese_desenvolvimento{{$atendimento->id}}"></i>@endif Desenvolvimento</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-none dropdown-toggle bg-light" data-toggle="dropdown" aria-expanded="false">História do desenvolvimento</button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_inicial)<i data-id="1" id="histdes_versaopais_inicial{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_inicial{{$atendimento->id}}"></i>@endif Inicial</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_linguagem)<i data-id="1" id="histdes_versaopais_linguagem{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_linguagem{{$atendimento->id}}"></i>@endif Linguagem</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_desenvsocial)<i data-id="1" id="histdes_versaopais_desenvsocial{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_desenvsocial{{$atendimento->id}}"></i>@endif Desenvolvimento Social</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_brincadeiras)<i data-id="1" id="histdes_versaopais_brincadeiras{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_brincadeiras{{$atendimento->id}}"></i>@endif Brincadeiras</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_comportamentos)<i data-id="1" id="histdes_versaopais_comportamentos{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_comportamentos{{$atendimento->id}}"></i>@endif Comportamentos</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_independencia)<i data-id="1" id="histdes_versaopais_independencia{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_independencia{{$atendimento->id}}"></i>@endif Independência</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_desenvmotor)<i data-id="1" id="histdes_versaopais_desenvmotor{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_desenvmotor{{$atendimento->id}}"></i>@endif Desenvolvimento Motor</a></li>    
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_histescolar)<i data-id="1" id="histdes_versaopais_histescolar{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_histescolar{{$atendimento->id}}"></i>@endif Histórico Escolar</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_versaopais_compcasa)<i data-id="1" id="histdes_versaopais_compcasa{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_compcasa{{$atendimento->id}}"></i>@endif Comportamento em Casa</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_anexo1_rotalim)<i data-id="1" id="histdes_anexo1_rotalim{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_anexo1_rotalim{{$atendimento->id}}"></i>@endif Rotina Alimentar</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_anexo2_histmedico)<i data-id="1" id="histdes_anexo2_histmedico{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_anexo2_histmedico{{$atendimento->id}}"></i>@endif Histórico Médico</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="dropdown-item" data-id="{{$atendimento->paciente_id}}">
                                            @if($count_histdes_anexo3_infosensoriais)<i data-id="1" id="histdes_anexo3_infosensoriais{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_anexo3_infosensoriais{{$atendimento->id}}"></i>@endif Informações Sensoriais</a></li>
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

    //inicio conta caracteres dos textarea anamnese_inicial

    //add

    $(document).on('input','#addcomposicao_familiar',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var composicao_familiar = $('textarea[name="addcomposicao_familiar"]').val();
            $('textarea[name="addcomposicao_familiar"]').val(composicao_familiar.substr(0,limite));
            $(".addcomposicao_familiar_caracteres").text("0" + " " + informativo);
        }else{
            $(".addcomposicao_familiar_caracteres").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addqueixa_motivo_encaminhamento',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var queixa_motivo_encaminhamento = $('textarea[name="addqueixa_motivo_encaminhamento"]').val();
            $('textarea[name="addqueixa_motivo_encaminhamento"]').val(queixa_motivo_encaminhamento.substr(0,limite));
            $(".addqueixa_motivo_encaminhamento_caracteres").text("0" + " " + informativo);
        }else{
            $(".addqueixa_motivo_encaminhamento_caracteres").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addidade_constatado_problema',function(){
        var limite = 10;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var idade_constatado_problema = $('textarea[name="addidade_constatado_problema"]').val();
            $('textarea[name="addidade_constatado_problema"]').val(idade_constatado_problema.substr(0,limite));
            $(".addidade_constatado_problema_caracteres").text("0" + " " + informativo);
        }else{
            $(".addidade_constatado_problema_caracteres").text(caracteresRestantes + " " + informativo);
        }
    });

     $(document).on('input','#addprovidencias_tomadas',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var providencias_tomadas = $('textarea[name="addprovidencias_tomadas"]').val();
            $('textarea[name="addprovidencias_tomadas"]').val(providencias_tomadas.substr(0,limite));
            $(".addprovidencias_tomadas_caracteres").text("0" + " " + informativo);
        }else{
            $(".addprovidencias_tomadas_caracteres").text(caracteresRestantes + " " + informativo);
        }
    });

    //edit

    $(document).on('input','#editcomposicao_familiar',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var composicao_familiar = $('textarea[name="editcomposicao_familiar"]').val();
            $('textarea[name="editcomposicao_familiar"]').val(composicao_familiar.substr(0,limite));
            $(".editcomposicao_familiar_caracteres").text("0" + " " + informativo);
        }else{
            $(".editcomposicao_familiar_caracteres").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editqueixa_motivo_encaminhamento',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var queixa_motivo_encaminhamento = $('textarea[name="editqueixa_motivo_encaminhamento"]').val();
            $('textarea[name="editqueixa_motivo_encaminhamento"]').val(queixa_motivo_encaminhamento.substr(0,limite));
            $(".editqueixa_motivo_encaminhamento_caracteres").text("0" + " " + informativo);
        }else{
            $(".editqueixa_motivo_encaminhamento_caracteres").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editidade_constatado_problema',function(){
        var limite = 10;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var idade_constatado_problema = $('textarea[name="editidade_constatado_problema"]').val();
            $('textarea[name="editidade_constatado_problema"]').val(idade_constatado_problema.substr(0,limite));
            $(".editidade_constatado_problema_caracteres").text("0" + " " + informativo);
        }else{
            $(".editidade_constatado_problema_caracteres").text(caracteresRestantes + " " + informativo);
        }
    });

     $(document).on('input','#editprovidencias_tomadas',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var providencias_tomadas = $('textarea[name="editprovidencias_tomadas"]').val();
            $('textarea[name="editprovidencias_tomadas"]').val(providencias_tomadas.substr(0,limite));
            $(".editprovidencias_tomadas_caracteres").text("0" + " " + informativo);
        }else{
            $(".editprovidencias_tomadas_caracteres").text(caracteresRestantes + " " + informativo);
        }
    });

    //fim conta caracteres dos textarea anamnese_inicial

    //inicio conta caracteres dos textarea anamnese_histpregressa

    //add

    $(document).on('input','#adddetalhe_gestacao',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var detalhe_gestacao = $('textarea[name="adddetalhe_gestacao"]').val();
            $('textarea[name="adddetalhe_gestacao"]').val(detalhe_gestacao.substr(0,limite));
            $(".adddetalhe_gestacao").text("0" + " " + informativo);
        }else{
            $(".adddetalhe_gestacao").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addparto_nascimento',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var parto_nascimento = $('textarea[name="addparto_nascimento"]').val();
            $('textarea[name="addparto_nascimento"]').val(parto_nascimento.substr(0,limite));
            $(".addparto_nascimento").text("0" + " " + informativo);
        }else{
            $(".addparto_nascimento").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addperiodo_neonatal',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var periodo_neonatal = $('textarea[name="addperiodo_neonatal"]').val();
            $('textarea[name="addperiodo_neonatal"]').val(periodo_neonatal.substr(0,limite));
            $(".addperiodo_neonatal").text("0" + " " + informativo);
        }else{
            $(".addperiodo_neonatal").text(caracteresRestantes + " " + informativo);
        }
    });

     $(document).on('input','#addtratamentos_anteriores',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var tratamentos_anteriores = $('textarea[name="addtratamentos_anteriores"]').val();
            $('textarea[name="addtratamentos_anteriores"]').val(tratamentos_anteriores.substr(0,limite));
            $(".addtratamentos_anteriores").text("0" + " " + informativo);
        }else{
            $(".addtratamentos_anteriores").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addinternacoes',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var internacoes = $('textarea[name="addinternacoes"]').val();
            $('textarea[name="addinternacoes"]').val(internacoes.substr(0,limite));
            $(".addinternacoes").text("0" + " " + informativo);
        }else{
            $(".addinternacoes").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addvacinas',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var vacinas = $('textarea[name="addvacinas"]').val();
            $('textarea[name="addvacinas"]').val(vacinas.substr(0,limite));
            $(".addvacinas").text("0" + " " + informativo);
        }else{
            $(".addvacinas").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addantecedentes_alergicos',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var antecedentes_alergicos = $('textarea[name="addantecedentes_alergicos"]').val();
            $('textarea[name="addantecedentes_alergicos"]').val(antecedentes_alergicos.substr(0,limite));
            $(".addantecedentes_alergicos").text("0" + " " + informativo);
        }else{
            $(".addantecedentes_alergicos").text(caracteresRestantes + " " + informativo);
        }
    });

    //edit

     $(document).on('input','#editdetalhe_gestacao',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var detalhe_gestacao = $('textarea[name="editdetalhe_gestacao"]').val();
            $('textarea[name="editdetalhe_gestacao"]').val(detalhe_gestacao.substr(0,limite));
            $(".editdetalhe_gestacao").text("0" + " " + informativo);
        }else{
            $(".editdetalhe_gestacao").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editparto_nascimento',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var parto_nascimento = $('textarea[name="editparto_nascimento"]').val();
            $('textarea[name="editparto_nascimento"]').val(parto_nascimento.substr(0,limite));
            $(".editparto_nascimento").text("0" + " " + informativo);
        }else{
            $(".editparto_nascimento").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editperiodo_neonatal',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var periodo_neonatal = $('textarea[name="editperiodo_neonatal"]').val();
            $('textarea[name="editperiodo_neonatal"]').val(periodo_neonatal.substr(0,limite));
            $(".editperiodo_neonatal").text("0" + " " + informativo);
        }else{
            $(".editperiodo_neonatal").text(caracteresRestantes + " " + informativo);
        }
    });

     $(document).on('input','#edittratamentos_anteriores',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var tratamentos_anteriores = $('textarea[name="edittratamentos_anteriores"]').val();
            $('textarea[name="edittratamentos_anteriores"]').val(tratamentos_anteriores.substr(0,limite));
            $(".edittratamentos_anteriores").text("0" + " " + informativo);
        }else{
            $(".edittratamentos_anteriores").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editinternacoes',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var internacoes = $('textarea[name="editinternacoes"]').val();
            $('textarea[name="editinternacoes"]').val(internacoes.substr(0,limite));
            $(".editinternacoes").text("0" + " " + informativo);
        }else{
            $(".editinternacoes").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editvacinas',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var vacinas = $('textarea[name="editvacinas"]').val();
            $('textarea[name="editvacinas"]').val(vacinas.substr(0,limite));
            $(".editvacinas").text("0" + " " + informativo);
        }else{
            $(".editvacinas").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editantecedentes_alergicos',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var antecedentes_alergicos = $('textarea[name="editantecedentes_alergicos"]').val();
            $('textarea[name="editantecedentes_alergicos"]').val(antecedentes_alergicos.substr(0,limite));
            $(".editantecedentes_alergicos").text("0" + " " + informativo);
        }else{
            $(".editantecedentes_alergicos").text(caracteresRestantes + " " + informativo);
        }
    });

    //fim conta caracteres dos textarea anamnese_histpregressa
        
        
    
    $("#AddAnamnese_inicialModal").on('shown.bs.modal',function(){
            $(".composicao_familiar").focus();
        });

    $("#EditAnamnese_inicialModal").on('shown.bs.modal',function(){
            $(".composicao_familiar").focus();
        });

    $("#AddAnamnese_HistPregressaModal").on('shown.bs.modal',function(){
            $(".detalhe_gestacao").focus();
    });

    $("#EditAnamnese_HistPregressaModal").on('shown.bs.modal',function(){
            $(".detalhe_gestacao").focus();
    });

    $(document).on('click','.anamnese_inicial',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_anamneseinicial = $("#anamnese_inicial"+atendimentoid).data("id");        

        if(opcao_form_anamneseinicial==0){
                $("#addpacienteid").val(pacienteid);
                $("#addatendimentoid").val(atendimentoid);
                $("#addform_anamnese_inicial").trigger('reset');
                $("#AddAnamnese_inicialModal").modal('show'); 
                $("#saveform_errList_anamnese_inicial").replaceWith('<ul id="saveform_errList_anamnese_inicial"></ul>');
        }else{            
                $("#editpacienteid").val(pacienteid);
                $("#editatendimentoid").val(atendimentoid);
                $("#editform_anamnese_inicial").trigger('reset');
                $("#EditAnamnese_inicialModal").modal('show'); 
                $("#updateform_errList_anamnese_inicial").replaceWith('<ul id="updateform_errList_anamnese_inicial"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_anamneseinicial/'+pacienteid,                                
                    success: function(response){           
                        if(response.status==200){                           
                            $(".composicao_familiar").val(response.anamnese_inicial.ii_composicao_familiar);
                            $(".queixa_motivo_encaminhamento").val(response.anamnese_inicial.iii_queixa_motivo_encaminhamento);
                            $(".idade_constatado_problema").val(response.anamnese_inicial.iii_a_idade_constatado_problema);
                            $(".providencias_tomadas").val(response.anamnese_inicial.iii_b_providencias_tomadas);
                        }      
                    }
                });
        }
    });

    $(document).on('click','.add_anamnese_inicial_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid").val();
        var atendimentoid = $("#addatendimentoid").val();

        var loading = $("#imgaddanamnese_inicial");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('composicao_familiar',$(".composicao_familiar").val());
        data.append('queixa_motivo_encaminhamento',$(".queixa_motivo_encaminhamento").val());
        data.append('idade_constatado_problema',$(".idade_constatado_problema").val());
        data.append('providencias_tomadas',$(".providencias_tomadas").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','put');        

        $.ajax({
            url:'/ceteaadmin/terapia/store_anamneseinicial',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_anamnese_inicial").replaceWith('<ul id="saveform_errList_anamnese_inicial"></ul>');
                    $("#saveform_errlist_anamnese_inicial").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_anamnese_inicial").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_anamnese_inicial").replaceWith('<ul id="saveform_errList_anamnese_inicial"></ul>');
                    $("#anamnese_inicial"+atendimentoid).replaceWith('<i data-id="1" id="anamnese_inicial'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_anamnese_inicial").trigger('reset');
                    $("#AddAnamnese_inicialModal").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_anamnese_inicial_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid").val();
        var pacienteid = $("#editpacienteid").val();

        var loading = $("#imgeditanamnese_inicial");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('composicao_familiar',$("#editcomposicao_familiar").val());
        data.append('queixa_motivo_encaminhamento',$("#editqueixa_motivo_encaminhamento").val());
        data.append('idade_constatado_problema',$("#editidade_constatado_problema").val());
        data.append('providencias_tomadas',$("#editprovidencias_tomadas").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','put');

        $.ajax({
            url:'/ceteaadmin/terapia/update_anamneseinicial/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_anamnese_inicial").replaceWith('<ul id="updateform_errList_anamnese_inicial"></ul>');
                    $("#updateform_errlist_anamnese_inicial").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_anamnese_inicial").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_anamnese_inicial").replaceWith('<ul id="updateform_errList_anamnese_inicial"></ul>');
                    $("#anamnese_inicial"+atendimentoid).replaceWith('<i data-id="1" id="anamnese_inicial'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_anamnese_inicial").trigger('reset');
                    $("#EditAnamnese_inicialModal").modal('hide');    
                }
            }
        });
    });


$(document).on('click','.anamnese_histpregressa',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_anamnesehistpregressa = $("#anamnese_histpregressa"+atendimentoid).data("id");

        if(opcao_form_anamnesehistpregressa==0){
                $("#addpacienteid_histpregressa").val(pacienteid);
                $("#addatendimentoid_histpregressa").val(atendimentoid);
                $("#addform_histpregressamodal").trigger('reset');
                $("#AddAnamnese_HistPregressaModal").modal('show'); 
                $("#saveform_errList_histpregressa").replaceWith('<ul id="saveform_errList_anamnese_histpregressa"></ul>');
        }else{            
                $("#editpacienteid_histpregressa").val(pacienteid);
                $("#editatendimentoid_histpregressa").val(atendimentoid);
                $("#editform_histpregressamodal").trigger('reset');
                $("#EditAnamnese_HistPregressaModal").modal('show'); 
                $("#updateform_errList_histpregressa").replaceWith('<ul id="updateform_errList_histpregressa"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_anamnesehistpregressa/'+pacienteid,                                
                    success: function(response){           
                        if(response.status==200){                           
                            if(response.anamnese_hist_pregressa.gestacao_planejada){
                                $(".gestacao_planejada").attr('checked','true');
                            }else{
                                $(".gestacao_planejada").attr('checked','false');
                            }
                            $(".detalhe_gestacao").val(response.anamnese_hist_pregressa.detalhe_gestacao);
                            $(".parto_nascimento").val(response.anamnese_hist_pregressa.parto_nascimento);
                            $(".periodo_neonatal").val(response.anamnese_hist_pregressa.periodo_neonatal);
                            $(".tratamentos_anteriores").val(response.anamnese_hist_pregressa.tratamentos_anteriores);
                            $(".internacoes").val(response.anamnese_hist_pregressa.internacoes);
                            $(".vacinas").val(response.anamnese_hist_pregressa.vacinas);
                            $(".antecedentes_alergicos").val(response.anamnese_hist_pregressa.antecedentes_alergicos);
                        }      
                    }
                });
        }
    });


    $(document).on('click','.add_anamnese_hist_pregressa_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histpregressa").val();
        var atendimentoid = $("#addatendimentoid_histpregressa").val();

        var loading = $("#imgaddanamnese_histpregressa");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('gestacao_planejada',$('.gestacao_planejada').is(":checked")?'true':'false');
        data.append('detalhe_gestacao',$(".detalhe_gestacao").val());
        data.append('parto_nascimento',$(".parto_nascimento").val());
        data.append('periodo_neonatal',$(".periodo_neonatal").val());
        data.append('tratamentos_anteriores',$(".tratamentos_anteriores").val());
        data.append('internacoes',$(".internacoes").val());
        data.append('vacinas',$(".vacinas").val());
        data.append('antecedentes_alergicos',$(".antecedentes_alergicos").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','put');        

        $.ajax({
            url:'/ceteaadmin/terapia/store_anamnesehistpregressa',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histpregressa").replaceWith('<ul id="saveform_errList_histpregressa"></ul>');
                    $("#saveform_errlist_histpregressa").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histpregressa").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histpregressa").replaceWith('<ul id="saveform_errList_histpregressa"></ul>');
                    $("#anamnese_histpregressa"+atendimentoid).replaceWith('<i data-id="1" id="anamnese_histpregressa'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histpregressamodal").trigger('reset');
                    $("#AddAnamnese_HistPregressaModal").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_anamnese_hist_pregressa_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histpregressa").val();
        var pacienteid = $("#editpacienteid_histpregressa").val();

        var loading = $("#imgeditanamnese_histpregressa");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('gestacao_planejada',$('#editgestacao_planejada').is(":checked")?'true':'false');
        data.append('detalhe_gestacao',$("#editdetalhe_gestacao").val());
        data.append('parto_nascimento',$("#editparto_nascimento").val());
        data.append('periodo_neonatal',$("#editperiodo_neonatal").val());
        data.append('tratamentos_anteriores',$("#edittratamentos_anteriores").val());
        data.append('internacoes',$("#editinternacoes").val());
        data.append('vacinas',$("#editvacinas").val());
        data.append('antecedentes_alergicos',$("#editantecedentes_alergicos").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','put');

        $.ajax({
            url:'/ceteaadmin/terapia/update_anamnesehistpregressa/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histpregressa").replaceWith('<ul id="updateform_errList_histpregressa"></ul>');
                    $("#updateform_errlist_histpregressa").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histpregressa").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histpregressa").replaceWith('<ul id="updateform_errList_histpregressa"></ul>');
                    $("#anamnese_histpregressa"+atendimentoid).replaceWith('<i data-id="1" id="anamnese_histpregressa'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histpregressamodal").trigger('reset');
                    $("#EditAnamnese_HistPregressaModal").modal('hide');    
                }
            }
        });
    });



});

</script>

@stop


