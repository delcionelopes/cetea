<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo_Atendimento extends Model
{
    use HasFactory;
    protected $table = 'tipo_atendimento';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'vagas_limite',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function atendimentos():HasMany{
        return $this->hasMany(Atendimento::class,'tipo_atendimento_id');
    }

    
}
