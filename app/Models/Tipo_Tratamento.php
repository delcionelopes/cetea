<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo_Tratamento extends Model
{
    use HasFactory;
    protected $table = 'tipo_tratamento';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nome',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function tratamento():HasMany{
        return $this->hasMany(Tratamento::class,'id','tipo_tratamento_id');
    }
}
