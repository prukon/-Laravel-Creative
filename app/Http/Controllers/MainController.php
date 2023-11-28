<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class MainController extends Controller
{
    public function index()
    {

//        Получить все записи
        $allPosts = Post::all();
        dump($allPosts);

        return view("main", compact("allPosts"));

    }

}


