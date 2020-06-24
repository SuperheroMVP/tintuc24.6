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
                               {{--  <th>Tên Không Dấu</th> --}}
                                <th>Hình</th>
                                <th>Mô Tả</th>
                                <th>Thông Tin Chung</th>
                                <th>Thông Số Kỹ Thuật</th>
                                <th> HD Sử Dụng</th>
                                <th>Hiển Thị</th>
                                <th>Thuộc Danh Mục</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $prod)
                            <tr class="odd gradeX" align="center">
                                <td>{{$prod->id}}</td>
                                <td>{{$prod->Name}}</td>
                            {{--     <td>{{$prod->Slug}}</td> --}}
                                <td>
                                    <img src="public/upload/product/{{$prod->Image}}" width="50px;" alt="">
                                </td>
                                <td>{{$prod->Description}}</td>
                                <td>{!!$prod->ContentTabGeneral!!}</td>
                                <td>{!!$prod->ContentTabTechnique!!}</td>
                                <td>{!!$prod->ContentTabUseguide!!}</td>
                                <td>
                                    @if($prod->Status ==1)
                                    {{'Có'}}
                                    @else
                                    {{'Không'}}
                                    @endif
                                </td>
                                <td>
                                    <?php $cates=DB::table('productcategory')->where('id',$prod['ProductCategoryId'])->first();

                                    ?>

                                    @if(!empty($cates->Name))
                                    {{$cates->Name}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$prod->id}}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có muốn xóa hay không?');" href="admin/product/delete/{{$prod->id}}"> Delete</a></td>

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