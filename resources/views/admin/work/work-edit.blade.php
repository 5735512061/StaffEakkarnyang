@extends("/template/template-admin")

@section("content")
<div class="col-xl-12 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <p class="mb-0">แก้ไขข้อมูลการทำงาน</p>
            </div>
          </div>
        </div>
        <div class="card-body">
            <form action="{{url('/admin/update-work')}}" method="POST" enctype="multipart/form-data" autocomplete="off">@csrf
                <div class="pl-lg-4">
                  <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <p>เลือกปี : <select name="year" class="form-control form-control-alternative">
                            <option>{{$work->year}}</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                            <option>2022</option>
                            <option>2023</option>
                          </select></p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <p>เลือกเดือน : <select name="month" class="form-control form-control-alternative">
                            <option>{{$work->month}}</option>
                            <option>มกราคม</option>
                            <option>กุมภาพันธ์</option>
                            <option>มีนาคม</option>
                            <option>เมษายน</option>
                            <option>พฤษภาคม</option>
                            <option>มิถุนายน</option>
                            <option>กรกฎาคม</option>
                            <option>สิงหาคม</option>
                            <option>กันยายน</option>
                            <option>ตุลาคม</option>
                            <option>พฤศจิกายน</option>
                            <option>ธันวาคม</option>
                          </select></p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <p>ค่าแรง 10% : <input type="text" name="wage" class="form-control form-control-alternative" value="{{$work->wage}}"></p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <p>บวกอื่นๆ : <input type="text" name="charge" class="form-control form-control-alternative" value="{{$work->charge}}"></p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <p>ขาด (วัน) : <input type="text" name="absence" class="form-control form-control-alternative" value="{{$work->absence}}"></p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <p>สาย (วัน) : <input type="text" name="late" class="form-control form-control-alternative" value="{{$work->late}}"></p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <p>ค่าประกันสังคม : <input type="text" name="insurance" class="form-control form-control-alternative" value="{{$work->insurance}}"></p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <p>ขาดงานเกิน 3 คน : <input type="text" name="overstop" class="form-control form-control-alternative" value="{{$work->overstop}}"></p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <p>หักอื่นๆ : <input type="text" name="deduct" class="form-control form-control-alternative" value="{{$work->deduct}}"></p>
                        </div>
                      </div>
                  </div>
                </div>

                    <input type="hidden" name="admin_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="header_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="id" value="{{$work->id}}">
                <div class="col-lg-7 col-md-10">
                    <button type="submit" class="btn btn-info">อัพเดตข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection