@extends('admin.layout.index')

  @section('content')       
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Mục
                            <small>Danh Sach</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('../admin.message')
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Tên Không Dấu</th>
                               
                                 <th>Mô Tả</th>
                                <th>Hiển Thị</th>
                                 <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php tableCategories($category); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection

<?php
function tableCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['ParentID'] == $parent_id)
        {
          echo '<tr>';
                echo '<td>';
                    echo  $item->id;
                echo '</td>';
                echo '<td>';
                    echo $char. $item->Name;
                echo '</td>';
                echo '<td>';
                    echo $item->Slug;
                echo '</td>';
                echo '<td>';
                    echo  $item->Description;
                echo '</td>';
                echo '<td>';
                if($item->Status==1)
                {
                    echo "Có";
                }
                else
                {
                    echo "Không";
                }

                echo '<td>';
                    echo  '<i class="fa fa-pencil fa-fw"></i> <a href="admin/category/edit/'.$item->id.'">Edit</a>';
                echo '</td>';
                
                echo '<td>';
                    echo  '<i class="fa fa-pencil fa-fw"></i> <a onclick="return confirm(\'Bạn có muốn xóa hay không?\');" href="admin/category/delete/'.$item->id.'">Delete</a>';
                echo '</td>';
            echo '</tr>';
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            tableCategories($categories, $item['id'], $char.' --');
        }
    }
}
?>