<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistDes_Anexo3_R18_Docs extends Model
{
    use HasFactory;
    protected $table = 'histdes_anexo3_r18_docs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',        
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

    public function paciente():BelongsTo{
        return $this->belongsTo(Paciente::class,'paciente_id');
    }

}
