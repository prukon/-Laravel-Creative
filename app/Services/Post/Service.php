<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
public function store($data) {

    $tags = $data['tags'];
    unset($data['tags']);

    //        проф подход. В нем  не добалвется в БД сведения о создании и изменении записи
    $post = Post::create($data);
    $post->tags()->attach($tags);

}
public function update($post, $data) {

    $tags = $data['tags'];
    unset($data['tags']);

    $post->update($data);
    //метод сначала удаляет запись, потом добавляет их в бд
    $post->tags()->sync($tags);

//        Post::create($data); //метод create добавляет в БД массив data
}
}
