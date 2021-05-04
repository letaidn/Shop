<header class="header_area">
            <!-- Top Header Area Start -->
            <div class="top_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-end">
                        <?php
                            $content = Cart::content();
                        ?>
                        <div class="col-12 col-lg-7">
                            <div class="top_single_area d-flex align-items-center">
                                <!-- Logo Area -->
                                <div class="top_logo">
                                    <a href="#">
                                        <img src="home_asset/img/core-img/logo.png" />
                                    </a>
                                </div>
                                <!-- Cart & Menu Area -->
                                <div class="header-cart-menu d-flex align-items-center ml-auto">
                                    <!-- Cart Area -->
                                    <div class="cart">
                                        <a href="#" id="header-cart-btn" target="_blank" class="price"><span class="cart_quantity">{{$content->count()}}</span> <i class="ti-bag"></i>{{Cart::subtotal()}} VND</a>
                                        <!-- Cart List Area Start -->
                                        <ul class="cart-list">
                                                @foreach ($content as $key => $item)
                                                    <li>
                                                        <a href="detail/{{$item->id}}" class="image"><img src="upload/productImg/{{$item->options->image}}" class="cart-thumb" alt=""></a>
                                                        <div class="cart-item-desc">
                                                            <h6><a href="detail/{{$item->id}}"></a></h6>
                                                            <p>{{$item->qty}} x - <span class="price">{{$item->price}} VND</span></p>
                                                        </div>
                                                        <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                                    </li>
                                                @endforeach
                                            
                                        </ul>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Top Header Area End -->
            <div class="main_header_area">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 d-md-flex justify-content-between">
                            <!-- Header Social Area -->
                            <div class="header-social-area">
                                <a href="#"><span class="karl-level">Share</span> <i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                            <!-- Menu Area -->
                            <div class="main-menu-area">
                                <nav class="navbar navbar-expand-lg align-items-start">

                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>

                                    <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                        <ul class="navbar-nav animated" id="nav">
                                            <li class="nav-item"><a class="nav-link" href=home>Trang chủ</a></li>
                                            
                                            <li class="nav-item"><a class="nav-link" href="list">Danh sách sản phẩm</a></li>
                                            <li class="nav-item"><a class="nav-link" href="cart">Giỏ hàng</a></li>
                                            <li class="nav-item"><a class="nav-link" href="contact">Liên hệ</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Help Line -->
                            <div class="help-line">
                                <a href="tel:0942323733"><i class="ti-headphone-alt"></i> 0942323733</a>
                            </div>
                            <?php
                                    $customer = Session::get('customer');
                                    if($customer){
                                        echo '<div class="help-line">
                                        <a href="logout"><i class="ti-user"></i> Đăng xuất</a>
                                    </div>';
                                    }else
                                        echo '<div class="help-line">
                                        <a href="login"><i class="ti-user"></i> Đăng nhập</a>
                                    </div>';
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>