@extends('layouts.index')

@section('content')
<div class="card mb-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">
                    <h3>Thông tin cá nhân</h3>
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
                    <form action="updateInfor" method="POST" class="form">
                        @csrf
                        <div class="row">
                            <input type="hidden" class="form-control" id="" name="ID" value="{{$user->ID}}" required>

                            <div class="col-md-6 mb-3">
                                <label for="first_name">Họ </label>
                                <input type="text" class="form-control" id="first_name" value="{{$user->FirstName}}" name="FirstName" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Tên</label>
                                <input type="text" class="form-control" id="last_name" value="{{$user->LastName}}" name="LastName">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Địa chỉ email</label>
                                <input type="email" class="form-control" name="Email" value="{{$user->email}}" id="email_address" disabled>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Địa chỉ</label>
                                <input type="text" class="form-control" name="Address" value="{{$user->Address}}" id="address">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Số điện thoại</label>
                                <input type="text" class="form-control" name="Phone" value="{{$user->Phone}}" id="phone">
                            </div>
                            <button class=" btn karl-checkout-btn">Cập nhật</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <br><br>
                        <div class="order-details-confirmation">
                            <div class="cart-page-heading">
                                <h5>Đơn hàng</h5>
                            </div>
                            <ul class="order-details-form mb-4">
                                <li><span>ID</span><span>Day</span> <span>tổng</span><span></span></li>
                                @foreach($orders as $item)
                                <li><span>{{$item->ID}}</span><span>{{$item->created_at}}</span><span><?php $subtotal=0; foreach ($item->orderDetail as $key => $value) {
                                    # code...
                                    $subtotal = $subtotal + ($value->product->Price * (100- $value->product->Discount) /100);

                                }
                                echo $subtotal; ?> VND</span><span><a href="deleteOrder/{{$item->ID}}" class="btn btn-danger" onclick="return window.confirm('Bạn thực sự muốn xóa?');">Xoá</a></span></span></li>
                                @endforeach
                                
                            </ul>   
                        </div>
                    </div>
        </div>
    </div>
    

@endsection