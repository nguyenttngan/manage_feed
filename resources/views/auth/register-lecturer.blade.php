<!DOCTYPE html>
<html>
<!-- Head -->
<head>
    <title>Đăng ký tài khoản giảng viên</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords" content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <!-- //Meta-Tags -->
    <!-- Style --> <link rel="stylesheet" href="{{asset('css/login.css')}}" type="text/css" media="all">
    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <!-- //Fonts -->
</head>
<!-- //Head -->

<!-- Body -->
<body>

<h1>UET Learning System</h1>

<div class="w3layoutscontaineragileits">
    <h2>Đăng ký tài khoản giảng viên</h2>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="email" name="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="EMAIL" required autofocus>
        @if ($errors->has('email'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
        <input type="password" name="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="PASSWORD" required="">
        @if ($errors->has('password'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
        <input type="password" name="password_confirmation" placeholder="CONFIRM - PASSWORD" required="">
        <input type="text" name="name" placeholder="HỌ VÀ TÊN" required="">
        <select name="gender" title="Giới tính" required>
            <option value="" selected disabled hidden>GIỚI TÍNH</option>
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
            <option value="Khác">Khác</option>
        </select>
        <input type="text" name="lecturer_code" placeholder="MÃ GIẢNG VIÊN" required="">
        <input type="text" name="birthday" placeholder="NGÀY SINH" required="">
        <input type="text" name="phone_number" placeholder="SỐ ĐIỆN THOẠI" required="">
        <input type="hidden" name="level" placeholder="" value="lecturer">
        <div class="aitssendbuttonw3ls">
            <input type="submit" value="ĐĂNG KÝ">
            <p><a href="/login" class="w3_play_icon1">Đăng nhập</a></p>
            <p><a href="/register-student" class="w3_play_icon1">Đăng ký tài khoản sinh viên</a></p>
            <div class="clear"></div>
        </div>
    </form>
</div>

<div class="w3footeragile">
    <p> &copy; 2019 UET Learning <a href="http://w3layouts.com" target="_blank"></a></p>
</div>
</body>
<!-- //Body -->
</html>
