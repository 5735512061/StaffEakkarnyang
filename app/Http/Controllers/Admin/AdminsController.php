<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Staff;
use App\Header;
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
        return view('/admin/staff/bypass')->with('staffs',$staffs)
                                          ->with('NUM_PAGE',$NUM_PAGE)
                                          ->with('page',$page);
    }

    public function staff_information($id) {
        $staff = Staff::findOrFail($id);
        return view('/admin/staff-information')->with('staff',$staff);
    }

    public function edit_staff($id) {
        $staff = Staff::findOrFail($id);
        return view('/admin/staff-edit')->with('staff', $staff);
    }

    public function update_staff(Request $request) {
        $id = $request->get('id');
        $staff = Staff::findOrFail($id);
        $staff->update($request->all());
        $staff->save();
        return redirect()->action('Admin\AdminsController@staff_bypass');
    }

}
