<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quest_Paciente extends Model
{
    use HasFactory;
    protected $table = 'quest_paciente';
    protected $rimaryKey = 'id';
    protected $fillable = [
        'id',
        'paciente_id',
        'resposta_id',
        'pergunta_id',
        'questionario_id',
        'atendimento_id',
        'texto',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function paciente():BelongsTo{
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

    public function resposta():BelongsTo{
        return $this->belongsTo(Resposta::class,'resposta_id');
    }

    public function pergunta():BelongsTo{
        return $this->belongsTo(Pergunta::class,'pergunta_id');
    }

    public function questionario():BelongsTo{
        return $this->belongsTo(Questionario::class,'questionario_id');
    }

    public function atendimento():BelongsTo{
        return $this->belongsTo(Atendimento::class,'atendimento_id');
    }
}
