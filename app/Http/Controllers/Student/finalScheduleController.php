<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\finalScheduleModel;
use Illuminate\Support\Facades\DB;

class finalScheduleController extends Controller
{
    public function insert3(Request $request){
      $CWID->CWID = $request->input('CWID');
      $CRN->CRN = $request->input('CRN');
      $Date_Registered->Date_Registered = $request->input('Date_Registered');

      $items = array('CWID'=>$CWID, 'CRN'=>$CRN, 'Date_Registered'=>$Date_Registered);
      finalScheduleModel::insert($items);
    }
    public function insert2(Request $request){
      $items = $request->all();
      DB::table('final_schedule')->insert($items);
      finalScheduleModel::insert($items);
   }
   public function insert(Request $request){
    $array = [];
    foreach (request()->all() as $value) {
    array_push($array, [
      'CWID' => $value['CWID'], 
      'CRN' => $value['CRN'], 
      'Date_Registered' => $value['Date_Registered']]);
  }
    //DB::table('final_schedule')->insert($array);
  }
}
