<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Events
 * @package App\Models
 * @version November 25, 2020, 12:08 pm UTC
 *
 * @property \App\Models\ArticleCategory $category
 * @property \Illuminate\Database\Eloquent\Collection $eventsPhotos
 * @property \Illuminate\Database\Eloquent\Collection $eventsTimetables
 * @property \Illuminate\Database\Eloquent\Collection $eventsTranslates
 * @property integer $category_id
 * @property integer $date_events
 * @property string $longitude
 * @property string $latitude
 * @property string $address
 */
class Events extends Model
{

    public $table = 'events';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;


    public $fillable = [
        'category_id',
        'date_events',
        'longitude',
        'latitude',
        'address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'date_events' => 'integer',
        'longitude' => 'string',
        'latitude' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_id' => 'nullable|integer',
        //'date_events' => 'required|integer',
        'longitude' => 'required|string|max:255',
        'latitude' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        //'created_at' => 'required|integer',
        //'updated_at' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\ArticleCategory::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventsPhotos()
    {
        return $this->hasMany(\App\Models\EventsPhoto::class, 'events_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventsTimetables()
    {
        return $this->hasMany(\App\Models\EventsTimetable::class, 'events_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function eventsTranslates()
    {
        return $this->hasMany(\App\Models\EventsTranslate::class, 'events_id');
    }
}
