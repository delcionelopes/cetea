<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medico_Terapeuta extends Model
{
    use HasFactory;
    protected $table = 'medico_terapeuta';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'crm_registro',
        'sigla_crm',
        'cpf',
        'nome',
        'especialidade',
        'celular',
        'telefone',
        'email',
        'site',
        'redesocial',
        'ativo',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function tratamentos():BelongsToMany{
        return $this->belongsToMany(Tratamento::class,'medico_terapeuta_has_tratamento','medico_terapeuta_id','tratamento_id');
    }

    public function atendimentos():HasMany{
        return $this->hasMany(Atendimento::class,'medico_terapeuta_id');
    }
}
