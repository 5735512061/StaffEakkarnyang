<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Staff;
use App\Header;
use App\History;
use App\Work;
use App\Fund;
use Auth;

class AdminsController extends Controller
{

    public function staff_register() {
    	return view('/admin/staff-register');
    }

    public function register(Request $request) {
        $staff = $request->all();
        $staff['password'] = bcrypt($staff['password']);
        $staff = Staff::create($staff);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('images/', $filename);
                $path = 'images/'.$filename;
                $staff->image = $filename;
                $staff->save();
            } 
        return redirect()->action('Admin\\AdminsController@staff_register');
    }

    public function header_register() {
        return view('/admin/header-register');
    }

    public function register_header(Request $request) {
        $header = $request->all();
        $header['password'] = bcrypt($header['password']);
        $header = Header::create($header);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = md5(($image->getClientOriginalName(). time()) . time()) . "_o." . $image->getClientOriginalExtension();
                $image->move('images/', $filename);
                $path = 'images/'.$filename;
                $header->image = $filename;
                $header->save();
            } 
        return redirect()->action('Admin\\AdminsController@header_register');
    }

    public function staff_bypass(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาบายพาส")
                       ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                       ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/staff/bypass')->with('staffs',$staffs)
                                          ->with('NUM_PAGE',$NUM_PAGE)
                                          ->with('page',$page);
    }

    public function staff_chaofa(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาเจ้าฟ้า")
                       ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                       ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/staff/chaofa')->with('staffs',$staffs)
                                          ->with('NUM_PAGE',$NUM_PAGE)
                                          ->with('page',$page);
    }

    public function staff_khokkloi(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาโคกกลอย")
                       ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                       ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/staff/khokkloi')->with('staffs',$staffs)
                                          ->with('NUM_PAGE',$NUM_PAGE)
                                          ->with('page',$page);
    }

    public function staff_phangnga(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาเมืองพังงา")
                       ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                       ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/staff/phangnga')->with('staffs',$staffs)
                                          ->with('NUM_PAGE',$NUM_PAGE)
                                          ->with('page',$page);
    }

    public function staff_thaiwatsadu(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาไทวัสดุ")
                       ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                       ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/staff/thaiwatsadu')->with('staffs',$staffs)
                                          ->with('NUM_PAGE',$NUM_PAGE)
                                          ->with('page',$page);
    }

    public function staff_thalang(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาถลาง")
                       ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                       ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/staff/thalang')->with('staffs',$staffs)
                                           ->with('NUM_PAGE',$NUM_PAGE)
                                           ->with('page',$page);
    }

    public function staff_information($id) {
        $staff = Staff::findOrFail($id);
        $absence = (int)Work::where('staff_id',$staff->id)->sum('absence');
        $salary = Staff::where('id',$staff->id)->value('salary');
        $fundss = Fund::where('staff_id',$staff->id)->get();
        $absenceyear = $absence;
        $absence = 25-$absence;

        $lates = Work::where('staff_id',$staff->id)->get();
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
        return view('/admin/staff-information')->with('staff',$staff)
                                               ->with('fundss',$fundss)
                                               ->with('absence',$absence)
                                               ->with('bonus',$bonus);
    }

    public function staff_salary(Request $request) {
        $NUM_PAGE = 100;
        $khokklois = Staff::where('branch',"สาขาโคกกลอย")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $phangngas = Staff::where('branch',"สาขาเมืองพังงา")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $bypasss = Staff::where('branch',"สาขาบายพาส")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $thaiwatsadus = Staff::where('branch',"สาขาไทวัสดุ")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $chaofas = Staff::where('branch',"สาขาเจ้าฟ้า")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $thalangs = Staff::where('branch',"สาขาถลาง")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/money/staff-salary')->with('khokklois',$khokklois)
                                                ->with('phangngas',$phangngas)
                                                ->with('bypasss',$bypasss)
                                                ->with('thaiwatsadus',$thaiwatsadus)
                                                ->with('chaofas',$chaofas)
                                                ->with('thalangs',$thalangs)
                                                ->with('NUM_PAGE',$NUM_PAGE)
                                                ->with('page',$page);
    }

    public function staff_fund(Request $request) {
        $NUM_PAGE = 100;
        $khokklois = Staff::where('branch',"สาขาโคกกลอย")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $phangngas = Staff::where('branch',"สาขาเมืองพังงา")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $bypasss = Staff::where('branch',"สาขาบายพาส")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $thaiwatsadus = Staff::where('branch',"สาขาไทวัสดุ")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $chaofas = Staff::where('branch',"สาขาเจ้าฟ้า")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $thalangs = Staff::where('branch',"สาขาถลาง")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/money/staff-fund')->with('khokklois',$khokklois)
                                              ->with('phangngas',$phangngas)
                                              ->with('bypasss',$bypasss)
                                              ->with('thaiwatsadus',$thaiwatsadus)
                                              ->with('chaofas',$chaofas)
                                              ->with('thalangs',$thalangs)
                                              ->with('NUM_PAGE',$NUM_PAGE)
                                              ->with('page',$page);
    }

    public function fund(Request $request) {
        $fund = $request->all();
        $fund = Fund::create($fund);
        return back();
    }

    public function fund_information(Request $request, $id) {
        $NUM_PAGE = 10;
        $staff = Staff::findOrFail($id);
        $funds = Fund::where('staff_id',$staff->id)->orderBy('id','asc')->paginate($NUM_PAGE);
        $absence = (int)Work::where('staff_id',$staff->id)->sum('absence');
        $salary = Staff::where('id',$staff->id)->value('salary');
        $fundss = Fund::where('staff_id',$staff->id)->get();
        $absenceyear = $absence;
        $absence = 25-$absence;

        $lates = Work::where('staff_id',$staff->id)->get();
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
        return view('/admin/money/fund-information')->with('funds',$funds)
                                                    ->with('staff',$staff)
                                                    ->with('fundss',$fundss)
                                                    ->with('absence',$absence)
                                                    ->with('bonus',$bonus)
                                                    ->with('NUM_PAGE',$NUM_PAGE)
                                                    ->with('page',$page);
    }

    public function staff_bonus(Request $request) {
        $NUM_PAGE = 100;
        $khokklois = Staff::where('branch',"สาขาโคกกลอย")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $phangngas = Staff::where('branch',"สาขาเมืองพังงา")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $bypasss = Staff::where('branch',"สาขาบายพาส")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $thaiwatsadus = Staff::where('branch',"สาขาไทวัสดุ")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $chaofas = Staff::where('branch',"สาขาเจ้าฟ้า")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $thalangs = Staff::where('branch',"สาขาถลาง")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
      return view('/admin/money/staff-bonus')->with('khokklois',$khokklois)
                                             ->with('phangngas',$phangngas)
                                             ->with('bypasss',$bypasss)
                                             ->with('thaiwatsadus',$thaiwatsadus)
                                             ->with('chaofas',$chaofas)
                                             ->with('thalangs',$thalangs)
                                             ->with('NUM_PAGE',$NUM_PAGE)
                                             ->with('page',$page);
    }

    public function edit_staff($id) {
        $staff = Staff::findOrFail($id);
        return view('/admin/staff-edit')->with('staff', $staff);
    }

    public function update_staff(Request $request) {
        $id = $request->get('id');
        $staff = Staff::findOrFail($id);
        $staff->update($request->all());
        $staff['password'] = bcrypt($staff['password']);
        $staff->save();
        return redirect()->action('Admin\AdminsController@staff_bypass');
    }

    public function delete_staff($id) {
        $staff = Staff::findOrFail($id);
        $admin_id = $staff->admin_id;
        $header_id = $staff->header_id;
        $name = $staff->name;
        $surname = $staff->surname;
        $nickname = $staff->nickname;
        $idcard = $staff->idcard;
        $religion = $staff->religion;
        $bday = $staff->bday;
        $tel = $staff->tel;
        $position = $staff->position;
        $startdate = $staff->startdate;
        $salary = $staff->salary;
        $branch = $staff->branch;
        $comment = $staff->comment;
        $address = $staff->address;
        $moo = $staff->moo;
        $district = $staff->district;
        $amphoe = $staff->amphoe;
        $province = $staff->province;
        $zipcode = $staff->zipcode;
        $staff_name = $staff->staff_name;
        $password = $staff->password;
        $image = $staff->image;

        $history = new History;
        $history->admin_id = $admin_id;
        $history->header_id = $header_id;
        $history->name = $name;
        $history->surname = $surname;
        $history->nickname = $nickname;
        $history->idcard = $idcard;
        $history->religion = $religion;
        $history->bday = $bday;
        $history->tel = $tel;
        $history->position = $position;
        $history->startdate = $startdate;
        $history->salary = $salary;
        $history->branch = $branch;
        $history->comment = $comment;
        $history->address = $address;
        $history->moo = $moo;
        $history->district = $district;
        $history->amphoe = $amphoe;
        $history->province = $province;
        $history->zipcode = $zipcode;
        $history->staff_name = $staff_name;
        $history->password = $password;
        $history->image = $image;
        $history->save();

        $staff = Staff::findOrFail($id)->delete();
        return back();
    }

    public function history_bypass(Request $request) {
        $NUM_PAGE = 10;
        $historys = History::where('branch',"สาขาบายพาส")
                           ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                           ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/history/bypass')->with('historys',$historys)
                                            ->with('NUM_PAGE',$NUM_PAGE)
                                            ->with('page',$page);
    }

    public function history_chaofa(Request $request) {
        $NUM_PAGE = 10;
        $historys = History::where('branch',"สาขาเจ้าฟ้า")
                           ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                           ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/history/chaofa')->with('historys',$historys)
                                            ->with('NUM_PAGE',$NUM_PAGE)
                                            ->with('page',$page);
    }

    public function history_khokkloi(Request $request) {
        $NUM_PAGE = 10;
        $historys = History::where('branch',"สาขาโคกกลอย")
                           ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                           ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/history/khokkloi')->with('historys',$historys)
                                              ->with('NUM_PAGE',$NUM_PAGE)
                                              ->with('page',$page);
    }

    public function history_phangnga(Request $request) {
        $NUM_PAGE = 10;
        $historys = History::where('branch',"สาขาเมืองพังงา")
                           ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                           ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/history/phangnga')->with('historys',$historys)
                                              ->with('NUM_PAGE',$NUM_PAGE)
                                              ->with('page',$page);
    }

    public function history_thaiwatsadu(Request $request) {
        $NUM_PAGE = 10;
        $historys = History::where('branch',"สาขาไทวัสดุ")
                           ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                           ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/history/thaiwatsadu')->with('historys',$historys)
                                                 ->with('NUM_PAGE',$NUM_PAGE)
                                                 ->with('page',$page);
    }

    public function history_thalang(Request $request) {
        $NUM_PAGE = 10;
        $historys = History::where('branch',"สาขาถลาง")
                           ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                           ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/history/thalang')->with('historys',$historys)
                                             ->with('NUM_PAGE',$NUM_PAGE)
                                             ->with('page',$page);
    }

    public function history_information($id) {
        $history = History::findOrFail($id);
        return view('/admin/history-information')->with('history',$history);
    }

    public function work_bypass(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาบายพาส")
                       ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                       ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/work/bypass')->with(['staffs' => $staffs])
                                         ->with('NUM_PAGE',$NUM_PAGE)
                                         ->with('page',$page);
    }

    public function work_chaofa(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาเจ้าฟ้า")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/work/chaofa')->with('staffs',$staffs)
                                         ->with('NUM_PAGE',$NUM_PAGE)
                                         ->with('page',$page);
    }

    public function work_khokkloi(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาโคกกลอย")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/work/khokkloi')->with('staffs',$staffs)
                                           ->with('NUM_PAGE',$NUM_PAGE)
                                           ->with('page',$page);
    }

    public function work_phangnga(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาเมืองพังงา")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/work/phangnga')->with('staffs',$staffs)
                                           ->with('NUM_PAGE',$NUM_PAGE)
                                           ->with('page',$page);
    }

    public function work_thaiwatsadu(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาไทวัสดุ")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/work/thaiwatsadu')->with('staffs',$staffs)
                                              ->with('NUM_PAGE',$NUM_PAGE)
                                              ->with('page',$page);
    }

    public function work_thalang(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาถลาง")
                         ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                         ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/work/thalang')->with('staffs',$staffs)
                                          ->with('NUM_PAGE',$NUM_PAGE)
                                          ->with('page',$page);
    }

    public function work_information(Request $request, $id) {
        $NUM_PAGE = 10;
        $staff = Staff::findOrFail($id);
        $works = Work::where('staff_id',$staff->id)->orderBy('id','asc')->paginate($NUM_PAGE);
        $funds = Fund::where('staff_id',$staff->id)->orderBy('id','asc')->paginate($NUM_PAGE);
        $absence = (int)Work::where('staff_id',$staff->id)->sum('absence');
        $salary = Staff::where('id',$staff->id)->value('salary');
        $fundss = Fund::where('staff_id',$staff->id)->get();
        
        $absenceyear = $absence;
        $absence = 25-$absence;

        $lates = Work::where('staff_id',$staff->id)->get();
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
        return view('/admin/work/work-information')->with('works',$works)
                                                   ->with('staff',$staff)
                                                   ->with('funds',$funds)
                                                   ->with('absence',$absence)
                                                   ->with('bonus',$bonus)
                                                   ->with('fundss',$fundss)
                                                   ->with('absencelate',$absencelate)
                                                   ->with('late',$late)
                                                   ->with('balance',$balance)
                                                   ->with('absenceyear',$absenceyear)
                                                   ->with('NUM_PAGE',$NUM_PAGE)
                                                   ->with('page',$page);
    }

    public function edit_work($id) {
        $work = Work::findOrFail($id);
        return view('/admin/work/work-edit')->with('work', $work);
    }

    public function update_work(Request $request) {
        $id = $request->get('id');
        $work = Work::findOrFail($id);
        $work->update($request->all());
        $work->save();
        return back();
    }
    
    public function absence(Request $request) {
        $absence = $request->all();
        $absence = Work::create($absence);
        return back();
    }

    public function search(Request $request) {
        $NUM_PAGE = 10;
        $search = $request->get('search');
        $staffs = Staff::where('name','like','%'.$search.'%')
                      ->orWhere('nickname','like','%'.$search.'%')->paginate($NUM_PAGE);
        foreach($staffs as $staff){
            $absence = (int)Work::where('staff_id',$staff->id)->sum('absence');
            $salary = Staff::where('id',$staff->id)->value('salary');
            $fundss = Fund::where('staff_id',$staff->id)->get();
        }
        $absence = 25-$absence;
          if($absence != 0) {
            $bonus = $salary;
          } 
          else {
            $bonus = 0;
          }

        $sum_fund = 0; 
        $fund = 0; 
        foreach ($fundss as $funds => $value) {
            $fund = str_replace(',','',$value->fund);
            $sum_fund += floatval($fund);
            $fund = number_format($sum_fund);
        }
    
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/admin/staff/search')->with('staffs',$staffs)
                                          ->with('absence',$absence)
                                          ->with('bonus',$bonus)
                                          ->with('fund',$fund)
                                          ->with('NUM_PAGE',$NUM_PAGE)
                                          ->with('page',$page);
    }
}
