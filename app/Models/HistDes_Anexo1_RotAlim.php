<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistDes_Anexo1_RotAlim extends Model
{
    use HasFactory;
    protected $table = 'histdes_anexo1_rotalim';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'p1_dif_alimentares',
        'p2_dif_rec_alim_solidos',
        'p3_dif_rec_alim_past',
        'p4_apres_selet_alim',
        'p5_preocupa_alim',
        'p6_q_inf_esc_alim',
        'p7_diatip_alim_cafe',
        'p7_diatip_alim_almoco',
        'p7_diatip_alim_lanche',
        'p7_diatip_alim_jantar',
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
