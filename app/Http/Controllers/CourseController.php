<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.addcourse');
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
        $request->validate([
            'courseName'=>'required','courseFee'=>'required'
        ]);
       $courseAdd = new Course;

       $courseAdd->courseName = $request->courseName;
       $courseAdd->courseFee = $request->courseFee;
       $courseAdd->save();
       return back()->with('success','Course added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $courseData =  Course::all();
        return view('admin.viewcourse',['collection'=>$courseData,'i'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $courseData = Course::find($id);
       return view('admin.editcourse',['collection'=>$courseData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $updateCourse = Course::find($request->id);
        $updateCourse->courseName = $request->courseName;
        $updateCourse->courseFee = $request->courseFee;
        $updateCourse->save();

        return redirect()->route('course.show')->with('success','Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Course::find($id);
        $data ->delete();
        return redirect()->route('course.show')->with('success','Course deleted successfully.');
    }
}
