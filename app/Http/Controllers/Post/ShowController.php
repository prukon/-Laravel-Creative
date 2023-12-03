<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Routing\Controller;


class ShowController extends Controller
{
public function __invoke(Post $post){

    return view('post.show', compact("post"));

}
}
