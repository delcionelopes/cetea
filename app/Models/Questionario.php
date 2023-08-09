<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionario extends Model
{
    use HasFactory;
    protected $table = 'questionario';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'tratamento_id',
        'nome',
        'descricao',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function tratamento(){
        return $this->belongsTo(Tratamento::class,'tratamento_id');
    }
    
}
