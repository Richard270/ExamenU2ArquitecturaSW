<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('courses')->orderBy('first_surname', 'asc')->get();
        return response()->json([
            'message' => 'Successful operation',
            'data' => $teachers,
        ], 200);
    }
}
