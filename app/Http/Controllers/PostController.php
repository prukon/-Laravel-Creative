<?php
//4
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class PostController extends Controller
{
    public function index() {

//Получить запись по id
        $onePost = Post::find(1);

//        Получить все записи
        $allPosts = Post::all();

//Получить записи по условию
        $somePost = Post::where('is_published', 1)->get();

return view("post.index", compact("allPosts")); //означает, что мы обращаемся к папке post, в которой файл index.blade.php

  }


//   create -> store
//метод для формирования страницы создания чего-либо
    public function create() {
        $allPosts = post::all();
        return view("post.create", compact("allPosts"));
  }

//  метод для обработки отправленных данных
    public function store() {
//        в дата указываем какие ключи мы ждем с формы
        $data = request()->validate([
"title" => "string",
"content" => "string",
"image" => "string",
"likes" => "integer",
        ]);
//      dd  ($data);
      Post::create($data); //метод create добавляет в БД массив data
      return redirect()->route('post.index');

  }

//   edit -> update
    public function edit(Post $post) {
        dump($post->title);
        return view('post.edit', compact('post'));
    }

    public function update(Post $post) {

        $data = request()->validate([
            "title" => "string",
            "content" => "string",
            "image" => "string",
            "likes" => "integer",
        ]);
//      dd  ($data);
      $post->update($data);
//        Post::create($data); //метод create добавляет в БД массив data
        return redirect()->route('post.show', $post->id);
//        dump("1111");

    }

    public function show(Post $post) {
        return view('post.show', compact("post"));
    }

    public function destroy(Post $post) {
    $post->delete();
    return redirect()->route('post.index');
    }

    //Доп методы

    public function contacts(){
        $allPosts = post::all();
        return view("contacts", compact("allPosts"));
    }


    public function delete() {
        $post = Post::find(5);
        $postAll=Post::all();
        dump($post);
        dump($postAll);
//            $post->delete();
        dump("deleted");


        //восстановление данных
        $post=Post::withTrashed()->find(2);
        $post->restore();
        dump("restored");
    }

    //Если запись уже есть, то ничего не делает. Если записи нет - создает ее.
    public function firstOrCreate() {
        $post = Post::find(1);
        dump($post->title);

        dump("firstOrCreate");

        $anotherPost = [
                'title' => 'firstOrCreate',
                'content' => 'Некий текст 3',
                'image' => 'Image3',
                'likes' => '22',
                'is_Published' => '1',
        ];

        $post = Post::firstOrCreate([
            'title' => 'firstOrCreate1',
        ], [
            'title' => 'firstOrCreate1',
            'content' => 'firstOrCreate Некий текст 3',
            'image' => 'Image3',
            'likes' => '22',
            'is_Published' => '1',
        ]);
        dump($post->content);
        dump("finished");
    }

    //Если запись уже есть, то обновляет ее. Если записи нет - создает ее.
    public function updateOrCreate() {
        $post = Post::find(1);
        dump($post->title);

        dump("updateOrCreate");

        $anotherPost = [
            'title' => 'updateOrCreate',
            'content' => 'Некий текст 4',
            'image' => 'Image4',
            'likes' => '23',
            'is_Published' => '1',
        ];

        $post = Post::updateOrCreate([
            'title' => 'updateOrCreate',
        ], [
            'title' => 'updateOrCreate',
            'content' => 'Некий текст 3 update',
            'image' => 'Image3',
            'likes' => '22',
            'is_Published' => '1',
        ]);
        dump($post->content);
        dump("finished");
    }

}
