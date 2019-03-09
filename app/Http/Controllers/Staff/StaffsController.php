<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class StaffsController extends Controller
{
    public function profile() {
        return view('/staff/profile', array('user' => Auth::user()));
    }
}
