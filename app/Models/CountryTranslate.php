<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CountryTranslate
 * @package App\Models
 * @version November 17, 2020, 11:07 am UTC
 *
 * @property integer $lang_id
 * @property integer $country_id
 */
class CountryTranslate extends Model
{

    public $table = 'country_translate';


    public $timestamps = false;

    public $fillable = [
        'lang_id',
        'country_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lang_id' => 'integer',
        'country_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lang_id' => 'required',
        'country_id' => 'required'
    ];


}
