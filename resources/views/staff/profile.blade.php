@extends("/template/template-staff")

@section("content")
<div class="row">
    <div class="col-xl-3 col-lg-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <a href="{{url('/staff/work-information')}}">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">เงินเดือน</h5>
                <span class="h3 font-weight-bold mb-0">{{ number_format((float)auth('staff')->user()->salary) }}</span>
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
        <a href="{{url('/staff/fund')}}">
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
        <a href="{{url('/staff/work-information')}}">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">วันหยุด</h5>
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
  </div>
	<div class="row" style="margin-top: 20px;">
        <div class="col-lg-4">
            <div class="profile-card-4 z-depth-3">
            	<div class="card">
	              	<div class="card-body text-center bg-primary rounded-top">
		               	<div class="user-box">
		                	<img src="{{url('images')}}/{{ auth('staff')->user()->image }}" alt="{{ auth('staff')->user()->name }}">
		              	</div>
		              <h2 class="mb-1 text-white">{{ auth('staff')->user()->nickname }}</h2>
		              <h3 class="text-light">{{ auth('staff')->user()->name }} {{ auth('staff')->user()->surname }}</h3>
	             	</div>
	              	<div class="card-body">
		                <ul class="list-group shadow-none">
		                	<li class="list-group-item">
			                  <div class="list-details">

			                  </div>
			                </li>
		                </ul>
	               	</div>
             	</div>
            </div>
        </div>
        <div class="col-lg-8">
           	<div class="card z-depth-3">
            	<div class="card-body">
		            <h2 class="mb-3">ข้อมูลส่วนตัว</h2>
		            <div class="row">
		                <div class="col-md-4">
		                    <p>ชื่อ : {{ auth('staff')->user()->name }} {{ auth('staff')->user()->surname }}</p>
		                </div>
		                <div class="col-md-3">
		                    <p>ชื่อเล่น : {{ auth('staff')->user()->nickname }}</p>
		                </div>
		                <div class="col-md-4">
		                    <p>ศาสนา : {{ auth('staff')->user()->religion }}</p>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-6">
		                    <p>เลขบัตรประชาชน : {{ auth('staff')->user()->idcard }}</p>
		                </div>
		                <div class="col-md-6">
		                    <p>วันเกิด : {{ auth('staff')->user()->bday }}</p>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-5">
		                    <p>เบอร์โทรศัพท์ : {{ auth('staff')->user()->tel }}</p>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <p>ที่อยู่ : {{auth('staff')->user()->address}} หมู่ {{auth('staff')->user()->moo}} ตำบล{{auth('staff')->user()->district}} อำเภอ{{auth('staff')->user()->amphoe}} จังหวัด{{auth('staff')->user()->province}} {{auth('staff')->user()->zipcode}}</p>
		                </div>
		            </div>

		            <h2 class="mb-3">ข้อมูลการทำงาน</h2>
		            <div class="row">
		                <div class="col-md-4">
		                    <p>ตำแหน่ง : {{auth('staff')->user()->position}}</p>
		                </div>
		                <div class="col-md-5">
		                    <p>วันที่เริ่มงาน : {{auth('staff')->user()->startdate}}</p>
		                </div>
		                <div class="col-md-3">
		                    <p>เงินเดือน : {{number_format((float)auth('staff')->user()->salary)}}</p>
		                </div>
		            </div>
		            <div class="row">
		            	<div class="col-md-4">
		                    <p>สาขา : {{auth('staff')->user()->branch}}</p>
		                </div><div class="col-md-8">
		                    <p>หมายเหตุ : {{auth('staff')->user()->comment}}</p>
		                </div>
		            </div>
        		</div>
      		</div>
      	</div>
      	<div class="col-lg-12" style="margin-top: 20px;">
           	<div class="card z-depth-3">
            	<div class="card-body">
            		<div class="row">
                  <div class="col-md-4">
                    <p>ขาดงาน {{$absenceyear}} วัน สาย {{$late}} วัน</p>
                    <p>สรุป : ขาดงาน {{$absencelate}} วัน สาย {{$balance}} วัน</p>
                  </div>
        <div class="col">
          <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  	<th>#</th>
                    <th>ปี</th>
                    <th>เดือน</th>
                    <th>เงินเดือน</th>
                    <th>ค่าแรง 10%</th>
                    <th>บวกอื่นๆ</th>
                    <th>ขาด (วัน)</th>
                    <th>สาย (วัน)</th>
                    <th>เบี้ยขยัน</th>
                    <th>ค่าประกันสังคม</th>
                    <th>ขาดงานเกิน</th>
                    <th>หักอื่นๆ</th>
                    <th>หมายเหตุ</th>
                    <th>ยอดคงเหลือ</th>
                  </tr>
                </thead>
                @foreach($works as $work => $value)
                <tbody>
                  <tr>
                  	<td>{{$NUM_PAGE*($page-1) + $work+1}}</td>
                    <td>{{$value->year}}</td>
                    <td>{{$value->month}}</td>
                    <td><?php echo number_format((float)(DB::table('staffs')->where('id',$value->staff_id)->value('salary')));?></td>
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
                    <td>{{$value->comment}}</td>
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
        		</div>
      		</div>
      	</div>

        <div class="col-lg-12" style="margin-top: 20px;">
            <div class="card z-depth-3">
              <div class="card-body">
                <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>ปี</th>
                    <th>เดือน</th>
                    <th>เงินสะสม</th>
                    <th>ยอดรวม</th>
                  </tr>
                </thead>
                <?php $sum_fund = 0; ?>
                @foreach($funds as $fund => $value)
                <tbody>
                  <tr>
                    <td>{{$NUM_PAGE*($page-1) + $fund+1}}</td>
                    <td>{{$value->year}}</td>
                    <td>{{$value->month}}</td>
                    <td>{{number_format((float)$value->fund)}}</td>
                    <?php
                      $fund = str_replace(',','',$value->fund);
                      $sum_fund += floatval($fund);
                      $fund = number_format($sum_fund);
                    ?>
                    <td style="color: red;">{{$fund}}</td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  {{ $funds->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
            </div>
          </div>
        </div>
    </div>
@endsection