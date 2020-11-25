<?php

namespace App\Repositories;

use App\Models\KeyStorage;
use App\Repositories\BaseRepository;

/**
 * Class KeyStorageRepository
 * @package App\Repositories
 * @version November 25, 2020, 12:56 pm UTC
*/

class KeyStorageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'value',
        'comment'
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
        return KeyStorage::class;
    }
}
