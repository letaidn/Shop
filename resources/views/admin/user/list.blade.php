@extends('admin.layout.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Quản lý sản phẩm</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh sách người dùng</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <a class="btn btn-primary" href="admin/User/add">
                            <i class="fa fa-plus"></i>Thêm quản lý
                        </a>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Bảng danh sách người dùng
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
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Quyền</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($user as $item)
                                <tr>
                                    <td>{{$item->FirstName}} {{$item->LastName}}</td>
                                	<td>{{$item->email}}</td>
                                	<td>{{$item->Role->Name}}</td>
                                    <td><a href="admin/User/delete/{{$item->ID}}" class="btn btn-danger btn-block frmRemove">Xoá</a></td>
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
                                                <a class="page-link" href="{{$user->previousPageUrl()}}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <?php 
                                                for ($i=1,$n =  $user->lastPage(); $i <= $n ; $i++) { 
                                                    # code...
                                                    if($i == $user->currentPage())
                                                        echo '<li class="page-item active">
                                                    <a class="page-link" href="'.$user->url($i).'">
                                                        '.$i.'
                                                    </a>
                                                </li>';
                                                    else echo '<li class="page-item">
                                                    <a class="page-link" href="'.$user->url($i).'">
                                                        '.$i.'
                                                    </a>
                                                </li>';
                                                }
                                             ?>
                                            <li class="page-item">
                                                <a class="page-link" href="{{$user->nextPageUrl()}}" aria-label="Next">
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