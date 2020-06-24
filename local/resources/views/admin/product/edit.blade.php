@extends('admin.layout.index')

 @section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm
                        <small>Sửa:{{$product->Name}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">

                    <form action="admin/product/edit/{{$product->id}}" method="post" enctype="multipart/form-data">
                        @include('../admin.message')
                        @csrf
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input class="form-control" name="Name" value="{{$product->Name}}" placeholder="Nhập tên sản phẩm" />
                            @if ($errors->has('Name')) <p style="color:red;">{{ $errors->first('Name') }}</p> @endif <br>
                       </div>

                        <div class="form-group">
                            <label>Chọn Danh Mục</label>
                            <select class="form-control" name="ProductCategoryId">
{{--                                     @foreach($category as $cate)
                                       <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                    @endforeach --}}
                                    <option value="0">*Danh Mục Gốc</option>

                                    <?php  cate_parent($category,0,$str="",$product->ProductCategoryId);?>
                            </select>
                        </div>

                     
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea id="demo" name="Description" class="form-control" rows="4">{{$product->Description}}</textarea>
                            @if ($errors->has('Description')) <p style="color:red;">{{ $errors->first('Description') }}</p> @endif <br>
                        </div>
                        <div class="form-group">
                            <label>Thông Tin Chung</label>
                            <textarea id="demo" name="ContentTabGeneral" class="form-control ckeditor" rows="3">{{$product->ContentTabGeneral}}</textarea>
                            @if ($errors->has('ContentTabGeneral')) <p style="color:red;">{{ $errors->first('ContentTabGeneral') }}</p> @endif <br>
                        </div>
                        <div class="form-group">
                            <label>Thông Số Kỹ Thuật</label>
                            <textarea id="demo" name="ContentTabTechnique" class="form-control ckeditor" rows="3">{{$product->ContentTabTechnique}}</textarea>
                            @if ($errors->has('ContentTabTechnique')) <p style="color:red;">{{ $errors->first('ContentTabTechnique') }}</p> @endif <br>
                        </div>
                        <div class="form-group">
                            <label>Hướng Dẫn Sử Dụng</label>
                            <textarea id="demo" name="ContentTabUseguide" class="form-control ckeditor" rows="3">{{$product->ContentTabUseguide}}</textarea>
                            @if ($errors->has('ContentTabUseguide')) <p style="color:red;">{{ $errors->first('ContentTabUseguide') }}</p> @endif <br>
                        </div>
                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <label class="radio-inline">
                                <input name="Status" 
                                @if($product->Status==1)
                                {{"checked"}}
                                @endif
                                value="1" checked="" type="radio">Có hiển thị
                            </label>
                            <label class="radio-inline">
                                <input name="Status" 
                                    @if($product->Status==0)
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
                                <img src="public/upload/product/{{$product->Image}}" width="150" height="150"  alt="" style="max-width: 100%;">
                                 <p style="margin-top: 15px;">{{$product->Image}}</p>
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
