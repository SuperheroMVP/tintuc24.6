@extends('admin.layout.index')

 @section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">

                    <form action="admin/slide/add" method="post" enctype="multipart/form-data">
                        @include('../admin.message')
                        @csrf
                        <div class="form-group">
                            <label>Tên Slide</label>
                            <input class="form-control" name="Name" placeholder="Nhập tên sản phẩm" />
                            @if ($errors->has('Name')) <p style="color:red;">{{ $errors->first('Name') }}</p> @endif <br>
                       </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea id="demo" name="Content" class=


                            "form-control" rows="3"></textarea>
                             @if ($errors->has('Content')) <p style="color:red;">{{ $errors->first('Content') }}</p> @endif <br>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control" name="Link" />
                            @if ($errors->has('Link')) <p style="color:red;">{{ $errors->first('Link') }}</p> @endif <br>
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
