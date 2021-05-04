@extends('layouts.index')

@section('content')
<div class="cart_area section_padding_100 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart-table clearfix">
                    <?php
                    $content = Cart::content();
                    if($content->count() == 0){
                        echo '<div class="alert alert-danger">Không co san pham nao trong gio hang</div>';
                    }
                    ?>
                        @if(session('thongbao'))
                            <div class="alert alert-danger">{{session('thongbao')}}</div>
                        @endif
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th width="100px">Sản Phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Size</th>
                                <th>Giá Tiền</th>
                                <th>Số lượng</th>
                                <th>Tổng Tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach($content as $item)
                                <tr>
                                    <td class=" d-flex "  >
                                        <a href="upload/ProductImg/{{$item->options->image}}"><img src="upload/ProductImg/{{$item->options->image}}"alt=""></a>
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <p>{{$item->options->size}}</p> 
                                    </td>
                                    <td class="price">
                                        <p><?php
                                            echo number_format($item->price);
                                        ?> VNG</p>  
                                    </td>
                                    <td>
                                        <center>
                                            <br><br>
                                            <form action="updateCartLine" method="POST">
                                                @csrf
                                                <input type="number" name="Quantity" value="{{$item->qty}}" style="width:wrapcontent;" placeholder="">
                                                <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                                <button type="submit" class="btn btn-outline-success">Cập nhật</button>
                                            </form>
                                        </center>
                                    </td>
                                    <td>
                                        <p><?php
                                            echo number_format($item->price * $item->qty);
                                        ?>  VND</p>
                                    </td>
                                    <td>
                                        <a href="deleteCartLine/{{$item->rowId}}" class="btn btn-warning btnRemove" onclick="return window.confirm('Bạn thực sự muốn xóa?');">Xoá</a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="cart-footer d-flex mt-30">
                    <div class="back-to-shop w-50">
                        <a href="list">Tiếp tục mua hàng </a>
                    </div>
                    <div class="update-checkout w-50 text-right">
                        <a href="deleteCart" class="btn btn-danger btnRemove" onclick="return window.confirm('Bạn thực sự muốn xóa?');" >Xoá</a>

                        
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="shipping-method-area mt-70">
                    <div class="cart-page-heading">
                        <h5>Phí vận chuyển</h5>
                    </div>
                    <div class="custom-control custom-radio">
                        <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio3"><span>Miễn phí vận chuyển toàn quốc</span></label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-total-area mt-70">
                    <div class="cart-page-heading">
                        <h5>Tổng tiền</h5>
                    </div>

                    <ul class="cart-total-chart">
                        <li><span>Tổng</span> <span>{{Cart::subtotal()}} VND</span></li>
                        <li><span>Shipping</span> <span>Miễn phí</span></li>
                        <li><span><strong>Tổng tiền</strong></span> <span><strong> VND </strong></span></li>
                    </ul>
                    <a href="checkout" class="btn karl-checkout-btn">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection