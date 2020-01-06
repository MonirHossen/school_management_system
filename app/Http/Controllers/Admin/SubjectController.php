<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subjects'] = Subject::orderBy('id','desc')->get();
        return view('admin.subject.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['labels'] = Label::all();
        return view('admin.subject.create',$data);
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
              'label_id' => 'required',
              'name' => 'required',
              'status' => 'required|in:'.Subject::Active_Status.','.Subject::InActive_Status,
          ]);
          Subject::create($request->except('_token'));
         session()->flash('message','Subject Added Successfully!');
         return redirect()->route('admin.subject.index');
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
    public function edit(Subject $subject)
    {
        $data['labels']  = Label::all();
       $data['subject'] =  $subject;

       return view('admin.subject.edit',$data);
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
            'label_id' => 'required',
            'name' => 'required',
            'status' => 'required|in:'.Subject::Active_Status.','.Subject::InActive_Status,
        ]);
        $data      = $request->except('_token');
        $subject   = Subject::findOrFail($id);
        $subject->update($data);
        session()->flash('message','Subject Update Successfully!');
        return redirect()->route('admin.subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject   = Subject::findOrFail($id);
        $subject->delete();
        session()->flash('message','Subject Deleted Successfully!');
        return redirect()->route('admin.subject.index');
    }
}
