<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Config extends BaseModel
{
    use SoftDeletes;

    protected $validation = [
        'key' => 'required|unique:configs',
        'value1' => '',
        'value2' => '',
        'value3' => '',
        'value4' => '',
        'value5' => '',
        'value6' => '',
        'value7' => '',
    ];

    public function validation()
    {
        return [
            'key' => 'required|unique:' . $this->getTable(),
            'value1' => '',
            'value2' => '',
            'value3' => '',
            'value4' => '',
            'value5' => '',
            'value6' => '',
            'value7' => '',
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
        'key', 'value1', 'value2', 'value3', 'value4', 'value5', 'value6', 'value7',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
