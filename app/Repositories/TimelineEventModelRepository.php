<?php

namespace App\Repositories;

use App\Models\TimelineEventModel;
use App\Repositories\BaseRepository;

/**
 * Class TimelineEventModelRepository
 * @package App\Repositories
 * @version November 16, 2020, 7:16 am UTC
*/

class TimelineEventModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'application',
        'category',
        'event',
        'data'
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
        return TimelineEventModel::class;
    }
}
