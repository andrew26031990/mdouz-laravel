<?php

namespace App\Repositories;

use App\Models\FooterMenu;
use App\Repositories\BaseRepository;

/**
 * Class FooterMenuRepository
 * @package App\Repositories
 * @version December 17, 2020, 6:18 am UTC
*/

class FooterMenuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'key',
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
        return FooterMenu::class;
    }
}
