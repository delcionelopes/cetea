<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;
    protected $table = 'resposta';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'pergunta_id',
        'tipo_resposta_id',
        'ordem',
        'score',
        'texto',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function pergunta(){
        return $this->belongsTo(Pergunta::class,'pergunta_id');
    }

    public function tipo_resposta(){
        return $this->belongsTo(Tipo_Resposta::class,'tipo_resposta_id');
    }
}
