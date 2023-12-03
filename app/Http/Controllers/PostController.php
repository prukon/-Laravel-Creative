<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::all();
        return view("post.index", compact("allPosts")); //означает, что мы обращаемся к папке post, в которой файл index.blade.php

    }


//   create -> store
//метод для формирования страницы создания чего-либо
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $allPosts = post::all();
        return view("post.create", compact("allPosts", "categories", "tags"));
    }

    //   create -> store
//  метод для обработки отправленных данных
    public function store()
    {
//        в дата указываем какие ключи мы ждем с формы
        $data = request()->validate([
            "title" => "required|string",
            "content" => "string",
            "image" => "string",
            "likes" => "integer",
            "category_id" => "",
            "tags" => "",
        ]);
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

//   edit -> update
    public function edit(Post $post)
    {
//        dump($post->title);
//        $post = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    //   edit -> update
    public function update(Post $post)
    {

        $data = request()->validate([
            "title" => "string",
            "content" => "string",
            "image" => "string",
            "likes" => "integer",
            "category_id" => "",
            "tags" => "",
        ]);
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

    public function show(Post $post)
    {
        return view('post.show', compact("post"));
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    //Доп методы

    public function contacts()
    {
        $allPosts = post::all();
        return view("contacts", compact("allPosts"));
    }


    public function delete()
    {
        $post = Post::find(5);
        $postAll = Post::all();
        dump($post);
        dump($postAll);
//            $post->delete();
        dump("deleted");


        //восстановление данных
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dump("restored");
    }

    //Если запись уже есть, то ничего не делает. Если записи нет - создает ее.
    public function firstOrCreate()
    {
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
    public function updateOrCreate()
    {
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
