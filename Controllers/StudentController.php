<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index(){

      #$students = Student::all();  #get all data from database
      $students = Student::paginate(4);  #get all data from database displayin pagonation
      return view('welcome', compact('students'));  #compact -> pass data from the database
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
      $this->validate($request, [
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'phone' => 'required',
      ]);

      $student = new Student;
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();

        return redirect(route('home'))->with('successMsg', 'Student successfully added.');
    }

    public function edit($id){

      $student = Student::find($id);
      return view('edit', compact('student'));
    }

    public function update(Request $request, $id){
      $this->validate($request, [
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'phone' => 'required',
      ]);

      $student = Student::find($id);
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();

        return redirect(route('home'))->with('successMsg', 'Student successfully updated.');
    }

    public function delete($id){

      Student::find($id)->delete();

      return redirect(route('home'))->with('successMsg', 'Student successfully deleted.');
    }
}
