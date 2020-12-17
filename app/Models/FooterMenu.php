<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FooterMenu
 * @package App\Models
 * @version December 17, 2020, 6:18 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $footerMenuItems
 * @property string $title
 * @property string $key
 * @property integer $status
 */
class FooterMenu extends Model
{

    use HasFactory;

    public $table = 'footer_menu';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'title',
        'key',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'key' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'key' => 'required|string|max:255',
        'status' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function footerMenuItems()
    {
        return $this->hasMany(\App\Models\FooterMenuItem::class, 'footer_menu_id');
    }
}
