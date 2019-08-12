<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Carbon;
class BaseModel extends Model
{
    const DATE_MIN = '1000-01-01';
    const DATE_MAX = '9999-12-31';
    const DATE_TIME_MIN = '1000-01-01 00:00:00';
    const DATE_TIME_MAX = '9999-12-31 12:31:59';

    const PERSON_NAME_LENGTH = 20;
    const EMAIL_LENGTH = 100;
    const ADDRESS_LENGTH = 100;
    const PHONE_LENGTH = 20;

    protected static $dateMin = null;
    protected static $dateMax = null;

    public function getFormattedDate($value)
    {
        if (in_array($value, [self::DATE_MIN, self::DATE_MAX])) {
            return 'N/A';
        } else {
            return $this->getLocaleDate(Carbon::create($value));
        }
    }

    public function getFormattedPeriod($from, $to)
    {
        $value = sprintf('%s - %s', $this->getFormattedDate($from), $this->getFormattedDate($to));

        return $value == 'N/A - N/A' ? 'N/A' : $value;
    }

    public function getCodeName($key, $code)
    {
        $config = \Arr::first(\Config::get(sprintf('school.%s', $key)), function ($value, $key) use($code) { return $value['code'] == $code; });
        $obj = new \stdClass;
        $obj->code = $config['code'];
        $obj->name = $config['name'];

        return $obj;
    }

    public function getFullNameAttribute()
    {
        $name = $this->name_first;
        $name .= $this->name_middle ? ' ' . $this->name_middle : '';
        $name .= ' '. $this->name_last;
        
        return $name;
    }

    public static function getHashForSelectForm()
    {
        return self::_getHashForSelectForm(get_called_class(), 'id', self::all());
    }

    public static function _getHashForSelectForm($identify, $key, $rows)
    {
        $result = [];

        foreach ($rows as $row) {
            switch ($identify) {
            case 'areas':
                $result[$row[$key]] = sprintf('%s', $row['name']);
                break;

            case 'programmes':
            case 'specialisations':
                $result[$row[$key]] = sprintf('[%s] %s', $row['code'], $row['name']);
                break;

            case 'semesters':
                $result[$row[$key]] = sprintf('[%s] (%s - %s)', $row['name'], $row['start'], $row['finish']);
                break;

            case 'students':
                $result[$row[$key]] = sprintf('%s [%s]', $row['name'], $row['code']);
                break;

            default:
                $result[$row[$key]] = $row['name'];
            }
        }

        return $result;
    }

    public function getPotentialAreaCodesAttribute()
    {
        return $this->potentials['area_codes'];
    }

    public function getPotentialSpecialisationCodesAttribute()
    {
        return $this->potentials['specialisation_codes'];
    }

    public function getPotentialTransportationCodesAttribute()
    {
        return $this->potentials['transportation_codes'];
    }

    public static function getSchoolConfigHashForSelectForm($identify, $key = 'code')
    {
        $rows = \Config::get(sprintf('school.%s', $identify));

        return self::_getHashForSelectForm($identify, $key, $rows);
    }

    public static function getProgrammeHashForSelectForm()
    {
        return self::getSchoolConfigHashForSelectForm('programmes');
    }

    public static function getSpecialisationHashForSelectForm()
    {
        return self::getSchoolConfigHashForSelectForm('specialisations');
    }

    public static function getSemesterHashForSelectForm()
    {
        return self::getSchoolConfigHashForSelectForm('semesters');
    }

    public static function getAreaHashForSelectForm()
    {
        return self::getSchoolConfigHashForSelectForm('areas');
    }

    public static function getTransportationHashForSelectForm()
    {
        return self::getSchoolConfigHashForSelectForm('transportations');
    }

    public function getLocaleDate(Carbon $date, $format = 'L')
    {
        return $date->locale(\App::getLocale())->isoFormat($format);
    }
}
