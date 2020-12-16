<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Video
 * @package App\Models
 * @version December 16, 2020, 5:06 am UTC
 *
 * @property \App\Models\ArticleCategory $category
 * @property \Illuminate\Database\Eloquent\Collection $videoTranslates
 * @property integer $category_id
 * @property string $photo_path
 * @property string $photo_base_path
 */
class Video extends Model
{

    use HasFactory;

    public $table = 'video';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;


    public $fillable = [
        'category_id',
        'photo_path',
        'photo_base_path',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'photo_path' => 'string',
        'photo_base_path' => 'string',
        'created_at' => 'integer',
        'updated_at' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_id' => 'required|integer',
        'photo_path' => 'nullable|string|max:255',
        'photo_base_path' => 'nullable|string|max:255',
        'created_at' => 'nullable|integer',
        'updated_at' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\ArticleCategory::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function videoTranslates()
    {
        return $this->hasMany(\App\Models\VideoTranslate::class, 'video_id');
    }
}
