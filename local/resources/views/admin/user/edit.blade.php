  @extends('admin.layout.index')

  @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người Sử Dụng
                            <small>Sửa:{{ $user->name }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12" style="padding-bottom:120px">
                            
                        <form action="admin/user/edit/{{ $user->id}}" method="POST" enctype="multipart/form-data">
                            @include('../admin.message')

                            <input type="hidden" name='_token' value="{{csrf_token()}}">

                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input class="form-control" name="name" value="{{ $user->name }}" placeholder="Nhap ho ten" />
                                @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif <br>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Nhap email" />
                                @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif <br>
                            </div>
                            <div class="form-group">
                              <input type="checkbox" name="changePassword" id="changePassword" >
                                <label>Đổi Mật Khẩu</label>
                                  <div class="input-group" id="show_hide_password">
                                    <input class="form-control password" type="password" name="password" disabled="">
                                    <div class="input-group-addon">
                                      <a><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                  </div>
                                
                                @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif <br>

                            </div>

                           <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control password" name="passwordAgain" placeholder="Nhập lại mật khẩu" disabled="" />
                                @if ($errors->has('passwordAgain')) <p style="color:red;">{{ $errors->first('passwordAgain') }}</p> @endif <br>
                            </div>
                           <div class="form-group">
                            <label>Quyền</label>
                            <label class="radio-inline">
                                <input name="authority" 
                                @if($user->authority==1)
                                {{"checked"}}
                                @endif
                                value="1"  type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="authority" 
                                    @if($user->authority==0)
                                          {{"checked"}}
                                    @endif
                                value="0"  type="radio">Thường
                            </label>
                        </div>

                            <button type="submit" class="btn btn-success">Sửa</button>
                            <button type="reset" class="btn btn-danger">Quay Lại</button>
                        <form>
                    </div>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection
@section('script')
      <script type="text/javascript">
        $(document).ready(function() {
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
        });
          $(document).ready(function(){
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
