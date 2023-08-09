<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento_Docs extends Model
{
    use HasFactory;
    protected $table = 'atendimento_docs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'nome',
        'nomearq',
        'path',
        'arquivo',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function atendimento(){
        return $this->belongsTo(Atendimento::class,'atendimento_id');
    }
}
