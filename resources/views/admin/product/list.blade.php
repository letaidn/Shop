@extends('admin.layout.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Quản lý sản phẩm</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh sách sản phẩm</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <a class="btn btn-primary" href="admin/Product/add">
                            <i class="fa fa-plus"></i>Thêm sản phẩm
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
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Đơn giá</th>
                                    <th>Giảm giá %</th>
                                    <th>Tồn kho</th>
                                    <th>Phân loại</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($product as $item)
                                <tr>
                                    <td>{{$item->ID}}</td>
                                    <td>{{$item->Name}}</td>
                                    <td><a href="admin/Product/listImg/{{$item->ID}}" class="btn btn-link">Chi tiết</a></td>
                                    <td>{{$item->Price}}</td>
                                    <td>
                                    @if($item->Discount >0)
                                        {{$item->Discount}}
                                    @endif
                                    </td>
                                    <td>{{$item->Stock}}</td>
                                    <td>{{$item->Category->Name}}</td>
                                    <td><a href="admin/Product/update/{{$item->ID}}" class="btn btn-primary btn-block">Sửa</a></td>
                                    <td><a href="admin/Product/delete/{{$item->ID}}" class="btn btn-danger btn-block frmRemove">Xoá</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <center>
                            <div class="row">
                                <div class="col-12">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="{{$product->previousPageUrl()}}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <?php 
                                                for ($i=1,$n =  $product->lastPage(); $i <= $n ; $i++) { 
                                                    # code...
                                                    if($i == $product->currentPage())
                                                        echo '<li class="page-item active">
                                                    <a class="page-link" href="'.$product->url($i).'">
                                                        '.$i.'
                                                    </a>
                                                </li>';
                                                    else echo '<li class="page-item">
                                                    <a class="page-link" href="'.$product->url($i).'">
                                                        '.$i.'
                                                    </a>
                                                </li>';
                                                }
                                             ?>
                                            <li class="page-item">
                                                <a class="page-link" href="{{$product->nextPageUrl()}}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </center>
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