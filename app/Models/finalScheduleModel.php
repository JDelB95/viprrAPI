<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class finalScheduleModel extends Model
{
  //The value for table MUST be the same name of the table that is in our db.
  protected $table ="final_schedule";
  public $timestamps = false;
  //Add the column names exactly as they are in the transcript table into the $fillable array
  protected $fillable = [
    'CWID',
    'CRN',
    'Date_Registered',
    'Semester_Taken',
    'Schedule_Num'
  ];
}
