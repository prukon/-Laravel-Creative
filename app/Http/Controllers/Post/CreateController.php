<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Routing\Controller;


class CreateController extends Controller
{
public function __invoke(){

    $categories = Category::all();
    $tags = Tag::all();
    $allPosts = post::all();
    return view("post.create", compact("allPosts", "categories", "tags"));

}
}
