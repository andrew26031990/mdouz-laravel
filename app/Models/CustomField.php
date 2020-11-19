<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CustomField
 * @package App\Models
 * @version November 19, 2020, 10:28 am UTC
 *
 * @property \App\Models\Page $page
 * @property \Illuminate\Database\Eloquent\Collection $customFieldTranslates
 * @property integer $page_id
 * @property string $name
 */
class CustomField extends Model
{

    public $table = 'custom_field';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;


    public $fillable = [
        'page_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'page_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'page_id' => 'required|integer',
        'name' => 'required|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function page()
    {
        return $this->belongsTo(\App\Models\Page::class, 'page_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function customFieldTranslates()
    {
        return $this->hasMany(\App\Models\CustomFieldTranslate::class, 'custom_field_id');
    }
}
