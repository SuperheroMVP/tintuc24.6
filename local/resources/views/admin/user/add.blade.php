  @extends('admin.layout.index')

  @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người Sử Dụng
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12" style="padding-bottom:120px">
                            
                        <form action="admin/user/add" method="POST" enctype="multipart/form-data">
                            @include('../admin.message')

                            <input type="hidden" name='_token' value="{{csrf_token()}}">

                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input class="form-control" name="name" placeholder="Nhap ho ten" />
                                @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif <br>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhap email" />
                                @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif <br>
                            </div>
                            <div class="form-group">
                                <label>Mật Khẩu</label>
                                <input type="password" class="form-control" id="myInput" name="password" placeholder="Nhập mật khẩu" />
                                <input type="checkbox" onclick="myFunction()">Hiện mật khẩu
                                @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif <br>

                            </div>

                           <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control"  name="passwordAgain" placeholder="Nhập lại mật khẩu" />
                                @if ($errors->has('passwordAgain')) <p style="color:red;">{{ $errors->first('passwordAgain') }}</p> @endif <br>
                            </div>

                            <div class="form-group">
                                <label>Quyền </label>

                                <label class="radio-inline">
                                    <input name="authority" value="0" checked="" type="radio">Thường
                                </label>

                                <label class="radio-inline">
                                    <input name="authority" value="1"  type="radio">Admin
                                </label>

                            </div>

                            <button type="submit" class="btn btn-success">Thêm Mới</button>
                            <button type="reset" class="btn btn-danger">Làm Mới</button>
                        <form>
                    </div>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <script>
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
