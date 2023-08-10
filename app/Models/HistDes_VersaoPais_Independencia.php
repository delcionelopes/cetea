<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistDes_VersaoPais_Independencia extends Model
{
    use HasFactory;
    protected $table = 'histdes_versaopais_independencia';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'j1_veste_roupa_soz',
        'j1_parcial',
        'j1_obs',
        'j2_retira_roupa_soz',
        'j2_parcial',
        'j2_obs',
        'j3_toma_banho_soz',
        'j3_parcial',
        'j3_obs',
        'j4_jg_lenc_pp_no_lix',
        'j4_obs',
        'j6_come_ref_na_mesa',
        'j6_obs',
        'j7_usa_colher_ind',
        'j7_obs',
        'j8_usa_garfo_ind',
        'j8_obs',
        'j9_tol_nov_alim',
        'j9_obs',
        'j10_usacopo_aberto',
        'j10_obs',
        'j11_perm_parc_mesa',
        'j11_obs',
        'j12_desp_roup_ind',
        'j12_obs',
        'j13_limpa_nariz',
        'j13_obs',
        'j14_usa_garf_cpab_sderr',
        'j14_obs',
        'j15_abrefecha_moch_lanch_aut',
        'j15_obs',
        'j16_usa_banh_aut',
        'j16_obs',
        'j17_tp_boca_qdtoss_esp',
        'j17_obs',
        'j18_ajuda_escovacao',
        'j18_obs',
        'j19_de_detalhes_aut',
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
