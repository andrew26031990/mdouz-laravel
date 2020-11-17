<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CountryModel
 * @package App\Models
 * @version November 17, 2020, 5:11 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $countryTranslates
 */
class CountryModel extends Model
{

    public $table = 'country';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;

    protected $guarded = array();


    public $fillable = [

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'created_at' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function countryTranslates()
    {
        return $this->hasMany(\App\Models\CountryTranslate::class, 'country_id');
    }
}
