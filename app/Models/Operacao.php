<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'color',
        'created_at',
        'updated_at',
    ];

    public function modulos(){
        return $this->belongsToMany(Modulo::class,'modulo_has_operacao','operacao_id','modulo_id');
    }

    public function autorizacao(){
        return $this->belongsTo(Autorizacao::class,'id','operacao_id');
    }
}

