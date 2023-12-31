@extends('adminlte::page')

@section('title', 'Edição de Terapia')

@section('content')

<style type="text/css">
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

<!-- Inicio AddHistDesVersaoPaisInicial -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesVersaoPaisInicial" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_HistDesVersaoPaisInicial" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_HistDesVersaoPaisInicial" style="color: white;">Histórico do Desenvolvimento Versão Pais - Inicial</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdesversaopaisinicial" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdesversaopaisinicial">
                <input type="hidden" id="addatendimentoid_histdesversaopaisinicial">
                <ul id="saveform_errlist_histdesversaopaisinicial"></ul>
                <fieldset>
                    <legend>Responsável pelo preechimento:</legend>
                    <div class="col-md-12">
                    <span class="addresponsavelpreench"></span>
                    <input type="text" name="addresponsavelpreench" id="addresponsavelpreench" class="responsavelpreench form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Descreva as principais queixas ou dificuldades ralacionadas ao comportamento do seu filho.</legend>
                    <span class="addprinc_queixas_comport_filho"></span>
                    <textarea name="addprinc_queixas_comport_filho" id="addprinc_queixas_comport_filho" cols="30" rows="5" class="princ_queixas_comport_filho form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Quem vive com a criança? Quem toma conta na ausência dos responsáveis?</legend>
                    <span class="addquem_tomaconta_crianca"></span>
                    <textarea name="addquem_tomaconta_crianca" id="addquem_tomaconta_crianca" cols="30" rows="5" class="quem_tomaconta_crianca form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Mencione a idade em que notaram os primeiros sinais, sintomas ou que surgiram as primeiras preocupações com o desenvolvimento da criança. Quais foram os sinais preocupantes?</legend>                    
                    <span class="addidade_primeiros_sinais_preocupacoes"></span>
                    <textarea name="addidade_primeiros_sinais_preocupacoes" id="addidade_primeiros_sinais_preocupacoes" cols="30" rows="5" class="idade_primeiros_sinais_preocupacoes form-control"></textarea>
                </fieldset>                
                <fieldset>
                    <legend>Áreas de preocupação atual:</legend>
                    <div class="form-group">
                                <label for="adddesenv_motor">
                                <input type="checkbox" class="desenv_motor checkbox" name="adddesenv_motor" id="adddesenv_motor"> Desenvolvimento motor</label>
                    </div>                
                    <div class="form-group">
                                <label for="adddesenv_linguagem">
                                <input type="checkbox" class="desenv_linguagem checkbox" name="adddesenv_linguagem" id="adddesenv_linguagem"> Desenvolvimento da linguagem</label>
                    </div>                                   
                    <div class="form-group">
                                <label for="addproblemas_sono">
                                <input type="checkbox" class="problemas_sono checkbox" name="addproblemas_sono" id="addproblemas_sono"> Problemas com o sono</label>
                    </div>                
                    <div class="form-group">
                                <label for="addproblemas_conduta">
                                <input type="checkbox" class="problemas_conduta checkbox" name="addproblemas_conduta" id="addproblemas_conduta"> Problemas de conduta (agressividade, hiperatividade ou outros)</label>
                    </div>
                    <div class="form-group">
                                <label for="addtiques_esteotipias_manias">
                                <input type="checkbox" class="tiques_esteotipias_manias checkbox" name="addtiques_esteotipias_manias" id="addtiques_esteotipias_manias"> Tiques, esteotipias, manias ou rituais</label>
                    </div>
                    <div class="form-group">
                                <label for="addprobl_comport_social">
                                <input type="checkbox" class="probl_comport_social checkbox" name="addprobl_comport_social" id="addprobl_comport_social"> Problemas de comportamento social (falta de interesse ou afastamento das pessoas)</label>
                    </div>
                    <div class="form-group">
                                <label for="addproblemas_c_alimentacao">
                                <input type="checkbox" class="problemas_c_alimentacao checkbox" name="addproblemas_c_alimentacao" id="addproblemas_c_alimentacao"> Problemas com alimentação</label>
                    </div>
                    <div class="form-group">
                                <label for="addbrincar_incompativel_c_idade">
                                <input type="checkbox" class="brincar_incompativel_c_idade checkbox" name="addbrincar_incompativel_c_idade" id="addbrincar_incompativel_c_idade"> Brincar incompatível com a idade</label>
                    </div>                    
                </fieldset>                
                <fieldset>
                    <legend>Outras preocupações:</legend>
                    <span class="addoutras_preocupacoes"></span>
                    <textarea name="addoutras_preocupacoes" id="addoutras_preocupacoes" cols="30" rows="4" class="outras_preocupacoes form-control"></textarea> 
                </fieldset>                
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdesversaopais_inicial_btn"><img id="imgaddanamnese_histdesversaopaisinicial" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesVersaoPaisInicial -->

<!-- Inicio EditHistDesVersaoPaisInicial -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesVersaoPaisInicial" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdesversaopaisinicial" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdesversaopaisinicial" style="color: white;">Histórico do Desenvolvimento Versão Pais - Inicial</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdesversaopaisinicial" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdesversaopaisinicial">
                <input type="hidden" id="editatendimentoid_histdesversaopaisinicial">
                <ul id="updateform_errlist_histdesversaopaisinicial"></ul>
                <fieldset>
                    <legend>Responsável pelo preechimento:</legend>
                    <div class="col-md-12">
                    <span class="editresponsavelpreench"></span>
                    <input type="text" name="editresponsavelpreench" id="editresponsavelpreench" class="responsavelpreench form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Descreva as principais queixas ou dificuldades ralacionadas ao comportamento do seu filho.</legend>
                    <span class="editprinc_queixas_comport_filho"></span>
                    <textarea name="editprinc_queixas_comport_filho" id="editprinc_queixas_comport_filho" cols="30" rows="5" class="princ_queixas_comport_filho form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Quem vive com a criança? Quem toma conta na ausência dos responsáveis?</legend>
                    <span class="editquem_tomaconta_crianca"></span>
                    <textarea name="editquem_tomaconta_crianca" id="editquem_tomaconta_crianca" cols="30" rows="5" class="quem_tomaconta_crianca form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Mencione a idade em que notaram os primeiros sinais, sintomas ou que surgiram as primeiras preocupações com o desenvolvimento da criança. Quais foram os sinais preocupantes?</legend>                    
                    <span class="editidade_primeiros_sinais_preocupacoes"></span>
                    <textarea name="editidade_primeiros_sinais_preocupacoes" id="editidade_primeiros_sinais_preocupacoes" cols="30" rows="5" class="idade_primeiros_sinais_preocupacoes form-control"></textarea>
                </fieldset>                
                <fieldset>
                    <legend>Áreas de preocupação atual:</legend>
                    <div class="form-group">
                                <label for="editdesenv_motor">
                                <input type="checkbox" class="desenv_motor checkbox" name="editdesenv_motor" id="editdesenv_motor"> Desenvolvimento motor</label>
                    </div>                
                    <div class="form-group">
                                <label for="editdesenv_linguagem">
                                <input type="checkbox" class="desenv_linguagem checkbox" name="editdesenv_linguagem" id="editdesenv_linguagem"> Desenvolvimento da linguagem</label>
                    </div>                                   
                    <div class="form-group">
                                <label for="editproblemas_sono">
                                <input type="checkbox" class="problemas_sono checkbox" name="editproblemas_sono" id="editproblemas_sono"> Problemas com o sono</label>
                    </div>                
                    <div class="form-group">
                                <label for="editproblemas_conduta">
                                <input type="checkbox" class="problemas_conduta checkbox" name="editproblemas_conduta" id="editproblemas_conduta"> Problemas de conduta (agressividade, hiperatividade ou outros)</label>
                    </div>
                    <div class="form-group">
                                <label for="edittiques_esteotipias_manias">
                                <input type="checkbox" class="tiques_esteotipias_manias checkbox" name="edittiques_esteotipias_manias" id="edittiques_esteotipias_manias"> Tiques, esteotipias, manias ou rituais</label>
                    </div>
                    <div class="form-group">
                                <label for="editprobl_comport_social">
                                <input type="checkbox" class="probl_comport_social checkbox" name="editprobl_comport_social" id="editprobl_comport_social"> Problemas de comportamento social (falta de interesse ou afastamento das pessoas)</label>
                    </div>
                    <div class="form-group">
                                <label for="editproblemas_c_alimentacao">
                                <input type="checkbox" class="problemas_c_alimentacao checkbox" name="editproblemas_c_alimentacao" id="editproblemas_c_alimentacao"> Problemas com alimentação</label>
                    </div>
                    <div class="form-group">
                                <label for="editbrincar_incompativel_c_idade">
                                <input type="checkbox" class="brincar_incompativel_c_idade checkbox" name="editbrincar_incompativel_c_idade" id="editbrincar_incompativel_c_idade"> Brincar incompatível com a idade</label>
                    </div>                    
                </fieldset>                
                <fieldset>
                    <legend>Outras preocupações:</legend>
                    <span class="editoutras_preocupacoes"></span>
                    <textarea name="editoutras_preocupacoes" id="editoutras_preocupacoes" cols="30" rows="4" class="outras_preocupacoes form-control"></textarea> 
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdesversaopaisinicial_btn"><img id="imgeditanamnese_histdesversaopaisinicial" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesVersaoPaisInicial -->


<!-- Inicio AddAnamnese_Desenvolvimento -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddAnamnese_Desenvolvimento" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_Desenvolvimento" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_Desenvolvimento" style="color: white;">Anamnese Desenvolvimento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_desenvolvimento" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_desenvolvimento">
                <input type="hidden" id="addatendimentoid_desenvolvimento">
                <ul id="saveform_errlist_desenvolvimento"></ul>
                <fieldset>
                    <legend>Alimentação: como foi o aleitamento desde o nascimento até o desmame? E as reações à instrodução de outros tipos de alimentos?</legend>                                 
                    <span class="addalimentacao_aleitamento_reacoes"></span>
                    <textarea name="addalimentacao_aleitamento_reacoes" id="addalimentacao_aleitamento_reacoes" cols="30" rows="10" class="alimentacao_aleitamento_reacoes form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Teve ou tem problema para mastigar e/ou engolir?</legend>
                    <span class="addproblema_para_mastigar"></span>
                    <textarea name="addproblema_para_mastigar" id="addproblema_para_mastigar" cols="30" rows="5" class="problema_para_mastigar form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Hábitos alimentares da criança (quantas refeições por dia, o que come, o que prefere, come muito, come pouco, foi ou é forçado a comer?)</legend>                                        
                    <span class="addhabitos_alimentares"></span>
                    <textarea name="addhabitos_alimentares" id="addhabitos_alimentares" cols="30" rows="5" class="habitos_alimentares form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Idade em que sustentou a cabeça?</legend>                    
                    <div class="col-md-4">
                    <span class="addidade_sust_cabeca"></span>
                    <input type="text" name="addidade_sust_cabeca" id="addidade_sust_cabeca" class="idade_sust_cabeca form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando sentou sozinha? (idade)</legend>
                    <div class="col-md-4">
                    <span class="addqdo_sentou_sozinha"></span>
                    <input type="text" name="addqdo_sentou_sozinha" id="addqdo_sentou_sozinha" class="qdo_sentou_sozinha form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Engatinhou? Quando? (idade)</legend>                    
                    <div class="col-md-4">
                    <span class="addengatinhou_quando"></span>
                    <input type="text" name="addengatinhou_quando" id="addengatinhou_quando" class="engatinhou_quando form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando andou? (idade)</legend>
                    <div class="col-md-4">
                    <span class="addquando_andou"></span>
                    <input type="text" name="addquando_andou" id="addquando_andou" class="quando_andou form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Anda adequadamente?</legend>
                    <div class="col-md-8">
                    <span class="addanda_adequadamente"></span>
                    <input type="text" name="addanda_adequadamente" id="addanda_adequadamente" class="anda_adequadamente form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando controlou os esfíncteres?</legend>
                    <div class="col-md-8">
                    <span class="addqdo_controlou_os_esfincteres"></span>
                    <input type="text" name="addqdo_controlou_os_esfincteres" id="addqdo_controlou_os_esfincteres" class="qdo_controlou_os_esfincteres form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Caía muito quando pequena?</legend>
                    <div class="col-md-8">
                    <span class="addcaiamuito_qdopequena"></span>
                    <input type="text" name="addcaiamuito_qdopequena" id="addcaiamuito_qdopequena" class="caiamuito_qdopequena form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Em que idade se deu o balbucio? (idade)</legend>
                    <div class="col-md-4">
                    <span class="addque_idade_se_deu_balbucio"></span>
                    <input type="text" name="addque_idade_se_deu_balbucio" id="addque_idade_se_deu_balbucio" class="que_idade_se_deu_balbucio form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando falou as primeiras palavras? (idade)</legend>
                    <div class="col-md-4">
                    <span class="addqdo_falou_primpalavras"></span>
                    <input type="text" name="addqdo_falou_primpalavras" id="addqdo_falou_primpalavras" class="qdo_falou_primpalavras form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando falou as primeiras frases? (idade)</legend>
                    <div class="col-md-4">
                    <span class="addqdo_falou_primfrases"></span>
                    <input type="text" name="addqdo_falou_primfrases" id="addqdo_falou_primfrases" class="qdo_falou_primfrases form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Apresenta algum problema de linguagem?</legend>
                    <div class="col-md-8">
                    <span class="addapres_prob_linguagem"></span>
                    <input type="text" name="addapres_prob_linguagem" id="addapres_prob_linguagem" class="apres_prob_linguagem form-control" size="30" maxlength="30">
                    </div>
                </fieldset>
                 <fieldset>
                    <legend>Apresenta gagueira?</legend>
                    <span class="addapres_gagueira"></span>
                    <textarea name="addapres_gagueira" id="addapres_gagueira" cols="30" rows="5" class="apres_gagueira form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Como é o sono?</legend>
                    <div class="form-group">
                                <label for="addcalmo">
                                <input type="checkbox" class="calmo checkbox" name="addcalmo" id="addcalmo"> Calmo.</label>
                    </div>                
                    <div class="form-group">
                                <label for="addsua_qd_dorme">
                                <input type="checkbox" class="sua_qd_dorme checkbox" name="addsua_qd_dorme" id="addsua_qd_dorme"> Sua quando dorme.</label>
                    </div>                                   
                    <div class="form-group">
                                <label for="addsonambulismo">
                                <input type="checkbox" class="sonambulismo checkbox" name="addsonambulismo" id="addsonambulismo"> Sonambulismo.</label>
                    </div>                
                    <div class="form-group">
                                <label for="addagitado">
                                <input type="checkbox" class="agitado checkbox" name="addagitado" id="addagitado"> Agitado.</label>
                    </div>
                    <div class="form-group">
                                <label for="addfala_dormindo">
                                <input type="checkbox" class="fala_dormindo checkbox" name="addfala_dormindo" id="addfala_dormindo"> Fala dormindo.</label>
                    </div>
                    <div class="form-group">
                                <label for="addrange_os_dentes">
                                <input type="checkbox" class="range_os_dentes checkbox" name="addrange_os_dentes" id="addrange_os_dentes"> Range os dentes.</label>
                    </div>
                    <div class="form-group">
                                <label for="addbaba_qdo_dorme">
                                <input type="checkbox" class="baba_qdo_dorme checkbox" name="addbaba_qdo_dorme" id="addbaba_qdo_dorme"> Baba quando dorme.</label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>A que horas costuma dormir à noite?</legend>
                    <div class="col-md-8">
                    <span class="adda_que_h_cost_dormir_a_noite"></span>
                    <input type="text" name="adda_que_h_cost_dormir_a_noite" id="adda_que_h_cost_dormir_a_noite" class="a_que_h_cost_dormir_a_noite form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Dorme durante o dia?</legend>
                    <div class="col-md-8">
                    <span class="adddorme_durante_o_dia"></span>
                    <input type="text" name="adddorme_durante_o_dia" id="adddorme_durante_o_dia" class="dorme_durante_o_dia form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Tem hábitos diferenciados antes de dormir?</legend>
                    <div class="col-md-8">
                    <span class="addtem_hab_dif_antes_dormir"></span>
                    <input type="text" name="addtem_hab_dif_antes_dormir" id="addtem_hab_dif_antes_dormir" class="tem_hab_dif_antes_dormir form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Dorme em cama separada?</legend>
                    <div class="col-md-12">
                    <span class="adddorme_cama_sep"></span>
                    <input type="text" name="adddorme_cama_sep" id="adddorme_cama_sep" class="dorme_cama_sep form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>                     
                    <legend>Usou chupeta?</legend>
                    <div class="form-group">
                                <label for="addusos_chupeta">
                                <input type="checkbox" class="usos_chupeta checkbox" name="addusos_chupeta" id="addusos_chupeta"> Sim.</label>
                    <div class="col-md-4">
                    <span class="addusos_chupeta_ate_quando"></span>
                    <label for="addusos_chupeta_ate_quando">Até quando? (idade)</label>
                    <input type="text" name="addusos_chupeta_ate_quando" id="addusos_chupeta_ate_quando" class="usos_chupeta_ate_quando form-control" size="20" maxlength="20">
                    </div>
                    </div>  
                </fieldset>
                <fieldset>                     
                    <legend>Chupou dedo?</legend>
                    <div class="form-group">
                                <label for="addchupou_dedo">
                                <input type="checkbox" class="chupou_dedo checkbox" name="addchupou_dedo" id="addchupou_dedo"> Sim.</label>
                    <div class="col-md-4">
                    <span class="addchupou_dedo_ate_quando"></span>
                    <label for="addchupou_dedo_ate_quando">Até quando? (idade)</label>
                    <input type="text" name="addchupou_dedo_ate_quando" id="addchupou_dedo_ate_quando" class="chupou_dedo_ate_quando form-control" size="20" maxlength="20">
                    </div>
                    </div>  
                </fieldset>
                <fieldset>                     
                    <legend>Roeu unha?</legend>
                    <div class="form-group">
                                <label for="addroeu_unha">
                                <input type="checkbox" class="roeu_unha checkbox" name="addroeu_unha" id="addroeu_unha"> Sim.</label>
                    <div class="col-md-4">
                    <span class="addroeu_unha_ate_quando"></span>
                    <label for="addroeu_unha_ate_quando">Até quando? (idade)</label>
                    <input type="text" name="addroeu_unha_ate_quando" id="addroeu_unha_ate_quando" class="roeu_unha_ate_quando form-control" size="20" maxlength="20">
                    </div>
                    </div>  
                </fieldset>
                <fieldset>                     
                    <legend>Teve ou tem tiques?</legend>
                    <div class="form-group">
                                <label for="addteveoutem_tiques">
                                <input type="checkbox" class="teveoutem_tiques checkbox" name="addteveoutem_tiques" id="addteveoutem_tiques"> Sim.</label>
                    <div class="col-md-8">
                    <span class="addteveoutem_tiques_quais"></span>
                    <label for="addteveoutem_tiques_quais">Quais?</label>
                    <input type="text" name="addteveoutem_tiques_quais" id="addteveoutem_tiques_quais" class="teveoutem_tiques_quais form-control" size="30" maxlength="30">
                    </div>
                    </div>  
                </fieldset>
                <fieldset>
                    <legend>Relacionamento familiar</legend>
                    <div class="col-md-12">
                    <span class="addrelacionamento_familiar"></span>
                    <input type="text" name="addrelacionamento_familiar" id="addrelacionamento_familiar" class="relacionamento_familiar form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Com quem e onde fica a criança?</legend>
                    <div class="col-md-12">
                    <span class="addcom_quem_e_ondeficacrianca"></span>
                    <input type="text" name="addcom_quem_e_ondeficacrianca" id="addcom_quem_e_ondeficacrianca" class="com_quem_e_ondeficacrianca form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Tem amigos?</legend>
                    <div class="col-md-12">
                    <span class="addtem_amigos"></span>
                    <input type="text" name="addtem_amigos" id="addtem_amigos" class="tem_amigos form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Assiste TV? (posição, tempo, programação)</legend>
                    <div class="col-md-12">
                    <span class="addassiste_tv"></span>
                    <input type="text" name="addassiste_tv" id="addassiste_tv" class="assiste_tv form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Gosta de música? (preferências)</legend>
                    <div class="col-md-12">
                    <span class="addgosta_de_musica"></span>
                    <input type="text" name="addgosta_de_musica" id="addgosta_de_musica" class="gosta_de_musica form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Passeios, locais que frequenta.</legend>
                    <div class="col-md-12">
                    <span class="addpasseios_locais_freq"></span>
                    <input type="text" name="addpasseios_locais_freq" id="addpasseios_locais_freq" class="passeios_locais_freq form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Brincar (como, posição, nível de atenção, brinquedos preferidos)</legend>
                    <span class="addbrincar"></span>
                    <textarea name="addbrincar" id="addbrincar" cols="30" rows="4" class="brincar form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Comportamento (humor, birras, medos)</legend>
                    <span class="addcomportamento"></span>
                    <textarea name="addcomportamento" id="addcomportamento" cols="30" rows="4" class="comportamento form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Higiene</legend>
                    <span class="addhigiene"></span>
                    <textarea name="addhigiene" id="addhigiene" cols="30" rows="4" class="higiene form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Banho</legend>
                    <span class="addbanho"></span>
                    <textarea name="addbanho" id="addbanho" cols="30" rows="4" class="banho form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Vestir e despir</legend>
                    <span class="addvestir_e_despir"></span>
                    <textarea name="addvestir_e_despir" id="addvestir_e_despir" cols="30" rows="4" class="vestir_e_despir form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Escolaridade: nome, horário e série</legend>
                    <span class="addnome_horario_serie"></span>
                    <textarea name="addnome_horario_serie" id="addnome_horario_serie" cols="30" rows="2" class="nome_horario_serie form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Histórico escolar</legend>
                    <span class="addhistorico_escolar"></span>
                    <textarea name="addhistorico_escolar" id="addhistorico_escolar" cols="30" rows="4" class="historico_escolar form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Queixa principal da escola</legend>
                    <span class="addqueixa_principal_da_escola"></span>
                    <textarea name="addqueixa_principal_da_escola" id="addqueixa_principal_da_escola" cols="30" rows="4" class="queixa_principal_da_escola form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Gosta da professora?</legend>
                    <span class="addgosta_da_professora"></span>
                    <textarea name="addgosta_da_professora" id="addgosta_da_professora" cols="30" rows="2" class="gosta_da_professora form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Quem ajuda nas tarefas de casa?</legend>
                    <span class="addquem_ajuda_tar_casa"></span>
                    <textarea name="addquem_ajuda_tar_casa" id="addquem_ajuda_tar_casa" cols="30" rows="4" class="quem_ajuda_tar_casa form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Como se comporta na sala?</legend>
                    <span class="addcomo_se_comporta_na_sala"></span>
                    <textarea name="addcomo_se_comporta_na_sala" id="addcomo_se_comporta_na_sala" cols="30" rows="4" class="como_se_comporta_na_sala form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>O que a família pensa da escola?</legend>
                    <span class="addoque_familia_pensa_da_escola"></span>
                    <textarea name="addoque_familia_pensa_da_escola" id="addoque_familia_pensa_da_escola" cols="30" rows="4" class="oque_familia_pensa_da_escola form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>O que a família pensa da professora?</legend>
                    <span class="addoque_familia_pensa_da_professora"></span>
                    <textarea name="addoque_familia_pensa_da_professora" id="addoque_familia_pensa_da_professora" cols="30" rows="4" class="oque_familia_pensa_da_professora form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Outras informações</legend>
                    <span class="addoutras_informacoes"></span>
                    <textarea name="addoutras_informacoes" id="addoutras_informacoes" cols="30" rows="10" class="outras_informacoes form-control"></textarea> 
                </fieldset>
                 <fieldset>
                    <legend>Entrevistador</legend>
                    <div class="col-md-12">
                    <span class="addentrevistador"></span>
                    <input type="text" name="addentrevistador" id="addentrevistador" class="entrevistador form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_anamnese_desenvolvimento_btn"><img id="imgaddanamnese_desenvolvimento" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddAnamnese_Desenvolvimento -->

<!-- Inicio EditAnamnese_Desenvolvimento -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditAnamnese_Desenvolvimento" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_desenvolvimento" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_desenvolvimento" style="color: white;">Anamnese Desenvolvimento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_desenvolvimento" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_desenvolvimento">
                <input type="hidden" id="editatendimentoid_desenvolvimento">
                <ul id="updateform_errlist_desenvolvimento"></ul>
                <fieldset>
                    <legend>Alimentação: como foi o aleitamento desde o nascimento até o desmame? E as reações à instrodução de outros tipos de alimentos?</legend>                                 
                    <span class="editalimentacao_aleitamento_reacoes"></span>
                    <textarea name="editalimentacao_aleitamento_reacoes" id="editalimentacao_aleitamento_reacoes" cols="30" rows="10" class="alimentacao_aleitamento_reacoes form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Teve ou tem problema para mastigar e/ou engolir?</legend>
                    <span class="editproblema_para_mastigar"></span>
                    <textarea name="editproblema_para_mastigar" id="editproblema_para_mastigar" cols="30" rows="5" class="problema_para_mastigar form-control"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Hábitos alimentares da criança (quantas refeições por dia, o que come, o que prefere, come muito, come pouco, foi ou é forçado a comer?)</legend>                                        
                    <span class="edithabitos_alimentares"></span>
                    <textarea name="edithabitos_alimentares" id="edithabitos_alimentares" cols="30" rows="5" class="habitos_alimentares form-control"></textarea>                    
                </fieldset>
                <fieldset>
                    <legend>Idade em que sustentou a cabeça?</legend>                    
                    <div class="col-md-4">
                    <span class="editidade_sust_cabeca"></span>
                    <input type="text" name="editidade_sust_cabeca" id="editidade_sust_cabeca" class="idade_sust_cabeca form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando sentou sozinha? (idade)</legend>
                    <div class="col-md-4">
                    <span class="editqdo_sentou_sozinha"></span>
                    <input type="text" name="editqdo_sentou_sozinha" id="editqdo_sentou_sozinha" class="qdo_sentou_sozinha form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Engatinhou? Quando? (idade)</legend>                    
                    <div class="col-md-4">
                    <span class="editengatinhou_quando"></span>
                    <input type="text" name="editengatinhou_quando" id="editengatinhou_quando" class="engatinhou_quando form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando andou? (idade)</legend>
                    <div class="col-md-4">
                    <span class="editquando_andou"></span>
                    <input type="text" name="editquando_andou" id="editquando_andou" class="quando_andou form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Anda adequadamente?</legend>
                    <div class="col-md-8">
                    <span class="editanda_adequadamente"></span>
                    <input type="text" name="editanda_adequadamente" id="editanda_adequadamente" class="anda_adequadamente form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando controlou os esfíncteres?</legend>
                    <div class="col-md-12">
                    <span class="editqdo_controlou_os_esfincteres"></span>
                    <input type="text" name="editqdo_controlou_os_esfincteres" id="editqdo_controlou_os_esfincteres" class="qdo_controlou_os_esfincteres form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Caía muito quando pequena?</legend>
                    <div class="col-md-12">
                    <span class="editcaiamuito_qdopequena"></span>
                    <input type="text" name="editcaiamuito_qdopequena" id="editcaiamuito_qdopequena" class="caiamuito_qdopequena form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Em que idade se deu o balbucio? (idade)</legend>
                    <div class="col-md-4">
                    <span class="editque_idade_se_deu_balbucio"></span>
                    <input type="text" name="editque_idade_se_deu_balbucio" id="editque_idade_se_deu_balbucio" class="que_idade_se_deu_balbucio form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando falou as primeiras palavras? (idade)</legend>
                    <div class="col-md-4">
                    <span class="editqdo_falou_primpalavras"></span>
                    <input type="text" name="editqdo_falou_primpalavras" id="editqdo_falou_primpalavras" class="qdo_falou_primpalavras form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando falou as primeiras frases? (idade)</legend>
                    <div class="col-md-4">
                    <span class="editqdo_falou_primfrases"></span>
                    <input type="text" name="editqdo_falou_primfrases" id="editqdo_falou_primfrases" class="qdo_falou_primfrases form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Apresenta algum problema de linguagem?</legend>
                    <div class="col-md-4">
                    <span class="editapres_prob_linguagem"></span>
                    <input type="text" name="editapres_prob_linguagem" id="editapres_prob_linguagem" class="apres_prob_linguagem form-control" size="30" maxlength="30">
                    </div>
                </fieldset>
                 <fieldset>
                    <legend>Apresenta gagueira?</legend>
                    <span class="editapres_gagueira"></span>
                    <textarea name="editapres_gagueira" id="editapres_gagueira" cols="30" rows="5" class="apres_gagueira form-control"></textarea>                    
                </fieldset>
                <fieldset>
                    <legend>Como é o sono?</legend>
                    <div class="form-group">
                                <label for="editcalmo">
                                <input type="checkbox" class="calmo checkbox" name="editcalmo" id="editcalmo"> Calmo.</label>
                    </div>                
                    <div class="form-group">
                                <label for="editsua_qd_dorme">
                                <input type="checkbox" class="sua_qd_dorme checkbox" name="editsua_qd_dorme" id="editsua_qd_dorme"> Sua quando dorme.</label>
                    </div>                                   
                    <div class="form-group">
                                <label for="editsonambulismo">
                                <input type="checkbox" class="sonambulismo checkbox" name="editsonambulismo" id="editsonambulismo"> Sonambulismo.</label>
                    </div>                
                    <div class="form-group">
                                <label for="editagitado">
                                <input type="checkbox" class="agitado checkbox" name="editagitado" id="editagitado"> Agitado.</label>
                    </div>
                    <div class="form-group">
                                <label for="editfala_dormindo">
                                <input type="checkbox" class="fala_dormindo checkbox" name="editfala_dormindo" id="editfala_dormindo"> Fala dormindo.</label>
                    </div>
                    <div class="form-group">
                                <label for="editrange_os_dentes">
                                <input type="checkbox" class="range_os_dentes checkbox" name="editrange_os_dentes" id="editrange_os_dentes"> Range os dentes.</label>
                    </div>
                    <div class="form-group">
                                <label for="editbaba_qdo_dorme">
                                <input type="checkbox" class="baba_qdo_dorme checkbox" name="editbaba_qdo_dorme" id="editbaba_qdo_dorme"> Baba quando dorme.</label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>A que horas costuma dormir à noite?</legend>
                    <div class="col-md-4">
                    <span class="edita_que_h_cost_dormir_a_noite"></span>
                    <input type="text" name="edita_que_h_cost_dormir_a_noite" id="edita_que_h_cost_dormir_a_noite" class="a_que_h_cost_dormir_a_noite form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Dorme durante o dia?</legend>
                    <div class="col-md-4">
                    <span class="editdorme_durante_o_dia"></span>
                    <input type="text" name="editdorme_durante_o_dia" id="editdorme_durante_o_dia" class="dorme_durante_o_dia form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Tem hábitos diferenciados antes de dormir?</legend>
                    <div class="col-md-4">
                    <span class="edittem_hab_dif_antes_dormir"></span>
                    <input type="text" name="edittem_hab_dif_antes_dormir" id="edittem_hab_dif_antes_dormir" class="tem_hab_dif_antes_dormir form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Dorme em cama separada?</legend>
                    <div class="col-md-12">
                    <span class="editdorme_cama_sep"></span>
                    <input type="text" name="editdorme_cama_sep" id="editdorme_cama_sep" class="dorme_cama_sep form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>                     
                    <legend>Usou chupeta?</legend>
                    <div class="form-group">
                                <label for="editusos_chupeta">
                                <input type="checkbox" class="usos_chupeta checkbox" name="editusos_chupeta" id="editusos_chupeta"> Sim.</label>
                    <div class="col-md-4">
                    <span class="editusos_chupeta_ate_quando"></span>
                    <label for="editusos_chupeta_ate_quando">Até quando? (idade)</label>
                    <input type="text" name="editusos_chupeta_ate_quando" id="editusos_chupeta_ate_quando" class="usos_chupeta_ate_quando form-control" size="20" maxlength="20">
                    </div>
                    </div>  
                </fieldset>
                <fieldset>                     
                    <legend>Chupou dedo?</legend>
                    <div class="form-group">
                                <label for="editchupou_dedo">
                                <input type="checkbox" class="chupou_dedo checkbox" name="editchupou_dedo" id="editchupou_dedo"> Sim.</label>
                    <div class="col-md-4">
                    <span class="editchupou_dedo_ate_quando"></span>
                    <label for="editchupou_dedo_ate_quando">Até quando? (idade)</label>
                    <input type="text" name="editchupou_dedo_ate_quando" id="editchupou_dedo_ate_quando" class="chupou_dedo_ate_quando form-control" size="20" maxlength="20">
                    </div>
                    </div>  
                </fieldset>
                <fieldset>                     
                    <legend>Roeu unha?</legend>
                    <div class="form-group">
                                <label for="editroeu_unha">
                                <input type="checkbox" class="roeu_unha checkbox" name="editroeu_unha" id="editroeu_unha"> Sim.</label>
                    <div class="col-md-4">
                    <span class="editroeu_unha_ate_quando"></span>
                    <label for="editroeu_unha_ate_quando">Até quando? (idade)</label>
                    <input type="text" name="editroeu_unha_ate_quando" id="editroeu_unha_ate_quando" class="roeu_unha_ate_quando form-control" size="20" maxlength="20">
                    </div>
                    </div>  
                </fieldset>
                <fieldset>                     
                    <legend>Teve ou tem tiques?</legend>
                    <div class="form-group">
                                <label for="editteveoutem_tiques">
                                <input type="checkbox" class="teveoutem_tiques checkbox" name="editteveoutem_tiques" id="editteveoutem_tiques"> Sim.</label>
                    <div class="col-md-8">
                    <span class="editteveoutem_tiques_quais"></span>
                    <label for="editteveoutem_tiques_quais">Quais?</label>
                    <input type="text" name="editteveoutem_tiques_quais" id="editteveoutem_tiques_quais" class="teveoutem_tiques_quais form-control" size="30" maxlength="30">
                    </div>
                    </div>  
                </fieldset>
                <fieldset>
                    <legend>Relacionamento familiar</legend>
                    <div class="col-md-12">
                    <span class="editrelacionamento_familiar"></span>
                    <input type="text" name="editrelacionamento_familiar" id="editrelacionamento_familiar" class="relacionamento_familiar form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Com quem e onde fica a criança?</legend>
                    <div class="col-md-12">
                    <span class="editcom_quem_e_ondeficacrianca"></span>
                    <input type="text" name="editcom_quem_e_ondeficacrianca" id="editcom_quem_e_ondeficacrianca" class="com_quem_e_ondeficacrianca form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Tem amigos?</legend>
                    <div class="col-md-12">
                    <span class="edittem_amigos"></span>
                    <input type="text" name="edittem_amigos" id="edittem_amigos" class="tem_amigos form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Assiste TV? (posição, tempo, programação)</legend>
                    <div class="col-md-12">
                    <span class="editassiste_tv"></span>
                    <input type="text" name="editassiste_tv" id="editassiste_tv" class="assiste_tv form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Gosta de música? (preferências)</legend>
                    <div class="col-md-12">
                    <span class="editgosta_de_musica"></span>
                    <input type="text" name="editgosta_de_musica" id="editgosta_de_musica" class="gosta_de_musica form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Passeios, locais que frequenta.</legend>
                    <div class="col-md-12">
                    <span class="editpasseios_locais_freq"></span>
                    <input type="text" name="editpasseios_locais_freq" id="editpasseios_locais_freq" class="passeios_locais_freq form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Brincar (como, posição, nível de atenção, brinquedos preferidos)</legend>
                    <span class="editbrincar"></span>
                    <textarea name="editbrincar" id="editbrincar" cols="30" rows="4" class="brincar form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Comportamento (humor, birras, medos)</legend>
                    <span class="editcomportamento"></span>
                    <textarea name="editcomportamento" id="editcomportamento" cols="30" rows="4" class="comportamento form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Higiene</legend>
                    <span class="edithigiene"></span>
                    <textarea name="edithigiene" id="edithigiene" cols="30" rows="4" class="higiene form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Banho</legend>
                    <span class="editbanho"></span>
                    <textarea name="editbanho" id="editbanho" cols="30" rows="4" class="banho form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Vestir e despir</legend>
                    <span class="editvestir_e_despir"></span>
                    <textarea name="editvestir_e_despir" id="editvestir_e_despir" cols="30" rows="4" class="vestir_e_despir form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Escolaridade: nome, horário e série</legend>
                    <span class="editnome_horario_serie"></span>
                    <textarea name="editnome_horario_serie" id="editnome_horario_serie" cols="30" rows="2" class="nome_horario_serie form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Histórico escolar</legend>
                    <span class="edithistorico_escolar"></span>
                    <textarea name="edithistorico_escolar" id="edithistorico_escolar" cols="30" rows="4" class="historico_escolar form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Queixa principal da escola</legend>
                    <span class="editqueixa_principal_da_escola"></span>
                    <textarea name="editqueixa_principal_da_escola" id="editqueixa_principal_da_escola" cols="30" rows="4" class="queixa_principal_da_escola form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Gosta da professora?</legend>
                    <span class="editgosta_da_professora"></span>
                    <textarea name="editgosta_da_professora" id="editgosta_da_professora" cols="30" rows="2" class="gosta_da_professora form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Quem ajuda nas tarefas de casa?</legend>
                    <span class="editquem_ajuda_tar_casa"></span>
                    <textarea name="editquem_ajuda_tar_casa" id="editquem_ajuda_tar_casa" cols="30" rows="4" class="quem_ajuda_tar_casa form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Como se comporta na sala?</legend>
                    <span class="editcomo_se_comporta_na_sala"></span>
                    <textarea name="editcomo_se_comporta_na_sala" id="editcomo_se_comporta_na_sala" cols="30" rows="4" class="como_se_comporta_na_sala form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>O que a família pensa da escola?</legend>
                    <span class="editoque_familia_pensa_da_escola"></span>
                    <textarea name="editoque_familia_pensa_da_escola" id="editoque_familia_pensa_da_escola" cols="30" rows="4" class="oque_familia_pensa_da_escola form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>O que a família pensa da professora?</legend>
                    <span class="editoque_familia_pensa_da_professora"></span>
                    <textarea name="editoque_familia_pensa_da_professora" id="editoque_familia_pensa_da_professora" cols="30" rows="4" class="oque_familia_pensa_da_professora form-control"></textarea> 
                </fieldset>
                <fieldset>
                    <legend>Outras informações</legend>
                    <span class="editoutras_informacoes"></span>
                    <textarea name="editoutras_informacoes" id="editoutras_informacoes" cols="30" rows="10" class="outras_informacoes form-control"></textarea> 
                </fieldset>
                 <fieldset>
                    <legend>Entrevistador</legend>
                    <div class="col-md-12">
                    <span class="editentrevistador"></span>
                    <input type="text" name="editentrevistador" id="editentrevistador" class="entrevistador form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_anamnese_desenvolvimento_btn"><img id="imgeditanamnese_desenvolvimento" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditAnamnese_Desenvolvimento -->

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
                                        <li class="dropdown-item bg-light"><a href="#" class="anamnese_desenvolvimento dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
                                            @if($count_anamnese_desenvolvimento)<i data-id="1" id="anamnese_desenvolvimento{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="anamnese_desenvolvimento{{$atendimento->id}}"></i>@endif Desenvolvimento</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-none dropdown-toggle bg-light" data-toggle="dropdown" aria-expanded="false">História do desenvolvimento</button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item bg-light"><a href="#" class="histdes_versaopais_inicial dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
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
                                <input type="text" maxLength="10" name="adddata" id="adddata" class="adddata form-control" data-format="00/00/0000"  placeholder="dd/mm/yyyy" value="{{date('d/m/Y', strtotime($atendimento->data_atendimento))}}"/>                                 
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
                        loading.hide();
                 }else if(response.status==401){
                      $('#saveform_errList').replaceWith('<ul id="saveform_errList"></ul>');
                      $('#saveform_errList').addClass('alert alert-danger');
                      $('#saveform_errList').text(response.message);
                      loading.hide();
                }else{
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


    //colorindo o input datepicker

     $(document).on('click','#adddata',function(e){
        e.preventDefault;
        
        var tipoatendimento = $("#idtipoatendimento").val();
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
            url : '/ceteaadmin/terapia/diascolorir/'+tipoatendimento,
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
    
 
    //fim colorindo o datepicker


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

//inicio anamnese do desenvolvimento

$("#AddAnamnese_Desenvolvimento").on('shown.bs.modal',function(){
            $(".alimentacao_aleitamento_reacoes").focus();
    });

    $("#EditAnamnese_Desenvolvimento").on('shown.bs.modal',function(){
            $(".alimentacao_aleitamento_reacoes").focus();
    });

//inicio conta caracteres dos textarea anamnese_desenvolvimento

    //add

    $(document).on('input','#addalimentacao_aleitamento_reacoes',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var alimentacao_aleitamento_reacoes = $('textarea[name="addalimentacao_aleitamento_reacoes"]').val();
            $('textarea[name="addalimentacao_aleitamento_reacoes"]').val(alimentacao_aleitamento_reacoes.substr(0,limite));
            $(".addalimentacao_aleitamento_reacoes").text("0" + " " + informativo);
        }else{
            $(".addalimentacao_aleitamento_reacoes").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addproblema_para_mastigar',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var problema_para_mastigar = $('textarea[name="addproblema_para_mastigar"]').val();
            $('textarea[name="addproblema_para_mastigar"]').val(problema_para_mastigar.substr(0,limite));
            $(".addproblema_para_mastigar").text("0" + " " + informativo);
        }else{
            $(".addproblema_para_mastigar").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addhabitos_alimentares',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var habitos_alimentares = $('textarea[name="addhabitos_alimentares"]').val();
            $('textarea[name="addhabitos_alimentares"]').val(habitos_alimentares.substr(0,limite));
            $(".addhabitos_alimentares").text("0" + " " + informativo);
        }else{
            $(".addhabitos_alimentares").text(caracteresRestantes + " " + informativo);
        }
    });

     $(document).on('input','#addidade_sust_cabeca',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var idade_sust_cabeca = $('input[name="addidade_sust_cabeca"]').val();
            $('input[name="addidade_sust_cabeca"]').val(idade_sust_cabeca.substr(0,limite));
            $(".addidade_sust_cabeca").text("0" + " " + informativo);
        }else{
            $(".addidade_sust_cabeca").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addqdo_sentou_sozinha',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var qdo_sentou_sozinha = $('input[name="addqdo_sentou_sozinha"]').val();
            $('input[name="addqdo_sentou_sozinha"]').val(qdo_sentou_sozinha.substr(0,limite));
            $(".addqdo_sentou_sozinha").text("0" + " " + informativo);
        }else{
            $(".addqdo_sentou_sozinha").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addengatinhou_quando',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var engatinhou_quando = $('input[name="addengatinhou_quando"]').val();
            $('input[name="addengatinhou_quando"]').val(engatinhou_quando.substr(0,limite));
            $(".addengatinhou_quando").text("0" + " " + informativo);
        }else{
            $(".addengatinhou_quando").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addquando_andou',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var quando_andou = $('input[name="addquando_andou"]').val();
            $('input[name="addquando_andou"]').val(quando_andou.substr(0,limite));
            $(".addquando_andou").text("0" + " " + informativo);
        }else{
            $(".addquando_andou").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addanda_adequadamente',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var anda_adequadamente = $('input[name="addanda_adequadamente"]').val();
            $('input[name="addanda_adequadamente"]').val(anda_adequadamente.substr(0,limite));
            $(".addanda_adequadamente").text("0" + " " + informativo);
        }else{
            $(".addanda_adequadamente").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addqdo_controlou_os_esfincteres',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var qdo_controlou_os_esfincteres = $('input[name="addqdo_controlou_os_esfincteres"]').val();
            $('input[name="addqdo_controlou_os_esfincteres"]').val(qdo_controlou_os_esfincteres.substr(0,limite));
            $(".addqdo_controlou_os_esfincteres").text("0" + " " + informativo);
        }else{
            $(".addqdo_controlou_os_esfincteres").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addcaiamuito_qdopequena',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var caiamuito_qdopequena = $('input[name="addcaiamuito_qdopequena"]').val();
            $('input[name="addcaiamuito_qdopequena"]').val(caiamuito_qdopequena.substr(0,limite));
            $(".addcaiamuito_qdopequena").text("0" + " " + informativo);
        }else{
            $(".addcaiamuito_qdopequena").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addque_idade_se_deu_balbucio',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var que_idade_se_deu_balbucio = $('input[name="addque_idade_se_deu_balbucio"]').val();
            $('input[name="addque_idade_se_deu_balbucio"]').val(que_idade_se_deu_balbucio.substr(0,limite));
            $(".addque_idade_se_deu_balbucio").text("0" + " " + informativo);
        }else{
            $(".addque_idade_se_deu_balbucio").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addqdo_falou_primpalavras',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var qdo_falou_primpalavras = $('input[name="addqdo_falou_primpalavras"]').val();
            $('input[name="addqdo_falou_primpalavras"]').val(qdo_falou_primpalavras.substr(0,limite));
            $(".addqdo_falou_primpalavras").text("0" + " " + informativo);
        }else{
            $(".addqdo_falou_primpalavras").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addqdo_falou_primfrases',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var qdo_falou_primfrases = $('input[name="addqdo_falou_primfrases"]').val();
            $('input[name="addqdo_falou_primfrases"]').val(qdo_falou_primfrases.substr(0,limite));
            $(".addqdo_falou_primfrases").text("0" + " " + informativo);
        }else{
            $(".addqdo_falou_primfrases").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addapres_prob_linguagem',function(){
        var limite = 30;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var apres_prob_linguagem = $('input[name="addapres_prob_linguagem"]').val();
            $('input[name="addapres_prob_linguagem"]').val(apres_prob_linguagem.substr(0,limite));
            $(".addapres_prob_linguagem").text("0" + " " + informativo);
        }else{
            $(".addapres_prob_linguagem").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addapres_gagueira',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var apres_gagueira = $('textarea[name="addapres_gagueira"]').val();
            $('textarea[name="addapres_gagueira"]').val(apres_gagueira.substr(0,limite));
            $(".addapres_gagueira").text("0" + " " + informativo);
        }else{
            $(".addapres_gagueira").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#adda_que_h_cost_dormir_a_noite',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var a_que_h_cost_dormir_a_noite = $('input[name="adda_que_h_cost_dormir_a_noite"]').val();
            $('input[name="adda_que_h_cost_dormir_a_noite"]').val(a_que_h_cost_dormir_a_noite.substr(0,limite));
            $(".adda_que_h_cost_dormir_a_noite").text("0" + " " + informativo);
        }else{
            $(".adda_que_h_cost_dormir_a_noite").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#adddorme_durante_o_dia',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var dorme_durante_o_dia = $('input[name="adddorme_durante_o_dia"]').val();
            $('input[name="adddorme_durante_o_dia"]').val(dorme_durante_o_dia.substr(0,limite));
            $(".adddorme_durante_o_dia").text("0" + " " + informativo);
        }else{
            $(".adddorme_durante_o_dia").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addtem_hab_dif_antes_dormir',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var tem_hab_dif_antes_dormir = $('input[name="addtem_hab_dif_antes_dormir"]').val();
            $('input[name="addtem_hab_dif_antes_dormir"]').val(tem_hab_dif_antes_dormir.substr(0,limite));
            $(".addtem_hab_dif_antes_dormir").text("0" + " " + informativo);
        }else{
            $(".addtem_hab_dif_antes_dormir").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#adddorme_cama_sep',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var dorme_cama_sep = $('input[name="adddorme_cama_sep"]').val();
            $('input[name="adddorme_cama_sep"]').val(dorme_cama_sep.substr(0,limite));
            $(".adddorme_cama_sep").text("0" + " " + informativo);
        }else{
            $(".adddorme_cama_sep").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addusos_chupeta_ate_quando',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var usos_chupeta_ate_quando = $('input[name="addusos_chupeta_ate_quando"]').val();
            $('input[name="addusos_chupeta_ate_quando"]').val(usos_chupeta_ate_quando.substr(0,limite));
            $(".addusos_chupeta_ate_quando").text("0" + " " + informativo);
        }else{
            $(".addusos_chupeta_ate_quando").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addchupou_dedo_ate_quando',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var chupou_dedo_ate_quando = $('input[name="addchupou_dedo_ate_quando"]').val();
            $('input[name="addchupou_dedo_ate_quando"]').val(chupou_dedo_ate_quando.substr(0,limite));
            $(".addchupou_dedo_ate_quando").text("0" + " " + informativo);
        }else{
            $(".addchupou_dedo_ate_quando").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addroeu_unha_ate_quando',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var roeu_unha_ate_quando = $('input[name="addroeu_unha_ate_quando"]').val();
            $('input[name="addroeu_unha_ate_quando"]').val(roeu_unha_ate_quando.substr(0,limite));
            $(".addroeu_unha_ate_quando").text("0" + " " + informativo);
        }else{
            $(".addroeu_unha_ate_quando").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addteveoutem_tiques_quais',function(){
        var limite = 30;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var teveoutem_tiques_quais = $('input[name="addteveoutem_tiques_quais"]').val();
            $('input[name="addteveoutem_tiques_quais"]').val(teveoutem_tiques_quais.substr(0,limite));
            $(".addteveoutem_tiques_quais").text("0" + " " + informativo);
        }else{
            $(".addteveoutem_tiques_quais").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addrelacionamento_familiar',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var relacionamento_familiar = $('input[name="addrelacionamento_familiar"]').val();
            $('input[name="addrelacionamento_familiar"]').val(relacionamento_familiar.substr(0,limite));
            $(".addrelacionamento_familiar").text("0" + " " + informativo);
        }else{
            $(".addrelacionamento_familiar").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addcom_quem_e_ondeficacrianca',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var com_quem_e_ondeficacrianca = $('input[name="addcom_quem_e_ondeficacrianca"]').val();
            $('input[name="addcom_quem_e_ondeficacrianca"]').val(com_quem_e_ondeficacrianca.substr(0,limite));
            $(".addcom_quem_e_ondeficacrianca").text("0" + " " + informativo);
        }else{
            $(".addcom_quem_e_ondeficacrianca").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addtem_amigos',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var tem_amigos = $('input[name="addtem_amigos"]').val();
            $('input[name="addtem_amigos"]').val(tem_amigos.substr(0,limite));
            $(".addtem_amigos").text("0" + " " + informativo);
        }else{
            $(".addtem_amigos").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addassiste_tv',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var assiste_tv = $('input[name="addassiste_tv"]').val();
            $('input[name="addassiste_tv"]').val(assiste_tv.substr(0,limite));
            $(".addassiste_tv").text("0" + " " + informativo);
        }else{
            $(".addassiste_tv").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addgosta_de_musica',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var gosta_de_musica = $('input[name="addgosta_de_musica"]').val();
            $('input[name="addgosta_de_musica"]').val(gosta_de_musica.substr(0,limite));
            $(".addgosta_de_musica").text("0" + " " + informativo);
        }else{
            $(".addgosta_de_musica").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addpasseios_locais_freq',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var passeios_locais_freq = $('input[name="addpasseios_locais_freq"]').val();
            $('input[name="addpasseios_locais_freq"]').val(passeios_locais_freq.substr(0,limite));
            $(".addpasseios_locais_freq").text("0" + " " + informativo);
        }else{
            $(".addpasseios_locais_freq").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addbrincar',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var brincar = $('textarea[name="addbrincar"]').val();
            $('textarea[name="addbrincar"]').val(brincar.substr(0,limite));
            $(".addbrincar").text("0" + " " + informativo);
        }else{
            $(".addbrincar").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addcomportamento',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var comportamento = $('textarea[name="addcomportamento"]').val();
            $('textarea[name="addcomportamento"]').val(comportamento.substr(0,limite));
            $(".addcomportamento").text("0" + " " + informativo);
        }else{
            $(".addcomportamento").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addhigiene',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var higiene = $('textarea[name="addhigiene"]').val();
            $('textarea[name="addhigiene"]').val(higiene.substr(0,limite));
            $(".addhigiene").text("0" + " " + informativo);
        }else{
            $(".addhigiene").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addbanho',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var banho = $('textarea[name="addbanho"]').val();
            $('textarea[name="addbanho"]').val(banho.substr(0,limite));
            $(".addbanho").text("0" + " " + informativo);
        }else{
            $(".addbanho").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addvestir_e_despir',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var vestir_e_despir = $('textarea[name="addvestir_e_despir"]').val();
            $('textarea[name="addvestir_e_despir"]').val(vestir_e_despir.substr(0,limite));
            $(".addvestir_e_despir").text("0" + " " + informativo);
        }else{
            $(".addvestir_e_despir").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addnome_horario_serie',function(){
        var limite = 100;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var nome_horario_serie = $('textarea[name="addnome_horario_serie"]').val();
            $('textarea[name="addnome_horario_serie"]').val(nome_horario_serie.substr(0,limite));
            $(".addnome_horario_serie").text("0" + " " + informativo);
        }else{
            $(".addnome_horario_serie").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addhistorico_escolar',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var historico_escolar = $('textarea[name="addhistorico_escolar"]').val();
            $('textarea[name="addhistorico_escolar"]').val(historico_escolar.substr(0,limite));
            $(".addhistorico_escolar").text("0" + " " + informativo);
        }else{
            $(".addhistorico_escolar").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addqueixa_principal_da_escola',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var queixa_principal_da_escola = $('textarea[name="addqueixa_principal_da_escola"]').val();
            $('textarea[name="addqueixa_principal_da_escola"]').val(queixa_principal_da_escola.substr(0,limite));
            $(".addqueixa_principal_da_escola").text("0" + " " + informativo);
        }else{
            $(".addqueixa_principal_da_escola").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addgosta_da_professora',function(){
        var limite = 100;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var gosta_da_professora = $('textarea[name="addgosta_da_professora"]').val();
            $('textarea[name="addgosta_da_professora"]').val(gosta_da_professora.substr(0,limite));
            $(".addgosta_da_professora").text("0" + " " + informativo);
        }else{
            $(".addgosta_da_professora").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addquem_ajuda_tar_casa',function(){
        var limite = 100;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var quem_ajuda_tar_casa = $('textarea[name="addquem_ajuda_tar_casa"]').val();
            $('textarea[name="addquem_ajuda_tar_casa"]').val(quem_ajuda_tar_casa.substr(0,limite));
            $(".addquem_ajuda_tar_casa").text("0" + " " + informativo);
        }else{
            $(".addquem_ajuda_tar_casa").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addcomo_se_comporta_na_sala',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var como_se_comporta_na_sala = $('textarea[name="addcomo_se_comporta_na_sala"]').val();
            $('textarea[name="addcomo_se_comporta_na_sala"]').val(como_se_comporta_na_sala.substr(0,limite));
            $(".addcomo_se_comporta_na_sala").text("0" + " " + informativo);
        }else{
            $(".addcomo_se_comporta_na_sala").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addoque_familia_pensa_da_escola',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var oque_familia_pensa_da_escola = $('textarea[name="addoque_familia_pensa_da_escola"]').val();
            $('textarea[name="addoque_familia_pensa_da_escola"]').val(oque_familia_pensa_da_escola.substr(0,limite));
            $(".addoque_familia_pensa_da_escola").text("0" + " " + informativo);
        }else{
            $(".addoque_familia_pensa_da_escola").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addoque_familia_pensa_da_professora',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var oque_familia_pensa_da_professora = $('textarea[name="addoque_familia_pensa_da_professora"]').val();
            $('textarea[name="addoque_familia_pensa_da_professora"]').val(oque_familia_pensa_da_professora.substr(0,limite));
            $(".addoque_familia_pensa_da_professora").text("0" + " " + informativo);
        }else{
            $(".addoque_familia_pensa_da_professora").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addoutras_informacoes',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var outras_informacoes = $('textarea[name="addoutras_informacoes"]').val();
            $('textarea[name="addoutras_informacoes"]').val(outras_informacoes.substr(0,limite));
            $(".addoutras_informacoes").text("0" + " " + informativo);
        }else{
            $(".addoutras_informacoes").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addentrevistador',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var entrevistador = $('input[name="addentrevistador"]').val();
            $('input[name="addentrevistador"]').val(entrevistador.substr(0,limite));
            $(".addentrevistador").text("0" + " " + informativo);
        }else{
            $(".addentrevistador").text(caracteresRestantes + " " + informativo);
        }
    });


    //edit

     $(document).on('input','#editalimentacao_aleitamento_reacoes',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var alimentacao_aleitamento_reacoes = $('textarea[name="editalimentacao_aleitamento_reacoes"]').val();
            $('textarea[name="editalimentacao_aleitamento_reacoes"]').val(alimentacao_aleitamento_reacoes.substr(0,limite));
            $(".editalimentacao_aleitamento_reacoes").text("0" + " " + informativo);
        }else{
            $(".editalimentacao_aleitamento_reacoes").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editproblema_para_mastigar',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var problema_para_mastigar = $('textarea[name="editproblema_para_mastigar"]').val();
            $('textarea[name="editproblema_para_mastigar"]').val(problema_para_mastigar.substr(0,limite));
            $(".editproblema_para_mastigar").text("0" + " " + informativo);
        }else{
            $(".editproblema_para_mastigar").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edithabitos_alimentares',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var habitos_alimentares = $('textarea[name="edithabitos_alimentares"]').val();
            $('textarea[name="edithabitos_alimentares"]').val(habitos_alimentares.substr(0,limite));
            $(".edithabitos_alimentares").text("0" + " " + informativo);
        }else{
            $(".edithabitos_alimentares").text(caracteresRestantes + " " + informativo);
        }
    });

     $(document).on('input','#editidade_sust_cabeca',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var idade_sust_cabeca = $('input[name="editidade_sust_cabeca"]').val();
            $('input[name="editidade_sust_cabeca"]').val(idade_sust_cabeca.substr(0,limite));
            $(".editidade_sust_cabeca").text("0" + " " + informativo);
        }else{
            $(".editidade_sust_cabeca").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editqdo_sentou_sozinha',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var qdo_sentou_sozinha = $('input[name="editqdo_sentou_sozinha"]').val();
            $('input[name="editqdo_sentou_sozinha"]').val(qdo_sentou_sozinha.substr(0,limite));
            $(".editqdo_sentou_sozinha").text("0" + " " + informativo);
        }else{
            $(".editqdo_sentou_sozinha").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editengatinhou_quando',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var engatinhou_quando = $('input[name="editengatinhou_quando"]').val();
            $('input[name="editengatinhou_quando"]').val(engatinhou_quando.substr(0,limite));
            $(".editengatinhou_quando").text("0" + " " + informativo);
        }else{
            $(".editengatinhou_quando").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editquando_andou',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var quando_andou = $('input[name="editquando_andou"]').val();
            $('input[name="editquando_andou"]').val(quando_andou.substr(0,limite));
            $(".editquando_andou").text("0" + " " + informativo);
        }else{
            $(".editquando_andou").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editanda_adequadamente',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var anda_adequadamente = $('input[name="editanda_adequadamente"]').val();
            $('input[name="editanda_adequadamente"]').val(anda_adequadamente.substr(0,limite));
            $(".editanda_adequadamente").text("0" + " " + informativo);
        }else{
            $(".editanda_adequadamente").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editqdo_controlou_os_esfincteres',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var qdo_controlou_os_esfincteres = $('input[name="editqdo_controlou_os_esfincteres"]').val();
            $('input[name="editqdo_controlou_os_esfincteres"]').val(qdo_controlou_os_esfincteres.substr(0,limite));
            $(".editqdo_controlou_os_esfincteres").text("0" + " " + informativo);
        }else{
            $(".editqdo_controlou_os_esfincteres").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editcaiamuito_qdopequena',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var caiamuito_qdopequena = $('input[name="editcaiamuito_qdopequena"]').val();
            $('input[name="editcaiamuito_qdopequena"]').val(caiamuito_qdopequena.substr(0,limite));
            $(".editcaiamuito_qdopequena").text("0" + " " + informativo);
        }else{
            $(".editcaiamuito_qdopequena").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editque_idade_se_deu_balbucio',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var que_idade_se_deu_balbucio = $('input[name="editque_idade_se_deu_balbucio"]').val();
            $('input[name="editque_idade_se_deu_balbucio"]').val(que_idade_se_deu_balbucio.substr(0,limite));
            $(".editque_idade_se_deu_balbucio").text("0" + " " + informativo);
        }else{
            $(".editque_idade_se_deu_balbucio").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editqdo_falou_primpalavras',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var qdo_falou_primpalavras = $('input[name="editqdo_falou_primpalavras"]').val();
            $('input[name="editqdo_falou_primpalavras"]').val(qdo_falou_primpalavras.substr(0,limite));
            $(".editqdo_falou_primpalavras").text("0" + " " + informativo);
        }else{
            $(".editqdo_falou_primpalavras").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editqdo_falou_primfrases',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var qdo_falou_primfrases = $('input[name="editqdo_falou_primfrases"]').val();
            $('input[name="editqdo_falou_primfrases"]').val(qdo_falou_primfrases.substr(0,limite));
            $(".editqdo_falou_primfrases").text("0" + " " + informativo);
        }else{
            $(".editqdo_falou_primfrases").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editapres_prob_linguagem',function(){
        var limite = 30;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var apres_prob_linguagem = $('input[name="editapres_prob_linguagem"]').val();
            $('input[name="editapres_prob_linguagem"]').val(apres_prob_linguagem.substr(0,limite));
            $(".editapres_prob_linguagem").text("0" + " " + informativo);
        }else{
            $(".editapres_prob_linguagem").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editapres_gagueira',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var apres_gagueira = $('textarea[name="editapres_gagueira"]').val();
            $('textarea[name="editapres_gagueira"]').val(apres_gagueira.substr(0,limite));
            $(".editapres_gagueira").text("0" + " " + informativo);
        }else{
            $(".editapres_gagueira").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edita_que_h_cost_dormir_a_noite',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var a_que_h_cost_dormir_a_noite = $('input[name="edita_que_h_cost_dormir_a_noite"]').val();
            $('input[name="edita_que_h_cost_dormir_a_noite"]').val(a_que_h_cost_dormir_a_noite.substr(0,limite));
            $(".edita_que_h_cost_dormir_a_noite").text("0" + " " + informativo);
        }else{
            $(".edita_que_h_cost_dormir_a_noite").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editdorme_durante_o_dia',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var dorme_durante_o_dia = $('input[name="editdorme_durante_o_dia"]').val();
            $('input[name="editdorme_durante_o_dia"]').val(dorme_durante_o_dia.substr(0,limite));
            $(".editdorme_durante_o_dia").text("0" + " " + informativo);
        }else{
            $(".editdorme_durante_o_dia").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edittem_hab_dif_antes_dormir',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var tem_hab_dif_antes_dormir = $('input[name="edittem_hab_dif_antes_dormir"]').val();
            $('input[name="edittem_hab_dif_antes_dormir"]').val(tem_hab_dif_antes_dormir.substr(0,limite));
            $(".edittem_hab_dif_antes_dormir").text("0" + " " + informativo);
        }else{
            $(".edittem_hab_dif_antes_dormir").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editdorme_cama_sep',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var dorme_cama_sep = $('input[name="editdorme_cama_sep"]').val();
            $('input[name="editdorme_cama_sep"]').val(dorme_cama_sep.substr(0,limite));
            $(".editdorme_cama_sep").text("0" + " " + informativo);
        }else{
            $(".editdorme_cama_sep").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editusos_chupeta_ate_quando',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var usos_chupeta_ate_quando = $('input[name="editusos_chupeta_ate_quando"]').val();
            $('input[name="editusos_chupeta_ate_quando"]').val(usos_chupeta_ate_quando.substr(0,limite));
            $(".editusos_chupeta_ate_quando").text("0" + " " + informativo);
        }else{
            $(".editusos_chupeta_ate_quando").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editchupou_dedo_ate_quando',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var chupou_dedo_ate_quando = $('input[name="editchupou_dedo_ate_quando"]').val();
            $('input[name="editchupou_dedo_ate_quando"]').val(chupou_dedo_ate_quando.substr(0,limite));
            $(".editchupou_dedo_ate_quando").text("0" + " " + informativo);
        }else{
            $(".editchupou_dedo_ate_quando").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editroeu_unha_ate_quando',function(){
        var limite = 20;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var roeu_unha_ate_quando = $('input[name="editroeu_unha_ate_quando"]').val();
            $('input[name="editroeu_unha_ate_quando"]').val(roeu_unha_ate_quando.substr(0,limite));
            $(".editroeu_unha_ate_quando").text("0" + " " + informativo);
        }else{
            $(".editroeu_unha_ate_quando").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editteveoutem_tiques_quais',function(){
        var limite = 30;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var teveoutem_tiques_quais = $('input[name="editteveoutem_tiques_quais"]').val();
            $('input[name="editteveoutem_tiques_quais"]').val(teveoutem_tiques_quais.substr(0,limite));
            $(".editteveoutem_tiques_quais").text("0" + " " + informativo);
        }else{
            $(".editteveoutem_tiques_quais").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editrelacionamento_familiar',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var relacionamento_familiar = $('input[name="editrelacionamento_familiar"]').val();
            $('input[name="editrelacionamento_familiar"]').val(relacionamento_familiar.substr(0,limite));
            $(".editrelacionamento_familiar").text("0" + " " + informativo);
        }else{
            $(".editrelacionamento_familiar").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editcom_quem_e_ondeficacrianca',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var com_quem_e_ondeficacrianca = $('input[name="editcom_quem_e_ondeficacrianca"]').val();
            $('input[name="editcom_quem_e_ondeficacrianca"]').val(com_quem_e_ondeficacrianca.substr(0,limite));
            $(".editcom_quem_e_ondeficacrianca").text("0" + " " + informativo);
        }else{
            $(".editcom_quem_e_ondeficacrianca").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edittem_amigos',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var tem_amigos = $('input[name="edittem_amigos"]').val();
            $('input[name="edittem_amigos"]').val(tem_amigos.substr(0,limite));
            $(".edittem_amigos").text("0" + " " + informativo);
        }else{
            $(".edittem_amigos").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editassiste_tv',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var assiste_tv = $('input[name="editassiste_tv"]').val();
            $('input[name="editassiste_tv"]').val(assiste_tv.substr(0,limite));
            $(".editassiste_tv").text("0" + " " + informativo);
        }else{
            $(".editassiste_tv").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editgosta_de_musica',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var gosta_de_musica = $('input[name="editgosta_de_musica"]').val();
            $('input[name="editgosta_de_musica"]').val(gosta_de_musica.substr(0,limite));
            $(".editgosta_de_musica").text("0" + " " + informativo);
        }else{
            $(".editgosta_de_musica").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editpasseios_locais_freq',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var passeios_locais_freq = $('input[name="editpasseios_locais_freq"]').val();
            $('input[name="editpasseios_locais_freq"]').val(passeios_locais_freq.substr(0,limite));
            $(".editpasseios_locais_freq").text("0" + " " + informativo);
        }else{
            $(".editpasseios_locais_freq").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editbrincar',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var brincar = $('textarea[name="editbrincar"]').val();
            $('textarea[name="editbrincar"]').val(brincar.substr(0,limite));
            $(".editbrincar").text("0" + " " + informativo);
        }else{
            $(".editbrincar").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editcomportamento',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var comportamento = $('textarea[name="editcomportamento"]').val();
            $('textarea[name="editcomportamento"]').val(comportamento.substr(0,limite));
            $(".editcomportamento").text("0" + " " + informativo);
        }else{
            $(".editcomportamento").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edithigiene',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var higiene = $('textarea[name="edithigiene"]').val();
            $('textarea[name="edithigiene"]').val(higiene.substr(0,limite));
            $(".edithigiene").text("0" + " " + informativo);
        }else{
            $(".edithigiene").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editbanho',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var banho = $('textarea[name="editbanho"]').val();
            $('textarea[name="editbanho"]').val(banho.substr(0,limite));
            $(".editbanho").text("0" + " " + informativo);
        }else{
            $(".editbanho").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editvestir_e_despir',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var vestir_e_despir = $('textarea[name="editvestir_e_despir"]').val();
            $('textarea[name="editvestir_e_despir"]').val(vestir_e_despir.substr(0,limite));
            $(".editvestir_e_despir").text("0" + " " + informativo);
        }else{
            $(".editvestir_e_despir").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editnome_horario_serie',function(){
        var limite = 100;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var nome_horario_serie = $('textarea[name="editnome_horario_serie"]').val();
            $('textarea[name="editnome_horario_serie"]').val(nome_horario_serie.substr(0,limite));
            $(".editnome_horario_serie").text("0" + " " + informativo);
        }else{
            $(".editnome_horario_serie").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edithistorico_escolar',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var historico_escolar = $('textarea[name="edithistorico_escolar"]').val();
            $('textarea[name="edithistorico_escolar"]').val(historico_escolar.substr(0,limite));
            $(".edithistorico_escolar").text("0" + " " + informativo);
        }else{
            $(".edithistorico_escolar").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editqueixa_principal_da_escola',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var queixa_principal_da_escola = $('textarea[name="editqueixa_principal_da_escola"]').val();
            $('textarea[name="editqueixa_principal_da_escola"]').val(queixa_principal_da_escola.substr(0,limite));
            $(".editqueixa_principal_da_escola").text("0" + " " + informativo);
        }else{
            $(".editqueixa_principal_da_escola").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editgosta_da_professora',function(){
        var limite = 100;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var gosta_da_professora = $('textarea[name="editgosta_da_professora"]').val();
            $('textarea[name="editgosta_da_professora"]').val(gosta_da_professora.substr(0,limite));
            $(".editgosta_da_professora").text("0" + " " + informativo);
        }else{
            $(".editgosta_da_professora").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editquem_ajuda_tar_casa',function(){
        var limite = 100;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var quem_ajuda_tar_casa = $('textarea[name="editquem_ajuda_tar_casa"]').val();
            $('textarea[name="editquem_ajuda_tar_casa"]').val(quem_ajuda_tar_casa.substr(0,limite));
            $(".editquem_ajuda_tar_casa").text("0" + " " + informativo);
        }else{
            $(".editquem_ajuda_tar_casa").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editcomo_se_comporta_na_sala',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var como_se_comporta_na_sala = $('textarea[name="editcomo_se_comporta_na_sala"]').val();
            $('textarea[name="editcomo_se_comporta_na_sala"]').val(como_se_comporta_na_sala.substr(0,limite));
            $(".editcomo_se_comporta_na_sala").text("0" + " " + informativo);
        }else{
            $(".editcomo_se_comporta_na_sala").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editoque_familia_pensa_da_escola',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var oque_familia_pensa_da_escola = $('textarea[name="editoque_familia_pensa_da_escola"]').val();
            $('textarea[name="editoque_familia_pensa_da_escola"]').val(oque_familia_pensa_da_escola.substr(0,limite));
            $(".editoque_familia_pensa_da_escola").text("0" + " " + informativo);
        }else{
            $(".editoque_familia_pensa_da_escola").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editoque_familia_pensa_da_professora',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var oque_familia_pensa_da_professora = $('textarea[name="editoque_familia_pensa_da_professora"]').val();
            $('textarea[name="editoque_familia_pensa_da_professora"]').val(oque_familia_pensa_da_professora.substr(0,limite));
            $(".editoque_familia_pensa_da_professora").text("0" + " " + informativo);
        }else{
            $(".editoque_familia_pensa_da_professora").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editoutras_informacoes',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var outras_informacoes = $('textarea[name="editoutras_informacoes"]').val();
            $('textarea[name="editoutras_informacoes"]').val(outras_informacoes.substr(0,limite));
            $(".editoutras_informacoes").text("0" + " " + informativo);
        }else{
            $(".editoutras_informacoes").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editentrevistador',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var entrevistador = $('input[name="editentrevistador"]').val();
            $('input[name="editentrevistador"]').val(entrevistador.substr(0,limite));
            $(".editentrevistador").text("0" + " " + informativo);
        }else{
            $(".editentrevistador").text(caracteresRestantes + " " + informativo);
        }
    });

    

    //fim conta caracteres dos textarea anamnese_desenvolvimento

$(document).on('click','.anamnese_desenvolvimento',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_anamnesedesenvolvimento = $("#anamnese_desenvolvimento"+atendimentoid).data("id");

        if(opcao_form_anamnesedesenvolvimento==0){
                $("#addpacienteid_desenvolvimento").val(pacienteid);
                $("#addatendimentoid_desenvolvimento").val(atendimentoid);
                $("#addform_desenvolvimento").trigger('reset');
                $("#AddAnamnese_Desenvolvimento").modal('show'); 
                $("#saveform_errList_desenvolvimento").replaceWith('<ul id="saveform_errList_desenvolvimento"></ul>');
        }else{            
                $("#editpacienteid_desenvolvimento").val(pacienteid);
                $("#editatendimentoid_desenvolvimento").val(atendimentoid);
                $("#editform_desenvolvimento").trigger('reset');
                $("#EditAnamnese_Desenvolvimento").modal('show'); 
                $("#updateform_errList_desenvolvimento").replaceWith('<ul id="updateform_errList_desenvolvimento"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_anamnese_desenvolvimento/'+pacienteid,                                
                    success: function(response){           
                        if(response.status==200){                           
                            $(".alimentacao_aleitamento_reacoes").val(response.anamnese_desenvolvimento.a1_alimen_aleitamento_reacoes);
                            $(".problema_para_mastigar").val(response.anamnese_desenvolvimento.a2_problema_para_mastigar);
                            $(".habitos_alimentares").val(response.anamnese_desenvolvimento.a3_habitos_alimentares);
                            $(".idade_sust_cabeca").val(response.anamnese_desenvolvimento.b1_idade_sust_cabeca);
                            $(".qdo_sentou_sozinha").val(response.anamnese_desenvolvimento.b2_qdo_sentou_sozinha);
                            $(".engatinhou_quando").val(response.anamnese_desenvolvimento.b3_engatinhou_quando);
                            $(".quando_andou").val(response.anamnese_desenvolvimento.b4_quando_andou);
                            $(".anda_adequadamente").val(response.anamnese_desenvolvimento.b4_anda_adequadamente);
                            $(".qdo_controlou_os_esfincteres").val(response.anamnese_desenvolvimento.b5_qdo_controlou_os_esfincteres);
                            $(".caiamuito_qdopequena").val(response.anamnese_desenvolvimento.b6_caiamuito_qdopequena);
                            $(".que_idade_se_deu_balbucio").val(response.anamnese_desenvolvimento.c1_que_idade_se_deu_balbucio);
                            $(".qdo_falou_primpalavras").val(response.anamnese_desenvolvimento.c2_qdo_falou_primpalavras);
                            $(".qdo_falou_primfrases").val(response.anamnese_desenvolvimento.c2_qdo_falou_primfrases);
                            $(".apres_prob_linguagem").val(response.anamnese_desenvolvimento.c3_apres_prob_linguagem);
                            $(".apres_gagueira").val(response.anamnese_desenvolvimento.c4_apres_gagueira);
                            $(".calmo").attr('checked',response.anamnese_desenvolvimento.d1_calmo);
                            $(".sua_qd_dorme").attr('checked',response.anamnese_desenvolvimento.d1_sua_dq_dorme);                            
                            $(".sonambulismo").attr('checked',response.anamnese_desenvolvimento.d1_sonambulismo);
                            $(".agitado").attr('checked',response.anamnese_desenvolvimento.d1_agitado);
                            $(".fala_dormindo").attr('checked',response.anamnese_desenvolvimento.d1_fala_dormindo);
                            $(".range_os_dentes").attr('checked',response.anamnese_desenvolvimento.d1_range_os_dentes);
                            $(".baba_qdo_dorme").attr('checked',response.anamnese_desenvolvimento.d1_baba_qdo_dorme);                            
                            $(".a_que_h_cost_dormir_a_noite").val(response.anamnese_desenvolvimento.d2_a_que_h_cost_dormir_a_noite);
                            $(".dorme_durante_o_dia").val(response.anamnese_desenvolvimento.d3_dorme_durante_o_dia);
                            $(".tem_hab_dif_antes_dormir").val(response.anamnese_desenvolvimento.d4_tem_hab_dif_antes_dormir);
                            $(".dorme_cama_sep").val(response.anamnese_desenvolvimento.d5_dorme_cama_sep);
                            $(".usos_chupeta").attr('checked',response.anamnese_desenvolvimento.e1_usos_chupeta);                            
                            $(".usos_chupeta_ate_quando").val(response.anamnese_desenvolvimento.e1_ate_quando);
                            $(".chupou_dedo").attr('checked',response.anamnese_desenvolvimento.e2_chupou_dedo);                            
                            $(".chupou_dedo_ate_quando").val(response.anamnese_desenvolvimento.e2_ate_quando);
                            $(".roeu_unha").attr('checked',response.anamnese_desenvolvimento.e3_roeu_unha);                            
                            $(".roeu_unha_ate_quando").val(response.anamnese_desenvolvimento.e3_ate_quando);
                            $(".teveoutem_tiques").attr('checked',response.anamnese_desenvolvimento.e4_teveoutem_tiques);                            
                            $(".teveoutem_tiques_quais").val(response.anamnese_desenvolvimento.e4_quais);
                            $(".relacionamento_familiar").val(response.anamnese_desenvolvimento.f1_relacionamento_familiar);
                            $(".com_quem_e_ondeficacrianca").val(response.anamnese_desenvolvimento.f2_com_quem_e_ondeficacrianca);
                            $(".tem_amigos").val(response.anamnese_desenvolvimento.f3_tem_amigos);
                            $(".assiste_tv").val(response.anamnese_desenvolvimento.f4_assiste_tv);
                            $(".gosta_de_musica").val(response.anamnese_desenvolvimento.f5_gosta_de_musica);
                            $(".passeios_locais_freq").val(response.anamnese_desenvolvimento.f6_passeios_locais_freq);
                            $(".brincar").val(response.anamnese_desenvolvimento.f7_brincar);
                            $(".comportamento").val(response.anamnese_desenvolvimento.h1_comportamento);
                            $(".higiene").val(response.anamnese_desenvolvimento.h2_higiene);
                            $(".banho").val(response.anamnese_desenvolvimento.h3_banho);
                            $(".vestir_e_despir").val(response.anamnese_desenvolvimento.h4_vestir_e_despir);
                            $(".nome_horario_serie").val(response.anamnese_desenvolvimento.i1_nome_horario_serie);
                            $(".historico_escolar").val(response.anamnese_desenvolvimento.i2_historico_escolar);
                            $(".queixa_principal_da_escola").val(response.anamnese_desenvolvimento.i3_queixa_principal_da_escola);
                            $(".gosta_da_professora").val(response.anamnese_desenvolvimento.i4_gosta_da_professora);
                            $(".quem_ajuda_tar_casa").val(response.anamnese_desenvolvimento.i5_quem_ajuda_tar_casa);
                            $(".como_se_comporta_na_sala").val(response.anamnese_desenvolvimento.i6_como_se_comporta_na_sala);
                            $(".oque_familia_pensa_da_escola").val(response.anamnese_desenvolvimento.i7_oque_familia_pensa_da_escola);
                            $(".oque_familia_pensa_da_professora").val(response.anamnese_desenvolvimento.i8_oque_familia_pensa_professora);
                            $(".outras_informacoes").val(response.anamnese_desenvolvimento.j1_outras_informacoes);
                            $(".entrevistador").val(response.anamnese_desenvolvimento.entrevistador);
                        }      
                    }
                });
        }
    });


    $(document).on('click','.add_anamnese_desenvolvimento_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_desenvolvimento").val();
        var atendimentoid = $("#addatendimentoid_desenvolvimento").val();

        var loading = $("#imgaddanamnese_desenvolvimento");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('alimentacao_aleitamento_reacoes',$(".alimentacao_aleitamento_reacoes").val());
        data.append('problema_para_mastigar',$(".problema_para_mastigar").val());        
        data.append('habitos_alimentares',$(".habitos_alimentares").val());
        data.append('idade_sust_cabeca',$(".idade_sust_cabeca").val());
        data.append('qdo_sentou_sozinha',$(".qdo_sentou_sozinha").val());
        data.append('engatinhou_quando',$(".engatinhou_quando").val());
        data.append('quando_andou',$(".quando_andou").val());
        data.append('anda_adequadamente',$(".anda_adequadamente").val());
        data.append('qdo_controlou_os_esfincteres',$(".qdo_controlou_os_esfincteres").val());
        data.append('caiamuito_qdopequena',$(".caiamuito_qdopequena").val());
        data.append('que_idade_se_deu_balbucio',$(".que_idade_se_deu_balbucio").val());
        data.append('qdo_falou_primpalavras',$(".qdo_falou_primpalavras").val());
        data.append('qdo_falou_primfrases',$(".qdo_falou_primfrases").val());
        data.append('apres_prob_linguagem',$(".apres_prob_linguagem").val());
        data.append('apres_gagueira',$(".apres_gagueira").val());
        data.append('calmo',$('.calmo').is(":checked")?'true':'false');
        data.append('sua_qd_dorme',$('.sua_qd_dorme').is(":checked")?'true':'false');
        data.append('sonambulismo',$('.sonambulismo').is(":checked")?'true':'false');
        data.append('agitado',$('.agitado').is(":checked")?'true':'false');
        data.append('fala_dormindo',$('.fala_dormindo').is(":checked")?'true':'false');
        data.append('range_os_dentes',$('.range_os_dentes').is(":checked")?'true':'false');
        data.append('baba_qdo_dorme',$('.baba_qdo_dorme').is(":checked")?'true':'false');
        data.append('a_que_h_cost_dormir_a_noite',$('.a_que_h_cost_dormir_a_noite').val());
        data.append('dorme_durante_o_dia',$('.dorme_durante_o_dia').val());
        data.append('tem_hab_dif_antes_dormir',$('.tem_hab_dif_antes_dormir').val());
        data.append('dorme_cama_sep',$('.dorme_cama_sep').val());
        data.append('usos_chupeta',$('.usos_chupeta').is(":checked")?'true':'false');
        data.append('usos_chupeta_ate_quando',$('.usos_chupeta_ate_quando').val());
        data.append('chupou_dedo',$('.chupou_dedo').is(":checked")?'true':'false');
        data.append('chupou_dedo_ate_quando',$('.chupou_dedo_ate_quando').val());
        data.append('roeu_unha',$('.roeu_unha').is(":checked")?'true':'false');
        data.append('roeu_unha_ate_quando',$('.roeu_unha_ate_quando').val());
        data.append('teveoutem_tiques',$('.teveoutem_tiques').is(":checked")?'true':'false');
        data.append('teveoutem_tiques_quais',$('.teveoutem_tiques_quais').val());
        data.append('relacionamento_familiar',$('.relacionamento_familiar').val());
        data.append('com_quem_e_ondeficacrianca',$('.com_quem_e_ondeficacrianca').val());
        data.append('tem_amigos',$('.tem_amigos').val());
        data.append('assiste_tv',$('.assiste_tv').val());
        data.append('gosta_de_musica',$('.gosta_de_musica').val());
        data.append('passeios_locais_freq',$('.passeios_locais_freq').val());
        data.append('brincar',$('.brincar').val());
        data.append('comportamento',$('.comportamento').val());
        data.append('higiene',$('.higiene').val());
        data.append('banho',$('.banho').val());
        data.append('vestir_e_despir',$('.vestir_e_despir').val());
        data.append('nome_horario_serie',$('.nome_horario_serie').val());
        data.append('historico_escolar',$('.historico_escolar').val());
        data.append('queixa_principal_da_escola',$('.queixa_principal_da_escola').val());
        data.append('gosta_da_professora',$('.gosta_da_professora').val());
        data.append('quem_ajuda_tar_casa',$('.quem_ajuda_tar_casa').val());
        data.append('como_se_comporta_na_sala',$('.como_se_comporta_na_sala').val());
        data.append('oque_familia_pensa_da_escola',$('.oque_familia_pensa_da_escola').val());
        data.append('oque_familia_pensa_da_professora',$('.oque_familia_pensa_da_professora').val());
        data.append('outras_informacoes',$('.outras_informacoes').val());
        data.append('entrevistador',$('.entrevistador').val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');        

        $.ajax({
            url:'/ceteaadmin/terapia/store_anamnese_desenvolvimento',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_desenvolvimento").replaceWith('<ul id="saveform_errList_desenvolvimento"></ul>');
                    $("#saveform_errlist_desenvolvimento").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_desenvolvimento").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_desenvolvimento").replaceWith('<ul id="saveform_errList_desenvolvimento"></ul>');
                    $("#anamnese_desenvolvimento"+atendimentoid).replaceWith('<i data-id="1" id="anamnese_desenvolvimento'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_desenvolvimento").trigger('reset');
                    $("#AddAnamnese_Desenvolvimento").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_anamnese_desenvolvimento_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_desenvolvimento").val();
        var pacienteid = $("#editpacienteid_desenvolvimento").val();

        var loading = $("#imgeditanamnese_desenvolvimento");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('alimentacao_aleitamento_reacoes',$("#editalimentacao_aleitamento_reacoes").val());
        data.append('problema_para_mastigar',$("#editproblema_para_mastigar").val());        
        data.append('habitos_alimentares',$("#edithabitos_alimentares").val());
        data.append('idade_sust_cabeca',$("#editidade_sust_cabeca").val());
        data.append('qdo_sentou_sozinha',$("#editqdo_sentou_sozinha").val());
        data.append('engatinhou_quando',$("#editengatinhou_quando").val());
        data.append('quando_andou',$("#editquando_andou").val());
        data.append('anda_adequadamente',$("#editanda_adequadamente").val());
        data.append('qdo_controlou_os_esfincteres',$("#editqdo_controlou_os_esfincteres").val());
        data.append('caiamuito_qdopequena',$("#editcaiamuito_qdopequena").val());
        data.append('que_idade_se_deu_balbucio',$("#editque_idade_se_deu_balbucio").val());
        data.append('qdo_falou_primpalavras',$("#editqdo_falou_primpalavras").val());
        data.append('qdo_falou_primfrases',$("#editqdo_falou_primfrases").val());
        data.append('apres_prob_linguagem',$("#editapres_prob_linguagem").val());
        data.append('apres_gagueira',$("#editapres_gagueira").val());
        data.append('calmo',$('#editcalmo').is(":checked")?'true':'false');
        data.append('sua_qd_dorme',$('#editsua_qd_dorme').is(":checked")?'true':'false');
        data.append('sonambulismo',$('#editsonambulismo').is(":checked")?'true':'false');
        data.append('agitado',$('#editagitado').is(":checked")?'true':'false');
        data.append('fala_dormindo',$('#editfala_dormindo').is(":checked")?'true':'false');
        data.append('range_os_dentes',$('#editrange_os_dentes').is(":checked")?'true':'false');
        data.append('baba_qdo_dorme',$('#editbaba_qdo_dorme').is(":checked")?'true':'false');
        data.append('a_que_h_cost_dormir_a_noite',$('#edita_que_h_cost_dormir_a_noite').val());
        data.append('dorme_durante_o_dia',$('#editdorme_durante_o_dia').val());
        data.append('tem_hab_dif_antes_dormir',$('#edittem_hab_dif_antes_dormir').val());
        data.append('dorme_cama_sep',$('#editdorme_cama_sep').val());
        data.append('usos_chupeta',$('#editusos_chupeta').is(":checked")?'true':'false');
        data.append('usos_chupeta_ate_quando',$('#editusos_chupeta_ate_quando').val());
        data.append('chupou_dedo',$('#editchupou_dedo').is(":checked")?'true':'false');
        data.append('chupou_dedo_ate_quando',$('#editchupou_dedo_ate_quando').val());
        data.append('roeu_unha',$('#editroeu_unha').is(":checked")?'true':'false');
        data.append('roeu_unha_ate_quando',$('#editroeu_unha_ate_quando').val());
        data.append('teveoutem_tiques',$('#editteveoutem_tiques').is(":checked")?'true':'false');
        data.append('teveoutem_tiques_quais',$('#editteveoutem_tiques_quais').val());
        data.append('relacionamento_familiar',$('#editrelacionamento_familiar').val());
        data.append('com_quem_e_ondeficacrianca',$('#editcom_quem_e_ondeficacrianca').val());
        data.append('tem_amigos',$('#edittem_amigos').val());
        data.append('assiste_tv',$('#editassiste_tv').val());
        data.append('gosta_de_musica',$('#editgosta_de_musica').val());
        data.append('passeios_locais_freq',$('#editpasseios_locais_freq').val());
        data.append('brincar',$('#editbrincar').val());
        data.append('comportamento',$('#editcomportamento').val());
        data.append('higiene',$('#edithigiene').val());
        data.append('banho',$('#editbanho').val());
        data.append('vestir_e_despir',$('#editvestir_e_despir').val());
        data.append('nome_horario_serie',$('#editnome_horario_serie').val());
        data.append('historico_escolar',$('#edithistorico_escolar').val());
        data.append('queixa_principal_da_escola',$('#editqueixa_principal_da_escola').val());
        data.append('gosta_da_professora',$('#editgosta_da_professora').val());
        data.append('quem_ajuda_tar_casa',$('#editquem_ajuda_tar_casa').val());
        data.append('como_se_comporta_na_sala',$('#editcomo_se_comporta_na_sala').val());
        data.append('oque_familia_pensa_da_escola',$('#editoque_familia_pensa_da_escola').val());
        data.append('oque_familia_pensa_da_professora',$('#editoque_familia_pensa_da_professora').val());
        data.append('outras_informacoes',$('#editoutras_informacoes').val());
        data.append('entrevistador',$('#editentrevistador').val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_anamnese_desenvolvimento/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_desenvolvimento").replaceWith('<ul id="updateform_errList_desenvolvimento"></ul>');
                    $("#updateform_errlist_desenvolvimento").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_desenvolvimento").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_desenvolvimento").replaceWith('<ul id="updateform_errList_desenvolvimento"></ul>');
                    $("#anamnese_desenvolvimento"+atendimentoid).replaceWith('<i data-id="1" id="anamnese_desenvolvimento'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_desenvolvimento").trigger('reset');
                    $("#EditAnamnese_Desenvolvimento").modal('hide');    
                }
            }
        });
    });

//fim anamnese do desenvolvimento

//inicio histdes_versaopais_inicial

$("#AddAHistDesVersaoPaisInicial").on('shown.bs.modal',function(){
            $(".responsavelpreench").focus();
    });

$("#EditHistDesVersaoPaisInicial").on('shown.bs.modal',function(){
            $(".responsavelpreench").focus();
    });

//inicio conta caracteres dos textarea HistDesVersaoPaisInicial

    //add

    $(document).on('input','#addresponsavelpreench',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var responsavelpreench = $('input[name="addresponsavelpreench"]').val();
            $('input[name="addresponsavelpreench"]').val(responsavelpreench.substr(0,limite));
            $(".addresponsavelpreench").text("0" + " " + informativo);
        }else{
            $(".addresponsavelpreench").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addprinc_queixas_comport_filho',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var princ_queixas_comport_filho = $('textarea[name="addprinc_queixas_comport_filho"]').val();
            $('textarea[name="addprinc_queixas_comport_filho"]').val(princ_queixas_comport_filho.substr(0,limite));
            $(".addprinc_queixas_comport_filho").text("0" + " " + informativo);
        }else{
            $(".addprinc_queixas_comport_filho").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addquem_tomaconta_crianca',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var quem_tomaconta_crianca = $('textarea[name="addquem_tomaconta_crianca"]').val();
            $('textarea[name="addquem_tomaconta_crianca"]').val(quem_tomaconta_crianca.substr(0,limite));
            $(".addquem_tomaconta_crianca").text("0" + " " + informativo);
        }else{
            $(".addquem_tomaconta_crianca").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addidade_primeiros_sinais_preocupacoes',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var idade_primeiros_sinais_preocupacoes = $('textarea[name="addidade_primeiros_sinais_preocupacoes"]').val();
            $('textarea[name="addidade_primeiros_sinais_preocupacoes"]').val(idade_primeiros_sinais_preocupacoes.substr(0,limite));
            $(".addidade_primeiros_sinais_preocupacoes").text("0" + " " + informativo);
        }else{
            $(".addidade_primeiros_sinais_preocupacoes").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addoutras_preocupacoes',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var outras_preocupacoes = $('textarea[name="addoutras_preocupacoes"]').val();
            $('textarea[name="addoutras_preocupacoes"]').val(outras_preocupacoes.substr(0,limite));
            $(".addoutras_preocupacoes").text("0" + " " + informativo);
        }else{
            $(".addoutras_preocupacoes").text(caracteresRestantes + " " + informativo);
        }
    });

//edit

    $(document).on('input','#editresponsavelpreench',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var responsavelpreench = $('input[name="editresponsavelpreench"]').val();
            $('input[name="editresponsavelpreench"]').val(responsavelpreench.substr(0,limite));
            $(".editresponsavelpreench").text("0" + " " + informativo);
        }else{
            $(".editresponsavelpreench").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editprinc_queixas_comport_filho',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var princ_queixas_comport_filho = $('textarea[name="editprinc_queixas_comport_filho"]').val();
            $('textarea[name="editprinc_queixas_comport_filho"]').val(princ_queixas_comport_filho.substr(0,limite));
            $(".editprinc_queixas_comport_filho").text("0" + " " + informativo);
        }else{
            $(".editprinc_queixas_comport_filho").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editquem_tomaconta_crianca',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var quem_tomaconta_crianca = $('textarea[name="editquem_tomaconta_crianca"]').val();
            $('textarea[name="editquem_tomaconta_crianca"]').val(quem_tomaconta_crianca.substr(0,limite));
            $(".editquem_tomaconta_crianca").text("0" + " " + informativo);
        }else{
            $(".editquem_tomaconta_crianca").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editidade_primeiros_sinais_preocupacoes',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var idade_primeiros_sinais_preocupacoes = $('textarea[name="editidade_primeiros_sinais_preocupacoes"]').val();
            $('textarea[name="editidade_primeiros_sinais_preocupacoes"]').val(idade_primeiros_sinais_preocupacoes.substr(0,limite));
            $(".editidade_primeiros_sinais_preocupacoes").text("0" + " " + informativo);
        }else{
            $(".editidade_primeiros_sinais_preocupacoes").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editoutras_preocupacoes',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var outras_preocupacoes = $('textarea[name="editoutras_preocupacoes"]').val();
            $('textarea[name="editoutras_preocupacoes"]').val(outras_preocupacoes.substr(0,limite));
            $(".editoutras_preocupacoes").text("0" + " " + informativo);
        }else{
            $(".editoutras_preocupacoes").text(caracteresRestantes + " " + informativo);
        }
    });


$(document).on('click','.histdes_versaopais_inicial',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_histdes_versaopais_inicial = $("#histdes_versaopais_inicial"+atendimentoid).data("id");

        if(opcao_form_histdes_versaopais_inicial==0){
                $("#addpacienteid_histdesversaopaisinicial").val(pacienteid);
                $("#addatendimentoid_histdesversaopaisinicial").val(atendimentoid);
                $("#addform_histdesversaopaisinicial").trigger('reset');
                $("#AddHistDesVersaoPaisInicial").modal('show'); 
                $("#saveform_errList_histdesversaopaisinicial").replaceWith('<ul id="saveform_errList_histdesversaopaisinicial"></ul>');
        }else{            
                $("#editpacienteid_histdesversaopaisinicial").val(pacienteid);
                $("#editatendimentoid_histdesversaopaisinicial").val(atendimentoid);
                $("#editform_histdesversaopaisinicial").trigger('reset');
                $("#EditHistDesVersaoPaisInicial").modal('show'); 
                $("#updateform_errList_histdesversaopaisinicial").replaceWith('<ul id="updateform_errList_histdesversaopaisinicial"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_histdesversaopaisinicial/'+pacienteid,                                
                    success: function(response){           
                        if(response.status==200){                                               
                            $(".responsavelpreench").val(response.histdesversaopaisinicial.responsavel_preench);
                            $(".princ_queixas_comport_filho").val(response.histdesversaopaisinicial.princ_queixas_comport_filho);
                            $(".quem_tomaconta_crianca").val(response.histdesversaopaisinicial.quem_tomaconta_crianca);
                            $(".idade_primeiros_sinais_preocupacoes").val(response.histdesversaopaisinicial.idade_primeiros_sinais_preocupacoes);
                            $(".desenv_motor").attr("checked",response.histdesversaopaisinicial.desenv_motor);
                            $(".desenv_linguagem").attr("checked",response.histdesversaopaisinicial.desenv_linguagem);
                            $(".problemas_sono").attr("checked",response.histdesversaopaisinicial.problemas_sono);
                            $(".problemas_conduta").attr("checked",response.histdesversaopaisinicial.problemas_conduta);
                            $(".tiques_esteotipias_manias").attr("checked",response.histdesversaopaisinicial.tiques_esteotipias_manias);
                            $(".probl_comport_social").attr("checked",response.histdesversaopaisinicial.probl_comport_social);
                            $(".problemas_c_alimentacao").attr("checked",response.histdesversaopaisinicial.problemas_c_alimentacao);
                            $(".brincar_incompativel_c_idade").attr("checked",response.histdesversaopaisinicial.brincar_incompativel_c_idade);
                            $(".outras_preocupacoes").val(response.histdesversaopaisinicial.outras_preocupacoes);
                        }      
                    }
                });
        }
    });


    $(document).on('click','.add_histdesversaopais_inicial_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histdesversaopaisinicial").val();
        var atendimentoid = $("#addatendimentoid_histdesversaopaisinicial").val();

        var loading = $("#imgaddanamnese_histdesversaopaisinicial");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('responsavel_preenchimento',$(".responsavelpreench").val());
        data.append('princ_queixas_comport_filho',$(".princ_queixas_comport_filho").val());
        data.append('quem_tomaconta_crianca',$(".quem_tomaconta_crianca").val());
        data.append('idade_primeiros_sinais_preocupacoes',$(".idade_primeiros_sinais_preocupacoes").val());
        data.append('desenv_motor',$(".desenv_motor").is(":checked")?'true':'false');
        data.append('desenv_linguagem',$(".desenv_linguagem").is(":checked")?'true':'false');
        data.append('problemas_sono',$(".problemas_sono").is(":checked")?'true':'false');
        data.append('problemas_conduta',$(".problemas_conduta").is(":checked")?'true':'false');
        data.append('tiques_esteotipias_manias',$(".tiques_esteotipias_manias").is(":checked")?'true':'false');
        data.append('probl_comport_social',$(".probl_comport_social").is(":checked")?'true':'false');
        data.append('problemas_c_alimentacao',$(".problemas_c_alimentacao").is(":checked")?'true':'false');
        data.append('brincar_incompativel_c_idade',$(".brincar_incompativel_c_idade").is(":checked")?'true':'false');
        data.append('outras_preocupacoes',$(".outras_preocupacoes").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');        

        $.ajax({
            url:'/ceteaadmin/terapia/store_histdesversaopaisinicial',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histdesversaopaisinicial").replaceWith('<ul id="saveform_errList_histdesversaopaisinicial"></ul>');
                    $("#saveform_errlist_histdesversaopaisinicial").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histdesversaopaisinicial").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histdesversaopaisinicial").replaceWith('<ul id="saveform_errList_histdesversaopaisinicial"></ul>');
                    $("#anamnese_histdesversaopaisinicial"+atendimentoid).replaceWith('<i data-id="1" id="anamnese_histdesversaopaisinicial'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histdesversaopaisinicial").trigger('reset');
                    $("#AddHistDesVersaoPaisInicial").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_histdesversaopaisinicial_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histdesversaopaisinicial").val();
        var pacienteid = $("#editpacienteid_histdesversaopaisinicial").val();

        var loading = $("#imgeditanamnese_histdesversaopaisinicial");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('responsavel_preenchimento',$("#editresponsavelpreench").val());
        data.append('princ_queixas_comport_filho',$("#editprinc_queixas_comport_filho").val());
        data.append('quem_tomaconta_crianca',$("#editquem_tomaconta_crianca").val());
        data.append('idade_primeiros_sinais_preocupacoes',$("#editidade_primeiros_sinais_preocupacoes").val());
        data.append('desenv_motor',$("#editdesenv_motor").is(":checked")?'true':'false');
        data.append('desenv_linguagem',$("#editdesenv_linguagem").is(":checked")?'true':'false');
        data.append('problemas_sono',$("#editproblemas_sono").is(":checked")?'true':'false');
        data.append('problemas_conduta',$("#editproblemas_conduta").is(":checked")?'true':'false');
        data.append('tiques_esteotipias_manias',$("#edittiques_esteotipias_manias").is(":checked")?'true':'false');
        data.append('probl_comport_social',$("#editprobl_comport_social").is(":checked")?'true':'false');
        data.append('problemas_c_alimentacao',$("#editproblemas_c_alimentacao").is(":checked")?'true':'false');
        data.append('brincar_incompativel_c_idade',$("#editbrincar_incompativel_c_idade").is(":checked")?'true':'false');
        data.append('outras_preocupacoes',$("#editoutras_preocupacoes").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_histdesversaopaisinicial/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histdesversaopaisinicial").replaceWith('<ul id="updateform_errList_histdesversaopaisinicial"></ul>');
                    $("#updateform_errlist_histdesversaopaisinicial").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histdesversaopaisinicial").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histdesversaopaisinicial").replaceWith('<ul id="updateform_errList_histdesversaopaisinicial"></ul>');
                    $("#anamnese_histdesversaopaisinicial"+atendimentoid).replaceWith('<i data-id="1" id="anamnese_histdesversaopaisinicial'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histdesversaopaisinicial").trigger('reset');
                    $("#EditAnamnese_HistDesVersaoPaisInicial").modal('hide');    
                }
            }
        });
    });

//fim histdes_versaopais_inicial



});

</script>

@stop


