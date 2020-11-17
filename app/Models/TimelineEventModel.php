<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TimelineEventModel
 * @package App\Models
 * @version November 16, 2020, 7:16 am UTC
 *
 * @property string $application
 * @property string $category
 * @property string $event
 * @property string $data
 */
class TimelineEventModel extends Model
{
    //use SoftDeletes;

    public $table = 'timeline_event';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'application',
        'category',
        'event',
        'data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'application' => 'string',
        'category' => 'string',
        'event' => 'string',
        'data' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'application' => 'required|string|max:64',
        'category' => 'required|string|max:64',
        'event' => 'required|string|max:64',
        'data' => 'nullable|string',
        'created_at' => 'required|integer'
    ];


}
