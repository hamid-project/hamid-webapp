<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends BaseModel
{
    protected $dates = [
        'updated_at',
    ];

    public function students()
    {
        return $this->belongsToMany(\App\Student::class);
    }

}
