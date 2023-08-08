<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    public function modope(){
        return $this->belongsToMany(Operacao::class,'modulo_has_operacao','modulo_id','operacao_id');
    }

    public function autorizacao(){
        return $this->belongsTo(Autorizacao::class,'id','modulo_has_operacao_modulo_id');
    }
}
