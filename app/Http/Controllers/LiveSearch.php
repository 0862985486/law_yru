<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveSearch extends Controller
{
    function index()
    {
     return view('pages.frontend.search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('laws')
         ->where('name_id', 'like', '%'.$query.'%')

         ->get();

      }
      else
      {
       $data = DB::table('laws')
       ->join('types', 'types.t_id', '=', 'laws.type')
       ->where('laws.deleted_at','=',null)
       ->whereBetween('stutas', ['1', '2'])
       ->orderBy('law_id', 'desc')
       ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
            <td style="width:1000px; word-wrap: break-word;" class="pointer">
            <h6 style="color:blue">'.$row->name_id.'</h6>
            </td>
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
