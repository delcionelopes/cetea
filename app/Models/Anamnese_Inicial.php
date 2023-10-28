<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anamnese_Inicial extends Model
{
    use HasFactory;
    protected $table = 'anamnese_inicial';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'ii_composicao_familiar',
        'iii_queixa_motivo_encaminhamento',
        'iii_a_idade_constatado_problema',
        'iii_b_providencias_tomadas',
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
