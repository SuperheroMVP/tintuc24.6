<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ProductCategory;
use App\Post;
use App\PostCategory;
use App\Comment;
class PostController extends Controller
{
    public function getAdd(){

    	$post = PostCategory::where('Status',1)->get();
    	return view('admin.post.add',['post'=>$post]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    		[
    			'Name'=>'required|min:5|unique:Post,Name|max:100',
    			'Description'=>'required|min:5',
    			'Content'=>'required|min:5',
          'Image' => 'required|image'
    		],
    		[
    			 'Name.required'=>'Bạn chưa nhập tên sản phẩm',
    			 'Name.unique'=>'Tên bài viết bị trùng',
    			 'Name.min'=>'Không nhỏ hơn 5 kí tự',
    			 'Name.max'=>'Không lớn hơn 100 kí tự',

    			 'Description.required'=>'Bạn chưa nhập mô tả',
    			 'Description.min'=>'Không nhỏ hơn 5 kí tự',

    			 'Content.required'=>'Bạn chưa nhập nội dung',
    			 'Content.min'=>'Nội Dung không nhỏ hơn 5 kí tự',


          'Image.required'=>'Bạn chưa thêm ảnh',
           'Image.image'=>'Sai định dạng ảnh',
    		]
    	);

        $post = new Post();

    	  $post->Name = $request->Name;
    	  $post->Slug =str_slug($request->Name); 
        $post->Description = $request->Description;
        $post->Content = $request->Content;
        $post->Status = $request->Status;
        $post->Outstanding = $request->Outstanding;
        $post->PostCategory = $request->PostCategory;
        $post->View_Count = 0;

       if($request -> hasFile('Image'))
        {
          $file =  $request->file('Image');

          $duoi = $file->getClientOriginalExtension();
          if($duoi!='jpg' && $duoi!='png' && $duoi !='jpeg')
          {
            return redirect('admin/post/add')->with('danger','Bạn chỉ được chọn ảnh có đuôi là:jpg,png,fpeg');
          }
          
          //Lay ten cai hinh ra
          $name = $file->getClientOriginalName();

          $Hinh = str_random(4)."_".$name;

          //random van co the bi trung ->xu li tiep(while)

          while(file_exists('public/upload/post/'.$Hinh))
          {
            // neu ton tai tra ve true va cho chay cau lenh ben trong ngc lai se thoat ra 
            $Hinh = str_random(4)."_".$name;
          }

           $file -> move('public/upload/post',$Hinh);
           $post->Image = $Hinh;    
       }
       else
        {
          $post->Hinh=" ";
        }
         

    	$post->save();

      
      
    	return redirect('admin/post/add')->with('success','Thêm bài viết thành công');
    }

    public function getList(){
    	$list_post = Post::orderBy('id','DESC')->get();
    	return view('admin/post/list',['list_post'=>$list_post]);
    }

    public function getEdit($id){

        $post_category = PostCategory::where('Status',1)->get();
        $post = Post::find($id);
        //dd($category);
        return view('admin.post.edit',['post_category'=>$post_category,'post'=>$post]);

    }

    public function postEdit(Request $request,$id)
    {
        if(Input::get('edit'))
       {
          $this->validate($request,
            [
              'Name'=>'required|min:5|max:100',
              'Description'=>'required|min:5',
              'Content'=>'required|min:5',
            ],
            [
               'Name.required'=>'Bạn chưa nhập tên sản phẩm',
               'Name.unique'=>'Tên bài viết bị trùng',
               'Name.min'=>'Không nhỏ hơn 5 kí tự',
               'Name.max'=>'Không lớn hơn 100 kí tự',

               'Description.required'=>'Bạn chưa nhập mô tả',
               'Description.min'=>'Mô Tả hông nhỏ hơn 5 kí tự',

               'Content.required'=>'Bạn chưa nhập nội dung',
               'Content.min'=>'Nội Dung không nhỏ hơn 5 kí tự',
            ]
          );
     
                       
            $post = Post::find($id);

            $post->Name = $request->Name;
            $post->Slug =str_slug($request->Name); 
            $post->Description = $request->Description;
            $post->Content = $request->Content;
             $post->Outstanding = $request->Outstanding;
            $post->Status = $request->Status;
            $post->PostCategory = $request->PostCategory;

           if($request -> hasFile('Image'))
            {

              unlink("public/upload/post/".$post->Image);
              $file =  $request->file('Image');

              $duoi = $file->getClientOriginalExtension();
              if($duoi!='jpg' && $duoi!='png' && $duoi !='jpeg')
              {
                return redirect('admin/post/add')->with('danger','Bạn chỉ được chọn ảnh có đuôi là:jpg,png,fpeg');
              }
              
              //Lay ten cai hinh ra
              $name = $file->getClientOriginalName();

              $Hinh = str_random(4)."_".$name;

              //random van co the bi trung ->xu li tiep(while)

              while(file_exists('public/upload/post/'.$Hinh))
              {
                // neu ton tai tra ve true va cho chay cau lenh ben trong ngc lai se thoat ra 
                $Hinh = str_random(4)."_".$name;
              }

               // $file -> move('public/upload/product',$Hinh);
               // $product->Image = $Hinh;    

                $file -> move('public/upload/post',$Hinh);

                //Xoa bo duong link anh cu

                
                $post->Image = $Hinh;    
           }
           //neu nguoi dung khong muon doi anh thi nen bo else
           //else
           // {
           //   $product->Hinh=" ";
           // }

            $post->save();

          return redirect('admin/post/edit/'.$id)->with('success','Sửa bài viết thành công');
      
        }
        else if(Input::get('back'))
        {
          
          return redirect('admin/post/list');
        }

    }

    public function getDelete($id)
    {
    	$post = Post::find($id);
      unlink("public/upload/post/".$post->Image);
      $comment = Comment::where('idPost',$id)->get(); //Tìm các comment của user
      foreach($comment as $cmt)
      {
        $cmt->delete();
      }
 
    	$post->delete();
    	return redirect('admin/post/list')->with('success','Xóa bài viết thành công');
    }
}
