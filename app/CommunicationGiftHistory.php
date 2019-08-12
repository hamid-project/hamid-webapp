<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationGiftHistory extends BaseModel
{
    //protected $dates = ['sent_on'];

    public function companyStaff()
    {
        return $this->belongsTo('App\CompanyStaff');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

}
