@extends('layouts.loginLayout')

@section('content')
<div id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Đăng nhập</h3></div>
                        <div class="card-body">
                            <form action="login" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control py-4" name="Email" id="inputEmailAddress" type="email" placeholder="Nhập địa chỉ email" />
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputPassword">Mật khẩu</label>
                                    <input class="form-control py-4" name="Password" id="inputPassword" type="password" placeholder="Nhập mật khẩu" />
                                </div>
                                
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    
                                    <button class="btn btn-primary">Đăng nhập</button>
                                </div>
                            </form>
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}
                                    @endforeach
                                    </div>
                            @endif
                            @if(session('thongbao'))
                                <div class="alert alert-danger"><span>{{session('thongbao')}}</span></div><br>
                            @endif
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="register">Chưa có tài khoản? Đăng kí!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection