<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Staff;
use App\Work;
use App\Fund;

class StaffsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    public function profile(Request $request) {
        $NUM_PAGE = 10;
    	$staff = Staff::where('id',auth('staff')->user()->id)->value('id');
    	$works = Work::where('staff_id',$staff)->orderBy('id','asc')->paginate($NUM_PAGE);
        $funds = Fund::where('staff_id',$staff)->orderBy('id','asc')->paginate($NUM_PAGE);
        $absence = (int)Work::where('staff_id',$staff)->sum('absence');
        $salary = Staff::where('id',$staff)->value('salary');
        $fundss = Fund::where('staff_id',$staff)->get();

        $absenceyear = $absence;
        $absence = 25-$absence;

        $lates = Work::where('staff_id',$staff)->get();
        $sum_late = 0;  
        $late = 0;
        foreach ($lates as $late => $value) {
            $late = str_replace(',','',$value->late);
            $sum_late += floatval($late);
            $late = number_format($sum_late);
        }
        
        if($late > 5 || $late == 0) {
            $balance = $late%5;
            $absencelate = (25-$absence)+(($late-$balance)/5);
            $absence = 25-$absencelate;
        }
        else {
            $balance = $late;
            $absencelate = $late;
        }

        if($absence > 0) {
            $bonus = $salary;
        } 
        elseif($absence == 0 || $absence < 0) {
            $bonus = 0;
        }
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/staff/profile')->with('staff',$staff)
                                     ->with('works',$works)
        							               ->with('funds',$funds)
                                     ->with('fundss',$fundss)
                                     ->with('absence',$absence)
                                     ->with('bonus',$bonus)
                                     ->with('absencelate',$absencelate)
                                     ->with('late',$late)
                                     ->with('balance',$balance)
                                     ->with('absenceyear',$absenceyear)
                                     ->with('NUM_PAGE',$NUM_PAGE)
                                     ->with('page',$page);
    }

    public function work_information(Request $request) {
        $NUM_PAGE = 10;
        $staff = Staff::where('id',auth('staff')->user()->id)->value('id');
        $works = Work::where('staff_id',$staff)->orderBy('id','asc')->paginate($NUM_PAGE);
        $absence = (int)Work::where('staff_id',$staff)->sum('absence');
        $salary = Staff::where('id',$staff)->value('salary');
        $fundss = Fund::where('staff_id',$staff)->get();

        $absenceyear = $absence;
        $absence = 25-$absence;

        $lates = Work::where('staff_id',$staff)->get();
        $sum_late = 0;  
        $late = 0;
        foreach ($lates as $late => $value) {
            $late = str_replace(',','',$value->late);
            $sum_late += floatval($late);
            $late = number_format($sum_late);
        }
        
        if($late > 5 || $late == 0) {
            $balance = $late%5;
            $absencelate = (25-$absence)+(($late-$balance)/5);
            $absence = 25-$absencelate;
        }
        else {
            $balance = $late;
            $absencelate = $late;
        }

        if($absence > 0) {
            $bonus = $salary;
        } 
        elseif($absence == 0 || $absence < 0) {
            $bonus = 0;
        }

        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/staff/work-information')->with('staff',$staff)
                                              ->with('works',$works)
                                              ->with('fundss',$fundss)
                                              ->with('absence',$absence)
                                              ->with('bonus',$bonus)
                                              ->with('absencelate',$absencelate)
                                              ->with('late',$late)
                                              ->with('balance',$balance)
                                              ->with('absenceyear',$absenceyear)
                                              ->with('NUM_PAGE',$NUM_PAGE)
                                              ->with('page',$page);
    }

    public function fund(Request $request) {
        $NUM_PAGE = 100;
        $staff = Staff::where('id',auth('staff')->user()->id)->value('id');
        $funds = Fund::where('staff_id',$staff)->orderBy('id','asc')->paginate($NUM_PAGE);
        $absence = (int)Work::where('staff_id',$staff)->sum('absence');
        $salary = Staff::where('id',$staff)->value('salary');
        $fundss = Fund::where('staff_id',$staff)->get();
        $absenceyear = $absence;
        $absence = 25-$absence;

        $lates = Work::where('staff_id',$staff)->get();
        $sum_late = 0;  
        $late = 0;
        foreach ($lates as $late => $value) {
            $late = str_replace(',','',$value->late);
            $sum_late += floatval($late);
            $late = number_format($sum_late);
        }
        
        if($late > 5 || $late == 0) {
            $balance = $late%5;
            $absencelate = (25-$absence)+(($late-$balance)/5);
            $absence = 25-$absencelate;
        }
        else {
            $balance = $late;
            $absencelate = $late;
        }

        if($absence > 0) {
            $bonus = $salary;
        } 
        elseif($absence == 0 || $absence < 0) {
            $bonus = 0;
        }
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/staff/money/fund')->with('staff',$staff)
                                        ->with('funds',$funds)
                                        ->with('fundss',$fundss)
                                        ->with('absence',$absence)
                                        ->with('bonus',$bonus)
                                        ->with('NUM_PAGE',$NUM_PAGE)
                                        ->with('page',$page);
    }

    public function staff_bonus(Request $request) {
        $NUM_PAGE = 100;
        $staff = Staff::where('id',auth('staff')->user()->id)->value('id');
        $works = Work::where('staff_id',$staff)->orderBy('id','asc')->paginate($NUM_PAGE);
        $absence = (int)Work::where('staff_id',$staff)->sum('absence');
        $salary = Staff::where('id',$staff)->value('salary');
        $fundss = Fund::where('staff_id',$staff)->get();
        $absenceyear = $absence;
        $absence = 25-$absence;

        $lates = Work::where('staff_id',$staff)->get();
        $sum_late = 0;  
        $late = 0;
        foreach ($lates as $late => $value) {
            $late = str_replace(',','',$value->late);
            $sum_late += floatval($late);
            $late = number_format($sum_late);
        }
        
        if($late > 5 || $late == 0) {
            $balance = $late%5;
            $absencelate = (25-$absence)+(($late-$balance)/5);
            $absence = 25-$absencelate;
        }
        else {
            $balance = $late;
            $absencelate = $late;
        }

        if($absence > 0) {
            $bonus = $salary;
        } 
        elseif($absence == 0 || $absence < 0) {
            $bonus = 0;
        }
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/staff/money/bonus')->with('staff',$staff)
                                         ->with('works',$works)
                                         ->with('fundss',$fundss)
                                         ->with('absence',$absence)
                                         ->with('bonus',$bonus)
                                         ->with('NUM_PAGE',$NUM_PAGE)
                                         ->with('page',$page);
    }
}
