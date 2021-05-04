<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<base href="{{asset('')}}" target="_blank, _self, _parent, _top">
    <link href="admin_asset/css/login.css" rel="stylesheet" />
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
	<div class="wrapper fadeInDown">
	<div id="formContent">
		<!-- tabs titles -->

		<!-- Icon -->
		<div class="fadeIn first">
			<img src="../public/img/myfile.png" style="width: 100px;" id="icon" alt="User Icon"/>
		</div>

		<!-- Login Form -->
		<form action="admin/login" role="form" method="POST">
			@csrf
			<div class="form-group">
				<input type="email" id="login" name="Email" value="" placeholder="Email" class="form-control fadeIn second">
			</div>
			<div class="form-group">
				<input type="password" id="password" name="Password" value="" placeholder="Mật khẩu" class="form-control fadeIn third">
			</div>
			<input type="submit" name="" class="fadeIn fourth" value="Đăng nhập">
		</form>
		@if(count($errors)>0)
			<div class="alert alert-danger">
		        @foreach($errors->all() as $err)
                    {{$err}}
                @endforeach
    	        </div>
		@endif
		@if(session('thongbao'))
			<div class="alert alert-danger"><span>{{session('thongbao')}}</span></div><br>
		@endif
		<!-- Remind Password - Register -->
		
	</div>
</div>
</body>
</html>