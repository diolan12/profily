<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Config extends BaseModel
{
    use SoftDeletes;

    protected $validation = [
        'key' => 'required|unique:configs',
        'type' => '',
        'val1' => '',
        'val2' => '',
        'val3' => '',
        'val4' => '',
        'val5' => '',
        'val6' => '',
        'val7' => '',
    ];

    public function validation()
    {
        return [
            'key' => 'required|unique:' . $this->getTable(),
            'type' => '',
            'val1' => '',
            'val2' => '',
            'val3' => '',
            'val4' => '',
            'val5' => '',
            'val6' => '',
            'val7' => '',
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
        'key', 'type', 'val1', 'val2', 'val3', 'val4', 'val5', 'val6', 'val7',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
