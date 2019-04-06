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
        <div class="col-lg-12">
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