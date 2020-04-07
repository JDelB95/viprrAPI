<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\transcriptModel;
class transcriptController extends Controller
{
    //Make sure the model is created.
    public function studentTranscript(){
      //return the records in json format.
      return DB::table('transcript')
      ->where('CWID', 'C38475920')
      ->select('Course_Code', 'Course_Comp', 'Term_Completed', 'Course_Grade')
      ->get();
    }
    public function show($id){
      return DB::table('transcript')
      ->select('Course_Code', 'Course_Comp', 'Term_Completed', 'Course_Grade')
      ->where('CWID', $id)
      ->get();
    }
}
