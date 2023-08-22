<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistDes_VersaoPais_DesenvMotor extends Model
{
    use HasFactory;
    protected $table = 'histdes_versaopais_desenvmotor';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'l1_sust_cabeca',
        'l2_sent_s_apoio',
        'l3_andou',
        'l4_descproc_desfralde',
        'l5_hv_perdcontrol_esfinc',
        'l6_rab_em_papel',
        'l6_obs',
        'i6_cm_seg_lapis',
        'l7_cam_ponta_pes',
        'l7_obs',
        'l8_apres_deseq',
        'l8_obs',
        'l9_dif_para_correr',
        'l9_obs',
        'l10_dif_para_escalar',
        'l10_obs',
        'l11_chuta_bola',
        'l11_obs',
        'l12_sb_esc_sajuda',
        'l12_obs',
        'l13_sb_esc_altpes',
        'l13_obs',
        'l14_sb_pedalar',
        'l14_obs',
        'l15_dif_man_obj_cdedos',
        'l15_obs',
        'l16_senta_em_w',
        'l16_obs',
        'l17_seg_mamadeira',
        'l17_obs',
        'l18_amarra_cadarco',
        'l18_obs',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function paciente():BelongsTo{
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function atendimento():BelongsTo{
        return $this->belongsTo(Atendimento::class,'atendimento_id');
    }


}
