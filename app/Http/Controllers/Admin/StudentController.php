<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::orderBy('id','desc')->get();
        return view('admin.student.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users']  = User::all();
        $data['labels'] = Label::all();
        return view('admin.student.create',$data);
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
            'user_id'        => 'required',
            'label_id'       => 'required',
            'name'           => 'required',
            'phone'          => 'required',
            'gender'         => 'required',
            'father_name'    => 'required',
            'mother_name'    => 'required',
            'address'        => 'required',
            'admission_date' => 'required',
            'session'        => 'required',
            'date_of_birth'  => 'required',
            'status'         => 'required|in:'.Student::Active_Status.','.Student::InActive_Status,
            'image'          => 'mimes:jpeg,png|max:2048'
        ]);
//        dd($request->all());
        $data = $request->except(['_token','image']);

//        For Registration Number
        $lastStudent        =   Student::orderBy('created_at', 'desc')->first();
        if (isset($lastStudent)) {
            $reg_no                = ($lastStudent->reg_no + 1);
            $data['reg_no']        = $reg_no;
            $data['reg_code']      = 'APCS-'.date('Y').'-'.$reg_no;
        } else {
            $data['reg_no']        = 10000;
            $data['reg_code']      = 'APCS-'.date('Y').'-'.'10000';
        }


//        $data['reg_no'] = 'APCS-0000-'.date('Y');

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = 'images/student/thumbnail';
            $file_name = time().rand('0000','9999').'.'.$file->getClientOriginalName();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(150,150,function ($constraint){
                $constraint->aspectRatio();
            })->save($path.'/'.$file_name);

            $destination_path = 'images/student/original';
            $file->move($destination_path,$file_name);
            $data['image'] = $destination_path.'/'.$file_name;
        }

        Student::create($data);
        session()->flash('message','Student Added Successfully!');
        return redirect()->route('admin.student.index');
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
        $data['users']  = User::all();
        $data['labels'] = Label::all();
        $data['student'] = Student::findOrFail($id);
        return view('admin.student.edit',$data);
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
            'user_id'        => 'required',
            'label_id'       => 'required',
            'name'           => 'required',
            'phone'          => 'required',
            'gender'         => 'required',
            'father_name'    => 'required',
            'mother_name'    => 'required',
            'address'        => 'required',
            'admission_date' => 'required',
            'session'        => 'required',
            'date_of_birth'  => 'required',
            'status'         => 'required|in:'.Student::Active_Status.','.Student::InActive_Status,
            'image'          => 'mimes:jpeg,png|max:2048'
        ]);
        $data = $request->except(['_token','image']);

        $student    = Student::findOrFail($id);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = 'images/student/thumbnail';
            $file_name = time().rand('0000','9999').'.'.$file->getClientOriginalName();
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(150,150,function ($constraint){
                $constraint->aspectRatio();
            })->save($path.'/'.$file_name);

            $destination_path = 'images/student/original';
            $file->move($destination_path,$file_name);
            $data['image'] = $destination_path.'/'.$file_name;

            if ($student->image != null && file_exists($student->image))
            {
                unlink($student->image);
            }
        }

        $student->update($data);
        session()->flash('message','Student Updated Successfully!');
        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student    = Student::findOrFail($id);
        if ($student->image != null && file_exists($student->image))
        {
            unlink($student->image);
        }
        $student->delete();
        session()->flash('message','Student Deleted Successfully!');
        return redirect()->route('admin.student.index');
    }
}
