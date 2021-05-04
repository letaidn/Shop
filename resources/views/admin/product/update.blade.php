@extends('admin.layout.index')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Sửa sản phẩm</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="admin/Product/list">Danh sách sản phẩm</a></li>
                <li class="breadcrumb-item active">Sửa sản phẩm</li>
            </ol>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Sửa sản phẩm
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
                        <form action="admin/Product/update/{{$product->ID}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="inputName" class=" mb-1">Tên sản phẩm</label>
                                <input type="text" name="Name" class="form-control" value="{{$product->Name}}">
                            </div>
                            <div class="form-group">
                                <label for="inputSize" class=" mb-1">Loại sản phẩm</label>
                                <select class="form-control" name="Category">
                                    @foreach($category as $item)
                                        <option value="{{$item->ID}}">{{$item->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputPrice" class=" mb-1">Giá sản phẩm</label>
                                <input type="number" class="form-control" name="Price" value="{{$product->Price}}">
                            </div>
                            <div class="form-group">
                                <label for="" class=" mb-1">Số lượng sản phẩm</label>
                                <input type="number" class="form-control" name="Stock" value="{{$product->Stock}}">
                            </div>
                            <div class="form-group">
                                <label for="" class=" mb-1">Mô tả</label>
                                <textarea rows="4"  class="form-control ckeditor"name="Description">{{$product->Description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class=" mb-1">Giảm giá</label>
                                <input type="number" class="form-control" name="Discount" value="{{$product->Discount}}">
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