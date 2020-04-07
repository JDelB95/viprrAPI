<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class availableCoursesModel extends Model
{
    //The value for table MUST be the same name of the table that is in our db.
    protected $table ="available_courses";
    //Add the column names exactly as they are in the available_courses table into the $fillable array
    protected $fillable = [
      'CRN',
      'Course_Code',
      'Start_Date',
      'End_Date',
      'Course_Time',
      'Days_Of_The_Week',
      'Course_Term',
    ];
}
