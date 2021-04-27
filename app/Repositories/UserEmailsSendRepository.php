<?php

namespace App\Repositories;

use App\Models\UserEmailsSend;
use App\Repositories\BaseRepository;

/**
 * Class UserEmailsSendRepository
 * @package App\Repositories
 * @version April 26, 2021, 1:08 pm UTC
*/

class UserEmailsSendRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'job_id',
        'destinatario',
        'asunto',
        'mensaje',
        'status'
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
        return UserEmailsSend::class;
    }
}
