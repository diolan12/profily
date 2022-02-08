<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel implements AuthenticatableContract, AuthorizableContract
{
    use SoftDeletes, Authenticatable, Authorizable, HasFactory;

    public function validation()
    {
        return [
            'picture' => '',
            'name' => 'required',
            'email' => 'required',
            'role' => ''
        ];
    }

    public function filter($data)
    {
        unset($data['id']);
        return $data;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'picture', 'name', 'email', 'role'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $relations = ['picture', 'role'];

    public function picture()
    {
        return $this->hasOne('App\Models\Rest\Image', 'id', 'picture');
    }

    public function role()
    {
        return $this->hasOne('App\Models\Rest\Role', 'id', 'role');
    }
}
