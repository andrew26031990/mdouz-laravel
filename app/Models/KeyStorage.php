<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class KeyStorage
 * @package App\Models
 * @version November 25, 2020, 12:56 pm UTC
 *
 * @property string $value
 * @property string $comment
 */
class KeyStorage extends Model
{

    public $table = 'key_storage_item';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'key',
        'value',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'key' => 'string',
        'value' => 'string',
        'comment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'key' => 'required|string',
        'value' => 'required|string',
        'comment' => 'nullable|string',
        'updated_at' => 'nullable|integer',
        'created_at' => 'nullable|integer'
    ];


}
