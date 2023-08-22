<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistDes_VersaoPais_Linguagem extends Model
{
    use HasFactory;
    protected $table = 'histdes_versaopais_linguagem';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'e1_idade_prim_vocalizacoes',
        'e1_naoapresentou',
        'e1_quais',
        'e2_idade_prim_palavras',
        'e2_naoapresentou',
        'e2_quais',
        'e3_idade_prim_frases',
        'e3_naoapresentou',
        'e3_quais',
        'f_considera_que_ha_alg_atraso',
        'g1_aponta_para_pedir_algo',
        'g2_aponta_para_compartilhar',
        'g3_sim_assentindo_c_cabeca',
        'g4_mandar_beijos',
        'g5_da_tchau',
        'g6_nega_c_cabeca',
        'g7_bate_palmas',
        'g8_eleva_bracos_pedcolo',
        'g9_sacode_indicador_pdizer_nao',
        'g10_puxvcpela_mao_paraabpg_coisas',
        'g11_vcjapensou_qseufilho_surdo',
        'g12_imita_gracinhas',
        'g13_seg_seurosto_polhar_palgdirecao',
        'g14_atend_champnome',
        'g14_somente_c_insistencia',
        'g15_pessestranhas_compseufilho_fala',
        'g16_seufilho_costrepeultpal_ouvida',
        'g16_as_vezes',
        'g17_fala_baixa',
        'g17_fala_monotona',
        'g17_fala_alta',
        'g18_cost_rep_frases_ouvidas',
        'g18_as_vezes',
        'g19_comb_palaforma_estranha',
        'g19_as_vezes',
        'g20_cost_insis_pvc_dizer_palavras',
        'g20_as_vezes',
        'g21_cost_comen_inapropriado',
        'g21_as_vezes',
        'g21_de_exemplos',
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
