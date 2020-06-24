<?php

namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Mail;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function getFormResetPassword()
    {
        return view('pages.form_send_mail');
    }

    public function postFormResetPassword(Request $request)
    {
    	$email = $request->email;
    	$checkUser = User::where('email',$email)->first();

    	if(!$checkUser)
    	{
           return redirect()->back()->with('danger','email bạn không tồn tại');
    	}

    	$code = bcrypt(md5(time().$email));
    	
    	$checkUser->code = $code;
    	$checkUser->time_code = Carbon::now();
    	$checkUser->save();
    	$url = route('get.reset.password',['code'=>$checkUser->code,'email'=>$email]);
        
        $data=[
            'route'=>$url
        ];
    	Mail::send('pages.email_reset_password',$data, function($message) use($email)
    	{
	        $message->to($email, 'Reset password')->subject('Lấy lại mật khẩu');
	    });

    	return redirect()->back()->with('success','Link lấy lại mật khẩu đã gửi vào email của bạn.');
    }
    public function getResetPassword(Request $request)
    {
    	//Kiem tra lai neu nguoi dung sua duong link
    	$code = $request->code;
    	$email =$request->email;
    	$checkUser = User::where([
    		'email'=>$email,
    		'code'=>$code

    	])->first();

    	if(!$checkUser)
    	{
           return redirect(route('get.form.reset.password'))->with('danger','Đường dẫn lấy lại mật khẩu không đúng');
    	}


    	return view('pages.reset_password');
    }
    public function postSaveResetPassword(Request $request)
    {
    	   $this->validate($request,
            [

               'password'=>'required|min:4|max:100',
               'passwordAgain'=>'required|same:password',
            ],
            [

               'password.required'=>'Bạn chưa nhập mật khẩu',
               'password.min'=>'Mật khẩu phải chứa ít nhất 4 ký tự',
               'password.max'=>'Mật khẩu chứa tối đa 100 kí tự',

               'passwordAgain.required'=>'Bạn chưa nhập mật khẩu mới',
               'passwordAgain.same'=>'Mât khẩu nhập lại chưa khớp',
            ]
        );

    	if($request->password)
    	{ 
	    	$code = $request->code;
	    	$email =$request->email;
	    	$checkUser = User::where([
	    		'email'=>$email,
	    		'code'=>$code

	    	])->first();


	    	if(!$checkUser)
	    	{
	           return redirect()->route('get.form.reset.password')->with('danger','Đường dẫn lấy lại mật khẩu không đúng');
	    	}
	    	$checkUser->password = bcrypt($request->password);
	    	$checkUser->save();
	    	return redirect()->route('form.login')->with('success','Mật khẩu đã sửa thành công');
        }
    }
}