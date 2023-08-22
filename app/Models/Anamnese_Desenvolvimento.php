<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anamnese_Desenvolvimento extends Model
{
    use HasFactory;
    protected $table = 'anamnese_desenvolvimento';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'a1_alimen_aleitamento_reacoes',
        'a2_problema_para_mastigar',
        'a3_habitos_alimentares',
        'b1_idade_sust_cabeca',
        'b2_qdo_sentou_sozinha',
        'b3_engatinhou_quando',
        'b4_quando_andou',
        'b4_anda_adequadamente',
        'b5_qdo_controlou_os_esfincteres',
        'b6_caiamuito_qdopequena',
        'c1_que_idade_se_deu_balbucio',
        'c2_qdo_falou_primpalavras',
        'c2_qdo_falou_primfrases',
        'c3_apres_prob_linguagem',
        'c4_apres_gagueira',
        'd1_calmo',
        'd1_sua_qd_dorme',
        'd1_sonambulismo',
        'd1_agitado',
        'd1_fala_dormindo',
        'd1_range_os_dentes',
        'd1_baba_qdo_dorme',
        'd2_a_que_h_cost_dormir_a_noite',
        'd3_dorme_durante_o_dia',
        'd4_tem_hab_dif_antes_dormir',
        'd5_dorme_cama_sep',
        'e1_usos_chupeta',
        'e1_ate_quando',
        'e2_chupou_dedo',
        'e2_ate_quando',
        'e3_roeu_unha',
        'e3_ate_quando',
        'e4_teveoutem_tiques',
        'e4_quais',
        'f1_relacionamento_familiar',
        'f2_com_quem_e_ondeficacrianca',
        'f3_tem_amigos',
        'f4_assiste_tv',
        'f5_gosta_de_musica',
        'f6_passeios_locais_freq',
        'f7_brincar',
        'h1_comportamento',
        'h2_higiene',
        'h3_banho',
        'h4_vestir_e_despir',
        'i1_nome_horario_serie',
        'i2_historico_escolar',
        'i3_queixa_principal_da_escola',
        'i4_gosta_da_professora',
        'i5_quem_ajuda_tar_casa',
        'i6_como_se_comporta_na_sala',
        'i7_oque_familia_pensa_da_escola',
        'i8_oque_familia_pensa_professora',
        'j1_outras_informacoes',
        'entrevistador',
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
