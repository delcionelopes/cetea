<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function tratamento(){
        return $this->hasMany(Tratamento::class,'id','tipo_tratamento_id');
    }
}
