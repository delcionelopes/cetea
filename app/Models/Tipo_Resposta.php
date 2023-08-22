<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo_Resposta extends Model
{
    use HasFactory;
    protected $table = 'tipo_resposta';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nome',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
        ];
    
    public function resposta():HasMany{
        return $this->hasMany(Resposta::class,'id','tipo_resposta_id');
    }
}
