<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\PostCategory;
use App\Post;
use App\Artices_Tags;
use App\Comment;
class PostCategoryController extends Controller
{
    public function getAdd(){
        $post_category = PostCategory::where('Status',1)->get();
    	return view('admin.post_category.add',['post_category'=>$post_category]);
    }
    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'Name'=>'required|unique:postcategoryid,Name|min:5|max:100',
                'Description'=>'required|min:5',
            ],
            [
                 'Name.required'=>'Bạn chưa nhập tên danh mục',
                 'Name.unique'=>'Trùng tên danh mục',
                 'Name.min'=>'Không nhỏ hơn 5 kí tự',
                 'Name.max'=>'Không lớn hơn 100 kí tự',

                 'Description.required'=>'Bạn chưa nhập mô tả',
                 'Description.min'=>'Không nhỏ hơn 5 kí tự',
                 
            ]
        );

        $post_category = new PostCategory();

        $post_category->Name = $request->Name;
        $post_category->Slug =str_slug($request->Name); 
        $post_category->Description = $request->Description;
        $post_category->Status = $request->Status;
        $post_category->ParentID = $request->ParentID;
        $post_category->save();


        return redirect('admin/post-category/add')->with('success','Thêm danh mục thành công');
    }

    public function getList(){
    	$post_category = PostCategory::all();
    	return view('admin/post_category/list',['post_category'=>$post_category]);
    }

    public function getEdit($id){

    	$post_category = PostCategory::find($id);
         $post_categorys = PostCategory::all();
    	return view('admin/post_category/edit',['post_category'=>$post_category,'post_categorys'=>$post_categorys]);
    }

    public function postEdit(Request $request,$id)
    {
       $post_category = PostCategory::where('Status',1)->get();
       if(Input::get('edit'))
       {
   
          
            if( $request->ParentID==$id)
            {
                return redirect('admin/post-category/edit/'.$id)->with('danger','Trùng Danh Mục, Vui lòng chọn danh mục cha');
                //echo "error";
            }
            else
            {
                $this->validate($request,
                    [
                        'Name'=>'required|min:5|max:100',
                        
                        'Description'=>'required|min:5'

                    ],
                    [
                         'Name.required'=>'Bạn chưa nhập tên danh mục',
                         'Name.min'=>'Không nhỏ hơn 5 kí tự',
                         'Name.max'=>'Không lớn hơn 100 kí tự',

                         'Description.required'=>'Bạn chưa nhập mô tả',
                         'Description.min'=>'Không nhỏ hơn 5 kí tự',
                         'Description.max'=>'Không lớn hơn 5 kí tự',

                    ]
                );

                $post_category = PostCategory::find($id);

                $post_category->Name = $request->Name;
                $post_category->Slug =str_slug($request->Name); 


                $post_category->ParentID = $request->ParentID;
                

                $post_category->Description = $request->Description;
                $post_category->Status = $request->Status;
                $post_category->save();
               // echo $category->ParentID;


                    //echo "work";
                return redirect('admin/post-category/edit/'.$id)->with('success','Sửa danh mục thành công');
            }

            //return redirect('admin/category/edit/'.$id)->with('success','Sửa danh mục thành công');
       } 
        else if(Input::get('back'))
        {
          
          return redirect('admin/post-category/list');
        }
    }

    public function getDelete($id)
    {

        $parent = PostCategory::where('ParentID',$id)->count();

        if($parent==0)
        {
            
            $find_img =Post::where('PostCategory',$id)->get();
            
            //dd($find_img);

               foreach($find_img as $img_delete)
               {
                    unlink("public/upload/post/".$img_delete->Image);
                    $find_comment =Comment::where('idPost',$img_delete->id)->get();
   
                }
                if(isset($find_comment))
                {
                    
                   foreach($find_comment as $find_cmt)
                   {
                    
                     
                    $find_cmt->delete();

                    }
                }

            $post_category = PostCategory::find($id);
           
           $post_category->delete();
                      
            return redirect('admin/post-category/list')->with('success','Xóa danh mục bài viết thành công');
        }
        else{
                
            //xoa anh neu no o danh muc goc.
            $cate_img_main = Post::where('PostCategory',$id)->get();

            //đem neu lon hon 0 thi tien hanh xoa anh rong thu muc
            if(count($cate_img_main)>0)
            {
                foreach($cate_img_main as $unlink_img )
                {
                   unlink("public/upload/post/".$unlink_img->Image);
                    // echo($unlink_img->Image);
                    $find_comment =Comment::where('idPost',$unlink_img->id)->get();
                    //dd($find_comment);
                    foreach($find_comment as $find_cmt)
                   {
                    
                     $find_cmt->delete();
       

                    }

                }

            }


                   //Xoa ảnh ỏe trong danh mục con
           $post_category = PostCategory::all();

            delete_cate_parent_post($post_category,$id);
            
          
           
            $post_category_id = PostCategory::find($id);
           $post_category_id->delete();
        
             
          return redirect('admin/post-category/list')->with('success','Xóa danh mục gốc bài viết thành công');

        }

    }
}
