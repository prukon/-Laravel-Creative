<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Routing\Controller;


class DestroyController extends Controller
{
public function __invoke(Post $post){

    $post->delete();
    return redirect()->route('post.index');

}
}
