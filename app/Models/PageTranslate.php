<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class PageTranslate
 * @package App\Models
 * @version November 19, 2020, 10:25 am UTC
 *
 * @property \App\Models\Page $page
 * @property \App\Models\Lang $lang
 * @property integer $page_id
 * @property integer $lang_id
 * @property string $slug
 * @property string $title
 * @property string $text
 */
class PageTranslate extends Model
{

    public $table = 'page_translate';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;


    public $fillable = [
        'page_id',
        'lang_id',
        'slug',
        'title',
        'text'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'page_id' => 'integer',
        'lang_id' => 'integer',
        'slug' => 'string',
        'title' => 'string',
        'text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'page_id' => 'required|integer',
        'lang_id' => 'required|integer',
        'slug' => 'required|string|max:2048',
        'title' => 'required|string|max:512',
        'text' => 'nullable|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function page()
    {
        return $this->belongsTo(\App\Models\Page::class, 'page_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lang()
    {
        return $this->belongsTo(\App\Models\Lang::class, 'lang_id');
    }
}
