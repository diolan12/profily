<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends BaseModel
{
    use SoftDeletes;

    protected $validation = [
        'commodity' => 'required',
        'name' => '',
        'description' => ''
    ];
    public function validation()
    {
        return [
            'commodity' => 'required',
            'name' => '',
            'description' => ''
        ];
    }
    public function filter($data)
    {
        unset($data['id']);
        $data['name'] = ucwords($data['name']);
        $data['description'] = ucfirst($data['description']);
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

    protected $relations = ['commodity'];

    public function commodity()
    {
        return $this->belongsTo('App\Models\Rest\Commodity', 'commodity');
    }
}
