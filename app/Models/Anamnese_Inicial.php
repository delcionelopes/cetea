<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anamnese_Inicial extends Model
{
    use HasFactory;
    protected $table = 'anamnese_inicial';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'II_composicao_familiar',
        'III_queixa_motivo_encaminhamento',
        'III_A_idade_constatado_problema',
        'III_B_providencias_tomadas',
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
