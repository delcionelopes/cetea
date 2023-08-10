<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistDes_VersaoPais_HistEscolar extends Model
{
    use HasFactory;
    protected $table = 'histdes_versaopais_histescolar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'm1_idade_ing_escola',
        'm1_obs',
        'm2_alg_eqescolar_mencomport',
        'm3_apres_hab_especial',
        'm4_ha_dif_aprendizagem',
        'm5_neces_med_escolar',
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
