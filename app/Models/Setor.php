<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function users():HasMany{
        return $this->hasMany(User::class,'id','setor_id');
    }
    
}
