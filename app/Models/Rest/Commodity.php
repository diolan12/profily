<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Rest\Type;

class Commodity extends BaseModel
{
    use SoftDeletes;

    public function validation()
    {
        return [
            'name' => 'required',
            'slogan' => '',
            'description1' => '',
            'description2' => '',
            'image' => ''
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
        'name', 'slogan','description1', 'description2', 'image'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $relations = ['types', 'image'];

    public function types()
    {
        return $this->hasMany(Type::class, 'commodity', 'id');
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image');
    }

    // public function getImageAttribute($value)
    // {
    //     if ($value == null) {
    //         return null;
    //     }
    //     return asset('img/'.$value);
    // }
}
