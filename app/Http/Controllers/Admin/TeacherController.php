<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['teachers'] = Teacher::orderBy('id','desc')->get();
        return view('admin.teacher.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.teacher.create');
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
           'name'         => 'required',
           'email'        => 'required|email|unique:teachers',
           'phone'        => 'required',
           'gender'       => 'required',
           'age'          => 'required',
           'joining_date' => 'required',
           'salary'       => 'required',
           'designation'  => 'required',
           'status'       => 'required|in:'.Teacher::Active_Status.','.Teacher::InActive_Status,
           'image'        => 'mimes:jpeg,png|max:2048'
       ]);

       $data = $request->except(['_token','image']);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path = 'images/teacher';
            $file_name = time().rand('0000','9999').'.'.$file->getClientOriginalName();
            $file->move($path,$file_name);
            $data['image'] = $path.'/'.$file_name;
        }
        Teacher::create($data);
        session()->flash('message','Teacher Created Successfully!');
        return redirect()->route('admin.teacher.index');
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
        $data['teacher'] = Teacher::findOrFail($id);
       return view('admin.teacher.edit',$data);
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
            'name'         => 'required',
            'email'        => 'required|email',
            'phone'        => 'required',
            'gender'       => 'required',
            'age'          => 'required',
            'joining_date' => 'required',
            'salary'       => 'required',
            'designation'  => 'required',
            'status'       => 'required|in:'.Teacher::Active_Status.','.Teacher::InActive_Status,
            'image'        => 'mimes:jpeg,png|max:2048'
        ]);

        $data = $request->except(['_token','image']);

        $teacher = Teacher::findOrFail($id);

        if ($request->hasFile('image'))
        {
            $file        = $request->file('image');
            $path        = 'images/teacher';
            $file_name   = time().rand('0000','9999').'.'.$file->getClientOriginalName();
            $file->move($path,$file_name);
            $data['image'] = $path.'/'.$file_name;
            if ($teacher->image != null && file_exists($teacher->image))
            {
                unlink($teacher->image);
            }
        }
        $teacher->update($data);
        session()->flash('message','Teacher Update Successfully!');
        return redirect()->route('admin.teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        if ($teacher->image != null && file_exists($teacher->image))
        {
            unlink($teacher->image);
        }
        $teacher->delete();
        session()->flash('message','Teacher Deleted Successfully!');
        return redirect()->route('admin.teacher.index');
    }
}
