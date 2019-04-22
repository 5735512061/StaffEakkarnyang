@extends("/template/template-header")

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
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>ตำแหน่ง</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>เงินเดือน</th>
                    <th>วันลาเหลือ (วัน)</th>
                    <th>โบนัส</th>
                  </tr>
                </thead>
                @foreach($khokklois as $khokkloi => $value)
                <tbody>
                  <tr>
                    <td>{{$NUM_PAGE*($page-1) + $khokkloi+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->position}}</td>
                    <td>{{$value->startdate}}</td>
                    <td>{{number_format((float)$value->salary)}}</td>
                    <?php  
                      $absence = (int)DB::table('works')->where('staff_id',$value->id)->sum('absence');
                      $salary = DB::table('staffs')->where('id',$value->id)->value('salary');
                      $fundss = DB::table('funds')->where('staff_id',$value->id)->get();
                      
                      $absence = 25-$absence;
              
                      $lates = DB::table('works')->where('staff_id',$value->id)->get();
                      $sum_late = 0;  
                      $late = 0;
                      foreach ($lates as $late => $value) {
                          $late = str_replace(',','',$value->late);
                          $sum_late += floatval($late);
                          $late = number_format($sum_late);
                      }
                      
                      if($late > 5 || $late == 0) {
                          $balance = $late%5;
                          $absencelate = (25-$absence)+(($late-$balance)/5);
                          $absence = 25-$absencelate;
                      }
                      else {
                          $balance = $late;
                          $absencelate = $late;
                      }

                      if($absence > 0) {
                          $bonus = $salary;
                      } 
                      elseif($absence == 0 || $absence < 0) {
                          $bonus = 0;
                      }
                    ?>
                    <td>{{$absence}}</td>
                    <td  style="color: red;">{{number_format((float)$bonus)}}</td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  {{ $khokklois->links() }}
                </ul>
              </nav>
            </div>
          </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-phangnga" role="tabpanel" aria-labelledby="tabs-icons-text-phangnga-tab">
            <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>ตำแหน่ง</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>เงินเดือน</th>
                    <th>วันลาเหลือ (วัน)</th>
                    <th>โบนัส</th>
                  </tr>
                </thead>
                @foreach($phangngas as $phangnga => $value)
                <tbody>
                  <tr>
                    <td>{{$NUM_PAGE*($page-1) + $phangnga+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->position}}</td>
                    <td>{{$value->startdate}}</td>
                    <td>{{number_format((float)$value->salary)}}</td>
                    <?php  
                      $absence = (int)DB::table('works')->where('staff_id',$value->id)->sum('absence');
                      $salary = DB::table('staffs')->where('id',$value->id)->value('salary');
                      $fundss = DB::table('funds')->where('staff_id',$value->id)->get();
                      
                      $absence = 25-$absence;

                      $lates = DB::table('works')->where('staff_id',$value->id)->get();
                      $sum_late = 0;  
                      $late = 0;
                      foreach ($lates as $late => $value) {
                          $late = str_replace(',','',$value->late);
                          $sum_late += floatval($late);
                          $late = number_format($sum_late);
                      }
                      
                      if($late > 5 || $late == 0) {
                          $balance = $late%5;
                          $absencelate = (25-$absence)+(($late-$balance)/5);
                          $absence = 25-$absencelate;
                      }
                      else {
                          $balance = $late;
                          $absencelate = $late;
                      }

                      if($absence > 0) {
                          $bonus = $salary;
                      } 
                      elseif($absence == 0 || $absence < 0) {
                          $bonus = 0;
                      }
                    ?>
                    <td>{{$absence}}</td>
                    <td  style="color: red;">{{number_format((float)$bonus)}}</td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  {{ $phangngas->links() }}
                </ul>
              </nav>
            </div>
          </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-bypass" role="tabpanel" aria-labelledby="tabs-icons-text-bypass-tab">
                <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>ตำแหน่ง</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>เงินเดือน</th>
                    <th>วันลาเหลือ (วัน)</th>
                    <th>โบนัส</th>
                  </tr>
                </thead>
                @foreach($bypasss as $bypass => $value)
                <tbody>
                  <tr>
                    <td>{{$NUM_PAGE*($page-1) + $bypass+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->position}}</td>
                    <td>{{$value->startdate}}</td>
                    <td>{{number_format((float)$value->salary)}}</td>
                    <?php  
                      $absence = (int)DB::table('works')->where('staff_id',$value->id)->sum('absence');
                      $salary = DB::table('staffs')->where('id',$value->id)->value('salary');
                      $fundss = DB::table('funds')->where('staff_id',$value->id)->get();
                      
                      $absence = 25-$absence;
              
                      $lates = DB::table('works')->where('staff_id',$value->id)->get();
                      $sum_late = 0;  
                      $late = 0;
                      foreach ($lates as $late => $value) {
                          $late = str_replace(',','',$value->late);
                          $sum_late += floatval($late);
                          $late = number_format($sum_late);
                      }
                      
                      if($late > 5 || $late == 0) {
                          $balance = $late%5;
                          $absencelate = (25-$absence)+(($late-$balance)/5);
                          $absence = 25-$absencelate;
                      }
                      else {
                          $balance = $late;
                          $absencelate = $late;
                      }

                      if($absence > 0) {
                          $bonus = $salary;
                      } 
                      elseif($absence == 0 || $absence < 0) {
                          $bonus = 0;
                      }
                    ?>
                    <td>{{$absence}}</td>
                    <td  style="color: red;">{{number_format((float)$bonus)}}</td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  {{ $bypasss->links() }}
                </ul>
              </nav>
            </div>
          </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-thaiwatsadu" role="tabpanel" aria-labelledby="tabs-icons-text-thaiwatsadu-tab">
                <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>ตำแหน่ง</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>เงินเดือน</th>
                    <th>วันลาเหลือ (วัน)</th>
                    <th>โบนัส</th>
                  </tr>
                </thead>
                @foreach($thaiwatsadus as $thaiwatsadu => $value)
                <tbody>
                  <tr>
                    <td>{{$NUM_PAGE*($page-1) + $thaiwatsadu+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->position}}</td>
                    <td>{{$value->startdate}}</td>
                    <td>{{number_format((float)$value->salary)}}</td>
                    <?php  
                      $absence = (int)DB::table('works')->where('staff_id',$value->id)->sum('absence');
                      $salary = DB::table('staffs')->where('id',$value->id)->value('salary');
                      $fundss = DB::table('funds')->where('staff_id',$value->id)->get();
                      
                      $absence = 25-$absence;
              
                      $lates = DB::table('works')->where('staff_id',$value->id)->get();
                      $sum_late = 0;  
                      $late = 0;
                      foreach ($lates as $late => $value) {
                          $late = str_replace(',','',$value->late);
                          $sum_late += floatval($late);
                          $late = number_format($sum_late);
                      }
                      
                      if($late > 5 || $late == 0) {
                          $balance = $late%5;
                          $absencelate = (25-$absence)+(($late-$balance)/5);
                          $absence = 25-$absencelate;
                      }
                      else {
                          $balance = $late;
                          $absencelate = $late;
                      }

                      if($absence > 0) {
                          $bonus = $salary;
                      } 
                      elseif($absence == 0 || $absence < 0) {
                          $bonus = 0;
                      }
                    ?>
                    <td>{{$absence}}</td>
                    <td  style="color: red;">{{number_format((float)$bonus)}}</td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  {{ $thaiwatsadus->links() }}
                </ul>
              </nav>
            </div>
          </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-chaofa" role="tabpanel" aria-labelledby="tabs-icons-text-chaofa-tab">
                <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>ตำแหน่ง</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>เงินเดือน</th>
                    <th>วันลาเหลือ (วัน)</th>
                    <th>โบนัส</th>
                  </tr>
                </thead>
                @foreach($chaofas as $chaofa => $value)
                <tbody>
                  <tr>
                    <td>{{$NUM_PAGE*($page-1) + $chaofa+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->position}}</td>
                    <td>{{$value->startdate}}</td>
                    <td>{{number_format((float)$value->salary)}}</td>
                    <?php  
                      $absence = (int)DB::table('works')->where('staff_id',$value->id)->sum('absence');
                      $salary = DB::table('staffs')->where('id',$value->id)->value('salary');
                      $fundss = DB::table('funds')->where('staff_id',$value->id)->get();
                      
                      $absence = 25-$absence;
              
                      $lates = DB::table('works')->where('staff_id',$value->id)->get();
                      $sum_late = 0;  
                      $late = 0;
                      foreach ($lates as $late => $value) {
                          $late = str_replace(',','',$value->late);
                          $sum_late += floatval($late);
                          $late = number_format($sum_late);
                      }
                      
                      if($late > 5 || $late == 0) {
                          $balance = $late%5;
                          $absencelate = (25-$absence)+(($late-$balance)/5);
                          $absence = 25-$absencelate;
                      }
                      else {
                          $balance = $late;
                          $absencelate = $late;
                      }

                      if($absence > 0) {
                          $bonus = $salary;
                      } 
                      elseif($absence == 0 || $absence < 0) {
                          $bonus = 0;
                      }
                    ?>
                    <td>{{$absence}}</td>
                    <td  style="color: red;">{{number_format((float)$bonus)}}</td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  {{ $chaofas->links() }}
                </ul>
              </nav>
            </div>
          </div>
            </div>
            <div class="tab-pane fade" id="tabs-icons-text-thalang" role="tabpanel" aria-labelledby="tabs-icons-text-thalang-tab">
                <div class="card shadow">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ชื่อเล่น</th>
                    <th>ตำแหน่ง</th>
                    <th>วันที่เริ่มงาน</th>
                    <th>เงินเดือน</th>
                    <th>วันลาเหลือ (วัน)</th>
                    <th>โบนัส</th>
                  </tr>
                </thead>
                @foreach($thalangs as $thalang => $value)
                <tbody>
                  <tr>
                    <td>{{$NUM_PAGE*($page-1) + $thalang+1}}</td>
                    <td>{{$value->name}} {{$value->surname}}</td>
                    <td>{{$value->nickname}}</td>
                    <td>{{$value->position}}</td>
                    <td>{{$value->startdate}}</td>
                    <td>{{number_format((float)$value->salary)}}</td>
                    <?php  
                      $absence = (int)DB::table('works')->where('staff_id',$value->id)->sum('absence');
                      $salary = DB::table('staffs')->where('id',$value->id)->value('salary');
                      $fundss = DB::table('funds')->where('staff_id',$value->id)->get();
                      
                      $absenceyear = $absence;
                      $absence = 25-$absence;
              
                      $lates = DB::table('works')->where('staff_id',$value->id)->get();
                      $sum_late = 0;  
                      $late = 0;
                      foreach ($lates as $late => $value) {
                          $late = str_replace(',','',$value->late);
                          $sum_late += floatval($late);
                          $late = number_format($sum_late);
                      }
                      
                      if($late > 5 || $late == 0) {
                          $balance = $late%5;
                          $absencelate = (25-$absence)+(($late-$balance)/5);
                          $absence = 25-$absencelate;
                      }
                      else {
                          $balance = $late;
                          $absencelate = $late;
                      }

                      if($absence > 0) {
                          $bonus = $salary;
                      } 
                      elseif($absence == 0 || $absence < 0) {
                          $bonus = 0;
                      }
                    ?>
                    <td>{{$absence}}</td>
                    <td  style="color: red;">{{number_format((float)$bonus)}}</td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  {{ $thalangs->links() }}
                </ul>
              </nav>
            </div>
          </div>
            </div>
        </div>
    </div>
</div>

@endsection