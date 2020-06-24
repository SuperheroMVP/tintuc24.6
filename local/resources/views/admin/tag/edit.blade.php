@extends('admin.layout.index')

 @section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Sửa:{{$slide->Name}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">

                    <form action="admin/slide/edit/{{$slide->id}}" method="post" enctype="multipart/form-data">
                        @include('../admin.message')
                        @csrf
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input class="form-control" name="Name" value="{{$slide->Name}}" placeholder="Nhập tên sản phẩm" />
                            @if ($errors->has('Name')) <p style="color:red;">{{ $errors->first('Name') }}</p> @endif <br>
                       </div>
                    
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea id="demo" name="Content" class="form-control" rows="4">{{$slide->Content}}</textarea>
                            @if ($errors->has('Content')) <p style="color:red;">{{ $errors->first('Content') }}</p> @endif <br>
                        </div>

                        <div class="form-group">
                            <label>Link</label>
                            <input class="form-control" name="Link" value="{{$slide->Name}}" placeholder="Nhập đường dẫn" />
                            @if ($errors->has('Link')) <p style="color:red;">{{ $errors->first('Link') }}</p> @endif <br>
                       </div>

                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <label class="radio-inline">
                                <input name="Status" 
                                @if($slide->Status==1)
                                {{"checked"}}
                                @endif
                                value="1" checked="" type="radio">Có hiển thị
                            </label>
                            <label class="radio-inline">
                                <input name="Status" 
                                    @if($slide->Status==0)
                                          {{"checked"}}
                                    @endif
                                value="0"  type="radio">Không hiển thị
                            </label>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Hình Ảnh</label>
                                <input class="form-control" type="file"  name="Image" />
                            </div>
                            <div class="col-sm-6 text-center boder-left">
                                <img src="public/upload/slide/{{$slide->Image}}" width="150" height="150"  alt="" style="max-width: 100%;">
                                 <p style="margin-top: 15px;">{{$slide->Image}}</p>
                            </div>
                        </div>
                        
                         <button type="submit" class="btn btn-success" name="edit" value="edit">Sửa Ngay</button>                      
                        <button type="submit" class="btn btn-primary" name="back" value ="back">Quay Lại</button>

                    <form>
                    
                </div>
                
            </div><!-- /.row -->
           
        </div> <!-- /.container-fluid -->
    </div>

@endsection
