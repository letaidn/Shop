<div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- <div class="sb-sidenav-menu-heading">Báo cáo</div> -->
                        <!-- <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Trang chủ
                        </a> -->
                        <div class="sb-sidenav-menu-heading">Quản lý</div>
                        <a class="nav-link" href="admin/Product/list">
                            <div class="sb-nav-link-icon"><i class="fas fa-tshirt"></i></div>
                            Quản lý sản phẩm
                        </a>
                        <a class="nav-link" href="admin/Category/list">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Quản lý phân loại
                        </a>
                        <a class="nav-link" href="admin/User/list">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                            Quản lý người dùng
                        </a>
                        <a class="nav-link" href="admin/Order/list">
                            <div class="sb-nav-link-icon"><i class="fas fa-gift"></i></div>
                            Quản lý đơn đặt hàng
                        </a>
                        <a class="nav-link" href="admin/Comment/list">
                            <div class="sb-nav-link-icon"><i class="fas fa-gift"></i></div>
                            Quản lý bình luận
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Tài khoản:
                        <?php
                        $admin = Session::get('admin');
                        if($admin){
                            echo $admin->FirstName." ".$admin->LastName;
                        }
                        ?>
                        </div>
                    <p></p>
                </div>
            </nav>
        </div>