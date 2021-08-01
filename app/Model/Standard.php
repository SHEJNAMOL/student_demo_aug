<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Standard extends Model
{
    protected $table = 'standards';
    public function class_teacher()
    {
        
        return $this->hasOne('App\Models\Teacher','class_id');
    }

    public function students()
    {
        
        return $this->hasMany('App\Models\Student','class_id');
    }


}
