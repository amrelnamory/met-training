<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(10); // SELECT * from students

        return view('home', compact('students'));
    }

    public function show(Student $student){
        return view('students.show', compact('student'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:students',
            'phone' => 'required|unique:students|digits:11',
            'age' => 'required|integer',
            'address' => 'nullable',
        ]);

        /*  $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->age = $request->age;
        $student->address = $request->address;
        $student->save(); */

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student has been Saved.');
    }


    public function edit(Student $student)
    {
        //$student = Student::findOrFail($id); // select * from students where id = $id
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|digits:11|unique:students,phone,' . $student->id,
            'age' => 'required|integer',
            'address' => 'nullable',
        ]);

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student has been Updated.');
    }

    public function destroy(Student $student)
    {
        $student->delete(); // Delete from students where id = 20
        return redirect()->route('students.index')->with('success', 'Student has been Deleted.');
    }
}
