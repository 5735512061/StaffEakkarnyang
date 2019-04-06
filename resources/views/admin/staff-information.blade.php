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
		                	<img src="{{url('images')}}/{{$staff->image}}" alt="{{$staff->name}}">
		              	</div>
		              <h2 class="mb-1 text-white">{{$staff->nickname}}</h2>
		              <h3 class="text-light">{{$staff->name}} {{$staff->surname}}</h3>
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
		                    <p>ชื่อ : {{$staff->name}} {{$staff->surname}}</p>
		                </div>
		                <div class="col-md-3">
		                    <p>ชื่อเล่น : {{$staff->nickname}}</p>
		                </div>
		                <div class="col-md-4">
		                    <p>ศาสนา : {{$staff->religion}}</p>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-6">
		                    <p>เลขบัตรประชาชน : {{$staff->idcard}}</p>
		                </div>
		                <div class="col-md-6">
		                    <p>วันเกิด : {{$staff->bday}}</p>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-5">
		                    <p>เบอร์โทรศัพท์ : {{$staff->tel}}</p>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <p>ที่อยู่ : {{$staff->address}} หมู่ {{$staff->moo}} ตำบล{{$staff->district}} อำเภอ{{$staff->amphoe}} จังหวัด{{$staff->province}} {{$staff->zipcode}}</p>
		                </div>
		            </div>

		            <h2 class="mb-3">ข้อมูลการทำงาน</h2>
		            <div class="row">
		                <div class="col-md-4">
		                    <p>ตำแหน่ง : {{$staff->position}}</p>
		                </div>
		                <div class="col-md-5">
		                    <p>วันที่เริ่มงาน : {{$staff->startdate}}</p>
		                </div>
		                <div class="col-md-3">
		                    <p>เงินเดือน : {{number_format((float)$staff->salary)}}</p>
		                </div>
		            </div>
		            <div class="row">
		            	<div class="col-md-4">
		                    <p>สาขา : {{$staff->branch}}</p>
		                </div><div class="col-md-8">
		                    <p>หมายเหตุ : {{$staff->comment}}</p>
		                </div>
		            </div>
        		</div>
      		</div>
      	</div>
    </div>
@endsection