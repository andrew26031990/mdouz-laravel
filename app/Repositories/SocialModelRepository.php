<?php

namespace App\Repositories;

use App\Models\SocialModel;
use App\Repositories\BaseRepository;

/**
 * Class SocialModelRepository
 * @package App\Repositories
 * @version November 17, 2020, 5:06 am UTC
*/

class SocialModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'link',
        'icon',
        'sort'
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
        return SocialModel::class;
    }
}
