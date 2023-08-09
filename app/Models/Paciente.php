<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function paciente_tratamento(){
        return $this->belongsToMany(Tratamento::class,'paciente_has_tratamento','paciente_id','tratamento_id');
    }

    public function atendimento(){
        return $this->hasMany(Atendimento::class,'id','paciente_id');
    }

    public function quest_paciente(){
        return $this->hasMany(Quest_Paciente::class,'id','paciente_id');
    }

    public function anamnese_inicial(){
        return $this->hasMany(Anamnese_Inicial::class,'id','paciente_id');
    }

    public function anamnese_his_pregressa(){
        return $this->hasMany(Anamnese_Hist_Pregressa::class,'id','paciente_id');
    }

    public function anamnese_desenvolvimento(){
        return $this->hasMany(Anamnese_Desenvolvimento::class,'id','paciente_id');
    }

    public function histdes_versaopais_inicial(){
        return $this->hasMany(HistDes_VersaoPais_Inicial::class,'id','paciente_id');
    }

    public function histdes_versaopais_linguagem(){
        return $this->hasMany(HistDes_VersaoPais_Linguagem::class,'id','paciente_id');
    }

    public function histdes_versaopais_desenvsocial(){
        return $this->hasMany(HistDes_VersaoPais_DesenvSocial::class,'id','paciente_id');
    }

    public function histdes_versaopais_brincadeiras(){
        return $this->hasMany(HistDes_VersaoPais_Brincadeiras::class,'id','paciente_id');
    }

    public function histdes_versaopais_comportamentos(){
        return $this->hasMany(HistDes_VersaoPais_Comportamentos::class,'id','paciente_id');
    }

    public function histdes_versaopais_independencia(){
        return $this->hasMany(HistDes_VersaoPais_Independencia::class,'id','paciente_id');
    }

    public function histdes_versaopais_desenvmotor(){
        return $this->hasMany(HistDes_VersaoPais_DesenvMotor::class,'id','paciente_id');
    }

    public function histdes_versaopais_histescolar(){
        return $this->hasMany(HistDes_VersaoPais_HistEscolar::class,'id','paciente_id');
    }

    public function histdes_versaopais_compcasa(){
        return $this->hasMany(HistDes_VersaoPais_CompCasa::class,'id','paciente_id');
    }

    public function histdes_anexo1_rotalim(){
        return $this->hasMany(HistDes_Anexo1_RotAlim::class,'id','paciente_id');
    }

    public function histdes_anexo2_histmedico(){
        return $this->hasMany(HistDes_Anexo2_HistMedico::class,'id','paciente_id');
    }

    public function histdes_anexo3_infosensoriais(){
        return $this->hasMany(HistDes_Anexo3_InfoSensoriais::class,'id','paciente_id');
    }

    public function histdes_anexo3_r18_docs(){
        return $this->hasMany(HistDes_Anexo3_R18_Docs::class,'id','paciente_id');
    }

    public function evolucao(){
        return $this->hasMany(Evolucao::class,'id','paciente_id');
    }

    public function mchat(){
        return $this->hasMany(MChat::class,'id','paciente_id');
    }

    


}
