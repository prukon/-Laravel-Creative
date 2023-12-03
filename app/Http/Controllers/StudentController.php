<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


use Illuminate\Routing\Controller;


class StudentController extends Controller
{
    public  function index() {
        dump("123");
        $students = Student::find(1);
dump($students);

        dump($students->team);
    }
}
