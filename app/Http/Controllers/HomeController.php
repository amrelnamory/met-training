<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Student::latest()->paginate(10); // SELECT * from students

        return view('home', compact('students'));
    }

    public function create(){
        return view('students.create');
    }

    public function save(Request $request){

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'age' => 'required|integer',
            'address' => 'nullable',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->age = $request->age;
        $student->address = $request->address;
        $student->save();

        //Student::create($data);

        return redirect()->route('home');
    }
}
