<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends BaseModel
{
    public function getNameAttribute()
    {
        return $this->full_name;
    }

}
