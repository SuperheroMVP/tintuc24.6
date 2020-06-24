<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ajax_Area_Model;
class Ajax_Area_Controller extends Controller
{
    public function index()
    {
    	$list_country = Ajax_Area_Model::groupBy('country')->get();
    	return view('ajax.ajax_area',['list_country'=>$list_country]);
    }
    public function fetchArea(Request $request)
    {
       $select = $request->get('select');
       $value = $request->get('value');
       $dependent = $request->get('dependent');

       $data = Ajax_Area_Model::where($select,$value)->groupBy($dependent)->get();

          $output = '<option value="">Select '.ucfirst($dependent).'</option>';
	     foreach($data as $row)
	     {
	      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
	     }
	     echo $output;


	     // $select = $request->get('select');
	     // $value = $request->get('value');
	     // $dependent = $request->get('dependent');
	     // $data = Ajax_Area_Model::where($select, $value)->groupBy($dependent)->get();
	     // $output = '<option value="">Select '.ucfirst($dependent).'</option>';
	     // foreach($data as $row)
	     // {
	     //  $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
	     // }
	     // echo $output;
    
    }
}
