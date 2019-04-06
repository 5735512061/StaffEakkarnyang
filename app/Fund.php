<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $table = 'funds';

	protected $fillable = [
    	'staff_id', 'year', 'month', 'fund', 'percent',
    ];

    protected $primaryKey = 'id';
}
