<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class UserModel
 * @package App\Models
 * @version November 16, 2020, 7:21 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $articles
 * @property \Illuminate\Database\Eloquent\Collection $article1s
 * @property \App\Models\UserProfile $userProfile
 * @property string $username
 * @property string $auth_key
 * @property string $access_token
 * @property string $password_hash
 * @property string $oauth_client
 * @property string $oauth_client_user_id
 * @property string $email
 * @property integer $status
 * @property integer $logged_at
 */
class UserModel extends Model
{

    public $table = 'user';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'username',
        'auth_key',
        'access_token',
        'password_hash',
        'oauth_client',
        'oauth_client_user_id',
        'email',
        'status',
        'logged_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'username' => 'string',
        'auth_key' => 'string',
        'access_token' => 'string',
        'password_hash' => 'string',
        'oauth_client' => 'string',
        'oauth_client_user_id' => 'string',
        'email' => 'string',
        'status' => 'integer',
        'logged_at' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'nullable|string|max:32',
        'auth_key' => 'required|string|max:32',
        'access_token' => 'required|string|max:40',
        'password_hash' => 'required|string|max:255',
        'oauth_client' => 'nullable|string|max:255',
        'oauth_client_user_id' => 'nullable|string|max:255',
        'email' => 'required|string|max:255',
        'status' => 'required',
        'created_at' => 'nullable|integer',
        'updated_at' => 'nullable|integer',
        'logged_at' => 'nullable|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function articles()
    {
        return $this->hasMany(\App\Models\Article::class, 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function article1s()
    {
        return $this->hasMany(\App\Models\Article::class, 'updated_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function userProfile()
    {
        return $this->hasOne(\App\Models\UserProfile::class);
    }
}
