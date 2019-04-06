@extends("/template/template-header")

@section("content")
<div class="container">
	<div class="row">
        <div class="col-lg-4">
            <div class="profile-card-4 z-depth-3">
            	<div class="card">
	              	<div class="card-body text-center bg-primary rounded-top">
		               	<div class="user-box">
		                	<img src="{{url('images')}}/{{$history->image}}" alt="{{$history->name}}">
		              	</div>
		              <h2 class="mb-1 text-white">{{$history->nickname}}</h2>
		              <h3 class="text-light">{{$history->name}} {{$history->surname}}</h3>
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
		                    <p>ชื่อ : {{$history->name}} {{$history->surname}}</p>
		                </div>
		                <div class="col-md-3">
		                    <p>ชื่อเล่น : {{$history->nickname}}</p>
		                </div>
		                <div class="col-md-4">
		                    <p>ศาสนา : {{$history->religion}}</p>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-6">
		                    <p>เลขบัตรประชาชน : {{$history->idcard}}</p>
		                </div>
		                <div class="col-md-6">
		                    <p>วันเกิด : {{$history->bday}}</p>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-5">
		                    <p>เบอร์โทรศัพท์ : {{$history->tel}}</p>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <p>ที่อยู่ : {{$history->address}} หมู่ {{$history->moo}} ตำบล{{$history->district}} อำเภอ{{$history->amphoe}} จังหวัด{{$history->province}} {{$history->zipcode}}</p>
		                </div>
		            </div>

		            <h2 class="mb-3">ข้อมูลการทำงาน</h2>
		            <div class="row">
		                <div class="col-md-4">
		                    <p>ตำแหน่ง : {{$history->position}}</p>
		                </div>
		                <div class="col-md-5">
		                    <p>วันที่เริ่มงาน : {{$history->startdate}}</p>
		                </div>
		                <div class="col-md-3">
		                    <p>เงินเดือน : {{number_format((float)$history->salary)}}</p>
		                </div>
		            </div>
		            <div class="row">
		            	<div class="col-md-4">
		                    <p>สาขา : {{$history->branch}}</p>
		                </div><div class="col-md-8">
		                    <p>หมายเหตุ : {{$history->comment}}</p>
		                </div>
		            </div>
        		</div>
      		</div>
      	</div>
    </div>
</div>
@endsection