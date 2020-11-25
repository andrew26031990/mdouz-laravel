<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ArticleCategory
 * @package App\Models
 * @version November 25, 2020, 6:28 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $articles
 * @property \Illuminate\Database\Eloquent\Collection $articleCategoryTranslates
 * @property \Illuminate\Database\Eloquent\Collection $events
 * @property \Illuminate\Database\Eloquent\Collection $videos
 * @property integer $parent_id
 * @property integer $status
 * @property integer $menu
 */
class ArticleCategory extends Model
{

    public $table = 'article_category';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;


    public $fillable = [
        'parent_id',
        'status',
        'menu',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'status' => 'integer',
        'menu' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parent_id' => 'nullable|integer',
        //'status' => 'required',
        //'menu' => 'required',
        'created_at' => 'nullable|integer',
        'updated_at' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function articles()
    {
        return $this->hasMany(\App\Models\Article::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function articleCategoryTranslates()
    {
        return $this->hasMany(\App\Models\ArticleCategoryTranslate::class, 'article_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function events()
    {
        return $this->hasMany(\App\Models\Event::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function videos()
    {
        return $this->hasMany(\App\Models\Video::class, 'category_id');
    }
}
