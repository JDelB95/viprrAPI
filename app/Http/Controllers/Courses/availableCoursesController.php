<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\availableCoursesModel;
class availableCoursesController extends Controller
{
    //Make sure the model is created.
    public function AvailableCourses(){
      //return the records in json format.
      return response()->json(availableCoursesModel::get(), 200);
    }

    public function show($term){
      return DB::table('available_courses')
      ->select('CRN', 'Course_Code', 'Start_Date', 'End_Date', 'Course_Time', 'Days_Of_The_Week', 'Course_Term')
      ->where('Course_Term', $term)
      ->get();
    }
}
