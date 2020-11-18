<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class RegionModel
 * @package App\Models
 * @version November 17, 2020, 5:10 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $regionTranslates
 * @property integer $country_id
 */
class RegionModel extends Model
{

    public $table = 'region';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;


    public $fillable = [
        'country_id',
        'created_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'required',
        'created_at' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function regionTranslates()
    {
        return $this->hasMany(\App\Models\RegionTranslate::class, 'region_id');
    }
}
