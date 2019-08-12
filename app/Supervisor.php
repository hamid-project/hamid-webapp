<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends BaseModel
{
    public function getNameAttribute()
    {
        return $this->full_name;
    }

    public function countInternships() {
        $q = Internship::query()
          -> select('COUNT(*)')
          ->where('internships.supervisor_id', $this->id);
	   
        return $q->count();
    }

}
