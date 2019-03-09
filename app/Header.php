<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Header extends Authenticatable
{

	use Notifiable;

    protected $table = 'headers';

    protected $guard = 'header';

    protected $fillable = [
    'admin_id', 'header_name', 'password', 'image',
    ];

    protected $primaryKey = 'id';

    protected $hidden = [
        'password', 'remember_token',
    ];
}
