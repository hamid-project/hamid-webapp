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

}
