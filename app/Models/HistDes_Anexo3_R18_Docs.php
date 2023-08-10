<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistDes_Anexo3_R18_Docs extends Model
{
    use HasFactory;
    protected $table = 'histdes_anexo3_r18_docs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'histdes_anexo3_infosensoriais_id',
        'paciente_id',
        'nome',
        'nomearq',
        'path',
        'arquivo',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function histdes_anexo3_infosensoriais(){
        return $this->belongsTo(HistDes_Anexo3_InfoSensoriais::class,'histdes_anexo3_infosensoriais_id');
    }


}
