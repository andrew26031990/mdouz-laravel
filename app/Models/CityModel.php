<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CityModel
 * @package App\Models
 * @version November 17, 2020, 5:10 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $cityTranslates
 * @property integer $region_id
 */
class CityModel extends Model
{

    public $table = 'city';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;



    public $fillable = [
        'created_at',
        'region_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'region_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'region_id' => 'required',
        'created_at' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cityTranslates()
    {
        return $this->hasMany(\App\Models\CityTranslate::class, 'city_id');
    }
}
