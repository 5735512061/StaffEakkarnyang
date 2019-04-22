<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
	protected $table = 'works';

	protected $fillable = [
    	'staff_id', 'year', 'month', 'absence', 'late', 'wage', 'charge', 'insurance', 'overstop', 'deduct', 'comment',
    ];

    protected $primaryKey = 'id';
}
