<?php

namespace App\Repositories;

use App\Models\ArticleCategory;
use App\Repositories\BaseRepository;

/**
 * Class ArticleCategoryRepository
 * @package App\Repositories
 * @version November 25, 2020, 6:28 am UTC
*/

class ArticleCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'parent_id',
        'status',
        'menu'
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
        return ArticleCategory::class;
    }
}
