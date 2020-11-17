<?php

namespace App\Repositories;

use App\Models\RegionModel;
use App\Repositories\BaseRepository;

/**
 * Class RegionModelRepository
 * @package App\Repositories
 * @version November 17, 2020, 5:10 am UTC
*/

class RegionModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id'
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
        return RegionModel::class;
    }
}
