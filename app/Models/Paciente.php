<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'paciente';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'cartao_sus',
        'cpf',
        'data_avaliacao',
        'nome',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'cep',
        'estado',
        'telefone',
        'data_nascimento',
        'sexo',
        'pai',
        'escolaridade_pai',
        'ocupacao_pai',
        'datanasc_pai',
        'mae',
        'escolaridade_mae',
        'ocupacao_mae',
        'datanasc_mae',
        'informante',
        'medicacao_atual',
        'medico_responsavel',
        'encaminhamentos',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function paciente_tratamento():BelongsToMany{
        return $this->belongsToMany(Tratamento::class,'paciente_has_tratamento','paciente_id','tratamento_id');
    }

    public function atendimento():HasMany{
        return $this->hasMany(Atendimento::class,'paciente_id');
    }

    public function quest_paciente():HasMany{
        return $this->hasMany(Quest_Paciente::class,'paciente_id');
    }

    public function anamnese_inicial():HasMany{
        return $this->hasMany(Anamnese_Inicial::class,'paciente_id');
    }

    public function anamnese_his_pregressa():HasMany{
        return $this->hasMany(Anamnese_Hist_Pregressa::class,'paciente_id');
    }

    public function anamnese_desenvolvimento():HasMany{
        return $this->hasMany(Anamnese_Desenvolvimento::class,'paciente_id');
    }

    public function histdes_versaopais_inicial():HasMany{
        return $this->hasMany(HistDes_VersaoPais_Inicial::class,'paciente_id');
    }

    public function histdes_versaopais_linguagem():HasMany{
        return $this->hasMany(HistDes_VersaoPais_Linguagem::class,'paciente_id');
    }

    public function histdes_versaopais_desenvsocial():HasMany{
        return $this->hasMany(HistDes_VersaoPais_DesenvSocial::class,'paciente_id');
    }

    public function histdes_versaopais_brincadeiras():HasMany{
        return $this->hasMany(HistDes_VersaoPais_Brincadeiras::class,'paciente_id');
    }

    public function histdes_versaopais_comportamentos():HasMany{
        return $this->hasMany(HistDes_VersaoPais_Comportamentos::class,'paciente_id');
    }

    public function histdes_versaopais_independencia():HasMany{
        return $this->hasMany(HistDes_VersaoPais_Independencia::class,'paciente_id');
    }

    public function histdes_versaopais_desenvmotor():HasMany{
        return $this->hasMany(HistDes_VersaoPais_DesenvMotor::class,'paciente_id');
    }

    public function histdes_versaopais_histescolar():HasMany{
        return $this->hasMany(HistDes_VersaoPais_HistEscolar::class,'paciente_id');
    }

    public function histdes_versaopais_compcasa():HasMany{
        return $this->hasMany(HistDes_VersaoPais_CompCasa::class,'paciente_id');
    }

    public function histdes_anexo1_rotalim():HasMany{
        return $this->hasMany(HistDes_Anexo1_RotAlim::class,'paciente_id');
    }

    public function histdes_anexo2_histmedico():HasMany{
        return $this->hasMany(HistDes_Anexo2_HistMedico::class,'paciente_id');
    }

    public function histdes_anexo3_infosensoriais():HasMany{
        return $this->hasMany(HistDes_Anexo3_InfoSensoriais::class,'paciente_id');
    }

    public function histdes_anexo3_r18_docs():HasMany{
        return $this->hasMany(HistDes_Anexo3_R18_Docs::class,'paciente_id');
    }

    public function evolucao():HasMany{
        return $this->hasMany(Evolucao::class,'paciente_id');
    }

    public function mchat():HasMany{
        return $this->hasMany(MChat::class,'paciente_id');
    }

    


}
