<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyStaff extends BaseModel
{
    public function getNameAttribute()
    {
        return $this->full_name;
    }

    public function getLastContactAttribute()
    {
        $row = \App\CommunicationContactHistory::query()
          ->where('company_staff_id', $this->id)
          ->orderBy('sent_on')
          ->first()
          ;

        return $row;
    }

    public function getLastGiftAttribute()
    {
        $row = \App\CommunicationGiftHistory::query()
          ->where('company_staff_id', $this->id)
          ->orderBy('sent_on')
          ->first()
          ;

        return $row;
    }

    public static function getHashForSelectForm()
    {
        $result = [];

        $companiesHash = Company::getHashForSelectForm();

        $companyStaff = self::all();
        foreach ($companyStaff as $staff) {
            $companyName = $companiesHash[$staff['company_id']];
            $result[$companyName][$staff['id']] = $staff['name'];
        }

        return $result;
    }

    public function countInternships() {
        $q = self::query()
          -> select('COUNT(*)')
          ->where('company_staff.company_id', $this->id);
	   
        return $q->count();
    }

    public function company() {
    	   return $this->belongsTo('App\Company');
    }
}
