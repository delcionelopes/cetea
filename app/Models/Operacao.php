<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Operacao extends Model
{
    use HasFactory;
    protected $table = 'operacao';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'ico',        
        'created_at',
        'updated_at',
    ];

    public function modulos():BelongsToMany{
        return $this->belongsToMany(Modulo::class,'modulo_has_operacao','operacao_id','modulo_id');
    }

    public function autorizacao():BelongsTo{
        return $this->belongsTo(Autorizacao::class,'id','operacao_id');
    }
}

