<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistDes_VersaoPais_Brincadeiras extends Model
{
    use HasFactory;
    protected $table = 'histdes_versaopais_brincadeiras';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'i1_brincadeira_favorita',
        'i2_brinquedos_favoritos',
        'i3_vc_o_considera_obcecado',
        'i3_ele_ja_foi_obcecado_por_algo',
        'i4_tem_inter_p_cheiro_textura',
        'i4_obs',
        'i5_brinca_de_form_repet',
        'i5_obs',
        'i6_brinca_de_form_func',
        'i6_obs',
        'i7_brinca_de_form_simb_mini',
        'i7_obs',
        'i8_brinca_de_form_simb_objetos',
        'i8_obs',
        'i9_brinca_de_form_simb_atrpapeis',
        'i9_obs',
        'i10_segue_regras_de_brincadeiras',
        'i10_obs',
        'i11_bom_fazer_amizades',
        'i11_obs',
        'i12_e_solitario',
        'i12_obs',
        'i13_e_timido',
        'i13_obs',
        'i14_tem_melhor_amigo',
        'i14_obs',
        'i15_prefer_criancas_mesma_idade',
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
