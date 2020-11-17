<?php

namespace App\Repositories;

use App\Models\UserModel;
use App\Repositories\BaseRepository;

/**
 * Class UserModelRepository
 * @package App\Repositories
 * @version November 16, 2020, 7:21 am UTC
*/

class UserModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username',
        'auth_key',
        'access_token',
        'password_hash',
        'oauth_client',
        'oauth_client_user_id',
        'email',
        'status',
        'logged_at'
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
        return UserModel::class;
    }
}
