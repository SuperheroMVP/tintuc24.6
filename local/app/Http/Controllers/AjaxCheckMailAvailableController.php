<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\testAjaxSearchModel;
use DB;
class AjaxCheckMailAvailableController extends Controller
{
   public function index(Request $request)
   {
   	 return view('ajax.email_available');
   }
   function check(Request $request)
    {
    	
            $email = $request->email;
           
           if($email!='')
           {
              $count_data = testAjaxSearchModel::where('Email',$email)->count();  
           }
          	
          	else
          	{
          		$count_data =0;
          	}
          	echo $count_data;
		// if($request->get('email'))
	 //     {
	 //      $email = $request->get('email');
	 //      $data =testAjaxSearchModel::where('email', $email)->count();
	 //      if($data > 0)
	 //      {
	 //       echo 'not_unique';
	 //      }
	 //      else
	 //      {
	 //       echo 'unique';
	 //      }
	   //  }

    }
}

   //  	   $checkCharacters ='';

   //         $email = $request->email;

           
   //         if($email!='')
   //         {
   //            $count_data = testAjaxSearchModel::where('Email',$email)->count();  
   //         	  $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i"; 
			// 	if(!preg_match($regex, $email)) { 
			// 	    $count_data = testAjaxSearchModel::where('Email',$email)->count();  
			// 	    if($count_data >0)
			// 	    {
			// 	    	$checkCharacters ='Success email';
			// 	    }
			// 	    else
			// 	    {
   //                      $checkCharacters ='Eixst email';
			// 	    }
			// 	} 
			// 	else { 
			// 	    $checkCharacters =' email khong dung dinh dang';
			// 	}
   //         }
   //         else
   //         {
   //         	 $count_data =0;
   //         	 $checkCharacters ='Ban chua nhap email';
   //         }
          	
   //        	$data = array(
			// 	'checkEmail'  => $checkCharacters
				
			// );

			// echo json_encode($data);