@extends('layouts.index')

@section('content')
<section class="single_product_details_area section_padding_0_100" style="margin-top:10px">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php 
                                $count = 0;
                                foreach ($product->productImage as $key => $img) {
                                    # code...
                                    if($count == 0)
                                        echo '<li class="active" data-target="#product_details_slider" data-slide-to="'.$count.'" style="background-image: url(upload/ProductImg/'.$img->Name.');">
                                        </li>';
                                    else
                                        echo '<li data-target="#product_details_slider" data-slide-to="'.$count.'" style="background-image: url(upload/ProductImg/'.$img->Name.');">
                                        </li>';
                                    $count++;
                                }
                             ?>
                            </ol>
                        <div class="carousel-inner">
                                <?php 
                                $count = 0;
                                foreach ($product->productImage as $key => $img) {
                                    # code...
                                    if($count == 0)
                                        echo '<div class="carousel-item active">
                                        <a class="gallery_img" href="upload/ProductImg/'.$img->Name.'">
                                        <img class="d-block w-100" src="upload/ProductImg/'.$img->Name.'" alt="First slide">
                                    </a>
                                    </div>';
                                    else
                                        echo '<div class="carousel-item">
                                        <a class="gallery_img" href="upload/ProductImg/'.$img->Name.'">
                                        <img class="d-block w-100" src="upload/ProductImg/'.$img->Name.'" alt="Second slide">
                                    </a>
                                    </div>';
                                    $count++;
                                }
                             ?> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="single_product_desc">

                    <h4 class="title">{{$product->Name}}</h4>

                    <h4 class="price"> {{$product->Price * (100- $product->Discount) / 100}} VND</h4>
                    <p class="available">T???n kho: <span class="text-muted">
                        @if($product->Stock > 0)C??n h??ng
                        @else h???t h??ng
                        @endif
                    </span></p>
                    <!-- Add to Cart Form <--></-->
                    <div>
                        <form action="saveCart" method="POST" class="frmMain">
                            @csrf
                            <div class="form-group">
                                <label>K??ch th?????c: </label>
                                <select name="size" id="size">
                                    @foreach($sizes as $size)
                                        <option value="{{$size->ID}}">{{$size->Name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="productid_hiden" value="{{$product->ID}}">
                            </div>
                            <div class="form-group">
                                <label>S??? l?????ng: </label>
                                <input type="number" name="Quantity" value="1" min="1" max="100">
                            </div>
                            <button class="btn btn-secondary">Th??m v??o gi??? h??ng</button>
                        </form>
                        
                    </div>

                    @if(session('thongbaoStock'))
                        <br>
                            <div class="alert alert-danger">{{session('thongbaoStock')}}</div>
                        @endif
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <h6 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Chi ti???t s???n ph???m</a>
                            </h6>
                        </div>
                        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                {!! html_entity_decode($product->Description) !!}
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingTwo">
                            <h6 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">B??nh lu???n</a>
                            </h6>
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
                        <div id="collapseTwo" class="" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <?php 
                                    foreach ($comments as $key => $comment) {
                                        # code...
                                        echo '<div class="row">';
                                        echo '<div class="col-md-4">
                                            '.$comment->user->FirstName.' '.$comment->user->LastName.'<p>'.'Ng??y ????ng<br>'.$comment->created_at.'</p>
                                        </div>';
                                        echo '<div class="col-md-8">'.$comment->Comment.'</div>';
                                        echo '</div>';  
                                    }
                                ?>
                                <br>
                                {{$comments->links()}}
                                <br>
                                <p>B??nh lu???n</p>
                                <form class="form" method="post" action="comment/{{$product->ID}}">
                                    @csrf
                                    <textarea rows="3" cols="60" name="Comment"></textarea>
                                    <button class="btn btn-block">G???i</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="you_may_like_area clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>S???n Ph???m C?? Li??n Quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="you_make_like_slider owl-carousel">
                    @foreach($listRel as $item)
                    <div class="single_gallery_item">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="upload/ProductImg/{{$item->productImage->first()->Name}}" alt="">
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <div style="height: 100px;">
                                    @if($item->Discount != NULL )
                                    <h4 class="product-price"> <pan>{{ $item->Price *(100 - $item->Discount) / 100}} VND</pan> </h4>
                                    <p class=""><span style="color: red;font"><strike>{{$item->Price}}</strike> VND</span> Gi???m {{$item->Discount}}%</p>
                                    @else
                                    <h4 class=""> <pan>{{ $item->Price}} VND</pan> </h4>
                                    @endif 
                                    <p>{{$item->Name}}</p>
                                </div>
                                <!-- Add to Cart -->
                                <a class="add-to-cart-btn" style="font-size: 18px;text-align:center; border: solid 1px" href="detail/{{$item->ID}}" target="_self">Chi ti???t</a>
                            </div>
                    </div>
                    @endforeach
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection