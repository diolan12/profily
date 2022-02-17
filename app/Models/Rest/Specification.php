<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends BaseModel
{
    use SoftDeletes;

    public function validation()
    {
        return [
            'product' => 'required',
            'value' => 'required'
        ];
    }
    public function filter($data)
    {
        unset($data['id']);
        if (isset($data['value'])) $data['value'] = ucfirst($data['value']);
        return $data;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product', 'value'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $relations = ['subspecification'];

    public function subspecification()
    {
        return $this->hasMany('App\Models\Rest\SubSpecification', 'specification', 'id');
    }

}
