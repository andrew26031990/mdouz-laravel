<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Logs
 * @package App\Models
 * @version December 19, 2020, 10:55 am UTC
 *
 * @property string $event
 * @property string $description
 * @property string|\Carbon\Carbon $date
 */
class Logs extends Model
{

    use HasFactory;

    public $table = 'logs';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $timestamps = false;


    public $fillable = [
        'event',
        'description',
        'date',
        'ip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'event' => 'string',
        'description' => 'string',
        'date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'event' => 'required|string|max:100',
        'description' => 'required|string|max:200',
        'date' => 'required'
    ];


}
