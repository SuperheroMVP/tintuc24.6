@extends('layout.index')
@section('tittle','Home')
<link rel="stylesheet" href="public/css/login.css">
@section('content')
<div id="content-main">
 <div class="container">
  <div class="form-login mt-3">
    <form  method="post">
      @include('../admin.message')
      @csrf
      
      <div class="form-reset" style="width: 900px;margin: 0 auto;">
         <h3>Thay đổi mật khẩu</h3>
        <div class="form-group">
          <label for="exampleInputPassword1">Mật Khẩu Mới</label>
          <input type="password" name="password" id="myInput" class="form-control" id="exampleInputPassword1" placeholder="Password">
          <input type="checkbox" onclick="myFunction()">Hiện mật khẩu
          @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif <br>
        </div>         

        <div class="form-group">
          <label for="exampleInputPassword1">Nhập lại mật khẩu mới</label>
          <input type="password" class="form-control" name="passwordAgain">
          @if ($errors->has('passwordAgain')) <p style="color:red;">{{ $errors->first('passwordAgain') }}</p> @endif <br>
        </div>

        <button class="btn btn-success" type="submit">Đổi mật Khẩu</button>
      </div>
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