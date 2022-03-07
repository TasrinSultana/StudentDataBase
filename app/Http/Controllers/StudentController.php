<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            //$students = Student::select
            $students = Student::where('name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('dept', 'like', '%' . $request->get('search') . '%')
                ->orWhere('address', 'like', '%' . $request->get('search') . '%')
                ->paginate(10);
        } else {
            $students = Student::paginate(10);
        }
        //$students = Student::paginate(10);
        return view('students.index',  ['students' => $students]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            's_id'  => 'required|numeric|integer',
            'name'   => 'required|max:30',
            'dept' => 'required|max:30',
            'address' => 'required|max:255',
            'phone'  => 'required|numeric',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index');

    }

    public function show(Request $request, Student $student)
    {
        return view('students.show', ['student' => $student]);
    }

    public function edit(Request $request, $id)
    {
        $student = Student::find($id);

        return view('students.edit', ['student' => $student]);
    }

    public function update(Request $request)
    {
        $request->validate([
            's_id'  => 'required|numeric|integer',
            'name'   => 'required|max:30',
            'dept' => 'required|max:30',
            'address' => 'required|max:255',
            'phone'  => 'required|numeric',
        ]);

        $student = Student::find($request->id);
        $student->update($request->all());

        return redirect()->route('students.index');
    }

    public function destroy(Request $request, $id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('students.index');
    }

}
