<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\studentModel;
class studentProfileController extends Controller
{
  public function studentProfile($id){
    return DB::table('student')
    ->select('Maj_Code', 'Stu_F_Name', 'Stu_L_Name')
    ->where('CWID', $id)
    ->get();
  }

}
