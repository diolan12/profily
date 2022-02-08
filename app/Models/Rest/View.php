<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class View extends BaseModel
{
    use SoftDeletes;

    public function validation()
    {
        return [
            'product' => '',
            'count' => ''
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
        'product', 'count'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
    
    protected $relations = ['product'];

    public function product()
    {
        return $this->hasOne('App\Models\Rest\Product', 'id', 'product');
    }
    
}
