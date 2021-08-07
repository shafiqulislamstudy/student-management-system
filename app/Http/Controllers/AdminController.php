<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\student;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Http\Request;
use Session;


class AdminController extends Controller
{
    public function index(){
        $allstu = Student::all();
        $allcou = Course::all();
        $allpay = Payment::all();
        return view('admin.dashboard',['stu'=>$allstu,'cou'=>$allcou,'pay'=>$allpay]);
    }
    public function logout(){
        if (Session::has('admin')) {
            Session()->pull('admin');
            return redirect('/');
        }
    }
            
}
