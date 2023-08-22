<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistDes_Anexo2_HistMedico extends Model
{
    use HasFactory;
    protected $table = 'histdes_anexo2_histmedico';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'atendimento_id',
        'paciente_id',
        'q1_proc_neuro',
        'q1_qualdata_aprox',
        'q1_diag_orient_enc',
        'q2_proc_psiq_inf',
        'q2_qualdata_aprox',
        'q2_diag_orient_enc',
        'q3_proc_fonoaudiol',
        'q3_qualdata_aprox',
        'q3_diag_orient_enc',
        'q4_proc_neuropsico',
        'q4_qualdata_aprox',
        'q4_diag_orient_enc',
        'q5_proc_psicologa',
        'q5_qualdata_aprox',
        'q5_diag_orient_enc',
        'q6_relato_histmed_relev',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function paciente():BelongsTo{
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function atendimento():BelongsTo{
        return $this->belongsTo(Atendimento::class,'atendimento_id');
    }


}
