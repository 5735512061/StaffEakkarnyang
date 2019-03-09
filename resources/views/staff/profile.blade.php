@extends("/template/template-staff")

@section("content")
<div class="container">
	<div class="row">
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
		                    <p>เงินเดือน : {{auth('staff')->user()->salary}}</p>
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
    </div>
</div>
@endsection