<?php

namespace App\Http\Controllers;
use App\LAW;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class FRontendController extends Controller
{
    public function home1()
    {

        $page_title = 'กฎหมาย';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(law_id) as created_at'))
        ->orderBy('created_at', 'desc')
        ->groupBy('name_id')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        // $law=DB::table('laws')
        //         ->where('laws.deleted_at','=',null)
        //         ->whereBetween('stutas', ['1', '2'])
        //         ->orderByDesc('law_id')
        //         ->get();
        return view('pages.frontend.home1',compact('page_title','name',));
    }

    public function constitution()
    {

        $page_title = 'รัฐธรรมนูญ';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(law_id) as created_at'))
        ->where('type','=','2')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->orderBy('created_at', 'desc')
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

    public function enactment()
    {
        $page_title = 'พระราชบัญญัติ';
        $name=DB::table('laws')
            ->select('name_id',DB::raw('max(law_id) as created_at'))
            ->where('type','=','3')
            ->where('laws.deleted_at','=',null)
            ->orderBy('created_at', 'desc')
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

    public function royal_enactment()
    {
        $page_title = 'พระราชกำหนด';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(law_id) as created_at'))
        ->where('type','=','4')
        ->where('laws.deleted_at','=',null)
        ->orderBy('created_at', 'desc')
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

    public function decree()
    {
        $page_title = 'พระราชกฤษฎีกา';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(law_id) as created_at'))
        ->where('type','=','5')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->orderBy('created_at', 'desc')
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

    public function ministry()
    {
        $page_title = 'กฎกระทรวง';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(law_id) as created_at'))
        ->where('type','=','6')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->orderBy('created_at', 'desc')
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

    public function regularity()
    {
        $page_title = 'ระเบียบ';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(law_id) as created_at'))
        ->where('type','=','7')
        ->where('laws.deleted_at','=',null)
        ->orderBy('created_at', 'desc')
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

    public function rules()
    {
        $page_title = 'ข้อบังคับ';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(law_id) as created_at'))
        ->where('type','=','8')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->orderBy('created_at', 'desc')
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

    public function declare()
    {
        $page_title = 'ประกาศ';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(law_id) as created_at'))
        ->where('type','=','9')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->orderBy('created_at', 'desc')
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

    public function dictation()
    {
        $page_title = 'คำสั่ง';
        $name=DB::table('laws')
        ->select('name_id',DB::raw('max(law_id) as created_at'))
        ->where('type','=','1')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->orderBy('created_at', 'desc')
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
