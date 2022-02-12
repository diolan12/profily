<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimony extends BaseModel
{
    use SoftDeletes;

    public function validation()
    {
        return [
            'name' => 'required',
            'quote' => 'required',
            'country' => 'required'
        ];
    }
    public function filter($data)
    {
        unset($data['id']);
        $data['name'] = ucwords($data['name']);
        $data['quote'] = ucfirst($data['quote']);
        $data['country'] = ucwords($data['country']);
        return $data;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'quote', 'country'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    
}
