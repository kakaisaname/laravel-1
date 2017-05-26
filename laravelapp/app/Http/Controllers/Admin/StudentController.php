<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\VerifyCsrfToken;
class StudentController extends Controller
{
    //学生信息页面
    public function index()
    {
        $students = Student::paginate(10);
        return view('Admin/student.index',[
            'students'=>$students
        ]);
    }

    //获取学生信息列表
    public function studentsData()
    {
        //$students = Student::select(['id','name','age','sex','created_at'])->get();
        $students = Student::paginate(10);
        if($students){
            return $students;
        }
    }

    //新增页面
    public function addStudent(Request $request)
    {
        if($request->isMethod('POST')){
            $addStudentData = $request->input('Student');
            if(Student::create($addStudentData)){
                return redirect('Admin/Student/index');
            }else{
                return redirect()->back();
            }
        }
        return view('Admin/student.add');
    }
    //新增学生
    public function saveStudent(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|max:255',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('/')
//                ->withInput()
//                ->withErrors($validator);
//        }
        $addStudentData = $request->input('Student');
        $Student = new Student();
        $Student->name = $addStudentData['name'];
        $Student->age = $addStudentData['age'];
        $Student->sex = $addStudentData['sex'];
        $Student->time = time();
        if($Student->save()){
            return redirect('Admin/Student/index');
        }else{
            return redirect()->back();
        }
    }
}
