<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class User extends BaseModel implements AuthenticatableContract, AuthorizableContract
{
    use SoftDeletes, Authenticatable, Authorizable, HasFactory;

    protected $validation = [
        'avatar' => '',
        'name' => 'required',
        'email' => 'required',
        'role' => '',
        'password' => '',
        'deleted_at' => ''
    ];
    public function validation()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'role' => '',
            'password' => '',
            'deleted_at' => ''
        ];
    }

    public function filter($data)
    {
        unset($data['id']);
        if (isset($data['name'])) {
            $data['name'] = ucwords($data['name']);
        }
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        return $data;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'name', 'email', 'role', 'password', 'deleted_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    public function getAvatarAttribute($value)
    {
        if ($value == null) {
            return null;
        }
        return asset('img/' . $value);
    }
    protected $relations = [ 'role'];

    // public function picture()
    // {
    //     return $this->hasOne('App\Models\Rest\Image', 'id', 'picture');
    // }

    public function role()
    {
        return $this->hasOne('App\Models\Rest\Role', 'id', 'role');
    }
}
