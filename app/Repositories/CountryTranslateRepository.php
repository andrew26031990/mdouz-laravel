<?php

namespace App\Repositories;

use App\Models\CountryTranslate;
use App\Repositories\BaseRepository;

/**
 * Class CountryTranslateRepository
 * @package App\Repositories
 * @version November 17, 2020, 11:07 am UTC
*/

class CountryTranslateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lang_id',
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
        return CountryTranslate::class;
    }
}
