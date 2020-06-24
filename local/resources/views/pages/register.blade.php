@extends('layout.index')
@section('tittle','Home')
<link rel="stylesheet" href="public/css/login.css">
@section('content')
<div id="content-main">
 <div class="container">
  <div class="form-login mt-3">
    <form action="dangki"  method="post">
      @include('../admin.message')
      @csrf
      <h1>Đăng Kí</h1>

      <fieldset>
        <legend><span class="number">1</span>Nhập thông tin của bạn </legend>
        
        <label>Họ Và Tên:</label>
        <input type="text" id="mail" name="name">
        @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif <br>

        <label for="mail">Email:</label>
        <input type="email" id="mail" name="email">
        @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif <br>

        <label for="password">Mật Khẩu:</label>
        <input type="password"  id="myInput" name="password">
        <input type="checkbox" onclick="myFunction()">Hiện mật khẩu
        @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif <br>
        
        <label for="password">Nhập lại mật khẩu:</label>
        <input type="password"  id="myInput" name="passwordAgain">
        @if ($errors->has('passwordAgain')) <p style="color:red;">{{ $errors->first('passwordAgain') }}</p> @endif <br>
      </fieldset>

      <button type="submit">Đăng Kí</button>
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