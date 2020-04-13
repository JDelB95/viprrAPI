<?php

namespace App;

use Illuminate\Database\Eloquent\finalScheduleModel;

class schedule extends finalScheduleModel
{
    protected $fillable = ['CWID', 'CRN', 'Date_Registered'];
}

