<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubSpecification extends BaseModel
{
    use SoftDeletes;

    public function validation()
    {
        return [
            'specification' => 'required',
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
        'specification', 'value'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

}
