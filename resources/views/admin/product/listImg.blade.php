@extends('admin.layout.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Hình ảnh sản phẩm</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="admin/Product/list">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="admin/Product/list">Danh sách sản phẩm</a></li>
                <li class="breadcrumb-item active">Hình ảnh sản phẩm</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <form action="admin/Product/listImg/{{$product->ID}}" method="POST" enctype="multipart/form-data">@csrf
                            <input type="file" name="Image" value="" placeholder="">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Bảng danh sách hình ảnh {{$product->Name}}
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
                                    <th>Hình ảnh</th>
                                    <th></th>
                                </tr>
                            </thead>
                                @foreach($productImg as $item)
                                    <tr>
                                        <td>
                                            <img src="upload/ProductImg/{{$item->Name}}" style="height: 300px;" alt="">
                                        </td>
                                        <td><a href="admin/Product/deleteImg/{{$item->ID}}" class="btn btn-danger btn-block frmRemove">Xoá</a></td>
                                    </tr>
                                @endforeach
                                
                            <tbody>
                                
                            </tbody>
                        </table>
                        <center>
                            <div class="row">
                                <div class="col-12">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </center>
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