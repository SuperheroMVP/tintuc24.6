@extends('admin.layout.index')

 @section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh Mục Bài Viết
                        <small>Chọn để hiển thị trang chủ</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">

                    <form action="admin/edithome/baiviet/add" method="post" enctype="multipart/form-data">
                        @include('../admin.message')
                        @csrf
                        <div class="form-group">
                            <label>Nội Dung Đầu</label>
                            <input class="form-control" name="Content_top" placeholder="Nhập nội dung đầu" />
                            @if ($errors->has('Content_top')) <p style="color:red;">{{ $errors->first('Content_top') }}</p> @endif <br>
                       </div>
                       <div class="form-group">
                            <label>Nội Dung Sau</label>
                            <input class="form-control" name="Content_bottom" placeholder="Nhập nội dung sau" />
                            @if ($errors->has('Content_bottom')) <p style="color:red;">{{ $errors->first('Content_bottom') }}</p> @endif <br>
                       </div>
                       <div class="form-group">
                            <label>Danh Mục</label>
                            <select class="form-control" name="Cate_post">
                                 <?php  cate_parent($post);?>
                            </select>
                          
                        </div>
                        <div class="form-group">
                            <label>Menu_name</label>
                            <input class="form-control" name="Menu_name" placeholder="Nhập tên menu" />
                            @if ($errors->has('Menu_name')) <p style="color:red;">{{ $errors->first('Menu_name') }}</p> @endif <br>
                        </div>
                        <div class="form-group">
                            <label>Danh Mục Hiển Thị Menu</label>
                            <select class="form-control" name="Cate_post_menu">
                                 <?php  cate_parent($post_menu);?>
                            </select>
                          
                        </div>
                        @if(count(($content1))==0)
                        <button type="submit" class="btn btn-success" name="add" value="add">Thêm</button>
                        @else
                        <button type="submit" class="btn btn-success" name="update" value="update">Cập Nhật</button>
                        @endif
                        <button type="reset" class="btn btn-primary">Làm Mới</button>
                    <form>
                    
                </div>
                
            </div><!-- /.row -->
           
        </div> <!-- /.container-fluid -->
    </div>

@endsection
