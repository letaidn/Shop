@extends('layouts.index')

@section('content')
<div class="checkout_area section_padding_100">
            <div class="container">
                <div class="row">
                    <?php
                        $customer = Session::get('customer');
                    ?>
                    <div class="col-12 col-md-6">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-page-heading">
                                <h5>Thông tin đặt hàng</h5>
                            </div>
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
                            <form action="postCheckout" method="post" class="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="hidden" class="form-control" id="" name="ID" value="{{$customer->ID}}" required>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label for="email_address">Địa chỉ email<span>*</span></label>
                                        <input type="email" class="form-control" name="Email" id="email_address" value="{{$customer->email}}" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="first_name">Họ <span>*</span></label>
                                        <input type="text" class="form-control" id="first_name" name="FirstName" value="{{$customer->FirstName}}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name">Tên<span>*</span></label>
                                        <input type="text" class="form-control" id="last_name" value="{{$customer->LastName}}" name="LastName">
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <label for="street_address">Address <span>*</span></label>
                                        <input type="text" class="form-control mb-3" id="street_address" name="Address" value="{{$customer->Address}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="phone_number">Số điện thoại<span>*</span></label>
                                        <input type="text" class="form-control" name="Phone" id="phone_number" value="{{$customer->Phone}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <button type="submit" class="btn karl-checkout-btn">Đặt hàng</button>
                                    </div>
                                </form>
                                </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                        <div class="order-details-confirmation">

                            <div class="cart-page-heading">
                                <h5>Sản phẩm đã chọn</h5>
                                <p>Chi tiết</p>
                            </div>
                            <?php
                                $content = Cart::content();
                            ?>
                            <ul class="order-details-form mb-4">
                                <li><span>Tên sản phẩm</span> <span>tổng</span></li>
                                @foreach($content as $item)
                                <li><span>{{$item->name}}</span> <span>{{$item->qty *$item->price}}</span></li>
                                @endforeach
                                
                            </ul>


                            <div id="accordion" role="tablist" class="mb-4">
                                
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingFour">
                                        <h6 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><i class="fa fa-circle-o mr-3"></i>Trả khi giao hàng</a>
                                        </h6>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
@endsection