<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function pergunta():BelongsTo{
        return $this->belongsTo(Pergunta::class,'pergunta_id');
    }

    public function tipo_resposta():BelongsTo{
        return $this->belongsTo(Tipo_Resposta::class,'tipo_resposta_id');
    }
}
