<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistDes_VersaoPais_DesenvSocial extends Model
{
    use HasFactory;
    protected $table = 'histdes_versaopais_desenvsocial';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'h1_idade_prim_sorrisos',
        'h2_olha_p_face_qdobrinca_c_ele',
        'h2_obs',
        'h3_sorriso_esp_pess_familiares',
        'h3_obs',
        'h4_sorriso_esp_pess_nfamiliares',
        'h4_obs',
        'h5_sorria_em_resp_sorriso',
        'h5_obs',
        'h6_vc_conseg_ident_exp_faciais_nfilho',
        'h6_obs',
        'h7_apres_expr_emo_contexto',
        'h7_obs',
        'h8_compartilha_interesses',
        'h8_obs',
        'h9_dem_preoc_cpais',
        'h9_obs',
        'h10_fazcoment_verbais_ou_gestos',
        'h10_obs',
        'h11_olha_p_ondevc_olhando',
        'h11_obs',
        'h12_olha_p_ondevc_aponta',
        'h12_obs',
        'h13_resp_conv_p_brincarcadultos',
        'h13_apos_insistencia',
        'h13_obs',
        'h14_resp_conv_p_brincarccriancas',
        'h14_apos_insistencia',
        'h14_obs',
        'h15_busca_comp_out_criancas',
        'h15_obs',
        'h16_cm_reag_a_criancasdesc_festa',
        'h16_fica_ansioso',
        'h17_perm_som_algtipo_brinc',
        'h17_obs',
        'h18_pref_brinc_par_nfc_vontemgr',
        'h18_obs',
        'h19_evita_ctt_c_pessoas',
        'h19_obs',
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
