@extends('layouts.index')

@section('content')
<section class="shop_grid_area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <div class="widget catagory mb-50">
                        <!--  Side Nav  -->
                        <div class="nav-side-menu">
                            <h6 class="mb-0">Catagories</h6>
                            <div class="menu-list">
                                <ul id="menu-content2" class="menu-content sub-menu collapse show">
                                    <li>
                                        <a href="list">
                                            Tất Cả
                                        </a>
                                    </li>
                                    @foreach ($category as $item)
                                    
                                        <li >
                                            <a href="list/{{$item->ID}}">{{$item->Name}}
                                            </a>
                                        </li>
                                    @endforeach
                                    </ul>
                            </div>
                        </div>
                        <br>
                        <div class="nav-side-menu">
                            <h6 class="mb-0">Tìm kiếm</h6>
                            <form action="listSearch" method="post" class="form">
                                @csrf
                                <input type="text" name="search" id="" style="width: 120px;">
                                <button class="btn btn-default">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <div class="row">

                        <!-- Single gallery Item -->
                        @foreach($product as $item)
            <div class="col-12 col-sm-6 col-md-4 single_gallery_item fadeInUpBig" style="height: 550px;" data-wow-delay="0.2s">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="upload/ProductImg/{{$item->productImage->first()->Name}} " style="height: 300px;" />
                    </div>
                    <!-- Product Description -->
                    <div class="product-description" style="height: 150px;">
                        <div style="height: 80px;">
                            @if($item->Discount != NULL )
                            <h4 class="product-price"> <pan>{{ $item->Price *(100 - $item->Discount) / 100}} VND</pan> </h4>
                            
                            <p class=""><span style="color: red;font"><strike>{{$item->Price}}</strike> VND</span> Giảm {{$item->Discount}}%</p>
                            @else
                            <h4 class=""> <pan>{{  $item->Price *(100 - $item->Discount) / 100}} VND</pan> </h4>
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
                                                    <a class="page-link" href="'.$product->url($i).'" >
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
</section>
@endsection