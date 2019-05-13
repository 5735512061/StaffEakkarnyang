@extends("/template/template-admin")

@section("content")
	<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row">
                <div class="col-md-9">
                  <p class="mb-0">ข้อมูลพนักงาน สาขาไทวัสดุ<p>
                </div>
                <div class="col-md-3">
                  <a href="{{url('/admin/history-thaiwatsadu')}}" class="btn btn-info">ข้อมูลพนักงานที่ลาออก</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  	<th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>ตำแหน่ง</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>เงินเดือน</th>
                    <th>เพิ่มเติม</th>
                    <th></th>
                  </tr>
                </thead>
                @foreach($staffs as $staff => $value)
                <tbody>
                  <tr>
                  	<td>{{$NUM_PAGE*($page-1) + $staff+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->tel}}</td>
                    <td>{{$value->position}}</td>
                    <td>{{$value->startdate}}</td>
                    <td style="color: red;">{{number_format((float)$value->salary)}}</td>
                    <td>
                      <a href="{{url('/admin/staff-information/')}}/{{$value->id}}">
                          <center><i class="ni ni-folder-17" style="color:blue;"></i></center>
                      </a>
                    </td>
                    <td>
                      <form action="{{url('/admin/delete-staff/')}}/{{$value->id}}" enctype="multipart/form-data" method="post">@csrf
                        <a href="{{url('/admin/edit-staff')}}/{{$value->id}}">
                          <i class="ni ni-settings" style="color:blue;"></i>
                        </a>                                    
                        <button type="submit" onclick="return confirm('Are you sure to delete ?')">
                          <i class="ni ni-basket" style="color:red;"></i>
                        </button>
                      </form>
                      <input type="hidden" name="id" value="{{$value->id}}">
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  {{ $staffs->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection