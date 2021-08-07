<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stData =Student::all();
        return view('admin.addpayment',['collection'=>$stData]);
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
        $request ->validate([
            'student' =>'required', 'amount' =>'required'
        ]);

        $payment = new Payment;
        $payment -> stu_id = $request -> student;
        $payment -> amount = $request -> amount;
        $payment ->save();
        return back()->with('success','Payment added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $getData = Payment::all();
        return view('admin.viewpayment',['collection'=>$getData,'i'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getData = Payment::find($id);
        $stData =Student::all();
        return view('admin.editpayment',['collection'=>$stData,'payData'=>$getData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updata = Payment::find($request->id);
        $updata -> stu_id= $request->student;
        $updata -> amount= $request->amount;
        $updata->save();
        return redirect()->route('payment.show')->with('success','Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Payment::find($id)->delete();
        return back()->with('success','Payment deleted successfully.');
    }
}
