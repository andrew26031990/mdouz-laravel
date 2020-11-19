<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class RegionTranslate
 * @package App\Models
 * @version November 18, 2020, 5:46 am UTC
 *
 * @property integer $lang_id
 * @property integer $region_id
 */
class RegionTranslate extends Model
{

    public $table = 'region_translate';

    public $timestamps = false;


    public $fillable = [
        'name',
        'lang_id',
        'region_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lang_id' => 'integer',
        'region_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lang_id' => 'required',
        'region_id' => 'required'
    ];


}
