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

    public function medico_tratamento():BelongsToMany{
        return $this->belongsToMany(Tratamento::class,'medico_terapeuta_has_tratamento','medico_terapeuta_id','tratamento_id');
    }

    public function atendimento():HasMany{
        return $this->hasMany(Atendimento::class,'id','medico_terapeuta_id');
    }
}
