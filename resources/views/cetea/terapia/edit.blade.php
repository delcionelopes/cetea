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


<!-- Inicio AddHistDesVersaoPaisBrincadeiras -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesVersaoPaisBrincadeiras" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_HistDesVersaoBrincadeiras" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_HistDesVersaoPaisBrincadeiras" style="color: white;">Histórico do Desenvolvimento Versão Pais - Brincadeiras</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdesversaopaisbrincadeiras" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdesversaopaisbrincadeiras">
                <input type="hidden" id="addatendimentoid_histdesversaopaisbrincadeiras">
                <ul id="saveform_errlist_histdesversaopaisbrincadeiras"></ul>
                <fieldset>
                    <legend>BRINCADEIRA (Assinale se o seu filho(a) faz ou fez quando menor. Caso perdeu a habilidade, mencione com observações)</legend>
                </fieldset>
                <fieldset>
                    <legend>Qual sua brincadeira favorita?</legend>
                    <div class="col-md-4">
                    <span class="addl1_brincadeira_favorita"></span>
                    <textarea name="addl1_brincadeira_favorita" id="addl1_brincadeira_favorita" cols="30" rows="4" class="l1_brincadeira_favorita"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                    <legend>Quais seus brinquedos favoritos?</legend>
                      <span class="addl2_brinquedos_favoritos"></span>
                      <textarea name="addl2_brinquedos_favoritos" id="addl2_brinquedos_favoritos" cols="30" rows="4" class="l2_brinquedos_favoritos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                    <legend>Você o considera obcecado por algo?</legend>
                      <span class="addl3_vc_o_considera_obcecado"></span>
                      <textarea name="addl3_vc_o_considera_obcecado" id="addl3_vc_o_considera_obcecado" cols="30" rows="4" class="l3_vc_o_considera_obcecado form-control"></textarea>
                    </div>                                  
                </fieldset>
                <fieldset>
                    <div class="form-group">
                    <legend>Ele já foi obcecado por algo antes?</legend>
                      <span class="addl3_ele_ja_foi_obcecado_por_algo"></span>
                      <textarea name="addl3_ele_ja_foi_obcecado_por_algo" id="addl3_ele_ja_foi_obcecado_por_algo" cols="30" rows="4" class="l3_ele_ja_foi_obcecado_por_algo form-control"></textarea>
                    </div>                                  
                </fieldset>                
                <fieldset>
                    <div class="form-group">
                      <label for="addl4_tem_inter_p_cheiro_textura">
                      <input type="checkbox" class="l4_tem_inter_p_cheiro_textura" name="addl4_tem_inter_p_cheiro_textura" id="addl4_tem_inter_p_cheiro_textura"> Seu filho(a) tem interesse pelo cheiro, textura dos objetos? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addl4_obs"></span>
                      <textarea name="addl4_obs" id="addl4_obs" cols="30" rows="4" class="l4_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="addl5_brinca_de_form_repet">
                      <input type="checkbox" class="l5_brinca_de_form_repet" name="addl5_brinca_de_form_repet" id="addl5_brinca_de_form_repet"> Seu filho(a) brinca de forma repetitiva (alinhando, empilhando, girando os objetos de forma repetitiva)? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addl5_obs"></span>
                      <textarea name="addl5_obs" id="addl5_obs" cols="30" rows="4" class="l5_obs form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <div class="form-group">
                      <label for="addl6_brinca_de_form_func">
                      <input type="checkbox" class="l6_brinca_de_form_func" name="addl6_brinca_de_form_func" id="addl6_brinca_de_form_func"> Seu filho(a) brinca de maneira funcional (ex.: aperta botões, abre e fecha partes, abre e fecha potes e tampas)? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addl6_obs"></span>
                      <textarea name="addl6_obs" id="addl6_obs" cols="30" rows="4" class="l6_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl7_brinca_de_form_simb_mini">
                      <input type="checkbox" class="l7_brinca_de_form_simb_mini" name="addl7_brinca_de_form_simb_mini" id="addl7_brinca_de_form_simb_mini"> Seu filho(a) brinca de maneira simbólica com miniaturas? Dê exemplos.</label>
                      <label for="">Observações:</label>
                      <span class="addl7_obs"></span>
                      <textarea name="addl7_obs" id="addl7_obs" cols="30" rows="4" class="l7_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl8_brinca_de_form_simb_objetos">
                      <input type="checkbox" class="l8_brinca_de_form_simb_objetos" name="addl8_brinca_de_form_simb_objetos" id="addl8_brinca_de_form_simb_objetos"> Seu filho(a) brinca de maneira simbólica com um objeto como se fosse outro? Dê exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addl8_obs"></span>
                      <textarea name="addl8_obs" id="addl8_obs" cols="30" rows="4" class="l8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl9_brinca_de_form_simb_atrpapeis">
                      <input type="checkbox" class="l9_brinca_de_form_simb_atrpapeis" name="addl9_brinca_de_form_simb_atrpapeis" id="addl9_brinca_de_form_simb_atrpapeis"> Seu filho(a) brinca de maneira simbólica atribuindo diferentes papéis a si mesmo e ao outro como, por exemplo, médico, super herói, professor, etc? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addl9_obs"></span>
                      <textarea name="addl9_obs" id="addl9_obs" cols="30" rows="4" class="l9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl10_segue_regras_de_brincadeiras">
                      <input type="checkbox" class="l10_segue_regras_de_brincadeiras" name="addl10_segue_regras_de_brincadeiras" id="addl10_segue_regras_de_brincadeiras"> Seu filho(a) é bom em seguir regras da brincadeira quando interage com outras crianças?</label>
                      <label for="">Observações:</label>
                      <span class="addl10_obs"></span>
                      <textarea name="addl10_obs" id="addl10_obs" cols="30" rows="4" class="l10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl11_bom_fazer_amizades">
                      <input type="checkbox" class="l11_bom_fazer_amizades" name="addl11_bom_fazer_amizades" id="addl11_bom_fazer_amizades"> Seu filho(a) é bom em fazer amizades?</label>
                      <label for="">Observações:</label>
                      <span class="addl11_obs"></span>
                      <textarea name="addl11_obs" id="addl11_obs" cols="30" rows="4" class="l11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl12_e_solitario">
                      <input type="checkbox" class="l12_e_solitario" name="addl12_e_solitario" id="addl12_e_solitario"> Seu filho(a) é solitário(a)?</label>
                      <label for="">Observações:</label>
                      <span class="addl12_obs"></span>
                      <textarea name="addl12_obs" id="addl12_obs" cols="30" rows="4" class="l12_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl13_e_timido">
                      <input type="checkbox" class="l13_e_timido" name="addl13_e_timido" id="addl13_e_timido"> Seu filho(a) é tímido(a)?</label>
                      <label for="">Observações:</label>
                      <span class="addl13_obs"></span>
                      <textarea name="addl13_obs" id="addl13_obs" cols="30" rows="4" class="l13_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl14_tem_melhor_amigo">
                      <input type="checkbox" class="l14_tem_melhor_amigo" name="addl14_tem_melhor_amigo" id="addl14_tem_melhor_amigo"> Seu filho(a) tem um(a) melhor amigo(a)?</label>
                      <label for="">Observações:</label>
                      <span class="addl14_obs"></span>
                      <textarea name="addl14_obs" id="addl14_obs" cols="30" rows="4" class="l14_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <legend>Seu filho(a) prefere crianças da mesma idade, mais velhas ou adultos?</legend>
                      <span class="addl15_obs"></span>
                      <textarea name="addl15_obs" id="addl15_obs" cols="30" rows="4" class="l15_obs form-control"></textarea>
                    </div>
                </fieldset>                
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdesversaopais_desenvsocial_btn"><img id="imgadd_histdesversaopaisdesenvsocial" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesVersaoPaisBrincadeiras -->

<!-- Inicio EditHistDesVersaoPaisBrincadeiras -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesVersaoPaisBrincadeiras" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdesversaopaisbrincadeiras" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdesversaopaisbrincadeiras" style="color: white;">Histórico do Desenvolvimento Versão Pais - Brincadeiras</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdesversaopaisbrincadeiras" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdesversaopaisbrincadeiras">
                <input type="hidden" id="editatendimentoid_histdesversaopaisbrincadeiras">
                <ul id="updateform_errlist_histdesversaopaisbrincadeiras"></ul>
                <fieldset>
                    <legend>BRINCADEIRA (Assinale se o seu filho(a) faz ou fez quando menor. Caso perdeu a habilidade, mencione com observações)</legend>
                </fieldset>
                <fieldset>
                    <legend>Qual sua brincadeira favorita?</legend>
                    <div class="col-md-4">
                    <span class="editl1_brincadeira_favorita"></span>
                    <textarea name="editl1_brincadeira_favorita" id="editl1_brincadeira_favorita" cols="30" rows="4" class="l1_brincadeira_favorita"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                    <legend>Quais seus brinquedos favoritos?</legend>
                      <span class="editl2_brinquedos_favoritos"></span>
                      <textarea name="editl2_brinquedos_favoritos" id="editl2_brinquedos_favoritos" cols="30" rows="4" class="l2_brinquedos_favoritos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                    <legend>Você o considera obcecado por algo?</legend>
                      <span class="editl3_vc_o_considera_obcecado"></span>
                      <textarea name="editl3_vc_o_considera_obcecado" id="editl3_vc_o_considera_obcecado" cols="30" rows="4" class="l3_vc_o_considera_obcecado form-control"></textarea>
                    </div>                                  
                </fieldset>
                <fieldset>
                    <div class="form-group">
                    <legend>Ele já foi obcecado por algo antes?</legend>
                      <span class="editl3_ele_ja_foi_obcecado_por_algo"></span>
                      <textarea name="editl3_ele_ja_foi_obcecado_por_algo" id="editl3_ele_ja_foi_obcecado_por_algo" cols="30" rows="4" class="l3_ele_ja_foi_obcecado_por_algo form-control"></textarea>
                    </div>                                  
                </fieldset>                
                <fieldset>
                    <div class="form-group">
                      <label for="editl4_tem_inter_p_cheiro_textura">
                      <input type="checkbox" class="l4_tem_inter_p_cheiro_textura" name="editl4_tem_inter_p_cheiro_textura" id="editl4_tem_inter_p_cheiro_textura"> Seu filho(a) tem interesse pelo cheiro, textura dos objetos? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addl4_obs"></span>
                      <textarea name="editl4_obs" id="editl4_obs" cols="30" rows="4" class="l4_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="editl5_brinca_de_form_repet">
                      <input type="checkbox" class="l5_brinca_de_form_repet" name="editl5_brinca_de_form_repet" id="editl5_brinca_de_form_repet"> Seu filho(a) brinca de forma repetitiva (alinhando, empilhando, girando os objetos de forma repetitiva)? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="editl5_obs"></span>
                      <textarea name="editl5_obs" id="editl5_obs" cols="30" rows="4" class="l5_obs form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <div class="form-group">
                      <label for="editl6_brinca_de_form_func">
                      <input type="checkbox" class="l6_brinca_de_form_func" name="editl6_brinca_de_form_func" id="editl6_brinca_de_form_func"> Seu filho(a) brinca de maneira funcional (ex.: aperta botões, abre e fecha partes, abre e fecha potes e tampas)? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="editl6_obs"></span>
                      <textarea name="editl6_obs" id="editl6_obs" cols="30" rows="4" class="l6_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl7_brinca_de_form_simb_mini">
                      <input type="checkbox" class="l7_brinca_de_form_simb_mini" name="editl7_brinca_de_form_simb_mini" id="editl7_brinca_de_form_simb_mini"> Seu filho(a) brinca de maneira simbólica com miniaturas? Dê exemplos.</label>
                      <label for="">Observações:</label>
                      <span class="editl7_obs"></span>
                      <textarea name="editl7_obs" id="editl7_obs" cols="30" rows="4" class="l7_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl8_brinca_de_form_simb_objetos">
                      <input type="checkbox" class="l8_brinca_de_form_simb_objetos" name="editl8_brinca_de_form_simb_objetos" id="editl8_brinca_de_form_simb_objetos"> Seu filho(a) brinca de maneira simbólica com um objeto como se fosse outro? Dê exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="editl8_obs"></span>
                      <textarea name="editl8_obs" id="editl8_obs" cols="30" rows="4" class="l8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl9_brinca_de_form_simb_atrpapeis">
                      <input type="checkbox" class="l9_brinca_de_form_simb_atrpapeis" name="editl9_brinca_de_form_simb_atrpapeis" id="editl9_brinca_de_form_simb_atrpapeis"> Seu filho(a) brinca de maneira simbólica atribuindo diferentes papéis a si mesmo e ao outro como, por exemplo, médico, super herói, professor, etc? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="editl9_obs"></span>
                      <textarea name="editl9_obs" id="editl9_obs" cols="30" rows="4" class="l9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl10_segue_regras_de_brincadeiras">
                      <input type="checkbox" class="l10_segue_regras_de_brincadeiras" name="editl10_segue_regras_de_brincadeiras" id="editl10_segue_regras_de_brincadeiras"> Seu filho(a) é bom em seguir regras da brincadeira quando interage com outras crianças?</label>
                      <label for="">Observações:</label>
                      <span class="editl10_obs"></span>
                      <textarea name="editl10_obs" id="editl10_obs" cols="30" rows="4" class="l10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl11_bom_fazer_amizades">
                      <input type="checkbox" class="l11_bom_fazer_amizades" name="editl11_bom_fazer_amizades" id="editl11_bom_fazer_amizades"> Seu filho(a) é bom em fazer amizades?</label>
                      <label for="">Observações:</label>
                      <span class="editl11_obs"></span>
                      <textarea name="editl11_obs" id="editl11_obs" cols="30" rows="4" class="l11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl12_e_solitario">
                      <input type="checkbox" class="l12_e_solitario" name="editl12_e_solitario" id="editl12_e_solitario"> Seu filho(a) é solitário(a)?</label>
                      <label for="">Observações:</label>
                      <span class="editl12_obs"></span>
                      <textarea name="editl12_obs" id="editl12_obs" cols="30" rows="4" class="l12_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl13_e_timido">
                      <input type="checkbox" class="l13_e_timido" name="editl13_e_timido" id="editl13_e_timido"> Seu filho(a) é tímido(a)?</label>
                      <label for="">Observações:</label>
                      <span class="editl13_obs"></span>
                      <textarea name="editl13_obs" id="editl13_obs" cols="30" rows="4" class="l13_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl14_tem_melhor_amigo">
                      <input type="checkbox" class="l14_tem_melhor_amigo" name="editl14_tem_melhor_amigo" id="editl14_tem_melhor_amigo"> Seu filho(a) tem um(a) melhor amigo(a)?</label>
                      <label for="">Observações:</label>
                      <span class="editl14_obs"></span>
                      <textarea name="editl14_obs" id="editl14_obs" cols="30" rows="4" class="l14_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <legend>Seu filho(a) prefere crianças da mesma idade, mais velhas ou adultos?</legend>
                      <span class="editl15_obs"></span>
                      <textarea name="editl15_obs" id="editl15_obs" cols="30" rows="4" class="l15_obs form-control"></textarea>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdesversaopaisbrincadeiras_btn"><img id="imgedit_histdesversaopaisbrincadeiras" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesVersaoPaisBrincadeiras -->

<!-- Inicio AddHistDesVersaoPaisDesenvSocial -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesVersaoPaisDesenvSocial" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_HistDesVersaoPaisDesenvSocial" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_HistDesVersaoPaisDesenvSocial" style="color: white;">Histórico do Desenvolvimento Versão Pais - Desenv. Social</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdesversaopaisdesenvsocial" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdesversaopaisdesenvsocial">
                <input type="hidden" id="addatendimentoid_histdesversaopaisdesenvsocial">
                <ul id="saveform_errlist_histdesversaopaisdesenvsocial"></ul>
                <fieldset>
                    <legend>DESENVOLVIMENTO SOCIAL (Assinale se o seu filho(a) faz ou fez quando menor. Caso perdeu a habilidade, mencione com observações)</legend>
                </fieldset>
                <fieldset>
                    <legend>Em que idade começaram os primeiros sorrisos?</legend>
                    <div class="col-md-4">
                    <span class="addh1_idade_prim_sorrisos"></span>
                    <input type="text" name="addh1_idade_prim_sorrisos" id="addh1_idade_prim_sorrisos" class="h1_idade_prim_sorrisos form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh2_olha_p_face_qdobrinca_c_ele">
                      <input type="checkbox" class="h2_olha_p_face_qdobrinca_c_ele checkbox" name="addh2_olha_p_face_qdobrinca_c_ele" id="addh2_olha_p_face_qdobrinca_c_ele"> Virava a cabeça e os olhos para a face do adulto quando esse falava / brincava com ele(a)?</label>
                      <label for="">Observações:</label>
                      <span class="addh2_obs"></span>
                      <textarea name="addh2_obs" id="addh2_obs" cols="30" rows="4" class="h2_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh3_sorriso_esp_pess_familiares">
                      <input type="checkbox" class="h3_sorriso_esp_pess_familiares" name="addh3_sorriso_esp_pess_familiares" id="addh3_sorriso_esp_pess_familiares"> Sorriso espontâneo às pessoas familiares?</label>
                      <label for="">Observações:</label>
                      <span class="addh3_obs"></span>
                      <textarea name="addh3_obs" id="addh3_obs" cols="30" rows="4" class="h3_obs form-control"></textarea>
                    </div>                                    
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh4_sorriso_esp_pess_nfamiliares">
                      <input type="checkbox" class="h4_sorriso_esp_pess_nfamiliares" name="addh4_sorriso_esp_pess_nfamiliares" id="addh4_sorriso_esp_pess_nfamiliares"> Sorriso espontâneo às pessoas não familiares?</label>
                      <label for="">Observações:</label>
                      <span class="addh4_obs"></span>
                      <textarea name="addh4_obs" id="addh4_obs" cols="30" rows="4" class="h4_obs form-control"></textarea>
                    </div>
                </fieldset>                
                <fieldset>
                    <div class="form-group">
                      <label for="addh5_sorria_em_resp_sorriso">
                      <input type="checkbox" class="h5_sorria_em_resp_sorriso" name="addh5_sorria_em_resp_sorriso" id="addh5_sorria_em_resp_sorriso"> Sorria em resposta ao sorriso de outras pessoas?</label>
                      <label for="">Observações:</label>
                      <span class="addh5_obs"></span>
                      <textarea name="addh5_obs" id="addh5_obs" cols="30" rows="4" class="h5_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="addh6_vc_conseg_ident_exp_faciais_nfilho">
                      <input type="checkbox" class="h6_vc_conseg_ident_exp_faciais_nfilho" name="addh6_vc_conseg_ident_exp_faciais_nfilho" id="addh6_vc_conseg_ident_exp_faciais_nfilho"> Você consegue identificar diversas expressões faciais em seu filho(a) (ex.: contentamento, surpresa, medo)?</label>
                      <label for="">Observações:</label>
                      <span class="addh6_obs"></span>
                      <textarea name="addh6_obs" id="addh6_obs" cols="30" rows="4" class="h6_obs form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <div class="form-group">
                      <label for="addh7_apres_expr_emo_contexto">
                      <input type="checkbox" class="h7_apres_expr_emo_contexto" name="addh7_apres_expr_emo_contexto" id="addh7_apres_expr_emo_contexto"> Seu filho(a) apresenta expressões emocionais adequadas ao contexto?</label>
                      <label for="">Observações:</label>
                      <span class="addh7_obs"></span>
                      <textarea name="addh7_obs" id="addh7_obs" cols="30" rows="4" class="h7_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh8_compartilha_interesses">
                      <input type="checkbox" class="h8_compartilha_interesses" name="addh8_compartilha_interesses" id="addh8_compartilha_interesses"> Compartilha interesses, atividades pazerosas com outras pessoas apenas por compartilhar?</label>
                      <label for="">Observações:</label>
                      <span class="addh8_obs"></span>
                      <textarea name="addh8_obs" id="addh8_obs" cols="30" rows="4" class="h8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh9_dem_preoc_cpais">
                      <input type="checkbox" class="h9_dem_preoc_cpais" name="addh9_dem_preoc_cpais" id="addh9_dem_preoc_cpais"> Seu filho(a) demonstra preocupações quando os pais estão doentes ou machucados? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addh9_obs"></span>
                      <textarea name="addh9_obs" id="addh9_obs" cols="30" rows="4" class="h9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh10_fazcoment_verbais_ou_gestos">
                      <input type="checkbox" class="h10_fazcoment_verbais_ou_gestos" name="addh10_fazcoment_verbais_ou_gestos" id="addh10_fazcoment_verbais_ou_gestos"> Seu filho(a) faz comentários verbais ou através de gestos? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addh10_obs"></span>
                      <textarea name="addh10_obs" id="addh10_obs" cols="30" rows="4" class="h10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh11_olha_p_ondevc_olhando">
                      <input type="checkbox" class="h11_olha_p_ondevc_olhando" name="addh11_olha_p_ondevc_olhando" id="addh11_olha_p_ondevc_olhando"> Seu filho(a) olha para onde você está olhando?</label>
                      <label for="">Observações:</label>
                      <span class="addh11_obs"></span>
                      <textarea name="addh11_obs" id="addh11_obs" cols="30" rows="4" class="h11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh12_olha_p_ondevc_aponta">
                      <input type="checkbox" class="h12_olha_p_ondevc_aponta" name="addh12_olha_p_ondevc_aponta" id="addh12_olha_p_ondevc_aponta"> Seu filho(a) Seu filho(a) olha para onde você aponta?</label>
                      <label for="">Observações:</label>
                      <span class="addh12_obs"></span>
                      <textarea name="addh12_obs" id="addh12_obs" cols="30" rows="4" class="h12_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh13_resp_conv_p_brincarcadultos">
                      <input type="checkbox" class="h13_resp_conv_p_brincarcadultos" name="addh13_resp_conv_p_brincarcadultos" id="addh13_resp_conv_p_brincarcadultos"> Seu filho(a) responde aos convites para brincar (adultos)?</label>
                    </div>
                    <div class="form-group">
                      <label for="addh13_apos_insistencia">
                      <input type="checkbox" class="h13_apos_insistencia" name="addh13_apos_insistencia" id="addh13_apos_insistencia"> Após insistência.</label>
                      <label for="">Observações:</label>
                      <span class="addh13_obs"></span>
                      <textarea name="addh13_obs" id="addh13_obs" cols="30" rows="4" class="h13_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh14_resp_conv_p_brincarccriancas">
                      <input type="checkbox" class="h14_resp_conv_p_brincarccriancas" name="addh14_resp_conv_p_brincarccriancas" id="addh14_resp_conv_p_brincarccriancas"> Seu filho(a) responde aos convites de outras crianças para brincar?</label>
                    </div>
                    <div class="form-group">
                      <label for="addh14_apos_insistencia">
                      <input type="checkbox" class="h14_apos_insistencia" name="addh14_apos_insistencia" id="addh14_apos_insistencia"> Após insistência.</label>
                      <label for="">Observações:</label>
                      <span class="addh14_obs"></span>
                      <textarea name="addh14_obs" id="addh14_obs" cols="30" rows="4" class="h14_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh15_busca_comp_out_criancas">
                      <input type="checkbox" class="h15_busca_comp_out_criancas" name="addh15_busca_comp_out_criancas" id="addh15_busca_comp_out_criancas"> Seu filho(a) busca a companhia de outras crianças espontaneamente? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addh15_obs"></span>
                      <textarea name="addh15_obs" id="addh15_obs" cols="30" rows="4" class="h15_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">                      
                      <label for="">Como seu filho(a) reage frente a crianças desconhecidas em uma festa ou casa de amigos?</label>
                      <span class="addh16_cm_reag_a_criancasdesc_festa"></span>
                      <textarea name="addh16_cm_reag_a_criancasdesc_festa" id="addh16_cm_reag_a_criancasdesc_festa" cols="30" rows="4" class="h16_cm_reag_a_criancasdesc_festa form-control"></textarea>
                    </div>
                    <div class="form-group">                      
                      <label for="">Fica ansioso(a)?</label>
                      <span class="addh16_fica_ansioso"></span>
                      <textarea name="addh16_fica_ansioso" id="addh16_fica_ansioso" cols="30" rows="4" class="h16_fica_ansioso form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh17_perm_som_algtipo_brinc">
                      <input type="checkbox" class="h17_perm_som_algtipo_brinc" name="addh17_perm_som_algtipo_brinc" id="addh17_perm_som_algtipo_brinc"> Permanece somente em alguns tipos de brincadeiras? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addh17_obs"></span>
                      <textarea name="addh17_obs" id="addh17_obs" cols="30" rows="4" class="h17_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh18_pref_brinc_par_nfc_vontemgr">
                      <input type="checkbox" class="h18_pref_brinc_par_nfc_vontemgr" name="addh18_pref_brinc_par_nfc_vontemgr" id="addh18_pref_brinc_par_nfc_vontemgr"> Prefere brincadeiras de par, não fica à vontade em grupos? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addh18_obs"></span>
                      <textarea name="addh18_obs" id="addh18_obs" cols="30" rows="4" class="h18_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh19_evita_ctt_c_pessoas">
                      <input type="checkbox" class="h19_evita_ctt_c_pessoas" name="addh19_evita_ctt_c_pessoas" id="addh19_evita_ctt_c_pessoas"> Ignora / evita o contato com pessoas em geral? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="addh19_obs"></span>
                      <textarea name="addh19_obs" id="addh19_obs" cols="30" rows="4" class="h19_obs form-control"></textarea>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdesversaopais_desenvsocial_btn"><img id="imgadd_histdesversaopaisdesenvsocial" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesVersaoPaisDesenvSocial -->

<!-- Inicio EditHistDesVersaoPaisDesenvSocial -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesVersaoPaisDesenvSocial" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdesversaopaisdesenvsocial" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdesversaopaisdesenvsocial" style="color: white;">Histórico do Desenvolvimento Versão Pais - Desenv. Social</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdesversaopaisdesenvsocial" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdesversaopaisdesenvsocial">
                <input type="hidden" id="editatendimentoid_histdesversaopaisdesenvsocial">
                <ul id="updateform_errlist_histdesversaopaisdesenvsocial"></ul>
                <fieldset>
                    <legend>DESENVOLVIMENTO SOCIAL (Assinale se o seu filho(a) faz ou fez quando menor. Caso perdeu a habilidade, mencione com observações)</legend>
                </fieldset>
                <fieldset>
                    <legend>Em que idade começaram os primeiros sorrisos?</legend>
                    <div class="col-md-4">
                    <span class="edith1_idade_prim_sorrisos"></span>
                    <input type="text" name="edith1_idade_prim_sorrisos" id="edith1_idade_prim_sorrisos" class="h1_idade_prim_sorrisos form-control" size="10" maxlength="10">
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith2_olha_p_face_qdobrinca_c_ele">
                      <input type="checkbox" class="h2_olha_p_face_qdobrinca_c_ele checkbox" name="edith2_olha_p_face_qdobrinca_c_ele" id="edith2_olha_p_face_qdobrinca_c_ele"> Virava a cabeça e os olhos para a face do adulto quando esse falava / brincava com ele(a)?</label>
                      <label for="">Observações:</label>
                      <span class="edith2_obs"></span>
                      <textarea name="edith2_obs" id="edith2_obs" cols="30" rows="4" class="h2_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith3_sorriso_esp_pess_familiares">
                      <input type="checkbox" class="h3_sorriso_esp_pess_familiares" name="edith3_sorriso_esp_pess_familiares" id="edith3_sorriso_esp_pess_familiares"> Sorriso espontâneo às pessoas familiares?</label>
                      <label for="">Observações:</label>
                      <span class="edith3_obs"></span>
                      <textarea name="edith3_obs" id="edith3_obs" cols="30" rows="4" class="h3_obs form-control"></textarea>
                    </div>                                    
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith4_sorriso_esp_pess_nfamiliares">
                      <input type="checkbox" class="h4_sorriso_esp_pess_nfamiliares" name="edith4_sorriso_esp_pess_nfamiliares" id="edith4_sorriso_esp_pess_nfamiliares"> Sorriso espontâneo às pessoas não familiares?</label>
                      <label for="">Observações:</label>
                      <span class="edith4_obs"></span>
                      <textarea name="edith4_obs" id="edith4_obs" cols="30" rows="4" class="h4_obs form-control"></textarea>
                    </div>
                </fieldset>                
                <fieldset>
                    <div class="form-group">
                      <label for="edith5_sorria_em_resp_sorriso">
                      <input type="checkbox" class="h5_sorria_em_resp_sorriso" name="edith5_sorria_em_resp_sorriso" id="edith5_sorria_em_resp_sorriso"> Sorria em resposta ao sorriso de outras pessoas?</label>
                      <label for="">Observações:</label>
                      <span class="edith5_obs"></span>
                      <textarea name="edith5_obs" id="edith5_obs" cols="30" rows="4" class="h5_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="edith6_vc_conseg_ident_exp_faciais_nfilho">
                      <input type="checkbox" class="h6_vc_conseg_ident_exp_faciais_nfilho" name="edith6_vc_conseg_ident_exp_faciais_nfilho" id="edith6_vc_conseg_ident_exp_faciais_nfilho"> Você consegue identificar diversas expressões faciais em seu filho(a) (ex.: contentamento, surpresa, medo)?</label>
                      <label for="">Observações:</label>
                      <span class="edith6_obs"></span>
                      <textarea name="edith6_obs" id="edith6_obs" cols="30" rows="4" class="h6_obs form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <div class="form-group">
                      <label for="edith7_apres_expr_emo_contexto">
                      <input type="checkbox" class="h7_apres_expr_emo_contexto" name="edith7_apres_expr_emo_contexto" id="edith7_apres_expr_emo_contexto"> Seu filho(a) apresenta expressões emocionais adequadas ao contexto?</label>
                      <label for="">Observações:</label>
                      <span class="edith7_obs"></span>
                      <textarea name="edith7_obs" id="edith7_obs" cols="30" rows="4" class="h7_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith8_compartilha_interesses">
                      <input type="checkbox" class="h8_compartilha_interesses" name="edith8_compartilha_interesses" id="edith8_compartilha_interesses"> Compartilha interesses, atividades pazerosas com outras pessoas apenas por compartilhar?</label>
                      <label for="">Observações:</label>
                      <span class="edith8_obs"></span>
                      <textarea name="edith8_obs" id="edith8_obs" cols="30" rows="4" class="h8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith9_dem_preoc_cpais">
                      <input type="checkbox" class="h9_dem_preoc_cpais" name="edith9_dem_preoc_cpais" id="edith9_dem_preoc_cpais"> Seu filho(a) demonstra preocupações quando os pais estão doentes ou machucados? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="edith9_obs"></span>
                      <textarea name="edith9_obs" id="edith9_obs" cols="30" rows="4" class="h9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith10_fazcoment_verbais_ou_gestos">
                      <input type="checkbox" class="h10_fazcoment_verbais_ou_gestos" name="edith10_fazcoment_verbais_ou_gestos" id="edith10_fazcoment_verbais_ou_gestos"> Seu filho(a) faz comentários verbais ou através de gestos? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="edith10_obs"></span>
                      <textarea name="edith10_obs" id="edith10_obs" cols="30" rows="4" class="h10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith11_olha_p_ondevc_olhando">
                      <input type="checkbox" class="h11_olha_p_ondevc_olhando" name="edith11_olha_p_ondevc_olhando" id="edith11_olha_p_ondevc_olhando"> Seu filho(a) olha para onde você está olhando?</label>
                      <label for="">Observações:</label>
                      <span class="edith11_obs"></span>
                      <textarea name="edith11_obs" id="edith11_obs" cols="30" rows="4" class="h11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith12_olha_p_ondevc_aponta">
                      <input type="checkbox" class="h12_olha_p_ondevc_aponta" name="edith12_olha_p_ondevc_aponta" id="edith12_olha_p_ondevc_aponta"> Seu filho(a) Seu filho(a) olha para onde você aponta?</label>
                      <label for="">Observações:</label>
                      <span class="edith12_obs"></span>
                      <textarea name="edith12_obs" id="edith12_obs" cols="30" rows="4" class="h12_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith13_resp_conv_p_brincarcadultos">
                      <input type="checkbox" class="h13_resp_conv_p_brincarcadultos" name="edith13_resp_conv_p_brincarcadultos" id="edith13_resp_conv_p_brincarcadultos"> Seu filho(a) responde aos convites para brincar (adultos)?</label>
                    </div>
                    <div class="form-group">
                      <label for="edith13_apos_insistencia">
                      <input type="checkbox" class="h13_apos_insistencia" name="edith13_apos_insistencia" id="edith13_apos_insistencia"> Após insistência.</label>
                      <label for="">Observações:</label>
                      <span class="edith13_obs"></span>
                      <textarea name="edith13_obs" id="edith13_obs" cols="30" rows="4" class="h13_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith14_resp_conv_p_brincarccriancas">
                      <input type="checkbox" class="h14_resp_conv_p_brincarccriancas" name="edith14_resp_conv_p_brincarccriancas" id="edith14_resp_conv_p_brincarccriancas"> Seu filho(a) responde aos convites de outras crianças para brincar?</label>
                    </div>
                    <div class="form-group">
                      <label for="edith14_apos_insistencia">
                      <input type="checkbox" class="h14_apos_insistencia" name="edith14_apos_insistencia" id="edith14_apos_insistencia"> Após insistência.</label>
                      <label for="">Observações:</label>
                      <span class="edith14_obs"></span>
                      <textarea name="edith14_obs" id="edith14_obs" cols="30" rows="4" class="h14_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith15_busca_comp_out_criancas">
                      <input type="checkbox" class="h15_busca_comp_out_criancas" name="edith15_busca_comp_out_criancas" id="edith15_busca_comp_out_criancas"> Seu filho(a) busca a companhia de outras crianças espontaneamente? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="edith15_obs"></span>
                      <textarea name="edith15_obs" id="edith15_obs" cols="30" rows="4" class="h15_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">                      
                      <label for="">Como seu filho(a) reage frente a crianças desconhecidas em uma festa ou casa de amigos?</label>
                      <span class="edith16_cm_reag_a_criancasdesc_festa"></span>
                      <textarea name="edith16_cm_reag_a_criancasdesc_festa" id="edith16_cm_reag_a_criancasdesc_festa" cols="30" rows="4" class="h16_cm_reag_a_criancasdesc_festa form-control"></textarea>
                    </div>
                    <div class="form-group">                      
                      <label for="">Fica ansioso(a)?</label>
                      <span class="edith16_fica_ansioso"></span>
                      <textarea name="edith16_fica_ansioso" id="edith16_fica_ansioso" cols="30" rows="4" class="h16_fica_ansioso form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith17_perm_som_algtipo_brinc">
                      <input type="checkbox" class="h17_perm_som_algtipo_brinc" name="edith17_perm_som_algtipo_brinc" id="edith17_perm_som_algtipo_brinc"> Permanece somente em alguns tipos de brincadeiras? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="edith17_obs"></span>
                      <textarea name="edith17_obs" id="edith17_obs" cols="30" rows="4" class="h17_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith18_pref_brinc_par_nfc_vontemgr">
                      <input type="checkbox" class="h18_pref_brinc_par_nfc_vontemgr" name="edith18_pref_brinc_par_nfc_vontemgr" id="edith18_pref_brinc_par_nfc_vontemgr"> Prefere brincadeiras de par, não fica à vontade em grupos? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="edith18_obs"></span>
                      <textarea name="edith18_obs" id="edith18_obs" cols="30" rows="4" class="h18_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith19_evita_ctt_c_pessoas">
                      <input type="checkbox" class="h19_evita_ctt_c_pessoas" name="edith19_evita_ctt_c_pessoas" id="edith19_evita_ctt_c_pessoas"> Ignora / evita o contato com pessoas em geral? Dê um exemplo.</label>
                      <label for="">Observações:</label>
                      <span class="edith19_obs"></span>
                      <textarea name="edith19_obs" id="edith19_obs" cols="30" rows="4" class="h19_obs form-control"></textarea>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdesversaopaisdesenvsocial_btn"><img id="imgedit_histdesversaopaisdesenvsocial" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesVersaoPaisDesenvSocial -->


<!-- Inicio AddHistDesVersaoPaisLinguagem -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesVersaoPaisLinguagem" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_HistDesVersaoPaisLinguagem" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_HistDesVersaoPaisLinguagem" style="color: white;">Histórico do Desenvolvimento Versão Pais - Linguagem</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdesversaopaislinguagem" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdesversaopaislinguagem">
                <input type="hidden" id="addatendimentoid_histdesversaopaislinguagem">
                <ul id="saveform_errlist_histdesversaopaislinguagem"></ul>
                <fieldset>
                    <legend>Idade das primeiras vocalizações:</legend>
                    <div class="col-md-4">
                    <span class="adde1idade_prim_vocalizacoes"></span>
                    <input type="text" name="adde1idade_prim_vocalizacoes" id="adde1idade_prim_vocalizacoes" class="e1idade_prim_vocalizacoes form-control" size="10" maxlength="10">
                    </div>
                    <div class="form-group">
                      <label for="adde1naoapresentou">
                      <input type="checkbox" class="e1naoapresentou checkbox" name="adde1naoapresentou" id="adde1naoapresentou"> Não apresentou</label>
                    </div>
                    <div class="col-md-10">
                    <label for="adde1quais">Quais?</label>
                    <span class="adde1quais"></span>
                    <input type="text" name="adde1quais" id="adde1quais" class="e1quais form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Idade das primeiras palavras:</legend>
                    <div class="col-md-4">
                    <span class="adde2idade_prim_palavras"></span>
                    <input type="text" name="adde2idade_prim_palavras" id="adde2idade_prim_palavras" class="e2idade_prim_palavras form-control" size="10" maxlength="10">
                    </div>
                    <div class="form-group">
                      <label for="adde2naoapresentou">
                      <input type="checkbox" class="e2naoapresentou checkbox" name="adde2naoapresentou" id="adde2naoapresentou"> Não apresentou</label>
                    </div>
                    <div class="col-md-10">
                    <label for="adde2quais">Quais?</label>
                    <span class="adde2quais"></span>
                    <input type="text" name="adde2quais" id="adde2quais" class="e2quais form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Idade das primeiras frases:</legend>
                    <div class="col-md-4">
                    <span class="adde3idade_prim_frases"></span>
                    <input type="text" name="adde3idade_prim_frases" id="adde3idade_prim_frases" class="e3idade_prim_frases form-control" size="10" maxlength="10">
                    </div>
                    <div class="form-group">
                      <label for="adde3naoapresentou">
                      <input type="checkbox" class="e3naoapresentou checkbox" name="adde3naoapresentou" id="adde3naoapresentou"> Não apresentou</label>
                    </div>
                    <div class="col-md-10">
                    <label for="adde3quais">Quais?</label>
                    <span class="adde3quais"></span>
                    <input type="text" name="adde3quais" id="adde3quais" class="e3quais form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Você considera que há algum atraso?</legend>
                    <span class="addconsidera_que_ha_alg_atraso"></span>
                    <textarea name="addconsidera_que_ha_alg_atraso" id="addconsidera_que_ha_alg_atraso" cols="30" rows="4" class="considera_que_ha_alg_atraso form-control"></textarea>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                                <label for="addaponta_para_pedir_algo">
                                <input type="checkbox" class="aponta_para_pedir_algo checkbox" name="addaponta_para_pedir_algo" id="addaponta_para_pedir_algo"> Aponta com o dedo indicador para pedir algo?</label>
                    </div>                
                    <div class="form-group">
                                <label for="addaponta_para_compartilhar">
                                <input type="checkbox" class="aponta_para_compartilhar checkbox" name="addaponta_para_compartilhar" id="addaponta_para_compartilhar"> Aponta com o dedo para compartilhar?</label>
                    </div>                                   
                    <div class="form-group">
                                <label for="addsim_assentindo_c_cabeca">
                                <input type="checkbox" class="sim_assentindo_c_cabeca checkbox" name="addsim_assentindo_c_cabeca" id="addsim_assentindo_c_cabeca"> Sim assentindo com a cabeça.</label>
                    </div>                
                    <div class="form-group">
                                <label for="addmandar_beijos">
                                <input type="checkbox" class="mandar_beijos checkbox" name="addmandar_beijos" id="addmandar_beijos"> Mandar beijos.</label>
                    </div>
                    <div class="form-group">
                                <label for="addda_tchau">
                                <input type="checkbox" class="da_tchau checkbox" name="addda_tchau" id="addda_tchau"> Dá tchau.</label>
                    </div>
                    <div class="form-group">
                                <label for="addnega_c_cabeca">
                                <input type="checkbox" class="nega_c_cabeca checkbox" name="addnega_c_cabeca" id="addnega_c_cabeca"> Negação com a cabeça.</label>
                    </div>
                    <div class="form-group">
                                <label for="addbate_palmas">
                                <input type="checkbox" class="bate_palmas checkbox" name="addbate_palmas" id="addbate_palmas"> Bate palmas.</label>
                    </div>
                    <div class="form-group">
                                <label for="addeleva_bracos_pedcolo">
                                <input type="checkbox" class="eleva_bracos_pedcolo checkbox" name="addeleva_bracos_pedcolo" id="addeleva_bracos_pedcolo"> Eleva os braços para pedir colo?</label>
                    </div>
                    <div class="form-group">
                                <label for="addsacode_indicador_pdizer_nao">
                                <input type="checkbox" class="sacode_indicador_pdizer_nao checkbox" name="addsacode_indicador_pdizer_nao" id="addsacode_indicador_pdizer_nao"> Sacode o dedo indicador para dizer não?</label>
                    </div>
                    <div class="form-group">
                                <label for="addpuxvcpela_mao_paraabpg_coisas">
                                <input type="checkbox" class="puxvcpela_mao_paraabpg_coisas checkbox" name="addpuxvcpela_mao_paraabpg_coisas" id="addpuxvcpela_mao_paraabpg_coisas"> Puxa você pela mão para abrir ou pegar coisas?</label>
                    </div>
                    <div class="form-group">
                                <label for="addvcjapensou_qseufilho_surdo">
                                <input type="checkbox" class="vcjapensou_qseufilho_surdo checkbox" name="addvcjapensou_qseufilho_surdo" id="addvcjapensou_qseufilho_surdo"> Você já pensou que seu filho(a) pudesse ser surdo(a)?</label>
                    </div>
                    <div class="form-group">
                                <label for="addimita_gracinhas">
                                <input type="checkbox" class="imita_gracinhas checkbox" name="addimita_gracinhas" id="addimita_gracinhas"> Imita gracinhas?</label>
                    </div>
                    <div class="form-group">
                                <label for="addseg_seurosto_polhar_palgdirecao">
                                <input type="checkbox" class="seg_seurosto_polhar_palgdirecao checkbox" name="addseg_seurosto_polhar_palgdirecao" id="addseg_seurosto_polhar_palgdirecao"> Segura o seu rosto para olhar para alguma direção?</label>
                    </div>
                    <div class="form-group">
                                <label for="addatend_champnome">
                                <input type="checkbox" class="atend_champnome checkbox" name="addatend_champnome" id="addatend_champnome"> Atende quando chamado pelo nome?    </label>
                                <label for="addsomente_c_insistencia">
                                <input type="checkbox" class="somente_c_insistencia checkbox" name="addsomente_c_insistencia" id="addsomente_c_insistencia"> Somente com insistência.</label>
                    </div>                    
                    <div class="form-group">
                                <label for="addpessestranhas_compseufilho_fala">
                                <input type="checkbox" class="pessestranhas_compseufilho_fala checkbox" name="addpessestranhas_compseufilho_fala" id="addpessestranhas_compseufilho_fala"> As pessoas estranhas compreendem o que seu filho(a) fala?</label>
                    </div>                    
                    <div class="form-group">
                                <label for="addg16seufilho_costrepultpal_ouvida">
                                <input type="checkbox" class="g16seufilho_costrepultpal_ouvida checkbox" name="addg16seufilho_costrepultpal_ouvida" id="addg16seufilho_costrepultpal_ouvida"> Seu filho(a) costuma repetir a última palavra ou frase imediatamente ouvida?   </label>
                                <label for="addg16as_vezes">
                                <input type="checkbox" class="g16as_vezes" name="addg16as_vezes" id="addg16as_vezes"> Às vezes.</label>
                    </div>                    
                </fieldset>                
                <fieldset>
                    <legend>Como você avalia a fala do seu filho(a)?</legend>
                    <div class="form-group">
                                <label for="addfala_baixa">
                                <input type="checkbox" class="fala_baixa" name="addfala_baixa" id="addfala_baixa"> Fala baixa.</label>
                    </div>
                    <div class="form-group">
                                <label for="addfala_monotona">
                                <input type="checkbox" class="fala_monotona" name="addfala_monotona" id="addfala_monotona"> Fala monótona.</label>
                    </div>
                    <div class="form-group">
                                <label for="addfala_alta">
                                <input type="checkbox" class="fala_alta" name="addfala_alta" id="addfala_alta"> Fala alta.</label>
                    </div>                    
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                                <label for="addg18cost_rep_frases_ouvidas">
                                <input type="checkbox" class="g18cost_rep_frases_ouvidas" name="addg18cost_rep_frases_ouvidas" id="addg18cost_rep_frases_ouvidas"> Seu filho(a) costuma repetir frases ouvidas?   </label>
                                <label for="addg18as_vezes">
                                <input type="checkbox" class="g18as_vezes" name="addg18as_vezes" id="addg18as_vezes"> Às vezes.</label>
                    </div>                    
                    <div class="form-group">
                                <label for="addg19comb_palaforma_estranha">
                                <input type="checkbox" class="g19comb_palaforma_estranha" name="addg19comb_palaforma_estranha" id="addg19comb_palaforma_estranha"> Seu filho(a) combina palavras de forma estranha?   </label>
                                <label for="addg19as_vezes">
                                <input type="checkbox" class="g19as_vezes" name="addg19as_vezes" id="addg19as_vezes"> Às vezes.</label>
                    </div>                    
                    <div class="form-group">
                                <label for="addg20cost_insist_pvc_dizer_palavras">
                                <input type="checkbox" class="g20cost_insist_pvc_dizer_palavras" name="addg20cost_insist_pvc_dizer_palavras" id="addg20cost_insist_pvc_dizer_palavras"> Seu filho(a) costuma insistir para você dizer palavras?   </label>
                                <label for="addg20as_vezes">
                                <input type="checkbox" class="g20as_vezes" name="addg20as_vezes" id="addg20as_vezes"> Às vezes.</label>
                    </div>                    
                    <div class="form-group">
                                <label for="addg21cost_comen_inapropriado">
                                <input type="checkbox" class="g21cost_comen_inapropriado" name="addg21cost_comen_inapropriado" id="addg21cost_comen_inapropriado"> Seu filho(a) costuma fazer comentários inapropriados?   </label>
                                <label for="addg21as_vezes">
                                <input type="checkbox" class="g21as_vezes" name="addg21as_vezes" id="addg21as_vezes"> Às vezes.</label>
                    </div>                    
                </fieldset>    
                <fieldset>
                    <legend>Dê exemplos:</legend>
                    <span class="addg21_de_exemplos"></span>
                    <textarea name="addg21_de_exemplos" id="addg21_de_exemplos" cols="30" rows="4" class="g21_de_exemplos form-control"></textarea>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdesversaopais_linguagem_btn"><img id="imgaddanamnese_histdesversaopaislinguagem" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesVersaoPaisLinguagem -->

<!-- Inicio EditHistDesVersaoPaisLinguagem -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesVersaoPaisLinguagem" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdesversaopaislinguagem" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdesversaopaislinguagem" style="color: white;">Histórico do Desenvolvimento Versão Pais - Linguagem</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdesversaopaislinguagem" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdesversaopaislinguagem">
                <input type="hidden" id="editatendimentoid_histdesversaopaislinguagem">
                <ul id="updateform_errlist_histdesversaopaislinguagem"></ul>
                  <fieldset>
                    <legend>Idade das primeiras vocalizações:</legend>
                    <div class="col-md-4">
                    <span class="edite1idade_prim_vocalizacoes"></span>
                    <input type="text" name="edite1idade_prim_vocalizacoes" id="edite1idade_prim_vocalizacoes" class="e1idade_prim_vocalizacoes form-control" size="10" maxlength="10">
                    </div>
                    <div class="form-group">
                      <label for="edite1naoapresentou">
                      <input type="checkbox" class="e1naoapresentou checkbox" name="edite1naoapresentou" id="edite1naoapresentou"> Não apresentou</label>
                    </div>
                    <div class="col-md-10">
                    <label for="edite1quais">Quais?</label>
                    <span class="edite1quais"></span>
                    <input type="text" name="edite1quais" id="edite1quais" class="e1quais form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Idade das primeiras palavras:</legend>
                    <div class="col-md-4">
                    <span class="edite2idade_prim_palavras"></span>
                    <input type="text" name="edite2idade_prim_palavras" id="edite2idade_prim_palavras" class="e2idade_prim_palavras form-control" size="10" maxlength="10">
                    </div>
                    <div class="form-group">
                      <label for="edite2naoapresentou">
                      <input type="checkbox" class="e2naoapresentou checkbox" name="edite2naoapresentou" id="edite2naoapresentou"> Não apresentou</label>
                    </div>
                    <div class="col-md-10">
                    <label for="edite2quais">Quais?</label>
                    <span class="edite2quais"></span>
                    <input type="text" name="edite2quais" id="edite2quais" class="e2quais form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Idade das primeiras frases:</legend>
                    <div class="col-md-4">
                    <span class="edite3idade_prim_frases"></span>
                    <input type="text" name="edite3idade_prim_frases" id="edite3idade_prim_frases" class="e3idade_prim_frases form-control" size="10" maxlength="10">
                    </div>
                    <div class="form-group">
                      <label for="edite3naoapresentou">
                      <input type="checkbox" class="e3naoapresentou checkbox" name="edite3naoapresentou" id="edite3naoapresentou"> Não apresentou</label>
                    </div>
                    <div class="col-md-10">
                    <label for="edite3quais">Quais?</label>
                    <span class="edite3quais"></span>
                    <input type="text" name="edite3quais" id="edite3quais" class="e3quais form-control" size="50" maxlength="50">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Você considera que há algum atraso?</legend>
                    <span class="editconsidera_que_ha_alg_atraso"></span>
                    <textarea name="editconsidera_que_ha_alg_atraso" id="editconsidera_que_ha_alg_atraso" cols="30" rows="4" class="considera_que_ha_alg_atraso form-control"></textarea>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                                <label for="editaponta_para_pedir_algo">
                                <input type="checkbox" class="aponta_para_pedir_algo checkbox" name="editaponta_para_pedir_algo" id="editaponta_para_pedir_algo"> Aponta com o dedo indicador para pedir algo?</label>
                    </div>                
                    <div class="form-group">
                                <label for="editaponta_para_compartilhar">
                                <input type="checkbox" class="aponta_para_compartilhar checkbox" name="editaponta_para_compartilhar" id="editaponta_para_compartilhar"> Aponta com o dedo para compartilhar?</label>
                    </div>                                   
                    <div class="form-group">
                                <label for="editsim_assentindo_c_cabeca">
                                <input type="checkbox" class="sim_assentindo_c_cabeca checkbox" name="editsim_assentindo_c_cabeca" id="editsim_assentindo_c_cabeca"> SIM assentindo com a cabeça.</label>
                    </div>                
                    <div class="form-group">
                                <label for="editmandar_beijos">
                                <input type="checkbox" class="mandar_beijos checkbox" name="editmandar_beijos" id="editmandar_beijos"> Mandar beijos.</label>
                    </div>
                    <div class="form-group">
                                <label for="editda_tchau">
                                <input type="checkbox" class="da_tchau checkbox" name="editda_tchau" id="editda_tchau"> Dá tchau.</label>
                    </div>
                    <div class="form-group">
                                <label for="editnega_c_cabeca">
                                <input type="checkbox" class="nega_c_cabeca checkbox" name="editnega_c_cabeca" id="editnega_c_cabeca"> Negação com a cabeça.</label>
                    </div>
                    <div class="form-group">
                                <label for="editbate_palmas">
                                <input type="checkbox" class="bate_palmas checkbox" name="editbate_palmas" id="editbate_palmas"> Bate palmas.</label>
                    </div>
                    <div class="form-group">
                                <label for="editeleva_bracos_pedcolo">
                                <input type="checkbox" class="eleva_bracos_pedcolo checkbox" name="editeleva_bracos_pedcolo" id="editeleva_bracos_pedcolo"> Eleva os braços para pedir colo?</label>
                    </div>
                    <div class="form-group">
                                <label for="editsacode_indicador_pdizer_nao">
                                <input type="checkbox" class="sacode_indicador_pdizer_nao checkbox" name="editsacode_indicador_pdizer_nao" id="editsacode_indicador_pdizer_nao"> Sacode o dedo indicador para dizer não?</label>
                    </div>
                    <div class="form-group">
                                <label for="editpuxvcpela_mao_paraabpg_coisas">
                                <input type="checkbox" class="puxvcpela_mao_paraabpg_coisas checkbox" name="editpuxvcpela_mao_paraabpg_coisas" id="editpuxvcpela_mao_paraabpg_coisas"> Puxa você pela mão para abrir ou pegar coisas?</label>
                    </div>
                    <div class="form-group">
                                <label for="editvcjapensou_qseufilho_surdo">
                                <input type="checkbox" class="vcjapensou_qseufilho_surdo checkbox" name="editvcjapensou_qseufilho_surdo" id="editvcjapensou_qseufilho_surdo"> Você já pensou que seu filho(a) pudesse ser surdo(a)?</label>
                    </div>
                    <div class="form-group">
                                <label for="editimita_gracinhas">
                                <input type="checkbox" class="imita_gracinhas checkbox" name="editimita_gracinhas" id="editimita_gracinhas"> Imita gracinhas?</label>
                    </div>
                    <div class="form-group">
                                <label for="editseg_seurosto_polhar_palgdirecao">
                                <input type="checkbox" class="seg_seurosto_polhar_palgdirecao checkbox" name="editseg_seurosto_polhar_palgdirecao" id="editseg_seurosto_polhar_palgdirecao"> Segura o seu rosto para olhar para alguma direção?</label>
                    </div>
                    <div class="form-group">
                                <label for="editatend_champnome">
                                <input type="checkbox" class="atend_champnome checkbox" name="editatend_champnome" id="editatend_champnome"> Atende quando chamado pelo nome?    </label>
                                <label for="editsomente_c_insistencia">
                                <input type="checkbox" class="somente_c_insistencia checkbox" name="editsomente_c_insistencia" id="editsomente_c_insistencia"> Somente com insistência.</label>
                    </div>                    
                    <div class="form-group">
                                <label for="editpessestranhas_compseufilho_fala">
                                <input type="checkbox" class="pessestranhas_compseufilho_fala checkbox" name="editpessestranhas_compseufilho_fala" id="editpessestranhas_compseufilho_fala"> As pessoas estranhas compreendem o que seu filho(a) fala?</label>
                    </div>                    
                    <div class="form-group">
                                <label for="editg16seufilho_costrepultpal_ouvida">
                                <input type="checkbox" class="g16seufilho_costrepultpal_ouvida checkbox" name="editg16seufilho_costrepultpal_ouvida" id="editg16seufilho_costrepultpal_ouvida"> Seu filho(a) costuma repetir a última palavra ou frase imediatamente ouvida?   </label>
                                <label for="editg16as_vezes">
                                <input type="checkbox" class="g16as_vezes" name="editg16as_vezes" id="editg16as_vezes"> Às vezes.</label>
                    </div>                    
                </fieldset>                
                <fieldset>
                    <legend>Como você avalia a fala do seu filho(a)?</legend>
                    <div class="form-group">
                                <label for="editfala_baixa">
                                <input type="checkbox" class="fala_baixa" name="editfala_baixa" id="editfala_baixa"> Fala baixa.</label>
                    </div>
                    <div class="form-group">
                                <label for="editfala_monotona">
                                <input type="checkbox" class="fala_monotona" name="editfala_monotona" id="editfala_monotona"> Fala monótona.</label>
                    </div>
                    <div class="form-group">
                                <label for="editfala_alta">
                                <input type="checkbox" class="fala_alta" name="editfala_alta" id="editfala_alta"> Fala alta.</label>
                    </div>                    
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                                <label for="editg18cost_rep_frases_ouvidas">
                                <input type="checkbox" class="g18cost_rep_frases_ouvidas" name="editg18cost_rep_frases_ouvidas" id="editg18cost_rep_frases_ouvidas"> Seu filho(a) costuma repetir frases ouvidas?   </label>
                                <label for="editg18as_vezes">
                                <input type="checkbox" class="g18as_vezes" name="editg18as_vezes" id="editg18as_vezes"> Às vezes.</label>
                    </div>                    
                    <div class="form-group">
                                <label for="editg19comb_palaforma_estranha">
                                <input type="checkbox" class="g19comb_palaforma_estranha" name="editg19comb_palaforma_estranha" id="editg19comb_palaforma_estranha"> Seu filho(a) combina palavras de forma estranha?   </label>
                                <label for="editg19as_vezes">
                                <input type="checkbox" class="g19as_vezes" name="editg19as_vezes" id="editg19as_vezes"> Às vezes.</label>
                    </div>                    
                    <div class="form-group">
                                <label for="editg20cost_insist_pvc_dizer_palavras">
                                <input type="checkbox" class="g20cost_insist_pvc_dizer_palavras" name="editg20cost_insist_pvc_dizer_palavras" id="editg20cost_insist_pvc_dizer_palavras"> Seu filho(a) costuma insistir para você dizer palavras?   </label>
                                <label for="editg20as_vezes">
                                <input type="checkbox" class="g20as_vezes" name="editg20as_vezes" id="editg20as_vezes"> Às vezes.</label>
                    </div>                    
                    <div class="form-group">
                                <label for="editg21cost_comen_inapropriado">
                                <input type="checkbox" class="g21cost_comen_inapropriado" name="editg21cost_comen_inapropriado" id="editg21cost_comen_inapropriado"> Seu filho(a) costuma fazer comentários inapropriados?   </label>
                                <label for="editg21as_vezes">
                                <input type="checkbox" class="g21as_vezes" name="editg21as_vezes" id="editg21as_vezes"> Às vezes.</label>
                    </div>                    
                </fieldset>    
                <fieldset>
                    <legend>Dê exemplos:</legend>
                    <span class="editg21_de_exemplos"></span>
                    <textarea name="editg21_de_exemplos" id="editg21_de_exemplos" cols="30" rows="4" class="g21_de_exemplos form-control"></textarea>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdesversaopaislinguagem_btn"><img id="imgeditanamnese_histdesversaopaislinguagem" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesVersaoPaisLinguagem -->

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
                                        <li class="dropdown-item bg-light"><a href="#" class="histdes_versaopais_linguagem dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
                                            @if($count_histdes_versaopais_linguagem)<i data-id="1" id="histdes_versaopais_linguagem{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_linguagem{{$atendimento->id}}"></i>@endif Linguagem</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="histdes_versaopais_desenvsocial dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
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
                            $(".gestacao_planejada").attr('checked',response.anamnese_hist_pregressa.gestacao_planejada);                            
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
        data.append('_method','PUT');        

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
                    $("#EditHistDesVersaoPaisInicial").modal('hide');    
                }
            }
        });
    });

//fim histdes_versaopais_inicial

//início histdes_versaopais_linguagem

$("#AddAHistDesVersaoPaisLinguagem").on('shown.bs.modal',function(){
            $(".e1idade_prim_vocalizacoes").focus();
    });

$("#EditHistDesVersaoPaisLinguagem").on('shown.bs.modal',function(){
            $(".e1idade_prim_vocalizacoes").focus();
    });

//inicio conta caracteres dos textarea HistDesVersaoPaisLinguagem

    //add

    $(document).on('input','#adde1idade_prim_vocalizacoes',function(){
        var limite = 10;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var idade_prim_vocalizacoes = $('input[name="adde1idade_prim_vocalizacoes"]').val();
            $('input[name="adde1idade_prim_vocalizacoes"]').val(idade_prim_vocalizacoes.substr(0,limite));
            $(".adde1idade_prim_vocalizacoes").text("0" + " " + informativo);
        }else{
            $(".adde1idade_prim_vocalizacoes").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#adde1quais',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var e1quais = $('input[name="adde1quais"]').val();
            $('input[name="adde1quais"]').val(e1quais.substr(0,limite));
            $(".adde1quais").text("0" + " " + informativo);
        }else{
            $(".adde1quais").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#adde2idade_prim_palavras',function(){
        var limite = 10;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var e2idade_prim_palavras = $('input[name="adde2idade_prim_palavras"]').val();
            $('input[name="adde2idade_prim_palavras"]').val(e2idade_prim_palavras.substr(0,limite));
            $(".adde2idade_prim_palavras").text("0" + " " + informativo);
        }else{
            $(".adde2idade_prim_palavras").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#adde2quais',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var e2quais = $('input[name="adde2quais"]').val();
            $('input[name="adde2quais"]').val(e2quais.substr(0,limite));
            $(".adde2quais").text("0" + " " + informativo);
        }else{
            $(".adde2quais").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#adde3idade_prim_frases',function(){
        var limite = 10;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var e3idade_prim_frases = $('input[name="adde3idade_prim_frases"]').val();
            $('input[name="adde3idade_prim_frases"]').val(e3idade_prim_frases.substr(0,limite));
            $(".adde3idade_prim_frases").text("0" + " " + informativo);
        }else{
            $(".adde3idade_prim_frases").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#adde3quais',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var e3quais = $('input[name="adde3quais"]').val();
            $('input[name="adde3quais"]').val(e3quais.substr(0,limite));
            $(".adde3quais").text("0" + " " + informativo);
        }else{
            $(".adde3quais").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addconsidera_que_ha_alg_atraso',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var considera_que_ha_alg_atraso = $('textarea[name="addconsidera_que_ha_alg_atraso"]').val();
            $('textarea[name="addconsidera_que_ha_alg_atraso"]').val(considera_que_ha_alg_atraso.substr(0,limite));
            $(".addconsidera_que_ha_alg_atraso").text("0" + " " + informativo);
        }else{
            $(".addconsidera_que_ha_alg_atraso").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addg21_de_exemplos',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var g21_de_exemplos = $('textarea[name="addg21_de_exemplos"]').val();
            $('textarea[name="addg21_de_exemplos"]').val(g21_de_exemplos.substr(0,limite));
            $(".addg21_de_exemplos").text("0" + " " + informativo);
        }else{
            $(".addg21_de_exemplos").text(caracteresRestantes + " " + informativo);
        }
    });

//edit

  $(document).on('input','#edite1idade_prim_vocalizacoes',function(){
        var limite = 10;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var idade_prim_vocalizacoes = $('input[name="edite1idade_prim_vocalizacoes"]').val();
            $('input[name="edite1idade_prim_vocalizacoes"]').val(idade_prim_vocalizacoes.substr(0,limite));
            $(".edite1idade_prim_vocalizacoes").text("0" + " " + informativo);
        }else{
            $(".edite1idade_prim_vocalizacoes").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edite1quais',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var e1quais = $('input[name="edite1quais"]').val();
            $('input[name="edite1quais"]').val(e1quais.substr(0,limite));
            $(".edite1quais").text("0" + " " + informativo);
        }else{
            $(".edite1quais").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edite2idade_prim_palavras',function(){
        var limite = 10;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var e2idade_prim_palavras = $('input[name="edite2idade_prim_palavras"]').val();
            $('input[name="edite2idade_prim_palavras"]').val(e2idade_prim_palavras.substr(0,limite));
            $(".edite2idade_prim_palavras").text("0" + " " + informativo);
        }else{
            $(".edite2idade_prim_palavras").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edite2quais',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var e2quais = $('input[name="edite2quais"]').val();
            $('input[name="edite2quais"]').val(e2quais.substr(0,limite));
            $(".edite2quais").text("0" + " " + informativo);
        }else{
            $(".edite2quais").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edite3idade_prim_frases',function(){
        var limite = 10;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var e3idade_prim_frases = $('input[name="edite3idade_prim_frases"]').val();
            $('input[name="edite3idade_prim_frases"]').val(e3idade_prim_frases.substr(0,limite));
            $(".edite3idade_prim_frases").text("0" + " " + informativo);
        }else{
            $(".edite3idade_prim_frases").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edite3quais',function(){
        var limite = 50;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var e3quais = $('input[name="edite3quais"]').val();
            $('input[name="edite3quais"]').val(e3quais.substr(0,limite));
            $(".edite3quais").text("0" + " " + informativo);
        }else{
            $(".edite3quais").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editconsidera_que_ha_alg_atraso',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var considera_que_ha_alg_atraso = $('textarea[name="editconsidera_que_ha_alg_atraso"]').val();
            $('textarea[name="editconsidera_que_ha_alg_atraso"]').val(considera_que_ha_alg_atraso.substr(0,limite));
            $(".editconsidera_que_ha_alg_atraso").text("0" + " " + informativo);
        }else{
            $(".editconsidera_que_ha_alg_atraso").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editg21_de_exemplos',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var g21_de_exemplos = $('textarea[name="editg21_de_exemplos"]').val();
            $('textarea[name="editg21_de_exemplos"]').val(g21_de_exemplos.substr(0,limite));
            $(".editg21_de_exemplos").text("0" + " " + informativo);
        }else{
            $(".editg21_de_exemplos").text(caracteresRestantes + " " + informativo);
        }
    });



$(document).on('click','.histdes_versaopais_linguagem',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_histdes_versaopais_linguagem = $("#histdes_versaopais_linguagem"+atendimentoid).data("id");

        if(opcao_form_histdes_versaopais_linguagem==0){
                $("#addpacienteid_histdesversaopaislinguagem").val(pacienteid);
                $("#addatendimentoid_histdesversaopaislinguagem").val(atendimentoid);
                $("#addform_histdesversaopaislinguagem").trigger('reset');
                $("#AddHistDesVersaoPaisLinguagem").modal('show'); 
                $("#saveform_errList_histdesversaopaislinguagem").replaceWith('<ul id="saveform_errList_histdesversaopaislinguagem"></ul>');
        }else{            
                $("#editpacienteid_histdesversaopaislinguagem").val(pacienteid);
                $("#editatendimentoid_histdesversaopaislinguagem").val(atendimentoid);
                $("#editform_histdesversaopaislinguagem").trigger('reset');
                $("#EditHistDesVersaoPaisLinguagem").modal('show'); 
                $("#updateform_errList_histdesversaopaislinguagem").replaceWith('<ul id="updateform_errList_histdesversaopaislinguagem"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_histdesversaopaislinguagem/'+pacienteid,                                
                    success: function(response){           
                        if(response.status==200){                            
                            $(".e1idade_prim_vocalizacoes").val(response.histdesversaopaislinguagem.e1_idade_prim_vocalizacoes);                            
                            $(".e1naoapresentou").attr('checked',response.histdesversaopaislinguagem.e1_naoapresentou);
                            $(".e1quais").val(response.histdesversaopaislinguagem.e1_quais);
                            $(".e2idade_prim_palavras").val(response.histdesversaopaislinguagem.e2_idade_prim_palavras);
                            $(".e2naoapresentou").attr('checked',response.histdesversaopaislinguagem.e2_naoapresentou);
                            $(".e2quais").val(response.histdesversaopaislinguagem.e2_quais);
                            $(".e3idade_prim_frases").val(response.histdesversaopaislinguagem.e3_idade_prim_frases);
                            $(".e3naoapresentou").attr('checked',response.histdesversaopaislinguagem.e3_naoapresentou);
                            $(".e3quais").val(response.histdesversaopaislinguagem.e3_quais);
                            $(".considera_que_ha_alg_atraso").val(response.histdesversaopaislinguagem.f_considera_que_ha_alg_atraso);
                            $(".aponta_para_pedir_algo").attr('checked',response.histdesversaopaislinguagem.g1_aponta_para_pedir_algo);
                            $(".aponta_para_compartilhar").attr('checked',response.histdesversaopaislinguagem.g2_aponta_para_compartilhar);
                            $(".sim_assentindo_c_cabeca").attr('checked',response.histdesversaopaislinguagem.g3_sim_assentindo_c_cabeca);
                            $(".mandar_beijos").attr('checked',response.histdesversaopaislinguagem.g4_mandar_beijos);
                            $(".da_tchau").attr('checked',response.histdesversaopaislinguagem.g5_da_tchau);
                            $(".nega_c_cabeca").attr('checked',response.histdesversaopaislinguagem.g6_nega_c_cabeca);
                            $(".bate_palmas").attr('checked',response.histdesversaopaislinguagem.g7_bate_palmas);
                            $(".eleva_bracos_pedcolo").attr('checked',response.histdesversaopaislinguagem.g8_eleva_bracos_pedcolo);
                            $(".sacode_indicador_pdizer_nao").attr('checked',response.histdesversaopaislinguagem.g9_sacode_indicador_pdizer_nao);
                            $(".puxvcpela_mao_paraabpg_coisas").attr('checked',response.histdesversaopaislinguagem.g10_puxvcpela_mao_paraabpg_coisas);
                            $(".vcjapensou_qseufilho_surdo").attr('checked',response.histdesversaopaislinguagem.g11_vcjapensou_qseufilho_surdo);
                            $(".imita_gracinhas").attr('checked',response.histdesversaopaislinguagem.g12_imita_gracinhas);
                            $(".seg_seurosto_polhar_palgdirecao").attr('checked',response.histdesversaopaislinguagem.g13_seg_seurosto_polhar_palgdirecao);
                            $(".atend_champnome").attr('checked',response.histdesversaopaislinguagem.g14_atend_champnome);
                            $(".somente_c_insistencia").attr('checked',response.histdesversaopaislinguagem.g14_somente_c_insistencia);
                            $(".pessestranhas_compseufilho_fala").attr('checked',response.histdesversaopaislinguagem.g15_pessestranhas_compseufilho_fala);
                            $(".g16seufilho_costrepultpal_ouvida").attr('checked',response.histdesversaopaislinguagem.g16_seufilho_costrepultpal_ouvida);
                            $(".g16as_vezes").attr('checked',response.histdesversaopaislinguagem.g16_as_vezes);
                            $(".fala_baixa").attr('checked',response.histdesversaopaislinguagem.g17_fala_baixa);
                            $(".fala_monotona").attr('checked',response.histdesversaopaislinguagem.g17_fala_monotona);
                            $(".fala_alta").attr('checked',response.histdesversaopaislinguagem.g17_fala_alta);
                            $(".g18cost_rep_frases_ouvidas").attr('checked',response.histdesversaopaislinguagem.g18_cost_rep_frases_ouvidas);
                            $(".g18as_vezes").attr('checked',response.histdesversaopaislinguagem.g18_as_vezes);
                            $(".g19comb_palaforma_estranha").attr('checked',response.histdesversaopaislinguagem.g19_comb_palaforma_estranha);
                            $(".g19as_vezes").attr('checked',response.histdesversaopaislinguagem.g19_as_vezes);
                            $(".g20cost_insist_pvc_dizer_palavras").attr('checked',response.histdesversaopaislinguagem.g20_cost_insis_pvc_dizer_palavras);
                            $(".g20as_vezes").attr('checked',response.histdesversaopaislinguagem.g20_as_vezes);
                            $(".g21cost_comen_inapropriado").attr('checked',response.histdesversaopaislinguagem.g21_cost_comen_inapropriado);
                            $(".g21as_vezes").attr('checked',response.histdesversaopaislinguagem.g21_as_vezes);
                            $(".g21_de_exemplos").val(response.histdesversaopaislinguagem.g21_de_exemplos);
                        }      
                    }
                });
        }
    });


    $(document).on('click','.add_histdesversaopais_linguagem_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histdesversaopaislinguagem").val();
        var atendimentoid = $("#addatendimentoid_histdesversaopaislinguagem").val();

        var loading = $("#imgaddanamnese_histdesversaopaislinguagem");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('idade_primeiras_vocalizacoes',$(".e1idade_prim_vocalizacoes").val());
        data.append('prim_vocalizacoes_naoapresentou',$(".e1naoapresentou").is(":checked"?'true':'false'));
        data.append('quais_prim_vocalizacoes',$(".e1quais").val());
        data.append('idade_primeiras_palavras',$(".e2idade_prim_palavras").val());
        data.append('prim_palavras_naoapresentou',$(".e2naoapresentou").is(":checked")?'true':'false');
        data.append('quais_prim_palavras',$(".e2quais").val());
        data.append('idade_primeiras_frases',$(".e3idade_prim_frases").val());
        data.append('prim_frases_naoapresentou',$(".e3naoapresentou").is(":checked")?'true':'false');
        data.append('quais_prim_frases',$(".e3quais").val());
        data.append('considera_que_ha_alg_atraso',$(".considera_que_ha_alg_atraso").val());
        data.append('aponta_para_pedir_algo',$(".aponta_para_pedir_algo").is(":checked")?'true':'false');
        data.append('aponta_para_compartilhar',$(".aponta_para_compartilhar").is(":checked")?'true':'false');
        data.append('sim_assentindo_c_cabeca',$(".sim_assentindo_c_cabeca").is(":checked")?'true':'false');
        data.append('mandar_beijos',$(".mandar_beijos").is(":checked")?'true':'false');
        data.append('da_tchau',$(".da_tchau").is(":checked")?'true':'false');
        data.append('nega_c_cabeca',$(".nega_c_cabeca").is(":checked")?'true':'false');
        data.append('bate_palmas',$(".bate_palmas").is(":checked")?'true':'false');
        data.append('eleva_bracos_pedcolo',$(".eleva_bracos_pedcolo").is(":checked")?'true':'false');
        data.append('sacode_indicador_pdizer_nao',$(".sacode_indicador_pdizer_nao").is(":checked")?'true':'false');
        data.append('puxvcpela_mao_paraabpg_coisas',$(".puxvcpela_mao_paraabpg_coisas").is(":checked")?'true':'false');
        data.append('vcjapensou_qseufilho_surdo',$(".vcjapensou_qseufilho_surdo").is(".checked")?'true':'false');
        data.append('imita_gracinhas',$(".imita_gracinhas").is(":checked")?'true':'false');
        data.append('seg_seurosto_polhar_palgdirecao',$(".seg_seurosto_polhar_palgdirecao").is(":checked")?'true':'false');
        data.append('atend_champnome',$(".atend_champnome").is(":checked")?'true':'false');
        data.append('somente_c_insistencia',$(".somente_c_insistencia").is(":checked")?'true':'false');
        data.append('pessestranhas_compseufilho_fala',$(".pessestranhas_compseufilho_fala").is(":checked")?'true':'false');
        data.append('g16seufilho_costrepultpal_ouvida',$(".g16seufilho_costrepultpal_ouvida").is(":checked")?'true':'false');
        data.append('g16as_vezes',$(".g16as_vezes").is(":checked")?'true':'false');
        data.append('fala_baixa',$(".fala_baixa").is(":checked")?'true':'false');
        data.append('fala_monotona',$(".fala_monotona").is(":checked")?'true':'false');
        data.append('fala_alta',$(".fala_alta").is(":checked")?'true':'false');
        data.append('g18cost_rep_frases_ouvidas',$(".g18cost_rep_frases_ouvidas").is(":checked")?'true':'false');
        data.append('g18as_vezes',$(".g18as_vezes").is(":checked")?'true':'false');
        data.append('g19comb_palaforma_estranha',$(".g19comb_palaforma_estranha").is(":checked")?'true':'false');
        data.append('g19as_vezes',$(".g19as_vezes").is(":checked")?'true':'false');
        data.append('g20cost_insist_pvc_dizer_palavras',$(".g20cost_insist_pvc_dizer_palavras").is(":checked")?'true':'false');
        data.append('g20as_vezes',$(".g20as_vezes").is(":checked")?'true':'false');
        data.append('g21cost_comen_inapropriado',$(".g21cost_comen_inapropriado").is(":checked")?'true':'false');
        data.append('g21as_vezes',$(".g21as_vezes").is(":checked")?'true':'false');
        data.append('g21_de_exemplos',$(".g21_de_exemplos").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');        

        $.ajax({
            url:'/ceteaadmin/terapia/store_histdesversaopaislinguagem',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histdesversaopaislinguagem").replaceWith('<ul id="saveform_errList_histdesversaopaislinguagem"></ul>');
                    $("#saveform_errlist_histdesversaopaislinguagem").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histdesversaopaislinguagem").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histdesversaopaislinguagem").replaceWith('<ul id="saveform_errList_histdesversaopaislinguagem"></ul>');
                    $("#histdes_versaopais_linguagem"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_linguagem'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histdesversaopaislinguagem").trigger('reset');
                    $("#AddHistDesVersaoPaisLinguagem").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_histdesversaopaislinguagem_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histdesversaopaislinguagem").val();
        var pacienteid = $("#editpacienteid_histdesversaopaislinguagem").val();

        var loading = $("#imgeditanamnese_histdesversaopaislinguagem");                          
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('idade_primeiras_vocalizacoes',$("#edite1idade_prim_vocalizacoes").val());
        data.append('prim_vocalizacoes_naoapresentou',$("#edite1naoapresentou").is(":checked"?'true':'false'));
        data.append('quais_prim_vocalizacoes',$("#edite1quais").val());
        data.append('idade_primeiras_palavras',$("#edite2idade_prim_palavras").val());
        data.append('prim_palavras_naoapresentou',$("#edite2naoapresentou").is(":checked")?'true':'false');
        data.append('quais_prim_palavras',$("#edite2quais").val());
        data.append('idade_primeiras_frases',$("#edite3idade_prim_frases").val());
        data.append('prim_frases_naoapresentou',$("#edite3naoapresentou").is(":checked")?'true':'false');
        data.append('quais_prim_frases',$("#edite3quais").val());
        data.append('considera_que_ha_alg_atraso',$("#editconsidera_que_ha_alg_atraso").val());
        data.append('aponta_para_pedir_algo',$("#editaponta_para_pedir_algo").is(":checked")?'true':'false');
        data.append('aponta_para_compartilhar',$("#editaponta_para_compartilhar").is(":checked")?'true':'false');
        data.append('sim_assentindo_c_cabeca',$("#editsim_assentindo_c_cabeca").is(":checked")?'true':'false');
        data.append('mandar_beijos',$("#editmandar_beijos").is(":checked")?'true':'false');
        data.append('da_tchau',$("#editda_tchau").is(":checked")?'true':'false');
        data.append('nega_c_cabeca',$("#editnega_c_cabeca").is(":checked")?'true':'false');
        data.append('bate_palmas',$("#editbate_palmas").is(":checked")?'true':'false');
        data.append('eleva_bracos_pedcolo',$("#editeleva_bracos_pedcolo").is(":checked")?'true':'false');
        data.append('sacode_indicador_pdizer_nao',$("#editsacode_indicador_pdizer_nao").is(":checked")?'true':'false');
        data.append('puxvcpela_mao_paraabpg_coisas',$("#editpuxvcpela_mao_paraabpg_coisas").is(":checked")?'true':'false');
        data.append('vcjapensou_qseufilho_surdo',$("#editvcjapensou_qseufilho_surdo").is(".checked")?'true':'false');
        data.append('imita_gracinhas',$("#editimita_gracinhas").is(":checked")?'true':'false');
        data.append('seg_seurosto_polhar_palgdirecao',$("#editseg_seurosto_polhar_palgdirecao").is(":checked")?'true':'false');
        data.append('atend_champnome',$("#editatend_champnome").is(":checked")?'true':'false');
        data.append('somente_c_insistencia',$("#editsomente_c_insistencia").is(":checked")?'true':'false');
        data.append('pessestranhas_compseufilho_fala',$("#editpessestranhas_compseufilho_fala").is(":checked")?'true':'false');
        data.append('g16seufilho_costrepultpal_ouvida',$("#editg16seufilho_costrepultpal_ouvida").is(":checked")?'true':'false');
        data.append('g16as_vezes',$("#editg16as_vezes").is(":checked")?'true':'false');
        data.append('fala_baixa',$("#editfala_baixa").is(":checked")?'true':'false');
        data.append('fala_monotona',$("#editfala_monotona").is(":checked")?'true':'false');
        data.append('fala_alta',$("#editfala_alta").is(":checked")?'true':'false');
        data.append('g18cost_rep_frases_ouvidas',$("#editg18cost_rep_frases_ouvidas").is(":checked")?'true':'false');
        data.append('g18as_vezes',$("#editg18as_vezes").is(":checked")?'true':'false');
        data.append('g19comb_palaforma_estranha',$("#editg19comb_palaforma_estranha").is(":checked")?'true':'false');
        data.append('g19as_vezes',$("#editg19as_vezes").is(":checked")?'true':'false');
        data.append('g20cost_insist_pvc_dizer_palavras',$("#editg20cost_insist_pvc_dizer_palavras").is(":checked")?'true':'false');
        data.append('g20as_vezes',$("#editg20as_vezes").is(":checked")?'true':'false');
        data.append('g21cost_comen_inapropriado',$("#editg21cost_comen_inapropriado").is(":checked")?'true':'false');
        data.append('g21as_vezes',$("#editg21as_vezes").is(":checked")?'true':'false');
        data.append('g21_de_exemplos',$("#editg21_de_exemplos").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_histdesversaopaislinguagem/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histdesversaopaislinguagem").replaceWith('<ul id="updateform_errList_histdesversaopaislinguagem"></ul>');
                    $("#updateform_errlist_histdesversaopaislinguagem").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histdesversaopaislinguagem").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histdesversaopaislinguagem").replaceWith('<ul id="updateform_errList_histdesversaopaislinguagem"></ul>');
                    $("#histdes_versaopais_linguagem"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_linguagem'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histdesversaopaislinguagem").trigger('reset');
                    $("#EditHistDesVersaoPaisLinguagem").modal('hide');    
                }
            }
        });
    });

//fim histdes_versaopais_linguagem

/////////////////////////////////////////////////////
//início histdes_versaopais_desenvsocial

$("#AddAHistDesVersaoPaisDesenvSocial").on('shown.bs.modal',function(){
            $(".h1_idade_prim_sorrisos").focus();
    });

$("#EditHistDesVersaoPaisDesenvSocial").on('shown.bs.modal',function(){
            $(".h1_idade_prim_sorrisos").focus();
    });

//inicio conta caracteres dos textarea HistDesVersaoPaisDesenvSocial

    //add
/* 
    $(document).on('input','#adde1idade_prim_vocalizacoes',function(){
        var limite = 10;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var idade_prim_vocalizacoes = $('input[name="adde1idade_prim_vocalizacoes"]').val();
            $('input[name="adde1idade_prim_vocalizacoes"]').val(idade_prim_vocalizacoes.substr(0,limite));
            $(".adde1idade_prim_vocalizacoes").text("0" + " " + informativo);
        }else{
            $(".adde1idade_prim_vocalizacoes").text(caracteresRestantes + " " + informativo);
        }
    }); */   



$(document).on('click','.histdes_versaopais_desenvsocial',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_histdes_versaopais_desenvsocial = $("#histdes_versaopais_desenvsocial"+atendimentoid).data("id");

        if(opcao_form_histdes_versaopais_desenvsocial==0){
                $("#addpacienteid_histdesversaopaisdesenvsocial").val(pacienteid);
                $("#addatendimentoid_histdesversaopaisdesenvsocial").val(atendimentoid);
                $("#addform_histdesversaopaisdesenvsocial").trigger('reset');
                $("#AddHistDesVersaoPaisDesenvSocial").modal('show'); 
                $("#saveform_errList_histdesversaopaisdesenvsocial").replaceWith('<ul id="saveform_errList_histdesversaopaisdesenvsocial"></ul>');
        }else{            
                $("#editpacienteid_histdesversaopaisdesenvsocial").val(pacienteid);
                $("#editatendimentoid_histdesversaopaisdesenvsocial").val(atendimentoid);
                $("#editform_histdesversaopaisdesenvsocial").trigger('reset');
                $("#EditHistDesVersaoPaisDesenvSocial").modal('show'); 
                $("#updateform_errList_histdesversaopaisdesenvsocial").replaceWith('<ul id="updateform_errList_histdesversaopaisdesenvsocial"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_histdesversaopaisdesenvsocial/'+pacienteid,
                    success: function(response){           
                        if(response.status==200){                            
                            $(".h1_idade_prim_sorrisos").val(response.histdesversaopaisdesenvsocial.h1_idade_prim_sorrisos);
                            $(".h2_olha_p_face_qdobrinca_c_ele").attr('checked',response.histdesversaopaisdesenvsocial.h2_olha_p_face_qdobrinca_c_ele);
                            $(".h2_obs").val(response.histdesversaopaisdesenvsocial.h2_obs);
                            $(".h3_sorriso_esp_pess_familiares").attr('checked',response.histdesversaopaisdesenvsocial.h3_sorriso_esp_pess_familiares);
                            $(".h3_obs").val(response.histdesversaopaisdesenvsocial.h3_obs);
                            $(".h4_sorriso_esp_pess_nfamiliares").attr('checked',response.histdesversaopaisdesenvsocial.h4_sorriso_esp_pess_nfamiliares);
                            $(".h4_obs").val(response.histdesversaopaisdesenvsocial.h4_obs);
                            $(".h5_sorria_em_resp_sorriso").attr('checked',response.histdesversaopaisdesenvsocial.h5_sorria_em_resp_sorriso);
                            $(".h5_obs").val(response.histdesversaopaisdesenvsocial.h5_obs);
                            $(".h6_vc_conseg_ident_exp_faciais_nfilho").attr('checked',response.histdesversaopaisdesenvsocial.h6_vc_conseg_ident_exp_faciais_nfilho);
                            $(".h6_obs").val(response.histdesversaopaisdesenvsocial.h6_obs);
                            $(".h7_apres_expr_emo_contexto").attr('checked',response.histdesversaopaisdesenvsocial.h7_apres_expr_emo_contexto);
                            $(".h7_obs").val(response.histdesversaopaisdesenvsocial.h7_obs);
                            $(".h8_compartilha_interesses").attr('checked',response.histdesversaopaisdesenvsocial.h8_compartilha_interesses);
                            $(".h8_obs").val(response.histdesversaopaisdesenvsocial.h8_obs);
                            $(".h9_dem_preoc_cpais").attr('checked',response.histdesversaopaisdesenvsocial.h9_dem_preoc_cpais);
                            $(".h9_obs").val(response.histdesversaopaisdesenvsocial.h9_obs);
                            $(".h10_fazcoment_verbais_ou_gestos").attr('checked',response.histdesversaopaisdesenvsocial.h10_fazcoment_verbais_ou_gestos);
                            $(".h10_obs").val(response.histdesversaopaisdesenvsocial.h10_obs);
                            $(".h11_olha_p_ondevc_olhando").attr('checked',response.histdesversaopaisdesenvsocial.h11_olha_p_ondevc_olhando);
                            $(".h11_obs").val(response.histdesversaopaisdesenvsocial.h11_obs);
                            $(".h12_olha_p_ondevc_aponta").attr('checked',response.histdesversaopaisdesenvsocial.h12_olha_p_ondevc_aponta);
                            $(".h12_obs").val(response.histdesversaopaisdesenvsocial.h12_obs);
                            $(".h13_resp_conv_p_brincarcadultos").attr('checked',response.histdesversaopaisdesenvsocial.h13_resp_conv_p_brincarcadultos);
                            $(".h13_apos_insistencia").attr('checked',response.histdesversaopaisdesenvsocial.h13_apos_insistencia);
                            $(".h13_obs").val(response.histdesversaopaisdesenvsocial.h13_obs);
                            $(".h14_resp_conv_p_brincarccriancas").attr('checked',response.histdesversaopaisdesenvsocial.h14_resp_conv_p_brincarccriancas);
                            $(".h14_apos_insistencia").attr('checked',response.histdesversaopaisdesenvsocial.h14_apos_insistencia);
                            $(".h14_obs").val(response.histdesversaopaisdesenvsocial.h14_obs);
                            $(".h15_busca_comp_out_criancas").attr('checked',response.histdesversaopaisdesenvsocial.h15_busca_comp_out_criancas);
                            $(".h15_obs").val(response.histdesversaopaisdesenvsocial.h15_obs);
                            $(".h16_cm_reag_a_criancasdesc_festa").val(response.histdesversaopaisdesenvsocial.h16_cm_reag_a_criancasdesc_festa);
                            $(".h16_fica_ansioso").val(response.histdesversaopaisdesenvsocial.h16_fica_ansioso);
                            $(".h17_perm_som_algtipo_brinc").attr('checked',response.histdesversaopaisdesenvsocial.h17_perm_som_algtipo_brinc);
                            $(".h17_obs").val(response.histdesversaopaisdesenvsocial.h17_obs);
                            $(".h18_pref_brinc_par_nfc_vontemgr").attr('checked',response.histdesversaopaisdesenvsocial.h18_pref_brinc_par_nfc_vontemgr);
                            $(".h18_obs").val(response.histdesversaopaisdesenvsocial.h18_obs);
                            $(".h19_evita_ctt_c_pessoas").attr('checked',response.histdesversaopaisdesenvsocial.h19_evita_ctt_c_pessoas);
                            $(".h19_obs").val(response.histdesversaopaisdesenvsocial.h19_obs);
                        }      
                    }
                });
        }
    });


    $(document).on('click','.add_histdesversaopais_desenvsocial_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histdesversaopaisdesenvsocial").val();
        var atendimentoid = $("#addatendimentoid_histdesversaopaisdesenvsocial").val();

        var loading = $("#imgadd_histdesversaopaisdesenvsocial");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('h1_idade_prim_sorrisos',$(".h1_idade_prim_sorrisos").val());
        data.append('h2_olha_p_face_qdobrinca_c_ele',$(".h2_olha_p_face_qdobrinca_c_ele").is(":checked"?'true':'false'));
        data.append('h2_obs',$(".h2_obs").val());
        data.append('h3_sorriso_esp_pess_familiares',$(".h3_sorriso_esp_pess_familiares").is(":checked"?'true':'false'));
        data.append('h3_obs',$(".h3_obs").val());
        data.append('h4_sorriso_esp_pess_nfamiliares',$(".h4_sorriso_esp_pess_nfamiliares").is(":checked"?'true':'false'));
        data.append('h4_obs',$(".h4_obs").val());
        data.append('h5_sorria_em_resp_sorriso',$(".h5_sorria_em_resp_sorriso").is(":checked"?'true':'false'));
        data.append('h5_obs',$(".h5_obs").val());
        data.append('h6_vc_conseg_ident_exp_faciais_nfilho',$(".h6_vc_conseg_ident_exp_faciais_nfilho").is(":checked"?'true':'false'));
        data.append('h6_obs',$(".h6_obs").val());
        data.append('h7_apres_expr_emo_contexto',$(".h7_apres_expr_emo_contexto").is(":checked"?'true':'false'));
        data.append('h7_obs',$(".h7_obs").val());
        data.append('h8_compartilha_interesses',$(".h8_compartilha_interesses").is(":checked"?'true':'false'));
        data.append('h8_obs',$(".h8_obs").val());
        data.append('h9_dem_preoc_cpais',$(".h9_dem_preoc_cpais").is(":checked"?'true':'false'));
        data.append('h9_obs',$(".h9_obs").val());
        data.append('h10_fazcoment_verbais_ou_gestos',$(".h10_fazcoment_verbais_ou_gestos").is(":checked"?'true':'false'));
        data.append('h10_obs',$(".h10_obs").val());
        data.append('h11_olha_p_ondevc_olhando',$(".h11_olha_p_ondevc_olhando").is(":checked"?'true':'false'));
        data.append('h11_obs',$(".h11_obs").val());
        data.append('h12_olha_p_ondevc_aponta',$(".h12_olha_p_ondevc_aponta").is(":checked"?'true':'false'));
        data.append('h12_obs',$(".h12_obs").val());
        data.append('h13_resp_conv_p_brincarcadultos',$(".h13_resp_conv_p_brincarcadultos").is(":checked"?'true':'false'));
        data.append('h13_apos_insistencia',$(".h13_apos_insistencia").is(":checked"?'true':'false'));
        data.append('h13_obs',$(".h13_obs").val());
        data.append('h14_resp_conv_p_brincarccriancas',$(".h14_resp_conv_p_brincarccriancas").is(":checked"?'true':'false'));
        data.append('h14_apos_insistencia',$(".h14_apos_insistencia").is(":checked"?'true':'false'));
        data.append('h14_obs',$(".h14_obs").val());
        data.append('h15_busca_comp_out_criancas',$(".h15_busca_comp_out_criancas").is(":checked"?'true':'false'));
        data.append('h15_obs',$(".h15_obs").val());
        data.append('h16_cm_reag_a_criancasdesc_festa',$(".h16_cm_reag_a_criancasdesc_festa").val());
        data.append('h16_fica_ansioso',$(".h16_fica_ansioso").val());
        data.append('h17_perm_som_algtipo_brinc',$(".h17_perm_som_algtipo_brinc").is(":checked"?'true':'false'));
        data.append('h17_obs',$(".h17_obs").val());
        data.append('h18_pref_brinc_par_nfc_vontemgr',$(".h18_pref_brinc_par_nfc_vontemgr").is(":checked"?'true':'false'));
        data.append('h18_obs',$(".h18_obs").val());
        data.append('h19_evita_ctt_c_pessoas',$(".h19_evita_ctt_c_pessoas").is(":checked"?'true':'false'));
        data.append('h19_obs',$(".h19_obs").val());        
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');        

        $.ajax({
            url:'/ceteaadmin/terapia/store_histdesversaopaisdesenvsocial',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histdesversaopaisdesenvsocial").replaceWith('<ul id="saveform_errList_histdesversaopaisdesenvsocial"></ul>');
                    $("#saveform_errlist_histdesversaopaisdesenvsocial").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histdesversaopaisdesenvsocial").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histdesversaopaisdesenvsocial").replaceWith('<ul id="saveform_errList_histdesversaopaisdesenvsocial"></ul>');
                    $("#histdes_versaopais_desenvsocial"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_desenvsocial'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histdesversaopaisdesenvsocial").trigger('reset');
                    $("#AddHistDesVersaoPaisDesenvSocial").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_histdesversaopaisdesenvsocial_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histdesversaopaisdesenvsocial").val();
        var pacienteid = $("#editpacienteid_histdesversaopaisdesenvsocial").val();

        var loading = $("#imgedit_histdesversaopaisdesenvsocial");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('h1_idade_prim_sorrisos',$("#edith1_idade_prim_sorrisos").val());
        data.append('h2_olha_p_face_qdobrinca_c_ele',$("#edith2_olha_p_face_qdobrinca_c_ele").is(":checked"?'true':'false'));
        data.append('h2_obs',$("#edith2_obs").val());
        data.append('h3_sorriso_esp_pess_familiares',$("#edith3_sorriso_esp_pess_familiares").is(":checked"?'true':'false'));
        data.append('h3_obs',$("#edith3_obs").val());
        data.append('h4_sorriso_esp_pess_nfamiliares',$("#edith4_sorriso_esp_pess_nfamiliares").is(":checked"?'true':'false'));
        data.append('h4_obs',$("#edith4_obs").val());
        data.append('h5_sorria_em_resp_sorriso',$("#edith5_sorria_em_resp_sorriso").is(":checked"?'true':'false'));
        data.append('h5_obs',$("#edith5_obs").val());
        data.append('h6_vc_conseg_ident_exp_faciais_nfilho',$("#edith6_vc_conseg_ident_exp_faciais_nfilho").is(":checked"?'true':'false'));
        data.append('h6_obs',$("#edith6_obs").val());
        data.append('h7_apres_expr_emo_contexto',$("#edith7_apres_expr_emo_contexto").is(":checked"?'true':'false'));
        data.append('h7_obs',$("#edith7_obs").val());
        data.append('h8_compartilha_interesses',$("#edith8_compartilha_interesses").is(":checked"?'true':'false'));
        data.append('h8_obs',$("#edith8_obs").val());
        data.append('h9_dem_preoc_cpais',$("#edith9_dem_preoc_cpais").is(":checked"?'true':'false'));
        data.append('h9_obs',$("#edith9_obs").val());
        data.append('h10_fazcoment_verbais_ou_gestos',$("#edith10_fazcoment_verbais_ou_gestos").is(":checked"?'true':'false'));
        data.append('h10_obs',$("#edith10_obs").val());
        data.append('h11_olha_p_ondevc_olhando',$("#edith11_olha_p_ondevc_olhando").is(":checked"?'true':'false'));
        data.append('h11_obs',$("#edith11_obs").val());
        data.append('h12_olha_p_ondevc_aponta',$("#edith12_olha_p_ondevc_aponta").is(":checked"?'true':'false'));
        data.append('h12_obs',$("#edith12_obs").val());
        data.append('h13_resp_conv_p_brincarcadultos',$("#edith13_resp_conv_p_brincarcadultos").is(":checked"?'true':'false'));
        data.append('h13_apos_insistencia',$("#edith13_apos_insistencia").is(":checked"?'true':'false'));
        data.append('h13_obs',$("#edith13_obs").val());
        data.append('h14_resp_conv_p_brincarccriancas',$("#edith14_resp_conv_p_brincarccriancas").is(":checked"?'true':'false'));
        data.append('h14_apos_insistencia',$("#edith14_apos_insistencia").is(":checked"?'true':'false'));
        data.append('h14_obs',$("#edith14_obs").val());
        data.append('h15_busca_comp_out_criancas',$("#edith15_busca_comp_out_criancas").is(":checked"?'true':'false'));
        data.append('h15_obs',$("#edith15_obs").val());
        data.append('h16_cm_reag_a_criancasdesc_festa',$("#edith16_cm_reag_a_criancasdesc_festa").val());
        data.append('h16_fica_ansioso',$("#edith16_fica_ansioso").val());
        data.append('h17_perm_som_algtipo_brinc',$("#edith17_perm_som_algtipo_brinc").is(":checked"?'true':'false'));
        data.append('h17_obs',$("#edith17_obs").val());
        data.append('h18_pref_brinc_par_nfc_vontemgr',$("#edith18_pref_brinc_par_nfc_vontemgr").is(":checked"?'true':'false'));
        data.append('h18_obs',$("#edith18_obs").val());
        data.append('h19_evita_ctt_c_pessoas',$("#edith19_evita_ctt_c_pessoas").is(":checked"?'true':'false'));
        data.append('h19_obs',$("#edith19_obs").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_histdesversaopaisdesenvsocial/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histdesversaopaisdesenvsocial").replaceWith('<ul id="updateform_errList_histdesversaopaisdesenvsocial"></ul>');
                    $("#updateform_errlist_histdesversaopaisdesenvsocial").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histdesversaopaisdesenvsocial").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histdesversaopaisdesenvsocial").replaceWith('<ul id="updateform_errList_histdesversaopaisdesenvsocial"></ul>');
                    $("#histdes_versaopais_desenvsocial"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_desenvsocial'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histdesversaopaisdesenvsocial").trigger('reset');
                    $("#EditHistDesVersaoPaisDesenvSocial").modal('hide');    
                }
            }
        });
    });

//fim histdes_versaopais_desenvsocial

});

</script>

@stop


