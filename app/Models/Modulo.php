<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Modulo extends Model
{
    use HasFactory;
    protected $table = 'modulo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'ico',
        'color',
        'created_at',
        'updated_at',
    ];


    public function operacoes():BelongsToMany{
        return $this->belongsToMany(Operacao::class,'modulo_has_operacao','modulo_id','operacao_id');
    }

    public function autorizacao():BelongsTo{
        return $this->belongsTo(Autorizacao::class,'modulo_has_operacao_modulo_id');
    }
}
