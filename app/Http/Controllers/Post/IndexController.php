<?php

namespace App\Http\Controllers\Post;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Routing\Controller;
//use App\Http\Controllers\Controller;

class IndexController extends Controller
{
public function __invoke(){

//    dd('123');
    $allPosts = Post::all();
    return view("post.index", compact("allPosts")); //означает, что мы обращаемся к папке post, в которой файл index.blade.php

}
}
