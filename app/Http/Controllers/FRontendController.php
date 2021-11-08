<?php

namespace App\Http\Controllers;
use App\LAW;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class FRontendController extends Controller
{
    public function home1(Request $request)
    {

        $page_title = 'กฎหมาย';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5,['*'],'name_page');
                $law=DB::table('laws')
                ->where('laws.deleted_at','=',null)
                ->whereBetween('stutas', ['1', '2'])
                ->orderByDesc('laws.law_id')
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function constitution(Request $request)
    {

        $page_title = 'รัฐธรรมนูญ';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','2')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);
        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','2')
                ->where('laws.deleted_at','=',null)
                ->whereBetween('stutas', ['1', '2'])
                ->orderByDesc('law_id')
                ->get();
            //dd($law);
        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function enactment(Request $request)
    {
        $page_title = 'พระราชบัญญัติ';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','3')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','3')
                ->where('laws.deleted_at','=',null)
                ->whereBetween('stutas', ['1', '2'])
                ->orderByDesc('law_id')
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function royal_enactment(Request $request)
    {
        $page_title = 'พระราชกำหนด';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','4')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','4')
                ->where('laws.deleted_at','=',null)
                ->whereBetween('stutas', ['1', '2'])
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function decree(Request $request)
    {
        $page_title = 'พระราชกฤษฎีกา';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','5')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','5')
                ->where('laws.deleted_at','=',null)
                ->whereBetween('stutas', ['1', '2'])
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function ministry(Request $request)
    {
        $page_title = 'กฎกระทรวง';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','6')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','6')
                ->where('laws.deleted_at','=',null)
                ->whereBetween('stutas', ['1', '2'])
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function regularity(Request $request)
    {
        $page_title = 'ระเบียบ';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','7')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','7')
                ->where('laws.deleted_at','=',null)
                ->whereBetween('stutas', ['1', '2'])
                ->get();


        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function rules(Request $request)
    {
        $page_title = 'ข้อบังคับ';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','8')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','8')
                ->where('laws.deleted_at','=',null)
                ->whereBetween('stutas', ['1', '2'])
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function declare(Request $request)
    {
        $page_title = 'ประกาศ';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','9')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','9')
                ->where('laws.deleted_at','=',null)
                ->whereBetween('stutas', ['1', '2'])
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function dictation(Request $request)
    {
        $page_title = 'คำสั่ง';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(date_out) as date_out'))
        ->orderBy('date_out', 'desc')
        ->where('type','=','1')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->groupBy('name_id')
        ->paginate(5);

        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','1')
                ->where('laws.deleted_at','=',null)
                ->whereBetween('stutas', ['1', '2'])
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }
}
