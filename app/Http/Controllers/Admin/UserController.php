<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['users'] = User::orderBy('id','desc')->get();
       return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
           'role' => 'required|in:'.User::User_Admin_Role.','.User::User_Teacher_Role,
           'name'       => 'required',
           'email'      => 'required|email|unique:users',
           'password'   => 'required|confirmed',
           'gender'     => 'required',
           'image'      => 'mimes:jpeg,png|max:2048'
       ]);
       $data = $request->except(['_token','image','password']);
       $data['password'] = bcrypt($request->password);
       if ($request->hasFile('image')){
           $file = $request->file('image');
           $path = 'images/user';
           $file_name = time().rand('0000','9999').'.'.$file->getClientOriginalName();
           $file->move($path,$file_name);
           $data['image'] = $path.'/'.$file_name;
           }
        User::create($data);

        session()->flash('message','Admin Created Successfully!');
        return redirect()->route('user.create');
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
      $data['user'] = User::findOrFail($id);
      return view('admin.user.edit',$data);
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
            'role' => 'required|in:'.User::User_Admin_Role.','.User::User_Teacher_Role,
            'name'       => 'required',
            'gender'     => 'required',
            'image'      => 'mimes:jpeg,png|max:2048'
        ]);
        $data['role']       = $request->role;
        $data['name']       = $request->name;
        $data['gender']     = $request->gender;
        $data['phone']      = $request->phone;
        $data['address']    = $request->address;

        $user = User::findOrFail($id);

        if ($request->hasFile('image'))
        {
            $file        = $request->file('image');
            $path        = 'images/user';
            $file_name   = time().rand('0000','9999').'.'.$file->getClientOriginalName();
            $file->move($path,$file_name);
            $data['image'] = $path.'/'.$file_name;
            if ($user->image != null && file_exists($user->image))
            {
                unlink($user->image);
            }
        }
        $user->update($data);
        session()->flash('message','Admin Update Successfully!');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->image != null && file_exists($user->image))
        {
            unlink($user->image);
        }
        $user->delete();
        session()->flash('message','Admin Deleted Successfully!');
        return redirect()->route('user.index');
    }
}
