<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Funcao extends Model
{
    use HasFactory;
    protected $table = 'funcao';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'created_at',
        'updated_at',
    ];

    public function users():HasMany{
        return $this->hasMany(User::class,'id','funcao_id');
    }

}
