<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistDes_Anexo3_InfoSensoriais extends Model
{
    use HasFactory;
    protected $table = 'histdes_anexo3_infosensoriais';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'r1_reac_int_sons_amb',
        'r1_exemplos',
        'r2_cost_col_maos_ouv',
        'r2_exemplos',
        'r3_gt_bar_estranhos',
        'r3_exemplos',
        'r4_div_olh_det_vis_obj',
        'r4_exemplos',
        'r5_inc_luzes_obj_bril',
        'r5_exemplos',
        'r6_desc_com_asseios',
        'r6_exemplos',
        'r7_desc_com_sapatos',
        'r7_exemplos',
        'r8_desc_qdo_tocada',
        'r8_exemplos',
        'r9_tend_tocar_obj_pess',
        'r9_exemplos',
        'r10_apres_pc_rec_temp',
        'r10_exemplos',
        'r11_apres_pc_cons_perigo',
        'r11_exemplos',
        'r12_se_mov_man_rig',
        'r12_exemplos',
        'r13_parece_nter_forca',
        'r13_exemplos',
        'r14_tem_nausea_textura',
        'r14_exemplos',
        'r15_rej_sab_exclu_outros',
        'r15_exemplos',
        'r16_col_obj_na_boca',
        'r16_exemplos',
        'r17_parece_desatento',
        'r17_exemplos',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function atendimento(){
        return $this->belongsTo(Atendimento::class,'atendimento_id');
    }

}
