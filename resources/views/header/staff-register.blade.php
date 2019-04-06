@extends("/template/template-header")
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="{{asset('jquery.Thailand.js/dist/jquery.Thailand.min.css')}}">
@section("content")
<div class="col-xl-12 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <p class="mb-0">ลงทะเบียนพนักงาน</p>
            </div>
          </div>
        </div>
        <div class="card-body">
            <form action="{{url('/header/staff-register')}}" method="POST" enctype="multipart/form-data" autocomplete="off">@csrf
                <div class="pl-lg-4">
	                <div class="row">
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">ชื่อพนักงาน</label>
	                        <input type="text" name="name" class="form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">นามสกุล</label>
	                        <input type="text" name="surname" class="form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">ชื่อเล่น</label>
	                        <input type="text" name="nickname" class="form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">เลขบัตรประชาชน</label>
	                        <input type="text" name="idcard" class="idcard form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">ศาสนา</label>
	                        <input type="text" name="religion" class="form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">วัน/เดือน/ปีเกิด</label>
	                        <input type="text" name="bday" data-date-format="dd/mm/yyyy" id="bdaypicker" class="form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">เบอร์โทรศัพท์</label>
	                        <input type="text" name="tel" class="phone_format form-control form-control-alternative">
	                      </div>
	                    </div>
	                </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <p>ข้อมูลการติดต่อ</p>
	            <div class="pl-lg-4">
		            <div class="row">
		                <div class="col-lg-4">
		                  <div class="form-group">
		                    <label class="form-control-label">บ้านเลขที่</label>
		                    <input type="text" name="address" class="form-control form-control-alternative">
		                  </div>
		                </div>
		                <div class="col-lg-4">
		                  <div class="form-group">
		                    <label class="form-control-label" for="input-country">หมู่ที่</label>
		                    <input type="text" name="moo" class="form-control form-control-alternative">
		                  </div>
		                </div>
		                <div class="col-lg-4">
		                  <div class="form-group">
		                    <label class="form-control-label" for="input-country">ตำบล</label>
		                    <input type="text" name="district" class="form-control form-control-alternative">
		                  </div>
		                </div>
		                <div class="col-lg-4">
		                  <div class="form-group">
		                    <label class="form-control-label" for="input-city">อำเภอ</label>
		                    <input type="text" name="amphoe" class="form-control form-control-alternative">
		                  </div>
		                </div>
		                <div class="col-lg-4">
		                  <div class="form-group">
		                    <label class="form-control-label" for="input-country">จังหวัด</label>
		                    <input type="text" name="province" class="form-control form-control-alternative">
		                  </div>
		                </div>
		                <div class="col-lg-4">
		                  <div class="form-group">
		                    <label class="form-control-label" for="input-country">รหัสไปรษณีย์</label>
		                    <input type="text" name="zipcode" class="form-control form-control-alternative">
		                  </div>
		                </div>
				    </div>
	            </div>
	            <hr class="my-4" />
                <!-- Address -->
                <p>ข้อมูลการทำงาน</p>
	            <div class="pl-lg-4">
		            <div class="row">
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">ตำแหน่ง</label>
	                        <select name="position" class="form-control form-control-alternative">
								<option>กรุณาเลือกตำแหน่งงาน</option>
								<option>ผู้จัดการ</option>
								<option>หัวหน้าช่าง</option>
								<option>ที่ปรึกษาด้านบริการ</option>
								<option>ที่ปรึกษาด้านบริการ ฝ่ายช่าง</option>
								<option>ช่าง</option>
								<option>ไอที</option>
	                        </select>
	                      </div>
	                    </div>
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">วันที่เริ่มงาน</label>
	                        <input type="text" name="startdate" data-date-format="dd/mm/yyyy" id="datepicker" class="form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">เงินเดือน</label>
	                        <input type="text" name="salary" class="form-control form-control-alternative">
	                      </div>
	                    </div>
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">สาขา</label>
	                        <select name="branch" class="form-control form-control-alternative">
								<option>กรุณาเลือกสาขาที่ทำงาน</option>
								<option>สาขาโคกกลอย</option>
								<option>สาขาเมืองพังงา</option>
								<option>สาขาบายพาส</option>
								<option>สาขาไทวัสดุ</option>
								<option>สาขาเจ้าฟ้า</option>
								<option>สาขาถลาง</option>
	                        </select>
	                      </div>
	                    </div>
	                    <div class="col-lg-4">
	                      <div class="form-group">
	                        <label class="form-control-label">หมายเหตุ</label>
	                        <input type="text" name="comment" class="form-control form-control-alternative" value="-">
	                      </div>
	                    </div>
				    </div>
	            </div>
	            <hr class="my-4" />
	            <p>ข้อมูลการเข้าสู่ระบบ</p>
	            <div class="pl-lg-4">
		            <div class="row">
		                <div class="col-lg-4">
		                  <div class="form-group">
		                    <label class="form-control-label">ชื่อเข้าใช้งาน</label>
		                    <input type="text" name="staff_name" class="form-control form-control-alternative">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="{{asset('jquery.Thailand.js/dependencies/zip.js/zip.js')}}"></script>
<script type="text/javascript" src="{{asset('jquery.Thailand.js/dependencies/JQL.min.js')}}"></script>
<script type="text/javascript" src="{{asset('jquery.Thailand.js/dependencies/typeahead.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('jquery.Thailand.js/dist/jquery.Thailand.min.js')}}"></script>
<script>
	// phone
	function phoneFormatter() {
        $('input.phone_format').on('input', function() {
            var number = $(this).val().replace(/[^\d]/g, '')
                if (number.length >= 5 && number.length < 10) { number = number.replace(/(\d{3})(\d{2})/, "$1-$2"); } else if (number.length >= 10) {
                    number = number.replace(/(\d{3})(\d{3})(\d{3})/, "$1-$2-$3"); 
                }
            $(this).val(number)
            $('input.phone_format').attr({ maxLength : 12 });    
        });
    };
    $(phoneFormatter);

    // idcard
	function idFormatter() {
        $('input.idcard').on('input', function() {
            var number = $(this).val().replace(/[^\d]/g, '')
                if (number.length >= 10) {
                    number = number.replace(/(\d{1})(\d{4})(\d{5})(\d{2})(\d{1})/, "$1-$2-$3-$4-$5"); 
                }
            $(this).val(number)
            $('input.idcard').attr({ maxLength : 17 });    
        });
    };
    $(idFormatter);

    // startdate
    $('#datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());

    // bdate
    $('#bdaypicker').datepicker({
        autoclose: true,
        todayHighlight: true,
    });
    $('#bdaypicker').datepicker("setDate", new Date());
</script>

<script>
  (function (i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o), m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
       m.parentNode.insertBefore(a, m)
  })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-33058582-1', 'auto', {
        'name': 'Main'
      });
      ga('Main.send', 'event', 'jquery.Thailand.js', 'GitHub', 'Visit');
</script>

<script type="text/javascript">
  $.Thailand({
    database: '{{asset('jquery.Thailand.js/database/db.json')}}',
    $district: $('#demo1 [name="district"]'),
    $amphoe: $('#demo1 [name="amphoe"]'),
    $province: $('#demo1 [name="province"]'),
    $zipcode: $('#demo1 [name="zipcode"]'),
      onDataFill: function(data){
        console.info('Data Filled', data);
      },
      onLoad: function(){
        console.info('Autocomplete is ready!');
        $('#loader, .demo').toggle();
      }
  });

  $('#demo1 [name="district"]').change(function(){
    console.log('ตำบล', this.value);
  });
  $('#demo1 [name="amphoe"]').change(function(){
    console.log('อำเภอ', this.value);
  });
  $('#demo1 [name="province"]').change(function(){
    console.log('จังหวัด', this.value);
  });
  $('#demo1 [name="zipcode"]').change(function(){
    console.log('รหัสไปรษณีย์', this.value);
  });
</script>

@endsection