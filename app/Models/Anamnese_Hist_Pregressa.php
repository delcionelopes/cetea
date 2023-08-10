<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anamnese_Hist_Pregressa extends Model
{
    use HasFactory;
    protected $table = 'anamnese_hist_pregressa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'gestacao_planejada',
        'detalhe_gestacao',
        'parto_nascimento',
        'periodo_neonatal',
        'tratamentos_anteriores',
        'internacoes',
        'vacinas',
        'antecedentes_alergicos',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function atendimento(){
        return $this->BelongsTo(Atendimento::class,'atendimento_id');
    }

}
