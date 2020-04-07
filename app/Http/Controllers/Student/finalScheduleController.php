<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\finalScheduleModel;

class finalScheduleController extends Controller
{
    public function backup(Request $request){
      $finalSchedule = new finalScheduleModel;
      $finalSchedule->CWID=$request->input('CWID');
      $finalSchedule->CRN=$request->input('CRN');
      $finalSchedule->Date_Registered=$request->input('Date_Registered');
      $finalSchedule->save();
    }
    public function insert(Request $request){
      $items = $request->all();
      finalScheduleModel::insert($items);
   }
}
