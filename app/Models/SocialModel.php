<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class SocialModel
 * @package App\Models
 * @version November 17, 2020, 5:06 am UTC
 *
 * @property string $name
 * @property string $link
 * @property string $icon
 * @property integer $sort
 */
class SocialModel extends Model
{

    public $table = 'social';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'link',
        'icon',
        'sort'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'link' => 'string',
        'icon' => 'string',
        'sort' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'link' => 'required|string|max:255',
        'icon' => 'nullable|string|max:128',
        'sort' => 'required|integer'
    ];

    
}
