<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class studentModel extends Model
{
    //The value for table MUST be the same name of the table that is in our db.
    protected $table ="student";
    //Add the column names exactly as they are in the transcript table into the $fillable array
    protected $fillable = [
      'CWID',
      'Maj_Code',
      'Stu_F_Name',
      'Stu_L_Name'
}
