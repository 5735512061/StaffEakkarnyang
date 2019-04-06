@extends("/template/template-admin")

@section("content")
<div class="col-xl-12 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <p class="mb-0">ลงทะเบียนผู้ดูแล</p>
            </div>
          </div>
        </div>
        <div class="card-body">
            <form action="{{url('/admin/header-register')}}" method="POST" enctype="multipart/form-data" autocomplete="off">@csrf
	            <p>ข้อมูลการเข้าสู่ระบบ</p>
	            <div class="pl-lg-4">
		            <div class="row">
		                <div class="col-lg-4">
		                  <div class="form-group">
		                    <label class="form-control-label">ชื่อเข้าใช้งาน</label>
		                    <input type="text" name="header_name" class="form-control form-control-alternative">
		                  </div>
		                </div>
		                <div class="col-lg-4">
		                  <div class="form-group">
		                    <label class="form-control-label" for="input-country">รหัสผ่าน</label>
		                    <input type="password" name="password" class="form-control form-control-alternative">
		                  </div>
		                </div>
		                <div class="col-lg-4">
		                  <div class="form-group">
		                    <label class="form-control-label" for="input-country">รูปภาพ</label>
		                    <input type="file" name="image" class="form-control form-control-alternative">
		                  </div>
		                </div>
		                <input type="hidden" class="form-control" name="admin_id" value="{{Auth::user()->id}}">
				        <div class="col-lg-7 col-md-10">
				            <button type="submit" class="btn btn-info">บันทึกข้อมูล</button>
				        </div>
				    </div>
	            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.20/js/uikit.min.js"></script>

@endsection