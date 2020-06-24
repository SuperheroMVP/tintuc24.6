@extends('admin.layout.index')

 @section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ảnh LightBox
                        <small>Chọn(cho phép chọn nhiều ảnh)</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">

                    <form action="admin/edithome/lightbox/add" method="post" enctype="multipart/form-data">
                        @include('../admin.message')
                        @csrf
                       <div class="form-group">
                            <label>Nội Dung Sau</label>
                            <input type="file" class="form-control" name="Image[]" multiple="" />
                            @if ($errors->has('Image')) <p style="color:red;">{{ $errors->first('Image') }}</p> @endif <br>
                       </div>

                        <button type="submit" class="btn btn-success" name="add" value="add">Thêm</button>
                        <button type="reset" class="btn btn-primary">Làm Mới</button>
                    <form>
                    
                </div>
                
            </div><!-- /.row -->
           
        </div> <!-- /.container-fluid -->
                <div class="container-fluid">
                     
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Hình</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($list_lightbox)>0)
                            
                                @foreach($list_lightbox as $lightbox)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$lightbox->id}}</td>
                                        <td>
                                            <img src="public/upload/lightbox/{{$lightbox->Image}}" width="80px;" alt="">
                                        </td>

                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có muốn xóa hay không?');" href="admin/edithome/lightbox/delete/{{$lightbox->id}}"> Delete</a></td>

                                    </tr>
                                @endforeach
                            
                            @endif

                        </tbody>
                    </table>
        </div>

    </div>

@endsection
