<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class StaticPages
 * @package App\Models
 * @version November 18, 2020, 9:46 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $customFields
 * @property \Illuminate\Database\Eloquent\Collection $pageTranslates
 * @property string $view
 * @property integer $status
 */
class StaticPages extends Model
{

    public $table = 'page';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'view',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'view' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'view' => 'nullable|string|max:255',
        'status' => 'required',
        'created_at' => 'nullable|integer',
        'updated_at' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function customFields()
    {
        return $this->hasMany(\App\Models\CustomField::class, 'page_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function pageTranslates()
    {
        return $this->hasMany(\App\Models\PageTranslate::class, 'page_id');
    }
}
