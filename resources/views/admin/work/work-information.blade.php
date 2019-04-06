@extends("/template/template-admin")

@section("content")
	<div class="row">
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <a href="{{url('/admin/work-information')}}/{{$staff->id}}">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">เงินเดือน</h5>
                <span class="h3 font-weight-bold mb-0">{{number_format((float)$staff->salary)}}</span>
              </div>
              <div class="col-auto">
                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                  <i class="ni ni-money-coins"></i>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <a href="{{url('/admin/fund-information')}}/{{$staff->id}}">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">เงินกองทุนสะสม</h5>
              <?php
                $sum_fund = 0;  
                $fund = 0;
                foreach ($fundss as $fund => $value) {
                    $fund = str_replace(',','',$value->fund);
                    $sum_fund += floatval($fund);
                    $fund = number_format($sum_fund);
                }
              ?>
              <span class="h3 font-weight-bold mb-0">{{$fund}}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                <i class="fas fa-chart-bar"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">โบนัสรายปี</h5>
              <span class="h3 font-weight-bold mb-0">{{number_format((float)$bonus)}}</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                <i class="ni ni-chart-pie-35"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <a href="{{url('/admin/work-information')}}/{{$staff->id}}">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">วันหยุดต่อปี</h5>
              <span class="h3 font-weight-bold mb-0">เหลือ {{$absence}} วัน</span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                <i class="ni ni-calendar-grid-58"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>
    
    <div class="col" style="margin-top: 20px;">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row">
                <div class="col-md-4">
                  <p>ขาดงาน {{$absenceyear}} วัน สาย {{$late}} วัน</p>
                  <p>สรุป : ขาดงาน {{$absencelate}} วัน สาย {{$balance}} วัน</p>
                </div>
                <div class="col-md-8" style="text-align: right;">
                  <p class="btn">{{$staff->name}} {{$staff->surname}} ( {{$staff->nickname}} )<p>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th></th>
                    <th>#</th>
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
                  </tr>
                </thead>
                @foreach($works as $work => $value)
                <tbody>
                  <tr>
                    <td>
                      <a href="{{url('/admin/edit-work')}}/{{$value->id}}">
                          <i class="ni ni-settings" style="color:blue;"></i>
                      </a>
                      <input type="hidden" name="id" value="{{$value->id}}">
                    </td>
                  	<td>{{$NUM_PAGE*($page-1) + $work+1}}</td>
                    <td><?php echo number_format((float)(DB::table('staffs')->where('id',$value->staff_id)->value('salary')));?></td>
                    <td>{{$value->year}}</td>
                    <td>{{$value->month}}</td>
                    <td>+ {{number_format((float)$value->wage)}}</td>
                    <td>+ {{number_format((float)$value->charge)}}</td>
                    <td>{{$value->absence}}</td>
                    <td>{{$value->late}}</td>
                    <?php 
                      $late = $value->late;
                      $absence = $value->absence;
                    ?>
                    @if($late == 0 && $absence == 0)
                    <td>+ 1,000</td>
                    @else
                    <td>+ 0</td>
                    @endif
                    <td>- {{number_format((float)$value->insurance)}}</td>
                    <td>- {{number_format((float)$value->overstop)}}</td>
                    <td>- {{number_format((float)$value->deduct)}}</td>
                    <?php 
                      $salary = DB::table('staffs')->where('id',$value->staff_id)->value('salary');
                      $salary = str_replace(',','',$salary);
                      $salary = (int)$salary;
                      $wage = str_replace(',','',$value->wage);
                      $wage = (int)$wage;
                      $charge = str_replace(',','',$value->charge);
                      $charge = (int)$charge;
                      $insurance = str_replace(',','',$value->insurance);
                      $insurance = (int)$insurance;
                      $overstop = str_replace(',','',$value->overstop);
                      $overstop = (int)$overstop;
                      $deduct = str_replace(',','',$value->deduct);
                      $deduct = (int)$deduct;
                      if($late == 0 && $absence == 0)
                      $salary = (($salary+1000)+($wage+$charge))-$overstop-$insurance-$deduct;
                      elseif($late != 0 || $absence != 0)
                      $salary = ($salary+$wage+$charge)-$overstop-$insurance-$deduct;
                      $salary = number_format($salary);
                    ?>
                    <td style="color: red;">{{$salary}}</td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  {{ $works->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection
