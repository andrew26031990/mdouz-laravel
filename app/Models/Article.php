<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Article
 * @package App\Models
 * @version November 30, 2020, 5:01 am UTC
 *
 * @property \App\Models\User $createdBy
 * @property \App\Models\ArticleCategory $category
 * @property \App\Models\User $updatedBy
 * @property \Illuminate\Database\Eloquent\Collection $articleAttachments
 * @property \Illuminate\Database\Eloquent\Collection $articleTranslates
 * @property string $view
 * @property integer $category_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property integer $status
 * @property boolean $on_main
 * @property integer $on_home
 * @property integer $menu
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $published_at
 * @property string $url
 */
class Article extends Model
{

    use HasFactory;

    public $table = 'article';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;


    public $fillable = [
        'view',
        'category_id',
        'thumbnail_base_url',
        'thumbnail_path',
        'status',
        'on_main',
        'on_home',
        'menu',
        'created_by',
        'updated_by',
        'published_at',
        'url',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'view' => 'string',
        'category_id' => 'integer',
        'thumbnail_base_url' => 'string',
        'thumbnail_path' => 'string',
        'status' => 'integer',
        'on_main' => 'boolean',
        'on_home' => 'integer',
        'menu' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'published_at' => 'integer',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'view' => 'nullable|string|max:255',
        'category_id' => 'nullable|integer',
        'thumbnail_base_url' => 'nullable|string|max:1024',
        'thumbnail_path' => 'nullable|string|max:1024',
        'status' => 'required',
        'on_main' => 'required|boolean',
        'on_home' => 'required',
        'menu' => 'required',
        'created_by' => 'nullable|integer',
        'updated_by' => 'nullable|integer',
        'published_at' => 'nullable',
        'created_at' => 'nullable|integer',
        'updated_at' => 'nullable|integer',
        'url' => 'nullable|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function createdBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\ArticleCategory::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function updatedBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'updated_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function articleAttachments()
    {
        return $this->hasMany(\App\Models\ArticleAttachment::class, 'article_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function articleTranslates()
    {
        return $this->hasMany(\App\Models\ArticleTranslate::class, 'article_id');
    }
}
