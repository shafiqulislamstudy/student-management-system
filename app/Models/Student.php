<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function getCourse(){
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function getPayment(){
        return $this->hasMany(Payment::class,'stu_id','id');
    }
}
