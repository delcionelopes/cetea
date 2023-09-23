<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArquivosPaciente extends Model
{
    use HasFactory;
    protected $table = 'arquivos_paciente';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'paciente_id',
        'rotulo',
        'nome',
        'path',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function paciente():BelongsTo{
        return $this->belongsTo(Paciente::class,'paciente_id');
    }    

}
