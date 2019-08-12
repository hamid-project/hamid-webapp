<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationContactHistory extends BaseModel
{
    //protected $dates = ['formatted_send_on'];

    public function getMethodLabelCodeAttribute()
    {
        return sprintf('%s:%s', $this->method_code, $this->label_code);
    }

    public function getFormattedMethodLabelAttribute()
    {
        $result = '';

        $methods = \Config::get('school.communication.contacts.methods');
        foreach ($methods  as $method) {
            if ($method['code'] != $this->method_code) {
                continue;
            }

            if (empty($method['labels'])) {
                $result = $method['name'];
                break;
            } else {
                foreach ($method['labels'] AS $label) {
                    if ($label['code'] == $this->label_code) {
                        $result = sprintf('%s : %s', $method['name'],  $label['name']);
                        break 2;
                    }
                }
            }
        }

        return $result;
    }

    public function getFormattedSentOnAttribute()
    {
        return $this->getFormattedDate($this->sent_on);
    }

    public static function getMethodHashForSelectForm()
    {
        $result = [];

        $methods = \Config::get('school.communication.contacts.methods');
        foreach ($methods  as $method) {
            if (empty($method['labels'])) {
                $code = sprintf('%s:', $method['code']);
                $result[$code] = $method['name'];
            } else {
                foreach ($method['labels'] AS $label) {
                    $code = sprintf('%s:%s', $method['code'], $label['code']);
                    $result[$method['name']][$code] = $label['name'];
                }
            }
        }

        return $result;
    }

    public function companyStaff()
    {
        return $this->belongsTo('App\CompanyStaff');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

}
