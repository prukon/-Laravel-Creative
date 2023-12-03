<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Routing\Controller;


class UpdateController extends Controller
{
public function __invoke(UpdateRequest $request, Post $post){

    $data = $request->validated();
//      dd  ($data);

    $tags = $data['tags'];
    unset($data['tags']);

    $post->update($data);
    //метод сначала удаляет запись, потом добавляет их в бд
    $post->tags()->sync($tags);


//        Post::create($data); //метод create добавляет в БД массив data
    return redirect()->route('post.show', $post->id);
//        dump("1111");

}
}
