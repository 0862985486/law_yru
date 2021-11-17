<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxPaginationController extends Controller
{
    public function ajaxPagination(Request $request)
    {
      $keyword=$request->keyword ?? false;
      $page_title = 'กฎหมาย';
      $num="1";
      $name=DB::table('laws')
      ->select('name_id',DB::raw('max(date_out) as date_out'))
      ->orderBy('date_out', 'desc')
      ->where('laws.deleted_at','=',null)
      ->whereBetween('stutas', ['1', '2'])
      ->groupBy('name_id')
      ->paginate(5,['*'],"name_page");

      if($request->keyword==""){
        if ($request->ajax()) {
            $num="1";
            return view('pages.frontend.presult', compact('name','num'));
        }
      }else{
            $num="2";
            $name=DB::table('laws')
            ->select('name_id',DB::raw('max(date_out) as date_out'))
            ->orderBy('date_out', 'desc')
            ->where('law_name','like',"%{$keyword}%")
            ->orWhere('name_id','like',"%{$keyword}%")
            ->orWhere('year','like',"%{$keyword}%")
            ->groupBy('name_id')
            ->get();
            $law=DB::table('laws')
            ->where('law_name','like',"%{$keyword}%")
            ->orWhere('name_id','like',"%{$keyword}%")
            ->orWhere('year','like',"%{$keyword}%")
            ->get();

            return view('pages.frontend.presult', compact('name','num','law'));
      }

      return view('pages.frontend.ajaxPagination',compact('name','page_title','num'));
    }
}
