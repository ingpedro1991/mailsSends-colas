<?php

namespace App\Repositories;

use App\Models\UserRegister;
use App\Repositories\BaseRepository;

/**
 * Class UserRegisterRepository
 * @package App\Repositories
 * @version April 27, 2021, 8:40 am UTC
*/

class UserRegisterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserRegister::class;
    }
}
