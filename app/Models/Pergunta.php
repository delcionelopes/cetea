<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;
    protected $table = 'pergunta';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'questionario_id',
        'texto',
        'obs',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function questionario(){
        return $this->belongsTo(Questionario::class,'questionario_id');
    }
    
}
