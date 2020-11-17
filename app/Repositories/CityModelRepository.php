<?php

namespace App\Repositories;

use App\Models\CityModel;
use App\Repositories\BaseRepository;

/**
 * Class CityModelRepository
 * @package App\Repositories
 * @version November 17, 2020, 5:10 am UTC
*/

class CityModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'region_id'
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
        return CityModel::class;
    }
}
