<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<base href="{{asset('')}}" target="_blank, _self, _parent, _top">
	<link rel="stylesheet" href="">
	<link rel="icon" href="home_asset/img/core-img/favicon.ico">
    <!-- Responsive CSS -->
    <link href="home_asset/css/responsive.css" rel="stylesheet" />
    <!-- Core Style CSS -->
    <link href="home_asset/css/core-style.css" rel="stylesheet" />
    <link href="home_asset/style.css" rel="stylesheet" />
</head>
<body>
	<div id="wrapper">

        <!-- ****** Header Area Start ****** -->
        @include('layouts.header')
        <!-- ****** Header Area End ****** -->
        <!-- ****** Top Discount Area Start ****** -->
        @include('layouts.discount')
        <!-- ****** Top Discount Area End ****** -->
        <!-- ****** Quick View Modal Area Start ****** -->
        <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            </div>
        </div>
        <!-- ****** Quick View Modal Area End ****** -->
        @yield('content')
        <!-- ****** Footer Area Start ****** -->
        @include('layouts.footer')
        <!-- ****** Footer Area End ****** -->
    </div>
    <!-- /.wrapper end -->
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="home_asset/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="home_asset/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="home_asset/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="home_asset/js/plugins.js"></script>
    <!-- Active js -->
    <script src="home_asset/js/active.js"></script>
    <!-- <script src="home_asset/js/active.js"></script>
    <script src="home_asset/js/bootstrap.min.js"></script>
    <script src="home_asset/js/plugins.js"></script>
    <script src="home_asset/js/popper.min.js"></script>
    <script src="home_asset/js/jquery/jquery-2.2.4.min.js"></script> -->
    <!-- {
        <script>
            $(document).ready(function () {
                $('.frmRemove').click(function (evt) {
                    evt.preventDefault();
                    if (window.confirm('Bạn thực sự muốn xoá?')) {
                        const frm = $(this).closest('.frmRemove');
                        $(frm).submit();
                    } else {
                        alert('Hành động được huỷ');
                    }
                })
            })
        </script>
        } -->
</body>
</html>