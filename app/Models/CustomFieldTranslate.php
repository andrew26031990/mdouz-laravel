<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CustomFieldTranslate
 * @package App\Models
 * @version November 19, 2020, 10:28 am UTC
 *
 * @property \App\Models\CustomField $customField
 * @property \App\Models\Lang $lang
 * @property integer $custom_field_id
 * @property integer $lang_id
 * @property string $text
 */
class CustomFieldTranslate extends Model
{

    public $table = 'custom_field_translate';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;


    public $fillable = [
        'custom_field_id',
        'lang_id',
        'text'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'custom_field_id' => 'integer',
        'lang_id' => 'integer',
        'text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'custom_field_id' => 'required|integer',
        'lang_id' => 'required|integer',
        'text' => 'required|string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function customField()
    {
        return $this->belongsTo(\App\Models\CustomField::class, 'custom_field_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lang()
    {
        return $this->belongsTo(\App\Models\Lang::class, 'lang_id');
    }
}
