<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Routing\Controller;


class EditController extends Controller
{
public function __invoke(Post $post){

    //        dump($post->title);
//        $post = Post::all();
    $categories = Category::all();
    $tags = Tag::all();
    return view('post.edit', compact('post', 'categories', 'tags'));

}
}
