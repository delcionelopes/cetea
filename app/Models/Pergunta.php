<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pergunta extends Model
{
    use HasFactory;
    protected $table = 'pergunta';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'questionario_id',
        'texto',
        'obs',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function questionario():BelongsTo{
        return $this->belongsTo(Questionario::class,'questionario_id');
    }
    
}
