<!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="#">
        <img src="{{ asset('/img/brand/logo.png')}}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      @auth('staff')
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{url('images')}}/{{auth('staff')->user()->image}}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <a href="{{url('/staff/profile')}}" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>โปร์ไฟล์ส่วนตัว</span>
            </a>
            <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('staff.logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="ni ni-user-run"></i>{{ __('ออกจากระบบ') }}
              </a>
              <form id="logout-form" action="{{ 'App\Staff' == Auth::getProvider()->getModel() ? route('staff.logout') : route('staff.logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
          </div>
        </li>
      </ul>
      @endauth
      @guest
            
      @endauth
      
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="#">
                <img src="{{ asset('/img/brand/logo.png')}}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        @auth('staff')
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <!-- <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search"> -->
            <!-- <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div> -->
          </div>
        </form>
        @endauth
        @guest
            
        @endauth
        <!-- Navigation -->
        
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('/staff/profile')}}">
              <i class="ni ni-badge text-primary"></i> ข้อมูลส่วนตัว
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/staff/work-information')}}">
              <i class="ni ni-single-copy-04 text-primary"></i> ข้อมูลการทำงาน
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-money-coins text-primary"></i> ข้อมูลด้านการเงิน
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <!-- <a href="{{url('/staff/bonus')}}" class="dropdown-item">
                <span>โบนัสรายปี</span>
              </a> -->
              <a href="{{url('/staff/fund')}}" class="dropdown-item">
                <span>เงินกองทุนสะสม</span>
              </a>
            </div>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>

<!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        @auth('staff')
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <!-- <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div> -->
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="{{url('images')}}/{{auth('staff')->user()->image}}">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <a href="{{url('/staff/profile')}}" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>โปรไฟล์ส่วนตัว</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('staff.logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="ni ni-user-run"></i>{{ __('ออกจากระบบ') }}
              </a>
              <form id="logout-form" action="{{ 'App\Staff' == Auth::getProvider()->getModel() ? route('staff.logout') : route('staff.logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
            </div>
          </li>
        </ul>
        @endauth
        @guest
            
        @endauth
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
        </div>
      </div>
    </div>