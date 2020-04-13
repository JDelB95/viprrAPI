<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\curriculumModel;
class curriculumController extends Controller
{
  public function destroy($id){
    DB::table('curriculum')
    ->where('Program_ID', $id)
    ->delete();
  }
  public function updateCurriculum($id, Request $request){
    DB::table('curriculum')
    ->where('Program_ID', $id)
    ->update($request->all());
  }
  public function getCurriculum($Maj_Code){
    return DB::table('curriculum')
    ->select('Program_ID','Maj_Code', 'Course_Code', 'Course_Seq', 'Prereq_ID', 'Course_Desc')
    ->where('Maj_Code', $Maj_Code)
    ->get();
  }
  public function getCodes($Maj_Code){
    return DB::table('curriculum')
    ->select('Course_Code')
    ->where('Maj_Code', $Maj_Code)
    ->get();
  }
  public function getProgress($id){
    return DB::table('curriculum')
      ->selectRaw('DISTINCT curriculum.Course_Code, transcript.Course_Grade, transcript.Course_Comp, transcript.CWID')
      ->leftJoin('transcript', function ($leftJoin) use ($id) {
            $leftJoin->on('curriculum.Course_Code', '=', 'transcript.Course_Code')
                 ->where('CWID', '=', $id);
        })
    ->get();
  }
}
