@extends('layout.index')
@section('tittle','Home')
<link rel="stylesheet" href="public/css/login.css">
@section('content')
<div id="content-main">
 <div class="container">
  <div class="form-login mt-3">
    <form action="dangnhap"  method="post">
      @include('../admin.message')
      @csrf
      <h1>Đăng Nhập</h1>

      <fieldset>
        <legend><span class="number">1</span>Nhập thông tin của bạn </legend>

        <label for="mail">Email:</label>
        <input type="email" id="mail" name="email">
        @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif <br>

        <label for="password">Password:</label>
        <input type="password"  id="myInput" name="password">
        <input type="checkbox" onclick="myFunction()">Hiện mật khẩu
        @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif <br>
         <p class="forgot_password"><a href="{{route('get.form.reset.password')}}" target="_blank">Bạn quên mật khẩu ?</a></p>
      </fieldset>

      <button type="submit">Đăng Nhập</button>
    </form>

  </div>
</div>
        <script type="text/javascript">
          function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
          }

      </script>
@endsection