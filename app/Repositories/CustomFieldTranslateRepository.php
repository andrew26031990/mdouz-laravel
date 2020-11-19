<?php

namespace App\Repositories;

use App\Models\CustomFieldTranslate;
use App\Repositories\BaseRepository;

/**
 * Class CustomFieldTranslateRepository
 * @package App\Repositories
 * @version November 19, 2020, 10:28 am UTC
*/

class CustomFieldTranslateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'custom_field_id',
        'lang_id',
        'text'
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
        return CustomFieldTranslate::class;
    }
}
