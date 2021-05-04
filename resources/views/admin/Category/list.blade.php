@extends('admin.layout.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Quản lý danh sách phân loại</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh sách phân loại</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <a class="btn btn-primary" href="admin/Category/add">
                            <i class="fa fa-plus"></i>Thêm loại sản phẩm
                        </a>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Bảng danh sách sản phẩm
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
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên loại sản phẩm</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                             @foreach($category as $item)
                             	<tr>
                             		<td>{{$item->ID}}</td>
                             		<td>{{$item->Name}}</td>
                             		<td><a href="admin/Category/update/{{$item->ID}}" class="btn btn-primary btn-block">Sửa</a></td>
                             		<td><a href="admin/Category/delete/{{$item->ID}}" class="btn btn-danger btn-block frmRemove">Xoá</a></td>
                             	</tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$category->links()}}
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
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

