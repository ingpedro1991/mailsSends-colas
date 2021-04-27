<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserEmailsSend
 * @package App\Models
 * @version April 26, 2021, 1:08 pm UTC
 *
 * @property integer $user_id
 * @property integer $job_id
 * @property string $destinatario
 * @property string $asunto
 * @property string $mensaje
 * @property string $status
 */
class UserEmailsSend extends Model
{

    use HasFactory;

    public $table = 'users_emails_send';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'user_id',
        'job_id',
        'destinatario',
        'asunto',
        'mensaje',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'job_id' => 'integer',
        'destinatario' => 'string',
        'asunto' => 'string',
        'mensaje' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'integer',
        'job_id' => 'integer|nullable',
        'destinatario' => 'required|string|max:255',
        'asunto' => 'required|string|max:255',
        'mensaje' => 'required|string',
        'status' => 'string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
