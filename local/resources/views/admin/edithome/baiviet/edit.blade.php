@extends('admin.layout.index')

 @section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bài Viết
                        <small>Sửa:{{$post->Name}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">

                    <form action="admin/post/edit/{{$post->id}}" method="post" enctype="multipart/form-data">
                        @include('../admin.message')
                        @csrf
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input class="form-control" name="Name" value="{{$post->Name}}" placeholder="Nhập tên bài viết" />
                            @if ($errors->has('Name')) <p style="color:red;">{{ $errors->first('Name') }}</p> @endif <br>
                       </div>

                        <div class="form-group">
                            <label>Chọn Danh Mục</label>
                            <select class="form-control" name="PostCategory">
{{--                                     @foreach($category as $cate)
                                       <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                    @endforeach --}}
                                    <option value="0">*Danh Mục Gốc</option>

                                    <?php  cate_parent($post_category,0,$str="",$post->PostCategory);?>
                            </select>
                        </div>

                     
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea id="demo" name="Description" class="form-control" rows="4">{{$post->Description}}</textarea>
                            @if ($errors->has('Description')) <p style="color:red;">{{ $errors->first('Description') }}</p> @endif <br>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea id="demo" name="Content" class="form-control ckeditor" rows="3">{{$post->Content}}</textarea>
                            @if ($errors->has('Content')) <p style="color:red;">{{ $errors->first('Content') }}</p> @endif <br>
                            <script type="text/javascript">ckeditor("Content")</script>

                        </div>
                        <div class="form-group">
                            <label>Tin Nổi Bật</label>
                            <label class="radio-inline">
                                <input name="Outstanding" 
                                @if($post->Outstanding==1)
                                {{"checked"}}
                                @endif
                                value="1" checked="" type="radio">Có Nổi Bật
                            </label>
                            <label class="radio-inline">
                                <input name="Outstanding" 
                                    @if($post->Outstanding==0)
                                          {{"checked"}}
                                    @endif
                                value="0"  type="radio">Không Nổi Bật
                            </label>
                        </div>
                        <div class="form-group">
                            <label>TagID</label>
                            <input class="form-control" name="TagID" value="{{$post->TagID}}" placeholder="" />
                            @if ($errors->has('TagID')) <p style="color:red;">{{ $errors->first('TagID') }}</p> @endif <br>
                       </div>

                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <label class="radio-inline">
                                <input name="Status" 
                                @if($post->Status==1)
                                {{"checked"}}
                                @endif
                                value="1" checked="" type="radio">Có hiển thị
                            </label>
                            <label class="radio-inline">
                                <input name="Status" 
                                    @if($post->Status==0)
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
                                <img src="public/upload/post/{{$post->Image}}" width="150" height="150"  alt="" style="max-width: 100%;">
                                 <p style="margin-top: 15px;">{{$post->Image}}</p>
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
