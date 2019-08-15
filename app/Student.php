<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends BaseModel
{
    protected $casts = [
        'potentials' => 'json',
    ];

    public function getNameAttribute()
    {
        return $this->full_name;
    }

    public function getFormattedEnrollmentPeriodAttribute()
    {
        return sprintf('%s - %s', $this->enrollment_start->name, $this->enrollment_finish->name);
    }

    public function getProgrammeAttribute()
    {
        return $this->getCodeName('programmes', $this->programme_code);
    }

    public function getSpecialisationAttribute()
    {
        return $this->getCodeName('specialisations', $this->specialisation_code);
    }

    public function getEnrollmentStartAttribute()
    {
        return $this->getCodeName('semesters', $this->enrollment_start_code);
    }

    public function getEnrollmentFinishAttribute()
    {
        return $this->getCodeName('semesters', $this->enrollment_finish_code);
    }

    public function files()
    {
        return $this->belongsToMany(\App\File::class, 'student_files');
    }

    public static function getByInternship(\App\Internship $internship)
    {
        return self::getQueryByInternship($internship)->get();
    }

    public static function getQueryByInternship(\App\Internship $internship)
    {
        $q = self::getQueryByPotentials($internship->potentials);

        return $q;
    }

    public static function getByPotentials(array $potentials)
    {
        return self::getQueryByPotentials($potentials)->get();
    }

    public static function getQueryByPotentials(array $potentials)
    {
        $q = self::query()
           ->whereJsonContains('potentials->area_cores', $potentials['area_codes'])
           ->whereJsonContains('potentials->specialisation_codes', $potentials['specialisation_codes'], 'OR')
           ->whereJsonContains('potentials->transportation_codes', $potentials['transportation_codes'], 'OR')
            ;
        return $q;
    }

}
