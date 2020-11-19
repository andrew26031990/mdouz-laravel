<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CityTranslate
 * @package App\Models
 * @version November 18, 2020, 7:28 am UTC
 *
 * @property integer $region_id
 * @property integer $lang_id
 */
class CityTranslate extends Model
{

    public $table = 'city_translate';

    public $timestamps = false;


    public $fillable = [
        'name',
        'city_id',
        'lang_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'region_id' => 'integer',
        'lang_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'region_id' => 'required',
        'lang_id' => 'required'
    ];


}
