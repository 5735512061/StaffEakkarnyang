@extends("/template/template-header")

@section("content")
  <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row">
                <div class="col-md-9">
                  <p class="mb-0">ข้อมูลพนักงาน สาขาบายพาส<p>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>เงินเดือน</th>
                    <th>ปี</th>
                    <th>เดือน</th>
                    <th>ค่าแรง 10%</th>
                    <th>บวกอื่นๆ</th>
                    <th>ขาด (วัน)</th>
                    <th>สาย (วัน)</th>
                    <th>เบี้ยขยัน</th>
                    <th>ค่าประกันสังคม</th>
                    <th>ขาดงานเกิน</th>
                    <th>หักอื่นๆ</th>
                    <th>ยอดคงเหลือ</th>
                    <th>เพิ่มเติม</th>
                  </tr>
                </thead>
                @foreach($staffs as $staff => $value)
                <tbody>
                  <tr>
                    <td>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-form" data-id="{{$value->id}}"><i class="ni ni-settings"></i></button>
                    </td>
                    <td>{{$NUM_PAGE*($page-1) + $staff+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{number_format((float)$value->salary)}}</td>
                    <td><?php echo (DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('year'));?></td>
                    <td><?php echo (DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('month'));?></td>
                    <td>+ <?php echo number_format((float)(DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('wage')));?></td>
                    <td>+ <?php echo number_format((float)(DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('charge')));?></td>
                    <td><?php echo (DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('absence'));?></td>
                    <td><?php echo (DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('late'));?></td>
                    <?php $late = (DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('late'));?>
                    <?php $absence = (DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('absence'));?>
                    @if($late == 0 && $absence == 0)
                    <td>+ 1,000</td>
                    @else
                    <td>+ 0</td>
                    @endif
                    <td>- <?php echo number_format((float)(DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('insurance')));?></td>
                    <td>- <?php echo number_format((float)(DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('overstop')));?></td>
                    <td>- <?php echo number_format((float)(DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('deduct')));?></td>
                    <?php 
                      $salary = str_replace(',','',$value->salary);
                      $salary = (int)$salary;
                      $wage = DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('wage');
                      $wage = str_replace(',','',$wage);
                      $wage = (int)$wage;
                      $charge = DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('charge');
                      $charge = str_replace(',','',$charge);
                      $charge = (int)$charge;
                      $insurance = DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('insurance');
                      $insurance = str_replace(',','',$insurance);
                      $insurance = (int)$insurance;
                      $overstop = DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('overstop');
                      $overstop = str_replace(',','',$overstop);
                      $overstop = (int)$overstop;
                      $deduct = DB::table('works')->where('staff_id',$value->id)->orderBy('id','desc')->value('deduct');
                      $deduct = str_replace(',','',$deduct);
                      $deduct = (int)$deduct;
                      if($late == 0 && $absence == 0)
                      $salary = (($salary+1000)+($wage+$charge))-$overstop-$insurance-$deduct;
                      elseif($late != 0 || $absence != 0)
                      $salary = ($salary+$wage+$charge)-$overstop-$insurance-$deduct;
                      $salary = number_format($salary);
                    ?>
                    <td style="color: red;">{{$salary}}</td>
                    <td>
                      <a href="{{url('/header/work-information')}}/{{$value->id}}">
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
                  {{ $staffs->links() }}
                </ul>
              </nav>
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
            <form action="{{url('/header/work-absence')}}" method="POST" enctype="multipart/form-data" autocomplete="off">@csrf
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
                    <p>ค่าแรง 10% : <input type="text" name="wage" class="form-control form-control-alternative" value="0"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p>บวกอื่นๆ : <input type="text" name="charge" class="form-control form-control-alternative" value="0"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p>ขาด (วัน) : <input type="text" name="absence" class="form-control form-control-alternative" value="0"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p>สาย (วัน) : <input type="text" name="late" class="form-control form-control-alternative" value="0"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p>ค่าประกันสังคม : <input type="text" name="insurance" class="form-control form-control-alternative" value="0"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p>ขาดงานเกิน 3 คน : <input type="text" name="overstop" class="form-control form-control-alternative" value="0"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <p>หักอื่นๆ : <input type="text" name="deduct" class="form-control form-control-alternative" value="0"></p>
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
