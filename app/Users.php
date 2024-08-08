<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = ['id', 'username', 'password', 'surname', 'first_name', 'remember_token'];

    public $timestamps = true;

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function loginSecurity()
	{
    	return $this->hasOne('App\LoginSecurity', 'user_id');
	}
}
