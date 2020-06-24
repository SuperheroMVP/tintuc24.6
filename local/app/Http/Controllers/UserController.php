<?php

Namespace App\Http\Controllers;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getAdd()
    {
    	return view('admin.user.add');
    }
    public function postAdd(Request $request)
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
	    $user->authority = $request ->authority;

	    $user->save();

        return redirect('admin/user/add')->with('success','Thêm user thanh công');

    }

    public function getList()
    {
    	$user = User::all();
    	return view('admin.user.list',['user'=> $user]);
    }
    public function getEdit($id){

        $user = User::find($id);

        return view('admin.user.edit',['user'=>$user]);

    }
    public function postEdit(Request $request,$id)
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

    	$user = User::find($id);

      $user->name = $request->name;
      $user->email = $request ->email;
      $user->authority = $request ->authority;

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

        return redirect('admin/user/edit/'.$id)->with('success','Sửa user thanh công');
    }

    public function getDelete($id)
    {
      $user= User::find($id);
      $comment = Comment::where('idUser',$id)->get(); //Tìm các comment của user
      foreach($comment as $cmt)
      {
        $cmt->delete();
      }
     
      $user->delete();
      return redirect('admin/user/list/')->with('success','Xóa user thanh công');
    }

    public function getLoginAdmin()
    {
    	return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
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
            	return redirect('admin/user/add');
            }
            else
            {
            	return redirect('admin/login')->with('danger','Đăng nhập không thành công');
            }
    }

    public function getLogoutAdmin()
    {
      return redirect('admin/login')->with(Auth::logout());
    }
}