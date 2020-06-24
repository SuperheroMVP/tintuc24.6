@extends('layout.index')
@section('tittle','Home')
<link rel="stylesheet" href="public/css/login.css">
@section('content')
<div id="content-main">
 <div class="container">
  <div class="form-login mt-3">
    <form action="quen-mat-khau"  method="post">
      @include('../admin.message')
      @csrf
      <h5>Gửi đường link xác nhận qua email của bạn</h5>

      <fieldset>
        <legend><span class="number">1</span>Nhập email của bạn </legend>

        <label for="mail">Email:</label>
        <input type="email" id="mail" name="email">
        @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif <br>

      </fieldset>

      <button type="submit">Gửi</button>
    </form>

  </div>
</div>

@endsection