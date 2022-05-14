<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginVerification extends Model
{
	protected $table="login_verification";

    protected $fillable = [
        'name', 'surname', 'password', 'email', 'phone', 'code'
    ];
}
