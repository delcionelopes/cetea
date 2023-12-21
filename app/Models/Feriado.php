<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feriado extends Model
{
    use HasFactory;
    protected $table = 'feriados';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'dia',
        'mes',
        'descricao',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];
}
