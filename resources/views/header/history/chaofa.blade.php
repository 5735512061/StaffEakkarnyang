@extends("/template/template-header")

@section("content")
  <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row">
                <div class="col-md-9">
                  <p class="mb-0">ข้อมูลพนักงานที่ลาออก<p>
                </div>
                <div class="col-md-3">
                  <a href="{{url('/header/staff-chaofa')}}" class="btn btn-info">ข้อมูลพนักงาน สาขาเจ้าฟ้า</a>
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
                @foreach($historys as $history => $value)
                <tbody>
                  <tr>
                    <td>{{$NUM_PAGE*($page-1) + $history+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->tel}}</td>
                    <td>{{$value->position}}</td>
                    <td>{{$value->startdate}}</td>
                    <td>{{$value->salary}}</td>
                    <td>
                      <a href="{{url('/header/history-information/')}}/{{$value->id}}">
                          <center><i class="ni ni-folder-17" style="color:blue;"></i></center>
                      </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  {{ $historys->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection