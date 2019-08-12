<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternshipApplication extends BaseModel
{
    public static function getStatusHashForSelectForm()
    {
        return self::getSchoolConfigHashForSelectForm('internships.applications.statuses');
    }

    public static function getOutcomeHashForSelectForm()
    {
        return self::getSchoolConfigHashForSelectForm('internships.applications.outcomes');
    }

    public function internship() {
    	   return $this->belongsTo('App\Internship');
    }

    public function student() {
    	   return $this->belongsTo('App\Student');
    }

    public function getStatusAttribute()
    {
        return $this->getCodeName('internships.applications.statuses', $this->status_code);
    }

    public function getOutcomeAttribute()
    {
        return $this->getCodeName('internships.applications.outcomes', $this->outcome_code);
    }

    public function getStatusCodeOutcomeCodeAttribute()
    {
        return sprintf('%s:%s', $this->status_code, $this->outcome_code);
    }

    public static function getStatusOutcomeHashForSelectForm()
    {
        $result = [];

        foreach (\Config::get('school.internships.applications.statuses_outcomes') as $status) {
            if (empty($status['outcomes'])) {
                $key = sprintf('%s:%s', $status['code'], '');
                $result[$key] = $status['name'];
            } else {
                foreach ($status['outcomes'] as $outcome) {
                    $key = sprintf('%s:%s', $status['code'], $outcome['code']);
                    $result[$status['code']][$key] = $outcome['name'];
                }
            }
        }

        return $result;
    }

}
