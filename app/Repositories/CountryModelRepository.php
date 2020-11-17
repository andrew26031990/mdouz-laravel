<?php

namespace App\Repositories;

use App\Models\CountryModel;
use App\Repositories\BaseRepository;

/**
 * Class CountryModelRepository
 * @package App\Repositories
 * @version November 17, 2020, 5:11 am UTC
*/

class CountryModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return CountryModel::class;
    }
}
