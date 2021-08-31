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
       $data = DB::table('tbl_customer')
         ->where('CustomerName', 'like', '%'.$query.'%')
         ->orWhere('Address', 'like', '%'.$query.'%')
         ->orWhere('City', 'like', '%'.$query.'%')
         ->orWhere('PostalCode', 'like', '%'.$query.'%')
         ->orWhere('Country', 'like', '%'.$query.'%')
         ->orderBy('CustomerID', 'desc')
         ->get();

      }
      else
      {
       $data = DB::table('laws')->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        @if($row1->id==$row1->id)
        <td>
            <div style="width:1100px; word-wrap: break-word; height:40px;" class="pointer">
                <a onclick="myFunction{{$key}}()" style="color:blue"><i class="fa fa-folder" style="font-size:20px"></i>$row1->name</a>
            </div>
            <table class="table" id="form1" >
                <tbody id="contenrif{{$key}}">
                    @foreach ($law as $row)
                        @if($row1->id==$row->name_id)
                            <tr>
                                <td style="padding-left:5%; width:92%">{{$row->name}}</td>
                            </tr>
                        @endif
                     @endforeach
                    </tbody>
                </table>
            </td>
        @endif
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
