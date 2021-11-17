<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Law;
use App\Name;
use App\Type;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'กฎหมาย';
        $user_id=session('id');

        $law=DB::table('laws')
        ->join('types', 'types.t_id', '=', 'laws.type')
        ->join('users', 'id', '=', 'laws.user_id')
        ->where('laws.deleted_at','=',null)
        ->where('laws.stutas','=','3')
        ->orderBy('laws.law_id', 'DESC')
        ->get();
        //dd($law);
        return view('pages.check.index', compact('page_title','law'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id=session('id');
        $law  = Law::find($id);
        $law->stutas = "1";
        $law->user_id_check=$user_id;
        $law->save();
        return redirect()->route('law.index')->with('success', 'อัพเดตสถานะเรียบร้อย');

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
        $law=DB::table('laws')
        ->join('types', 'types.t_id', '=', 'laws.type')
        ->join('users', 'users.id', '=', 'laws.user_id')
        ->where('laws.law_id','=',$id)
        ->get();
        //dd($law);
        $name = Law::all();
        $type = Type::all();
        return view('pages.check.edit', compact('page_title','law','name','type'));
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
        $law  = Law::find($id);
        $user_id=session('id');
        $law->stutas = "4";
        $law->comment = $request->comment;
        $law->user_id_check=$user_id;
        $law->save();
        return redirect()->route('law.index')->with('success', 'อัพเดตสถานะเรียบร้อย');
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

    public function pass($id)
    {
        //
    }
}
