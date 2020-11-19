<?php

namespace App\Repositories;

use App\Models\CustomField;
use App\Repositories\BaseRepository;

/**
 * Class CustomFieldRepository
 * @package App\Repositories
 * @version November 19, 2020, 10:28 am UTC
*/

class CustomFieldRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'page_id',
        'name'
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
        return CustomField::class;
    }
}
