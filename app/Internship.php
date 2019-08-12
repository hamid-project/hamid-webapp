<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends BaseModel
{
    protected $dates = ['formatted_internship_begin', 'formatted_internship_end'];
    protected $casts = [
        'potentials' => 'json',
    ];

    const STATUS_OPEN = 1;
    const STATUS_CLOSED = 2;

    public function getNumberOfApplicationsAttribute()
    {
        return InternshipApplication::where('internship_id', $this->id)->count();
    }

    public function getFormattedStatusAttribute()
    {
        static $formatMapping = [
            self::STATUS_OPEN => 'Open',
            self::STATUS_CLOSED => 'Closed',
        ];

        return $formatMapping[$this->status];
    }

    public function getFormattedInternshipPeriodAttribute()
    {
        return $this->getFormattedPeriod($this->internship_begin, $this->internship_end);
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function companyStaff()
    {
        return $this->belongsTo('App\CompanyStaff');
    }

    public function getAreaAttribute()
    {
        return $this->getCodeName('areas', $this->area_code);
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor');
    }

}
