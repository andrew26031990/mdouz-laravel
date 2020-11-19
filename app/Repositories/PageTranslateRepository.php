<?php

namespace App\Repositories;

use App\Models\PageTranslate;
use App\Repositories\BaseRepository;

/**
 * Class PageTranslateRepository
 * @package App\Repositories
 * @version November 19, 2020, 10:25 am UTC
*/

class PageTranslateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'page_id',
        'lang_id',
        'slug',
        'title',
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
        return PageTranslate::class;
    }
}
