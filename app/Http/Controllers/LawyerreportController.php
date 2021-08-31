<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use App\User;
use App\Exports\LawyerreportExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class LawyerreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type=Type::get();
        return view('pages.lawyer.report.index',compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=session('id');
        $page_title = 'รายงาน';
        $year=$request->year-"543";
        $type=$request->type;
        $offer=$request->offer;
        $user=User::where('id','=',$user_id)->get();

        if($request->type=="1"){
            $type_name ="คำสั่ง";
        }
        elseif($request->type=="3"){
            $type_name ="รัฐธรรมนูญ";
        }
        elseif($request->type=="3"){
            $type_name ="พระราชบัญญัติ";
        }
        elseif($request->type=="4"){
            $type_name ="พระราชกำหนด";
        }
        elseif($request->type=="5"){
            $type_name ="พระราชกฤษฎีกา";
        }
        elseif($request->type=="6"){
            $type_name ="กฎกระทรวง";
        }
        elseif($request->type=="7"){
            $type_name ="ระเบียบ";
        }
        elseif($request->type=="8"){
            $type_name ="คำสั่ง";
        }
        elseif($request->type=="9"){
            $type_name ="ประกาศ";
        }
        else{
            $type_name ="ทุกประเภท";
        }

        if($request->offer==null && $request->type==null){
            //dd("ว่างทั้งคู่");
            $law=DB::table('laws')
            ->join('types', 'types.t_id', '=', 'laws.type')
            ->join('users', 'users.id', '=', 'laws.user_id')
            ->where('date_announce', 'like', '%'.$year.'%')
            ->where('user_id', '=',$user_id)
            ->orderBy('laws.law_id', 'DESC')
            ->get();
        }elseif($request->type!=null && $request->offer==null ){
            //dd("ว่างเสนอ");
            $law=DB::table('laws')
            ->join('types', 'types.t_id', '=', 'laws.type')
            ->join('users', 'users.id', '=', 'laws.user_id')
            ->where('date_announce', 'like', '%'.$year.'%')
            ->where('user_id', '=',$user_id)
            ->where('type','=',$type)
            ->orderBy('laws.law_id', 'DESC')
            ->get();
        }elseif($request->offer!=null && $request->type==null){
            //dd("ว่างประเภท");
            $law=DB::table('laws')
            ->join('types', 'types.t_id', '=', 'laws.type')
            ->join('users', 'users.id', '=', 'laws.user_id')
            ->where('date_announce', 'like', '%'.$year.'%')
            ->where('offer','=',$offer)
            ->where('user_id', '=',$user_id)
            ->orderBy('laws.law_id', 'DESC')
            ->get();
        }else{
            //dd("ไม่ว่าง");
            $law=DB::table('laws')
            ->join('types', 'types.t_id', '=', 'laws.type')
            ->join('users', 'users.id', '=', 'laws.user_id')
            ->where('date_announce', 'like', '%'.$year.'%')
            ->where('type','=',$type)
            ->where('offer','=',$offer)
            ->where('user_id', '=',$user_id)
            ->orderBy('laws.law_id', 'DESC')
            ->get();
        }


        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $html = view('pages.lawyer.report.report_year',compact('page_title','law','year','user','type_name','offer'))->render();

        $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
            storage_path('fonts/'),
            ]),
            'fontdata' => $fontData + [
            'sarabun_new' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            ],
            ],
            'default_font' => 'sarabun_new',
            'format' => 'A4-L',
            ]);
        // $mpdf->SetMargins(3,2.5,3,1);
        $mpdf->SetTopMargin(15);
        $mpdf->SetLeftMargin(1);
        $mpdf->SetRightMargin(1);
        $mpdf->setAutoBottomMargin;
        $mpdf->WriteHTML($html);
        // $mpdf->AddPage('L');
        // $mpdf->WriteHTML($newpage);
        $mpdf->Output();
        return $mpdf->Output();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user_id=session('id');
        $year=$request->year-"543";
        $type=$request->type ;
        $offer=$request->offer;
        return Excel::download(new LawyerreportExport($year,$type,$offer,$user_id), 'lawyer.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd("jj");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
