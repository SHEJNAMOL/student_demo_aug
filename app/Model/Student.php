<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    //protected $fillable = ['teacher_name'];
    protected $appends = ['teacher'];
	public function getTeacherAttribute()
    {
        //echo 'fyhtmynum';
        $teacher_name=NULL;
        //$partnerDetails = [];
        $tutor = \DB::table('students')
            ->join('teachers', 'teachers.class_id', '=', 'students.class_id')
            ->select('teachers.teacher_name')
            ->where('students.class_id', $this->attributes['class_id'])
            ->first();
            $teacher_name=$tutor->teacher_name;
            return($teacher_name);


            //return '5k4m6ij7i';
    }

    public function class_details()
    {
        return $this->belongsTo('App\Model\Standard');
    }




}

