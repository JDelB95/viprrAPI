<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class curriculumModel extends Model
{
    //The value for table MUST be the same name of the table that is in our db.
    protected $table ="curriculum";
    //Add the column names exactly as they are in the transcript table into the $fillable array
    protected $fillable = [
      'Program_ID',
      'Curriculum_ID',
      'Maj_Code',
      'Course_Code',
      'Course_Seq',
      'Prereq_ID',
      'Course_Desc',
    ];
}
