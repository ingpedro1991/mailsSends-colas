<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserRegister
 * @package App\Models
 * @version April 27, 2021, 8:40 am UTC
 *
 * @property string $name
 * @property string $cedula
 * @property string $numero_celular
 * @property string $fecha_nacimiento
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property integer $rol_id
 * @property string $remember_token
 */
class UserRegister extends Model
{

    use HasFactory;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'name',
        'cedula',
        'numero_celular',
        'fecha_nacimiento',
        'email',
        'email_verified_at',
        'password',
        'rol_id',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'cedula' => 'string',
        'numero_celular' => 'string',
        'fecha_nacimiento' => 'date',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'rol_id' => 'integer',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:100',
        'cedula' => 'required|string|max:11',
        'numero_celular' => 'nullable|string|max:10',
        'fecha_nacimiento' => 'required',
        'email' => 'required|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'max:255',
        'rol_id' => 'integer',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
}
