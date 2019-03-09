<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'historys';

    protected $fillable = [
    'admin_id', 'header_id', 'name','surname', 'nickname', 'idcard', 'religion', 'bday', 'tel', 'position', 'startdate', 'salary', 'branch', 'comment', 'address', 'moo', 'district', 'amphoe', 'province', 'zipcode', 'staff_name', 'password', 'image',
    ];
    protected $primaryKey = 'id';

    protected $hidden = [
        'password', 'remember_token',
    ];
}
