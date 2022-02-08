<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends BaseModel
{
    use SoftDeletes;

    public function validation()
    {
        return [
            'file' => 'required',
            'title' => '',
            'credit' => ''
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
        'file', 'title', 'credit'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function getFileAttribute($value)
    {
        if ($value == null) {
            return null;
        }
        return asset('img/' . $value);
    }

    protected $relations = ['commodity'];

    public function commodity()
    {
        return $this->belongsTo('App\Models\Rest\Commodity', 'commodity');
    }

}