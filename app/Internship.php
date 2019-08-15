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

    public static function getByStudent(\App\Student $student)
    {
        return self::getQueryByStudent($student)->get();
    }

    public static function getQueryByStudent(\App\student $student)
    {
        $q = self::getQueryByPotentials($student->potentials);

        return $q;
    }

    public static function getByPotentials(array $potentials)
    {
        return self::getQueryByPotentials($potentials)->get();
    }

    public static function getQueryByPotentials(array $potentials)
    {
        $q = self::query();

        if ($potentials['area_codes']) {
            $q->whereJsonContains('potentials->area_cores', $potentials['area_codes'], 'OR');
        }

        if ($potentials['specialisation_codes']) {
            $q->whereJsonContains('potentials->specialisation_codes', $potentials['specialisation_codes'], 'OR');
        }

        if ($potentials['transportation_codes']) {
            $q->whereJsonContains('potentials->transportation_codes', $potentials['transportation_codes'], 'OR');
        }

        return $q;
    }
}
