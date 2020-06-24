@extends('admin.layout.index')

 @section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh Mục Bài Viết
                        <small>Sửa:{{$post_category->Name}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    
                    <form action="admin/post-category/edit/{{$post_category->id}}" method="post">
                        @include('../admin.message')
                        @csrf
                        <div class="form-group">
                            <label>Tên Danh Mục</label>
                            <input class="form-control" name="Name" value="{{$post_category->Name}}" placeholder="Nhap ten danh mục" />

                        </div>
                        <div class="form-group">
                            <label>Chọn Danh Mục</label>
                            <select class="form-control" name="ParentID">
{{--                                     @foreach($category as $cate)
                                       <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                                    @endforeach --}}
                                    <option value="0">*Danh Mục Gốc</option>
                                    <?php  cate_parent($post_categorys,0,$str="",$post_category->ParentID);?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea id="demo" name="Description"  class="form-control" rows="4">{{$post_category->Description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <label class="radio-inline">
                                <input name="Status" value="1" 
                                @if($post_category->Status ==1) 
                                    {{"checked"}}
                                @endif
                                 type="radio">Có hiển thị
                            </label>
                            <label class="radio-inline">
                                <input name="Status" value="0"  
                                    @if($post_category->Status ==0) 
                                             {{"checked"}}
                                    @endif
                                type="radio">Không hiển thị
                            </label>
                        </div>

                        <button type="submit" class="btn btn-success" name="edit" value="edit">Sửa Ngay</button>
                        <button type="submit" class="btn btn-primary" name="back" value ="back">Quay Lại</button>
                    <form>
                    
                </div>
                
            </div><!-- /.row -->
           
        </div> <!-- /.container-fluid -->
    </div>

@endsection