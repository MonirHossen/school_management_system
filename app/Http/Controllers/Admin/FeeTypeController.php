<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeeType;
use Illuminate\Http\Request;

class FeeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['fee_types'] = FeeType::all();
        return view('admin.fee-management.fee-type.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fee-management.fee-type.create');
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
            'fee_type' => 'required',
            'status'   => 'required:in'.FeeType::Active_Status.','.FeeType::InActive_Status
        ]);
        FeeType::create($request->except('_token'));
        session()->flash('message','Fee Types Added Successfully!');
        return redirect()->route('admin.fee_type.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['fee_type'] = FeeType::findOrFail($id);
        return view('admin.fee-management.fee-type.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeeType $feeType)
    {
        $request->validate([
            'fee_type' => 'required',
            'status'   => 'required:in'.FeeType::Active_Status.','.FeeType::InActive_Status
        ]);
        $feeType->update($request->except('_token'));
        session()->flash('message','Fee Types Updated Successfully!');
        return redirect()->route('admin.fee_type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeeType $feeType)
    {
        $feeType->delete();
        session()->flash('message','Fee Types Deleted Successfully!');
        return redirect()->back();
    }
}
