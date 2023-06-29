<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    use HasFactory;
    protected $table = 'arquivos';
    protected $fillable = [
        'artigos_id',
        'users_id',
        'rotulo',
        'nome',
        'path',
    ];
    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }
    public function artigo(){
        return $this->belongsTo(Artigo::class,'artigos_id');
    }

}
