<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function login(Request $request){
        $request ->validate([
            'role'=>'required','email'=>'required','password'=>'required'
        ]);
        
        if ($request->role == '1') {
        $adminData = Admin::where('email',$request->email)->first();
        if ($adminData) {
            if (Hash::check($request->password, $adminData->password)) {
                $request->Session()->put('admin', $adminData);
                return redirect()->route('admin.dashboard');
            } else {
                return back()->with('fail','Password is incorrect');
            }
            
        } else {
            return back()->with('fail','No such account in this email');
        }

        }
        
        elseif($request->role == '2'){
            $getStudent = Student::where('email',$request->email)->first();
            if ($getStudent) {
               if (Hash::check($request->password, $getStudent->password)) {
                $request->Session()->put('student', $getStudent);
                return redirect()->route('student.dashboard');
               } else {
                return back()->with('fail','Password is incorrect');
               }
               
            } else {
                return back()->with('fail','No such account in this email');
            }
        }
        else {
            return back()->with('fail','Choose your correct role');
        }
        

    }
}
