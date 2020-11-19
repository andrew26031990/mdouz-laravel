<?php

namespace App\Repositories;

use App\Models\StaticPages;
use App\Repositories\BaseRepository;

/**
 * Class StaticPagesRepository
 * @package App\Repositories
 * @version November 18, 2020, 9:46 am UTC
*/

class StaticPagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'view',
        'status'
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
        return StaticPages::class;
    }
}
