<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistDes_VersaoPais_Inicial extends Model
{
    use HasFactory;
    protected $table = 'histdes_versaopais_inicial';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'responsavel_preench',
        'princ_queixas_comport_filho',
        'quem_tomaconta_crianca',
        'idade_primeiros_sinais_preocupacoes',
        'desenv_motor',
        'desenv_linguagem',
        'problemas_sono',
        'problemas_conduta',
        'tiques_esteotipias_manias',
        'probl_comport_social',
        'problemas_c_alimentacao',
        'brincar_incompativel_c_idade',
        'outras_preocupacoes',
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
