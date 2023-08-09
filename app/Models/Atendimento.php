<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;
    protected $table = 'atendimento';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'tipo_atendimento_id',
        'medico_terapeuta_id',
        'tratamento_id',
        'paciente_id',
        'responsavel_do_paciente',
        'responsavel_parentesco',
        'data_agendamento',
        'data_atendimento',
        'data_retorno',
        'encaminhamento',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function tipo_atendimento(){
        return $this->belongsTo(Tipo_Atendimento::class,'tipo_atendimento_id');
    }

    public function medico_terapeuta(){
        return $this->belongsTo(Medico_Terapeuta::class,'medico_terapeuta_id');
    }

    public function tratamento(){
        return $this->belongsTo(Tratamento::class,'tratamento_id');
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function anamnese_incicial(){
        return $this->hasMany(Anamnese_Inicial::class,'id','atendimento_id');
    }

    public function anamnese_hist_pregressa(){
        return $this->hasMany(Anamnese_Hist_Pregressa::class,'id','atendimento_id');
    }

    public function anamnese_desenvolvimento(){
        return $this->hasMany(Anamnese_Desenvolvimento::class,'id','atendimento_id');
    }

    public function histdes_varsaopais_inicial(){
        return $this->hasMany(HistDes_VersaoPais_Inicial::class,'id','atendimento_id');
    }

    public function histdes_versaopais_linguagem(){
        return $this->hasMany(HistDes_VersaoPais_Linguagem::class,'id','atendimento_id');
    }

    public function histdes_versaopais_desenvsocial(){
        return $this->hasMany(HistDes_VersaoPais_DesenvSocial::class,'id','atendimento_id');
    }

    public function histdes_versaopais_brincadeiras(){
        return $this->hasMany(HistDes_VersaoPais_Brincadeiras::class,'id','atendimento_id');
    }

    public function histdes_versaopais_comportamentos(){
        return $this->hasMany(HistDes_VersaoPais_Comportamentos::class,'id','atendimento_id');
    }

    public function histdes_versaopais_independencia(){
        return $this->hasMany(HistDes_VersaoPais_Independencia::class,'id','atendimento_id');
    }

    public function histdes_versaopais_desenvmotor(){
        return $this->hasMany(HistDes_VersaoPais_DesenvMotor::class,'id','atendimento_id');
    }

    public function histdes_versaopais_histescolar(){
        return $this->hasMany(HistDes_VersaoPais_HistEscolar::class,'id','atendimento_id');
    }

    public function histdes_versaopais_compcasa(){
        return $this->hasMany(HistDes_VersaoPais_CompCasa::class,'id','atendimento_id');
    }

    public function histdes_anexo1_rotalim(){
        return $this->hasMany(HistDes_Anexo1_RotAlim::class,'id','atendimento_id');
    }

    public function histdes_anexo2_histmedico(){
        return $this->hasMany(HistDes_Anexo2_HistMedico::class,'id','atendimento_id');
    }

    public function histdes_anexo3_infosensoriais(){
        return $this->hasMany(HistDes_Anexo3_InfoSensoriais::class,'id','atendimento_id');
    }

    public function evolucao(){
        return $this->hasMany(Evolucao::class,'id','atendimento_id');
    }

    public function mchat(){
        return $this->hasMany(MChat::class,'id','atendimento_id');
    }


}
