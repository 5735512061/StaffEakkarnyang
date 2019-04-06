@extends("/template/template-admin")

@section("content")

<div class="nav-wrapper">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-khokkloi-tab" data-toggle="tab" href="#tabs-icons-text-khokkloi" role="tab" aria-controls="tabs-icons-text-khokkloi" aria-selected="true">สาขาโคกกลอย</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-phangnga-tab" data-toggle="tab" href="#tabs-icons-text-phangnga" role="tab" aria-controls="tabs-icons-text-phangnga" aria-selected="false">สาขาเมืองพังงา</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-bypass-tab" data-toggle="tab" href="#tabs-icons-text-bypass" role="tab" aria-controls="tabs-icons-text-bypass" aria-selected="false">สาขาบายพาส</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-thaiwatsadu-tab" data-toggle="tab" href="#tabs-icons-text-thaiwatsadu" role="tab" aria-controls="tabs-icons-text-thaiwatsadu" aria-selected="false">สาขาไทวัสดุ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-chaofa-tab" data-toggle="tab" href="#tabs-icons-text-chaofa" role="tab" aria-controls="tabs-icons-text-chaofa" aria-selected="false">สาขาเจ้าฟ้า</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-sm-thalang mb-md-0" id="tabs-icons-text-thalang-tab" data-toggle="tab" href="#tabs-icons-text-thalang" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">สาขาถลาง</a>
        </li>
    </ul>
</div>

<div class="card shadow">
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-khokkloi" role="tabpanel" aria-labelledby="tabs-icons-text-khokkloi-tab">
                <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>ปี</th>
                    <th>เดือน</th>
                    <th>เงินสะสม</th>
                    <th>เพิ่มเติม</th>
                  </tr>
                </thead>
                @foreach($khokklois as $khokkloi => $value)
                <tbody>
                  <tr>
                    <td>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-form" data-id="{{$value->id}}"><i class="ni ni-settings"></i></button>
                    </td>
                    <td>{{$NUM_PAGE*($page-1) + $khokkloi+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->startdate}}</td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('year'));?></td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('month'));?></td>
                    <td><?php echo number_format((float)(DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('fund')));?></td>
                    <td>
                      <a href="{{url('/admin/fund-information')}}/{{$value->id}}">
                          <center><i class="ni ni-folder-17" style="color:blue;"></i></center>
                      </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-phangnga" role="tabpanel" aria-labelledby="tabs-icons-text-phangnga-tab">
            <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>ปี</th>
                    <th>เดือน</th>
                    <th>เงินสะสม</th>
                    <th>เพิ่มเติม</th>
                  </tr>
                </thead>
                @foreach($phangngas as $phangnga => $value)
                <tbody>
                  <tr>
                    <td>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-form" data-id="{{$value->id}}"><i class="ni ni-settings"></i></button>
                    </td>
                    <td>{{$NUM_PAGE*($page-1) + $phangnga+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->startdate}}</td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('year'));?></td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('month'));?></td>
                    <td><?php echo number_format((float)(DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('fund')));?></td>
                    <td>
                      <a href="{{url('/admin/fund-information')}}/{{$value->id}}">
                          <center><i class="ni ni-folder-17" style="color:blue;"></i></center>
                      </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-bypass" role="tabpanel" aria-labelledby="tabs-icons-text-bypass-tab">
                <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>ปี</th>
                    <th>เดือน</th>
                    <th>เงินสะสม</th>
                    <th>เพิ่มเติม</th>
                  </tr>
                </thead>
                <?php $sum_fund = 0; ?>
                @foreach($bypasss as $bypass => $value)
                <tbody>
                  <tr>
                    <td>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-form" data-id="{{$value->id}}"><i class="ni ni-settings"></i></button>
                    </td>
                    <td>{{$NUM_PAGE*($page-1) + $bypass+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->startdate}}</td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('year'));?></td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('month'));?></td>
                    <td><?php echo number_format((float)(DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('fund')));?></td>
                    <td>
                      <a href="{{url('/admin/fund-information')}}/{{$value->id}}">
                          <center><i class="ni ni-folder-17" style="color:blue;"></i></center>
                      </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-thaiwatsadu" role="tabpanel" aria-labelledby="tabs-icons-text-thaiwatsadu-tab">
                <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>ปี</th>
                    <th>เดือน</th>
                    <th>เงินสะสม</th>
                    <th>เพิ่มเติม</th>
                  </tr>
                </thead>
                @foreach($thaiwatsadus as $thaiwatsadu => $value)
                <tbody>
                  <tr>
                    <td>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-form" data-id="{{$value->id}}"><i class="ni ni-settings"></i></button>
                    </td>
                    <td>{{$NUM_PAGE*($page-1) + $thaiwatsadu+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->startdate}}</td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('year'));?></td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('month'));?></td>
                    <td><?php echo number_format((float)(DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('fund')));?></td>
                    <td>
                      <a href="{{url('/admin/fund-information')}}/{{$value->id}}">
                          <center><i class="ni ni-folder-17" style="color:blue;"></i></center>
                      </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-chaofa" role="tabpanel" aria-labelledby="tabs-icons-text-chaofa-tab">
                <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>ปี</th>
                    <th>เดือน</th>
                    <th>เงินสะสม</th>
                    <th>เพิ่มเติม</th>
                  </tr>
                </thead>
                @foreach($chaofas as $chaofa => $value)
                <tbody>
                  <tr>
                    <td>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-form" data-id="{{$value->id}}"><i class="ni ni-settings"></i></button>
                    </td>
                    <td>{{$NUM_PAGE*($page-1) + $chaofa+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->startdate}}</td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('year'));?></td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('month'));?></td>
                    <td><?php echo number_format((float)(DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('fund')));?></td>
                    <td>
                      <a href="{{url('/admin/fund-information')}}/{{$value->id}}">
                          <center><i class="ni ni-folder-17" style="color:blue;"></i></center>
                      </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-thalang" role="tabpanel" aria-labelledby="tabs-icons-text-thalang-tab">
                <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>ปี</th>
                    <th>เดือน</th>
                    <th>เงินสะสม</th>
                    <th>เพิ่มเติม</th>
                  </tr>
                </thead>
                @foreach($thalangs as $thalang => $value)
                <tbody>
                  <tr>
                    <td>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-form" data-id="{{$value->id}}"><i class="ni ni-settings"></i></button>
                    </td>
                    <td>{{$NUM_PAGE*($page-1) + $thalang+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->startdate}}</td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('year'));?></td>
                    <td><?php echo (DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('month'));?></td>
                    <td><?php echo number_format((float)(DB::table('funds')->where('staff_id',$value->id)->orderBy('id','desc')->value('fund')));?></td>
                    <td>
                      <a href="{{url('/admin/fund-information')}}/{{$value->id}}">
                          <center><i class="ni ni-folder-17" style="color:blue;"></i></center>
                      </a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">  
      <div class="modal-body p-0">            
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-12 py-lg-12">
            <form action="{{url('/admin/staff-fund')}}" method="POST" enctype="multipart/form-data" autocomplete="off">@csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <select name="year" class="form-control form-control-alternative">
                      <option>เลือกปี</option>
                      <option>2019</option>
                      <option>2020</option>
                      <option>2021</option>
                      <option>2022</option>
                      <option>2023</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <select name="month" class="form-control form-control-alternative">
                      <option>เลือกเดือน</option>
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
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p>เงินสะสม : <input type="text" name="fund" class="form-control form-control-alternative" value="0"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p>% เงินสะสม : <input type="text" name="percent" class="form-control form-control-alternative" value="0"></p>
                  </div>
                </div>
              </div>
              <input type="hidden" name="staff_id">
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">บันทึกข้อมูล</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<script>
    $( document ).ready(function() {

        $('#modal-form').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var staff_id = button.data('id')
            var modal = $(this)

            modal.find('.modal-body input[name="staff_id"]').val(staff_id)
        })
    });
</script>
@endsection