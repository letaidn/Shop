@extends('layouts.index')

@section('content')
<section class="welcome_area">
    <div class="welcome_slides owl-carousel">
        <!-- Single Slide Start -->
        <div class="single_slide height-800 bg-img background-overlay" style="background-image: url('home_asset/img/bg-img/bg-1.jpg');">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="welcome_slide_text">
                            <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Xu hướng</h2>
                            <a href="" class="btn karl-btn" data-animation="fadeInUp" data-delay="1s" data-duration="500ms">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Slide Start -->
        <div class="single_slide height-800 bg-img background-overlay" style="background-image: url('home_asset/img/bg-img/bg-4.jpg');">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="welcome_slide_text">
                            <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">Xu hướng</h2>
                            <a href="" class="btn karl-btn" data-animation="fadeInUp" data-delay="1s" data-duration="500ms">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Slide Start -->
        <div class="single_slide height-800 bg-img background-overlay" style="background-image: url('home_asset/img/bg-img/bg-2.jpg');">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="welcome_slide_text">
                            <h2 data-animation="bounceInDown" data-delay="500ms" data-duration="500ms">Xu hướng</h2>
                            <a href="" class="btn karl-btn" data-animation="fadeInUp" data-delay="1s" data-duration="500ms">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****** Welcome Slides Area End ****** -->
<!-- ****** Top Catagory Area Start ****** -->
<section class="top_catagory_area d-md-flex clearfix">
    <!-- Single Catagory -->
    <div class="single_catagory_area d-flex align-items-center bg-img" style="background-image: url('home_asset/img/bg-img/bg-2.jpg');">
        <div class="catagory-content">
            <h2>Hiện đại</h2>
            <a href="" class="btn karl-btn">Mua ngay</a>
        </div>
    </div>
    <!-- Single Catagory -->
    <div class="single_catagory_area d-flex align-items-center bg-img" style="background-image: url('home_asset/img/bg-img/bg-3.jpg');">
        <div class="catagory-content">
            <h2>Trẻ trung</h2>
            <a href="" class="btn karl-btn">Mua ngay</a>
        </div>
    </div>
</section>
<!-- ****** Top Catagory Area End ****** -->
<!-- ****** New Arrivals Area Start ****** -->
<section class="new_arrivals_area section_padding_100_0 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>Sản phẩm mới</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row karl-new-arrivals">
            <!-- Single gallery Item Start -->
            @foreach($product as $item)
            <div class="col-12 col-sm-6 col-md-4 single_gallery_item women wow fadeInUpBig" style="height: 600px;" data-wow-delay="0.2s">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="upload/ProductImg/{{$item->productImage->first()->Name}} " style="height: 400px;" />
                    </div>
                    <!-- Product Description -->
                    <div class="product-description" style="height: 200px;">
                        <div style="height: 100px;">
                            @if($item->Discount != NULL )
                            <h4 class="product-price"> <pan>{{ $item->Price *(100 - $item->Discount) / 100}} VND</pan> </h4>
                            
                            <p class=""><span style="color: red;font"><strike>{{$item->Price}}</strike> VND</span> Giảm {{$item->Discount}}%</p>
                            @else
                            <h4 class=""> <pan>{{ $item->Price}} VND</pan> </h4>
                            @endif 
                            <p>{{$item->Name}}</p>
                        </div>
                            <!-- Add to Cart -->
                        <a class="add-to-cart-btn" style="font-size: 18px;text-align:center; border: solid 1px;" href="detail/{{$item->ID}}" target="_self">Chi tiết</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection