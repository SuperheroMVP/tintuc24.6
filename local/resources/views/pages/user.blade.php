@extends('layout.index')
@section('tittle','Home')
<link rel="stylesheet" href="public/css/login.css">
@section('content')
<div id="content-main">
 <div class="container">
  <div class="form-login mt-3">
    <form action="nguoidung"  method="post">
      @include('../admin.message')
      @csrf
      <h1>Thông Tin Của Bạn</h1>

      <fieldset>
        <legend><span class="number">1</span>Sửa tại đây</legend>
        
        <label>Họ Và Tên:</label>
        <input type="text" id="mail" value="{{Auth::user()->name}}" name="name">
        @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif <br>

        <label for="mail">Email:</label>
        <input type="email" id="mail" value="{{Auth::user()->email}}" name="email">
        @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif <br>

        <input type="checkbox" name="changePassword" id="changePassword" >Bạn muốn đổi mật khẩu.
        <label for="password">Mật Khẩu:</label>
        <div id="show_hide_password">
        <input type="password" class="password"  id="myInput" name="password" placeholder="" disabled="" style="position: relative;">
              <div class="input-group-addon">
                    <a><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
              </div>
        </div>
        
        @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif <br>
        
        <label for="password">Nhập lại mật khẩu:</label>
        <input type="password" class="password"   id="myInput" name="passwordAgain" disabled="">
        @if ($errors->has('passwordAgain')) <p style="color:red;">{{ $errors->first('passwordAgain') }}</p> @endif <br>
      </fieldset>

      <button type="submit">Sửa Ngay</button>
    </form>

  </div>
</div>
      <script type="text/javascript">
          $(document).ready(function(){
                        $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
            $('#changePassword').change(function(){
                  if($(this).is(":checked"))
                  {
                     $('.password').removeAttr("disabled");
                  }
                  else
                  {
                    //add thuoc tinh va truyen gia tri vao , o day la gia tri rong
                     $('.password').attr("disabled",'');
                  }
            });

          });
      </script>

@endsection