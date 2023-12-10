<?php

namespace App\Http\Controllers\principal;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    //
    public function index()
    {
        $teachers = Teacher::all();
        $students = Student::all();
        return view('principal.index', compact('students', 'teachers'));
    }
}
