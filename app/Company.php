<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends BaseModel
{
    //
    public function staff() {
    	   return $this->hasMany('App\CompanyStaff');
    }

    public function internships() {
    	   return $this->hasMany('App\Internship');
    }

    public function countStaff() {
        $count = CompanyStaff::where('company_id', $this->id)->count();

        return $count;
    }

    public function countInternships() {
        $q = Internship::query()
           -> select('COUNT(*)')
           ;
        $q->join('company_staff', 'company_staff.id', '=', 'internships.company_staff_id');
        $q->where('company_staff.company_id', $this->id);
	   
        return $q->count();
    }
}
