<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class LangModel
 * @package App\Models
 * @version November 17, 2020, 5:03 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $articleCategoryTranslates
 * @property \Illuminate\Database\Eloquent\Collection $articleTranslates
 * @property \Illuminate\Database\Eloquent\Collection $cityTranslates
 * @property \Illuminate\Database\Eloquent\Collection $countryTranslates
 * @property \Illuminate\Database\Eloquent\Collection $customFieldTranslates
 * @property \Illuminate\Database\Eloquent\Collection $eventsTimetableTranslates
 * @property \Illuminate\Database\Eloquent\Collection $eventsTranslates
 * @property \Illuminate\Database\Eloquent\Collection $pageTranslates
 * @property \Illuminate\Database\Eloquent\Collection $regionTranslates
 * @property \Illuminate\Database\Eloquent\Collection $tagTranslates
 * @property \Illuminate\Database\Eloquent\Collection $videoTranslates
 * @property string $url
 * @property string $local
 * @property string $name
 * @property integer $default
 * @property integer $date_update
 * @property integer $date_create
 */
class LangModel extends Model
{

    public $table = 'lang';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'url',
        'local',
        'name',
        'default',
        'date_update',
        'date_create'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'url' => 'string',
        'local' => 'string',
        'name' => 'string',
        'default' => 'integer',
        'date_update' => 'integer',
        'date_create' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'url' => 'required|string|max:255',
        'local' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'default' => 'required',
        'date_update' => 'required|integer',
        'date_create' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function articleCategoryTranslates()
    {
        return $this->hasMany(\App\Models\ArticleCategoryTranslate::class, 'lang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function articleTranslates()
    {
        return $this->hasMany(\App\Models\ArticleTranslate::class, 'lang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cityTranslates()
    {
        return $this->hasMany(\App\Models\CityTranslate::class, 'lang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function countryTranslates()
    {
        return $this->hasMany(\App\Models\CountryTranslate::class, 'lang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function customFieldTranslates()
    {
        return $this->hasMany(\App\Models\CustomFieldTranslate::class, 'lang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventsTimetableTranslates()
    {
        return $this->hasMany(\App\Models\EventsTimetableTranslate::class, 'lang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventsTranslates()
    {
        return $this->hasMany(\App\Models\EventsTranslate::class, 'lang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pageTranslates()
    {
        return $this->hasMany(\App\Models\PageTranslate::class, 'lang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function regionTranslates()
    {
        return $this->hasMany(\App\Models\RegionTranslate::class, 'lang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function tagTranslates()
    {
        return $this->hasMany(\App\Models\TagTranslate::class, 'lang_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function videoTranslates()
    {
        return $this->hasMany(\App\Models\VideoTranslate::class, 'lang_id');
    }
}
