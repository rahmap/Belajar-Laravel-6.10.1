<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $student = DB::table('students')->get();
        // return view('student.student', ['student' => $student]);
        //Query Builder
        
        $student = Student::all();
        return view('student.student', ['student' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.add_student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'email' => 'required|unique:students,email_student',
            'nisn' => 'required|unique:students,nisn_student',
            'kelas' => 'required|max:2|min:2'
        ]);

        Student::create([
            'name_student'  => $request->nama,
            'email_student' => $request->email,
            'nisn_student'  => $request->nisn,
            'class_student' => $request->kelas
        ]);
        // Student::create($request->all());
        return redirect('/student')->with('status', 'Data Siswa Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.detail', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        
        $request->validate([
            'nama' => 'required|max:100',
            'email' => 'required|unique:students,email_student,'.$student->email_student.',email_student',
            'nisn' => 'required|unique:students,nisn_student,'.$student->nisn_student.',nisn_student',
            'kelas' => 'required|max:2|min:2'
        ]);
        $update = Student::where('id_student', $student->id_student)
                          ->update([
                              'name_student' => $request->nama,
                              'email_student' => $request->email,
                              'nisn_student' => $student->nisn_student,
                              'class_student' => $request->kelas
                          ]);
        
        if($update){ 
            return redirect('/student/'.$student->id_student)->with('status', 'Data Siswa Berhasil Diubah!');
        } else {
            return redirect('/student/'.$student->id_student)->with('status', 'Data Siswa Gagal Diubah!');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $delete = Student::destroy($student->id_student);
        if($delete){ 
            return redirect('/student')->with('status', 'Data Siswa Berhasil Dihapus!');
        } else {
            return redirect('/student')->with('status', 'Data Siswa Gagal Dihapus!');
        }
    }

    // public function destroy($id)
    // {
    //     dd($itemName = Student::find($id));
    //     $itemName = Student::find($id)->delete(); 
    //     return redirect('/student')->with('status', 'Data Siswa Berhasil Dihapus!');
    // }
}
