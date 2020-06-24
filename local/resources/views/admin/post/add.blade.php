@extends('admin.layout.index')

 @section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bài Viết
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">

                    <form action="admin/post/add" method="post" enctype="multipart/form-data">
                        @include('../admin.message')
                        @csrf
                        <div class="form-group">
                            <label>Tên Bài Viết</label>
                            <input class="form-control" name="Name" placeholder="Nhập tên bài viết" />
                            @if ($errors->has('Name')) <p style="color:red;">{{ $errors->first('Name') }}</p> @endif <br>
                       </div>
                       <div class="form-group">
                            <label>Danh Mục</label>
                            <select class="form-control" name="PostCategory">
                                 <?php  cate_parent($post);?>
                            </select>
                          
                        </div>
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea id="demo" name="Description" class="form-control" rows="4"></textarea>
                             @if ($errors->has('Description')) <p style="color:red;">{{ $errors->first('Description') }}</p> @endif <br>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea id="Content" name="Content" class="form-control" rows="3"></textarea>
                             @if ($errors->has('Content')) <p style="color:red;">{{ $errors->first('Content') }}</p> @endif <br>
                             <script type="text/javascript">ckeditor("Content")</script>

                        </div>
                       <div class="form-group">
                            <label>Bài Viết Nổi Bật</label>
                            <label class="radio-inline">
                                <input name="Outstanding" value="1"  type="radio">Nổi Bật
                            </label>
                            <label class="radio-inline">
                                <input name="Outstanding" value="0" checked="" type="radio">Không nổi bật
                            </label>
                        </div>

                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <label class="radio-inline">
                                <input name="Status" value="1" checked="" type="radio">Có hiển thị
                            </label>
                            <label class="radio-inline">
                                <input name="Status" value="0"  type="radio">Không hiển thị
                            </label>
                        </div>

                        <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input class="form-control" type="file"  name="Image" />
                                @if ($errors->has('Image')) <p style="color:red;">{{ $errors->first('Image') }}</p> @endif <br>
                        </div>

                        <button type="submit" class="btn btn-success">Thêm Mới</button>
                        <button type="reset" class="btn btn-primary">Làm Mới</button>
                    <form>
                    
                </div>
                
            </div><!-- /.row -->
           
        </div> <!-- /.container-fluid -->
    </div>

@endsection
