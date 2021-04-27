<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cedula',
        'numero_celular',
        'fecha_nacimiento',
        'email',
        'password',
        'rol_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'cedula' => 'string',
        'numero_celular' => 'string',
        'fecha_nacimiento' => 'datetime:Y-m-d',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'rol_id' => 'integer'
    ];

    public function rol()
    {
        return $this->belongsTo(\App\Models\Role::class, 'rol_id');
    }
    public function emails()
    {
        return $this->hasMany(\App\Models\UserEmailsSend::class, 'user_id');
    }
}

