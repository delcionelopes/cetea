<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function tipo_atendimento():BelongsTo{
        return $this->belongsTo(Tipo_Atendimento::class,'tipo_atendimento_id');
    }

    public function medico_terapeuta():BelongsTo{
        return $this->belongsTo(Medico_Terapeuta::class,'medico_terapeuta_id');
    }

    public function tratamento():BelongsTo{
        return $this->belongsTo(Tratamento::class,'tratamento_id');
    }

    public function paciente():BelongsTo{
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function anamnese_incicial():HasMany{
        return $this->hasMany(Anamnese_Inicial::class,'id','atendimento_id');
    }

    public function anamnese_hist_pregressa():HasMany{
        return $this->hasMany(Anamnese_Hist_Pregressa::class,'id','atendimento_id');
    }

    public function anamnese_desenvolvimento():HasMany{
        return $this->hasMany(Anamnese_Desenvolvimento::class,'id','atendimento_id');
    }

    public function histdes_varsaopais_inicial():HasMany{
        return $this->hasMany(HistDes_VersaoPais_Inicial::class,'id','atendimento_id');
    }

    public function histdes_versaopais_linguagem():HasMany{
        return $this->hasMany(HistDes_VersaoPais_Linguagem::class,'id','atendimento_id');
    }

    public function histdes_versaopais_desenvsocial():HasMany{
        return $this->hasMany(HistDes_VersaoPais_DesenvSocial::class,'id','atendimento_id');
    }

    public function histdes_versaopais_brincadeiras():HasMany{
        return $this->hasMany(HistDes_VersaoPais_Brincadeiras::class,'id','atendimento_id');
    }

    public function histdes_versaopais_comportamentos():HasMany{
        return $this->hasMany(HistDes_VersaoPais_Comportamentos::class,'id','atendimento_id');
    }

    public function histdes_versaopais_independencia():HasMany{
        return $this->hasMany(HistDes_VersaoPais_Independencia::class,'id','atendimento_id');
    }

    public function histdes_versaopais_desenvmotor():HasMany{
        return $this->hasMany(HistDes_VersaoPais_DesenvMotor::class,'id','atendimento_id');
    }

    public function histdes_versaopais_histescolar():HasMany{
        return $this->hasMany(HistDes_VersaoPais_HistEscolar::class,'id','atendimento_id');
    }

    public function histdes_versaopais_compcasa():HasMany{
        return $this->hasMany(HistDes_VersaoPais_CompCasa::class,'id','atendimento_id');
    }

    public function histdes_anexo1_rotalim():HasMany{
        return $this->hasMany(HistDes_Anexo1_RotAlim::class,'id','atendimento_id');
    }

    public function histdes_anexo2_histmedico():HasMany{
        return $this->hasMany(HistDes_Anexo2_HistMedico::class,'id','atendimento_id');
    }

    public function histdes_anexo3_infosensoriais():HasMany{
        return $this->hasMany(HistDes_Anexo3_InfoSensoriais::class,'id','atendimento_id');
    }

    public function evolucao():HasMany{
        return $this->hasMany(Evolucao::class,'id','atendimento_id');
    }

    public function mchat():HasMany{
        return $this->hasMany(MChat::class,'id','atendimento_id');
    }


}
