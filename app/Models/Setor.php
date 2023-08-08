<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;
    protected $table = 'setor';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'sigla',
        'nome',
        'created_at',
        'updated_at',
    ];

    public function users(){
        return $this->hasMany(User::class,'id','setor_id');
    }
    
}