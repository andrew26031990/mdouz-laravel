<?php

namespace App\Repositories;

use App\Models\ArticleCategoryTranslate;
use App\Repositories\BaseRepository;

/**
 * Class ArticleCategoryTranslateRepository
 * @package App\Repositories
 * @version November 25, 2020, 9:46 am UTC
*/

class ArticleCategoryTranslateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'article_category_id',
        'title',
        'body',
        'slug',
        'lang_id'
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
        return ArticleCategoryTranslate::class;
    }
}
