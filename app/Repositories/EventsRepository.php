<?php

namespace App\Repositories;

use App\Models\Events;
use App\Repositories\BaseRepository;

/**
 * Class EventsRepository
 * @package App\Repositories
 * @version November 25, 2020, 12:08 pm UTC
*/

class EventsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
        'date_events',
        'longitude',
        'latitude',
        'address'
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
        return Events::class;
    }
}
