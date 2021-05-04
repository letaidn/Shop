@extends('admin.layout.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Thêm quản lý</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="admin/User/list">Danh sách người dùng</a></li>
                <li class="breadcrumb-item active">Thêm quản lý</li>
            </ol>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Thêm quản lý
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                        <form action="admin/User/add" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputPrice" class=" mb-1">Email người dùng</label>
                                <input type="email" class="form-control" name="Email">
                            </div>
                            <div class="form-group">
                                <label for="inputLastName" class=" mb-1">Tên người dùng</label>
                                <input type="text" class="form-control" name="LastName">
                            </div>
                            <div class="form-group">
                                <label for="inputFirstName" class=" mb-1">Họ người dùng</label>
                                <input type="text" class="form-control" name="FirstName">
                            </div>
                            <div class="form-group">
                                <label for="" class=" mb-1">Mật khẩu</label>
                                <input type="password" class="form-control" name="Password">
                            </div>
                            <div class="form-group">
                                <label for="" class=" mb-1">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" name="ConfirmPassword">
                            </div>
                            <div class="form-group">
                                <label for="" class=" mb-1">Quyền: </label>
                                <label class="radio-inline mb-1">
                                    <input type="radio" name="rdoStatus" checked="" value="1" id=""> Quản lý
                                </label>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between ">
                <div class="text-muted">Copyright &copy; Your Website 2020</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection