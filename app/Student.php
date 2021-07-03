<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $filable=['first_name','last_name','gender','phone','class','country'];
}
