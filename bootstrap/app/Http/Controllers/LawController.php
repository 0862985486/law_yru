<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LAW;
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
        $law=Law::all();
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
        $name =DB::table('names')
        ->orderByDesc('id')
        ->get();
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

        LAW::create($requestData);
        return redirect()->route('law.index')->with('success', 'แก้ไขข้อมูลเรียบร้อย');
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
        $name =DB::table('names')
        ->orderByDesc('id')
        ->get();
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
        $law->name	 = $request->get('name');
        $law->date_out = $request->get('date_out');
        $law->date_announce	 = $request->get('date_announce');
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
        $law = LAW::find($id);
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
