<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LAW;
use App\Name;
use App\Type;


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
        ->select('name_id')
        ->where('name_id', 'like', '%'.$query.'%')
        ->groupBy('name_id')
        ->get();
      }
      else
      {
       $data[1] = DB::table('laws')
         ->orderBy('id', 'desc')
         ->get();

        $data[2] = DB::table('laws')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>

                <td>
                    <div style="width:1100px; word-wrap: break-word; height:40px;" class="pointer">
                        <a onclick="myFunction{{$key}}()" style="color:blue"><i class="fa fa-folder" style="font-size:20px"></i>'.$row->name_id.'</a>
                    </div>
                    <table class="table" id="form1" >
                        <tbody id="contenrif{{$key}}">
                                    <tr>
                                        <td style="padding-left:5%; width:92%">'.$row->name.'</td>
                                    </tr>
                        </tbody>
                    </table>
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

