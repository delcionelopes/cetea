<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tratamento extends Model
{
    use HasFactory;
    protected $table = 'tratamento';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'tipo_tratamento_id',
        'nome',
        'descricao',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function tipo_tratamento():BelongsTo{
        return $this->belongsTo(Tipo_Tratamento::class,'tipo_tratamento_id');
    }

    public function questionario():HasMany{
        return $this->hasMany(Questionario::class,'id','tratamento_id');
    }
}
