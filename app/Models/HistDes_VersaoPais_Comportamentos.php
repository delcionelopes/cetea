<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistDes_VersaoPais_Comportamentos extends Model
{
    use HasFactory;
    protected $table = 'histdes_versaopais_comportamentos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'j1_alinha_enfileira_objetos',
        'j1_obs',
        'j2_empilha_objetos',
        'j2_obs',
        'j3_abrefecha_gav_port',
        'j3_obs',
        'j4_apagaacende_luz',
        'j4_obs',
        'j5_inter_objetos_giram',
        'j5_obs',
        'j6_outras_manias',
        'j7_inter_objetos_giram_2',
        'j7_reacao_quando_interr',
        'j8_brinca_form_simbol_insist',
        'j8_obs',
        'j9_resiste_mud_rotina',
        'j9_obs',
        'j10_gosta_msm_ordem_horario',
        'j10_obs',
        'j11_ritual_ordem_determinada',
        'j11_obs',
        'j12_coisas_msm_lugar',
        'j12_obs',
        'j13_gstmsm_roupas_alim_lugar',
        'j13_obs',
        'j14_cm_reage_frustr_contr',
        'j15_chup_os_dedos',
        'j15_roe_unhas',
        'j15_estalar_dedos',
        'j15_morder_labios',
        'j15_mast_publico',
        'j15_torce_cabelo',
        'j15_balanc_corpo',
        'j15_bater_maos',
        'j15_flapping_maos',
        'j15_andar_ponta_pes',
        'j15_flex_ext_punhos',
        'j15_morde_pp_corpo',
        'j15_bater_a_cabeca',
        'j15_outros',
        'j16_sensivel_barulho',
        'j16_obs',
        'j17_tocarcheirarabracarinadpessobj',
        'j17_obs',
        'j18_par_nsentir_dor_frio',
        'j18_obs',
        'j19_fascinado_luzes',
        'j19_obs',
        'j20_sensivel_ao_toque',
        'j20_obs',
        'j21_texturas_incomodam',
        'j21_obs',
        'j22_reacao_text_alim',
        'j22_obs',
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
