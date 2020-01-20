<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Label;
use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['results'] = Result::orderBy('id','desc')->get();
        return view('admin.result.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['labels']     = Label::all();
        $data['users']      = User::all();
        $data['students']   = Student::all();
        $data['subjects']   = Subject::all();
        $data['exams']      = Exam::all();
        return view('admin.result.create',$data);
    }

    /**
     *  this two method using for get student and result using ajax
     */
    public function getStudent(Request $request){
            $data = Student::select('name','id')->where('label_id',$request->id)->get();
            return response()->json($data);
    }
    public function getSubject(Request $request){
            $data = Subject::select('name','id')->where('label_id',$request->id)->get();
            return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'user_id'    => 'required',
           'label_id'   => 'required',
           'student_id' => 'required',
           'subject_id' => 'required',
           'exam_id'    => 'required',
           'exam_date'  => 'required',
           'status'     => 'required:in'.Result::Active_Status.','.Result::InActive_Status,
       ]);
        $data   = $request->except('_token');
        $student = Student::select('reg_no')->where('label_id',$request->label_id)->first();
        if ($student !=null ){
            $data['reg_no'] = $student->reg_no;
        }
        Result::create($data);
        session()->flash('message','Student Added Successfully!');
        return redirect()->route('admin.result.index');
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


        $data['result']      =  Result::findOrFail($id);
        $data['users']       =  User::all();
        $data['labels']      =  Label::all();
        $data['exams']       =  Exam::all();
//        $data['students']    =  Student::with('label');
        return view('admin.result.edit',$data);
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
        $request->validate([
            'user_id'    => 'required',
            'label_id'   => 'required',
            'exam_id'    => 'required',
            'exam_date'  => 'required',
            'status'     => 'required:in'.Result::Active_Status.','.Result::InActive_Status,
        ]);
        $data = $request->except('_token');
//        dd($data);

        $result = Result::findOrFail($id);

        $result->update($data);
        session()->flash('message','Result Updated Successfully!');
        return redirect()->route('admin.result.index');
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
