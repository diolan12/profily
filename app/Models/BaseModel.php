<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $validation = [];
    public static function getTableName()
    {
        return (new self())->getTable();
    }

    public function getValidator() {
        return $this->validation;
    }
}
