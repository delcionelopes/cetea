<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistDes_VersaoPais_CompCasa extends Model
{
    use HasFactory;
    protected $table = 'histdes_versaopais_compcasa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'n1_comp_cri_casa',
        'n2_dia_tipico_manha',
        'n2_dia_tipico_tarde',
        'n2_dia_tipico_noite',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function atendimento(){
        return $this->belongsTo(Atendimento::class,'atendimento_id');
    }


}
