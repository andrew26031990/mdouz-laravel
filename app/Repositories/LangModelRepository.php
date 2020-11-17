<?php

namespace App\Repositories;

use App\Models\LangModel;
use App\Repositories\BaseRepository;

/**
 * Class LangModelRepository
 * @package App\Repositories
 * @version November 17, 2020, 5:03 am UTC
*/

class LangModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'url',
        'local',
        'name',
        'default',
        'date_update',
        'date_create'
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
        return LangModel::class;
    }
}
