@extends('admin.layout.index')

  @section('content')       
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('../admin.message')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Hình</th>
                                <th>Nội Dung</th>
                                <th>Link</th>
                                <th>Hiển Thị</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_slide as $slide)
                            <tr class="odd gradeX" align="center">
                                <td>{{$slide->id}}</td>
                                <td>{{$slide->Name}}</td>
                                <td>
                                    <img src="public/upload/slide/{{$slide->Image}}" width="100px;" alt="">
                                </td>
                                <td>{{$slide->Content}}</td>
                                <td>{{$slide->Link}}</td>
                                <td>
                                    @if($slide->Status ==1)
                                    {{'Có'}}
                                    @else
                                    {{'Không'}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/edit/{{$slide->id}}">Sửa</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có muốn xóa hay không?');" href="admin/slide/delete/{{$slide->id}}"> Xóa</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection