<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\testAjaxSearchModel;
class testAjaxSearchController extends Controller
{
	public function getFormSearch()
	{
		return view("ajax.form_search");
	}

	function action(Request $request)
	{
		if($request->ajax())
		{
			$output = '';
			$query = $request->get('query');
			if($query != '')
			{
				$data = testAjaxSearchModel::where('CustomerName', 'like', '%'.$query.'%')
				->orWhere('Address', 'like', '%'.$query.'%')
				->orWhere('Email', 'like', '%'.$query.'%')
				->orWhere('City', 'like', '%'.$query.'%')
				->orWhere('PostalCode', 'like', '%'.$query.'%')
				->orWhere('Country', 'like', '%'.$query.'%')
				->orderBy('CustomerID', 'desc')
				->get();

			}
			else
			{
				$data =testAjaxSearchModel::all();
			}
			$total_row = $data->count();
			if($total_row > 0)
			{
				foreach($data as $row)
				{
					$output .= '
					<tr>
					<td>'.$row->CustomerName.'</td>
					<td>'.$row->Email.'</td>
					<td>'.$row->Address.'</td>
					<td>'.$row->City.'</td>
					<td>'.$row->PostalCode.'</td>
					<td>'.$row->Country.'</td>
					</tr>
					';
				}
			}
			else
			{
				$output = '
				<tr>
				<td align="center" colspan="5">No Data Found</td>
				</tr>
				';
			}
			$data = array(
				'table_data'  => $output,
				'total_data'  => $total_row
			);

			echo json_encode($data);
		}
	}
}
