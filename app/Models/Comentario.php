<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'comentarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'artigos_id',
        'users_id',
        'texto',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }

    public function artigo(){
        return $this->belongsTo(Artigo::class,'artigos_id');
    }
    
}