<?php

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
        dump($allPosts);
//foreach ($allPosts as $post) {
//}

//Получить записи по условию
        $somePost = Post::where('is_published', 1)->get();

return view("post.index", compact("allPosts")); //означает, что мы обращаемся к папке post, в которой файл index.blade.php

  }

//  public function about(){
//      $allPosts = post::all();
//      return view("about", compact("allPosts"));
//  }
//
    public function contacts(){
        $allPosts = post::all();
        return view("contacts", compact("allPosts"));
    }


//метод для формирования страницы создания чего-либо
    public function create() {

        $allPosts = post::all();

        return view("post.create", compact("allPosts"));

//1 способ
//$postsArr =[
//    [
//    'title' => 'Мой заголовок',
//    'content' => 'Некий текст',
//    'image' => 'Image',
//    'likes' => '2',
//    'is_Published' => '1',
//],
//    [
//     'title' => 'Мой заголовок2',
//     'content' => 'Некий текст2',
//     'image' => 'Image2',
//     'likes' => '4',
//     'is_Published' => '1',
// ],
//];
//1 способ
//post::create([
//    'title' => 'Мой заголовок3',
//    'content' => 'Некий текст3',
//    'image' => 'Image3',
//    'likes' => '5',
//    'is_Published' => '1',
//]);

//2 способ
//foreach ($postsArr as $post) {
//Post::create($post);
//}

//3 способ
//        foreach ($postsArr as $post) {
//        post::create([
//            'title' => $post['title'],
//            'content' => $post['content'],
//            'image' => $post['image'],
//            'likes' => $post['likes'],
//            'is_Published' => $post['is_Published'],
//        ]);
//        }
        dd("created");
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

    public function  update() {
        $post = Post::find(6);
//        dd($post->content);
        $post->update([
            'title' => 'update1',
            'content' => 'update2',
            'image' => 'update3',
            'likes' => 33,
            'is_Published' => true
        ]);
        dump("updated");

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
