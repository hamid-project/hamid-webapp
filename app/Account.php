<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //protected $appends = ['login_password'];

    public function setLoginPassword($loginPassword) {
        $this->attributes['login_password'] = password_hash($loginPassword, PASSWORD_ARGON2ID);
    }
}
