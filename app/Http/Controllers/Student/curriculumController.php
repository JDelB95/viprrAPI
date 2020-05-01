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
  public function addCurriculum(Request $request){
    DB::table('curriculum')
    ->insert($request->all());
  }
  public function getCurriculum($Maj_Code){
    return DB::table('curriculum')
    ->select('Program_ID','Maj_Code', 'Course_Code', 'Course_Seq', 'Prereq_ID', 'Course_Desc', 'Enable')
    ->where('Maj_Code', $Maj_Code)
    ->get();
  }
  /*
  Get all the course codes and prereqs that aren't in the student's transcript.
  SELECT Course_Code, Prereq_ID, Enable 
  FROM Curriculum 
  WHERE NOT EXISTS (SELECT * FROM Transcript WHERE curriculum.course_code = transcript.course_code AND transcript.CWID = "C38475920");
  */
  public function getStudentCurriculum($id){
    return curriculumModel::select('Course_Code', 'Prereq_ID', 'Enable')
    ->whereNotIn('Course_Code',function( $query) use ($id){
     $query->select('Course_code')->from('Transcript')->whereRaw('curriculum.course_code = transcript.course_code')
    ->where('transcript.CWID',$id);
  })->get();

  //$obj2 =  CurriculumModel::select('Course_Code', 'Prereq_ID', 'Enable')->doesntHave('trasncriptCourses');
    //return [$obj2->toSql(),$obj2->count(),$obj2->get()];
  //$obj->count();
  return $obj->get();
  return [$obj->toSql(),$obj->count(),$obj->get()];
  }
  public function getCodes($Maj_Code){
    return DB::table('curriculum')
    ->select('Course_Code')
    ->where('Maj_Code', $Maj_Code)
    ->get();
  }
  public function getProgress($id){
    return DB::table('curriculum')
      ->selectRaw('DISTINCT curriculum.Course_Code, transcript.Course_Grade, transcript.Term_Completed, transcript.Course_Comp, transcript.CWID')
      ->leftJoin('transcript', function ($leftJoin) use ($id) {
            $leftJoin->on('curriculum.Course_Code', '=', 'transcript.Course_Code')
                 ->where('CWID', '=', $id);
        })
    ->get();
  }
}
