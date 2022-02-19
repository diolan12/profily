<?php

namespace App\Models\Rest;

use App\Models\BaseModel;

class Role extends BaseModel
{

    protected $validation = [
        'name' => ''
    ];
    public function validation()
    {
        return [
            'name' => ''
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
        'name'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
