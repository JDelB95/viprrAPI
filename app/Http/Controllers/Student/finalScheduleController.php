<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\finalScheduleModel;
use Illuminate\Support\Facades\DB;

class finalScheduleController extends Controller
{
  public function getSchedule($id){
    return DB::table('final_schedule')
    ->select('CRN', 'Semester_Taken')
    ->where('CWID', $id)
    ->get();
  }
   public function insertSchedule(Request $request){

    //print_r($request->all());
    $body = ($request->body);
    foreach($body as $item){
      $array = [
        'CWID' => $item['CWID'],
        'CRN' => $item['CRN'],
        'Date_Registered' => $item['Date_Registered'],
        'Semester_Taken' => $item['Course_Term']
      ];
      DB::table('final_schedule')->insert($array);
    }

    return ["data"=> "Success", "message" => "Entries added successfully"];

  
    /*
    $array = [];
    foreach (request()->all() as $value) {
    array_push($array, [
      'CWID' => $value['CWID'], 
      'CRN' => $value['CRN'], 
      'Date_Registered' => $value['Date_Registered']
      ]);
    }
    DB::table('final_schedule')->insert($array);
    */
  }
}
