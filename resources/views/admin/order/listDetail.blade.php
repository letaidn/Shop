@extends('admin.layout.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Quản lý đơn hàng</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="admin/home">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="admin/Order/list">Danh sách đơn hàng</a></li>
                <li class="breadcrumb-item active">Danh sách chi tiết đơn hàng</li>
            </ol>
            <!-- <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <a class="btn btn-primary" href="admin/Product/add">
                            <i class="fa fa-plus"></i>Thêm sản phẩm
                        </a>
                    </div>
                </div>
            </div> -->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Bảng danh sách chi tiết đơn hàng
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
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Kích thước</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($orderDetail as $item)
                                <tr>
                                    <td>{{$item->product->Name}}</td>
                                    <td>{{$item->Quantity}}</td>
                                    <td>{{$item->size->Name}}</td>
                                    <td>{{$item->product->Price * $item->Quantity * (100 - $item->product->Discount) /100}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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