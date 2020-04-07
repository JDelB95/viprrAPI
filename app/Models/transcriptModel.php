<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transcriptModel extends Model
{
    //The value for table MUST be the same name of the table that is in our db.
    protected $table ="transcript";
    //Add the column names exactly as they are in the transcript table into the $fillable array
    protected $fillable = [
      'Transcript_ID',
      'CWID',
      'Maj_Code',
      'Curriculum_ID',
      'Course_Comp',
      'Term_Completed',
      'Course_Grade',
      'Course_Code',
    ];
}
