<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [        
        'funcao_id',
        'setor_id',
        'perfil_id',
        'name',
        'email',
        'password_2',
        'inativo',
        'cpf',
        'rg',
        'matricula',
        'admin',
        'sistema',
        'avatar',
        'link_instagram',
        'link_facebook',
        'link_site',
        'created_at',
        'updated_at',

    ];

    public function artigos(){
        return $this->hasMany(Artigo::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public function arquivos(){
        return $this->hasMany(Arquivo::class);
    }

    public function funcao(){
        return $this->belongsTo(Funcao::class,'funcao_id');
    }

    public function perfil(){
        return $this->belongsTo(Perfil::class,'perfil_id');
    }

    public function setor(){
        return $this->belongsTo(Setor::class,'setor_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
