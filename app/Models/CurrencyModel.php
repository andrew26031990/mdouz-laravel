<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CurrencyModel
 * @package App\Models
 * @version November 17, 2020, 5:07 am UTC
 *
 * @property string $name
 * @property string $code
 * @property integer $exchange_rate
 * @property integer $default
 */
class CurrencyModel extends Model
{

    public $table = 'currency';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'code',
        'exchange_rate',
        'default'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'exchange_rate' => 'integer',
        'default' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:128',
        'exchange_rate' => 'required|integer',
        'default' => 'required'
    ];

    
}
