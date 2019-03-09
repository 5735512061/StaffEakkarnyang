@extends("/template/template-admin")

@section("content")
<div class="col-xl-12 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <p class="mb-0">เข้าสู่ระบบ</p>
            </div>
          </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">@csrf
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="admin_name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อเข้าใช้งานระบบ') }}</label>

                                <div class="col-md-6">
                                    <input id="admin_name" type="text" class="form-control{{ $errors->has('admin_name') ? ' is-invalid' : '' }}" name="admin_name" value="{{ old('admin_name') }}" required autofocus>

                                    @if ($errors->has('admin_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('admin_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('รหัสผ่าน') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <button type="submit" class="btn btn-info">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection