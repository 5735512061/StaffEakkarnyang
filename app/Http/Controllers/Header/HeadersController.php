<?php

namespace App\Http\Controllers\Header;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Staff;
use App\History;

class HeadersController extends Controller
{
    public function staff_register() {
    	return view('/header/staff-register');
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
        return redirect()->action('Header\\HeadersController@staff_register');
    }

    public function staff_bypass(Request $request) {
        $NUM_PAGE = 10;
        $staffs = Staff::where('branch',"สาขาบายพาส")
                       ->orderByRaw('FIELD(position,"ผู้จัดการ","หัวหน้าช่าง","ที่ปรึกษาด้านบริการ","ที่ปรึกษาด้านบริการ ฝ่ายช่าง","ช่าง","ไอที")')
                       ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('/header/staff/bypass')->with('staffs',$staffs)
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
        return view('/header/staff/chaofa')->with('staffs',$staffs)
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
        return view('/header/staff/khokkloi')->with('staffs',$staffs)
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
        return view('/header/staff/phangnga')->with('staffs',$staffs)
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
        return view('/header/staff/thaiwatsadu')->with('staffs',$staffs)
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
        return view('/header/staff/bypass')->with('staffs',$staffs)
                                           ->with('NUM_PAGE',$NUM_PAGE)
                                           ->with('page',$page);
    }

    public function staff_information($id) {
        $staff = Staff::findOrFail($id);
        return view('/header/staff-information')->with('staff',$staff);
    }

    public function edit_staff($id) {
        $staff = Staff::findOrFail($id);
        return view('/header/staff-edit')->with('staff', $staff);
    }

    public function update_staff(Request $request) {
        $id = $request->get('id');
        $staff = Staff::findOrFail($id);
        $staff->update($request->all());
        $staff->save();
        return redirect()->action('Header\HeadersController@staff_bypass');
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
        return view('/header/history/bypass')->with('historys',$historys)
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
        return view('/header/history/chaofa')->with('historys',$historys)
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
        return view('/header/history/khokkloi')->with('historys',$historys)
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
        return view('/header/history/phangnga')->with('historys',$historys)
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
        return view('/header/history/thaiwatsadu')->with('historys',$historys)
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
        return view('/header/history/thalang')->with('historys',$historys)
                                              ->with('NUM_PAGE',$NUM_PAGE)
                                              ->with('page',$page);
    }

    public function history_information($id) {
        $history = History::findOrFail($id);
        return view('/header/history-information')->with('history',$history);
    }
}
