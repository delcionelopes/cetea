<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MChat_Itens extends Model
{
    use HasFactory;
    protected $table = 'mchat_itens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'ordem_item',
        'questao',
        'created_at',
        'updated_at',
        'creater_user',
        'updater_user',
    ];

    public function mchat():BelongsToMany{
        return $this->belongsToMany(MChat::class,'mchat_has_mchat_itens','mchat_itens_id','mchat_id')->withPivot('cuidador_observador','cotacao','p_f');
    }

}
