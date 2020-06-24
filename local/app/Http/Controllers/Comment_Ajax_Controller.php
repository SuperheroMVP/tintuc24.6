<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment_Ajax_Model;
use DB;
class Comment_Ajax_Controller extends Controller
{
	public function index()
	{
        $data_comment = Comment_Ajax_Model::all();
		return view("ajax.comment_ajax",['data_comment'=>$data_comment]);
	}

	public function postComment(Request $request)
	{
		if($request->ajax())
		{
			$error ='';
			$comment_name = '';
			$comment_content = '';

			$comment_name_request = $request->comment_name;
			$comment_content_request = $request->comment_content;

			if($comment_name_request != '')
			{
				$comment_name = $comment_name_request;
			}
			else
			{
				$error .='<p class="text-danger"> Name required <p>';           	
			}

			if($comment_content_request != '')
			{
				$comment_content = $comment_name_request;
			}
			else
			{
				$error .='<p class="text-danger"> Content required <p>';           	
			}

			if($error == '')
			{

               // $add_comment = new Comment_Ajax_Model();

               // $add_comment->parent_comment_id = $request->comment_id;
               // $add_comment->comment_sender_name = $request->comment_name;
               // $add_comment->comment = $request->comment_content;

               // $add_comment->save();

				$data=array('parent_comment_id'=>$request->comment_id,"comment_sender_name"=>$request->comment_name,"comment"=>$request->comment_content);
				DB::table('comment_ajax')->insert($data);

				$error ='<p class="text-success"> Add Comment Success <p>'; 
			}
            // else
            // {
            // 	$error .='<p class="text-success"> error in here <p>'; 
            // }

			$data = array(
				'error'=>$error
			);

            //convert giá trị string chỉ định thành định dạng JSON.
            // JSON là viết tắt của cụm từ “JavaScript Object Notation”, là cách thức để mô tả object trong xử lý của java script.
			echo json_encode($data);

		}
	}
    
    public function loadComment()
    {
    	 $output= '';
    	// $list_comment = Comment_Ajax_Model::where('parent_comment_id',0)->get();
        $data_comment = Comment_Ajax_Model::all();
		foreach($data_comment as $row)
		{
           if($row["parent_comment_id"] ==0 )          
           {
           		$output .= '
				 <div class="panel panel-default">
				  <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
				  <div class="panel-body">'.$row["comment"].'</div>
				  <div class="panel-footer" align="right"><button type="button" class="btn btn-primary reply" id="'.$row["comment_id"].'">Reply</button></div>
				 </div>
				';
				$id = $row["comment_id"];
				foreach ($data_comment as $item2)
			    {
					if($item2["parent_comment_id"] == $id  )  
					{
						$output .= '
						 <div class="panel panel-default" style="margin-left:48px">
						  <div class="panel-heading">By <b>'.$item2["comment_sender_name"].'</b> on <i>'.$item2["date"].'</i></div>
						  <div class="panel-body">'.$item2["comment"].'</div>
						  <div class="panel-footer" align="right"><button type="button" class="btn btn-primary reply" id="'.$item2["comment_id"].'">Reply</button></div>
						 </div>
						';
						$id2 = $item2["comment_id"];
						foreach ($data_comment as $item3)
					    {
							if($item3["parent_comment_id"] == $id2  )  
							{
								$output .= '
								 <div class="panel panel-default" style="margin-left:100px">
								  <div class="panel-heading">By <b>'.$item3["comment_sender_name"].'</b> on <i>'.$item3["date"].'</i></div>
								  <div class="panel-body">'.$item3["comment"].'</div>
								  <div class="panel-footer" align="right"><button type="button" class="btn btn-primary reply" id="'.$item3["comment_id"].'">Reply</button></div>
								 </div>
								';
							}
						}
					}
				}

			
           }
		}
		//$output = get_reply_comment($data_comment);

    
       echo $output;
    }

    // public function get_reply_comment($data_comment,$parent_id = 0, $marginleft = 0)
    // {
    // 	$output='';
    // 	foreach ($data_comment as $row) 
    // 	{
    // 		if($row['parent_comment_id'] == $parent_id)
    // 		{
    // 			$output .= '
				//    <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
				//     <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
				//     <div class="panel-body">'.$row["comment"].'</div>
				//     <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
				//    </div>
				//    ';
	            
	   //          get_reply_comment($data_comment,$row["comment_id"],$marginleft+48);
    // 		}
    // 	}
    // 	return $output;
    // }
 //    function get_reply_comment($parent_id = 0, $marginleft = 0)
	// {
	//  $data = Comment_Ajax_Model::where('parent_comment_id',$parent_id)->get();
	//  $count =Comment_Ajax_Model::where('parent_comment_id',$parent_id)->count();
	//  if($parent_id == 0)
	//  {
	//   $marginleft = 0;
	//  }
	//  else
	//  {
	//   $marginleft = $marginleft + 48;
	//  }
	//  if($count > 0)
	//  {
	//   foreach($data as $row)
	//   {
	//    $output .= '
	//    <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
	//     <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
	//     <div class="panel-body">'.$row["comment"].'</div>
	//     <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
	//    </div>
	//    ';
	//    $output .= get_reply_comment($row["comment_id"], $marginleft);
	//   }
	//  }
	//  return $output;
	// }


      
    // function get_reply_comment()
    // {
    // 	$output ='<p class="text-success"> Add Comment Success <p>'; 
    // 	echo  $output;
    // }

}
