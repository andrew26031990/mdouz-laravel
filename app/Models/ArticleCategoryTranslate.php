<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ArticleCategoryTranslate
 * @package App\Models
 * @version November 25, 2020, 9:46 am UTC
 *
 * @property \App\Models\ArticleCategory $articleCategory
 * @property \App\Models\Lang $lang
 * @property integer $article_category_id
 * @property string $title
 * @property string $body
 * @property string $slug
 * @property integer $lang_id
 */
class ArticleCategoryTranslate extends Model
{

    public $table = 'article_category_translate';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;


    public $fillable = [
        'article_category_id',
        'title',
        'body',
        'slug',
        'lang_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'article_category_id' => 'integer',
        'title' => 'string',
        'body' => 'string',
        'slug' => 'string',
        'lang_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'article_category_id' => 'required|integer',
        'title' => 'required|string|max:512',
        'body' => 'nullable|string',
        'slug' => 'required|string|max:1024',
        'lang_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function articleCategory()
    {
        return $this->belongsTo(\App\Models\ArticleCategory::class, 'article_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lang()
    {
        return $this->belongsTo(\App\Models\Lang::class, 'lang_id');
    }
}
