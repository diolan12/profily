<?php

namespace App\Models\Rest;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends BaseModel
{
    use SoftDeletes;

    protected $validation = [
        'file' => 'required',
        'title' => 'required',
        'credit' => ''
    ];
    public function validation()
    {
        return [
            'file' => 'required',
            'title' => 'required',
            'credit' => ''
        ];
    }
    public function filter($data)
    {
        unset($data['id']);
        unset($data['image']);
        if (isset($data['title'])) $data['title'] = ucwords($data['title']);

        if (isset($data['title'])) {
            if ($data['credit'] == '') {
                unset($data['credit']);
            }
        }

        if (isset($data['credit'])) {
            if ($data['credit'] == '') {
                $data['credit'] = null;
            }
        }

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
}
