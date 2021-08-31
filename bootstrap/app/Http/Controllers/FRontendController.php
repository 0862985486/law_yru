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
            ->join('names', 'names.id', '=', 'laws.name_id')
            ->select('names.name','names.id')
            ->groupBy('name_id')
            ->get();
        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->get();
        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function constitution()
    {
        $page_title = 'รัฐธรรมนูญ';
        $name=DB::table('laws')
            ->join('names', 'names.id', '=', 'laws.name_id')
            ->select('names.name','names.id')
            ->where('laws.type','=','2')
            ->groupBy('name_id')
            ->get();
        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','2')
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function enactment()
    {
        $page_title = 'พระราชบัญญัติ';
        $name=DB::table('laws')
            ->join('names', 'names.id', '=', 'laws.name_id')
            ->select('names.name','names.id')
            ->where('laws.type','=','3')
            ->groupBy('name_id')
            ->get();
        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','3')
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function royal_enactment()
    {
        $page_title = 'พระราชกำหนด';
        $name=DB::table('laws')
            ->join('names', 'names.id', '=', 'laws.name_id')
            ->select('names.name','names.id')
            ->where('laws.type','=','4')
            ->groupBy('name_id')
            ->get();
        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','4')
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function decree()
    {
        $page_title = 'พระราชกฤษฎีกา';
        $name=DB::table('laws')
            ->join('names', 'names.id', '=', 'laws.name_id')
            ->select('names.name','names.id')
            ->where('laws.type','=','5')
            ->groupBy('name_id')
            ->get();
        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','5')
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function ministry()
    {
        $page_title = 'กฎกระทรวง';
        $name=DB::table('laws')
            ->join('names', 'names.id', '=', 'laws.name_id')
            ->select('names.name','names.id')
            ->where('laws.type','=','6')
            ->groupBy('name_id')
            ->get();
        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','6')
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function regularity()
    {
        $page_title = 'ระเบียบ';
        $name=DB::table('laws')
            ->join('names', 'names.id', '=', 'laws.name_id')
            ->select('names.name','names.id')
            ->where('laws.type','=','7')
            ->groupBy('name_id')
            ->get();
        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','7')
                ->get();


        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function rules()
    {
        $page_title = 'ข้อบังคับ';
        $name=DB::table('laws')
            ->join('names', 'names.id', '=', 'laws.name_id')
            ->select('names.name','names.id')
            ->where('laws.type','=','8')
            ->groupBy('name_id')
            ->get();
        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','8')
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function declare()
    {
        $page_title = 'ประกาศ';
        $name=DB::table('laws')
            ->join('names', 'names.id', '=', 'laws.name_id')
            ->select('names.name','names.id')
            ->where('laws.type','=','9')
            ->groupBy('name_id')
            ->get();
        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','9')
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }

    public function dictation()
    {
        $page_title = 'คำสั่ง';
        $name=DB::table('laws')
            ->join('names', 'names.id', '=', 'laws.name_id')
            ->select('names.name','names.id')
            ->where('laws.type','=','1')
            ->groupBy('name_id')
            ->get();
        $law=DB::table('laws')
                ->where('stutas','=','1')
                ->where('type','=','1')
                ->get();

        return view('pages.frontend.home1',compact('page_title','name','law'));
    }
}
