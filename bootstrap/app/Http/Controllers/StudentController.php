<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'นักศึกษา';
        $student = Student::get();
        return view('pages.student.index', compact('page_title','student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.student.create');
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
        $page_title = 'นักศึกษา';
        $requestData = $request->all();
        //dd($requestData);
        Student::create($requestData);
        return redirect()->route('student.index')->with('success', 'Purchase Request created successfully.');

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
        // dd($id);
        $page_title = 'แก้ใขข้อมูลนักศึกษา';
        $student = Student::find($id);
         return view('pages.student.edit',compact('page_title','student','id'));
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

        //dd($request);
        $student = Student::find($id);
        $student->s_ID = $request->get('s_ID');
        $student->s_title = $request->get('s_title');
        $student->s_Name_th = $request->get('s_Name_th');
        $student->s_Lname_th = $request->get('s_Lname_th');
        $student->s_Name_en = $request->get('s_Name_en');
        $student->s_Lname_en = $request->get('s_Lname_en');
        $student->s_p_ID = $request->get('s_p_ID');
        $student->s_tel = $request->get('s_tel');
        $student->nationality = $request->get('nationality');
        $student->race = $request->get('race');
        $student->religion = $request->get('religion');
        $student->blood_type = $request->get('blood_type');
        $student->disability = $request->get('disability');
        $student->addr_b_t = $request->get('addr_b_t');
        $student->addr_b_city = $request->get('addr_b_city');
        $student->addr_b_prov = $request->get('addr_b_prov');
        $student->addr_b_post = $request->get('addr_b_post');
        $student->addr_cerrent = $request->get('addr_cerrent');
        $student->addr_c_t = $request->get('addr_c_t');
        $student->addr_c_city = $request->get('addr_c_city');
        $student->addr_c_prov = $request->get('addr_c_prov');
        $student->addr_c_post = $request->get('addr_c_post');
        $student->degree = $request->get('degree');
        $student->majorID = $request->get('majorID');
        $student->year_edu = $request->get('year_edu');
        $student->old_school_name = $request->get('old_school_name');
        $student->old_major = $request->get('old_major');
        $student->old_degree = $request->get('old_degree');
        $student->old_school_add = $request->get('old_school_add');
        $student->old_school_t = $request->get('old_school_t');
        $student->old_school_city = $request->get('old_school_city');
        $student->old_school_prov = $request->get('old_school_prov');
        $student->old_school_post = $request->get('old_school_post');
        $student->father_pID = $request->get('father_pID');
        $student->father_title = $request->get('father_title');
        $student->father_name = $request->get('father_name');
        $student->father_lname = $request->get('father_lname');
        $student->father_opt = $request->get('father_opt');
        $student->father_income = $request->get('father_income');
        $student->father_tel = $request->get('father_tel');
        $student->father_status = $request->get('father_status');
        $student->mother_pID = $request->get('mother_pID');
        $student->mother_title = $request->get('mother_title');
        $student->mother_name = $request->get('mother_name');
        $student->mother_opt = $request->get('mother_opt');
        $student->mother_income = $request->get('mother_income');
        $student->mother_tel = $request->get('mother_tel');
        $student->mother_status = $request->get('mother_status');
        $student->save();
        return redirect()->route('student.index')->with('success','อัพเดตเรียบร้อย');






        $branch->save();
        return redirect()->route('branch.index')->with('success','อัพเดตเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('success','ลบข้อมูลเรียบร้อย');
    }
}
