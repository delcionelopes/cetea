<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MChat extends Model
{
    use HasFactory;
    protected $table = 'mchat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'paciente_id',
        'atendimento_id',
        'created_at',
        'updated_at',
        'creater_user',
        'updated_user',
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function atendimento(){
        return $this->belongsTo(Atendimento::class,'atendimento_id');
    }

    public function mchat_itens(){
        return $this->belongsToMany(MChat_Itens::class,'mchat_has_mchat_itens','mchat_id','mchat_itens_id')->withPivot('cuidador_observador','cotacao','p_f');
    }


}
