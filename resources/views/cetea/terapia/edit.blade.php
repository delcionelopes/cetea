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

<!-- Inicio AddHistDesAnexo3InfoSensoriais -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesAnexo3InfoSensoriais" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_AddHistDesAnexo3InfoSensoriais" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_AddHistDesAnexo3InfoSensoriais" style="color: white;">Histórico do Desenvolvimento - Anexo 3 - Informações Sensoriais</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdesanexo3infosensoriais" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdesanexo3infosensoriais">
                <input type="hidden" id="addatendimentoid_histdesanexo3infosensoriais">
                <ul id="saveform_errlist_histdesanexo3infosensoriais"></ul>
                <fieldset>
                    <legend>ANEXO 3 INFORMAÇÕES SENSORIAIS.</legend>
                </fieldset>                                            
                <fieldset>
                    <div class="form-group">
                      <label for="addr1_reac_int_sons_amb">
                      <input type="checkbox" class="r1_reac_int_sons_amb checkbox" name="addr1_reac_int_sons_amb" id="addr1_reac_int_sons_amb"> A criança apresenta reação intensa aos sons inesperados do ambiente?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr1_exemplos"></span>
                      <textarea name="addr1_exemplos" id="addr1_exemplos" cols="30" rows="3" class="r1_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr2_cost_col_maos_ouv">
                      <input type="checkbox" class="r2_cost_col_maos_ouv checkbox" name="addr2_cost_col_maos_ouv" id="addr2_cost_col_maos_ouv"> Costuma colocar as mãos sobre os ouvidos?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr2_exemplos"></span>
                      <textarea name="addr2_exemplos" id="addr2_exemplos" cols="30" rows="3" class="r2_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr3_gt_bar_estranhos">
                      <input type="checkbox" class="r3_gt_bar_estranhos checkbox" name="addr3_gt_bar_estranhos" id="addr3_gt_bar_estranhos"> A criança gosta de barulhos estranhos?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr3_exemplos"></span>
                      <textarea name="addr3_exemplos" id="addr3_exemplos" cols="30" rows="3" class="r3_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="addr4_div_olh_det_vis_obj">
                      <input type="checkbox" class="r4_div_olh_det_vis_obj checkbox" name="addr4_div_olh_det_vis_obj" id="addr4_div_olh_det_vis_obj"> A criança se diverte ao olhar para detalhes visuais dos objetos?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr4_exemplos"></span>
                      <textarea name="addr4_exemplos" id="addr4_exemplos" cols="30" rows="3" class="r4_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr5_inc_luzes_obj">
                      <input type="checkbox" class="r5_inc_luzes_obj checkbox" name="addr5_inc_luzes_obj" id="addr5_inc_luzes_obj"> A criança se incomoda com luzes e objetos brilhantes?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr5_exemplos"></span>
                      <textarea name="addr5_exemplos" id="addr5_exemplos" cols="30" rows="3" class="r5_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr6_desc_com_anseios">
                      <input type="checkbox" class="r6_desc_com_anseios checkbox" name="addr6_desc_com_anseios" id="addr6_desc_com_anseios"> A criança mostra desconforto ao pentear os cabelos, escovar os dentes, trocar de roupa ou fralda, cortar as unhas?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr6_exemplos"></span>
                      <textarea name="addr6_exemplos" id="addr6_exemplos" cols="30" rows="3" class="r6_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr7_desc_com_sapatos">
                      <input type="checkbox" class="r7_desc_com_sapatos checkbox" name="addr7_desc_com_sapatos" id="addr7_desc_com_sapatos"> A criança mostra desconforto com o uso de sapatos e meias?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr7_exemplos"></span>
                      <textarea name="addr7_exemplos" id="addr7_exemplos" cols="30" rows="3" class="r7_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr8_desc_qdo_tocada">
                      <input type="checkbox" class="r8_desc_qdo_tocada checkbox" name="addr8_desc_qdo_tocada" id="addr8_desc_qdo_tocada"> A criança mostra desconforto ou reação emocional excessiva quando é tocada?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr8_exemplos"></span>
                      <textarea name="addr8_exemplos" id="addr8_exemplos" cols="30" rows="3" class="r8_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr9_tend_tocar_obj_pess">
                      <input type="checkbox" class="r9_tend_tocar_obj_pess checkbox" name="addr9_tend_tocar_obj_pess" id="addr9_tend_tocar_obj_pess"> A criança tem tendência a tocar em objetos e pessoas?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr9_exemplos"></span>
                      <textarea name="addr9_exemplos" id="addr9_exemplos" cols="30" rows="3" class="r9_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr10_apres_pc_rec_temp">
                      <input type="checkbox" class="r10_apres_pc_rec_temp checkbox" name="addr10_apres_pc_rec_temp" id="addr10_apres_pc_rec_temp"> A criança apresenta poucas reações de dor ou mudanças de temperatura?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr10_exemplos"></span>
                      <textarea name="addr10_exemplos" id="addr10_exemplos" cols="30" rows="3" class="r10_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr11_apres_pc_cons_perigo">
                      <input type="checkbox" class="r11_apres_pc_cons_perigo checkbox" name="addr11_apres_pc_cons_perigo" id="addr11_apres_pc_cons_perigo"> A criança apresenta pouca consciência dos perigos?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr11_exemplos"></span>
                      <textarea name="addr11_exemplos" id="addr11_exemplos" cols="30" rows="3" class="r11_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr12_se_mov_man_rig">
                      <input type="checkbox" class="r12_se_mov_man_rig checkbox" name="addr12_se_mov_man_rig" id="addr12_se_mov_man_rig"> A criança se movimenta da maneira rígida?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr12_exemplos"></span>
                      <textarea name="addr12_exemplos" id="addr12_exemplos" cols="30" rows="3" class="r12_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr13_parece_nter_forca">
                      <input type="checkbox" class="r13_parece_nter_forca checkbox" name="addr13_parece_nter_forca" id="addr13_parece_nter_forca"> A criança parece não ter força?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr13_exemplos"></span>
                      <textarea name="addr13_exemplos" id="addr13_exemplos" cols="30" rows="3" class="r13_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr14_tem_nausea_textura">
                      <input type="checkbox" class="r14_tem_nausea_textura checkbox" name="addr14_tem_nausea_textura" id="addr14_tem_nausea_textura"> A criança tem náusea frente a certas texturas?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr14_exemplos"></span>
                      <textarea name="addr14_exemplos" id="addr14_exemplos" cols="30" rows="3" class="r14_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr15_rej_sab_exclu_outros">
                      <input type="checkbox" class="r15_rej_sab_exclu_outros checkbox" name="addr15_rej_sab_exclu_outros" id="addr15_rej_sab_exclu_outros"> A criança rejeita certos sabores e se alimenta exclusivamente de outros?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr15_exemplos"></span>
                      <textarea name="addr15_exemplos" id="addr15_exemplos" cols="30" rows="3" class="r15_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr16_col_obj_na_boca">
                      <input type="checkbox" class="r16_col_obj_na_boca checkbox" name="addr16_col_obj_na_boca" id="addr16_col_obj_na_boca"> A criança coloca objetos na boca?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr16_exemplos"></span>
                      <textarea name="addr16_exemplos" id="addr16_exemplos" cols="30" rows="3" class="r16_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addr17_parece_desatento">
                      <input type="checkbox" class="r17_parece_desatento checkbox" name="addr17_parece_desatento" id="addr17_parece_desatento"> A criança por vezes parece desatento ou alheio ao que acontece ao seu redor?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="addr17_exemplos"></span>
                      <textarea name="addr17_exemplos" id="addr17_exemplos" cols="30" rows="3" class="r17_exemplos form-control"></textarea>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdes_anexo3infosensoriais_btn"><img id="imgadd_histdesanexo3infosensoriais" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesAnexo3InfoSensoriais -->

<!-- Inicio EditHistDesAnexo3InfoSensoriais -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesAnexo3InfoSensoriais" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdesanexo3infosensoriais" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdesanexo3infosensoriais" style="color: white;">Histórico do Desenvolvimento - Anexo 3 - Informações Sensoriais</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdesanexo3infosensoriais" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdesanexo3infosensoriais">
                <input type="hidden" id="editatendimentoid_histdesanexo3infosensoriais">
                <ul id="updateform_errlist_histdesanexo3infosensoriais"></ul>
                 <fieldset>
                    <legend>ANEXO 3 INFORMAÇÕES SENSORIAIS.</legend>
                </fieldset>                                                            
                <fieldset>
                    <div class="form-group">
                      <label for="editr1_reac_int_sons_amb">
                      <input type="checkbox" class="r1_reac_int_sons_amb checkbox" name="editr1_reac_int_sons_amb" id="editr1_reac_int_sons_amb"> A criança apresenta reação intensa aos sons inesperados do ambiente?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr1_exemplos"></span>
                      <textarea name="editr1_exemplos" id="editr1_exemplos" cols="30" rows="3" class="r1_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr2_cost_col_maos_ouv">
                      <input type="checkbox" class="r2_cost_col_maos_ouv checkbox" name="editr2_cost_col_maos_ouv" id="editr2_cost_col_maos_ouv"> Costuma colocar as mãos sobre os ouvidos?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr2_exemplos"></span>
                      <textarea name="editr2_exemplos" id="editr2_exemplos" cols="30" rows="3" class="r2_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr3_gt_bar_estranhos">
                      <input type="checkbox" class="r3_gt_bar_estranhos checkbox" name="editr3_gt_bar_estranhos" id="editr3_gt_bar_estranhos"> A criança gosta de barulhos estranhos?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr3_exemplos"></span>
                      <textarea name="editr3_exemplos" id="editr3_exemplos" cols="30" rows="3" class="r3_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="editr4_div_olh_det_vis_obj">
                      <input type="checkbox" class="r4_div_olh_det_vis_obj checkbox" name="editr4_div_olh_det_vis_obj" id="editr4_div_olh_det_vis_obj"> A criança se diverte ao olhar para detalhes visuais dos objetos?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr4_exemplos"></span>
                      <textarea name="editr4_exemplos" id="editr4_exemplos" cols="30" rows="3" class="r4_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr5_inc_luzes_obj">
                      <input type="checkbox" class="r5_inc_luzes_obj checkbox" name="editr5_inc_luzes_obj" id="editr5_inc_luzes_obj"> A criança se incomoda com luzes e objetos brilhantes?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr5_exemplos"></span>
                      <textarea name="editr5_exemplos" id="editr5_exemplos" cols="30" rows="3" class="r5_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr6_desc_com_anseios">
                      <input type="checkbox" class="r6_desc_com_anseios checkbox" name="editr6_desc_com_anseios" id="editr6_desc_com_anseios"> A criança mostra desconforto ao pentear os cabelos, escovar os dentes, trocar de roupa ou fralda, cortar as unhas?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr6_exemplos"></span>
                      <textarea name="editr6_exemplos" id="editr6_exemplos" cols="30" rows="3" class="r6_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr7_desc_com_sapatos">
                      <input type="checkbox" class="r7_desc_com_sapatos checkbox" name="editr7_desc_com_sapatos" id="editr7_desc_com_sapatos"> A criança mostra desconforto com o uso de sapatos e meias?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr7_exemplos"></span>
                      <textarea name="editr7_exemplos" id="editr7_exemplos" cols="30" rows="3" class="r7_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr8_desc_qdo_tocada">
                      <input type="checkbox" class="r8_desc_qdo_tocada checkbox" name="editr8_desc_qdo_tocada" id="editr8_desc_qdo_tocada"> A criança mostra desconforto ou reação emocional excessiva quando é tocada?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr8_exemplos"></span>
                      <textarea name="editr8_exemplos" id="editr8_exemplos" cols="30" rows="3" class="r8_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr9_tend_tocar_obj_pess">
                      <input type="checkbox" class="r9_tend_tocar_obj_pess checkbox" name="editr9_tend_tocar_obj_pess" id="editr9_tend_tocar_obj_pess"> A criança tem tendência a tocar em objetos e pessoas?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr9_exemplos"></span>
                      <textarea name="editr9_exemplos" id="editr9_exemplos" cols="30" rows="3" class="r9_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr10_apres_pc_rec_temp">
                      <input type="checkbox" class="r10_apres_pc_rec_temp checkbox" name="editr10_apres_pc_rec_temp" id="editr10_apres_pc_rec_temp"> A criança apresenta poucas reações de dor ou mudanças de temperatura?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr10_exemplos"></span>
                      <textarea name="editr10_exemplos" id="editr10_exemplos" cols="30" rows="3" class="r10_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr11_apres_pc_cons_perigo">
                      <input type="checkbox" class="r11_apres_pc_cons_perigo checkbox" name="editr11_apres_pc_cons_perigo" id="editr11_apres_pc_cons_perigo"> A criança apresenta pouca consciência dos perigos?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr11_exemplos"></span>
                      <textarea name="editr11_exemplos" id="editr11_exemplos" cols="30" rows="3" class="r11_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr12_se_mov_man_rig">
                      <input type="checkbox" class="r12_se_mov_man_rig checkbox" name="editr12_se_mov_man_rig" id="editr12_se_mov_man_rig"> A criança se movimenta da maneira rígida?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr12_exemplos"></span>
                      <textarea name="editr12_exemplos" id="editr12_exemplos" cols="30" rows="3" class="r12_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr13_parece_nter_forca">
                      <input type="checkbox" class="r13_parece_nter_forca checkbox" name="editr13_parece_nter_forca" id="editr13_parece_nter_forca"> A criança parece não ter força?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr13_exemplos"></span>
                      <textarea name="editr13_exemplos" id="editr13_exemplos" cols="30" rows="3" class="r13_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr14_tem_nausea_textura">
                      <input type="checkbox" class="r14_tem_nausea_textura checkbox" name="editr14_tem_nausea_textura" id="editr14_tem_nausea_textura"> A criança tem náusea frente a certas texturas?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr14_exemplos"></span>
                      <textarea name="editr14_exemplos" id="editr14_exemplos" cols="30" rows="3" class="r14_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr15_rej_sab_exclu_outros">
                      <input type="checkbox" class="r15_rej_sab_exclu_outros checkbox" name="editr15_rej_sab_exclu_outros" id="editr15_rej_sab_exclu_outros"> A criança rejeita certos sabores e se alimenta exclusivamente de outros?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr15_exemplos"></span>
                      <textarea name="editr15_exemplos" id="editr15_exemplos" cols="30" rows="3" class="r15_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr16_col_obj_na_boca">
                      <input type="checkbox" class="r16_col_obj_na_boca checkbox" name="editr16_col_obj_na_boca" id="editr16_col_obj_na_boca"> A criança coloca objetos na boca?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr16_exemplos"></span>
                      <textarea name="editr16_exemplos" id="editr16_exemplos" cols="30" rows="3" class="r16_exemplos form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editr17_parece_desatento">
                      <input type="checkbox" class="r17_parece_desatento checkbox" name="editr17_parece_desatento" id="editr17_parece_desatento"> A criança por vezes parece desatento ou alheio ao que acontece ao seu redor?</label>
                    </div>                    
                    <div class="form-group">
                      <label for="">Exemplos.</label><br>
                      <span class="editr17_exemplos"></span>
                      <textarea name="editr17_exemplos" id="editr17_exemplos" cols="30" rows="3" class="r17_exemplos form-control"></textarea>
                    </div>
                </fieldset>     
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdesanexo3infosensoriais_btn"><img id="imgedit_histdesanexo3infosensoriais" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesAnexo3InfoSensoriais -->


<!-- Inicio AddHistDesHistMedico -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesHistMedico" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_HistDesHistMedico" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_HistDesHistMedico" style="color: white;">Histórico do Desenvolvimento - Anexo 2 - Informações Histórico Médico</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdeshistmedico" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdeshistmedico">
                <input type="hidden" id="addatendimentoid_histdeshistmedico">
                <ul id="saveform_errlist_histdeshistmedico"></ul>
                <fieldset>
                    <legend>ANEXO 2 INFORMAÇÕES - HISTÓRICO MÉDICO.</legend>
                </fieldset>                                            
                <fieldset>
                    <div class="form-group">
                      <label for="addq1_proc_neuro">
                      <input type="checkbox" class="q1_proc_neuro checkbox" name="addq1_proc_neuro" id="addq1_proc_neuro"> Já procurou neurologista?</label>
                    </div>
                    <div class="form-group">
                      <label for="addq1_qualdata_aprox">Em que data aproximadamente?</label>
                      <input type="text" class="q1_qualdata_aprox form-control" name="addq1_qualdata_aprox" id="addq1_qualdata_aprox" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true">
                    </div>
                    <div class="form-group">
                      <label for="">Qual o diagnóstico / orientação / encaminhamento?</label><br>
                      <span class="addq1_diag_orient_enc"></span>
                      <textarea name="addq1_diag_orient_enc" id="addq1_diag_orient_enc" cols="30" rows="6" class="q1_diag_orient_enc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addq2_proc_psiq_inf">
                      <input type="checkbox" class="q2_proc_psiq_inf checkbox" name="addq2_proc_psiq_inf" id="addq2_proc_psiq_inf"> Já procurou psiquiatra infantil?</label>
                    </div>
                    <div class="form-group">
                      <label for="addq2_qualdata_aprox">Em que data aproximadamente?</label>
                      <input type="text" class="q2_qualdata_aprox form-control" name="addq2_qualdata_aprox" id="addq2_qualdata_aprox" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true">
                    </div>
                    <div class="form-group">
                      <label for="">Qual o diagnóstico / orientação / encaminhamento?</label><br>
                      <span class="addq2_diag_orient_enc"></span>
                      <textarea name="addq2_diag_orient_enc" id="addq2_diag_orient_enc" cols="30" rows="6" class="q2_diag_orient_enc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addq3_proc_fonoaudiol">
                      <input type="checkbox" class="q3_proc_fonoaudiol checkbox" name="addq3_proc_fonoaudiol" id="addq3_proc_fonoaudiol"> Já procurou fonoaudiólogo(a)?</label>
                    </div>
                    <div class="form-group">
                      <label for="addq3_qualdata_aprox">Em que data aproximadamente?</label>
                      <input type="text" class="q3_qualdata_aprox form-control" name="addq3_qualdata_aprox" id="addq3_qualdata_aprox" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true">
                    </div>
                    <div class="form-group">
                      <label for="">Qual o diagnóstico / orientação / encaminhamento?</label><br>
                      <span class="addq3_diag_orient_enc"></span>
                      <textarea name="addq3_diag_orient_enc" id="addq3_diag_orient_enc" cols="30" rows="6" class="q3_diag_orient_enc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="addq4_proc_neuropsico">
                      <input type="checkbox" class="q4_proc_neuropsico checkbox" name="addq4_proc_neuropsico" id="addq4_proc_neuropsico"> Já procurou neuropsicólogo(a)?</label>
                    </div>
                    <div class="form-group">
                      <label for="addq4_qualdata_aprox">Em que data aproximadamente?</label>
                      <input type="text" class="q4_qualdata_aprox form-control" name="addq4_qualdata_aprox" id="addq4_qualdata_aprox" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true">
                    </div>
                    <div class="form-group">
                      <label for="">Qual o diagnóstico / orientação / encaminhamento?</label><br>
                      <span class="addq4_diag_orient_enc"></span>
                      <textarea name="addq4_diag_orient_enc" id="addq4_diag_orient_enc" cols="30" rows="6" class="q4_diag_orient_enc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addq5_proc_psicologa">
                      <input type="checkbox" class="q5_proc_psicologa checkbox" name="addq5_proc_psicologa" id="addq5_proc_psicologa"> Já procurou psicólogo(a)?</label>
                    </div>
                    <div class="form-group">
                      <label for="addq5_qualdata_aprox">Em que data aproximadamente?</label>
                      <input type="text" class="q5_qualdata_aprox form-control" name="addq5_qualdata_aprox" id="addq5_qualdata_aprox" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true">
                    </div>
                    <div class="form-group">
                      <label for="">Qual o diagnóstico / orientação / encaminhamento?</label><br>
                      <span class="addq5_diag_orient_enc"></span>
                      <textarea name="addq5_diag_orient_enc" id="addq5_diag_orient_enc" cols="30" rows="6" class="q5_diag_orient_enc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Relate aqui outras informações sobre o histórico médico que ache relevante. (medicamentos, cirurgias, etc.)</legend>
                    <div class="form-group">                    
                      <span class="addq6_relato_histmed_relev"></span>
                      <textarea name="addq6_relato_histmed_relev" id="addq6_relato_histmed_relev" cols="30" rows="6" class="q6_relato_histmed_relev form-control"></textarea>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdes_histmedico_btn"><img id="imgadd_histdeshistmedico" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesHistMedico -->

<!-- Inicio EditHistDesHistMedico -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesHistMedico" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdeshistmedico" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdeshistmedico" style="color: white;">Histórico do Desenvolvimento - Anexo 2 - Informações Histórico Médico</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdeshistmedico" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdeshistmedico">
                <input type="hidden" id="editatendimentoid_histdeshistmedico">
                <ul id="updateform_errlist_histdeshistmedico"></ul>
                 <fieldset>
                    <legend>ANEXO 2 INFORMAÇÕES - HISTÓRICO MÉDICO.</legend>
                </fieldset>                                            
                <fieldset>
                    <div class="form-group">
                      <label for="editq1_proc_neuro">
                      <input type="checkbox" class="q1_proc_neuro checkbox" name="editq1_proc_neuro" id="editq1_proc_neuro"> Já procurou neurologista?</label>
                    </div>
                    <div class="form-group">
                      <label for="editq1_qualdata_aprox">Em que data aproximadamente?</label>
                      <input type="text" class="q1_qualdata_aprox form-control" name="editq1_qualdata_aprox" id="editq1_qualdata_aprox" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true">
                    </div>
                    <div class="form-group">
                      <label for="">Qual o diagnóstico / orientação / encaminhamento?</label><br>
                      <span class="editq1_diag_orient_enc"></span>
                      <textarea name="editq1_diag_orient_enc" id="editq1_diag_orient_enc" cols="30" rows="6" class="q1_diag_orient_enc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editq2_proc_psiq_inf">
                      <input type="checkbox" class="q2_proc_psiq_inf checkbox" name="editq2_proc_psiq_inf" id="editq2_proc_psiq_inf"> Já procurou psiquiatra infantil?</label>
                    </div>
                    <div class="form-group">
                      <label for="editq2_qualdata_aprox">Em que data aproximadamente?</label>
                      <input type="text" class="q2_qualdata_aprox form-control" name="editq2_qualdata_aprox" id="editq2_qualdata_aprox" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true">
                    </div>
                    <div class="form-group">
                      <label for="">Qual o diagnóstico / orientação / encaminhamento?</label><br>
                      <span class="editq2_diag_orient_enc"></span>
                      <textarea name="editq2_diag_orient_enc" id="editq2_diag_orient_enc" cols="30" rows="6" class="q2_diag_orient_enc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editq3_proc_fonoaudiol">
                      <input type="checkbox" class="q3_proc_fonoaudiol checkbox" name="editq3_proc_fonoaudiol" id="editq3_proc_fonoaudiol"> Já procurou fonoaudiólogo(a)?</label>
                    </div>
                    <div class="form-group">
                      <label for="editq3_qualdata_aprox">Em que data aproximadamente?</label>
                      <input type="text" class="q3_qualdata_aprox form-control" name="editq3_qualdata_aprox" id="editq3_qualdata_aprox" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true">
                    </div>
                    <div class="form-group">
                      <label for="">Qual o diagnóstico / orientação / encaminhamento?</label><br>
                      <span class="editq3_diag_orient_enc"></span>
                      <textarea name="editq3_diag_orient_enc" id="editq3_diag_orient_enc" cols="30" rows="6" class="q3_diag_orient_enc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="editq4_proc_neuropsico">
                      <input type="checkbox" class="q4_proc_neuropsico checkbox" name="editq4_proc_neuropsico" id="editq4_proc_neuropsico"> Já procurou neuropsicólogo(a)?</label>
                    </div>
                    <div class="form-group">
                      <label for="editq4_qualdata_aprox">Em que data aproximadamente?</label>
                      <input type="text" class="q4_qualdata_aprox form-control" name="editq4_qualdata_aprox" id="editq4_qualdata_aprox" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true">
                    </div>
                    <div class="form-group">
                      <label for="">Qual o diagnóstico / orientação / encaminhamento?</label><br>
                      <span class="editq4_diag_orient_enc"></span>
                      <textarea name="editq4_diag_orient_enc" id="editq4_diag_orient_enc" cols="30" rows="6" class="q4_diag_orient_enc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editq5_proc_psicologa">
                      <input type="checkbox" class="q5_proc_psicologa checkbox" name="editq5_proc_psicologa" id="editq5_proc_psicologa"> Já procurou psicólogo(a)?</label>
                    </div>
                    <div class="form-group">
                      <label for="editq5_qualdata_aprox">Em que data aproximadamente?</label>
                      <input type="text" class="q5_qualdata_aprox form-control" name="editq5_qualdata_aprox" id="editq5_qualdata_aprox" placeholder="DD/MM/AAAA" data-mask="00/00/0000" data-mask-reverse="true">
                    </div>
                    <div class="form-group">
                      <label for="">Qual o diagnóstico / orientação / encaminhamento?</label><br>
                      <span class="editq5_diag_orient_enc"></span>
                      <textarea name="editq5_diag_orient_enc" id="editq5_diag_orient_enc" cols="30" rows="6" class="q5_diag_orient_enc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Relate aqui outras informações sobre o histórico médico que ache relevante. (medicamentos, cirurgias, etc.)</legend>
                    <div class="form-group">                    
                      <span class="editq6_relato_histmed_relev"></span>
                      <textarea name="editq6_relato_histmed_relev" id="editq6_relato_histmed_relev" cols="30" rows="6" class="q6_relato_histmed_relev form-control"></textarea>
                    </div>
                </fieldset>      
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdeshistmedico_btn"><img id="imgedit_histdeshistmedico" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesHistMedico -->

<!-- Inicio AddHistDesRotAlim -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesRotAlim" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_HistDesRotAlim" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_HistDesRotAlim" style="color: white;">Histórico do Desenvolvimento - Anexo 1 - Rotina Alimentar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdesrotalim" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdesrotalim">
                <input type="hidden" id="addatendimentoid_histdesrotalim">
                <ul id="saveform_errlist_histdesrotalim"></ul>
                <fieldset>
                    <legend>ANEXO 1 INFORMAÇÕES - ROTINA ALIMENTAR.</legend>
                </fieldset>                                            
                <fieldset>
                    <div class="form-group">
                      <label for="addp1_dif_alimentares">
                      <input type="checkbox" class="p1_dif_alimentares" name="addp1_dif_alimentares" id="addp1_dif_alimentares"> Em sua opinião: A criança apresenta dificuldades alimentares?</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addp2_dif_rec_alim_solidos">
                      <input type="checkbox" class="p2_dif_rec_alim_solidos" name="addp2_dif_rec_alim_solidos" id="addp2_dif_rec_alim_solidos"> Apresenta dificuldade ou recusa para alimentos sólidos?</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addp3_dif_rec_alim_past">
                      <input type="checkbox" class="p3_dif_rec_alim_past" name="addp3_dif_rec_alim_past" id="addp3_dif_rec_alim_past"> Apresenta dificuldade ou recusa para alimentos pastosos?</label>
                    </div>
                </fieldset>
                <fieldset>                    
                    <label for="">Apresenta alguma seletividade alimentar? (relatar aqui qualquer alteração relacionada a dificuldades baseada na textura de alimentos, preferência por marcas específicas e etc.)</label><br>
                    <div class="form-group">
                      <span class="addp4_apres_selet_alim"></span>
                      <textarea name="addp4_apres_selet_alim" id="addp4_apres_selet_alim" cols="30" rows="6" class="p4_apres_selet_alim form-control"></textarea>
                    </div>
                    <label for="">Você está preocupada ou já se preocupou com a alimentação de seu filho(a)? Se sim, explique o motivo.</label><br>
                    <div class="form-group">
                      <span class="addp5_preocupa_alim"></span>
                      <textarea name="addp5_preocupa_alim" id="addp5_preocupa_alim" cols="30" rows="6" class="p5_preocupa_alim form-control"></textarea>
                    </div>
                    <label for="">Quais informações a escola aponta sobre a alimentação dele(a)?</label><br>
                    <div class="form-group">
                      <span class="addp6_q_inf_esc_alim"></span>
                      <textarea name="addp6_q_inf_esc_alim" id="addp6_q_inf_esc_alim" cols="30" rows="6" class="p6_q_inf_esc_alim form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Descreva um dia típico alimentar de seu filho.</legend>
                    <label for="">Café da manhã:</label><br>
                    <div class="form-group">
                      <span class="addp7_diatip_alim_cafe"></span>
                      <textarea name="addp7_diatip_alim_cafe" id="addp7_diatip_alim_cafe" cols="30" rows="3" class="p7_diatip_alim_cafe form-control"></textarea>
                    </div>
                    <label for="">Almoço:</label><br>
                    <div class="form-group">
                      <span class="addp7_diatip_alim_almoco"></span>
                      <textarea name="addp7_diatip_alim_almoco" id="addp7_diatip_alim_almoco" cols="30" rows="3" class="p7_diatip_alim_almoco form-control"></textarea>
                    </div>
                    <label for="">Lanche:</label><br>
                    <div class="form-group">
                      <span class="addp7_diatip_alim_lanche"></span>
                      <textarea name="addp7_diatip_alim_lanche" id="addp7_diatip_alim_lanche" cols="30" rows="3" class="p7_diatip_alim_lanche form-control"></textarea>
                    </div>
                    <label for="">Jantar:</label><br>
                    <div class="form-group">
                      <span class="addp7_diatip_alim_jantar"></span>
                      <textarea name="addp7_diatip_alim_jantar" id="addp7_diatip_alim_jantar" cols="30" rows="3" class="p7_diatip_alim_jantar form-control"></textarea>
                    </div>
                </fieldset>    
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdes_rotalim_btn"><img id="imgadd_histdesrotalim" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesRotAlim -->

<!-- Inicio EditHistDesRotAlim -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesRotAlim" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdesrotalim" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdesrotalim" style="color: white;">Histórico do Desenvolvimento - Anexo 1 - Rotina Alimentar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdesrotalim" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdesrotalim">
                <input type="hidden" id="editatendimentoid_histdesrotalim">
                <ul id="updateform_errlist_histdesrotalim"></ul>
                <fieldset>
                    <legend>ANEXO 1 INFORMAÇÕES - ROTINA ALIMENTAR.</legend>
                </fieldset>                                            
                <fieldset>
                    <div class="form-group">
                      <label for="editp1_dif_alimentares">
                      <input type="checkbox" class="p1_dif_alimentares" name="editp1_dif_alimentares" id="editp1_dif_alimentares"> Em sua opinião: A criança apresenta dificuldades alimentares?</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editp2_dif_rec_alim_solidos">
                      <input type="checkbox" class="p2_dif_rec_alim_solidos" name="editp2_dif_rec_alim_solidos" id="editp2_dif_rec_alim_solidos"> Apresenta dificuldade ou recusa para alimentos sólidos?</label>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editp3_dif_rec_alim_past">
                      <input type="checkbox" class="p3_dif_rec_alim_past" name="editp3_dif_rec_alim_past" id="editp3_dif_rec_alim_past"> Apresenta dificuldade ou recusa para alimentos pastosos?</label>
                    </div>
                </fieldset>
                <fieldset>                    
                    <label for="">Apresenta alguma seletividade alimentar? (relatar aqui qualquer alteração relacionada a dificuldades baseada na textura de alimentos, preferência por marcas específicas e etc.)</label><br>
                    <div class="form-group">
                      <span class="editp4_apres_selet_alim"></span>
                      <textarea name="editp4_apres_selet_alim" id="editp4_apres_selet_alim" cols="30" rows="6" class="p4_apres_selet_alim form-control"></textarea>
                    </div>
                    <label for="">Você está preocupada ou já se preocupou com a alimentação de seu filho(a)? Se sim, explique o motivo.</label><br>
                    <div class="form-group">
                      <span class="editp5_preocupa_alim"></span>
                      <textarea name="editp5_preocupa_alim" id="editp5_preocupa_alim" cols="30" rows="6" class="p5_preocupa_alim form-control"></textarea>
                    </div>
                    <label for="">Quais informações a escola aponta sobre a alimentação dele(a)?</label><br>
                    <div class="form-group">
                      <span class="editp6_q_inf_esc_alim"></span>
                      <textarea name="editp6_q_inf_esc_alim" id="editp6_q_inf_esc_alim" cols="30" rows="6" class="p6_q_inf_esc_alim form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Descreva um dia típico alimentar de seu filho.</legend>
                    <label for="">Café da manhã:</label><br>
                    <div class="form-group">
                      <span class="editp7_diatip_alim_cafe"></span>
                      <textarea name="editp7_diatip_alim_cafe" id="editp7_diatip_alim_cafe" cols="30" rows="3" class="p7_diatip_alim_cafe form-control"></textarea>
                    </div>
                    <label for="">Almoço:</label><br>
                    <div class="form-group">
                      <span class="editp7_diatip_alim_almoco"></span>
                      <textarea name="editp7_diatip_alim_almoco" id="editp7_diatip_alim_almoco" cols="30" rows="3" class="p7_diatip_alim_almoco form-control"></textarea>
                    </div>
                    <label for="">Lanche:</label><br>
                    <div class="form-group">
                      <span class="editp7_diatip_alim_lanche"></span>
                      <textarea name="editp7_diatip_alim_lanche" id="editp7_diatip_alim_lanche" cols="30" rows="3" class="p7_diatip_alim_lanche form-control"></textarea>
                    </div>
                    <label for="">Jantar:</label><br>
                    <div class="form-group">
                      <span class="editp7_diatip_alim_jantar"></span>
                      <textarea name="editp7_diatip_alim_jantar" id="editp7_diatip_alim_jantar" cols="30" rows="3" class="p7_diatip_alim_jantar form-control"></textarea>
                    </div>
                </fieldset>       
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdesrotalim_btn"><img id="imgedit_histdesrotalim" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesRotAlim -->

<!-- Inicio AddHistDesVersaoPaisCompCasa -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesVersaoPaisCompCasa" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_HistDesVersaoPaisCompCasa" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_HistDesVersaoPaisCompCasa" style="color: white;">Histórico do Desenvolvimento Versão Pais - Comportamento em casa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdesversaopaiscompcasa" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdesversaopaiscompcasa">
                <input type="hidden" id="addatendimentoid_histdesversaopaiscompcasa">
                <ul id="saveform_errlist_histdesversaopaiscompcasa"></ul>
                <fieldset>
                    <legend>COMPORTAMENTO EM CASA E PRÁTICA PARENTAL NA APLICAÇÃO DE LIMITES.</legend>
                </fieldset>                                            
                <fieldset>
                    <legend>Conte um pouco sobre o comportamento da criança em casa e qual a forma que os pais aplicam limites.</legend>
                    <div class="form-group">
                      <span class="addn1_comp_cri_casa"></span>
                      <textarea name="addn1_comp_cri_casa" id="addn1_comp_cri_casa" cols="30" rows="4" class="n1_comp_cri_casa form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Descreva um dia típico na vida da criança.</legend>
                    <label for="">Manhã</label><br>
                    <div class="form-group">
                      <span class="addn2_dia_tipico_manha"></span>
                      <textarea name="addn2_dia_tipico_manha" id="addn2_dia_tipico_manha" cols="30" rows="4" class="n2_dia_tipico_manha form-control"></textarea>
                    </div>
                    <label for="">Tarde</label><br>
                    <div class="form-group">
                      <span class="addn2_dia_tipico_tarde"></span>
                      <textarea name="addn2_dia_tipico_tarde" id="addn2_dia_tipico_tarde" cols="30" rows="4" class="n2_dia_tipico_tarde form-control"></textarea>
                    </div>
                    <label for="">Noite</label><br>
                    <div class="form-group">
                      <span class="addn2_dia_tipico_noite"></span>
                      <textarea name="addn2_dia_tipico_noite" id="addn2_dia_tipico_noite" cols="30" rows="4" class="n2_dia_tipico_noite form-control"></textarea>
                    </div>
                </fieldset>                           
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdesversaopais_compcasa_btn"><img id="imgadd_histdesversaopaiscompcasa" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesVersaoPaisCompCasa -->

<!-- Inicio EditHistDesVersaoPaisCompCasa -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesVersaoPaisCompCasa" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdesversaopaiscompcasa" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdesversaopaiscompcasa" style="color: white;">Histórico do Desenvolvimento Versão Pais - Comportamento em casa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdesversaopaiscompcasa" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdesversaopaiscompcasa">
                <input type="hidden" id="editatendimentoid_histdesversaopaiscompcasa">
                <ul id="updateform_errlist_histdesversaopaiscompcasa"></ul>
                <fieldset>
                    <legend>COMPORTAMENTO EM CASA E PRÁTICA PARENTAL NA APLICAÇÃO DE LIMITES.</legend>
                </fieldset>                                            
                <fieldset>
                    <legend>Conte um pouco sobre o comportamento da criança em casa e qual a forma que os pais aplicam limites.</legend>
                    <div class="form-group">
                      <span class="editn1_comp_cri_casa"></span>
                      <textarea name="editn1_comp_cri_casa" id="editn1_comp_cri_casa" cols="30" rows="4" class="n1_comp_cri_casa form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Descreva um dia típico na vida da criança.</legend>
                    <label for="">Manhã</label><br>
                    <div class="form-group">
                      <span class="editn2_dia_tipico_manha"></span>
                      <textarea name="editn2_dia_tipico_manha" id="editn2_dia_tipico_manha" cols="30" rows="4" class="n2_dia_tipico_manha form-control"></textarea>
                    </div>
                    <label for="">Tarde</label><br>
                    <div class="form-group">
                      <span class="editn2_dia_tipico_tarde"></span>
                      <textarea name="editn2_dia_tipico_tarde" id="editn2_dia_tipico_tarde" cols="30" rows="4" class="n2_dia_tipico_tarde form-control"></textarea>
                    </div>
                    <label for="">Noite</label><br>
                    <div class="form-group">
                      <span class="editn2_dia_tipico_noite"></span>
                      <textarea name="editn2_dia_tipico_noite" id="editn2_dia_tipico_noite" cols="30" rows="4" class="n2_dia_tipico_noite form-control"></textarea>
                    </div>
                </fieldset>     
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdesversaopaiscompcasa_btn"><img id="imgedit_histdesversaopaiscompcasa" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesVersaoPaisCompCasa -->

<!-- Inicio AddHistDesVersaoPaisHistEscolar -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesVersaoPaisHistEscolar" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_HistDesVersaoHistEscolar" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_HistDesVersaoPaisHistEscolar" style="color: white;">Histórico do Desenvolvimento Versão Pais - Histórico Escolar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdesversaopaishistescolar" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdesversaopaishistescolar">
                <input type="hidden" id="addatendimentoid_histdesversaopaishistescolar">
                <ul id="saveform_errlist_histdesversaopaishistescolar"></ul>
                <fieldset>
                    <legend>HISTÓRICO ESCOLAR PEDAGÓGICO</legend>
                </fieldset>                            
                <fieldset>                      
                 <div class="form-group">
                      <label for="addm1_idade_ing_escola">
                      <input type="checkbox" class="m1_idade_ing_escola" name="addm1_idade_ing_escola" id="addm1_idade_ing_escola"> Idade que ingressou na escola? Conte um pouco sobre a adaptação.</label>
                      <label for="">Observações:</label><br>
                      <span class="addm1_obs"></span>
                      <textarea name="addm1_obs" id="addm1_obs" cols="30" rows="4" class="m1_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Alguma vez alguém da equipe escolar mencionou algum comportamento ou preocupação com o desenvolvimento do seu filho(a)?</legend>
                    <div class="form-group">
                      <span class="addm2_alg_eqescolar_mencomport"></span>
                      <textarea name="addm2_alg_eqescolar_mencomport" id="addm2_alg_eqescolar_mencomport" cols="30" rows="4" class="m2_alg_eqescolar_mencomport form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Seu filho(a) apresenta alguma habilidade especial? (música, leitura ou outras)</legend>
                    <div class="form-group">
                      <span class="addm3_apres_hab_especial"></span>
                      <textarea name="addm3_apres_hab_especial" id="addm3_apres_hab_especial" cols="30" rows="4" class="m3_apres_hab_especial form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <legend>Atualmente há dificuldades de aprendizagens?</legend>
                    <div class="form-group">
                      <span class="addm4_ha_dif_aprendizagem"></span>
                      <textarea name="addm4_ha_dif_aprendizagem" id="addm4_ha_dif_aprendizagem" cols="30" rows="4" class="m4_ha_dif_aprendizagem form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <legend>Necessita de mediador escolar?</legend>
                    <div class="form-group">
                      <span class="addm5_neces_med_escolar"></span>
                      <textarea name="addm5_neces_med_escolar" id="addm5_neces_med_escolar" cols="30" rows="4" class="m5_neces_med_escolar form-control"></textarea>
                    </div>
                </fieldset>                
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdesversaopais_histescolar_btn"><img id="imgadd_histdesversaopaishistescolar" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesVersaoPaisHistEscolar -->

<!-- Inicio EditHistDesVersaoPaisHistEscolar -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesVersaoPaisHistEscolar" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdesversaopaishistescolar" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdesversaopaishistescolar" style="color: white;">Histórico do Desenvolvimento Versão Pais - Histórico Escolar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdesversaopaishistescolar" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdesversaopaishistescolar">
                <input type="hidden" id="editatendimentoid_histdesversaopaishistescolar">
                <ul id="updateform_errlist_histdesversaopaishistescolar"></ul>
                <fieldset>
                    <legend>HISTÓRICO ESCOLAR PEDAGÓGICO</legend>
                </fieldset>                            
                <fieldset>                      
                 <div class="form-group">
                      <label for="editm1_idade_ing_escola">
                      <input type="checkbox" class="m1_idade_ing_escola" name="editm1_idade_ing_escola" id="editm1_idade_ing_escola"> Idade que ingressou na escola? Conte um pouco sobre a adaptação.</label>
                      <label for="">Observações:</label><br>
                      <span class="editm1_obs"></span>
                      <textarea name="editm1_obs" id="editm1_obs" cols="30" rows="4" class="m1_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Alguma vez alguém da equipe escolar mencionou algum comportamento ou preocupação com o desenvolvimento do seu filho(a)?</legend>
                    <div class="form-group">
                      <span class="editm2_alg_eqescolar_mencomport"></span>
                      <textarea name="editm2_alg_eqescolar_mencomport" id="editm2_alg_eqescolar_mencomport" cols="30" rows="4" class="m2_alg_eqescolar_mencomport form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Seu filho(a) apresenta alguma habilidade especial? (música, leitura ou outras)</legend>
                    <div class="form-group">
                      <span class="editm3_apres_hab_especial"></span>
                      <textarea name="editm3_apres_hab_especial" id="editm3_apres_hab_especial" cols="30" rows="4" class="m3_apres_hab_especial form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <legend>Atualmente há dificuldades de aprendizagens?</legend>
                    <div class="form-group">
                      <span class="editm4_ha_dif_aprendizagem"></span>
                      <textarea name="editm4_ha_dif_aprendizagem" id="editm4_ha_dif_aprendizagem" cols="30" rows="4" class="m4_ha_dif_aprendizagem form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <legend>Necessita de mediador escolar?</legend>
                    <div class="form-group">
                      <span class="editm5_neces_med_escolar"></span>
                      <textarea name="editm5_neces_med_escolar" id="editm5_neces_med_escolar" cols="30" rows="4" class="m5_neces_med_escolar form-control"></textarea>
                    </div>
                </fieldset>   
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdesversaopaishistescolar_btn"><img id="imgedit_histdesversaopaishistescolar" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesVersaoPaisHistEscolar -->

<!-- Inicio AddHistDesVersaoPaisDesenvMotor -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesVersaoPaisDesenvMotor" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_HistDesVersaoDesenvMotor" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_HistDesVersaoPaisDesenvMotor" style="color: white;">Histórico do Desenvolvimento Versão Pais - Desenv. Motor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdesversaopaisdesenvmotor" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdesversaopaisdesenvmotor">
                <input type="hidden" id="addatendimentoid_histdesversaopaisdesenvmotor">
                <ul id="saveform_errlist_histdesversaopaisdesenvmotor"></ul>
                <fieldset>
                    <legend>DESENVOLVIMENTO MOTOR (idades aproximadas).</legend>
                </fieldset>                            
                <fieldset>                      
                    <legend>Sustentou a cabeça.</legend>
                    <div class="form-group">
                      <span class="addl1_sust_cabeca"></span>
                      <textarea name="addl1_sust_cabeca" id="addl1_sust_cabeca" cols="30" rows="3" class="l1_sust_cabeca form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Sentou sem apoio.</legend>
                    <div class="form-group">
                      <span class="addl2_sent_s_apoio"></span>
                      <textarea name="addl2_sent_s_apoio" id="addl2_sent_s_apoio" cols="30" rows="3" class="l2_sent_s_apoio form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Andou.</legend>
                    <div class="form-group">
                      <span class="addl3_andou"></span>
                      <textarea name="addl3_andou" id="addl3_andou" cols="30" rows="3" class="l3_andou form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <legend>Descreva o processo de desfralde (idades e dificuldades).</legend>
                    <div class="form-group">
                      <span class="addl4_desproc_desfralde"></span>
                      <textarea name="addl4_desproc_desfralde" id="addl4_desproc_desfralde" cols="30" rows="3" class="l4_desproc_desfralde form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <legend>Houve perda de controle esfincteriano já adquirido?</legend>
                    <div class="form-group">
                      <span class="addl5_hv_perdcontrol_esfinc"></span>
                      <textarea name="addl5_hv_perdcontrol_esfinc" id="addl5_hv_perdcontrol_esfinc" cols="30" rows="3" class="l5_hv_perdcontrol_esfinc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl6_rab_em_papel">
                      <input type="checkbox" class="l6_rab_em_papel" name="addl6_rab_em_papel" id="addl6_rab_em_papel"> Rabisca em papel?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl6_obs"></span>
                      <textarea name="addl6_obs" id="addl6_obs" cols="30" rows="3" class="l6_obs form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Como segura o lápis? De maneira adequada?</label><br>
                      <span class="addl6_cm_seg_lapis"></span>
                      <textarea name="addl6_cm_seg_lapis" id="addl6_cm_seg_lapis" cols="30" rows="3" class="l6_cm_seg_lapis form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl7_cam_ponta_pes">
                      <input type="checkbox" class="l7_cam_ponta_pes" name="addl7_cam_ponta_pes" id="addl7_cam_ponta_pes"> Caminha na ponta dos pés?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl7_obs"></span>
                      <textarea name="addl7_obs" id="addl7_obs" cols="30" rows="3" class="l7_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl8_apres_deseq">
                      <input type="checkbox" class="l8_apres_deseq" name="addl8_apres_deseq" id="addl8_apres_deseq"> Apresenta desequilíbrio?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl8_obs"></span>
                      <textarea name="addl8_obs" id="addl8_obs" cols="30" rows="3" class="l8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl9_dif_para_correr">
                      <input type="checkbox" class="l9_dif_para_correr" name="addl9_dif_para_correr" id="addl9_dif_para_correr"> Tem dificuldade para correr?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl9_obs"></span>
                      <textarea name="addl9_obs" id="addl9_obs" cols="30" rows="3" class="l9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl10_dif_para_escalar">
                      <input type="checkbox" class="l10_dif_para_escalar" name="addl10_dif_para_escalar" id="addl10_dif_para_escalar"> Tem dificuldade para escalar?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl10_obs"></span>
                      <textarea name="addl10_obs" id="addl10_obs" cols="30" rows="3" class="l10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl11_chuta_bola">
                      <input type="checkbox" class="l11_chuta_bola" name="addl11_chuta_bola" id="addl11_chuta_bola"> Chuta uma bola?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl11_obs"></span>
                      <textarea name="addl11_obs" id="addl11_obs" cols="30" rows="3" class="l11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl12_sb_esc_sajuda">
                      <input type="checkbox" class="l12_sb_esc_sajuda" name="addl12_sb_esc_sajuda" id="addl12_sb_esc_sajuda"> Sobe escadas sem ajuda?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl12_obs"></span>
                      <textarea name="addl12_obs" id="addl12_obs" cols="30" rows="3" class="l12_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl13_sb_esc_altpess">
                      <input type="checkbox" class="l13_sb_esc_altpess" name="addl13_sb_esc_altpess" id="addl13_sb_esc_altpess"> Sobe escadas alternando os pés?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl13_obs"></span>
                      <textarea name="addl13_obs" id="addl13_obs" cols="30" rows="3" class="l13_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl14_sb_pedalar">
                      <input type="checkbox" class="l14_sb_pedalar" name="addl14_sb_pedalar" id="addl14_sb_pedalar"> Sabe pedalar?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl14_obs"></span>
                      <textarea name="addl14_obs" id="addl14_obs" cols="30" rows="3" class="l14_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl15_dif_man_obj_cdedos">
                      <input type="checkbox" class="l15_dif_man_obj_cdedos" name="addl15_dif_man_obj_cdedos" id="addl15_dif_man_obj_cdedos"> Apresenta dificuldade em manipular objetos com os dedos?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl15_obs"></span>
                      <textarea name="addl15_obs" id="addl15_obs" cols="30" rows="3" class="l15_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl16_senta_em_w">
                      <input type="checkbox" class="l16_senta_em_w" name="addl16_senta_em_w" id="addl16_senta_em_w"> Senta em W?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl16_obs"></span>
                      <textarea name="addl16_obs" id="addl16_obs" cols="30" rows="3" class="l16_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl17_seg_mamadeira">
                      <input type="checkbox" class="l17_seg_mamadeira" name="addl17_seg_mamadeira" id="addl17_seg_mamadeira"> Segurar mamadeira?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl17_obs"></span>
                      <textarea name="addl17_obs" id="addl17_obs" cols="30" rows="3" class="l17_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addl18_amarra_cadarco">
                      <input type="checkbox" class="l18_amarra_cadarco" name="addl18_amarra_cadarco" id="addl18_amarra_cadarco"> Amarra cadarço?</label>
                      <label for="">Observações:</label><br>
                      <span class="addl18_obs"></span>
                      <textarea name="addl18_obs" id="addl18_obs" cols="30" rows="3" class="l18_obs form-control"></textarea>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdesversaopais_desenvmotor_btn"><img id="imgadd_histdesversaopaisdesenvmotor" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesVersaoPaisDesenvMotor -->

<!-- Inicio EditHistDesVersaoPaisDesenvMotor -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesVersaoPaisDesenvMotor" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdesversaopaisdesenvmotor" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdesversaopaisdesenvmotor" style="color: white;">Histórico do Desenvolvimento Versão Pais - Desenv. Motor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdesversaopaisdesenvmotor" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdesversaopaisdesenvmotor">
                <input type="hidden" id="editatendimentoid_histdesversaopaisdesenvmotor">
                <ul id="updateform_errlist_histdesversaopaisdesenvmotor"></ul>
                <fieldset>
                    <legend>DESENVOLVIMENTO MOTOR (idades aproximadas).</legend>
                </fieldset>                            
                <fieldset>                      
                    <legend>Sustentou a cabeça.</legend>
                    <div class="form-group">
                      <span class="editl1_sust_cabeca"></span>
                      <textarea name="editl1_sust_cabeca" id="editl1_sust_cabeca" cols="30" rows="3" class="l1_sust_cabeca form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Sentou sem apoio.</legend>
                    <div class="form-group">
                      <span class="editl2_sent_s_apoio"></span>
                      <textarea name="editl2_sent_s_apoio" id="editl2_sent_s_apoio" cols="30" rows="3" class="l2_sent_s_apoio form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Andou.</legend>
                    <div class="form-group">
                      <span class="editl3_andou"></span>
                      <textarea name="editl3_andou" id="editl3_andou" cols="30" rows="3" class="l3_andou form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <legend>Descreva o processo de desfralde (idades e dificuldades).</legend>
                    <div class="form-group">
                      <span class="editl4_desproc_desfralde"></span>
                      <textarea name="editl4_desproc_desfralde" id="editl4_desproc_desfralde" cols="30" rows="3" class="l4_desproc_desfralde form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <legend>Houve perda de controle esfincteriano já adquirido?</legend>
                    <div class="form-group">
                      <span class="editl5_hv_perdcontrol_esfinc"></span>
                      <textarea name="editl5_hv_perdcontrol_esfinc" id="editl5_hv_perdcontrol_esfinc" cols="30" rows="3" class="l5_hv_perdcontrol_esfinc form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl6_rab_em_papel">
                      <input type="checkbox" class="l6_rab_em_papel" name="editl6_rab_em_papel" id="editl6_rab_em_papel"> Rabisca em papel?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl6_obs"></span>
                      <textarea name="editl6_obs" id="editl6_obs" cols="30" rows="3" class="l6_obs form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Como segura o lápis? De maneira adequada?</label><br>
                      <span class="editl6_cm_seg_lapis"></span>
                      <textarea name="editl6_cm_seg_lapis" id="editl6_cm_seg_lapis" cols="30" rows="3" class="l6_cm_seg_lapis form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl7_cam_ponta_pes">
                      <input type="checkbox" class="l7_cam_ponta_pes" name="editl7_cam_ponta_pes" id="editl7_cam_ponta_pes"> Caminha na ponta dos pés?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl7_obs"></span>
                      <textarea name="editl7_obs" id="editl7_obs" cols="30" rows="3" class="l7_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl8_apres_deseq">
                      <input type="checkbox" class="l8_apres_deseq" name="editl8_apres_deseq" id="editl8_apres_deseq"> Apresenta desequilíbrio?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl8_obs"></span>
                      <textarea name="editl8_obs" id="editl8_obs" cols="30" rows="3" class="l8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl9_dif_para_correr">
                      <input type="checkbox" class="l9_dif_para_correr" name="editl9_dif_para_correr" id="editl9_dif_para_correr"> Tem dificuldade para correr?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl9_obs"></span>
                      <textarea name="editl9_obs" id="editl9_obs" cols="30" rows="3" class="l9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl10_dif_para_escalar">
                      <input type="checkbox" class="l10_dif_para_escalar" name="editl10_dif_para_escalar" id="editl10_dif_para_escalar"> Tem dificuldade para escalar?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl10_obs"></span>
                      <textarea name="editl10_obs" id="editl10_obs" cols="30" rows="3" class="l10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl11_chuta_bola">
                      <input type="checkbox" class="l11_chuta_bola" name="editl11_chuta_bola" id="editl11_chuta_bola"> Chuta uma bola?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl11_obs"></span>
                      <textarea name="editl11_obs" id="editl11_obs" cols="30" rows="3" class="l11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl12_sb_esc_sajuda">
                      <input type="checkbox" class="l12_sb_esc_sajuda" name="editl12_sb_esc_sajuda" id="editl12_sb_esc_sajuda"> Sobe escadas sem ajuda?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl12_obs"></span>
                      <textarea name="editl12_obs" id="editl12_obs" cols="30" rows="3" class="l12_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl13_sb_esc_altpess">
                      <input type="checkbox" class="l13_sb_esc_altpess" name="editl13_sb_esc_altpess" id="editl13_sb_esc_altpess"> Sobe escadas alternando os pés?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl13_obs"></span>
                      <textarea name="editl13_obs" id="editl13_obs" cols="30" rows="3" class="l13_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl14_sb_pedalar">
                      <input type="checkbox" class="l14_sb_pedalar" name="editl14_sb_pedalar" id="editl14_sb_pedalar"> Sabe pedalar?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl14_obs"></span>
                      <textarea name="editl14_obs" id="editl14_obs" cols="30" rows="3" class="l14_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl15_dif_man_obj_cdedos">
                      <input type="checkbox" class="l15_dif_man_obj_cdedos" name="editl15_dif_man_obj_cdedos" id="editl15_dif_man_obj_cdedos"> Apresenta dificuldade em manipular objetos com os dedos?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl15_obs"></span>
                      <textarea name="editl15_obs" id="editl15_obs" cols="30" rows="3" class="l15_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl16_senta_em_w">
                      <input type="checkbox" class="l16_senta_em_w" name="editl16_senta_em_w" id="editl16_senta_em_w"> Senta em W?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl16_obs"></span>
                      <textarea name="editl16_obs" id="editl16_obs" cols="30" rows="3" class="l16_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl17_seg_mamadeira">
                      <input type="checkbox" class="l17_seg_mamadeira" name="editl17_seg_mamadeira" id="editl17_seg_mamadeira"> Segurar mamadeira?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl17_obs"></span>
                      <textarea name="editl17_obs" id="editl17_obs" cols="30" rows="3" class="l17_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editl18_amarra_cadarco">
                      <input type="checkbox" class="l18_amarra_cadarco" name="editl18_amarra_cadarco" id="editl18_amarra_cadarco"> Amarra cadarço?</label>
                      <label for="">Observações:</label><br>
                      <span class="editl18_obs"></span>
                      <textarea name="editl18_obs" id="editl18_obs" cols="30" rows="3" class="l18_obs form-control"></textarea>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdesversaopaisdesenvmotor_btn"><img id="imgedit_histdesversaopaisdesenvmotor" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesVersaoPaisDesenvMotor -->

<!-- Inicio AddHistDesVersaoPaisIndependencia -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesVersaoPaisIndependencia" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_HistDesVersaoIndependencia" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_HistDesVersaoPaisIndependencia" style="color: white;">Histórico do Desenvolvimento Versão Pais - Independência</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdesversaopaisdindependencia" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdesversaopaisindependencia">
                <input type="hidden" id="addatendimentoid_histdesversaopaisindependencia">
                <ul id="saveform_errlist_histdesversaopaisindependencia"></ul>
                <fieldset>
                    <legend>NIVEL DE INDENPENDENCIA NA VIDA DIÁRIA (caso seja muito novo, responda não tem oportunidade).</legend>
                </fieldset>                            
                <fieldset>
                    <div class="form-group">
                      <label for="addji1_veste_roupa_soz">
                      <input type="checkbox" class="ji1_veste_roupa_soz" name="addji1_veste_roupa_soz" id="addji1_veste_roupa_soz"> Veste roupa sozinho.   </label>
                      <label for="addji1_parcial">
                      <input type="checkbox" class="ji1_parcial" name="addji1_parcial" id="addji1_parcial"> Parcial.</label>    
                    </div>                    
                    <div class="form-group">                      
                      <label for="">Observações:</label><br>
                      <span class="addji1_obs"></span>
                      <textarea name="addji1_obs" id="addji1_obs" cols="30" rows="4" class="ji1_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji2_retira_roupa_soz">
                      <input type="checkbox" class="ji2_retira_roupa_soz" name="addji2_retira_roupa_soz" id="addji2_retira_roupa_soz"> Retira a roupa sozinho?   </label>
                      <label for="addji2_parcial">
                      <input type="checkbox" class="ji2_parcial" name="addji2_parcial" id="addji2_parcial"> Parcial.</label>
                    </div>                    
                    <div class="form-group">                      
                      <label for="">Observações:</label><br>
                      <span class="addji2_obs"></span>
                      <textarea name="addji2_obs" id="addji2_obs" cols="30" rows="4" class="ji2_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji3_toma_banho_soz">
                      <input type="checkbox" class="ji3_toma_banho_soz" name="addji3_toma_banho_soz" id="addji3_toma_banho_soz"> Toma banho sozinho?   </label>
                      <label for="addji3_parcial">
                      <input type="checkbox" class="ji3_parcial" name="addji3_parcial" id="addji3_parcial"> Parcial.</label>    
                    </div>                    
                    <div class="form-group">                      
                      <label for="">Observações:</label><br>
                      <span class="addji3_obs"></span>
                      <textarea name="addji3_obs" id="addji3_obs" cols="30" rows="4" class="ji3_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="addji4_jg_len_pp_no_lix">
                      <input type="checkbox" class="ji4_jg_len_pp_no_lix" name="addji4_jg_len_pp_no_lix" id="addji4_jg_len_pp_no_lix"> Joga o lenço de papel ou guardanapo no lixo após solicitação do adulto?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji4_obs"></span>
                      <textarea name="addji4_obs" id="addji4_obs" cols="30" rows="4" class="ji4_obs form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <div class="form-group">
                      <label for="addji6_come_ref_na_mesa">
                      <input type="checkbox" class="ji6_come_ref_na_mesa" name="addji6_come_ref_na_mesa" id="addji6_come_ref_na_mesa"> Come refeições na mesa?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji6_obs"></span>
                      <textarea name="addji6_obs" id="addji6_obs" cols="30" rows="4" class="ji6_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji7_usa_colher_ind">
                      <input type="checkbox" class="ji7_usa_colher_ind" name="addji7_usa_colher_ind" id="addji7_usa_colher_ind"> Usa colher independente?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji7_obs"></span>
                      <textarea name="addji7_obs" id="addji7_obs" cols="30" rows="4" class="ji7_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji8_usa_garfo_ind">
                      <input type="checkbox" class="ji8_usa_garfo_ind" name="addji8_usa_garfo_ind" id="addji8_usa_garfo_ind"> Usa garfo independente?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji8_obs"></span>
                      <textarea name="addji8_obs" id="addji8_obs" cols="30" rows="4" class="ji8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji9_tol_nov_alim">
                      <input type="checkbox" class="ji9_tol_nov_alim" name="addji9_tol_nov_alim" id="addji9_tol_nov_alim"> Tolera novos alimentos no prato?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji9_obs"></span>
                      <textarea name="addji9_obs" id="addji9_obs" cols="30" rows="4" class="ji9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji10_usacopo_aberto">
                      <input type="checkbox" class="ji10_usacopo_aberto" name="addji10_usacopo_aberto" id="addji10_usacopo_aberto"> Usa copo aberto?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji10_obs"></span>
                      <textarea name="addji10_obs" id="addji10_obs" cols="30" rows="4" class="ji10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji11_perm_parc_mesa">
                      <input type="checkbox" class="ji11_perm_parc_mesa" name="addji11_perm_parc_mesa" id="addji11_perm_parc_mesa"> Permanece com os parceiros à mesa?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji11_obs"></span>
                      <textarea name="addji11_obs" id="addji11_obs" cols="30" rows="4" class="ji11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji12_desp_roup_ind">
                      <input type="checkbox" class="ji12_desp_roup_ind" name="addji12_desp_roup_ind" id="addji12_desp_roup_ind"> Despe a roupa independente e coloca no cesto?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji12_obs"></span>
                      <textarea name="addji12_obs" id="addji12_obs" cols="30" rows="4" class="ji12_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji13_limpa_nariz">
                      <input type="checkbox" class="ji13_limpa_nariz" name="addji13_limpa_nariz" id="addji13_limpa_nariz"> Limpa o nariz?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji13_obs"></span>
                      <textarea name="addji13_obs" id="addji13_obs" cols="30" rows="4" class="ji13_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji14_usa_garf_cpab_sderr">
                      <input type="checkbox" class="ji14_usa_garf_cpab_sderr" name="addji14_usa_garf_cpab_sderr" id="addji14_usa_garf_cpab_sderr"> Usa o garfo e copo aberto sem derramar?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji14_obs"></span>
                      <textarea name="addji14_obs" id="addji14_obs" cols="30" rows="4" class="ji14_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji15_abrefecha_moch_lanch_aut">
                      <input type="checkbox" class="ji15_abrefecha_moch_lanch_aut" name="addji15_abrefecha_moch_lanch_aut" id="addji15_abrefecha_moch_lanch_aut"> Abre e fecha a mochila/lancheira de forma autônoma?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji15_obs"></span>
                      <textarea name="addji15_obs" id="addji15_obs" cols="30" rows="4" class="ji15_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji16_usa_banh_aut">
                      <input type="checkbox" class="ji16_usa_banh_aut" name="addji16_usa_banh_aut" id="addji16_usa_banh_aut"> Usa o banheiro de forma autônoma por iniciativa própria?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji16_obs"></span>
                      <textarea name="addji16_obs" id="addji16_obs" cols="30" rows="4" class="ji16_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji17_tp_boca_qdtoss_esp">
                      <input type="checkbox" class="ji17_tp_boca_qdtoss_esp" name="addji17_tp_boca_qdtoss_esp" id="addji17_tp_boca_qdtoss_esp"> Tampa a boca quando tosse ou espirra?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji17_obs"></span>
                      <textarea name="addji17_obs" id="addji17_obs" cols="30" rows="4" class="ji17_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addji18_ajuda_escovacao">
                      <input type="checkbox" class="ji18_ajuda_escovacao" name="addji18_ajuda_escovacao" id="addji18_ajuda_escovacao"> Ajuda na escovação?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="addji18_obs"></span>
                      <textarea name="addji18_obs" id="addji18_obs" cols="30" rows="4" class="ji18_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <legend>Dê detalhes da autonomia de seu filho(a).</legend>
                      <br>
                      <span class="addji19_de_detalhes_aut"></span>
                      <textarea name="addji19_de_detalhes_aut" id="addji19_de_detalhes_aut" cols="30" rows="4" class="ji19_de_detalhes_aut form-control"></textarea>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdesversaopais_independencia_btn"><img id="imgadd_histdesversaopaisindependencia" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesVersaoPaisIndependencia -->

<!-- Inicio EditHistDesVersaoPaisIndependencia -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesVersaoPaisIndependencia" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdesversaopaisindependencia" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdesversaopaisindependencia" style="color: white;">Histórico do Desenvolvimento Versão Pais - Independência</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdesversaopaisindependencia" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdesversaopaisindependencia">
                <input type="hidden" id="editatendimentoid_histdesversaopaisindependencia">
                <ul id="updateform_errlist_histdesversaopaisindependencia"></ul>
                 <fieldset>
                    <legend>NIVEL DE INDENPENDENCIA NA VIDA DIÁRIA (caso seja muito novo, responda não tem oportunidade).</legend>
                </fieldset>                            
                <fieldset>
                    <div class="form-group">
                      <label for="editji1_veste_roupa_soz">
                      <input type="checkbox" class="ji1_veste_roupa_soz" name="editji1_veste_roupa_soz" id="editji1_veste_roupa_soz"> Veste roupa sozinho.   </label>
                      <label for="editji1_parcial">
                      <input type="checkbox" class="ji1_parcial" name="editji1_parcial" id="editji1_parcial"> Parcial.</label>
                    </div>                    
                    <div class="form-group">                      
                      <label for="">Observações:</label><br>
                      <span class="editji1_obs"></span>
                      <textarea name="editji1_obs" id="editji1_obs" cols="30" rows="4" class="ji1_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji2_retira_roupa_soz">
                      <input type="checkbox" class="ji2_retira_roupa_soz" name="editji2_retira_roupa_soz" id="editji2_retira_roupa_soz"> Retira a roupa sozinho?   </label>
                      <label for="editji2_parcial">
                      <input type="checkbox" class="ji2_parcial" name="editji2_parcial" id="editji2_parcial"> Parcial.</label>
                    </div>                    
                    <div class="form-group">                      
                      <label for="">Observações:</label><br>
                      <span class="editji2_obs"></span>
                      <textarea name="editji2_obs" id="editji2_obs" cols="30" rows="4" class="ji2_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji3_toma_banho_soz">
                      <input type="checkbox" class="ji3_toma_banho_soz" name="editji3_toma_banho_soz" id="editji3_toma_banho_soz"> Toma banho sozinho?   </label>
                      <label for="editji3_parcial">
                      <input type="checkbox" class="ji3_parcial" name="editji3_parcial" id="editji3_parcial"> Parcial.</label>
                    </div>                    
                    <div class="form-group">                      
                      <label for="">Observações:</label><br>
                      <span class="editji3_obs"></span>
                      <textarea name="editji3_obs" id="editji3_obs" cols="30" rows="4" class="ji3_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="editji4_jg_len_pp_no_lix">
                      <input type="checkbox" class="ji4_jg_len_pp_no_lix" name="editji4_jg_len_pp_no_lix" id="editji4_jg_len_pp_no_lix"> Joga o lenço de papel ou guardanapo no lixo após solicitação do adulto?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji4_obs"></span>
                      <textarea name="editji4_obs" id="editji4_obs" cols="30" rows="4" class="ji4_obs form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <div class="form-group">
                      <label for="editji6_come_ref_na_mesa">
                      <input type="checkbox" class="ji6_come_ref_na_mesa" name="editji6_come_ref_na_mesa" id="editji6_come_ref_na_mesa"> Come refeições na mesa?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji6_obs"></span>
                      <textarea name="editji6_obs" id="editji6_obs" cols="30" rows="4" class="ji6_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji7_usa_colher_ind">
                      <input type="checkbox" class="ji7_usa_colher_ind" name="editji7_usa_colher_ind" id="editji7_usa_colher_ind"> Usa colher independente?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji7_obs"></span>
                      <textarea name="editji7_obs" id="editji7_obs" cols="30" rows="4" class="ji7_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji8_usa_garfo_ind">
                      <input type="checkbox" class="ji8_usa_garfo_ind" name="editji8_usa_garfo_ind" id="editji8_usa_garfo_ind"> Usa garfo independente?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji8_obs"></span>
                      <textarea name="editji8_obs" id="editji8_obs" cols="30" rows="4" class="ji8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji9_tol_nov_alim">
                      <input type="checkbox" class="ji9_tol_nov_alim" name="editji9_tol_nov_alim" id="editji9_tol_nov_alim"> Tolera novos alimentos no prato?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji9_obs"></span>
                      <textarea name="editji9_obs" id="editji9_obs" cols="30" rows="4" class="ji9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji10_usacopo_aberto">
                      <input type="checkbox" class="ji10_usacopo_aberto" name="editji10_usacopo_aberto" id="editji10_usacopo_aberto"> Usa copo aberto?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji10_obs"></span>
                      <textarea name="editji10_obs" id="editji10_obs" cols="30" rows="4" class="ji10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji11_perm_parc_mesa">
                      <input type="checkbox" class="ji11_perm_parc_mesa" name="editji11_perm_parc_mesa" id="editji11_perm_parc_mesa"> Permanece com os parceiros à mesa?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji11_obs"></span>
                      <textarea name="editji11_obs" id="editji11_obs" cols="30" rows="4" class="ji11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji12_desp_roup_ind">
                      <input type="checkbox" class="ji12_desp_roup_ind" name="editji12_desp_roup_ind" id="editji12_desp_roup_ind"> Despe a roupa independente e coloca no cesto?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji12_obs"></span>
                      <textarea name="editji12_obs" id="editji12_obs" cols="30" rows="4" class="ji12_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji13_limpa_nariz">
                      <input type="checkbox" class="ji13_limpa_nariz" name="editji13_limpa_nariz" id="editji13_limpa_nariz"> Limpa o nariz?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji13_obs"></span>
                      <textarea name="editji13_obs" id="editji13_obs" cols="30" rows="4" class="ji13_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji14_usa_garf_cpab_sderr">
                      <input type="checkbox" class="ji14_usa_garf_cpab_sderr" name="editji14_usa_garf_cpab_sderr" id="editji14_usa_garf_cpab_sderr"> Usa o garfo e copo aberto sem derramar?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji14_obs"></span>
                      <textarea name="editji14_obs" id="editji14_obs" cols="30" rows="4" class="ji14_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji15_abrefecha_moch_lanch_aut">
                      <input type="checkbox" class="ji15_abrefecha_moch_lanch_aut" name="editji15_abrefecha_moch_lanch_aut" id="editji15_abrefecha_moch_lanch_aut"> Abre e fecha a mochila/lancheira de forma autônoma?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji15_obs"></span>
                      <textarea name="editji15_obs" id="editji15_obs" cols="30" rows="4" class="ji15_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji16_usa_banh_aut">
                      <input type="checkbox" class="ji16_usa_banh_aut" name="editji16_usa_banh_aut" id="editji16_usa_banh_aut"> Usa o banheiro de forma autônoma por iniciativa própria?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji16_obs"></span>
                      <textarea name="editji16_obs" id="editji16_obs" cols="30" rows="4" class="ji16_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji17_tp_boca_qdtoss_esp">
                      <input type="checkbox" class="ji17_tp_boca_qdtoss_esp" name="editji17_tp_boca_qdtoss_esp" id="editji17_tp_boca_qdtoss_esp"> Tampa a boca quando tosse ou espirra?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji17_obs"></span>
                      <textarea name="editji17_obs" id="editji17_obs" cols="30" rows="4" class="ji17_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editji18_ajuda_escovacao">
                      <input type="checkbox" class="ji18_ajuda_escovacao" name="editji18_ajuda_escovacao" id="editji18_ajuda_escovacao"> Ajuda na escovação?</label><br>
                      <label for="">Observações:</label><br>
                      <span class="editji18_obs"></span>
                      <textarea name="editji18_obs" id="editji18_obs" cols="30" rows="4" class="ji18_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <legend>Dê detalhes da autonomia de seu filho(a).</legend>
                      <br>
                      <span class="editji19_de_detalhes_aut"></span>
                      <textarea name="editji19_de_detalhes_aut" id="editji19_de_detalhes_aut" cols="30" rows="4" class="ji19_de_detalhes_aut form-control"></textarea>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdesversaopaisindependencia_btn"><img id="imgedit_histdesversaopaisindependencia" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesVersaoPaisIndependencia -->

<!-- Inicio AddHistDesVersaoPaisComportamentos -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="AddHistDesVersaoPaisComportamentos" tabindex="-1" role="dialog" aria-labelledby="AddmyExtraLargeModalLabel_HistDesVersaoComportamentos" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="AddmyExtraLargeModalLabel_HistDesVersaoPaisComportamentos" style="color: white;">Histórico do Desenvolvimento Versão Pais - Comportamentos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="addform_hisdesversaopaiscomportamentos" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="addpacienteid_histdesversaopaiscomportamentos">
                <input type="hidden" id="addatendimentoid_histdesversaopaiscomportamentos">
                <ul id="saveform_errlist_histdesversaopaiscomportamentos"></ul>
                <fieldset>
                    <legend>COMPORTAMENTOS, MANIAS E RITUAIS (Assinale se o seu filho(a) faz ou fez quando menor. Caso perdeu a habilidade, mencione com observações)</legend>
                </fieldset>                            
                <fieldset>
                    <div class="form-group">
                      <label for="addj1_alinha_enfileira_objetos">
                      <input type="checkbox" class="j1_alinha_enfileira_objetos" name="addj1_alinha_enfileira_objetos" id="addj1_alinha_enfileira_objetos"> Alinha ou enfileira objetos? Dê um exemplo.</label>
                      <label for="">Observações:</label><br>
                      <span class="addj1_obs"></span>
                      <textarea name="addj1_obs" id="addj1_obs" cols="30" rows="4" class="j1_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="addj2_empilha_objetos">
                      <input type="checkbox" class="j2_empilha_objetos" name="addj2_empilha_objetos" id="addj2_empilha_objetos"> Empilha objetos? Dê um exemplo.</label>
                      <label for="">Observações:</label><br>
                      <span class="addj2_obs"></span>
                      <textarea name="addj2_obs" id="addj2_obs" cols="30" rows="4" class="j2_obs form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <div class="form-group">
                      <label for="addj3_abrefecha_gav_port">
                      <input type="checkbox" class="j3_abrefecha_gav_port" name="addj3_abrefecha_gav_port" id="addj3_abrefecha_gav_port"> Abre e fecha portas, gavetas, etc.? Dê um exemplo.</label>
                      <label for="">Observações:</label><br>
                      <span class="addj3_obs"></span>
                      <textarea name="addj3_obs" id="addj3_obs" cols="30" rows="4" class="j3_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addj4_apagaacende_luz">
                      <input type="checkbox" class="j4_apagaacende_luz" name="addj4_apagaacende_luz" id="addj4_apagaacende_luz"> Apaga e acende a luz?</label>
                      <label for="">Observações:</label><br>
                      <span class="addj4_obs"></span>
                      <textarea name="addj4_obs" id="addj4_obs" cols="30" rows="4" class="j4_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addj5_inter_objetos_giram">
                      <input type="checkbox" class="j5_inter_objetos_giram" name="addj5_inter_objetos_giram" id="addj5_inter_objetos_giram"> Interesse por objetos que giram?</label>
                      <label for="">Observações:</label><br>
                      <span class="addj5_obs"></span>
                      <textarea name="addj5_obs" id="addj5_obs" cols="30" rows="4" class="j5_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">                      
                      <label for="">Outras manias?</label><br>
                      <span class="addj6_outras_manias"></span>
                      <textarea name="addj6_outras_manias" id="addj6_outras_manias" cols="30" rows="4" class="j6_outras_manias form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addj7_inter_objetos_giram_2">
                      <input type="checkbox" class="j7_inter_objetos_giram_2" name="addj7_inter_objetos_giram_2" id="addj7_inter_objetos_giram_2"> Interesse por objetos que giram? Ex.: ventilador, máquina de lavar, etc.</label>
                      <label for="">Qual sua reação quando é interrompido?</label><br>
                      <span class="addj7_reacao_quando_interr"></span>
                      <textarea name="addj7_reacao_quando_interr" id="addj7_reacao_quando_interr" cols="30" rows="4" class="j7_reacao_quando_interr form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addj8_brinca_form_simbol_insist">
                      <input type="checkbox" class="j8_brinca_form_simbol_insist" name="addj8_brinca_form_simbol_insist" id="addj8_brinca_form_simbol_insist"> Brinca de forma simbólica, mas de forma rígida, insistindo no mesmo tópico??</label>
                      <label for="">Observações:</label><br>
                      <span class="addj8_obs"></span>
                      <textarea name="addj8_obs" id="addj8_obs" cols="30" rows="4" class="j8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addj9_resiste_mud_rotina">
                      <input type="checkbox" class="j9_resiste_mud_rotina" name="addj9_resiste_mud_rotina" id="addj9_resiste_mud_rotina"> Resiste a mudanças de rotina? Dê um exemplo.</label>
                      <label for="">Observações:</label><br>
                      <span class="addj9_obs"></span>
                      <textarea name="addj9_obs" id="addj9_obs" cols="30" rows="4" class="j9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addj10_gosta_msm_ordem_horario">
                      <input type="checkbox" class="j10_gosta_msm_ordem_horario" name="addj10_gosta_msm_ordem_horario" id="addj10_gosta_msm_ordem_horario"> Ele(a) gosta que as atividades diárias sejam feitas sempre na mesma ordem e no mesmo horário?</label>
                      <label for="">Observações:</label><br>
                      <span class="addj10_obs"></span>
                      <textarea name="addj10_obs" id="addj10_obs" cols="30" rows="4" class="j10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addj11_ritual_ordem_determinada">
                      <input type="checkbox" class="j11_ritual_ordem_determinada" name="addj11_ritual_ordem_determinada" id="addj11_ritual_ordem_determinada"> Ele(a) tem algum ritual? Gosta de fazer coisas seguindo uma ordem determinada e de uma maneira específica?</label>
                      <label for="">Observações:</label><br>
                      <span class="addj11_obs"></span>
                      <textarea name="addj11_obs" id="addj11_obs" cols="30" rows="4" class="j11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addj12_coisas_msm_lugar">
                      <input type="checkbox" class="j12_coisas_msm_lugar" name="addj12_coisas_msm_lugar" id="addj12_coisas_msm_lugar"> Ele(a) gosta que as coisas fiquem sempre no mesmo lugar e do mesmo jeito, por exemplo, em casa?</label>
                      <label for="">Observações:</label><br>
                      <span class="addj12_obs"></span>
                      <textarea name="addj12_obs" id="addj12_obs" cols="30" rows="4" class="j12_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addj13_gstmsm_roupas_alim_lugar">
                      <input type="checkbox" class="j13_gstmsm_roupas_alim_lugar" name="addj13_gstmsm_roupas_alim_lugar" id="addj13_gstmsm_roupas_alim_lugar"> Gosta de usar as mesmas roupas, comer os mesmos alimentos ou ir aos mesmos lugares?</label>
                      <label for="">Observações:</label><br>
                      <span class="addj13_obs"></span>
                      <textarea name="addj13_obs" id="addj13_obs" cols="30" rows="4" class="j13_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">                      
                      <legend>Como reage quando frustrado ou contrariado? Dê exemplos.</legend>
                      <span class="addj14_cm_reage_frust_contr"></span>
                      <textarea name="addj14_cm_reage_frust_contr" id="addj14_cm_reage_frust_contr" cols="30" rows="4" class="j14_cm_reage_frust_contr form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>       
                    <legend>Tem os seguintes hábitos?</legend>             
                    <div class="form-group">
                                <label for="addj15_chup_os_dedos">
                                <input type="checkbox" class="j15_chup_os_dedos checkbox" name="addj15_chup_os_dedos" id="addj15_chup_os_dedos"> Chupar os dedos</label>
                    </div>                
                    <div class="form-group">
                                <label for="addj15_roe_unhas">
                                <input type="checkbox" class="j15_roe_unhas checkbox" name="addj15_roe_unhas" id="addj15_roe_unhas"> Roer unhas</label>
                    </div>                                   
                    <div class="form-group">
                                <label for="addj15_estalar_dedos">
                                <input type="checkbox" class="j15_estalar_dedos checkbox" name="addj15_estalar_dedos" id="addj15_estalar_dedos"> Estalar dedos</label>
                    </div>                
                    <div class="form-group">
                                <label for="addj15_morder_labios">
                                <input type="checkbox" class="j15_morder_labios checkbox" name="addj15_morder_labios" id="addj15_morder_labios"> Morder lábios</label>
                    </div>
                    <div class="form-group">
                                <label for="addj15_mast_publico">
                                <input type="checkbox" class="j15_mast_publico checkbox" name="addj15_mast_publico" id="addj15_mast_publico"> Masturbação em público</label>
                    </div>
                    <div class="form-group">
                                <label for="addj15_torce_cabelo">
                                <input type="checkbox" class="j15_torce_cabelo checkbox" name="addj15_torce_cabelo" id="addj15_torce_cabelo"> Torcer o cabelo</label>
                    </div>
                    <div class="form-group">
                                <label for="addj15_balanc_corpo">
                                <input type="checkbox" class="j15_balanc_corpo checkbox" name="addj15_balanc_corpo" id="addj15_balanc_corpo"> Balançar o corpo</label>
                    </div>
                    <div class="form-group">
                                <label for="addj15_bater_maos">
                                <input type="checkbox" class="j15_bater_maos checkbox" name="addj15_bater_maos" id="addj15_bater_maos"> Bater mãos</label>
                    </div>
                    <div class="form-group">
                                <label for="addj15_flapping_maos">
                                <input type="checkbox" class="j15_flapping_maos checkbox" name="addj15_flapping_maos" id="addj15_flapping_maos"> Flapping de mãos</label>
                    </div>
                    <div class="form-group">
                                <label for="addj15_andar_ponta_pes">
                                <input type="checkbox" class="j15_andar_ponta_pes checkbox" name="addj15_andar_ponta_pes" id="addj15_andar_ponta_pes"> Andar na ponta dos pés</label>
                    </div>
                    <div class="form-group">
                                <label for="addj15_flex_ext_punhos">
                                <input type="checkbox" class="j15_flex_ext_punhos checkbox" name="addj15_flex_ext_punhos" id="addj15_flex_ext_punhos"> Flexionar e extender os punhos</label>
                    </div>
                    <div class="form-group">
                                <label for="addj15_morde_pp_corpo">
                                <input type="checkbox" class="j15_morde_pp_corpo checkbox" name="addj15_morde_pp_corpo" id="addj15_morde_pp_corpo"> Morder o próprio corpo</label>
                    </div>
                    <div class="form-group">
                                <label for="addj15_bater_a_cabeca">
                                <input type="checkbox" class="j15_bater_a_cabeca checkbox" name="addj15_bater_a_cabeca" id="addj15_bater_a_cabeca"> Bater a cabeça</label>
                    </div>                    
                    <div class="form-group">
                                <label for="">Outros. Quais?</label><br>
                                <span class="addj15_outros"></span>
                                <textarea name="addj15_outros" id="addj15_outros" cols="30" rows="4" class="j15_outros form-control"></textarea>
                    </div>                    
                </fieldset> 
                <fieldset>
                    <div class="form-group">
                        <label for="addj16_sensivel_barulho">
                        <input type="checkbox" class="j16_sensivel_barulho checkbox" name="addj16_sensivel_barulho" id="addj16_sensivel_barulho"> Ele(a) é muito sensível a barulho. Costuma tapar os ouvidos ou ter crises em alguma situações?</label>
                        <label for="addj16_obs">Observações:</label><br>
                        <span class="addj16_obs"></span>
                        <textarea name="addj16_obs" id="addj16_obs" class="j16_obs form-control" cols="30" rows="4"></textarea>

                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="addj17_tocarcheirarabracarinadpessobj">
                        <input type="checkbox" class="j17_tocarcheirarabracarinadpessobj checkbox" name="addj17_tocarcheirarabracarinadpessobj" id="addj17_tocarcheirarabracarinadpessobj"> Procura tocar, cheirar, ou abraçar de forma inadequada as pessoas ou objetos?</label>
                        <label for="addj17_obs">Observações:</label><br>
                        <span class="addj17_obs"></span>
                        <textarea name="addj17_obs" id="addj17_obs" class="j17_obs form-control" cols="30" rows="4"></textarea>

                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="addj18_par_nsentir_sentir_dor_frio">
                        <input type="checkbox" class="j18_par_nsentir_sentir_dor_frio checkbox" name="addj18_par_nsentir_sentir_dor_frio" id="addj18_par_nsentir_sentir_dor_frio"> Parece não sentir dor quando sofre um machucado ou não sentir frio? É pouco sensível a alguns estímulos sensoriais?</label>
                        <label for="addj18_obs">Observações:</label><br>
                        <span class="addj18_obs"></span>
                        <textarea name="addj18_obs" id="addj18_obs" class="j18_obs form-control" cols="30" rows="4"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="addj19_fascinado_luzes">
                        <input type="checkbox" class="j19_fascinado_luzes checkbox" name="addj19_fascinado_luzes" id="addj19_fascinado_luzes"> É fascinado(a) por luzes?</label>
                        <label for="addj19_obs">Observações:</label><br>
                        <span class="addj19_obs"></span>
                        <textarea name="addj19_obs" id="addj19_obs" class="j19_obs form-control" cols="30" rows="4"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="addj20_sensivel_ao_toque">
                        <input type="checkbox" class="j20_sensivel_ao_toque checkbox" name="addj20_sensivel_ao_toque" id="addj20_sensivel_ao_toque"> Ele(a) é muito sensível ao toque? Evita ser abraçado, tem dificuldades para trocar de roupas e se enxugar após o banho?</label>
                        <label for="addj20_obs">Observações:</label><br>
                        <span class="addj20_obs"></span>
                        <textarea name="addj20_obs" id="addj20_obs" class="j20_obs form-control" cols="30" rows="4"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="addj21_texturas_incomodam">
                        <input type="checkbox" class="j21_texturas_incomodam checkbox" name="addj21_texturas_incomodam" id="addj21_texturas_incomodam"> Algumas texturas realmente o(a) incomodam?</label>
                        <label for="addj21_obs">Observações:</label><br>
                        <span class="addj21_obs"></span>
                        <textarea name="addj21_obs" id="addj21_obs" class="j21_obs form-control" cols="30" rows="4"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="addj22_reacao_text_alim">
                        <input type="checkbox" class="j22_reacao_text_alim checkbox" name="addj22_reacao_text_alim" id="addj22_reacao_text_alim"> Apresenta alguma reação a textura de alimentos?</label>
                        <label for="addj22_obs">Observações:</label><br>
                        <span class="addj22_obs"></span>
                        <textarea name="addj22_obs" id="addj22_obs" class="j22_obs form-control" cols="30" rows="4"></textarea>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdesversaopais_comportamentos_btn"><img id="imgadd_histdesversaopaiscomportamentos" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim AddHistDesVersaoPaisComportamentos -->

<!-- Inicio EditHistDesVersaoPaisComportamentos -->
<div class="modal fade animate__animated animate__bounce animate__faster bd-example-modal-xl" id="EditHistDesVersaoPaisComportamentos" tabindex="-1" role="dialog" aria-labelledby="EditmyExtraLargeModalLabel_histdesversaopaiscomportamentos" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header bg-{{$color}}">
            <h5 class="modal-title" id="EditmyExtraLargeModalLabel_histdesversaopaiscomportamentos" style="color: white;">Histórico do Desenvolvimento Versão Pais - Comportamentos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true" style="color: white.">&times;</span>
            </button>
        </div>      
        <div class="modal-body form-horizontal" role="form">
            <form id="editform_histdesversaopaiscomportamentos" class="form-horizontal" role="form" method="POST">
                <input type="hidden" id="editpacienteid_histdesversaopaiscomportamentos">
                <input type="hidden" id="editatendimentoid_histdesversaopaiscomportamentos">
                <ul id="updateform_errlist_histdesversaopaiscomportamentos"></ul>
                <fieldset>
                    <legend>COMPORTAMENTOS, MANIAS E RITUAIS (Assinale se o seu filho(a) faz ou fez quando menor. Caso perdeu a habilidade, mencione com observações)</legend>
                </fieldset>                            
                <fieldset>
                    <div class="form-group">
                      <label for="editj1_alinha_enfileira_objetos">
                      <input type="checkbox" class="j1_alinha_enfileira_objetos" name="editj1_alinha_enfileira_objetos" id="editj1_alinha_enfileira_objetos"> Alinha ou enfileira objetos? Dê um exemplo.</label>
                      <label for="">Observações:</label><br>
                      <span class="editj1_obs"></span>
                      <textarea name="editj1_obs" id="editj1_obs" cols="30" rows="4" class="j1_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="editj2_empilha_objetos">
                      <input type="checkbox" class="j2_empilha_objetos" name="editj2_empilha_objetos" id="editj2_empilha_objetos"> Empilha objetos? Dê um exemplo.</label>
                      <label for="">Observações:</label><br>
                      <span class="editj2_obs"></span>
                      <textarea name="editj2_obs" id="editj2_obs" cols="30" rows="4" class="j2_obs form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <div class="form-group">
                      <label for="editj3_abrefecha_gav_port">
                      <input type="checkbox" class="j3_abrefecha_gav_port" name="editj3_abrefecha_gav_port" id="editj3_abrefecha_gav_port"> Abre e fecha portas, gavetas, etc.? Dê um exemplo.</label>
                      <label for="">Observações:</label><br>
                      <span class="editj3_obs"></span>
                      <textarea name="editj3_obs" id="editj3_obs" cols="30" rows="4" class="j3_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editj4_apagaacende_luz">
                      <input type="checkbox" class="j4_apagaacende_luz" name="editj4_apagaacende_luz" id="editj4_apagaacende_luz"> Apaga e acende a luz?</label>
                      <label for="">Observações:</label><br>
                      <span class="editj4_obs"></span>
                      <textarea name="editj4_obs" id="editj4_obs" cols="30" rows="4" class="j4_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editj5_inter_objetos_giram">
                      <input type="checkbox" class="j5_inter_objetos_giram" name="editj5_inter_objetos_giram" id="editj5_inter_objetos_giram"> Interesse por objetos que giram?</label>
                      <label for="">Observações:</label><br>
                      <span class="editj5_obs"></span>
                      <textarea name="editj5_obs" id="editj5_obs" cols="30" rows="4" class="j5_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">                      
                      <label for="">Outras manias?</label><br>
                      <span class="editj6_outras_manias"></span>
                      <textarea name="editj6_outras_manias" id="editj6_outras_manias" cols="30" rows="4" class="j6_outras_manias form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editj7_inter_objetos_giram_2">
                      <input type="checkbox" class="j7_inter_objetos_giram_2" name="editj7_inter_objetos_giram_2" id="editj7_inter_objetos_giram_2"> Interesse por objetos que giram? Ex.: ventilador, máquina de lavar, etc.</label>
                      <label for="">Qual sua reação quando é interrompido?</label><br>
                      <span class="editj7_reacao_quando_interr"></span>
                      <textarea name="editj7_reacao_quando_interr" id="editj7_reacao_quando_interr" cols="30" rows="4" class="j7_reacao_quando_interr form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editj8_brinca_form_simbol_insist">
                      <input type="checkbox" class="j8_brinca_form_simbol_insist" name="editj8_brinca_form_simbol_insist" id="editj8_brinca_form_simbol_insist"> Brinca de forma simbólica, mas de forma rígida, insistindo no mesmo tópico??</label>
                      <label for="">Observações:</label><br>
                      <span class="editj8_obs"></span>
                      <textarea name="editj8_obs" id="editj8_obs" cols="30" rows="4" class="j8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editj9_resiste_mud_rotina">
                      <input type="checkbox" class="j9_resiste_mud_rotina" name="editj9_resiste_mud_rotina" id="editj9_resiste_mud_rotina"> Resiste a mudanças de rotina? Dê um exemplo.</label>
                      <label for="">Observações:</label><br>
                      <span class="editj9_obs"></span>
                      <textarea name="editj9_obs" id="editj9_obs" cols="30" rows="4" class="j9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editj10_gosta_msm_ordem_horario">
                      <input type="checkbox" class="j10_gosta_msm_ordem_horario" name="editj10_gosta_msm_ordem_horario" id="editj10_gosta_msm_ordem_horario"> Ele(a) gosta que as atividades diárias sejam feitas sempre na mesma ordem e no mesmo horário?</label>
                      <label for="">Observações:</label><br>
                      <span class="editj10_obs"></span>
                      <textarea name="editj10_obs" id="editj10_obs" cols="30" rows="4" class="j10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editj11_ritual_ordem_determinada">
                      <input type="checkbox" class="j11_ritual_ordem_determinada" name="editj11_ritual_ordem_determinada" id="editj11_ritual_ordem_determinada"> Ele(a) tem algum ritual? Gosta de fazer coisas seguindo uma ordem determinada e de uma maneira específica?</label>
                      <label for="">Observações:</label><br>
                      <span class="editj11_obs"></span>
                      <textarea name="editj11_obs" id="editj11_obs" cols="30" rows="4" class="j11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editj12_coisas_msm_lugar">
                      <input type="checkbox" class="j12_coisas_msm_lugar" name="editj12_coisas_msm_lugar" id="editj12_coisas_msm_lugar"> Ele(a) gosta que as coisas fiquem sempre no mesmo lugar e do mesmo jeito, por exemplo, em casa?</label>
                      <label for="">Observações:</label><br>
                      <span class="editj12_obs"></span>
                      <textarea name="editj12_obs" id="editj12_obs" cols="30" rows="4" class="j12_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="editj13_gstmsm_roupas_alim_lugar">
                      <input type="checkbox" class="j13_gstmsm_roupas_alim_lugar" name="editj13_gstmsm_roupas_alim_lugar" id="editj13_gstmsm_roupas_alim_lugar"> Gosta de usar as mesmas roupas, comer os mesmos alimentos ou ir aos mesmos lugares?</label>
                      <label for="">Observações:</label><br>
                      <span class="editj13_obs"></span>
                      <textarea name="editj13_obs" id="editj13_obs" cols="30" rows="4" class="j13_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">                      
                      <legend>Como reage quando frustrado ou contrariado? Dê exemplos.</legend>
                      <span class="editj14_cm_reage_frust_contr"></span>
                      <textarea name="editj14_cm_reage_frust_contr" id="editj14_cm_reage_frust_contr" cols="30" rows="4" class="j14_cm_reage_frust_contr form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>       
                    <legend>Tem os seguintes hábitos?</legend>             
                    <div class="form-group">
                                <label for="editj15_chup_os_dedos">
                                <input type="checkbox" class="j15_chup_os_dedos checkbox" name="editj15_chup_os_dedos" id="editj15_chup_os_dedos"> Chupar os dedos</label>
                    </div>                
                    <div class="form-group">
                                <label for="editj15_roe_unhas">
                                <input type="checkbox" class="j15_roe_unhas checkbox" name="editj15_roe_unhas" id="editj15_roe_unhas"> Roer unhas</label>
                    </div>                                   
                    <div class="form-group">
                                <label for="editj15_estalar_dedos">
                                <input type="checkbox" class="j15_estalar_dedos checkbox" name="editj15_estalar_dedos" id="editj15_estalar_dedos"> Estalar dedos</label>
                    </div>                
                    <div class="form-group">
                                <label for="editj15_morder_labios">
                                <input type="checkbox" class="j15_morder_labios checkbox" name="editj15_morder_labios" id="editj15_morder_labios"> Morder lábios</label>
                    </div>
                    <div class="form-group">
                                <label for="editj15_mast_publico">
                                <input type="checkbox" class="j15_mast_publico checkbox" name="editj15_mast_publico" id="editj15_mast_publico"> Masturbação em público</label>
                    </div>
                    <div class="form-group">
                                <label for="editj15_torce_cabelo">
                                <input type="checkbox" class="j15_torce_cabelo checkbox" name="editj15_torce_cabelo" id="editj15_torce_cabelo"> Torcer o cabelo</label>
                    </div>
                    <div class="form-group">
                                <label for="editj15_balanc_corpo">
                                <input type="checkbox" class="j15_balanc_corpo checkbox" name="editj15_balanc_corpo" id="editj15_balanc_corpo"> Balançar o corpo</label>
                    </div>
                    <div class="form-group">
                                <label for="editj15_bater_maos">
                                <input type="checkbox" class="j15_bater_maos checkbox" name="editj15_bater_maos" id="editj15_bater_maos"> Bater mãos</label>
                    </div>
                    <div class="form-group">
                                <label for="editj15_flapping_maos">
                                <input type="checkbox" class="j15_flapping_maos checkbox" name="editj15_flapping_maos" id="editj15_flapping_maos"> Flapping de mãos</label>
                    </div>
                    <div class="form-group">
                                <label for="editj15_andar_ponta_pes">
                                <input type="checkbox" class="j15_andar_ponta_pes checkbox" name="editj15_andar_ponta_pes" id="editj15_andar_ponta_pes"> Andar na ponta dos pés</label>
                    </div>
                    <div class="form-group">
                                <label for="editj15_flex_ext_punhos">
                                <input type="checkbox" class="j15_flex_ext_punhos checkbox" name="editj15_flex_ext_punhos" id="editj15_flex_ext_punhos"> Flexionar e extender os punhos</label>
                    </div>
                    <div class="form-group">
                                <label for="editj15_morde_pp_corpo">
                                <input type="checkbox" class="j15_morde_pp_corpo checkbox" name="editj15_morde_pp_corpo" id="editj15_morde_pp_corpo"> Morder o próprio corpo</label>
                    </div>
                    <div class="form-group">
                                <label for="editj15_bater_a_cabeca">
                                <input type="checkbox" class="j15_bater_a_cabeca checkbox" name="editj15_bater_a_cabeca" id="editj15_bater_a_cabeca"> Bater a cabeça</label>
                    </div>                    
                    <div class="form-group">
                                <label for="">Outros. Quais?</label><br>
                                <span class="editj15_outros"></span>
                                <textarea name="editj15_outros" id="editj15_outros" cols="30" rows="4" class="j15_outros form-control"></textarea>
                    </div>                    
                </fieldset> 
                <fieldset>
                    <div class="form-group">
                        <label for="editj16_sensivel_barulho">
                        <input type="checkbox" class="j16_sensivel_barulho checkbox" name="editj16_sensivel_barulho" id="editj16_sensivel_barulho"> Ele(a) é muito sensível a barulho. Costuma tapar os ouvidos ou ter crises em alguma situações?</label>
                        <label for="editj16_obs">Observações:</label><br>
                        <span class="editj16_obs"></span>
                        <textarea name="editj16_obs" id="editj16_obs" class="j16_obs form-control" cols="30" rows="4"></textarea>

                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="editj17_tocarcheirarabracarinadpessobj">
                        <input type="checkbox" class="j17_tocarcheirarabracarinadpessobj checkbox" name="editj17_tocarcheirarabracarinadpessobj" id="editj17_tocarcheirarabracarinadpessobj"> Procura tocar, cheirar, ou abraçar de forma inadequada as pessoas ou objetos?</label>
                        <label for="editj17_obs">Observações:</label><br>
                        <span class="editj17_obs"></span>
                        <textarea name="editj17_obs" id="editj17_obs" class="j17_obs form-control" cols="30" rows="4"></textarea>

                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="editj18_par_nsentir_sentir_dor_frio">
                        <input type="checkbox" class="j18_par_nsentir_sentir_dor_frio checkbox" name="editj18_par_nsentir_sentir_dor_frio" id="editj18_par_nsentir_sentir_dor_frio"> Parece não sentir dor quando sofre um machucado ou não sentir frio? É pouco sensível a alguns estímulos sensoriais?</label>
                        <label for="editj18_obs">Observações:</label><br>
                        <span class="editj18_obs"></span>
                        <textarea name="editj18_obs" id="editj18_obs" class="j18_obs form-control" cols="30" rows="4"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="editj19_fascinado_luzes">
                        <input type="checkbox" class="j19_fascinado_luzes checkbox" name="editj19_fascinado_luzes" id="editj19_fascinado_luzes"> É fascinado(a) por luzes?</label>
                        <label for="editj19_obs">Observações:</label><br>
                        <span class="editj19_obs"></span>
                        <textarea name="editj19_obs" id="editj19_obs" class="j19_obs form-control" cols="30" rows="4"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="editj20_sensivel_ao_toque">
                        <input type="checkbox" class="j20_sensivel_ao_toque checkbox" name="editj20_sensivel_ao_toque" id="editj20_sensivel_ao_toque"> Ele(a) é muito sensível ao toque? Evita ser abraçado, tem dificuldades para trocar de roupas e se enxugar após o banho?</label>
                        <label for="editj20_obs">Observações:</label><br>
                        <span class="editj20_obs"></span>
                        <textarea name="editj20_obs" id="editj20_obs" class="j20_obs form-control" cols="30" rows="4"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="editj21_texturas_incomodam">
                        <input type="checkbox" class="j21_texturas_incomodam checkbox" name="editj21_texturas_incomodam" id="editj21_texturas_incomodam"> Algumas texturas realmente o(a) incomodam?</label>
                        <label for="editj21_obs">Observações:</label><br>
                        <span class="editj21_obs"></span>
                        <textarea name="editj21_obs" id="editj21_obs" class="j21_obs form-control" cols="30" rows="4"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="editj22_reacao_text_alim">
                        <input type="checkbox" class="j22_reacao_text_alim checkbox" name="editj22_reacao_text_alim" id="editj22_reacao_text_alim"> Apresenta alguma reação a textura de alimentos?</label>
                        <label for="editj22_obs">Observações:</label>
                        <span class="editj22_obs"></span>
                        <textarea name="editj22_obs" id="editj22_obs" class="j22_obs form-control" cols="30" rows="4"></textarea>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button data-color="{{$color}}" class="btn btn-{{$color}} update_histdesversaopaiscomportamentos_btn"><img id="imgedit_histdesversaopaiscomportamentos" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
        </div>
    </div>
  </div>
</div>
<!-- Fim EditHistDesVersaoPaisComportamentos -->

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
                    <div class="form-group">
                    <legend>Qual sua brincadeira favorita?</legend>                    
                    <span class="addl1_brincadeira_favorita"></span>
                    <textarea name="addl1_brincadeira_favorita" id="addl1_brincadeira_favorita" cols="30" rows="4" class="l1_brincadeira_favorita form-control"></textarea>
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
            <button data-color="{{$color}}" class="btn btn-{{$color}} add_histdesversaopais_brincadeiras_btn"><img id="imgadd_histdesversaopaisbrincadeiras" src="{{asset('storage/ajax-loader.gif')}}" style="display: none;" class="rounded-circle" width="20"> Salvar</button>
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
                    <div class="form-group">
                    <legend>Qual sua brincadeira favorita?</legend>                    
                    <span class="editl1_brincadeira_favorita"></span>
                    <textarea name="editl1_brincadeira_favorita" id="editl1_brincadeira_favorita" cols="30" rows="4" class="l1_brincadeira_favorita form-control"></textarea>
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
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh2_obs"></span>
                      <textarea name="addh2_obs" id="addh2_obs" cols="30" rows="4" class="h2_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh3_sorriso_esp_pess_familiares">
                      <input type="checkbox" class="h3_sorriso_esp_pess_familiares" name="addh3_sorriso_esp_pess_familiares" id="addh3_sorriso_esp_pess_familiares"> Sorriso espontâneo às pessoas familiares?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh3_obs"></span>
                      <textarea name="addh3_obs" id="addh3_obs" cols="30" rows="4" class="h3_obs form-control"></textarea>
                    </div>                                    
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh4_sorriso_esp_pess_nfamiliares">
                      <input type="checkbox" class="h4_sorriso_esp_pess_nfamiliares" name="addh4_sorriso_esp_pess_nfamiliares" id="addh4_sorriso_esp_pess_nfamiliares"> Sorriso espontâneo às pessoas não familiares?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh4_obs"></span>
                      <textarea name="addh4_obs" id="addh4_obs" cols="30" rows="4" class="h4_obs form-control"></textarea>
                    </div>
                </fieldset>                
                <fieldset>
                    <div class="form-group">
                      <label for="addh5_sorria_em_resp_sorriso">
                      <input type="checkbox" class="h5_sorria_em_resp_sorriso" name="addh5_sorria_em_resp_sorriso" id="addh5_sorria_em_resp_sorriso"> Sorria em resposta ao sorriso de outras pessoas?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh5_obs"></span>
                      <textarea name="addh5_obs" id="addh5_obs" cols="30" rows="4" class="h5_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="addh6_vc_conseg_ident_exp_faciais_nfilho">
                      <input type="checkbox" class="h6_vc_conseg_ident_exp_faciais_nfilho" name="addh6_vc_conseg_ident_exp_faciais_nfilho" id="addh6_vc_conseg_ident_exp_faciais_nfilho"> Você consegue identificar diversas expressões faciais em seu filho(a) (ex.: contentamento, surpresa, medo)?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh6_obs"></span>
                      <textarea name="addh6_obs" id="addh6_obs" cols="30" rows="4" class="h6_obs form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <div class="form-group">
                      <label for="addh7_apres_expr_emo_contexto">
                      <input type="checkbox" class="h7_apres_expr_emo_contexto" name="addh7_apres_expr_emo_contexto" id="addh7_apres_expr_emo_contexto"> Seu filho(a) apresenta expressões emocionais adequadas ao contexto?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh7_obs"></span>
                      <textarea name="addh7_obs" id="addh7_obs" cols="30" rows="4" class="h7_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh8_compartilha_interesses">
                      <input type="checkbox" class="h8_compartilha_interesses" name="addh8_compartilha_interesses" id="addh8_compartilha_interesses"> Compartilha interesses, atividades pazerosas com outras pessoas apenas por compartilhar?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh8_obs"></span>
                      <textarea name="addh8_obs" id="addh8_obs" cols="30" rows="4" class="h8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh9_dem_preoc_cpais">
                      <input type="checkbox" class="h9_dem_preoc_cpais" name="addh9_dem_preoc_cpais" id="addh9_dem_preoc_cpais"> Seu filho(a) demonstra preocupações quando os pais estão doentes ou machucados? Dê um exemplo.</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh9_obs"></span>
                      <textarea name="addh9_obs" id="addh9_obs" cols="30" rows="4" class="h9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh10_fazcoment_verbais_ou_gestos">
                      <input type="checkbox" class="h10_fazcoment_verbais_ou_gestos" name="addh10_fazcoment_verbais_ou_gestos" id="addh10_fazcoment_verbais_ou_gestos"> Seu filho(a) faz comentários verbais ou através de gestos? Dê um exemplo.</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh10_obs"></span>
                      <textarea name="addh10_obs" id="addh10_obs" cols="30" rows="4" class="h10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh11_olha_p_ondevc_olhando">
                      <input type="checkbox" class="h11_olha_p_ondevc_olhando" name="addh11_olha_p_ondevc_olhando" id="addh11_olha_p_ondevc_olhando"> Seu filho(a) olha para onde você está olhando?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh11_obs"></span>
                      <textarea name="addh11_obs" id="addh11_obs" cols="30" rows="4" class="h11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh12_olha_p_ondevc_aponta">
                      <input type="checkbox" class="h12_olha_p_ondevc_aponta" name="addh12_olha_p_ondevc_aponta" id="addh12_olha_p_ondevc_aponta"> Seu filho(a) Seu filho(a) olha para onde você aponta?</label>
                    </div>
                    <div class="form-group">
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
                    </div>
                    <div class="form-group">
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
                    </div>
                    <div class="form-group">
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
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh17_obs"></span>
                      <textarea name="addh17_obs" id="addh17_obs" cols="30" rows="4" class="h17_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh18_pref_brinc_par_nfc_vontemgr">
                      <input type="checkbox" class="h18_pref_brinc_par_nfc_vontemgr" name="addh18_pref_brinc_par_nfc_vontemgr" id="addh18_pref_brinc_par_nfc_vontemgr"> Prefere brincadeiras de par, não fica à vontade em grupos? Dê um exemplo.</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="addh18_obs"></span>
                      <textarea name="addh18_obs" id="addh18_obs" cols="30" rows="4" class="h18_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="addh19_evita_ctt_c_pessoas">
                      <input type="checkbox" class="h19_evita_ctt_c_pessoas" name="addh19_evita_ctt_c_pessoas" id="addh19_evita_ctt_c_pessoas"> Ignora / evita o contato com pessoas em geral? Dê um exemplo.</label>
                    </div>
                    <div class="form-group">
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
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith2_obs"></span>
                      <textarea name="edith2_obs" id="edith2_obs" cols="30" rows="4" class="h2_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith3_sorriso_esp_pess_familiares">
                      <input type="checkbox" class="h3_sorriso_esp_pess_familiares" name="edith3_sorriso_esp_pess_familiares" id="edith3_sorriso_esp_pess_familiares"> Sorriso espontâneo às pessoas familiares?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith3_obs"></span>
                      <textarea name="edith3_obs" id="edith3_obs" cols="30" rows="4" class="h3_obs form-control"></textarea>
                    </div>                                    
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith4_sorriso_esp_pess_nfamiliares">
                      <input type="checkbox" class="h4_sorriso_esp_pess_nfamiliares" name="edith4_sorriso_esp_pess_nfamiliares" id="edith4_sorriso_esp_pess_nfamiliares"> Sorriso espontâneo às pessoas não familiares?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith4_obs"></span>
                      <textarea name="edith4_obs" id="edith4_obs" cols="30" rows="4" class="h4_obs form-control"></textarea>
                    </div>
                </fieldset>                
                <fieldset>
                    <div class="form-group">
                      <label for="edith5_sorria_em_resp_sorriso">
                      <input type="checkbox" class="h5_sorria_em_resp_sorriso" name="edith5_sorria_em_resp_sorriso" id="edith5_sorria_em_resp_sorriso"> Sorria em resposta ao sorriso de outras pessoas?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith5_obs"></span>
                      <textarea name="edith5_obs" id="edith5_obs" cols="30" rows="4" class="h5_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>                    
                    <div class="form-group">
                      <label for="edith6_vc_conseg_ident_exp_faciais_nfilho">
                      <input type="checkbox" class="h6_vc_conseg_ident_exp_faciais_nfilho" name="edith6_vc_conseg_ident_exp_faciais_nfilho" id="edith6_vc_conseg_ident_exp_faciais_nfilho"> Você consegue identificar diversas expressões faciais em seu filho(a) (ex.: contentamento, surpresa, medo)?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith6_obs"></span>
                      <textarea name="edith6_obs" id="edith6_obs" cols="30" rows="4" class="h6_obs form-control"></textarea>
                    </div>
                </fieldset>    
                <fieldset>
                    <div class="form-group">
                      <label for="edith7_apres_expr_emo_contexto">
                      <input type="checkbox" class="h7_apres_expr_emo_contexto" name="edith7_apres_expr_emo_contexto" id="edith7_apres_expr_emo_contexto"> Seu filho(a) apresenta expressões emocionais adequadas ao contexto?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith7_obs"></span>
                      <textarea name="edith7_obs" id="edith7_obs" cols="30" rows="4" class="h7_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith8_compartilha_interesses">
                      <input type="checkbox" class="h8_compartilha_interesses" name="edith8_compartilha_interesses" id="edith8_compartilha_interesses"> Compartilha interesses, atividades pazerosas com outras pessoas apenas por compartilhar?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith8_obs"></span>
                      <textarea name="edith8_obs" id="edith8_obs" cols="30" rows="4" class="h8_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith9_dem_preoc_cpais">
                      <input type="checkbox" class="h9_dem_preoc_cpais" name="edith9_dem_preoc_cpais" id="edith9_dem_preoc_cpais"> Seu filho(a) demonstra preocupações quando os pais estão doentes ou machucados? Dê um exemplo.</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith9_obs"></span>
                      <textarea name="edith9_obs" id="edith9_obs" cols="30" rows="4" class="h9_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith10_fazcoment_verbais_ou_gestos">
                      <input type="checkbox" class="h10_fazcoment_verbais_ou_gestos" name="edith10_fazcoment_verbais_ou_gestos" id="edith10_fazcoment_verbais_ou_gestos"> Seu filho(a) faz comentários verbais ou através de gestos? Dê um exemplo.</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith10_obs"></span>
                      <textarea name="edith10_obs" id="edith10_obs" cols="30" rows="4" class="h10_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith11_olha_p_ondevc_olhando">
                      <input type="checkbox" class="h11_olha_p_ondevc_olhando" name="edith11_olha_p_ondevc_olhando" id="edith11_olha_p_ondevc_olhando"> Seu filho(a) olha para onde você está olhando?</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith11_obs"></span>
                      <textarea name="edith11_obs" id="edith11_obs" cols="30" rows="4" class="h11_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith12_olha_p_ondevc_aponta">
                      <input type="checkbox" class="h12_olha_p_ondevc_aponta" name="edith12_olha_p_ondevc_aponta" id="edith12_olha_p_ondevc_aponta"> Seu filho(a) Seu filho(a) olha para onde você aponta?</label>
                    </div>
                    <div class="form-group">
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
                    </div>
                    <div class="form-group">
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
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith14_obs"></span>
                      <textarea name="edith14_obs" id="edith14_obs" cols="30" rows="4" class="h14_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith15_busca_comp_out_criancas">
                      <input type="checkbox" class="h15_busca_comp_out_criancas" name="edith15_busca_comp_out_criancas" id="edith15_busca_comp_out_criancas"> Seu filho(a) busca a companhia de outras crianças espontaneamente? Dê um exemplo.</label>
                    </div>
                    <div class="form-group">
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
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith17_obs"></span>
                      <textarea name="edith17_obs" id="edith17_obs" cols="30" rows="4" class="h17_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith18_pref_brinc_par_nfc_vontemgr">
                      <input type="checkbox" class="h18_pref_brinc_par_nfc_vontemgr" name="edith18_pref_brinc_par_nfc_vontemgr" id="edith18_pref_brinc_par_nfc_vontemgr"> Prefere brincadeiras de par, não fica à vontade em grupos? Dê um exemplo.</label>
                    </div>
                    <div class="form-group">
                      <label for="">Observações:</label>
                      <span class="edith18_obs"></span>
                      <textarea name="edith18_obs" id="edith18_obs" cols="30" rows="4" class="h18_obs form-control"></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                      <label for="edith19_evita_ctt_c_pessoas">
                      <input type="checkbox" class="h19_evita_ctt_c_pessoas" name="edith19_evita_ctt_c_pessoas" id="edith19_evita_ctt_c_pessoas"> Ignora / evita o contato com pessoas em geral? Dê um exemplo.</label>
                    </div>
                    <div class="form-group">
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
                                        <li class="dropdown-item bg-light"><a href="#" class="histdes_versaopais_brincadeiras dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
                                            @if($count_histdes_versaopais_brincadeiras)<i data-id="1" id="histdes_versaopais_brincadeiras{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_brincadeiras{{$atendimento->id}}"></i>@endif Brincadeiras</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="histdes_versaopais_comportamentos dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
                                            @if($count_histdes_versaopais_comportamentos)<i data-id="1" id="histdes_versaopais_comportamentos{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_comportamentos{{$atendimento->id}}"></i>@endif Comportamentos</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="histdes_versaopais_independencia dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
                                            @if($count_histdes_versaopais_independencia)<i data-id="1" id="histdes_versaopais_independencia{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_independencia{{$atendimento->id}}"></i>@endif Independência</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="histdes_versaopais_desenvmotor dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
                                            @if($count_histdes_versaopais_desenvmotor)<i data-id="1" id="histdes_versaopais_desenvmotor{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_desenvmotor{{$atendimento->id}}"></i>@endif Desenvolvimento Motor</a></li>    
                                        <li class="dropdown-item bg-light"><a href="#" class="histdes_versaopais_histescolar dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
                                            @if($count_histdes_versaopais_histescolar)<i data-id="1" id="histdes_versaopais_histescolar{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_histescolar{{$atendimento->id}}"></i>@endif Histórico Escolar</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="histdes_versaopais_compcasa dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
                                            @if($count_histdes_versaopais_compcasa)<i data-id="1" id="histdes_versaopais_compcasa{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_versaopais_compcasa{{$atendimento->id}}"></i>@endif Comportamento em Casa</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="histdes_anexo1_rotalim dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
                                            @if($count_histdes_anexo1_rotalim)<i data-id="1" id="histdes_anexo1_rotalim{{$atendimento->id}}" class="fas fa-check" style="color: green"></i>@else<i data-id="0" id="histdes_anexo1_rotalim{{$atendimento->id}}"></i>@endif Rotina Alimentar</a></li>
                                        <li class="dropdown-item bg-light"><a href="#" class="histdes_anexo2_histmedico dropdown-item" data-pacienteid="{{$atendimento->paciente_id}}" data-atendimentoid="{{$atendimento->id}}">
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

//início histdes_versaopais_desenvsocial

$("#AddAHistDesVersaoPaisDesenvSocial").on('shown.bs.modal',function(){
            $(".h1_idade_prim_sorrisos").focus();
    });

$("#EditHistDesVersaoPaisDesenvSocial").on('shown.bs.modal',function(){
            $(".h1_idade_prim_sorrisos").focus();
    });

//inicio conta caracteres dos textarea HistDesVersaoPaisDesenvSocial

    //add
 
    $(document).on('input','#addh1_idade_prim_sorrisos',function(){
        var limite = 10;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h1_idade_prim_sorrisos = $('input[name="addh1_idade_prim_sorrisos"]').val();
            $('input[name="addh1_idade_prim_sorrisos"]').val(h1_idade_prim_sorrisos.substr(0,limite));
            $(".addh1_idade_prim_sorrisos").text("0" + " " + informativo);
        }else{
            $(".addh1_idade_prim_sorrisos").text(caracteresRestantes + " " + informativo);
        }
    });
    
    $(document).on('input','#addh2_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h2_obs = $('textarea[name="addh2_obs"]').val();
            $('textarea[name="addh2_obs"]').val(h2_obs.substr(0,limite));
            $(".addh2_obs").text("0" + " " + informativo);
        }else{
            $(".addh2_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh3_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h3_obs = $('textarea[name="addh3_obs"]').val();
            $('textarea[name="addh3_obs"]').val(h3_obs.substr(0,limite));
            $(".addh3_obs").text("0" + " " + informativo);
        }else{
            $(".addh3_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh4_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h4_obs = $('textarea[name="addh4_obs"]').val();
            $('textarea[name="addh4_obs"]').val(h4_obs.substr(0,limite));
            $(".addh4_obs").text("0" + " " + informativo);
        }else{
            $(".addh4_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh5_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h5_obs = $('textarea[name="addh5_obs"]').val();
            $('textarea[name="addh5_obs"]').val(h5_obs.substr(0,limite));
            $(".addh5_obs").text("0" + " " + informativo);
        }else{
            $(".addh5_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh6_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h6_obs = $('textarea[name="addh6_obs"]').val();
            $('textarea[name="addh6_obs"]').val(h6_obs.substr(0,limite));
            $(".addh6_obs").text("0" + " " + informativo);
        }else{
            $(".addh6_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh7_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h7_obs = $('textarea[name="addh7_obs"]').val();
            $('textarea[name="addh7_obs"]').val(h7_obs.substr(0,limite));
            $(".addh7_obs").text("0" + " " + informativo);
        }else{
            $(".addh7_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh8_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h8_obs = $('textarea[name="addh8_obs"]').val();
            $('textarea[name="addh8_obs"]').val(h8_obs.substr(0,limite));
            $(".addh8_obs").text("0" + " " + informativo);
        }else{
            $(".addh8_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh9_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h9_obs = $('textarea[name="addh9_obs"]').val();
            $('textarea[name="addh9_obs"]').val(h9_obs.substr(0,limite));
            $(".addh9_obs").text("0" + " " + informativo);
        }else{
            $(".addh9_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh10_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h10_obs = $('textarea[name="addh10_obs"]').val();
            $('textarea[name="addh10_obs"]').val(h10_obs.substr(0,limite));
            $(".addh10_obs").text("0" + " " + informativo);
        }else{
            $(".addh10_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh11_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h11_obs = $('textarea[name="addh11_obs"]').val();
            $('textarea[name="addh11_obs"]').val(h11_obs.substr(0,limite));
            $(".addh11_obs").text("0" + " " + informativo);
        }else{
            $(".addh11_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh12_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h12_obs = $('textarea[name="addh12_obs"]').val();
            $('textarea[name="addh12_obs"]').val(h12_obs.substr(0,limite));
            $(".addh12_obs").text("0" + " " + informativo);
        }else{
            $(".addh12_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh13_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h13_obs = $('textarea[name="addh13_obs"]').val();
            $('textarea[name="addh13_obs"]').val(h13_obs.substr(0,limite));
            $(".addh13_obs").text("0" + " " + informativo);
        }else{
            $(".addh13_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh14_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h14_obs = $('textarea[name="addh14_obs"]').val();
            $('textarea[name="addh14_obs"]').val(h14_obs.substr(0,limite));
            $(".addh14_obs").text("0" + " " + informativo);
        }else{
            $(".addh14_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh15_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h15_obs = $('textarea[name="addh15_obs"]').val();
            $('textarea[name="addh15_obs"]').val(h15_obs.substr(0,limite));
            $(".addh15_obs").text("0" + " " + informativo);
        }else{
            $(".addh15_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh16_cm_reag_a_criancasdesc_festa',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h16_cm_reag_a_criancasdesc_festa = $('textarea[name="addh16_cm_reag_a_criancasdesc_festa"]').val();
            $('textarea[name="addh16_cm_reag_a_criancasdesc_festa"]').val(h16_cm_reag_a_criancasdesc_festa.substr(0,limite));
            $(".addh16_cm_reag_a_criancasdesc_festa").text("0" + " " + informativo);
        }else{
            $(".addh16_cm_reag_a_criancasdesc_festa").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh16_fica_ansioso',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h16_fica_ansioso = $('textarea[name="addh16_fica_ansioso"]').val();
            $('textarea[name="addh16_fica_ansioso"]').val(h16_fica_ansioso.substr(0,limite));
            $(".addh16_fica_ansioso").text("0" + " " + informativo);
        }else{
            $(".addh16_fica_ansioso").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh17_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h17_obs = $('textarea[name="addh17_obs"]').val();
            $('textarea[name="addh17_obs"]').val(h17_obs.substr(0,limite));
            $(".addh17_obs").text("0" + " " + informativo);
        }else{
            $(".addh17_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh18_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h18_obs = $('textarea[name="addh18_obs"]').val();
            $('textarea[name="addh18_obs"]').val(h18_obs.substr(0,limite));
            $(".addh18_obs").text("0" + " " + informativo);
        }else{
            $(".addh18_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addh19_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h19_obs = $('textarea[name="addh19_obs"]').val();
            $('textarea[name="addh19_obs"]').val(h19_obs.substr(0,limite));
            $(".addh19_obs").text("0" + " " + informativo);
        }else{
            $(".addh19_obs").text(caracteresRestantes + " " + informativo);
        }
    });


    //edit
 
    $(document).on('input','#edith1_idade_prim_sorrisos',function(){
        var limite = 10;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h1_idade_prim_sorrisos = $('input[name="edith1_idade_prim_sorrisos"]').val();
            $('input[name="edith1_idade_prim_sorrisos"]').val(h1_idade_prim_sorrisos.substr(0,limite));
            $(".edith1_idade_prim_sorrisos").text("0" + " " + informativo);
        }else{
            $(".edith1_idade_prim_sorrisos").text(caracteresRestantes + " " + informativo);
        }
    });
    
    $(document).on('input','#edith2_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h2_obs = $('textarea[name="edith2_obs"]').val();
            $('textarea[name="edith2_obs"]').val(h2_obs.substr(0,limite));
            $(".edith2_obs").text("0" + " " + informativo);
        }else{
            $(".edith2_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith3_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h3_obs = $('textarea[name="edith3_obs"]').val();
            $('textarea[name="edith3_obs"]').val(h3_obs.substr(0,limite));
            $(".edith3_obs").text("0" + " " + informativo);
        }else{
            $(".edith3_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith4_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h4_obs = $('textarea[name="edith4_obs"]').val();
            $('textarea[name="edith4_obs"]').val(h4_obs.substr(0,limite));
            $(".edith4_obs").text("0" + " " + informativo);
        }else{
            $(".edith4_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith5_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h5_obs = $('textarea[name="edith5_obs"]').val();
            $('textarea[name="edith5_obs"]').val(h5_obs.substr(0,limite));
            $(".edith5_obs").text("0" + " " + informativo);
        }else{
            $(".edith5_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith6_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h6_obs = $('textarea[name="edith6_obs"]').val();
            $('textarea[name="edith6_obs"]').val(h6_obs.substr(0,limite));
            $(".edith6_obs").text("0" + " " + informativo);
        }else{
            $(".edith6_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith7_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h7_obs = $('textarea[name="edith7_obs"]').val();
            $('textarea[name="edith7_obs"]').val(h7_obs.substr(0,limite));
            $(".edith7_obs").text("0" + " " + informativo);
        }else{
            $(".edith7_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith8_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h8_obs = $('textarea[name="edith8_obs"]').val();
            $('textarea[name="edith8_obs"]').val(h8_obs.substr(0,limite));
            $(".edith8_obs").text("0" + " " + informativo);
        }else{
            $(".edith8_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith9_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h9_obs = $('textarea[name="edith9_obs"]').val();
            $('textarea[name="edith9_obs"]').val(h9_obs.substr(0,limite));
            $(".edith9_obs").text("0" + " " + informativo);
        }else{
            $(".edith9_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith10_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h10_obs = $('textarea[name="edith10_obs"]').val();
            $('textarea[name="edith10_obs"]').val(h10_obs.substr(0,limite));
            $(".edith10_obs").text("0" + " " + informativo);
        }else{
            $(".edith10_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith11_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h11_obs = $('textarea[name="edith11_obs"]').val();
            $('textarea[name="edith11_obs"]').val(h11_obs.substr(0,limite));
            $(".edith11_obs").text("0" + " " + informativo);
        }else{
            $(".edith11_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith12_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h12_obs = $('textarea[name="edith12_obs"]').val();
            $('textarea[name="edith12_obs"]').val(h12_obs.substr(0,limite));
            $(".edith12_obs").text("0" + " " + informativo);
        }else{
            $(".edith12_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith13_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h13_obs = $('textarea[name="edith13_obs"]').val();
            $('textarea[name="edith13_obs"]').val(h13_obs.substr(0,limite));
            $(".edith13_obs").text("0" + " " + informativo);
        }else{
            $(".edith13_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith14_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h14_obs = $('textarea[name="edith14_obs"]').val();
            $('textarea[name="edith14_obs"]').val(h14_obs.substr(0,limite));
            $(".edith14_obs").text("0" + " " + informativo);
        }else{
            $(".edith14_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith15_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h15_obs = $('textarea[name="edith15_obs"]').val();
            $('textarea[name="edith15_obs"]').val(h15_obs.substr(0,limite));
            $(".edith15_obs").text("0" + " " + informativo);
        }else{
            $(".edith15_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith16_cm_reag_a_criancasdesc_festa',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h16_cm_reag_a_criancasdesc_festa = $('textarea[name="edith16_cm_reag_a_criancasdesc_festa"]').val();
            $('textarea[name="edith16_cm_reag_a_criancasdesc_festa"]').val(h16_cm_reag_a_criancasdesc_festa.substr(0,limite));
            $(".edith16_cm_reag_a_criancasdesc_festa").text("0" + " " + informativo);
        }else{
            $(".edith16_cm_reag_a_criancasdesc_festa").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith16_fica_ansioso',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h16_fica_ansioso = $('textarea[name="edith16_fica_ansioso"]').val();
            $('textarea[name="edith16_fica_ansioso"]').val(h16_fica_ansioso.substr(0,limite));
            $(".edith16_fica_ansioso").text("0" + " " + informativo);
        }else{
            $(".edith16_fica_ansioso").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith17_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h17_obs = $('textarea[name="edith17_obs"]').val();
            $('textarea[name="edith17_obs"]').val(h17_obs.substr(0,limite));
            $(".edith17_obs").text("0" + " " + informativo);
        }else{
            $(".edith17_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith18_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h18_obs = $('textarea[name="edith18_obs"]').val();
            $('textarea[name="edith18_obs"]').val(h18_obs.substr(0,limite));
            $(".edith18_obs").text("0" + " " + informativo);
        }else{
            $(".edith18_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#edith19_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var h19_obs = $('textarea[name="edith19_obs"]').val();
            $('textarea[name="edith19_obs"]').val(h19_obs.substr(0,limite));
            $(".edith19_obs").text("0" + " " + informativo);
        }else{
            $(".edith19_obs").text(caracteresRestantes + " " + informativo);
        }
    });


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
        data.append('h2_olha_p_face_qdobrinca_c_ele',$(".h2_olha_p_face_qdobrinca_c_ele").is(":checked")?'true':'false');
        data.append('h2_obs',$(".h2_obs").val());
        data.append('h3_sorriso_esp_pess_familiares',$(".h3_sorriso_esp_pess_familiares").is(":checked")?'true':'false');
        data.append('h3_obs',$(".h3_obs").val());
        data.append('h4_sorriso_esp_pess_nfamiliares',$(".h4_sorriso_esp_pess_nfamiliares").is(":checked")?'true':'false');
        data.append('h4_obs',$(".h4_obs").val());
        data.append('h5_sorria_em_resp_sorriso',$(".h5_sorria_em_resp_sorriso").is(":checked")?'true':'false');
        data.append('h5_obs',$(".h5_obs").val());
        data.append('h6_vc_conseg_ident_exp_faciais_nfilho',$(".h6_vc_conseg_ident_exp_faciais_nfilho").is(":checked")?'true':'false');
        data.append('h6_obs',$(".h6_obs").val());
        data.append('h7_apres_expr_emo_contexto',$(".h7_apres_expr_emo_contexto").is(":checked")?'true':'false');
        data.append('h7_obs',$(".h7_obs").val());
        data.append('h8_compartilha_interesses',$(".h8_compartilha_interesses").is(":checked")?'true':'false');
        data.append('h8_obs',$(".h8_obs").val());
        data.append('h9_dem_preoc_cpais',$(".h9_dem_preoc_cpais").is(":checked")?'true':'false');
        data.append('h9_obs',$(".h9_obs").val());
        data.append('h10_fazcoment_verbais_ou_gestos',$(".h10_fazcoment_verbais_ou_gestos").is(":checked")?'true':'false');
        data.append('h10_obs',$(".h10_obs").val());
        data.append('h11_olha_p_ondevc_olhando',$(".h11_olha_p_ondevc_olhando").is(":checked")?'true':'false');
        data.append('h11_obs',$(".h11_obs").val());
        data.append('h12_olha_p_ondevc_aponta',$(".h12_olha_p_ondevc_aponta").is(":checked")?'true':'false');
        data.append('h12_obs',$(".h12_obs").val());
        data.append('h13_resp_conv_p_brincarcadultos',$(".h13_resp_conv_p_brincarcadultos").is(":checked")?'true':'false');
        data.append('h13_apos_insistencia',$(".h13_apos_insistencia").is(":checked")?'true':'false');
        data.append('h13_obs',$(".h13_obs").val());
        data.append('h14_resp_conv_p_brincarccriancas',$(".h14_resp_conv_p_brincarccriancas").is(":checked")?'true':'false');
        data.append('h14_apos_insistencia',$(".h14_apos_insistencia").is(":checked")?'true':'false');
        data.append('h14_obs',$(".h14_obs").val());
        data.append('h15_busca_comp_out_criancas',$(".h15_busca_comp_out_criancas").is(":checked")?'true':'false');
        data.append('h15_obs',$(".h15_obs").val());
        data.append('h16_cm_reag_a_criancasdesc_festa',$(".h16_cm_reag_a_criancasdesc_festa").val());
        data.append('h16_fica_ansioso',$(".h16_fica_ansioso").val());
        data.append('h17_perm_som_algtipo_brinc',$(".h17_perm_som_algtipo_brinc").is(":checked")?'true':'false');
        data.append('h17_obs',$(".h17_obs").val());
        data.append('h18_pref_brinc_par_nfc_vontemgr',$(".h18_pref_brinc_par_nfc_vontemgr").is(":checked")?'true':'false');
        data.append('h18_obs',$(".h18_obs").val());
        data.append('h19_evita_ctt_c_pessoas',$(".h19_evita_ctt_c_pessoas").is(":checked")?'true':'false');
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
        data.append('h2_olha_p_face_qdobrinca_c_ele',$("#edith2_olha_p_face_qdobrinca_c_ele").is(":checked")?'true':'false');
        data.append('h2_obs',$("#edith2_obs").val());
        data.append('h3_sorriso_esp_pess_familiares',$("#edith3_sorriso_esp_pess_familiares").is(":checked")?'true':'false');
        data.append('h3_obs',$("#edith3_obs").val());
        data.append('h4_sorriso_esp_pess_nfamiliares',$("#edith4_sorriso_esp_pess_nfamiliares").is(":checked")?'true':'false');
        data.append('h4_obs',$("#edith4_obs").val());
        data.append('h5_sorria_em_resp_sorriso',$("#edith5_sorria_em_resp_sorriso").is(":checked")?'true':'false');
        data.append('h5_obs',$("#edith5_obs").val());
        data.append('h6_vc_conseg_ident_exp_faciais_nfilho',$("#edith6_vc_conseg_ident_exp_faciais_nfilho").is(":checked")?'true':'false');
        data.append('h6_obs',$("#edith6_obs").val());
        data.append('h7_apres_expr_emo_contexto',$("#edith7_apres_expr_emo_contexto").is(":checked")?'true':'false');
        data.append('h7_obs',$("#edith7_obs").val());
        data.append('h8_compartilha_interesses',$("#edith8_compartilha_interesses").is(":checked")?'true':'false');
        data.append('h8_obs',$("#edith8_obs").val());
        data.append('h9_dem_preoc_cpais',$("#edith9_dem_preoc_cpais").is(":checked")?'true':'false');
        data.append('h9_obs',$("#edith9_obs").val());
        data.append('h10_fazcoment_verbais_ou_gestos',$("#edith10_fazcoment_verbais_ou_gestos").is(":checked")?'true':'false');
        data.append('h10_obs',$("#edith10_obs").val());
        data.append('h11_olha_p_ondevc_olhando',$("#edith11_olha_p_ondevc_olhando").is(":checked")?'true':'false');
        data.append('h11_obs',$("#edith11_obs").val());
        data.append('h12_olha_p_ondevc_aponta',$("#edith12_olha_p_ondevc_aponta").is(":checked")?'true':'false');
        data.append('h12_obs',$("#edith12_obs").val());
        data.append('h13_resp_conv_p_brincarcadultos',$("#edith13_resp_conv_p_brincarcadultos").is(":checked")?'true':'false');
        data.append('h13_apos_insistencia',$("#edith13_apos_insistencia").is(":checked")?'true':'false');
        data.append('h13_obs',$("#edith13_obs").val());
        data.append('h14_resp_conv_p_brincarccriancas',$("#edith14_resp_conv_p_brincarccriancas").is(":checked")?'true':'false');
        data.append('h14_apos_insistencia',$("#edith14_apos_insistencia").is(":checked")?'true':'false');
        data.append('h14_obs',$("#edith14_obs").val());
        data.append('h15_busca_comp_out_criancas',$("#edith15_busca_comp_out_criancas").is(":checked")?'true':'false');
        data.append('h15_obs',$("#edith15_obs").val());
        data.append('h16_cm_reag_a_criancasdesc_festa',$("#edith16_cm_reag_a_criancasdesc_festa").val());
        data.append('h16_fica_ansioso',$("#edith16_fica_ansioso").val());
        data.append('h17_perm_som_algtipo_brinc',$("#edith17_perm_som_algtipo_brinc").is(":checked")?'true':'false');
        data.append('h17_obs',$("#edith17_obs").val());
        data.append('h18_pref_brinc_par_nfc_vontemgr',$("#edith18_pref_brinc_par_nfc_vontemgr").is(":checked")?'true':'false');
        data.append('h18_obs',$("#edith18_obs").val());
        data.append('h19_evita_ctt_c_pessoas',$("#edith19_evita_ctt_c_pessoas").is(":checked")?'true':'false');
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

//início histdes_versaopais_brincadeiras

$("#AddAHistDesVersaoPaisBrincadeiras").on('shown.bs.modal',function(){
            $(".l1_brincadeira_favorita").focus();
    });

$("#EditHistDesVersaoPaisBrincadeiras").on('shown.bs.modal',function(){
            $(".l1_brincadeira_favorita").focus();
    });

//inicio conta caracteres dos textarea HistDesVersaoPaisBrincadeiras

    //add
 
    $(document).on('input','#addl1_brincadeira_favorita',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l1_brincadeira_favorita = $('textarea[name="addl1_brincadeira_favorita"]').val();
            $('textarea[name="addl1_brincadeira_favorita"]').val(l1_brincadeira_favorita.substr(0,limite));
            $(".addl1_brincadeira_favorita").text("0" + " " + informativo);
        }else{
            $(".addl1_brincadeira_favorita").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl2_brinquedos_favoritos',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l2_brinquedos_favoritos = $('textarea[name="addl2_brinquedos_favoritos"]').val();
            $('textarea[name="addl2_brinquedos_favoritos"]').val(l2_brinquedos_favoritos.substr(0,limite));
            $(".addl2_brinquedos_favoritos").text("0" + " " + informativo);
        }else{
            $(".addl2_brinquedos_favoritos").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl3_vc_o_considera_obcecado',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l3_vc_o_considera_obcecado = $('textarea[name="addl3_vc_o_considera_obcecado"]').val();
            $('textarea[name="addl3_vc_o_considera_obcecado"]').val(l3_vc_o_considera_obcecado.substr(0,limite));
            $(".addl3_vc_o_considera_obcecado").text("0" + " " + informativo);
        }else{
            $(".addl3_vc_o_considera_obcecado").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl3_ele_ja_foi_obcecado_por_algo',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l3_ele_ja_foi_obcecado_por_algo = $('textarea[name="addl3_ele_ja_foi_obcecado_por_algo"]').val();
            $('textarea[name="addl3_ele_ja_foi_obcecado_por_algo"]').val(l3_ele_ja_foi_obcecado_por_algo.substr(0,limite));
            $(".addl3_ele_ja_foi_obcecado_por_algo").text("0" + " " + informativo);
        }else{
            $(".addl3_ele_ja_foi_obcecado_por_algo").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl4_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l4_obs = $('textarea[name="addl4_obs"]').val();
            $('textarea[name="addl4_obs"]').val(l4_obs.substr(0,limite));
            $(".addl4_obs").text("0" + " " + informativo);
        }else{
            $(".addl4_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl5_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l5_obs = $('textarea[name="addl5_obs"]').val();
            $('textarea[name="addl5_obs"]').val(l5_obs.substr(0,limite));
            $(".addl5_obs").text("0" + " " + informativo);
        }else{
            $(".addl5_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl6_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l6_obs = $('textarea[name="addl6_obs"]').val();
            $('textarea[name="addl6_obs"]').val(l6_obs.substr(0,limite));
            $(".addl6_obs").text("0" + " " + informativo);
        }else{
            $(".addl6_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl7_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l7_obs = $('textarea[name="addl7_obs"]').val();
            $('textarea[name="addl7_obs"]').val(l7_obs.substr(0,limite));
            $(".addl7_obs").text("0" + " " + informativo);
        }else{
            $(".addl7_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl8_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l8_obs = $('textarea[name="addl8_obs"]').val();
            $('textarea[name="addl8_obs"]').val(l8_obs.substr(0,limite));
            $(".addl8_obs").text("0" + " " + informativo);
        }else{
            $(".addl8_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl9_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l9_obs = $('textarea[name="addl9_obs"]').val();
            $('textarea[name="addl9_obs"]').val(l9_obs.substr(0,limite));
            $(".addl9_obs").text("0" + " " + informativo);
        }else{
            $(".addl9_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl10_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l10_obs = $('textarea[name="addl10_obs"]').val();
            $('textarea[name="addl10_obs"]').val(l10_obs.substr(0,limite));
            $(".addl10_obs").text("0" + " " + informativo);
        }else{
            $(".addl10_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl11_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l11_obs = $('textarea[name="addl11_obs"]').val();
            $('textarea[name="addl11_obs"]').val(l11_obs.substr(0,limite));
            $(".addl11_obs").text("0" + " " + informativo);
        }else{
            $(".addl11_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl12_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l12_obs = $('textarea[name="addl12_obs"]').val();
            $('textarea[name="addl12_obs"]').val(l12_obs.substr(0,limite));
            $(".addl12_obs").text("0" + " " + informativo);
        }else{
            $(".addl12_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl13_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l13_obs = $('textarea[name="addl13_obs"]').val();
            $('textarea[name="addl13_obs"]').val(l13_obs.substr(0,limite));
            $(".addl13_obs").text("0" + " " + informativo);
        }else{
            $(".addl13_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl14_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l14_obs = $('textarea[name="addl14_obs"]').val();
            $('textarea[name="addl14_obs"]').val(l14_obs.substr(0,limite));
            $(".addl14_obs").text("0" + " " + informativo);
        }else{
            $(".addl14_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl15_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l15_obs = $('textarea[name="addl15_obs"]').val();
            $('textarea[name="addl15_obs"]').val(l15_obs.substr(0,limite));
            $(".addl15_obs").text("0" + " " + informativo);
        }else{
            $(".addl15_obs").text(caracteresRestantes + " " + informativo);
        }
    });

   //edit
 
    $(document).on('input','#editl1_brincadeira_favorita',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l1_brincadeira_favorita = $('textarea[name="editl1_brincadeira_favorita"]').val();
            $('textarea[name="editl1_brincadeira_favorita"]').val(l1_brincadeira_favorita.substr(0,limite));
            $(".editl1_brincadeira_favorita").text("0" + " " + informativo);
        }else{
            $(".editl1_brincadeira_favorita").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl2_brinquedos_favoritos',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l2_brinquedos_favoritos = $('textarea[name="editl2_brinquedos_favoritos"]').val();
            $('textarea[name="editl2_brinquedos_favoritos"]').val(l2_brinquedos_favoritos.substr(0,limite));
            $(".editl2_brinquedos_favoritos").text("0" + " " + informativo);
        }else{
            $(".editl2_brinquedos_favoritos").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl3_vc_o_considera_obcecado',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l3_vc_o_considera_obcecado = $('textarea[name="editl3_vc_o_considera_obcecado"]').val();
            $('textarea[name="editl3_vc_o_considera_obcecado"]').val(l3_vc_o_considera_obcecado.substr(0,limite));
            $(".editl3_vc_o_considera_obcecado").text("0" + " " + informativo);
        }else{
            $(".editl3_vc_o_considera_obcecado").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl3_ele_ja_foi_obcecado_por_algo',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l3_ele_ja_foi_obcecado_por_algo = $('textarea[name="editl3_ele_ja_foi_obcecado_por_algo"]').val();
            $('textarea[name="editl3_ele_ja_foi_obcecado_por_algo"]').val(l3_ele_ja_foi_obcecado_por_algo.substr(0,limite));
            $(".editl3_ele_ja_foi_obcecado_por_algo").text("0" + " " + informativo);
        }else{
            $(".editl3_ele_ja_foi_obcecado_por_algo").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl4_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l4_obs = $('textarea[name="editl4_obs"]').val();
            $('textarea[name="editl4_obs"]').val(l4_obs.substr(0,limite));
            $(".editl4_obs").text("0" + " " + informativo);
        }else{
            $(".editl4_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl5_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l5_obs = $('textarea[name="editl5_obs"]').val();
            $('textarea[name="editl5_obs"]').val(l5_obs.substr(0,limite));
            $(".editl5_obs").text("0" + " " + informativo);
        }else{
            $(".editl5_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl6_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l6_obs = $('textarea[name="editl6_obs"]').val();
            $('textarea[name="editl6_obs"]').val(l6_obs.substr(0,limite));
            $(".editl6_obs").text("0" + " " + informativo);
        }else{
            $(".editl6_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl7_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l7_obs = $('textarea[name="editl7_obs"]').val();
            $('textarea[name="editl7_obs"]').val(l7_obs.substr(0,limite));
            $(".editl7_obs").text("0" + " " + informativo);
        }else{
            $(".editl7_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl8_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l8_obs = $('textarea[name="editl8_obs"]').val();
            $('textarea[name="editl8_obs"]').val(l8_obs.substr(0,limite));
            $(".editl8_obs").text("0" + " " + informativo);
        }else{
            $(".editl8_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl9_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l9_obs = $('textarea[name="editl9_obs"]').val();
            $('textarea[name="editl9_obs"]').val(l9_obs.substr(0,limite));
            $(".editl9_obs").text("0" + " " + informativo);
        }else{
            $(".editl9_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl10_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l10_obs = $('textarea[name="editl10_obs"]').val();
            $('textarea[name="editl10_obs"]').val(l10_obs.substr(0,limite));
            $(".editl10_obs").text("0" + " " + informativo);
        }else{
            $(".editl10_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl11_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l11_obs = $('textarea[name="editl11_obs"]').val();
            $('textarea[name="editl11_obs"]').val(l11_obs.substr(0,limite));
            $(".editl11_obs").text("0" + " " + informativo);
        }else{
            $(".editl11_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl12_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l12_obs = $('textarea[name="editl12_obs"]').val();
            $('textarea[name="editl12_obs"]').val(l12_obs.substr(0,limite));
            $(".editl12_obs").text("0" + " " + informativo);
        }else{
            $(".editl12_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl13_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l13_obs = $('textarea[name="editl13_obs"]').val();
            $('textarea[name="editl13_obs"]').val(l13_obs.substr(0,limite));
            $(".editl13_obs").text("0" + " " + informativo);
        }else{
            $(".editl13_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl14_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l14_obs = $('textarea[name="editl14_obs"]').val();
            $('textarea[name="editl14_obs"]').val(l14_obs.substr(0,limite));
            $(".editl14_obs").text("0" + " " + informativo);
        }else{
            $(".editl14_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl15_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l15_obs = $('textarea[name="editl15_obs"]').val();
            $('textarea[name="editl15_obs"]').val(l15_obs.substr(0,limite));
            $(".editl15_obs").text("0" + " " + informativo);
        }else{
            $(".editl15_obs").text(caracteresRestantes + " " + informativo);
        }
    });

$(document).on('click','.histdes_versaopais_brincadeiras',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_histdes_versaopais_brincadeiras = $("#histdes_versaopais_brincadeiras"+atendimentoid).data("id");

        if(opcao_form_histdes_versaopais_brincadeiras==0){
                $("#addpacienteid_histdesversaopaisbrincadeiras").val(pacienteid);
                $("#addatendimentoid_histdesversaopaisbrincadeiras").val(atendimentoid);
                $("#addform_histdesversaopaisbrincadeiras").trigger('reset');
                $("#AddHistDesVersaoPaisBrincadeiras").modal('show'); 
                $("#saveform_errList_histdesversaopaisbrincadeiras").replaceWith('<ul id="saveform_errList_histdesversaopaisbrincadeiras"></ul>');
        }else{            
                $("#editpacienteid_histdesversaopaisbrincadeiras").val(pacienteid);
                $("#editatendimentoid_histdesversaopaisbrincadeiras").val(atendimentoid);
                $("#editform_histdesversaopaisbrincadeiras").trigger('reset');
                $("#EditHistDesVersaoPaisBrincadeiras").modal('show'); 
                $("#updateform_errList_histdesversaobrincadeiras").replaceWith('<ul id="updateform_errList_histdesversaobrincadeiras"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_histdesversaopaisbrincadeiras/'+pacienteid,
                    success: function(response){           
                        if(response.status==200){                            
                            $(".l1_brincadeira_favorita").val(response.histdesversaopaisbrincadeiras.i1_brincadeira_favorita);
                            $(".l2_brinquedos_favoritos").val(response.histdesversaopaisbrincadeiras.i2_brinquedos_favoritos);
                            $(".l3_vc_o_considera_obcecado").val(response.histdesversaopaisbrincadeiras.i3_vc_o_considera_obcecado);
                            $(".l3_ele_ja_foi_obcecado_por_algo").val(response.histdesversaopaisbrincadeiras.i3_ele_ja_foi_obcecado_por_algo);                            
                            $(".l4_tem_inter_p_cheiro_textura").attr('checked',response.histdesversaopaisbrincadeiras.i4_tem_inter_p_cheiro_textura);
                            $(".l4_obs").val(response.histdesversaopaisbrincadeiras.i4_obs);
                            $(".l5_brinca_de_form_repet").attr('checked',response.histdesversaopaisbrincadeiras.i5_brinca_de_form_repet);
                            $(".l5_obs").val(response.histdesversaopaisbrincadeiras.i5_obs);
                            $(".l6_brinca_de_form_func").attr('checked',response.histdesversaopaisbrincadeiras.i6_brinca_de_form_func);
                            $(".l6_obs").val(response.histdesversaopaisbrincadeiras.i6_obs);
                            $(".l7_brinca_de_form_simb_mini").attr('checked',response.histdesversaopaisbrincadeiras.i7_brinca_de_form_simb_mini);
                            $(".l7_obs").val(response.histdesversaopaisbrincadeiras.i7_obs);
                            $(".l8_brinca_de_form_simb_objetos").attr('checked',response.histdesversaopaisbrincadeiras.i8_brinca_de_form_simb_objetos);
                            $(".l8_obs").val(response.histdesversaopaisbrincadeiras.i8_obs);
                            $(".l9_brinca_de_form_simb_atrpapeis").attr('checked',response.histdesversaopaisbrincadeiras.i9_brinca_de_form_simb_atrpapeis);
                            $(".l9_obs").val(response.histdesversaopaisbrincadeiras.i9_obs);
                            $(".l10_segue_regras_de_brincadeiras").attr('checked',response.histdesversaopaisbrincadeiras.i10_segue_regras_de_brincadeiras);
                            $(".l10_obs").val(response.histdesversaopaisbrincadeiras.i10_obs);
                            $(".l11_bom_fazer_amizades").attr('checked',response.histdesversaopaisbrincadeiras.i11_bom_fazer_amizades);
                            $(".l11_obs").val(response.histdesversaopaisbrincadeiras.i11_obs);
                            $(".l12_e_solitario").attr('checked',response.histdesversaopaisbrincadeiras.i12_e_solitario);
                            $(".l12_obs").val(response.histdesversaopaisbrincadeiras.i12_obs);
                            $(".l13_e_timido").attr('checked',response.histdesversaopaisbrincadeiras.i13_e_timido);
                            $(".l13_obs").val(response.histdesversaopaisbrincadeiras.i13_obs);
                            $(".l14_tem_melhor_amigo").attr('checked',response.histdesversaopaisbrincadeiras.i14_tem_melhor_amigo);
                            $(".l14_obs").val(response.histdesversaopaisbrincadeiras.i14_obs);
                            $(".l15_obs").val(response.histdesversaopaisbrincadeiras.i15_prefer_criancas_mesma_idade);                            
                        }      
                    }
                });
        }
    });


    $(document).on('click','.add_histdesversaopais_brincadeiras_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histdesversaopaisbrincadeiras").val();
        var atendimentoid = $("#addatendimentoid_histdesversaopaisbrincadeiras").val();

        var loading = $("#imgadd_histdesversaopaisbrincadeiras");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('l1_brincadeira_favorita',$(".l1_brincadeira_favorita").val());
        data.append('l2_brinquedos_favoritos',$(".l2_brinquedos_favoritos").val());
        data.append('l3_vc_o_considera_obcecado',$(".l3_vc_o_considera_obcecado").val());
        data.append('l3_ele_ja_foi_obcecado_por_algo',$(".l3_ele_ja_foi_obcecado_por_algo").val());        
        data.append('l4_tem_inter_p_cheiro_textura',$(".l4_tem_inter_p_cheiro_textura").is(":checked")?'true':'false');
        data.append('l4_obs',$(".l4_obs").val());
        data.append('l5_brinca_de_form_repet',$(".l5_brinca_de_form_repet").is(":checked")?'true':'false');
        data.append('l5_obs',$(".l5_obs").val());
        data.append('l6_brinca_de_form_func',$(".l6_brinca_de_form_func").is(":checked")?'true':'false');
        data.append('l6_obs',$(".l6_obs").val());
        data.append('l7_brinca_de_form_simb_mini',$(".l7_brinca_de_form_simb_mini").is(":checked")?'true':'false');
        data.append('l7_obs',$(".l7_obs").val());
        data.append('l8_brinca_de_form_simb_objetos',$(".l8_brinca_de_form_simb_objetos").is(":checked")?'true':'false');
        data.append('l8_obs',$(".l8_obs").val());
        data.append('l9_brinca_de_form_simb_atrpapeis',$(".l9_brinca_de_form_simb_atrpapeis").is(":checked")?'true':'false');
        data.append('l9_obs',$(".l9_obs").val());
        data.append('l10_segue_regras_de_brincadeiras',$(".l10_segue_regras_de_brincadeiras").is(":checked")?'true':'false');
        data.append('l10_obs',$(".l10_obs").val());
        data.append('l11_bom_fazer_amizades',$(".l11_bom_fazer_amizades").is(":checked")?'true':'false');
        data.append('l11_obs',$(".l11_obs").val());
        data.append('l12_e_solitario',$(".l12_e_solitario").is(":checked")?'true':'false');
        data.append('l12_obs',$(".l12_obs").val());        
        data.append('l13_e_timido',$(".l13_e_timido").is(":checked")?'true':'false');
        data.append('l13_obs',$(".l13_obs").val());
        data.append('l14_tem_melhor_amigo',$(".l14_tem_melhor_amigo").is(":checked")?'true':'false');        
        data.append('l14_obs',$(".l14_obs").val());        
        data.append('l15_prefer_criancas_mesma_idade',$(".l15_obs").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');        

        $.ajax({
            url:'/ceteaadmin/terapia/store_histdesversaopaisbrincadeiras',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histdesversaopaisbrincadeiras").replaceWith('<ul id="saveform_errList_histdesversaopaisbrincadeiras"></ul>');
                    $("#saveform_errlist_histdesversaopaisbrincadeiras").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histdesversaopaisbrincadeiras").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histdesversaopaisbrincadeiras").replaceWith('<ul id="saveform_errList_histdesversaopaisbrincadeiras"></ul>');
                    $("#histdes_versaopais_brincadeiras"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_brincadeiras'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histdesversaopaisbrincadeiras").trigger('reset');
                    $("#AddHistDesVersaoPaisBrincadeiras").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_histdesversaopaisbrincadeiras_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histdesversaopaisbrincadeiras").val();
        var pacienteid = $("#editpacienteid_histdesversaopaisbrincadeiras").val();

        var loading = $("#imgedit_histdesversaopaisbrincadeiras");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('l1_brincadeira_favorita',$("#editl1_brincadeira_favorita").val());
        data.append('l2_brinquedos_favoritos',$("#editl2_brinquedos_favoritos").val());
        data.append('l3_vc_o_considera_obcecado',$("#editl3_vc_o_considera_obcecado").val());
        data.append('l3_ele_ja_foi_obcecado_por_algo',$("#editl3_ele_ja_foi_obcecado_por_algo").val());        
        data.append('l4_tem_inter_p_cheiro_textura',$("#editl4_tem_inter_p_cheiro_textura").is(":checked")?'true':'false');
        data.append('l4_obs',$("#editl4_obs").val());
        data.append('l5_brinca_de_form_repet',$("#editl5_brinca_de_form_repet").is(":checked")?'true':'false');
        data.append('l5_obs',$("#editl5_obs").val());
        data.append('l6_brinca_de_form_func',$("#editl6_brinca_de_form_func").is(":checked")?'true':'false');
        data.append('l6_obs',$("#editl6_obs").val());
        data.append('l7_brinca_de_form_simb_mini',$("#editl7_brinca_de_form_simb_mini").is(":checked")?'true':'false');
        data.append('l7_obs',$("#editl7_obs").val());
        data.append('l8_brinca_de_form_simb_objetos',$("#editl8_brinca_de_form_simb_objetos").is(":checked")?'true':'false');
        data.append('l8_obs',$("#editl8_obs").val());
        data.append('l9_brinca_de_form_simb_atrpapeis',$("#editl9_brinca_de_form_simb_atrpapeis").is(":checked")?'true':'false');
        data.append('l9_obs',$("#editl9_obs").val());
        data.append('l10_segue_regras_de_brincadeiras',$("#editl10_segue_regras_de_brincadeiras").is(":checked")?'true':'false');
        data.append('l10_obs',$("#editl10_obs").val());
        data.append('l11_bom_fazer_amizades',$("#editl11_bom_fazer_amizades").is(":checked")?'true':'false');
        data.append('l11_obs',$("#editl11_obs").val());
        data.append('l12_e_solitario',$("#editl12_e_solitario").is(":checked")?'true':'false');
        data.append('l12_obs',$("#editl12_obs").val());        
        data.append('l13_e_timido',$("#editl13_e_timido").is(":checked")?'true':'false');
        data.append('l13_obs',$("#editl13_obs").val());
        data.append('l14_tem_melhor_amigo',$("#editl14_tem_melhor_amigo").is(":checked")?'true':'false');        
        data.append('l14_obs',$("#editl14_obs").val());        
        data.append('l15_prefer_criancas_mesma_idade',$("#editl15_obs").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_histdesversaopaisbrincadeiras/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histdesversaopaisbrincadeiras").replaceWith('<ul id="updateform_errList_histdesversaopaisbrincadeiras"></ul>');
                    $("#updateform_errlist_histdesversaopaisbrincadeiras").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histdesversaopaisbrincadeiras").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histdesversaopaisbrincadeiras").replaceWith('<ul id="updateform_errList_histdesversaopaisbrincadeiras"></ul>');
                    $("#histdes_versaopais_brincadeiras"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_brincadeiras'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histdesversaopaisbrincadeiras").trigger('reset');
                    $("#EditHistDesVersaoPaisBrincadeiras").modal('hide');    
                }
            }
        });
    });

//fim histdes_versaopais_brincadeiras

//início histdes_versaopais_comportamentos

$("#AddHistDesVersaoPaisComportamentos").on('shown.bs.modal',function(){
            $(".j1_alinha_enfileira_objetos").focus();
    });

$("#EditHistDesVersaoPaisComportamentos").on('shown.bs.modal',function(){
            $(".j1_alinha_enfileira_objetos").focus();
    });

//inicio conta caracteres dos textarea HistDesVersaoPaisComportamentos

    //add
 
    $(document).on('input','#addj1_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j1_obs = $('textarea[name="addj1_obs"]').val();
            $('textarea[name="addj1_obs"]').val(j1_obs.substr(0,limite));
            $(".addj1_obs").text("0" + " " + informativo);
        }else{
            $(".addj1_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj2_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j2_obs = $('textarea[name="addj2_obs"]').val();
            $('textarea[name="addj2_obs"]').val(j2_obs.substr(0,limite));
            $(".addj2_obs").text("0" + " " + informativo);
        }else{
            $(".addj2_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj3_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j3_obs = $('textarea[name="addj3_obs"]').val();
            $('textarea[name="addj3_obs"]').val(j3_obs.substr(0,limite));
            $(".addj3_obs").text("0" + " " + informativo);
        }else{
            $(".addj3_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj4_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j4_obs = $('textarea[name="addj4_obs"]').val();
            $('textarea[name="addj4_obs"]').val(j4_obs.substr(0,limite));
            $(".addj4_obs").text("0" + " " + informativo);
        }else{
            $(".addj4_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj5_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j5_obs = $('textarea[name="addj5_obs"]').val();
            $('textarea[name="addj5_obs"]').val(j5_obs.substr(0,limite));
            $(".addj5_obs").text("0" + " " + informativo);
        }else{
            $(".addj5_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj6_outras_manias',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j6_outras_manias = $('textarea[name="addj6_outras_manias"]').val();
            $('textarea[name="addj6_outras_manias"]').val(j6_outras_manias.substr(0,limite));
            $(".addj6_outras_manias").text("0" + " " + informativo);
        }else{
            $(".addj6_outras_manias").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj7_reacao_quando_interr',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j7_reacao_quando_interr = $('textarea[name="addj7_reacao_quando_interr"]').val();
            $('textarea[name="addj7_reacao_quando_interr"]').val(j7_reacao_quando_interr.substr(0,limite));
            $(".addj7_reacao_quando_interr").text("0" + " " + informativo);
        }else{
            $(".addj7_reacao_quando_interr").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj8_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j8_obs = $('textarea[name="addj8_obs"]').val();
            $('textarea[name="addj8_obs"]').val(j8_obs.substr(0,limite));
            $(".addj8_obs").text("0" + " " + informativo);
        }else{
            $(".addj8_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj9_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j9_obs = $('textarea[name="addj9_obs"]').val();
            $('textarea[name="addj9_obs"]').val(j9_obs.substr(0,limite));
            $(".addj9_obs").text("0" + " " + informativo);
        }else{
            $(".addj9_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj10_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j10_obs = $('textarea[name="addj10_obs"]').val();
            $('textarea[name="addj10_obs"]').val(j10_obs.substr(0,limite));
            $(".addj10_obs").text("0" + " " + informativo);
        }else{
            $(".addj10_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj11_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j11_obs = $('textarea[name="addj11_obs"]').val();
            $('textarea[name="addj11_obs"]').val(j11_obs.substr(0,limite));
            $(".addj11_obs").text("0" + " " + informativo);
        }else{
            $(".addj11_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj12_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j12_obs = $('textarea[name="addj12_obs"]').val();
            $('textarea[name="addj12_obs"]').val(j12_obs.substr(0,limite));
            $(".addj12_obs").text("0" + " " + informativo);
        }else{
            $(".addj12_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj13_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j13_obs = $('textarea[name="addj13_obs"]').val();
            $('textarea[name="addj13_obs"]').val(j13_obs.substr(0,limite));
            $(".addj13_obs").text("0" + " " + informativo);
        }else{
            $(".addj13_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj14_cm_reage_frust_contr',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j14_cm_reage_frust_contr = $('textarea[name="addj14_cm_reage_frust_contr"]').val();
            $('textarea[name="addj14_cm_reage_frust_contr"]').val(j14_cm_reage_frust_contr.substr(0,limite));
            $(".addj14_cm_reage_frust_contr").text("0" + " " + informativo);
        }else{
            $(".addj14_cm_reage_frust_contr").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj15_outros',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j15_outros = $('textarea[name="addj15_outros"]').val();
            $('textarea[name="addj15_outros"]').val(j15_outros.substr(0,limite));
            $(".addj15_outros").text("0" + " " + informativo);
        }else{
            $(".addj15_outros").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj16_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j16_obs = $('textarea[name="addj16_obs"]').val();
            $('textarea[name="addj16_obs"]').val(j16_obs.substr(0,limite));
            $(".addj16_obs").text("0" + " " + informativo);
        }else{
            $(".addj16_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj17_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j17_obs = $('textarea[name="addj17_obs"]').val();
            $('textarea[name="addj17_obs"]').val(j17_obs.substr(0,limite));
            $(".addj17_obs").text("0" + " " + informativo);
        }else{
            $(".addj17_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj18_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j18_obs = $('textarea[name="addj18_obs"]').val();
            $('textarea[name="addj18_obs"]').val(j18_obs.substr(0,limite));
            $(".addj18_obs").text("0" + " " + informativo);
        }else{
            $(".addj18_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj19_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j19_obs = $('textarea[name="addj19_obs"]').val();
            $('textarea[name="addj19_obs"]').val(j19_obs.substr(0,limite));
            $(".addj19_obs").text("0" + " " + informativo);
        }else{
            $(".addj19_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj20_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j20_obs = $('textarea[name="addj20_obs"]').val();
            $('textarea[name="addj20_obs"]').val(j20_obs.substr(0,limite));
            $(".addj20_obs").text("0" + " " + informativo);
        }else{
            $(".addj20_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj21_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j21_obs = $('textarea[name="addj21_obs"]').val();
            $('textarea[name="addj21_obs"]').val(j21_obs.substr(0,limite));
            $(".addj21_obs").text("0" + " " + informativo);
        }else{
            $(".addj21_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addj22_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j22_obs = $('textarea[name="addj22_obs"]').val();
            $('textarea[name="addj22_obs"]').val(j22_obs.substr(0,limite));
            $(".addj22_obs").text("0" + " " + informativo);
        }else{
            $(".addj22_obs").text(caracteresRestantes + " " + informativo);
        }
    });

     //edit
 
    $(document).on('input','#editj1_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j1_obs = $('textarea[name="editj1_obs"]').val();
            $('textarea[name="editj1_obs"]').val(j1_obs.substr(0,limite));
            $(".editj1_obs").text("0" + " " + informativo);
        }else{
            $(".editj1_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj2_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j2_obs = $('textarea[name="editj2_obs"]').val();
            $('textarea[name="editj2_obs"]').val(j2_obs.substr(0,limite));
            $(".editj2_obs").text("0" + " " + informativo);
        }else{
            $(".editj2_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj3_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j3_obs = $('textarea[name="editj3_obs"]').val();
            $('textarea[name="editj3_obs"]').val(j3_obs.substr(0,limite));
            $(".editj3_obs").text("0" + " " + informativo);
        }else{
            $(".editj3_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj4_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j4_obs = $('textarea[name="editj4_obs"]').val();
            $('textarea[name="editj4_obs"]').val(j4_obs.substr(0,limite));
            $(".editj4_obs").text("0" + " " + informativo);
        }else{
            $(".editj4_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj5_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j5_obs = $('textarea[name="editj5_obs"]').val();
            $('textarea[name="editj5_obs"]').val(j5_obs.substr(0,limite));
            $(".editj5_obs").text("0" + " " + informativo);
        }else{
            $(".editj5_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj6_outras_manias',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j6_outras_manias = $('textarea[name="editj6_outras_manias"]').val();
            $('textarea[name="editj6_outras_manias"]').val(j6_outras_manias.substr(0,limite));
            $(".editj6_outras_manias").text("0" + " " + informativo);
        }else{
            $(".editj6_outras_manias").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj7_reacao_quando_interr',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j7_reacao_quando_interr = $('textarea[name="editj7_reacao_quando_interr"]').val();
            $('textarea[name="editj7_reacao_quando_interr"]').val(j7_reacao_quando_interr.substr(0,limite));
            $(".editj7_reacao_quando_interr").text("0" + " " + informativo);
        }else{
            $(".editj7_reacao_quando_interr").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj8_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j8_obs = $('textarea[name="editj8_obs"]').val();
            $('textarea[name="editj8_obs"]').val(j8_obs.substr(0,limite));
            $(".editj8_obs").text("0" + " " + informativo);
        }else{
            $(".editj8_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj9_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j9_obs = $('textarea[name="editj9_obs"]').val();
            $('textarea[name="editj9_obs"]').val(j9_obs.substr(0,limite));
            $(".editj9_obs").text("0" + " " + informativo);
        }else{
            $(".editj9_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj10_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j10_obs = $('textarea[name="editj10_obs"]').val();
            $('textarea[name="editj10_obs"]').val(j10_obs.substr(0,limite));
            $(".editj10_obs").text("0" + " " + informativo);
        }else{
            $(".editj10_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj11_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j11_obs = $('textarea[name="editj11_obs"]').val();
            $('textarea[name="editj11_obs"]').val(j11_obs.substr(0,limite));
            $(".editj11_obs").text("0" + " " + informativo);
        }else{
            $(".editj11_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj12_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j12_obs = $('textarea[name="editj12_obs"]').val();
            $('textarea[name="editj12_obs"]').val(j12_obs.substr(0,limite));
            $(".editj12_obs").text("0" + " " + informativo);
        }else{
            $(".editj12_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj13_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j13_obs = $('textarea[name="editj13_obs"]').val();
            $('textarea[name="editj13_obs"]').val(j13_obs.substr(0,limite));
            $(".editj13_obs").text("0" + " " + informativo);
        }else{
            $(".editj13_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj14_cm_reage_frust_contr',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j14_cm_reage_frust_contr = $('textarea[name="editj14_cm_reage_frust_contr"]').val();
            $('textarea[name="editj14_cm_reage_frust_contr"]').val(j14_cm_reage_frust_contr.substr(0,limite));
            $(".editj14_cm_reage_frust_contr").text("0" + " " + informativo);
        }else{
            $(".editj14_cm_reage_frust_contr").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj15_outros',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j15_outros = $('textarea[name="editj15_outros"]').val();
            $('textarea[name="editj15_outros"]').val(j15_outros.substr(0,limite));
            $(".editj15_outros").text("0" + " " + informativo);
        }else{
            $(".editj15_outros").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj16_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j16_obs = $('textarea[name="editj16_obs"]').val();
            $('textarea[name="editj16_obs"]').val(j16_obs.substr(0,limite));
            $(".editj16_obs").text("0" + " " + informativo);
        }else{
            $(".editj16_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj17_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j17_obs = $('textarea[name="editj17_obs"]').val();
            $('textarea[name="editj17_obs"]').val(j17_obs.substr(0,limite));
            $(".editj17_obs").text("0" + " " + informativo);
        }else{
            $(".editj17_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj18_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j18_obs = $('textarea[name="editj18_obs"]').val();
            $('textarea[name="editj18_obs"]').val(j18_obs.substr(0,limite));
            $(".editj18_obs").text("0" + " " + informativo);
        }else{
            $(".editj18_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj19_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j19_obs = $('textarea[name="editj19_obs"]').val();
            $('textarea[name="editj19_obs"]').val(j19_obs.substr(0,limite));
            $(".editj19_obs").text("0" + " " + informativo);
        }else{
            $(".editj19_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj20_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j20_obs = $('textarea[name="editj20_obs"]').val();
            $('textarea[name="editj20_obs"]').val(j20_obs.substr(0,limite));
            $(".editj20_obs").text("0" + " " + informativo);
        }else{
            $(".editj20_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj21_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j21_obs = $('textarea[name="editj21_obs"]').val();
            $('textarea[name="editj21_obs"]').val(j21_obs.substr(0,limite));
            $(".editj21_obs").text("0" + " " + informativo);
        }else{
            $(".editj21_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editj22_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var j22_obs = $('textarea[name="editj22_obs"]').val();
            $('textarea[name="editj22_obs"]').val(j22_obs.substr(0,limite));
            $(".editj22_obs").text("0" + " " + informativo);
        }else{
            $(".editj22_obs").text(caracteresRestantes + " " + informativo);
        }
    });



   
$(document).on('click','.histdes_versaopais_comportamentos',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_histdes_versaopais_comportamentos = $("#histdes_versaopais_comportamentos"+atendimentoid).data("id");

        if(opcao_form_histdes_versaopais_comportamentos==0){
                $("#addpacienteid_histdesversaopaiscomportamentos").val(pacienteid);
                $("#addatendimentoid_histdesversaopaiscomportamentos").val(atendimentoid);
                $("#addform_histdesversaopaiscomportamentos").trigger('reset');
                $("#AddHistDesVersaoPaisComportamentos").modal('show'); 
                $("#saveform_errList_histdesversaopaiscomportamentos").replaceWith('<ul id="saveform_errList_histdesversaopaiscomportamentos"></ul>');
        }else{            
                $("#editpacienteid_histdesversaopaiscomportamentos").val(pacienteid);
                $("#editatendimentoid_histdesversaopaiscomportamentos").val(atendimentoid);
                $("#editform_histdesversaopaiscomportamentos").trigger('reset');
                $("#EditHistDesVersaoPaisComportamentos").modal('show'); 
                $("#updateform_errList_histdesversaocomportamentos").replaceWith('<ul id="updateform_errList_histdesversaocomportamentos"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_histdesversaopaiscomportamentos/'+pacienteid,
                    success: function(response){           
                        if(response.status==200){                                                
                            $(".j1_alinha_enfileira_objetos").attr('checked',response.histdesversaopaiscomportamentos.j1_alinha_enfileira_objetos);
                            $(".j1_obs").val(response.histdesversaopaiscomportamentos.j1_obs);
                            $(".j2_empilha_objetos").attr('checked',response.histdesversaopaiscomportamentos.j2_empilha_objetos);
                            $(".j2_obs").val(response.histdesversaopaiscomportamentos.j2_obs);
                            $(".j3_abrefecha_gav_port").attr('checked',response.histdesversaopaiscomportamentos.j3_abrefecha_gav_port);
                            $(".j3_obs").val(response.histdesversaopaiscomportamentos.j3_obs);
                            $(".j4_apagaacende_luz").attr('checked',response.histdesversaopaiscomportamentos.j4_apagaacende_luz);
                            $(".j4_obs").val(response.histdesversaopaiscomportamentos.j4_obs);
                            $(".j5_inter_objetos_giram").attr('checked',response.histdesversaopaiscomportamentos.j5_inter_objetos_giram);
                            $(".j5_obs").val(response.histdesversaopaiscomportamentos.j5_obs);                            
                            $(".j6_outras_manias").val(response.histdesversaopaiscomportamentos.j6_outras_manias);
                            $(".j7_inter_objetos_giram_2").attr('checked',response.histdesversaopaiscomportamentos.j7_inter_objetos_giram_2);
                            $(".j7_reacao_quando_interr").val(response.histdesversaopaiscomportamentos.j7_reacao_quando_interr);
                            $(".j8_brinca_form_simbol_insist").attr('checked',response.histdesversaopaiscomportamentos.j8_brinca_form_simbol_insist);
                            $(".j8_obs").val(response.histdesversaopaiscomportamentos.j8_obs);
                            $(".j9_resiste_mud_rotina").attr('checked',response.histdesversaopaiscomportamentos.j9_resiste_mud_rotina);
                            $(".j9_obs").val(response.histdesversaopaiscomportamentos.j9_obs);
                            $(".j10_gosta_msm_ordem_horario").attr('checked',response.histdesversaopaiscomportamentos.j10_gosta_msm_ordem_horario);
                            $(".j10_obs").val(response.histdesversaopaiscomportamentos.j10_obs);
                            $(".j11_ritual_ordem_determinada").attr('checked',response.histdesversaopaiscomportamentos.j11_ritual_ordem_determinada);
                            $(".j11_obs").val(response.histdesversaopaiscomportamentos.j11_obs);
                            $(".j12_coisas_msm_lugar").attr('checked',response.histdesversaopaiscomportamentos.j12_coisas_msm_lugar);
                            $(".j12_obs").val(response.histdesversaopaiscomportamentos.j12_obs);
                            $(".j13_gstmsm_roupas_alim_lugar").attr('checked',response.histdesversaopaiscomportamentos.j13_gstmsm_roupas_alim_lugar);
                            $(".j13_obs").val(response.histdesversaopaiscomportamentos.j13_obs);
                            $(".j14_cm_reage_frust_contr").val(response.histdesversaopaiscomportamentos.j14_cm_reage_frust_contr);
                            $(".j15_chup_os_dedos").attr('checked',response.histdesversaopaiscomportamentos.j15_chup_os_dedos);
                            $(".j15_roe_unhas").attr('checked',response.histdesversaopaiscomportamentos.j15_roe_unhas);
                            $(".j15_estalar_dedos").attr('checked',response.histdesversaopaiscomportamentos.j15_estalar_dedos);
                            $(".j15_morder_labios").attr('checked',response.histdesversaopaiscomportamentos.j15_morder_labios);
                            $(".j15_mast_publico").attr('checked',response.histdesversaopaiscomportamentos.j15_mast_publico);
                            $(".j15_torce_cabelo").attr('checked',response.histdesversaopaiscomportamentos.j15_torce_cabelo);
                            $(".j15_balanc_corpo").attr('checked',response.histdesversaopaiscomportamentos.j15_balanc_corpo);
                            $(".j15_bater_maos").attr('checked',response.histdesversaopaiscomportamentos.j15_bater_maos);
                            $(".j15_flapping_maos").attr('checked',response.histdesversaopaiscomportamentos.j15_flapping_maos);
                            $(".j15_andar_ponta_pes").attr('checked',response.histdesversaopaiscomportamentos.j15_andar_ponta_pes);
                            $(".j15_flex_ext_punhos").attr('checked',response.histdesversaopaiscomportamentos.j15_flex_ext_punhos);
                            $(".j15_morde_pp_corpo").attr('checked',response.histdesversaopaiscomportamentos.j15_morde_pp_corpo);
                            $(".j15_bater_a_cabeca").attr('checked',response.histdesversaopaiscomportamentos.j15_bater_a_cabeca);
                            $(".j15_outros").val(response.histdesversaopaiscomportamentos.j15_outros);
                            $(".j16_sensivel_barulho").attr('checked',response.histdesversaopaiscomportamentos.j16_sensivel_barulho);
                            $(".j16_obs").val(response.histdesversaopaiscomportamentos.j16_obs);
                            $(".j17_tocarcheirarabracarinadpessobj").attr('checked',response.histdesversaopaiscomportamentos.j17_tocarcheirarabracarinadpessobj);
                            $(".j17_obs").val(response.histdesversaopaiscomportamentos.j17_obs);
                            $(".j18_par_nsentir_sentir_dor_frio").attr('checked',response.histdesversaopaiscomportamentos.j18_par_nsentir_sentir_dor_frio);
                            $(".j18_obs").val(response.histdesversaopaiscomportamentos.j18_obs);
                            $(".j19_fascinado_luzes").attr('checked',response.histdesversaopaiscomportamentos.j19_fascinado_luzes);
                            $(".j19_obs").val(response.histdesversaopaiscomportamentos.j19_obs);
                            $(".j20_sensivel_ao_toque").attr('checked',response.histdesversaopaiscomportamentos.j20_sensivel_ao_toque);
                            $(".j20_obs").val(response.histdesversaopaiscomportamentos.j20_obs);
                            $(".j21_texturas_incomodam").attr('checked',response.histdesversaopaiscomportamentos.j21_texturas_incomodam);
                            $(".j21_obs").val(response.histdesversaopaiscomportamentos.j21_obs);
                            $(".j22_reacao_text_alim").attr('checked',response.histdesversaopaiscomportamentos.j22_reacao_text_alim);
                            $(".j22_obs").val(response.histdesversaopaiscomportamentos.j22_obs);                            
                        }      
                    }
                });
        }
    });


    $(document).on('click','.add_histdesversaopais_comportamentos_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histdesversaopaiscomportamentos").val();
        var atendimentoid = $("#addatendimentoid_histdesversaopaiscomportamentos").val();

        var loading = $("#imgadd_histdesversaopaiscomportamentos");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('j1_alinha_enfileira_objetos',$(".j1_alinha_enfileira_objetos").is(":checked")?'true':'false');
        data.append('j1_obs',$(".j1_obs").val());
        data.append('j2_empilha_objetos',$(".j2_empilha_objetos").is(":checked")?'true':'false');
        data.append('j2_obs',$(".j2_obs").val());
        data.append('j3_abrefecha_gav_port',$(".j3_abrefecha_gav_port").is(":checked")?'true':'false');
        data.append('j3_obs',$(".j3_obs").val());
        data.append('j4_apagaacende_luz',$(".j4_apagaacende_luz").is(":checked")?'true':'false');
        data.append('j4_obs',$(".l7_obs").val());
        data.append('j5_inter_objetos_giram',$(".j5_inter_objetos_giram").is(":checked")?'true':'false');
        data.append('j5_obs',$(".j5_obs").val());
        data.append('j6_outras_manias',$(".j6_outras_manias").val());
        data.append('j7_inter_objetos_giram_2',$(".j7_inter_objetos_giram_2").is(":checked")?'true':'false');
        data.append('j7_reacao_quando_interr',$(".j7_reacao_quando_interr").val());
        data.append('j8_brinca_form_simbol_insist',$(".j8_brinca_form_simbol_insist").is(":checked")?'true':'false');
        data.append('j8_obs',$(".j8_obs").val());
        data.append('j9_resiste_mud_rotina',$(".j9_resiste_mud_rotina").is(":checked")?'true':'false');
        data.append('j9_obs',$(".j9_obs").val());
        data.append('j10_gosta_msm_ordem_horario',$(".j10_gosta_msm_ordem_horario").is(":checked")?'true':'false');
        data.append('j10_obs',$(".j10_obs").val());
        data.append('j11_ritual_ordem_determinada',$(".j11_ritual_ordem_determinada").is(":checked")?'true':'false');
        data.append('j11_obs',$(".j11_obs").val());
        data.append('j12_coisas_msm_lugar',$(".j12_coisas_msm_lugar").is(":checked")?'true':'false');
        data.append('j12_obs',$(".j12_obs").val());
        data.append('j13_gstmsm_roupas_alim_lugar',$(".j13_gstmsm_roupas_alim_lugar").is(":checked")?'true':'false');
        data.append('j13_obs',$(".j13_obs").val());
        data.append('j14_cm_reage_frust_contr',$(".j14_cm_reage_frust_contr").val());
        data.append('j15_chup_os_dedos',$(".j15_chup_os_dedos").is(":checked")?'true':'false');
        data.append('j15_roe_unhas',$(".j15_roe_unhas").is(":checked")?'true':'false');
        data.append('j15_estalar_dedos',$(".j15_estalar_dedos").is(":checked")?'true':'false');
        data.append('j15_morder_labios',$(".j15_morder_labios").is(":checked")?'true':'false');
        data.append('j15_mast_publico',$(".j15_mast_publico").is(":checked")?'true':'false');
        data.append('j15_torce_cabelo',$(".j15_torce_cabelo").is(":checked")?'true':'false');
        data.append('j15_balanc_corpo',$(".j15_balanc_corpo").is(":checked")?'true':'false');
        data.append('j15_bater_maos',$(".j15_bater_maos").is(":checked")?'true':'false');
        data.append('j15_flapping_maos',$(".j15_flapping_maos").is(":checked")?'true':'false');
        data.append('j15_andar_ponta_pes',$(".j15_andar_ponta_pes").is(":checked")?'true':'false');
        data.append('j15_flex_ext_punhos',$(".j15_flex_ext_punhos").is(":checked")?'true':'false');
        data.append('j15_morde_pp_corpo',$(".j15_morde_pp_corpo").is(":checked")?'true':'false');
        data.append('j15_bater_a_cabeca',$(".j15_bater_a_cabeca").is(":checked")?'true':'false');
        data.append('j15_outros',$(".j15_outros").val());
        data.append('j16_sensivel_barulho',$(".j16_sensivel_barulho").is(":checked")?'true':'false');
        data.append('j16_obs',$(".j16_obs").val());
        data.append('j17_tocarcheirarabracarinadpessobj',$(".j17_tocarcheirarabracarinadpessobj").is(":checked")?'true':'false');
        data.append('j17_obs',$(".j17_obs").val());
        data.append('j18_par_nsentir_sentir_dor_frio',$(".j18_par_nsentir_sentir_dor_frio").is(":checked")?'true':'false');
        data.append('j18_obs',$(".j18_obs").val());
        data.append('j19_fascinado_luzes',$(".j19_fascinado_luzes").is(":checked")?'true':'false');
        data.append('j19_obs',$(".j19_obs").val());
        data.append('j20_sensivel_ao_toque',$(".j20_sensivel_ao_toque").is(":checked")?'true':'false');
        data.append('j20_obs',$(".j20_obs").val());
        data.append('j21_texturas_incomodam',$(".j21_texturas_incomodam").is(":checked")?'true':'false');
        data.append('j21_obs',$(".j21_obs").val());
        data.append('j22_reacao_text_alim',$(".j22_reacao_text_alim").is(":checked")?'true':'false');
        data.append('j22_obs',$(".j22_obs").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');

        $.ajax({
            url:'/ceteaadmin/terapia/store_histdesversaopaiscomportamentos',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histdesversaopaiscomportamentos").replaceWith('<ul id="saveform_errList_histdesversaopaiscomportamentos"></ul>');
                    $("#saveform_errlist_histdesversaopaiscomportamentos").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histdesversaopaiscomportamentos").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histdesversaopaiscomportamentos").replaceWith('<ul id="saveform_errList_histdesversaopaiscomportamentos"></ul>');
                    $("#histdes_versaopais_comportamentos"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_comportamentos'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histdesversaopaiscomportamentos").trigger('reset');
                    $("#AddHistDesVersaoPaisComportamentos").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_histdesversaopaiscomportamentos_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histdesversaopaiscomportamentos").val();
        var pacienteid = $("#editpacienteid_histdesversaopaiscomportamentos").val();

        var loading = $("#imgedit_histdesversaopaiscomportamentos");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('j1_alinha_enfileira_objetos',$("#editj1_alinha_enfileira_objetos").is(":checked")?'true':'false');
        data.append('j1_obs',$("#editj1_obs").val());
        data.append('j2_empilha_objetos',$("#editj2_empilha_objetos").is(":checked")?'true':'false');
        data.append('j2_obs',$("#editj2_obs").val());
        data.append('j3_abrefecha_gav_port',$("#editj3_abrefecha_gav_port").is(":checked")?'true':'false');
        data.append('j3_obs',$("#editj3_obs").val());
        data.append('j4_apagaacende_luz',$("#editj4_apagaacende_luz").is(":checked")?'true':'false');
        data.append('j4_obs',$("#editl7_obs").val());
        data.append('j5_inter_objetos_giram',$("#editj5_inter_objetos_giram").is(":checked")?'true':'false');
        data.append('j5_obs',$("#editj5_obs").val());
        data.append('j6_outras_manias',$("#editj6_outras_manias").val());
        data.append('j7_inter_objetos_giram_2',$("#editj7_inter_objetos_giram_2").is(":checked")?'true':'false');
        data.append('j7_reacao_quando_interr',$("#editj7_reacao_quando_interr").val());
        data.append('j8_brinca_form_simbol_insist',$("#editj8_brinca_form_simbol_insist").is(":checked")?'true':'false');
        data.append('j8_obs',$("#editj8_obs").val());
        data.append('j9_resiste_mud_rotina',$("#editj9_resiste_mud_rotina").is(":checked")?'true':'false');
        data.append('j9_obs',$("#editj9_obs").val());
        data.append('j10_gosta_msm_ordem_horario',$("#editj10_gosta_msm_ordem_horario").is(":checked")?'true':'false');
        data.append('j10_obs',$("#editj10_obs").val());
        data.append('j11_ritual_ordem_determinada',$("#editj11_ritual_ordem_determinada").is(":checked")?'true':'false');
        data.append('j11_obs',$("#editj11_obs").val());
        data.append('j12_coisas_msm_lugar',$("#editj12_coisas_msm_lugar").is(":checked")?'true':'false');
        data.append('j12_obs',$("#editj12_obs").val());
        data.append('j13_gstmsm_roupas_alim_lugar',$("#editj13_gstmsm_roupas_alim_lugar").is(":checked")?'true':'false');
        data.append('j13_obs',$("#editj13_obs").val());
        data.append('j14_cm_reage_frust_contr',$("#editj14_cm_reage_frust_contr").val());
        data.append('j15_chup_os_dedos',$("#editj15_chup_os_dedos").is(":checked")?'true':'false');
        data.append('j15_roe_unhas',$("#editj15_roe_unhas").is(":checked")?'true':'false');
        data.append('j15_estalar_dedos',$("#editj15_estalar_dedos").is(":checked")?'true':'false');
        data.append('j15_morder_labios',$("#editj15_morder_labios").is(":checked")?'true':'false');
        data.append('j15_mast_publico',$("#editj15_mast_publico").is(":checked")?'true':'false');
        data.append('j15_torce_cabelo',$("#editj15_torce_cabelo").is(":checked")?'true':'false');
        data.append('j15_balanc_corpo',$("#editj15_balanc_corpo").is(":checked")?'true':'false');
        data.append('j15_bater_maos',$("#editj15_bater_maos").is(":checked")?'true':'false');
        data.append('j15_flapping_maos',$("#editj15_flapping_maos").is(":checked")?'true':'false');
        data.append('j15_andar_ponta_pes',$("#editj15_andar_ponta_pes").is(":checked")?'true':'false');
        data.append('j15_flex_ext_punhos',$("#editj15_flex_ext_punhos").is(":checked")?'true':'false');
        data.append('j15_morde_pp_corpo',$("#editj15_morde_pp_corpo").is(":checked")?'true':'false');
        data.append('j15_bater_a_cabeca',$("#editj15_bater_a_cabeca").is(":checked")?'true':'false');
        data.append('j15_outros',$("#editj15_outros").val());
        data.append('j16_sensivel_barulho',$("#editj16_sensivel_barulho").is(":checked")?'true':'false');
        data.append('j16_obs',$("#editj16_obs").val());
        data.append('j17_tocarcheirarabracarinadpessobj',$("#editj17_tocarcheirarabracarinadpessobj").is(":checked")?'true':'false');
        data.append('j17_obs',$("#editj17_obs").val());
        data.append('j18_par_nsentir_sentir_dor_frio',$("#editj18_par_nsentir_sentir_dor_frio").is(":checked")?'true':'false');
        data.append('j18_obs',$("#editj18_obs").val());
        data.append('j19_fascinado_luzes',$("#editj19_fascinado_luzes").is(":checked")?'true':'false');
        data.append('j19_obs',$("#editj19_obs").val());
        data.append('j20_sensivel_ao_toque',$("#editj20_sensivel_ao_toque").is(":checked")?'true':'false');
        data.append('j20_obs',$("#editj20_obs").val());
        data.append('j21_texturas_incomodam',$("#editj21_texturas_incomodam").is(":checked")?'true':'false');
        data.append('j21_obs',$("#editj21_obs").val());
        data.append('j22_reacao_text_alim',$("#editj22_reacao_text_alim").is(":checked")?'true':'false');
        data.append('j22_obs',$("#editj22_obs").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_histdesversaopaiscomportamentos/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histdesversaopaiscomportamentos").replaceWith('<ul id="updateform_errList_histdesversaopaiscomportamentos"></ul>');
                    $("#updateform_errlist_histdesversaopaiscomportamentos").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histdesversaopaiscomportamentos").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histdesversaopaiscomportamentos").replaceWith('<ul id="updateform_errList_histdesversaopaiscomportamentos"></ul>');
                    $("#histdes_versaopais_comportamentos"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_comportamentos'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histdesversaopaiscomportamentos").trigger('reset');
                    $("#EditHistDesVersaoPaisComportamentos").modal('hide');    
                }
            }
        });
    });

//fim histdes_versaopais_comportamentos

//início histdes_versaopais_independencia

$("#AddHistDesVersaoPaisIndependencia").on('shown.bs.modal',function(){
            $(".ji1_veste_roupa_soz").focus();
    });

$("#EditHistDesVersaoPaisIndependencia").on('shown.bs.modal',function(){
            $(".ji1_veste_roupa_soz").focus();
    });

//inicio conta caracteres dos textarea HistDesVersaoPaisIndependencia

    //add
 
    $(document).on('input','#addji1_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji1_obs = $('textarea[name="addji1_obs"]').val();
            $('textarea[name="addji1_obs"]').val(ji1_obs.substr(0,limite));
            $(".addji1_obs").text("0" + " " + informativo);
        }else{
            $(".addji1_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji2_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji2_obs = $('textarea[name="addji2_obs"]').val();
            $('textarea[name="addji2_obs"]').val(ji2_obs.substr(0,limite));
            $(".addji2_obs").text("0" + " " + informativo);
        }else{
            $(".addji2_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji3_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji3_obs = $('textarea[name="addji3_obs"]').val();
            $('textarea[name="addji3_obs"]').val(ji3_obs.substr(0,limite));
            $(".addji3_obs").text("0" + " " + informativo);
        }else{
            $(".addji3_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji4_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji4_obs = $('textarea[name="addji4_obs"]').val();
            $('textarea[name="addji4_obs"]').val(ji4_obs.substr(0,limite));
            $(".addji4_obs").text("0" + " " + informativo);
        }else{
            $(".addji4_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji6_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji6_obs = $('textarea[name="addji6_obs"]').val();
            $('textarea[name="addji6_obs"]').val(ji6_obs.substr(0,limite));
            $(".addji6_obs").text("0" + " " + informativo);
        }else{
            $(".addji6_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji7_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji7_obs = $('textarea[name="addji7_obs"]').val();
            $('textarea[name="addji7_obs"]').val(ji7_obs.substr(0,limite));
            $(".addji7_obs").text("0" + " " + informativo);
        }else{
            $(".addji7_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji8_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji8_obs = $('textarea[name="addji8_obs"]').val();
            $('textarea[name="addji8_obs"]').val(ji8_obs.substr(0,limite));
            $(".addji8_obs").text("0" + " " + informativo);
        }else{
            $(".addji8_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji9_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji9_obs = $('textarea[name="addji9_obs"]').val();
            $('textarea[name="addji9_obs"]').val(ji9_obs.substr(0,limite));
            $(".addji9_obs").text("0" + " " + informativo);
        }else{
            $(".addji9_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji10_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji10_obs = $('textarea[name="addji10_obs"]').val();
            $('textarea[name="addji10_obs"]').val(ji10_obs.substr(0,limite));
            $(".addji10_obs").text("0" + " " + informativo);
        }else{
            $(".addji10_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji11_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji11_obs = $('textarea[name="addji11_obs"]').val();
            $('textarea[name="addji11_obs"]').val(ji11_obs.substr(0,limite));
            $(".addji11_obs").text("0" + " " + informativo);
        }else{
            $(".addji11_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji12_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji12_obs = $('textarea[name="addji12_obs"]').val();
            $('textarea[name="addji12_obs"]').val(ji3_obs.substr(0,limite));
            $(".addji12_obs").text("0" + " " + informativo);
        }else{
            $(".addji12_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji13_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji13_obs = $('textarea[name="addji13_obs"]').val();
            $('textarea[name="addji13_obs"]').val(ji13_obs.substr(0,limite));
            $(".addji13_obs").text("0" + " " + informativo);
        }else{
            $(".addji13_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji14_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji14_obs = $('textarea[name="addji14_obs"]').val();
            $('textarea[name="addji14_obs"]').val(ji14_obs.substr(0,limite));
            $(".addji14_obs").text("0" + " " + informativo);
        }else{
            $(".addji14_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji15_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji15_obs = $('textarea[name="addji15_obs"]').val();
            $('textarea[name="addji15_obs"]').val(ji15_obs.substr(0,limite));
            $(".addji15_obs").text("0" + " " + informativo);
        }else{
            $(".addji15_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji16_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji16_obs = $('textarea[name="addji16_obs"]').val();
            $('textarea[name="addji16_obs"]').val(ji16_obs.substr(0,limite));
            $(".addji16_obs").text("0" + " " + informativo);
        }else{
            $(".addji16_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji17_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji17_obs = $('textarea[name="addji17_obs"]').val();
            $('textarea[name="addji17_obs"]').val(ji17_obs.substr(0,limite));
            $(".addji17_obs").text("0" + " " + informativo);
        }else{
            $(".addji17_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji18_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji18_obs = $('textarea[name="addji18_obs"]').val();
            $('textarea[name="addji18_obs"]').val(ji18_obs.substr(0,limite));
            $(".addji18_obs").text("0" + " " + informativo);
        }else{
            $(".addji18_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addji19_de_detalhes_aut',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji19_de_detalhes_aut = $('textarea[name="addji19_de_detalhes_aut"]').val();
            $('textarea[name="addji19_de_detalhes_aut"]').val(ji19_de_detalhes_aut.substr(0,limite));
            $(".addji19_de_detalhes_aut").text("0" + " " + informativo);
        }else{
            $(".addji19_de_detalhes_aut").text(caracteresRestantes + " " + informativo);
        }
    });

     //edit
 
    $(document).on('input','#editji1_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji1_obs = $('textarea[name="editji1_obs"]').val();
            $('textarea[name="editji1_obs"]').val(ji1_obs.substr(0,limite));
            $(".editji1_obs").text("0" + " " + informativo);
        }else{
            $(".editji1_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji2_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji2_obs = $('textarea[name="editji2_obs"]').val();
            $('textarea[name="editji2_obs"]').val(ji2_obs.substr(0,limite));
            $(".editji2_obs").text("0" + " " + informativo);
        }else{
            $(".editji2_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji3_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji3_obs = $('textarea[name="editji3_obs"]').val();
            $('textarea[name="editji3_obs"]').val(ji3_obs.substr(0,limite));
            $(".editji3_obs").text("0" + " " + informativo);
        }else{
            $(".editji3_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji4_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji4_obs = $('textarea[name="editji4_obs"]').val();
            $('textarea[name="editji4_obs"]').val(ji4_obs.substr(0,limite));
            $(".editji4_obs").text("0" + " " + informativo);
        }else{
            $(".editji4_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji6_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji6_obs = $('textarea[name="editji6_obs"]').val();
            $('textarea[name="editji6_obs"]').val(ji6_obs.substr(0,limite));
            $(".editji6_obs").text("0" + " " + informativo);
        }else{
            $(".editji6_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji7_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji7_obs = $('textarea[name="editji7_obs"]').val();
            $('textarea[name="editji7_obs"]').val(ji7_obs.substr(0,limite));
            $(".editji7_obs").text("0" + " " + informativo);
        }else{
            $(".editji7_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji8_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji8_obs = $('textarea[name="editji8_obs"]').val();
            $('textarea[name="editji8_obs"]').val(ji8_obs.substr(0,limite));
            $(".editji8_obs").text("0" + " " + informativo);
        }else{
            $(".editji8_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji9_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji9_obs = $('textarea[name="editji9_obs"]').val();
            $('textarea[name="editji9_obs"]').val(ji9_obs.substr(0,limite));
            $(".editji9_obs").text("0" + " " + informativo);
        }else{
            $(".editji9_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji10_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji10_obs = $('textarea[name="editji10_obs"]').val();
            $('textarea[name="editji10_obs"]').val(ji10_obs.substr(0,limite));
            $(".editji10_obs").text("0" + " " + informativo);
        }else{
            $(".editji10_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji11_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji11_obs = $('textarea[name="editji11_obs"]').val();
            $('textarea[name="editji11_obs"]').val(ji11_obs.substr(0,limite));
            $(".editji11_obs").text("0" + " " + informativo);
        }else{
            $(".editji11_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji12_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji12_obs = $('textarea[name="editji12_obs"]').val();
            $('textarea[name="editji12_obs"]').val(ji3_obs.substr(0,limite));
            $(".editji12_obs").text("0" + " " + informativo);
        }else{
            $(".editji12_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji13_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji13_obs = $('textarea[name="editji13_obs"]').val();
            $('textarea[name="editji13_obs"]').val(ji13_obs.substr(0,limite));
            $(".editji13_obs").text("0" + " " + informativo);
        }else{
            $(".editji13_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji14_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji14_obs = $('textarea[name="editji14_obs"]').val();
            $('textarea[name="editji14_obs"]').val(ji14_obs.substr(0,limite));
            $(".editji14_obs").text("0" + " " + informativo);
        }else{
            $(".editji14_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji15_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji15_obs = $('textarea[name="editji15_obs"]').val();
            $('textarea[name="editji15_obs"]').val(ji15_obs.substr(0,limite));
            $(".editji15_obs").text("0" + " " + informativo);
        }else{
            $(".editji15_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji16_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji16_obs = $('textarea[name="editji16_obs"]').val();
            $('textarea[name="editji16_obs"]').val(ji16_obs.substr(0,limite));
            $(".editji16_obs").text("0" + " " + informativo);
        }else{
            $(".editji16_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji17_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji17_obs = $('textarea[name="editji17_obs"]').val();
            $('textarea[name="editji17_obs"]').val(ji17_obs.substr(0,limite));
            $(".editji17_obs").text("0" + " " + informativo);
        }else{
            $(".editji17_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji18_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji18_obs = $('textarea[name="editji18_obs"]').val();
            $('textarea[name="editji18_obs"]').val(ji18_obs.substr(0,limite));
            $(".editji18_obs").text("0" + " " + informativo);
        }else{
            $(".editji18_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editji19_de_detalhes_aut',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var ji19_de_detalhes_aut = $('textarea[name="editji19_de_detalhes_aut"]').val();
            $('textarea[name="editji19_de_detalhes_aut"]').val(ji19_de_detalhes_aut.substr(0,limite));
            $(".editji19_de_detalhes_aut").text("0" + " " + informativo);
        }else{
            $(".editji19_de_detalhes_aut").text(caracteresRestantes + " " + informativo);
        }
    });

    
$(document).on('click','.histdes_versaopais_independencia',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_histdes_versaopais_independencia = $("#histdes_versaopais_independencia"+atendimentoid).data("id");

        if(opcao_form_histdes_versaopais_independencia==0){
                $("#addpacienteid_histdesversaopaisindependencia").val(pacienteid);
                $("#addatendimentoid_histdesversaopaisindependencia").val(atendimentoid);
                $("#addform_histdesversaopaisindependencia").trigger('reset');
                $("#AddHistDesVersaoPaisIndependencia").modal('show'); 
                $("#saveform_errList_histdesversaopaisindependencia").replaceWith('<ul id="saveform_errList_histdesversaopaisindependencia"></ul>');
        }else{            
                $("#editpacienteid_histdesversaopaisindependencia").val(pacienteid);
                $("#editatendimentoid_histdesversaopaisindependencia").val(atendimentoid);
                $("#editform_histdesversaopaisindependencia").trigger('reset');
                $("#EditHistDesVersaoPaisIndependencia").modal('show'); 
                $("#updateform_errList_histdesversaoindependencia").replaceWith('<ul id="updateform_errList_histdesversaoindependencia"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_histdesversaopaisindependencia/'+pacienteid,
                    success: function(response){           
                        if(response.status==200){                                                
                            $(".ji1_veste_roupa_soz").attr('checked',response.histdesversaopaisindependencia.j1_veste_roupa_soz);
                            $(".ji1_parcial").attr('checked',response.histdesversaopaisindependencia.j1_parcial);
                            $(".ji1_obs").val(response.histdesversaopaisindependencia.j1_obs);
                            $(".ji2_retira_roupa_soz").attr('checked',response.histdesversaopaisindependencia.j2_retira_roupa_soz);
                            $(".ji2_parcial").attr('checked',response.histdesversaopaisindependencia.j2_parcial);
                            $(".ji2_obs").val(response.histdesversaopaisindependencia.j2_obs);
                            $(".ji3_toma_banho_soz").attr('checked',response.histdesversaopaisindependencia.j3_toma_banho_soz);
                            $(".ji3_parcial").attr('checked',response.histdesversaopaisindependencia.j3_parcial);
                            $(".ji3_obs").val(response.histdesversaopaisindependencia.j3_obs);
                            $(".ji4_jg_len_pp_no_lix").attr('checked',response.histdesversaopaisindependencia.j4_jg_lenc_pp_no_lix);
                            $(".ji4_obs").val(response.histdesversaopaisindependencia.j4_obs);
                            $(".ji6_come_ref_na_mesa").attr('checked',response.histdesversaopaisindependencia.j6_come_ref_na_mesa);
                            $(".ji6_obs").val(response.histdesversaopaisindependencia.j6_obs);
                            $(".ji7_usa_colher_ind").attr('checked',response.histdesversaopaisindependencia.j7_usa_colher_ind);
                            $(".ji7_obs").val(response.histdesversaopaisindependencia.j7_obs);
                            $(".ji8_usa_garfo_ind").attr('checked',response.histdesversaopaisindependencia.j8_usa_garfo_ind);
                            $(".ji8_obs").val(response.histdesversaopaisindependencia.j8_obs);
                            $(".ji9_tol_nov_alim").attr('checked',response.histdesversaopaisindependencia.j9_tol_nov_alim);
                            $(".ji9_obs").val(response.histdesversaopaisindependencia.j9_obs);
                            $(".ji10_usacopo_aberto").attr('checked',response.histdesversaopaisindependencia.j10_usacopo_aberto);
                            $(".ji10_obs").val(response.histdesversaopaisindependencia.j10_obs);
                            $(".ji11_perm_parc_mesa").attr('checked',response.histdesversaopaisindependencia.j11_perm_parc_mesa);
                            $(".ji11_obs").val(response.histdesversaopaisindependencia.j11_obs);
                            $(".ji12_desp_roup_ind").attr('checked',response.histdesversaopaisindependencia.j12_desp_roup_ind);
                            $(".ji12_obs").val(response.histdesversaopaisindependencia.j12_obs);
                            $(".ji13_limpa_nariz").attr('checked',response.histdesversaopaisindependencia.j13_limpa_nariz);
                            $(".ji13_obs").val(response.histdesversaopaisindependencia.j13_obs);
                            $(".ji14_usa_garf_cpab_sderr").attr('checked',response.histdesversaopaisindependencia.j14_usa_garf_cpab_sderr);
                            $(".ji14_obs").val(response.histdesversaopaisindependencia.j14_obs);
                            $(".ji15_abrefecha_moch_lanch_aut").attr('checked',response.histdesversaopaisindependencia.j15_abrefecha_moch_lanch_aut);
                            $(".ji15_obs").val(response.histdesversaopaisindependencia.j15_obs);
                            $(".ji16_usa_banh_aut").attr('checked',response.histdesversaopaisindependencia.j16_usa_banh_aut);
                            $(".ji16_obs").val(response.histdesversaopaisindependencia.j16_obs);
                            $(".ji17_tp_boca_qdtoss_esp").attr('checked',response.histdesversaopaisindependencia.j17_tp_boca_qdtoss_esp);
                            $(".ji17_obs").val(response.histdesversaopaisindependencia.j17_obs);
                            $(".ji18_ajuda_escovacao").attr('checked',response.histdesversaopaisindependencia.j18_ajuda_escovacao);
                            $(".ji18_obs").val(response.histdesversaopaisindependencia.j18_obs);
                            $(".ji19_de_detalhes_aut").val(response.histdesversaopaisindependencia.j19_de_detalhes_aut);
                        }
                    }
                });
        }
    });


    $(document).on('click','.add_histdesversaopais_independencia_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histdesversaopaisindependencia").val();
        var atendimentoid = $("#addatendimentoid_histdesversaopaisindependencia").val();

        var loading = $("#imgadd_histdesversaopaisindependencia");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('j1_veste_roupa_soz',$(".ji1_veste_roupa_soz").is(":checked")?'true':'false');
        data.append('j1_parcial',$(".ji1_parcial").is(":checked")?'true':'false');
        data.append('j1_obs',$(".ji1_obs").val());
        data.append('j2_retira_roupa_soz',$(".ji2_retira_roupa_soz").is(":checked")?'true':'false');
        data.append('j2_parcial',$(".ji2_parcial").is(":checked")?'true':'false');
        data.append('j2_obs',$(".ji2_obs").val());
        data.append('j3_toma_banho_soz',$(".ji3_toma_banho_soz").is(":checked")?'true':'false');
        data.append('j3_parcial',$(".ji3_parcial").is(":checked")?'true':'false');
        data.append('j3_obs',$(".ji3_obs").val());
        data.append('j4_jg_len_pp_no_lix',$(".ji4_jg_len_pp_no_lix").is(":checked")?'true':'false');        
        data.append('j4_obs',$(".ji4_obs").val());
        data.append('j6_come_ref_na_mesa',$(".ji6_come_ref_na_mesa").is(":checked")?'true':'false');        
        data.append('j6_obs',$(".ji6_obs").val());
        data.append('j7_usa_colher_ind',$(".ji7_usa_colher_ind").is(":checked")?'true':'false');        
        data.append('j7_obs',$(".ji7_obs").val());
        data.append('j8_usa_garfo_ind',$(".ji8_usa_garfo_ind").is(":checked")?'true':'false');        
        data.append('j8_obs',$(".ji8_obs").val());
        data.append('j9_tol_nov_alim',$(".ji9_tol_nov_alim").is(":checked")?'true':'false');        
        data.append('j9_obs',$(".ji9_obs").val());
        data.append('j10_usacopo_aberto',$(".ji10_usacopo_aberto").is(":checked")?'true':'false');        
        data.append('j10_obs',$(".ji10_obs").val());
        data.append('j11_perm_parc_mesa',$(".ji11_perm_parc_mesa").is(":checked")?'true':'false');        
        data.append('j11_obs',$(".ji11_obs").val());
        data.append('j12_desp_roup_ind',$(".ji12_desp_roup_ind").is(":checked")?'true':'false');        
        data.append('j12_obs',$(".ji12_obs").val());
        data.append('j13_limpa_nariz',$(".ji13_limpa_nariz").is(":checked")?'true':'false');        
        data.append('j13_obs',$(".ji13_obs").val());
        data.append('j14_usa_garf_cpab_sderr',$(".ji14_usa_garf_cpab_sderr").is(":checked")?'true':'false');        
        data.append('j14_obs',$(".ji14_obs").val());
        data.append('j15_abrefecha_moch_lanch_aut',$(".ji15_abrefecha_moch_lanch_aut").is(":checked")?'true':'false');        
        data.append('j15_obs',$(".ji15_obs").val());
        data.append('j16_usa_banh_aut',$(".ji16_usa_banh_aut").is(":checked")?'true':'false');        
        data.append('j16_obs',$(".ji16_obs").val());
        data.append('j17_tp_boca_qdtoss_esp',$(".ji17_tp_boca_qdtoss_esp").is(":checked")?'true':'false');        
        data.append('j17_obs',$(".ji17_obs").val());
        data.append('j18_ajuda_escovacao',$(".ji18_ajuda_escovacao").is(":checked")?'true':'false');        
        data.append('j18_obs',$(".ji18_obs").val());        
        data.append('j19_de_detalhes_aut',$(".ji19_de_detalhes_aut").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');

        $.ajax({
            url:'/ceteaadmin/terapia/store_histdesversaopaisindependencia',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histdesversaopaisindependencia").replaceWith('<ul id="saveform_errList_histdesversaopaisindependencia"></ul>');
                    $("#saveform_errlist_histdesversaopaisindependencia").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histdesversaopaisindependencia").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histdesversaopaisindependencia").replaceWith('<ul id="saveform_errList_histdesversaopaisindependencia"></ul>');
                    $("#histdes_versaopais_independencia"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_independencia'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histdesversaopaisindependencia").trigger('reset');
                    $("#AddHistDesVersaoPaisIndependencia").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_histdesversaopaisindependencia_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histdesversaopaisindependencia").val();
        var pacienteid = $("#editpacienteid_histdesversaopaisindependencia").val();

        var loading = $("#imgedit_histdesversaopaisindependencia");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('j1_veste_roupa_soz',$("#editji1_veste_roupa_soz").is(":checked")?'true':'false');
        data.append('j1_parcial',$("#editji1_parcial").is(":checked")?'true':'false');
        data.append('j1_obs',$("#editji1_obs").val());
        data.append('j2_retira_roupa_soz',$("#editji2_retira_roupa_soz").is(":checked")?'true':'false');
        data.append('j2_parcial',$("#editji2_parcial").is(":checked")?'true':'false');
        data.append('j2_obs',$("#editji2_obs").val());
        data.append('j3_toma_banho_soz',$("#editji3_toma_banho_soz").is(":checked")?'true':'false');
        data.append('j3_parcial',$("#editji3_parcial").is(":checked")?'true':'false');
        data.append('j3_obs',$("#editji3_obs").val());
        data.append('j4_jg_len_pp_no_lix',$("#editji4_jg_len_pp_no_lix").is(":checked")?'true':'false');        
        data.append('j4_obs',$("#editji4_obs").val());
        data.append('j6_come_ref_na_mesa',$("#editji6_come_ref_na_mesa").is(":checked")?'true':'false');        
        data.append('j6_obs',$("#editji6_obs").val());
        data.append('j7_usa_colher_ind',$("#editji7_usa_colher_ind").is(":checked")?'true':'false');        
        data.append('j7_obs',$("#editji7_obs").val());
        data.append('j8_usa_garfo_ind',$("#editji8_usa_garfo_ind").is(":checked")?'true':'false');        
        data.append('j8_obs',$("#editji8_obs").val());
        data.append('j9_tol_nov_alim',$("#editji9_tol_nov_alim").is(":checked")?'true':'false');        
        data.append('j9_obs',$("#editji9_obs").val());
        data.append('j10_usacopo_aberto',$("#editji10_usacopo_aberto").is(":checked")?'true':'false');        
        data.append('j10_obs',$("#editji10_obs").val());
        data.append('j11_perm_parc_mesa',$("#editji11_perm_parc_mesa").is(":checked")?'true':'false');        
        data.append('j11_obs',$("#editji11_obs").val());
        data.append('j12_desp_roup_ind',$("#editji12_desp_roup_ind").is(":checked")?'true':'false');        
        data.append('j12_obs',$("#editji12_obs").val());
        data.append('j13_limpa_nariz',$("#editji13_limpa_nariz").is(":checked")?'true':'false');        
        data.append('j13_obs',$("#editji13_obs").val());
        data.append('j14_usa_garf_cpab_sderr',$("#editji14_usa_garf_cpab_sderr").is(":checked")?'true':'false');        
        data.append('j14_obs',$("#editji14_obs").val());
        data.append('j15_abrefecha_moch_lanch_aut',$("#editji15_abrefecha_moch_lanch_aut").is(":checked")?'true':'false');        
        data.append('j15_obs',$("#editji15_obs").val());
        data.append('j16_usa_banh_aut',$("#editji16_usa_banh_aut").is(":checked")?'true':'false');        
        data.append('j16_obs',$("#editji16_obs").val());
        data.append('j17_tp_boca_qdtoss_esp',$("#editji17_tp_boca_qdtoss_esp").is(":checked")?'true':'false');        
        data.append('j17_obs',$("#editji17_obs").val());
        data.append('j18_ajuda_escovacao',$("#editji18_ajuda_escovacao").is(":checked")?'true':'false');        
        data.append('j18_obs',$("#editji18_obs").val());        
        data.append('j19_de_detalhes_aut',$("#editji19_de_detalhes_aut").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_histdesversaopaisindependencia/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histdesversaopaisindependencia").replaceWith('<ul id="updateform_errList_histdesversaopaisindependencia"></ul>');
                    $("#updateform_errlist_histdesversaopaisindependencia").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histdesversaopaisindependencia").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histdesversaopaisindependencia").replaceWith('<ul id="updateform_errList_histdesversaopaisindependencia"></ul>');
                    $("#histdes_versaopais_independencia"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_independencia'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histdesversaopaisindependencia").trigger('reset');
                    $("#EditHistDesVersaoPaisIndependencia").modal('hide');    
                }
            }
        });
    });

//fim histdes_versaopais_independencia

//início histdes_versaopais_desenvmotor

$("#AddHistDesVersaoPaisDesenvMotor").on('shown.bs.modal',function(){
            $(".l1_sust_cabeca").focus();
    });

$("#EditHistDesVersaoPaisDesenvMotor").on('shown.bs.modal',function(){
            $(".l1_sust_cabeca").focus();
    });

//inicio conta caracteres dos textarea HistDesVersaoPaisDesenvMotor

    //add
 
    $(document).on('input','#addl1_sust_cabeca',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l1_sust_cabeca = $('textarea[name="addl1_sust_cabeca"]').val();
            $('textarea[name="addl1_sust_cabeca"]').val(l1_sust_cabeca.substr(0,limite));
            $(".addl1_sust_cabeca").text("0" + " " + informativo);
        }else{
            $(".addl1_sust_cabeca").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl2_sent_s_apoio',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l2_sent_s_apoio = $('textarea[name="addl2_sent_s_apoio"]').val();
            $('textarea[name="addl2_sent_s_apoio"]').val(l2_sent_s_apoio.substr(0,limite));
            $(".addl2_sent_s_apoio").text("0" + " " + informativo);
        }else{
            $(".addl2_sent_s_apoio").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl3_andou',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l3_andou = $('textarea[name="addl3_andou"]').val();
            $('textarea[name="addl3_andou"]').val(l3_andou.substr(0,limite));
            $(".addl3_andou").text("0" + " " + informativo);
        }else{
            $(".addl3_andou").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl4_desproc_desfralde',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l4_desproc_desfralde = $('textarea[name="addl4_desproc_desfralde"]').val();
            $('textarea[name="addl4_desproc_desfralde"]').val(l4_desproc_desfralde.substr(0,limite));
            $(".addl4_desproc_desfralde").text("0" + " " + informativo);
        }else{
            $(".addl4_desproc_desfralde").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl5_hv_perdcontrol_esfinc',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l5_hv_perdcontrol_esfinc = $('textarea[name="addl5_hv_perdcontrol_esfinc"]').val();
            $('textarea[name="addl5_hv_perdcontrol_esfinc"]').val(l5_hv_perdcontrol_esfinc.substr(0,limite));
            $(".addl5_hv_perdcontrol_esfinc").text("0" + " " + informativo);
        }else{
            $(".addl5_hv_perdcontrol_esfinc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl6_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l6_obs = $('textarea[name="addl6_obs"]').val();
            $('textarea[name="addl6_obs"]').val(l6_obs.substr(0,limite));
            $(".addl6_obs").text("0" + " " + informativo);
        }else{
            $(".addl6_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl6_cm_seg_lapis',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l6_cm_seg_lapis = $('textarea[name="addl6_cm_seg_lapis"]').val();
            $('textarea[name="addl6_cm_seg_lapis"]').val(l6_cm_seg_lapis.substr(0,limite));
            $(".addl6_cm_seg_lapis").text("0" + " " + informativo);
        }else{
            $(".addl6_cm_seg_lapis").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl7_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l7_obs = $('textarea[name="addl7_obs"]').val();
            $('textarea[name="addl7_obs"]').val(l7_obs.substr(0,limite));
            $(".addl7_obs").text("0" + " " + informativo);
        }else{
            $(".addl7_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl8_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l8_obs = $('textarea[name="addl8_obs"]').val();
            $('textarea[name="addl8_obs"]').val(l8_obs.substr(0,limite));
            $(".addl8_obs").text("0" + " " + informativo);
        }else{
            $(".addl8_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl9_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l9_obs = $('textarea[name="addl9_obs"]').val();
            $('textarea[name="addl9_obs"]').val(l9_obs.substr(0,limite));
            $(".addl9_obs").text("0" + " " + informativo);
        }else{
            $(".addl9_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl10_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l10_obs = $('textarea[name="addl10_obs"]').val();
            $('textarea[name="addl10_obs"]').val(l10_obs.substr(0,limite));
            $(".addl10_obs").text("0" + " " + informativo);
        }else{
            $(".addl10_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl11_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l11_obs = $('textarea[name="addl11_obs"]').val();
            $('textarea[name="addl11_obs"]').val(l11_obs.substr(0,limite));
            $(".addl11_obs").text("0" + " " + informativo);
        }else{
            $(".addl11_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl12_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l12_obs = $('textarea[name="addl12_obs"]').val();
            $('textarea[name="addl12_obs"]').val(l12_obs.substr(0,limite));
            $(".addl12_obs").text("0" + " " + informativo);
        }else{
            $(".addl12_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl13_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l13_obs = $('textarea[name="addl13_obs"]').val();
            $('textarea[name="addl13_obs"]').val(l13_obs.substr(0,limite));
            $(".addl13_obs").text("0" + " " + informativo);
        }else{
            $(".addl13_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl14_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l14_obs = $('textarea[name="addl14_obs"]').val();
            $('textarea[name="addl14_obs"]').val(l14_obs.substr(0,limite));
            $(".addl14_obs").text("0" + " " + informativo);
        }else{
            $(".addl14_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl15_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l15_obs = $('textarea[name="addl15_obs"]').val();
            $('textarea[name="addl15_obs"]').val(l15_obs.substr(0,limite));
            $(".addl15_obs").text("0" + " " + informativo);
        }else{
            $(".addl15_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl16_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l16_obs = $('textarea[name="addl16_obs"]').val();
            $('textarea[name="addl16_obs"]').val(l16_obs.substr(0,limite));
            $(".addl16_obs").text("0" + " " + informativo);
        }else{
            $(".addl16_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl17_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l17_obs = $('textarea[name="addl17_obs"]').val();
            $('textarea[name="addl17_obs"]').val(l17_obs.substr(0,limite));
            $(".addl17_obs").text("0" + " " + informativo);
        }else{
            $(".addl17_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addl18_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l18_obs = $('textarea[name="addl18_obs"]').val();
            $('textarea[name="addl18_obs"]').val(l12_obs.substr(0,limite));
            $(".addl18_obs").text("0" + " " + informativo);
        }else{
            $(".addl18_obs").text(caracteresRestantes + " " + informativo);
        }
    });

 //edit
 
    $(document).on('input','#editl1_sust_cabeca',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l1_sust_cabeca = $('textarea[name="editl1_sust_cabeca"]').val();
            $('textarea[name="editl1_sust_cabeca"]').val(l1_sust_cabeca.substr(0,limite));
            $(".editl1_sust_cabeca").text("0" + " " + informativo);
        }else{
            $(".editl1_sust_cabeca").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl2_sent_s_apoio',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l2_sent_s_apoio = $('textarea[name="editl2_sent_s_apoio"]').val();
            $('textarea[name="editl2_sent_s_apoio"]').val(l2_sent_s_apoio.substr(0,limite));
            $(".editl2_sent_s_apoio").text("0" + " " + informativo);
        }else{
            $(".editl2_sent_s_apoio").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl3_andou',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l3_andou = $('textarea[name="editl3_andou"]').val();
            $('textarea[name="editl3_andou"]').val(l3_andou.substr(0,limite));
            $(".editl3_andou").text("0" + " " + informativo);
        }else{
            $(".editl3_andou").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl4_desproc_desfralde',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l4_desproc_desfralde = $('textarea[name="editl4_desproc_desfralde"]').val();
            $('textarea[name="editl4_desproc_desfralde"]').val(l4_desproc_desfralde.substr(0,limite));
            $(".editl4_desproc_desfralde").text("0" + " " + informativo);
        }else{
            $(".editl4_desproc_desfralde").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl5_hv_perdcontrol_esfinc',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l5_hv_perdcontrol_esfinc = $('textarea[name="editl5_hv_perdcontrol_esfinc"]').val();
            $('textarea[name="editl5_hv_perdcontrol_esfinc"]').val(l5_hv_perdcontrol_esfinc.substr(0,limite));
            $(".editl5_hv_perdcontrol_esfinc").text("0" + " " + informativo);
        }else{
            $(".editl5_hv_perdcontrol_esfinc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl6_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l6_obs = $('textarea[name="editl6_obs"]').val();
            $('textarea[name="editl6_obs"]').val(l6_obs.substr(0,limite));
            $(".editl6_obs").text("0" + " " + informativo);
        }else{
            $(".editl6_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl6_cm_seg_lapis',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l6_cm_seg_lapis = $('textarea[name="editl6_cm_seg_lapis"]').val();
            $('textarea[name="editl6_cm_seg_lapis"]').val(l6_cm_seg_lapis.substr(0,limite));
            $(".editl6_cm_seg_lapis").text("0" + " " + informativo);
        }else{
            $(".editl6_cm_seg_lapis").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl7_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l7_obs = $('textarea[name="editl7_obs"]').val();
            $('textarea[name="editl7_obs"]').val(l7_obs.substr(0,limite));
            $(".editl7_obs").text("0" + " " + informativo);
        }else{
            $(".editl7_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl8_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l8_obs = $('textarea[name="editl8_obs"]').val();
            $('textarea[name="editl8_obs"]').val(l8_obs.substr(0,limite));
            $(".editl8_obs").text("0" + " " + informativo);
        }else{
            $(".editl8_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl9_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l9_obs = $('textarea[name="editl9_obs"]').val();
            $('textarea[name="editl9_obs"]').val(l9_obs.substr(0,limite));
            $(".editl9_obs").text("0" + " " + informativo);
        }else{
            $(".editl9_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl10_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l10_obs = $('textarea[name="editl10_obs"]').val();
            $('textarea[name="editl10_obs"]').val(l10_obs.substr(0,limite));
            $(".editl10_obs").text("0" + " " + informativo);
        }else{
            $(".editl10_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl11_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l11_obs = $('textarea[name="editl11_obs"]').val();
            $('textarea[name="editl11_obs"]').val(l11_obs.substr(0,limite));
            $(".editl11_obs").text("0" + " " + informativo);
        }else{
            $(".editl11_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl12_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l12_obs = $('textarea[name="editl12_obs"]').val();
            $('textarea[name="editl12_obs"]').val(l12_obs.substr(0,limite));
            $(".editl12_obs").text("0" + " " + informativo);
        }else{
            $(".editl12_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl13_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l13_obs = $('textarea[name="editl13_obs"]').val();
            $('textarea[name="editl13_obs"]').val(l13_obs.substr(0,limite));
            $(".editl13_obs").text("0" + " " + informativo);
        }else{
            $(".editl13_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl14_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l14_obs = $('textarea[name="editl14_obs"]').val();
            $('textarea[name="editl14_obs"]').val(l14_obs.substr(0,limite));
            $(".editl14_obs").text("0" + " " + informativo);
        }else{
            $(".editl14_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl15_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l15_obs = $('textarea[name="editl15_obs"]').val();
            $('textarea[name="editl15_obs"]').val(l15_obs.substr(0,limite));
            $(".editl15_obs").text("0" + " " + informativo);
        }else{
            $(".editl15_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl16_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l16_obs = $('textarea[name="editl16_obs"]').val();
            $('textarea[name="editl16_obs"]').val(l16_obs.substr(0,limite));
            $(".editl16_obs").text("0" + " " + informativo);
        }else{
            $(".editl16_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl17_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l17_obs = $('textarea[name="editl17_obs"]').val();
            $('textarea[name="editl17_obs"]').val(l17_obs.substr(0,limite));
            $(".editl17_obs").text("0" + " " + informativo);
        }else{
            $(".editl17_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editl18_obs',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var l18_obs = $('textarea[name="editl18_obs"]').val();
            $('textarea[name="editl18_obs"]').val(l12_obs.substr(0,limite));
            $(".editl18_obs").text("0" + " " + informativo);
        }else{
            $(".editl18_obs").text(caracteresRestantes + " " + informativo);
        }
    });
    
    
$(document).on('click','.histdes_versaopais_desenvmotor',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_histdes_versaopais_desenvmotor = $("#histdes_versaopais_desenvmotor"+atendimentoid).data("id");

        if(opcao_form_histdes_versaopais_desenvmotor==0){
                $("#addpacienteid_histdesversaopaisdesenvmotor").val(pacienteid);
                $("#addatendimentoid_histdesversaopaisdesenvmotor").val(atendimentoid);
                $("#addform_histdesversaopaisdesenvmotor").trigger('reset');
                $("#AddHistDesVersaoPaisDesenvMotor").modal('show'); 
                $("#saveform_errList_histdesversaopaisdesenvmotor").replaceWith('<ul id="saveform_errList_histdesversaopaisdesenvmotor"></ul>');
        }else{            
                $("#editpacienteid_histdesversaopaisdesenvmotor").val(pacienteid);
                $("#editatendimentoid_histdesversaopaisdesenvmotor").val(atendimentoid);
                $("#editform_histdesversaopaisdesenvmotor").trigger('reset');
                $("#EditHistDesVersaoPaisDesenvMotor").modal('show'); 
                $("#updateform_errList_histdesversaopaisdesenvmotor").replaceWith('<ul id="updateform_errList_histdesversaopaisdesenvmotor"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_histdesversaopaisdesenvmotor/'+pacienteid,
                    success: function(response){           
                        if(response.status==200){                                                                            
                            $(".l1_sust_cabeca").val(response.histdesversaopaisdesenvmotor.l1_sust_cabeca);                            
                            $(".l2_sent_s_apoio").val(response.histdesversaopaisdesenvmotor.l2_sent_s_apoio);                            
                            $(".l3_andou").val(response.histdesversaopaisdesenvmotor.l3_andou);
                            $(".l4_desproc_desfralde").val(response.histdesversaopaisdesenvmotor.l4_descproc_desfralde);
                            $(".l5_hv_perdcontrol_esfinc").val(response.histdesversaopaisdesenvmotor.l5_hv_perdcontrol_esfinc);
                            $(".l6_rab_em_papel").attr('checked',response.histdesversaopaisdesenvmotor.l6_rab_em_papel);
                            $(".l6_obs").val(response.histdesversaopaisdesenvmotor.l6_obs);
                            $(".l6_cm_seg_lapis").val(response.histdesversaopaisdesenvmotor.i6_cm_seg_lapis);
                            $(".l7_cam_ponta_pes").attr('checked',response.histdesversaopaisdesenvmotor.l7_cam_ponta_pes);
                            $(".l7_obs").val(response.histdesversaopaisdesenvmotor.l7_obs);
                            $(".l8_apres_deseq").attr('checked',response.histdesversaopaisdesenvmotor.l8_apres_deseq);
                            $(".l8_obs").val(response.histdesversaopaisdesenvmotor.l8_obs);
                            $(".l9_dif_para_correr").attr('checked',response.histdesversaopaisdesenvmotor.l9_dif_para_correr);
                            $(".l9_obs").val(response.histdesversaopaisdesenvmotor.l9_obs);
                            $(".l10_dif_para_escalar").attr('checked',response.histdesversaopaisdesenvmotor.l10_dif_para_escalar);
                            $(".l10_obs").val(response.histdesversaopaisdesenvmotor.l10_obs);
                            $(".l11_chuta_bola").attr('checked',response.histdesversaopaisdesenvmotor.l11_chuta_bola);
                            $(".l11_obs").val(response.histdesversaopaisdesenvmotor.l11_obs);
                            $(".l12_sb_esc_sajuda").attr('checked',response.histdesversaopaisdesenvmotor.l12_sb_esc_sajuda);
                            $(".l12_obs").val(response.histdesversaopaisdesenvmotor.l12_obs);
                            $(".l13_sb_esc_altpess").attr('checked',response.histdesversaopaisdesenvmotor.l13_sb_esc_altpes);
                            $(".l13_obs").val(response.histdesversaopaisdesenvmotor.l13_obs);
                            $(".l14_sb_pedalar").attr('checked',response.histdesversaopaisdesenvmotor.l14_sb_pedalar);
                            $(".l14_obs").val(response.histdesversaopaisdesenvmotor.l14_obs);
                            $(".l15_dif_man_obj_cdedos").attr('checked',response.histdesversaopaisdesenvmotor.l15_dif_man_obj_cdedos);
                            $(".l15_obs").val(response.histdesversaopaisdesenvmotor.l15_obs);
                            $(".l16_senta_em_w").attr('checked',response.histdesversaopaisdesenvmotor.l16_senta_em_w);
                            $(".l16_obs").val(response.histdesversaopaisdesenvmotor.l16_obs);
                            $(".l17_seg_mamadeira").attr('checked',response.histdesversaopaisdesenvmotor.l17_seg_mamadeira);
                            $(".l17_obs").val(response.histdesversaopaisdesenvmotor.l17_obs);
                            $(".l18_amarra_cadarco").attr('checked',response.histdesversaopaisdesenvmotor.l18_amarra_cadarco);
                            $(".l18_obs").val(response.histdesversaopaisdesenvmotor.l18_obs);
                        }
                    }
                });
        }
    });


    $(document).on('click','.add_histdesversaopais_desenvmotor_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histdesversaopaisdesenvmotor").val();
        var atendimentoid = $("#addatendimentoid_histdesversaopaisdesenvmotor").val();

        var loading = $("#imgadd_histdesversaopaisdesenvmotor");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('l1_sust_cabeca',$(".l1_sust_cabeca").val());
        data.append('l2_sent_s_apoio',$(".l2_sent_s_apoio").val());
        data.append('l3_andou',$(".l3_andou").val());
        data.append('l4_desproc_desfralde',$(".l4_desproc_desfralde").val());
        data.append('l5_hv_perdcontrol_esfinc',$(".l5_hv_perdcontrol_esfinc").val());
        data.append('l6_rab_em_papel',$(".l6_rab_em_papel").is(":checked")?'true':'false');
        data.append('l6_obs',$(".l6_obs").val());        
        data.append('l6_cm_seg_lapis',$(".l6_cm_seg_lapis").val());
        data.append('l7_cam_ponta_pes',$(".l7_cam_ponta_pes").is(":checked")?'true':'false');
        data.append('l7_obs',$(".l7_obs").val());
        data.append('l8_apres_deseq',$(".l8_apres_deseq").is(":checked")?'true':'false');        
        data.append('l8_obs',$(".l8_obs").val());
        data.append('l9_dif_para_correr',$(".l9_dif_para_correr").is(":checked")?'true':'false');
        data.append('l9_obs',$(".l9_obs").val());
        data.append('l10_dif_para_escalar',$(".l10_dif_para_escalar").is(":checked")?'true':'false');
        data.append('l10_obs',$(".l10_obs").val());
        data.append('l11_chuta_bola',$(".l11_chuta_bola").is(":checked")?'true':'false');        
        data.append('l11_obs',$(".l11_obs").val());
        data.append('l12_sb_esc_sajuda',$(".l12_sb_esc_sajuda").is(":checked")?'true':'false');        
        data.append('l12_obs',$(".l12_obs").val());
        data.append('l13_sb_esc_altpes',$(".l13_sb_esc_altpess").is(":checked")?'true':'false');        
        data.append('l13_obs',$(".l13_obs").val());
        data.append('l14_sb_pedalar',$(".l14_sb_pedalar").is(":checked")?'true':'false');
        data.append('l14_obs',$(".l14_obs").val());
        data.append('l15_dif_man_obj_cdedos',$(".l15_dif_man_obj_cdedos").is(":checked")?'true':'false');
        data.append('l15_obs',$(".l15_obs").val());
        data.append('l16_senta_em_w',$(".l16_senta_em_w").is(":checked")?'true':'false');
        data.append('l16_obs',$(".l16_obs").val());
        data.append('l17_seg_mamadeira',$(".l17_seg_mamadeira").is(":checked")?'true':'false');
        data.append('l17_obs',$(".l17_obs").val());
        data.append('l18_amarra_cadarco',$(".l18_amarra_cadarco").is(":checked")?'true':'false');
        data.append('l18_obs',$(".l18_obs").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');

        $.ajax({
            url:'/ceteaadmin/terapia/store_histdesversaopaisdesenvmotor',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histdesversaopaisdesenvmotor").replaceWith('<ul id="saveform_errList_histdesversaopaisdesenvmotor"></ul>');
                    $("#saveform_errlist_histdesversaopaisdesenvmotor").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histdesversaopaisdesenvmotor").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histdesversaopaisdesenvmotor").replaceWith('<ul id="saveform_errList_histdesversaopaisdesenvmotor"></ul>');
                    $("#histdes_versaopais_desenvmotor"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_desenvmotor'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histdesversaopaisdesenvmotor").trigger('reset');
                    $("#AddHistDesVersaoPaisDesenvMotor").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_histdesversaopaisdesenvmotor_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histdesversaopaisdesenvmotor").val();
        var pacienteid = $("#editpacienteid_histdesversaopaisdesenvmotor").val();

        var loading = $("#imgedit_histdesversaopaisdesenvmotor");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('l1_sust_cabeca',$("#editl1_sust_cabeca").val());
        data.append('l2_sent_s_apoio',$("#editl2_sent_s_apoio").val());
        data.append('l3_andou',$("#editl3_andou").val());
        data.append('l4_desproc_desfralde',$("#editl4_desproc_desfralde").val());
        data.append('l5_hv_perdcontrol_esfinc',$("#editl5_hv_perdcontrol_esfinc").val());
        data.append('l6_rab_em_papel',$("#editl6_rab_em_papel").is(":checked")?'true':'false');
        data.append('l6_obs',$("#editl6_obs").val());        
        data.append('l6_cm_seg_lapis',$("#editl6_cm_seg_lapis").val());
        data.append('l7_cam_ponta_pes',$("#editl7_cam_ponta_pes").is(":checked")?'true':'false');
        data.append('l7_obs',$("#editl7_obs").val());
        data.append('l8_apres_deseq',$("#editl8_apres_deseq").is(":checked")?'true':'false');        
        data.append('l8_obs',$("#editl8_obs").val());
        data.append('l9_dif_para_correr',$("#editl9_dif_para_correr").is(":checked")?'true':'false');
        data.append('l9_obs',$("#editl9_obs").val());
        data.append('l10_dif_para_escalar',$("#editl10_dif_para_escalar").is(":checked")?'true':'false');
        data.append('l10_obs',$("#editl10_obs").val());
        data.append('l11_chuta_bola',$("#editl11_chuta_bola").is(":checked")?'true':'false');        
        data.append('l11_obs',$("#editl11_obs").val());
        data.append('l12_sb_esc_sajuda',$("#editl12_sb_esc_sajuda").is(":checked")?'true':'false');        
        data.append('l12_obs',$("#editl12_obs").val());
        data.append('l13_sb_esc_altpes',$("#editl13_sb_esc_altpess").is(":checked")?'true':'false');        
        data.append('l13_obs',$("#editl13_obs").val());
        data.append('l14_sb_pedalar',$("#editl14_sb_pedalar").is(":checked")?'true':'false');
        data.append('l14_obs',$("#editl14_obs").val());
        data.append('l15_dif_man_obj_cdedos',$("#editl15_dif_man_obj_cdedos").is(":checked")?'true':'false');
        data.append('l15_obs',$("#editl15_obs").val());
        data.append('l16_senta_em_w',$("#editl16_senta_em_w").is(":checked")?'true':'false');
        data.append('l16_obs',$("#editl16_obs").val());
        data.append('l17_seg_mamadeira',$("#editl17_seg_mamadeira").is(":checked")?'true':'false');
        data.append('l17_obs',$("#editl17_obs").val());
        data.append('l18_amarra_cadarco',$("#editl18_amarra_cadarco").is(":checked")?'true':'false');
        data.append('l18_obs',$("#editl18_obs").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_histdesversaopaisdesenvmotor/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histdesversaopaisdesenvmotor").replaceWith('<ul id="updateform_errList_histdesversaopaisdesenvmotor"></ul>');
                    $("#updateform_errlist_histdesversaopaisdesenvmotor").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histdesversaopaisdesenvmotor").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histdesversaopaisdesenvmotor").replaceWith('<ul id="updateform_errList_histdesversaopaisdesenvmotor"></ul>');
                    $("#histdes_versaopais_desenvmotor"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_desenvmotor'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histdesversaopaisdesenvmotor").trigger('reset');
                    $("#EditHistDesVersaoPaisDesenvMotor").modal('hide');    
                }
            }
        });
    });

//fim histdes_versaopais_desenvmotor

//início histdes_versaopais_histescolar

$("#AddHistDesVersaoPaisHistEscolar").on('shown.bs.modal',function(){
            $(".m1_idade_ing_escola").focus();
    });

$("#EditHistDesVersaoPaisHistEscolar").on('shown.bs.modal',function(){
            $(".m1_idade_ing_escola").focus();
    });

//inicio conta caracteres dos textarea HistDesVersaoPaisHistEscolar

    //add
  
    $(document).on('input','#addm1_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var m1_obs = $('textarea[name="addm1_obs"]').val();
            $('textarea[name="addm1_obs"]').val(m1_obs.substr(0,limite));
            $(".addm1_obs").text("0" + " " + informativo);
        }else{
            $(".addm1_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addm2_alg_eqescolar_mencomport',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var m2_alg_eqescolar_mencomport = $('textarea[name="addm2_alg_eqescolar_mencomport"]').val();
            $('textarea[name="addm2_alg_eqescolar_mencomport"]').val(m2_alg_eqescolar_mencomport.substr(0,limite));
            $(".addm2_alg_eqescolar_mencomport").text("0" + " " + informativo);
        }else{
            $(".addm2_alg_eqescolar_mencomport").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addm3_apres_hab_especial',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var m3_apres_hab_especial = $('textarea[name="addm3_apres_hab_especial"]').val();
            $('textarea[name="addm3_apres_hab_especial"]').val(m3_apres_hab_especial.substr(0,limite));
            $(".addm3_apres_hab_especial").text("0" + " " + informativo);
        }else{
            $(".addm3_apres_hab_especial").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addm4_ha_dif_aprendizagem',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var m4_ha_dif_aprendizagem = $('textarea[name="addm4_ha_dif_aprendizagem"]').val();
            $('textarea[name="addm4_ha_dif_aprendizagem"]').val(m4_ha_dif_aprendizagem.substr(0,limite));
            $(".addm4_ha_dif_aprendizagem").text("0" + " " + informativo);
        }else{
            $(".addm4_ha_dif_aprendizagem").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addm5_neces_med_escolar',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var m5_neces_med_escolar = $('textarea[name="addm5_neces_med_escolar"]').val();
            $('textarea[name="addm5_neces_med_escolar"]').val(m5_neces_med_escolar.substr(0,limite));
            $(".addm5_neces_med_escolar").text("0" + " " + informativo);
        }else{
            $(".addm5_neces_med_escolar").text(caracteresRestantes + " " + informativo);
        }
    });

    //edit
  
    $(document).on('input','#editm1_obs',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var m1_obs = $('textarea[name="editm1_obs"]').val();
            $('textarea[name="editm1_obs"]').val(m1_obs.substr(0,limite));
            $(".editm1_obs").text("0" + " " + informativo);
        }else{
            $(".editm1_obs").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editm2_alg_eqescolar_mencomport',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var m2_alg_eqescolar_mencomport = $('textarea[name="editm2_alg_eqescolar_mencomport"]').val();
            $('textarea[name="editm2_alg_eqescolar_mencomport"]').val(m2_alg_eqescolar_mencomport.substr(0,limite));
            $(".editm2_alg_eqescolar_mencomport").text("0" + " " + informativo);
        }else{
            $(".editm2_alg_eqescolar_mencomport").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editm3_apres_hab_especial',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var m3_apres_hab_especial = $('textarea[name="editm3_apres_hab_especial"]').val();
            $('textarea[name="editm3_apres_hab_especial"]').val(m3_apres_hab_especial.substr(0,limite));
            $(".editm3_apres_hab_especial").text("0" + " " + informativo);
        }else{
            $(".editm3_apres_hab_especial").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editm4_ha_dif_aprendizagem',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var m4_ha_dif_aprendizagem = $('textarea[name="editm4_ha_dif_aprendizagem"]').val();
            $('textarea[name="editm4_ha_dif_aprendizagem"]').val(m4_ha_dif_aprendizagem.substr(0,limite));
            $(".editm4_ha_dif_aprendizagem").text("0" + " " + informativo);
        }else{
            $(".editm4_ha_dif_aprendizagem").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editm5_neces_med_escolar',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var m5_neces_med_escolar = $('textarea[name="editm5_neces_med_escolar"]').val();
            $('textarea[name="editm5_neces_med_escolar"]').val(m5_neces_med_escolar.substr(0,limite));
            $(".editm5_neces_med_escolar").text("0" + " " + informativo);
        }else{
            $(".editm5_neces_med_escolar").text(caracteresRestantes + " " + informativo);
        }
    });
    
    
$(document).on('click','.histdes_versaopais_histescolar',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_histdes_versaopais_histescolar = $("#histdes_versaopais_histescolar"+atendimentoid).data("id");

        if(opcao_form_histdes_versaopais_histescolar==0){
                $("#addpacienteid_histdesversaopaishistescolar").val(pacienteid);
                $("#addatendimentoid_histdesversaopaishistescolar").val(atendimentoid);
                $("#addform_histdesversaopaishistescolar").trigger('reset');
                $("#AddHistDesVersaoPaisHistEscolar").modal('show'); 
                $("#saveform_errList_histdesversaopaishistescolar").replaceWith('<ul id="saveform_errList_histdesversaopaishistescolar"></ul>');
        }else{            
                $("#editpacienteid_histdesversaopaishistescolar").val(pacienteid);
                $("#editatendimentoid_histdesversaopaishistescolar").val(atendimentoid);
                $("#editform_histdesversaopaishistescolar").trigger('reset');
                $("#EditHistDesVersaoPaisHistEscolar").modal('show'); 
                $("#updateform_errList_histdesversaopaishistescolar").replaceWith('<ul id="updateform_errList_histdesversaopaishistescolar"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_histdesversaopaishistescolar/'+pacienteid,
                    success: function(response){           
                        if(response.status==200){                                                                            
                            $(".m1_idade_ing_escola").attr('checked',response.histdesversaopaishistescolar.m1_idade_ing_escola);
                            $(".m1_obs").val(response.histdesversaopaishistescolar.m1_obs);
                            $('.m2_alg_eqescolar_mencomport').val(response.histdesversaopaishistescolar.m2_alg_eqescolar_mencomport);
                            $('.m3_apres_hab_especial').val(response.histdesversaopaishistescolar.m3_apres_hab_especial);
                            $('.m4_ha_dif_aprendizagem').val(response.histdesversaopaishistescolar.m4_ha_dif_aprendizagem);
                            $('.m5_neces_med_escolar').val(response.histdesversaopaishistescolar.m5_neces_med_escolar);
                        }
                    }
                });
        }
    });


    $(document).on('click','.add_histdesversaopais_histescolar_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histdesversaopaishistescolar").val();
        var atendimentoid = $("#addatendimentoid_histdesversaopaishistescolar").val();

        var loading = $("#imgadd_histdesversaopaishistescolar");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);        
        data.append('m1_idade_ing_escola',$(".m1_idade_ing_escola").is(':checked')?'true':'false');
        data.append('m1_obs',$(".m1_obs").val());
        data.append('m2_alg_eqescolar_mencomport',$(".m2_alg_eqescolar_mencomport").val());
        data.append('m3_apres_hab_especial',$(".m3_apres_hab_especial").val());
        data.append('m4_ha_dif_aprendizagem',$(".m4_ha_dif_aprendizagem").val());        
        data.append('m5_neces_med_escolar',$(".m5_neces_med_escolar").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');

        $.ajax({
            url:'/ceteaadmin/terapia/store_histdesversaopaishistescolar',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histdesversaopaishistescolar").replaceWith('<ul id="saveform_errList_histdesversaopaishistescolar"></ul>');
                    $("#saveform_errlist_histdesversaopaishistescolar").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histdesversaopaishistescolar").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histdesversaopaishistescolar").replaceWith('<ul id="saveform_errList_histdesversaopaishistescolar"></ul>');
                    $("#histdes_versaopais_histescolar"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_histescolar'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histdesversaopaishistescolar").trigger('reset');
                    $("#AddHistDesVersaoPaisHistEscolar").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_histdesversaopaishistescolar_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histdesversaopaishistescolar").val();
        var pacienteid = $("#editpacienteid_histdesversaopaishistescolar").val();

        var loading = $("#imgedit_histdesversaopaishistescolar");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('m1_idade_ing_escola',$("#editm1_idade_ing_escola").is(':checked')?'true':'false');
        data.append('m1_obs',$("#editm1_obs").val());
        data.append('m2_alg_eqescolar_mencomport',$("#editm2_alg_eqescolar_mencomport").val());
        data.append('m3_apres_hab_especial',$("#editm3_apres_hab_especial").val());
        data.append('m4_ha_dif_aprendizagem',$("#editm4_ha_dif_aprendizagem").val());        
        data.append('m5_neces_med_escolar',$("#editm5_neces_med_escolar").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_histdesversaopaishistescolar/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histdesversaopaishistescolar").replaceWith('<ul id="updateform_errList_histdesversaopaishistescolar"></ul>');
                    $("#updateform_errlist_histdesversaopaishistescolar").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histdesversaopaishistescolar").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histdesversaopaishistescolar").replaceWith('<ul id="updateform_errList_histdesversaopaishistescolar"></ul>');
                    $("#histdes_versaopais_histescolar"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_histescolar'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histdesversaopaishistescolar").trigger('reset');
                    $("#EditHistDesVersaoPaisHistEscolar").modal('hide');    
                }
            }
        });
    });

//fim histdes_versaopais_histescolar

//início histdes_versaopais_compcasa

$("#AddHistDesVersaoPaisCompCasa").on('shown.bs.modal',function(){
            $(".n1_comp_cri_casa").focus();
    });

$("#EditHistDesVersaoPaisCompCasa").on('shown.bs.modal',function(){
            $(".n1_comp_cri_casa").focus();
    });

//inicio conta caracteres dos textarea HistDesVersaoPaisCompCasa

    //add
  
    $(document).on('input','#addn1_comp_cri_casa',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var n1_comp_cri_casa = $('textarea[name="addn1_comp_cri_casa"]').val();
            $('textarea[name="addn1_comp_cri_casa"]').val(n1_comp_cri_casa.substr(0,limite));
            $(".addn1_comp_cri_casa").text("0" + " " + informativo);
        }else{
            $(".addn1_comp_cri_casa").text(caracteresRestantes + " " + informativo);
        }
    });
    
    $(document).on('input','#addn2_dia_tipico_manha',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var n2_dia_tipico_manha = $('textarea[name="addn2_dia_tipico_manha"]').val();
            $('textarea[name="addn2_dia_tipico_manha"]').val(n2_dia_tipico_manha.substr(0,limite));
            $(".addn2_dia_tipico_manha").text("0" + " " + informativo);
        }else{
            $(".addn2_dia_tipico_manha").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addn2_dia_tipico_tarde',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var n2_dia_tipico_tarde = $('textarea[name="addn2_dia_tipico_tarde"]').val();
            $('textarea[name="addn2_dia_tipico_tarde"]').val(n2_dia_tipico_tarde.substr(0,limite));
            $(".addn2_dia_tipico_tarde").text("0" + " " + informativo);
        }else{
            $(".addn2_dia_tipico_tarde").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addn2_dia_tipico_noite',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var n2_dia_tipico_noite = $('textarea[name="addn2_dia_tipico_noite"]').val();
            $('textarea[name="addn2_dia_tipico_noite"]').val(n2_dia_tipico_noite.substr(0,limite));
            $(".addn2_dia_tipico_noite").text("0" + " " + informativo);
        }else{
            $(".addn2_dia_tipico_noite").text(caracteresRestantes + " " + informativo);
        }
    });

    //edit
  
    $(document).on('input','#editn1_comp_cri_casa',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var n1_comp_cri_casa = $('textarea[name="editn1_comp_cri_casa"]').val();
            $('textarea[name="editn1_comp_cri_casa"]').val(n1_comp_cri_casa.substr(0,limite));
            $(".editn1_comp_cri_casa").text("0" + " " + informativo);
        }else{
            $(".editn1_comp_cri_casa").text(caracteresRestantes + " " + informativo);
        }
    });
    
    $(document).on('input','#editn2_dia_tipico_manha',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var n2_dia_tipico_manha = $('textarea[name="editn2_dia_tipico_manha"]').val();
            $('textarea[name="editn2_dia_tipico_manha"]').val(n2_dia_tipico_manha.substr(0,limite));
            $(".editn2_dia_tipico_manha").text("0" + " " + informativo);
        }else{
            $(".editn2_dia_tipico_manha").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editn2_dia_tipico_tarde',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var n2_dia_tipico_tarde = $('textarea[name="editn2_dia_tipico_tarde"]').val();
            $('textarea[name="editn2_dia_tipico_tarde"]').val(n2_dia_tipico_tarde.substr(0,limite));
            $(".editn2_dia_tipico_tarde").text("0" + " " + informativo);
        }else{
            $(".editn2_dia_tipico_tarde").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editn2_dia_tipico_noite',function(){
        var limite = 400;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var n2_dia_tipico_noite = $('textarea[name="editn2_dia_tipico_noite"]').val();
            $('textarea[name="editn2_dia_tipico_noite"]').val(n2_dia_tipico_noite.substr(0,limite));
            $(".editn2_dia_tipico_noite").text("0" + " " + informativo);
        }else{
            $(".editn2_dia_tipico_noite").text(caracteresRestantes + " " + informativo);
        }
    });
    
$(document).on('click','.histdes_versaopais_compcasa',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_histdes_versaopais_compcasa = $("#histdes_versaopais_compcasa"+atendimentoid).data("id");

        if(opcao_form_histdes_versaopais_compcasa==0){
                $("#addpacienteid_histdesversaopaiscompcasa").val(pacienteid);
                $("#addatendimentoid_histdesversaopaiscompcasa").val(atendimentoid);
                $("#addform_histdesversaopaiscompcasa").trigger('reset');
                $("#AddHistDesVersaoPaisCompCasa").modal('show'); 
                $("#saveform_errList_histdesversaopaiscompcasa").replaceWith('<ul id="saveform_errList_histdesversaopaiscompcasa"></ul>');
        }else{            
                $("#editpacienteid_histdesversaopaiscompcasa").val(pacienteid);
                $("#editatendimentoid_histdesversaopaiscompcasa").val(atendimentoid);
                $("#editform_histdesversaopaiscompcasa").trigger('reset');
                $("#EditHistDesVersaoPaisCompCasa").modal('show'); 
                $("#updateform_errList_histdesversaopaiscompcasa").replaceWith('<ul id="updateform_errList_histdesversaopaiscompcasa"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_histdesversaopaiscompcasa/'+pacienteid,
                    success: function(response){           
                        if(response.status==200){                                                                                                        
                            $('.n1_comp_cri_casa').val(response.histdesversaopaiscompcasa.n1_comp_cri_casa);
                            $('.n2_dia_tipico_manha').val(response.histdesversaopaiscompcasa.n2_dia_tipico_manha);
                            $('.n2_dia_tipico_tarde').val(response.histdesversaopaiscompcasa.n2_dia_tipico_tarde);
                            $('.n2_dia_tipico_noite').val(response.histdesversaopaiscompcasa.n2_dia_tipico_noite);
                        }
                    }
                });
        }
    });


    $(document).on('click','.add_histdesversaopais_compcasa_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histdesversaopaiscompcasa").val();
        var atendimentoid = $("#addatendimentoid_histdesversaopaiscompcasa").val();

        var loading = $("#imgadd_histdesversaopaiscompcasa");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('n1_comp_cri_casa',$(".n1_comp_cri_casa").val());
        data.append('n2_dia_tipico_manha',$(".n2_dia_tipico_manha").val());
        data.append('n2_dia_tipico_tarde',$(".n2_dia_tipico_tarde").val());
        data.append('n2_dia_tipico_noite',$(".n2_dia_tipico_noite").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');

        $.ajax({
            url:'/ceteaadmin/terapia/store_histdesversaopaiscompcasa',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histdesversaopaiscompcasa").replaceWith('<ul id="saveform_errList_histdesversaopaiscompcasa"></ul>');
                    $("#saveform_errlist_histdesversaopaiscompcasa").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histdesversaopaiscompcasa").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histdesversaopaiscompcasa").replaceWith('<ul id="saveform_errList_histdesversaopaiscompcasa"></ul>');
                    $("#histdes_versaopais_compcasa"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_compcasa'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histdesversaopaiscompcasa").trigger('reset');
                    $("#AddHistDesVersaoPaisCompCasa").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_histdesversaopaiscompcasa_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histdesversaopaiscompcasa").val();
        var pacienteid = $("#editpacienteid_histdesversaopaiscompcasa").val();

        var loading = $("#imgedit_histdesversaopaiscompcasa");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('n1_comp_cri_casa',$("#editn1_comp_cri_casa").val());
        data.append('n2_dia_tipico_manha',$("#editn2_dia_tipico_manha").val());
        data.append('n2_dia_tipico_tarde',$("#editn2_dia_tipico_tarde").val());
        data.append('n2_dia_tipico_noite',$("#editn2_dia_tipico_noite").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_histdesversaopaiscompcasa/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histdesversaopaiscompcasa").replaceWith('<ul id="updateform_errList_histdesversaopaiscompcasa"></ul>');
                    $("#updateform_errlist_histdesversaopaiscompcasa").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histdesversaopaiscompcasa").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histdesversaopaiscompcasa").replaceWith('<ul id="updateform_errList_histdesversaopaiscompcasa"></ul>');
                    $("#histdes_versaopais_compcasa"+atendimentoid).replaceWith('<i data-id="1" id="histdes_versaopais_compcasa'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histdesversaopaiscompcasa").trigger('reset');
                    $("#EditHistDesVersaoPaisCompCasa").modal('hide');    
                }
            }
        });
    });

//fim histdes_versaopais_compcasa

//início histdes_rotalim

$("#AddHistDesRotAlim").on('shown.bs.modal',function(){
            $(".p1_dif_alimentares").focus();
    });

$("#EditHistDesRotAlim").on('shown.bs.modal',function(){
            $(".p1_dif_alimentares").focus();
    });

//inicio conta caracteres dos textarea HistDesRotAlim

    //add
  
    $(document).on('input','#addp4_apres_selet_alim',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p4_apres_selet_alim = $('textarea[name="addp4_apres_selet_alim"]').val();
            $('textarea[name="addp4_apres_selet_alim"]').val(p4_apres_selet_alim.substr(0,limite));
            $(".addp4_apres_selet_alim").text("0" + " " + informativo);
        }else{
            $(".addp4_apres_selet_alim").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addp5_preocupa_alim',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p5_preocupa_alim = $('textarea[name="addp5_preocupa_alim"]').val();
            $('textarea[name="addp5_preocupa_alim"]').val(p5_preocupa_alim.substr(0,limite));
            $(".addp5_preocupa_alim").text("0" + " " + informativo);
        }else{
            $(".addp5_preocupa_alim").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addp6_q_inf_esc_alim',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p6_q_inf_esc_alim = $('textarea[name="addp6_q_inf_esc_alim"]').val();
            $('textarea[name="addp6_q_inf_esc_alim"]').val(p6_q_inf_esc_alim.substr(0,limite));
            $(".addp6_q_inf_esc_alim").text("0" + " " + informativo);
        }else{
            $(".addp6_q_inf_esc_alim").text(caracteresRestantes + " " + informativo);
        }
    });
    
    $(document).on('input','#addp7_diatip_alim_cafe',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p7_diatip_alim_cafe = $('textarea[name="addp7_diatip_alim_cafe"]').val();
            $('textarea[name="addp7_diatip_alim_cafe"]').val(p7_diatip_alim_cafe.substr(0,limite));
            $(".addp7_diatip_alim_cafe").text("0" + " " + informativo);
        }else{
            $(".addp7_diatip_alim_cafe").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addp7_diatip_alim_almoco',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p7_diatip_alim_almoco = $('textarea[name="addp7_diatip_alim_almoco"]').val();
            $('textarea[name="addp7_diatip_alim_almoco"]').val(p7_diatip_alim_almoco.substr(0,limite));
            $(".addp7_diatip_alim_almoco").text("0" + " " + informativo);
        }else{
            $(".addp7_diatip_alim_almoco").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addp7_diatip_alim_lanche',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p7_diatip_alim_lanche = $('textarea[name="addp7_diatip_alim_lanche"]').val();
            $('textarea[name="addp7_diatip_alim_lanche"]').val(p7_diatip_alim_lanche.substr(0,limite));
            $(".addp7_diatip_alim_lanche").text("0" + " " + informativo);
        }else{
            $(".addp7_diatip_alim_lanche").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addp7_diatip_alim_jantar',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p7_diatip_alim_jantar = $('textarea[name="addp7_diatip_alim_jantar"]').val();
            $('textarea[name="addp7_diatip_alim_jantar"]').val(p7_diatip_alim_jantar.substr(0,limite));
            $(".addp7_diatip_alim_jantar").text("0" + " " + informativo);
        }else{
            $(".addp7_diatip_alim_jantar").text(caracteresRestantes + " " + informativo);
        }
    });

    //edit
  
    $(document).on('input','#editp4_apres_selet_alim',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p4_apres_selet_alim = $('textarea[name="editp4_apres_selet_alim"]').val();
            $('textarea[name="editp4_apres_selet_alim"]').val(p4_apres_selet_alim.substr(0,limite));
            $(".editp4_apres_selet_alim").text("0" + " " + informativo);
        }else{
            $(".editp4_apres_selet_alim").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editp5_preocupa_alim',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p5_preocupa_alim = $('textarea[name="editp5_preocupa_alim"]').val();
            $('textarea[name="editp5_preocupa_alim"]').val(p5_preocupa_alim.substr(0,limite));
            $(".editp5_preocupa_alim").text("0" + " " + informativo);
        }else{
            $(".editp5_preocupa_alim").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editp6_q_inf_esc_alim',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p6_q_inf_esc_alim = $('textarea[name="editp6_q_inf_esc_alim"]').val();
            $('textarea[name="editp6_q_inf_esc_alim"]').val(p6_q_inf_esc_alim.substr(0,limite));
            $(".editp6_q_inf_esc_alim").text("0" + " " + informativo);
        }else{
            $(".editp6_q_inf_esc_alim").text(caracteresRestantes + " " + informativo);
        }
    });
    
    $(document).on('input','#editp7_diatip_alim_cafe',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p7_diatip_alim_cafe = $('textarea[name="editp7_diatip_alim_cafe"]').val();
            $('textarea[name="editp7_diatip_alim_cafe"]').val(p7_diatip_alim_cafe.substr(0,limite));
            $(".editp7_diatip_alim_cafe").text("0" + " " + informativo);
        }else{
            $(".editp7_diatip_alim_cafe").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editp7_diatip_alim_almoco',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p7_diatip_alim_almoco = $('textarea[name="editp7_diatip_alim_almoco"]').val();
            $('textarea[name="editp7_diatip_alim_almoco"]').val(p7_diatip_alim_almoco.substr(0,limite));
            $(".editp7_diatip_alim_almoco").text("0" + " " + informativo);
        }else{
            $(".editp7_diatip_alim_almoco").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editp7_diatip_alim_lanche',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p7_diatip_alim_lanche = $('textarea[name="editp7_diatip_alim_lanche"]').val();
            $('textarea[name="editp7_diatip_alim_lanche"]').val(p7_diatip_alim_lanche.substr(0,limite));
            $(".editp7_diatip_alim_lanche").text("0" + " " + informativo);
        }else{
            $(".editp7_diatip_alim_lanche").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editp7_diatip_alim_jantar',function(){
        var limite = 200;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var p7_diatip_alim_jantar = $('textarea[name="editp7_diatip_alim_jantar"]').val();
            $('textarea[name="editp7_diatip_alim_jantar"]').val(p7_diatip_alim_jantar.substr(0,limite));
            $(".editp7_diatip_alim_jantar").text("0" + " " + informativo);
        }else{
            $(".editp7_diatip_alim_jantar").text(caracteresRestantes + " " + informativo);
        }
    });

$(document).on('click','.histdes_anexo1_rotalim',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_histdes_rotalim = $("#histdes_anexo1_rotalim"+atendimentoid).data("id");

        if(opcao_form_histdes_rotalim==0){
                $("#addpacienteid_histdesrotalim").val(pacienteid);
                $("#addatendimentoid_histdesrotalim").val(atendimentoid);
                $("#addform_histdesrotalim").trigger('reset');
                $("#AddHistDesRotAlim").modal('show'); 
                $("#saveform_errList_histdesrotalim").replaceWith('<ul id="saveform_errList_histdesrotalim"></ul>');
        }else{            
                $("#editpacienteid_histdesrotalim").val(pacienteid);
                $("#editatendimentoid_histdesrotalim").val(atendimentoid);
                $("#editform_histdesrotalim").trigger('reset');
                $("#EditHistDesRotAlim").modal('show'); 
                $("#updateform_errList_histdesrotalim").replaceWith('<ul id="updateform_errList_histdesrotalim"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_histdesrotalim/'+pacienteid,
                    success: function(response){           
                        if(response.status==200){                                                                                                        
                            $('.p1_dif_alimentares').attr('checked',response.histdesrotalim.p1_dif_alimentares);
                            $('.p2_dif_rec_alim_solidos').attr('checked',response.histdesrotalim.p2_dif_rec_alim_solidos);
                            $('.p3_dif_rec_alim_past').attr('checked',response.histdesrotalim.p3_dif_rec_alim_past);
                            $('.p4_apres_selet_alim').val(response.histdesrotalim.p4_apres_selet_alim);
                            $('.p5_preocupa_alim').val(response.histdesrotalim.p5_preocupa_alim);
                            $('.p6_q_inf_esc_alim').val(response.histdesrotalim.p6_q_inf_esc_alim);
                            $('.p7_diatip_alim_cafe').val(response.histdesrotalim.p7_diatip_alim_cafe);
                            $('.p7_diatip_alim_almoco').val(response.histdesrotalim.p7_diatip_alim_almoco);
                            $('.p7_diatip_alim_lanche').val(response.histdesrotalim.p7_diatip_alim_lanche);
                            $('.p7_diatip_alim_jantar').val(response.histdesrotalim.p7_diatip_alim_jantar);
                        }
                    }
                });
        }
    });


    $(document).on('click','.add_histdes_rotalim_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histdesrotalim").val();
        var atendimentoid = $("#addatendimentoid_histdesrotalim").val();

        var loading = $("#imgadd_histdesrotalim");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('p1_dif_alimentares',$(".p1_dif_alimentares").is(":checked")?'true':'false');
        data.append('p2_dif_rec_alim_solidos',$(".p2_dif_rec_alim_solidos").is(":checked")?'true':'false');
        data.append('p3_dif_rec_alim_past',$(".p3_dif_rec_alim_past").is(":checked")?'true':'false');
        data.append('p4_apres_selet_alim',$(".p4_apres_selet_alim").val());
        data.append('p5_preocupa_alim',$(".p5_preocupa_alim").val());
        data.append('p6_q_inf_esc_alim',$(".p6_q_inf_esc_alim").val());
        data.append('p7_diatip_alim_cafe',$(".p7_diatip_alim_cafe").val());
        data.append('p7_diatip_alim_almoco',$(".p7_diatip_alim_almoco").val());
        data.append('p7_diatip_alim_lanche',$(".p7_diatip_alim_lanche").val());
        data.append('p7_diatip_alim_jantar',$(".p7_diatip_alim_jantar").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');

        $.ajax({
            url:'/ceteaadmin/terapia/store_histdesrotalim',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histdesrotalim").replaceWith('<ul id="saveform_errList_histdesrotalim"></ul>');
                    $("#saveform_errlist_histdesrotalim").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histdesrotalim").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histdesrotalim").replaceWith('<ul id="saveform_errList_histdesrotalim"></ul>');
                    $("#histdes_anexo1_rotalim"+atendimentoid).replaceWith('<i data-id="1" id="histdes_anexo1_rotalim'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histdesrotalim").trigger('reset');
                    $("#AddHistDesRotAlim").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_histdesrotalim_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histdesrotalim").val();
        var pacienteid = $("#editpacienteid_histdesrotalim").val();

        var loading = $("#imgedit_histdesrotalim");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('p1_dif_alimentares',$("#editp1_dif_alimentares").is(":checked")?'true':'false');
        data.append('p2_dif_rec_alim_solidos',$("#editp2_dif_rec_alim_solidos").is(":checked")?'true':'false');
        data.append('p3_dif_rec_alim_past',$("#editp3_dif_rec_alim_past").is(":checked")?'true':'false');
        data.append('p4_apres_selet_alim',$("#editp4_apres_selet_alim").val());
        data.append('p5_preocupa_alim',$("#editp5_preocupa_alim").val());
        data.append('p6_q_inf_esc_alim',$("#editp6_q_inf_esc_alim").val());
        data.append('p7_diatip_alim_cafe',$("#editp7_diatip_alim_cafe").val());
        data.append('p7_diatip_alim_almoco',$("#editp7_diatip_alim_almoco").val());
        data.append('p7_diatip_alim_lanche',$("#editp7_diatip_alim_lanche").val());
        data.append('p7_diatip_alim_jantar',$("#editp7_diatip_alim_jantar").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_histdesrotalim/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histdesrotalim").replaceWith('<ul id="updateform_errList_histdesrotalim"></ul>');
                    $("#updateform_errlist_histdesrotalim").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histdesrotalim").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histdesrotalim").replaceWith('<ul id="updateform_errList_histdesrotalim"></ul>');
                    $("#histdes_anexo1_rotalim"+atendimentoid).replaceWith('<i data-id="1" id="histdes_anexo1_rotalim'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histdesrotalim").trigger('reset');
                    $("#EditHistDesRotAlim").modal('hide');    
                }
            }
        });
    });

//fim histdes_anexo1_rotalim

//início histdes_anexo2_histmedico

$("#AddHistDesHistMedico").on('shown.bs.modal',function(){
            $(".q1_proc_neuro").focus();
    });

$("#EditHistDesHistMedico").on('shown.bs.modal',function(){
            $(".q1_proc_neuro").focus();
    });

//inicio conta caracteres dos textarea HistDesHistMedico

    //add
  
    $(document).on('input','#addq1_diag_orient_enc',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q1_diag_orient_enc = $('textarea[name="addq1_diag_orient_enc"]').val();
            $('textarea[name="addq1_diag_orient_enc"]').val(q1_diag_orient_enc.substr(0,limite));
            $(".addq1_diag_orient_enc").text("0" + " " + informativo);
        }else{
            $(".addq1_diag_orient_enc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addq2_diag_orient_enc',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q2_diag_orient_enc = $('textarea[name="addq2_diag_orient_enc"]').val();
            $('textarea[name="addq2_diag_orient_enc"]').val(q2_diag_orient_enc.substr(0,limite));
            $(".addq2_diag_orient_enc").text("0" + " " + informativo);
        }else{
            $(".addq2_diag_orient_enc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addq3_diag_orient_enc',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q3_diag_orient_enc = $('textarea[name="addq3_diag_orient_enc"]').val();
            $('textarea[name="addq3_diag_orient_enc"]').val(q3_diag_orient_enc.substr(0,limite));
            $(".addq3_diag_orient_enc").text("0" + " " + informativo);
        }else{
            $(".addq3_diag_orient_enc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addq4_diag_orient_enc',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q4_diag_orient_enc = $('textarea[name="addq4_diag_orient_enc"]').val();
            $('textarea[name="addq4_diag_orient_enc"]').val(q4_diag_orient_enc.substr(0,limite));
            $(".addq4_diag_orient_enc").text("0" + " " + informativo);
        }else{
            $(".addq4_diag_orient_enc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addq5_diag_orient_enc',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q5_diag_orient_enc = $('textarea[name="addq5_diag_orient_enc"]').val();
            $('textarea[name="addq5_diag_orient_enc"]').val(q5_diag_orient_enc.substr(0,limite));
            $(".addq5_diag_orient_enc").text("0" + " " + informativo);
        }else{
            $(".addq5_diag_orient_enc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#addq6_relato_histmed_relev',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q6_relato_histmed_relev = $('textarea[name="addq6_relato_histmed_relev"]').val();
            $('textarea[name="addq6_relato_histmed_relev"]').val(q6_relato_histmed_relev.substr(0,limite));
            $(".addq6_relato_histmed_relev").text("0" + " " + informativo);
        }else{
            $(".addq6_relato_histmed_relev").text(caracteresRestantes + " " + informativo);
        }
    });

    //edit
  
    $(document).on('input','#editq1_diag_orient_enc',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q1_diag_orient_enc = $('textarea[name="editq1_diag_orient_enc"]').val();
            $('textarea[name="editq1_diag_orient_enc"]').val(q1_diag_orient_enc.substr(0,limite));
            $(".editq1_diag_orient_enc").text("0" + " " + informativo);
        }else{
            $(".editq1_diag_orient_enc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editq2_diag_orient_enc',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q2_diag_orient_enc = $('textarea[name="editq2_diag_orient_enc"]').val();
            $('textarea[name="editq2_diag_orient_enc"]').val(q2_diag_orient_enc.substr(0,limite));
            $(".editq2_diag_orient_enc").text("0" + " " + informativo);
        }else{
            $(".editq2_diag_orient_enc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editq3_diag_orient_enc',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q3_diag_orient_enc = $('textarea[name="editq3_diag_orient_enc"]').val();
            $('textarea[name="editq3_diag_orient_enc"]').val(q3_diag_orient_enc.substr(0,limite));
            $(".editq3_diag_orient_enc").text("0" + " " + informativo);
        }else{
            $(".editq3_diag_orient_enc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editq4_diag_orient_enc',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q4_diag_orient_enc = $('textarea[name="editq4_diag_orient_enc"]').val();
            $('textarea[name="editq4_diag_orient_enc"]').val(q4_diag_orient_enc.substr(0,limite));
            $(".editq4_diag_orient_enc").text("0" + " " + informativo);
        }else{
            $(".editq4_diag_orient_enc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editq5_diag_orient_enc',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q5_diag_orient_enc = $('textarea[name="editq5_diag_orient_enc"]').val();
            $('textarea[name="editq5_diag_orient_enc"]').val(q5_diag_orient_enc.substr(0,limite));
            $(".editq5_diag_orient_enc").text("0" + " " + informativo);
        }else{
            $(".editq5_diag_orient_enc").text(caracteresRestantes + " " + informativo);
        }
    });

    $(document).on('input','#editq6_relato_histmed_relev',function(){
        var limite = 600;
        var informativo = "caracteres restantes";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0){
            var q6_relato_histmed_relev = $('textarea[name="editq6_relato_histmed_relev"]').val();
            $('textarea[name="editq6_relato_histmed_relev"]').val(q6_relato_histmed_relev.substr(0,limite));
            $(".editq6_relato_histmed_relev").text("0" + " " + informativo);
        }else{
            $(".editq6_relato_histmed_relev").text(caracteresRestantes + " " + informativo);
        }
    });
    

$(document).on('click','.histdes_anexo2_histmedico',function(e){
        e.preventDefault();
        var pacienteid = $(this).data("pacienteid");
        var atendimentoid = $(this).data("atendimentoid");
        var opcao_form_histdes_histmedico = $("#histdes_anexo2_histmedico"+atendimentoid).data("id");

        if(opcao_form_histdes_histmedico==0){
                $("#addpacienteid_histdeshistmedico").val(pacienteid);
                $("#addatendimentoid_histdeshistmedico").val(atendimentoid);
                $("#addform_histdeshistmedico").trigger('reset');
                $("#AddHistDesHistMedico").modal('show'); 
                $("#saveform_errList_histdeshistmedico").replaceWith('<ul id="saveform_errList_histdeshistmedico"></ul>');
        }else{            
                $("#editpacienteid_histdeshistmedico").val(pacienteid);
                $("#editatendimentoid_histdeshistmedico").val(atendimentoid);
                $("#editform_histdeshistmedico").trigger('reset');
                $("#EditHistDesHistMedico").modal('show'); 
                $("#updateform_errList_histdeshistmedico").replaceWith('<ul id="updateform_errList_histdeshistmedico"></ul>');

                 $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
    
    
                $.ajax({ 
                    type: 'GET',             
                    dataType: 'json',                                    
                    url: '/ceteaadmin/terapia/edit_histdeshistmedico/'+pacienteid,
                    success: function(response){           
                        if(response.status==200){                                                                                                        
                            $('.q1_proc_neuro').attr('checked',response.histdeshistmedico.q1_proc_neuro);
                            var q1data = response.histdeshistmedico.q1_qualdata_aprox;
                            q1data = q1data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1');
                            if(q1data=="31/12/1969"){
                            q1data = "";
                            }                                       
                            $('.q1_qualdata_aprox').val(q1data);
                            $('.q1_diag_orient_enc').val(response.histdeshistmedico.q1_diag_orient_enc);
                            $('.q2_proc_psiq_inf').attr('checked',response.histdeshistmedico.q2_proc_psiq_inf);
                            var q2data = response.histdeshistmedico.q2_qualdata_aprox;
                            q2data = q2data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1');
                            if(q2data=="31/12/1969"){
                            q2data = "";
                            }                                       
                            $('.q2_qualdata_aprox').val(q2data);
                            $('.q2_diag_orient_enc').val(response.histdeshistmedico.q2_diag_orient_enc);
                            $('.q3_proc_fonoaudiol').attr('checked',response.histdeshistmedico.q3_proc_fonoaudiol);
                            var q3data = response.histdeshistmedico.q3_qualdata_aprox;
                            q3data = q3data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1');
                            if(q3data=="31/12/1969"){
                            q3data = "";
                            }                                       
                            $('.q3_qualdata_aprox').val(q3data);
                            $('.q3_diag_orient_enc').val(response.histdeshistmedico.q3_diag_orient_enc);
                            $('.q4_proc_neuropsico').attr('checked',response.histdeshistmedico.q4_proc_neuropsico);
                            var q4data = response.histdeshistmedico.q4_qualdata_aprox;
                            q4data = q4data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1');
                            if(q4data=="31/12/1969"){
                            q4data = "";
                            }                                       
                            $('.q4_qualdata_aprox').val(q4data);
                            $('.q4_diag_orient_enc').val(response.histdeshistmedico.q4_diag_orient_enc);
                            $('.q5_proc_psicologa').attr('checked',response.histdeshistmedico.q5_proc_psicologa);
                            var q5data = response.histdeshistmedico.q5_qualdata_aprox;
                            q5data = q5data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1');
                            if(q5data=="31/12/1969"){
                            q5data = "";
                            }                                       
                            $('.q5_qualdata_aprox').val(q5data);
                            $('.q5_diag_orient_enc').val(response.histdeshistmedico.q5_diag_orient_enc);

                            $('.q6_relato_histmed_relev').val(response.histdeshistmedico.q6_relato_histmed_relev);
                        }
                    }
                });
        }
    });


    $(document).on('click','.add_histdes_histmedico_btn',function(e){
        e.preventDefault();
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var pacienteid = $("#addpacienteid_histdeshistmedico").val();
        var atendimentoid = $("#addatendimentoid_histdeshistmedico").val();

        var loading = $("#imgadd_histdeshistmedico");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('q1_proc_neuro',$(".q1_proc_neuro").is(":checked")?'true':'false');
        data.append('q1_qualdata_aprox',formatDate($(".q1_qualdata_aprox").val()));
        data.append('q1_diag_orient_enc',$(".q1_diag_orient_enc").val());
        data.append('q2_proc_psiq_inf',$(".q2_proc_psiq_inf").is(":checked")?'true':'false');
        data.append('q2_qualdata_aprox',formatDate($(".q2_qualdata_aprox").val()));
        data.append('q2_diag_orient_enc',$(".q2_diag_orient_enc").val());
        data.append('q3_proc_fonoaudiol',$(".q3_proc_fonoaudiol").is(":checked")?'true':'false');
        data.append('q3_qualdata_aprox',formatDate($(".q3_qualdata_aprox").val()));
        data.append('q3_diag_orient_enc',$(".q3_diag_orient_enc").val());
        data.append('q4_proc_neuropsico',$(".q4_proc_neuropsico").is(":checked")?'true':'false');
        data.append('q4_qualdata_aprox',formatDate($(".q4_qualdata_aprox").val()));
        data.append('q4_diag_orient_enc',$(".q4_diag_orient_enc").val());
        data.append('q5_proc_psicologa',$(".q5_proc_psicologa").is(":checked")?'true':'false');
        data.append('q5_qualdata_aprox',formatDate($(".q5_qualdata_aprox").val()));
        data.append('q5_diag_orient_enc',$(".q5_diag_orient_enc").val());
        data.append('q6_relato_histmed_relev',$(".q6_relato_histmed_relev").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');

        $.ajax({
            url:'/ceteaadmin/terapia/store_histdeshistmedico',
            type: 'POST',
            dataType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#saveform_errlist_histdeshistmedico").replaceWith('<ul id="saveform_errList_histdeshistmedico"></ul>');
                    $("#saveform_errlist_histdeshistmedico").addClass("alert alert-danger");
                    $.each(response.errors,function(key,err_values){
                        $("#saveform_errlist_histdeshistmedico").append('<li>'+err_values+'</li>')
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#saveform_errlist_histdeshistmedico").replaceWith('<ul id="saveform_errList_histdeshistmedico"></ul>');
                    $("#histdes_anexo2_histmedico"+atendimentoid).replaceWith('<i data-id="1" id="histdes_anexo2_histmedico'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#addform_histdeshistmedico").trigger('reset');
                    $("#AddHistDesHistMedico").modal('hide');                     
                }
            }

        });

    });


    $(document).on('click','.update_histdeshistmedico_btn',function(e){
        var CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var atendimentoid = $("#editatendimentoid_histdeshistmedico").val();
        var pacienteid = $("#editpacienteid_histdeshistmedico").val();

        var loading = $("#imgedit_histdeshistmedico");
            loading.show();

        var data = new FormData();

        data.append('atendimento',atendimentoid);
        data.append('paciente',pacienteid);
        data.append('q1_proc_neuro',$("#editq1_proc_neuro").is(":checked")?'true':'false');
        data.append('q1_qualdata_aprox',formatDate($("#editq1_qualdata_aprox").val()));
        data.append('q1_diag_orient_enc',$("#editq1_diag_orient_enc").val());
        data.append('q2_proc_psiq_inf',$("#editq2_proc_psiq_inf").is(":checked")?'true':'false');
        data.append('q2_qualdata_aprox',formatDate($("#editq2_qualdata_aprox").val()));
        data.append('q2_diag_orient_enc',$("#editq2_diag_orient_enc").val());
        data.append('q3_proc_fonoaudiol',$("#editq3_proc_fonoaudiol").is(":checked")?'true':'false');
        data.append('q3_qualdata_aprox',formatDate($("#editq3_qualdata_aprox").val()));
        data.append('q3_diag_orient_enc',$("#editq3_diag_orient_enc").val());
        data.append('q4_proc_neuropsico',$("#editq4_proc_neuropsico").is(":checked")?'true':'false');
        data.append('q4_qualdata_aprox',formatDate($("#editq4_qualdata_aprox").val()));
        data.append('q4_diag_orient_enc',$("#editq4_diag_orient_enc").val());
        data.append('q5_proc_psicologa',$("#editq5_proc_psicologa").is(":checked")?'true':'false');
        data.append('q5_qualdata_aprox',formatDate($("#editq5_qualdata_aprox").val()));
        data.append('q5_diag_orient_enc',$("#editq5_diag_orient_enc").val());
        data.append('q6_relato_histmed_relev',$("#editq6_relato_histmed_relev").val());
        data.append('_token',CSRF_TOKEN);
        data.append('_method','PUT');   

        $.ajax({
            url:'/ceteaadmin/terapia/update_histdeshistmedico/'+pacienteid,
            type:'POST',
            contentType: 'json',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            async:true,
            success:function(response){
                if(response.status==400){
                    $("#updateform_errList_histdeshistmedico").replaceWith('<ul id="updateform_errList_histdeshistmedico"></ul>');
                    $("#updateform_errlist_histdeshistmedico").addClass('alert alert-danger');
                    $.each(response.errors,function(key,err_values){
                        $("#updateform_errlist_histdeshistmedico").append('<li>'+err_values+'</li>');
                    });
                    loading.hide();
                }else{
                    loading.hide();
                    $("#updateform_errlist_histdeshistmedico").replaceWith('<ul id="updateform_errList_histdeshistmedico"></ul>');
                    $("#histdes_anexo2_histmedico"+atendimentoid).replaceWith('<i data-id="1" id="histdes_anexo2_histmedico'+atendimentoid+'" class="fas fa-check" style="color: green"></i>');
                    $("#editform_histdeshistmedico").trigger('reset');
                    $("#EditHistDesHistMedico").modal('hide');    
                }
            }
        });
    });

//fim histdes_anexo2_histmedico


});

</script>

@stop


