<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Staff extends Authenticatable
{
	use Notifiable;
	
    protected $table = 'staffs';

    protected $guard = 'staff';

    protected $fillable = [
    'admin_id', 'header_id', 'name','surname', 'nickname', 'idcard', 'religion', 'bday', 'tel', 'position', 'startdate', 'salary', 'branch', 'comment', 'address', 'moo', 'district', 'amphoe', 'province', 'zipcode', 'staff_name', 'password', 'image',
    ];
    protected $primaryKey = 'id';

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function works()
    {
        return $this->belongsToMany('App\Work', 'staff_id', 'id');
    }

    public function funds()
    {
        return $this->belongsToMany('App\Fund', 'staff_id', 'work_id', 'id');
    }
}
