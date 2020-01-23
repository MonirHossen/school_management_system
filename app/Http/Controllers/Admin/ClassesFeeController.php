<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassesFee;
use App\Models\FeeType;
use App\Models\Label;
use Illuminate\Http\Request;

class ClassesFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['classes_fees'] = ClassesFee::all();
//        dd($data);
        return view('admin.fee-management.classes-fee.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['labels']     = Label::all();
        $data['fee_types']  = FeeType::all();

        return view('admin.fee-management.classes-fee.create',$data);

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
            'label_id'  =>  'required',
            'type_id'   =>  'required',
            'amount'    =>  'required',
        ]);
        ClassesFee::create($request->except('_token'));
        session()->flash('message','Classes Fee Added Successfully!');
        return redirect()->route('admin.classes_fee.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassesFee $classesFee)
    {
        $data['classes_fee'] = $classesFee;
        $data['labels']      = Label::all();
        $data['fee_types']   = FeeType::all();
        return view('admin.fee-management.classes-fee.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassesFee $classesFee)
    {
        $request->validate([
            'label_id'  =>  'required',
            'type_id'   =>  'required',
            'amount'    =>  'required',
        ]);
        $classesFee->update($request->except('_token'));
        session()->flash('message','Classes Fee Updated Successfully!');
        return redirect()->route('admin.classes_fee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassesFee $classesFee)
    {
        $classesFee->delete();
        session()->flash('message','Classes Fee Deleted Successfully!');
        return redirect()->route('admin.classes_fee.index');
    }
}
