<?php

namespace App\Repositories;

use App\Models\RegionTranslate;
use App\Repositories\BaseRepository;

/**
 * Class RegionTranslateRepository
 * @package App\Repositories
 * @version November 18, 2020, 5:46 am UTC
*/

class RegionTranslateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lang_id',
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
        return RegionTranslate::class;
    }
}
