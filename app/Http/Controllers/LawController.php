<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Law;
use App\Name;
use App\Type;


class LawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'กฎหมาย';
        $law=DB::table('laws')
        ->join('types', 'types.t_id', '=', 'laws.type')
        ->where('laws.deleted_at','=',null)
        ->whereBetween('stutas', ['1', '2'])
        ->orderBy('law_id', 'desc')
        ->get();
        return view('pages.law.index', compact('page_title','law'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'เพิ่มกฎหมายใหม่';
        $name = Law::all();
        $type = Type::all();
        return view('pages.law.create', compact('page_title','name','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        if ($request->hasFile('file_law')) {
            $filenameWithExt = $request->file('file_law')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('file_law')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            // Upload Image
            $path = $request->file('file_law')->storeAs('public/law', $fileNameToStore);
            }
            // Else add a dummy image
            else {
            $fileNameToStore = null;
        }


        $requestData = $request->all();
        $requestData['stutas']= "1";
        $requestData['file_law'] = $fileNameToStore;
        $requestData['date_announce'] = Carbon::now();

        LAW::create($requestData);
        return redirect()->route('law.index')->with('success', 'เพิ่มข้อมูลเรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $page_title = 'กฎหมาย';
        $law=Law::find($id);
        $name = Law::all();
        $type = Type::all();
        return view('pages.law.edit', compact('page_title','law','name','type'));
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
        //dd($request->stutas);
        if ($request->hasFile('file_law')) {
            $filenameWithExt = $request->file('file_law')->getClientOriginalName ();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('file_law')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename. '_'. time().'.'.$extension;
            // Upload Image
            $path = $request->file('file_law')->storeAs('public/law', $fileNameToStore);
            }
            // Else add a dummy image
            else {
            $fileNameToStore = null;

        }

        $law = LAW::find($id);
        $law->file_law =  $fileNameToStore ?? $law->file_law ;
        $law->offer = $request->get('offer');
        $law->type	 = $request->get('type');
        $law->name_id = $request->get('name_id');
        $law->law_name	 = $request->get('law_name');
        $law->date_out = $request->get('date_out');
        $law->year = $request->get('year');
        $law->date_announce	 = Carbon::now();
        $law->stutas	 = $request->get('stutas');
        $law->save();
        return redirect()->route('law.index')->with('success','แก้ไขเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $law = Law::find($id);
        $law->delete();
        return redirect()->route('law.index')->with('success','ลบข้อมูลเรียบร้อย');
    }

    public function names( Request $request)
    {
        $requestData = $request->all();
        //dd($requestData);
        Name::create($requestData);
        return redirect()->back();
    }
}
