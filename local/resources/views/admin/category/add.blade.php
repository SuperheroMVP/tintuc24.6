@extends('admin.layout.index')

 @section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh Mục
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">

                    <form action="admin/category/add" method="post">
                        @csrf
                        @include('../admin.message')
                        
                        <div class="form-group">
                            <label>Tên Danh Mục</label>
                            <input class="form-control" name="Name" placeholder="Nhap ten danh mục" />
                             @if ($errors->has('Name')) <p style="color:red;">{{ $errors->first('Name') }}</p> @endif <br>

                        </div>
                        <div class="form-group">
                            <label>Chọn Danh Mục</label>
                            <select class="form-control" name="ParentID">
{{--                                     @foreach($category as $cate)
                                       <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                    @endforeach --}}
                                    <option value="0">*Danh Mục Gốc</option>
                                    <?php  cate_parent($category);?>
                            </select>
                            @if ($errors->has('ParentID')) <p style="color:red;">{{ $errors->first('ParentID') }}</p> @endif <br>
                        </div>
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea id="demo" name="Description" class="form-control" rows="4"></textarea>
                            @if ($errors->has('Description')) <p style="color:red;">{{ $errors->first('Description') }}</p> @endif <br>
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

                        <button type="submit" class="btn btn-success">Thêm Mới</button>
                        <button type="reset" class="btn btn-primary">Làm Mới</button>
                    <form>
                    
                </div>
                
            </div><!-- /.row -->
           
        </div> <!-- /.container-fluid -->
    </div>

@endsection