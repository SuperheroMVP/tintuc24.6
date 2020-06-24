@extends('admin.layout.index')

  @section('content')       
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bài Viết
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
{{--                                 <th>Tên Không Dấu</th> --}}
                                <th>Hình</th>
                                <th>Mô Tả</th>
                           
                                <th>Nội Dung</th>
                                 <th>Nổi Bật</th>
                                <th>Hiển Thị</th>
                                <th>Thuộc Danh Mục</th>
                                <th>Luợt Xem</th>
                                 <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_post as $post)
                            <tr class="odd gradeX" align="center">
                                <td>{{$post->id}}</td>
                                <td>{{$post->Name}}</td>
{{--                                 <td>{{$post->Slug}}</td> --}}
                                <td>
                                    <img src="public/upload/post/{{$post->Image}}" width="50px;" alt="">
                                </td>
                                <td>{{$post->Description}}</td>
                              
                                <td>{!!$post->Content!!}</td>
                                <td>
                                    @if($post->Outstanding ==1)
                                    {{'Có'}}
                                    @else
                                    {{'Không'}}
                                    @endif
                                </td>
                                <td>
                                    @if($post->Status ==1)
                                    {{'Có'}}
                                    @else
                                    {{'Không'}}
                                    @endif
                                </td>
                                <td>
                                    <?php $posts=DB::table('postcategoryid')->where('id',$post['PostCategory'])->first();

                                    ?>

                                    @if(!empty($posts->Name))
                                    {{$posts->Name}}
                                    @endif
                                </td>
                                <td>{{$post->View_Count}}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/edit/{{$post->id}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có muốn xóa hay không?');" href="admin/post/delete/{{$post->id}}"> Delete</a></td>

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