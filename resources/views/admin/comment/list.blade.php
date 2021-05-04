@extends('admin.layout.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Quản lý danh sách bình luận</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                <li class="breadcrumb-item active">Danh sách bình luận</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Bảng danh sách bình luận
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
                                <tr >
                                    <th>Người bình luận</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Bình luận</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach($comments as $item)
                             	<tr>
                             		<td>{{$item->user->FirstName}} {{$item->user->LastName}}</td>
                             		<td>{{$item->product->Name}}</td>
                             		<td>{{$item->Comment}}</td>
                             		<td><a href="admin/Comment/delete/{{$item->ID}}" class="btn btn-danger btn-block frmRemove">Xoá</a></td>
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
                                                <a class="page-link" href="{{$comments->previousPageUrl()}}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <?php 
                                                for ($i=1,$n =  $comments->lastPage(); $i <= $n ; $i++) { 
                                                    # code...
                                                    if($i == $comments->currentPage())
                                                        echo '<li class="page-item active">
                                                    <a class="page-link" href="'.$comments->url($i).'">
                                                        '.$i.'
                                                    </a>
                                                </li>';
                                                    else echo '<li class="page-item">
                                                    <a class="page-link" href="'.$comments->url($i).'">
                                                        '.$i.'
                                                    </a>
                                                </li>';
                                                }
                                             ?>
                                            <li class="page-item">
                                                <a class="page-link" href="{{$comments->nextPageUrl()}}" aria-label="Next">
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

