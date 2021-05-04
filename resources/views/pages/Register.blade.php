@extends('layouts.loginLayout')

@section('content')
<div id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Tạo tài khoản</h3></div>
                        <div class="card-body">
                            @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}
                                @endforeach
                            </div>
                            @endif
                                @if(session('thongbao'))
                                    <div class="alert alert-success">{{session('thongbao')}}</div>
                                @endif
                            <form action="register" method="POST" class="">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName">Tên</label>
                                            <input class="form-control py-4" name="FirstName" id="inputFirstName" type="text" placeholder="Enter first name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Họ</label>
                                            <input class="form-control py-4" name="LastName" id="inputLastName" type="text" placeholder="Enter last name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control py-4" name="Email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Mật khẩu</label>
                                            <input class="form-control py-4" name="Password" id="inputPassword" type="password" placeholder="Enter password" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputConfirmPassword">Xác thực mật khẩu</label>
                                            <input class="form-control py-4" name="ConfirmPassword" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Tạo tài khoản</button></div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <div class="small"><a href="login">Đã có tài khoản? Quay lại đăng nhập</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection