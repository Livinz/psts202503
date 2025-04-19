<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller {
    public function index() {
        $students = Student::paginate(20);
        return view('students.index', compact('students'));
    }

    public function create() {
        return view('students.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'gender' => 'required|in:Laki-Laki,Perempuan',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required|string|max:20',
        'grade' => 'required|string|max:10',
    ]);

    Student::create([
        'name' => $request->name,
        'gender' => $request->gender,
        'email' => $request->email,
        'phone' => $request->phone,
        'grade' => $request->grade,
    ]);

    return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan.');
}

public function update(Request $request, Student $student)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'gender' => 'required|in:Laki-Laki,Perempuan',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'phone' => 'required|string|max:20',
        'grade' => 'required|string|max:10',
    ]);

    $student->update([
        'name' => $request->name,
        'gender' => $request->gender,
        'email' => $request->email,
        'phone' => $request->phone,
        'grade' => $request->grade,
    ]);

    return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
}

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function destroy($id)
    {
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}