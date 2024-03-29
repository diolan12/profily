<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    use SoftDeletes;

    protected $validation = [
        'commodity' => '',
        'type' => '',
        'name' => 'required',
        'description' => '',
        'image' => ''
    ];
    public function validation()
    {
        return [
            'commodity' => '',
            'type' => '',
            'name' => 'required',
            'description' => '',
            'image' => ''
        ];
    }
    public function filter($data)
    {
        unset($data['id']);
        if (isset($data['name'])) $data['name'] = ucwords($data['name']);
        if (isset($data['description'])) $data['description'] = ucfirst($data['description']);
        return $data;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'commodity', 'type', 'name', 'description'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $relations = ['commodity', 'type', 'specification', 'specification.subspecification', 'image'];

    public function specification()
    {
        return $this->hasMany('App\Models\Rest\Specification', 'product', 'id');
    }

    public function commodity()
    {
        return $this->belongsTo('App\Models\Rest\Commodity', 'commodity');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Rest\Type', 'type');
    }
    public function image()
    {
        return $this->hasOne('App\Models\Rest\Image', 'id', 'image');
    }
}
