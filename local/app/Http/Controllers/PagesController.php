<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Comment;
use App\PostCategory;
use App\Post;
class PagesController extends Controller
{
	function __construct()
	{
		$list_post_view = Post::orderBy('View_Count','DESC')->take(10)->get();
		view()->share('list_post_view',$list_post_view);
	}
    public function getHome()
    {
      $list_post_new=Post::orderBy('created_at','DESC')->take(5)->get();
      $post_cate_2 = PostCategory::where('ParentID',0)->where('Status',1)->get();
    	return view('pages.home',['list_post_new'=>$list_post_new,'post_cate_2'=>$post_cate_2]);
    }

    public function getPostCate($id)
    {

    	  $cate_post =PostCategory::find($id);
        $list_post = Post::where('PostCategory',$id)->paginate(5);
        return view('pages.post',['list_post'=>$list_post,'cate_post'=>$cate_post]);
    }
    public function getShowPost($id)
    {   
    	$list_comment = Comment::where('idPost',$id)->get();
    	$affected = DB::table('post')->where('id',$id)->increment('View_Count');

    	$post = Post::find($id);
      $post_same =Post::where('PostCategory',$post->PostCategory)->orderBy('View_Count','ESC')->take(3)->get();
    	
    	return view('pages.chitietbaiviet',['post'=>$post,'list_comment'=>$list_comment,'post_same'=>$post_same]);
    }
    public function getPostViews()
    {
      $list_post_views = Post::orderBy('View_Count','DESC')->paginate(8);
      $list_post_new=Post::orderBy('created_at','DESC')->take(6)->get();
      return view('pages.post_views',['list_post_views'=>$list_post_views,'list_post_new'=>$list_post_new]);
    }
    
    public function postLooking(Request $request)
    {
       $tukhoa=$request->tukhoa;
       $list_post_looking=Post::where('Name','like',"%$tukhoa%")->orwhere('Description','like',"%$tukhoa%")->take(10)->paginate(5);

      return view('pages.timkiem',['tukhoa'=>$tukhoa,'list_post_looking'=>$list_post_looking]);
    }
    public function getLogin()
    {
    	return view('pages.login');
    }
    public function postLogin(Request $request)
    {
           	   $this->validate($request,
            [
               
               'email'=>'required|email',
               'password'=>'required|min:4|max:50',
               
            ],
            [

               'email.required'=>'Bạn chưa nhập Email',
               'email.email'=>'Ban chưa nhập đúng định dạng  Email',
               

               'password.required'=>'Bạn chưa nhập mật khẩu',
               'password.min'=>'Mật khẩu phải chứa ít nhất 4 ký tự',
               'password.max'=>'Mật khẩu phải chứa tối đa 50 kí tự',

            ]
        );
           	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
            {
            	return redirect('trangchu');
            }
            else
            {
            	return redirect('dangnhap')->with('danger','Đăng nhập không thành công');
            }
    }

    public function getLogout()
    {
    	 return redirect('trangchu')->with(Auth::logout());
    }
    public function getRegister()
    {
    	return view('pages.register');
    }

    public function postRegister(Request $request)
    {
    	   $this->validate($request,
            [
               'name'=>'required|min:4|max:100',
               'email'=>'required|email|unique:users,email',
               'password'=>'required|min:4|max:50',
               'passwordAgain'=>'required|same:password',
            ],
            [
               'name.required'=>'Ban chưa nhập tên người dùng',
               'name.min'=>'Tên người dùng phải có ít nhất 4 kí tự',
               'name.max'=>'Tên người dùng không chứa chứa tối đa 100 kí tư',

               'email.required'=>'Bạn chưa nhập Email',
               'email.email'=>'Ban chưa nhập đúng định dạng  Email',
               'email.unique'=>'Email đã tồn tại',

               'password.required'=>'Bạn chưa nhập mật khẩu',
               'password.min'=>'Mật khẩu phải chứa ít nhất 4 ký tự',
               'password.max'=>'Mật khẩu phải chứa tối đa 50 kí tự',

               'passwordAgain.required'=>'Bạn chưa nhập mật khẩu',
               'passwordAgain.same'=>'Mât khẩu nhập lại chưa khớp',
            ]
        );

    	$user = new User();

	    $user->name = $request->name;
	    $user->email = $request ->email;
	    $user->password = bcrypt($request ->password);
	    $user->authority = 0;

	    $user->save();

        return redirect('dangki')->with('success','Bạn đăng kí thành công');

    }

    public function getShowUser()
    {
      $user = Auth::user();
      return view('pages.user',['user'=>$user]);
    }
    public function postShowUser(Request $request)
    {
          $this->validate($request,
            [
               'name'=>'required|min:4|max:100',
               'email'=>'required|email',

            ],
            [
               'name.required'=>'Ban chưa nhập tên người dùng',
               'name.min'=>'Tên người dùng phải có ít nhất 4 kí tự',
               'name.max'=>'Tên người dùng không chứa chứa tối đa 100 kí tư',

               'email.required'=>'Bạn chưa nhập Email',
               'email.email'=>'Ban chưa nhập đúng định dạng  Email',
               'email.unique'=>'Email đã tồn tại',
            ]
        );

      $user = Auth::user();

      $user->name = $request->name;
      $user->email = $request ->email;
     

      if($request->changePassword =="on")
        {
           $this->validate($request,
              [
                 'password'=>'required|min:4|max:50',
                 'passwordAgain'=>'required|same:password',
              ],
              [

                 'password.required'=>'Bạn chưa nhập mật khẩu',
                 'password.min'=>'Mật khẩu phải chứa ít nhất 4 ký tự',
                 'password.max'=>'Mật khẩu phải chứa tối đa 50 kí tự',

                 'passwordAgain.required'=>'Bạn chưa nhập mật khẩu',
                 'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp',
              ]
          );

          $user->password = bcrypt($request ->password);
        }
       $user->save();

        return redirect('nguoidung')->with('success','Bạn sửa thông tin cá nhân  thành công');
    }
    
}
