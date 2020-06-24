@extends('admin.layout.index')

  @section('content')       
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Liên Hệ Của Khách Hàng(Hoàn Thành)
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('../admin.message')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Họ Tên</th>                              
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Lựa Chọn</th>
                                <th>Nội Dung</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_contact as $contact)
                            <tr class="odd gradeX" align="center">
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->Name}}</td>
                                <td>{{$contact->Email}}</td>
                                <td>{{$contact->PhoneNumber}}</td>
                                <td>{{$contact->YourOption}}</td>
                                <td>{{$contact->Content}}</td>
                                <td class="center"><a href="admin/contact/restore/{{$contact->id}}">Khôi Phục</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có muốn xóa hay không?');" href="admin/contact/delete/{{$contact->id}}"> Delete</a></td>
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