<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

public function getClassIdByTeacherId($id)
{

    
    $tutor = \DB::table('teachers')
            ->select('class_id')
            ->where('teacher_id', $id)
            ->first();
            $class_id=$tutor->class_id;
            return($class_id);

}
    public function class_details()
    {
        return $this->belongsTo('App\Models\Standard');
    }
    
}
