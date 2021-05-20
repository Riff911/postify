<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function addStudent(){
        return view('student.addstudent');
    }
    public function storeStudent(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'file' => 'required',
        ]);
        $name = $request->name;
        $image = $request->file;
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'),$imageName);
        Student::create([
            'name' => $name,
            'profileimage' => $imageName
        ]);
        return redirect('/students')->with('student_added','Student Added Successfully');
    }
    public function students(){
        $students = Student::all();
        return view('student.allstudents',compact('students'));
    }
    public function editstudent(Request $request,Student $student){
        return view('student.editstudent',compact('student'));
    }

    public function deletestudent(Request $request,Student $student){
        unlink(public_path('images').'/'.$student->profileimage);
        $student->delete();
        return redirect('/students')->with('student_added','Student Deleted Successfully');
    }

    public function updatestudent(Request $request,Student $student){
        $name = $request->name;
        $image = $request->file;
        if($image){
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'),$imageName);
        $student->profileimage = $imageName;
        }
        $student->name = $name;
        $student->save();
        return redirect('/students')->with('student_added','Student Updated Successfully');
    }
}
