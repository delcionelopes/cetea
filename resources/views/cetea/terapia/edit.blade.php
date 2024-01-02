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
            <form id="addform_desenvolvimento" class="form-horizontal" role="form">
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
                    <input type="text" name="addidade_sust_cabeca" id="addidade_sust_cabeca" class="idade_sust_cabeca form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando sentou sozinha? (idade)</legend>
                    <div class="col-md-4">
                    <span class="addqdo_sentou_sozinha"></span>
                    <input type="text" name="addqdo_sentou_sozinha" id="addqdo_sentou_sozinha" class="qdo_sentou_sozinha form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Engatinhou? Quando? (idade)</legend>                    
                    <div class="col-md-4">
                    <span class="addengatinhou_quando"></span>
                    <input type="text" name="addengatinhou_quando" id="addengatinhou_quando" class="engatinhou_quando form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando andou? (idade)</legend>
                    <div class="col-md-4">
                    <span class="addquando_andou"></span>
                    <input type="text" name="addquando_andou" id="addquando_andou" class="quando_andou form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Anda adequadamente?</legend>
                    <div class="col-md-4">
                    <span class="addanda_adequadamente"></span>
                    <input type="text" name="addanda_adequadamente" id="addanda_adequadamente" class="anda_adequadamente form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando controlou os esfíncteres?</legend>
                    <div class="col-md-4">
                    <span class="addqdo_controlou_os_esfincteres"></span>
                    <input type="text" name="addqdo_controlou_os_esfincteres" id="addqdo_controlou_os_esfincteres" class="qdo_controlou_os_esfincteres form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Caía muito quando pequena?</legend>
                    <div class="col-md-4">
                    <span class="addcaiamuito_qdopequena"></span>
                    <input type="text" name="addcaiamuito_qdopequena" id="addcaiamuito_qdopequena" class="caiamuito_qdopequena form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Em que idade se deu o balbucio? (idade)</legend>
                    <div class="col-md-4">
                    <span class="addque_idade_se_deu_balbucio"></span>
                    <input type="text" name="addque_idade_se_deu_balbucio" id="addque_idade_se_deu_balbucio" class="que_idade_se_deu_balbucio form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando falou as primeiras palavras? (idade)</legend>
                    <div class="col-md-4">
                    <span class="addqdo_falou_primpalavras"></span>
                    <input type="text" name="addqdo_falou_primpalavras" id="addqdo_falou_primpalavras" class="qdo_falou_primpalavras form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Apresenta algum problema de linguagem?</legend>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                    <span class="adda_que_h_cost_dormir_a_noite"></span>
                    <input type="text" name="adda_que_h_cost_dormir_a_noite" id="adda_que_h_cost_dormir_a_noite" class="a_que_h_cost_dormir_a_noite form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Dorme durante o dia?</legend>
                    <div class="col-md-4">
                    <span class="adddorme_durante_o_dia"></span>
                    <input type="text" name="adddorme_durante_o_dia" id="adddorme_durante_o_dia" class="dorme_durante_o_dia form-control" size="20" maxlength="20">
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
                    <div class="col-md-4">
                    <span class="addteveoutem_tiques_quais"></span>
                    <label for="addteveoutem_tiques_quais">Quais?</label>
                    <input type="text" name="addteveoutem_tiques_quais" id="addteveoutem_tiques_quais" class="teveoutem_tiques_quais form-control" size="30" maxlength="30">
                    </div>
                    </div>  
                </fieldset>
                <fieldset>
                    <legend>Relacionamento familiar</legend>
                    <div class="col-md-4">
                    <span class="addrelacionamento_familiar"></span>
                    <input type="text" name="addrelacionamento_familiar" id="addrelacionamento_familiar" class="relacionamento_familiar form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Com quem e onde fica a criança?</legend>
                    <div class="col-md-4">
                    <span class="addcom_quem_e_ondeficacrianca"></span>
                    <input type="text" name="addcom_quem_e_ondeficacrianca" id="addcom_quem_e_ondeficacrianca" class="com_quem_e_ondeficacrianca form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Tem amigos?</legend>
                    <div class="col-md-4">
                    <span class="addtem_amigos"></span>
                    <input type="text" name="addtem_amigos" id="addtem_amigos" class="tem_amigos form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Assiste TV? (posição, tempo, programação)</legend>
                    <div class="col-md-4">
                    <span class="addassiste_tv"></span>
                    <input type="text" name="addassiste_tv" id="addassiste_tv" class="assiste_tv form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Gosta de música? (preferências)</legend>
                    <div class="col-md-4">
                    <span class="addgosta_de_musica"></span>
                    <input type="text" name="addgosta_de_musica" id="addgosta_de_musica" class="gosta_de_musica form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Passeios, locais que frequenta.</legend>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
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
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditAnamnese_Desenvolvimento" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histpregressamodal" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histpregressamodal" style="color: white;">Anamnese Desenvolvimento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_desenvolvimentomodal" class="form-horizontal" role="form">
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
                    <input type="text" name="editidade_sust_cabeca" id="editidade_sust_cabeca" class="idade_sust_cabeca form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando sentou sozinha? (idade)</legend>
                    <div class="col-md-4">
                    <span class="editqdo_sentou_sozinha"></span>
                    <input type="text" name="editqdo_sentou_sozinha" id="editqdo_sentou_sozinha" class="qdo_sentou_sozinha form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Engatinhou? Quando? (idade)</legend>                    
                    <div class="col-md-4">
                    <span class="editengatinhou_quando"></span>
                    <input type="text" name="editengatinhou_quando" id="editengatinhou_quando" class="engatinhou_quando form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando andou? (idade)</legend>
                    <div class="col-md-4">
                    <span class="editquando_andou"></span>
                    <input type="text" name="editquando_andou" id="editquando_andou" class="quando_andou form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Anda adequadamente?</legend>
                    <div class="col-md-4">
                    <span class="editanda_adequadamente"></span>
                    <input type="text" name="editanda_adequadamente" id="editanda_adequadamente" class="anda_adequadamente form-control" size="20" maxlength="20">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando controlou os esfíncteres?</legend>
                    <div class="col-md-4">
                    <span class="editqdo_controlou_os_esfincteres"></span>
                    <input type="text" name="editqdo_controlou_os_esfincteres" id="editqdo_controlou_os_esfincteres" class="qdo_controlou_os_esfincteres form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Caía muito quando pequena?</legend>
                    <div class="col-md-4">
                    <span class="editcaiamuito_qdopequena"></span>
                    <input type="text" name="editcaiamuito_qdopequena" id="editcaiamuito_qdopequena" class="caiamuito_qdopequena form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Em que idade se deu o balbucio? (idade)</legend>
                    <div class="col-md-4">
                    <span class="editque_idade_se_deu_balbucio"></span>
                    <input type="text" name="editque_idade_se_deu_balbucio" id="editque_idade_se_deu_balbucio" class="que_idade_se_deu_balbucio form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Quando falou as primeiras palavras? (idade)</legend>
                    <div class="col-md-4">
                    <span class="editqdo_falou_primpalavras"></span>
                    <input type="text" name="editqdo_falou_primpalavras" id="editqdo_falou_primpalavras" class="qdo_falou_primpalavras form-control" size="10" maxlength="10">
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
                    <div class="col-md-4">
                    <span class="editteveoutem_tiques_quais"></span>
                    <label for="editteveoutem_tiques_quais">Quais?</label>
                    <input type="text" name="editteveoutem_tiques_quais" id="editteveoutem_tiques_quais" class="teveoutem_tiques_quais form-control" size="30" maxlength="30">
                    </div>
                    </div>  
                </fieldset>
                <fieldset>
                    <legend>Relacionamento familiar</legend>
                    <div class="col-md-4">
                    <span class="editrelacionamento_familiar"></span>
                    <input type="text" name="editrelacionamento_familiar" id="editrelacionamento_familiar" class="relacionamento_familiar form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Com quem e onde fica a criança?</legend>
                    <div class="col-md-4">
                    <span class="editcom_quem_e_ondeficacrianca"></span>
                    <input type="text" name="editcom_quem_e_ondeficacrianca" id="editcom_quem_e_ondeficacrianca" class="com_quem_e_ondeficacrianca form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Tem amigos?</legend>
                    <div class="col-md-4">
                    <span class="edittem_amigos"></span>
                    <input type="text" name="edittem_amigos" id="edittem_amigos" class="tem_amigos form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Assiste TV? (posição, tempo, programação)</legend>
                    <div class="col-md-4">
                    <span class="editassiste_tv"></span>
                    <input type="text" name="editassiste_tv" id="editassiste_tv" class="assiste_tv form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Gosta de música? (preferências)</legend>
                    <div class="col-md-4">
                    <span class="editgosta_de_musica"></span>
                    <input type="text" name="editgosta_de_musica" id="editgosta_de_musica" class="gosta_de_musica form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Passeios, locais que frequenta.</legend>
                    <div class="col-md-4">
                    <span class="editpasseios_locais_freq"></span>
                    <input type="text" name="editpasseios_locais_freq" id="editpasseios_locais_freq" class="passeios_locais_freq form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Brincar (como, posição, nível de atenção, brinquedos preferidos)</legend>
                    <span class="addbrincar"></span>
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
                    <div class="col-md-4">
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



});

</script>

@stop


