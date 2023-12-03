<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Routing\Controller;


class StoreController extends Controller
{
public function __invoke(StoreRequest $request){

    //        в дата указываем какие ключи мы ждем с формы
    $data = $request->validated();
    $tags = $data['tags'];
    unset($data['tags']);

//      dd  ($tags, $data);


//        не проф подход. В нем добалвется в БД сведения о создании и изменении записи
//        $post = Post::create($data);
//        foreach ($tags as $tag) {
//            //не будет создавать дубль запись в БД, если запись уже существует
//            PostTag::firstOrcreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id,
//            ]);
//        }

//        проф подход. В нем  не добалвется в БД сведения о создании и изменении записи
    $post = Post::create($data);
    $post->tags()->attach($tags);




    //        Post::create($data); //метод create добавляет в БД массив data
    return redirect()->route('post.index');

}
}
