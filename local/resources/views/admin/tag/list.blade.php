@extends('admin.layout.index')

  @section('content')       
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tag Bài Viết
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
                                <th>Tag</th>
                                <th>Thuộc Danh Mục</th>
                                <th>Sửa</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_post as $post)
                            <tr class="odd gradeX" align="center">
                                <td>{{$post->id}}</td>
                                <td>{{$post->Name}}</td>
                                <td>{{$post->TagID}}</td>

                                <td>
                                    <?php $posts=DB::table('postcategoryid')->where('id',$post['PostCategory'])->first();

                                    ?>

                                    @if(!empty($posts->Name))
                                    {{$posts->Name}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/edit/{{$post->id}}">Edit</a></td>

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