<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();
        return view('admin.addstudent',['collection'=>$course]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $all = Student::all();
        return view('admin.paymentreport',['collection'=>$all,'i'=>1]);
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
           'course'=>'required',
           'name'=>'required',
           'address'=>'required',
           'phone'=>'required',
           'email'=>'required|unique:students',
           'password'=>'required|min:5',
           'image'=>'required',
       ]);

       $img = $request->file('image');
       $imgName = time().'.'.$img->extension();
       $img->move(public_path('assets/img/student'),$imgName);

       $student = new Student;
       $student->course_id = $request->course;
       $student->name = $request->name;
       $student->address = $request->address;
       $student->contact = $request->phone;
       $student->email = $request->email;
       $student->password = Hash::make($request->password);
       $student->image = $imgName;
       $student->save();
       return back()->with('success','Student added successfully');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Student::all();
        return view('admin.viewstudent',['collection'=>$data,'i'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allData = Student::find($id);
        $course = Course::all();
        return view('admin.editstudent',['collection'=>$course,'stuData'=>$allData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        if ($req->file('image')) {

                unlink(public_path('assets/img/student'.'/'.$req->oldImg));
    
                $data =Student::find($req->id);
    
                $image = $req->file('image');
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('assets/img/student'),$imageName);

                $data ->course_id = $req->course;
                $data ->name = $req->name;
                $data ->address = $req->address;
                $data ->contact = $req->phone;
                $data ->image = $imageName;
                $data ->save();
                return redirect()->route('student.show')->with('success','Student updated successfully');
              
           }
           else{
                $data =Student::find($req->id);

                $data ->course_id = $req->course;
                $data ->name = $req->name;
                $data ->address = $req->address;
                $data ->contact = $req->phone;
                $data ->image = $req->oldImg;
                $data ->save();
                return redirect()->route('student.show')->with('success','Student updated successfully');
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Student::find($id);
        unlink(public_path('assets/img/student'.'/'.$deleteData->image));
        $deleteData->delete();
        return back()->with('success','Student deleted successfully.');
    }

    public function stuInfo(){
        if(Session()->has('student')){
            $getId = Session::get('student')['id'];
        }
        $allData = Student::find($getId);
        return view('student.dashboard',['collection'=>$allData]);

    }
    public function stuLogout(){
        if (Session::has('student')) {
            Session()->pull('student');
            return redirect('/');
        }
    }

}
