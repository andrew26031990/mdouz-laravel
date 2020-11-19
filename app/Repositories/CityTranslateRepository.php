<?php

namespace App\Repositories;

use App\Models\CityTranslate;
use App\Repositories\BaseRepository;

/**
 * Class CityTranslateRepository
 * @package App\Repositories
 * @version November 18, 2020, 7:28 am UTC
*/

class CityTranslateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'region_id',
        'lang_id'
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
        return CityTranslate::class;
    }
}
