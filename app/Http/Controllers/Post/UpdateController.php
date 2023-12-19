<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Routing\Controller;


class UpdateController extends BaseController
{
public function __invoke(UpdateRequest $request, Post $post){

    $data = $request->validated();
    $this->service->update($post, $data);
//      dd  ($data);

    return redirect()->route('post.show', $post->id);
//        dump("1111");

}
}
