<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//        Route::get('/test', function () {
//            return view('welcome');
//        });

//Route::get('/test','MyPlaceController@index');

//use App\Http\Controllers\MyPlaceController;
//Route::get('/test', [MyPlaceController::class,'index']);

// Action-синтаксис (не забудьте импортировать класс контроллера)

use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\Post\DestroyController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StudentController;

//Route::group(['namespace'=> 'Post'], function (){

//    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts', [IndexController::class, '__invoke' ])->name('post.index');
//Роут отображения одного поста
    Route::get('/posts/{post}', [ShowController::class, '__invoke'  ])->name('post.show');


    Route::get('/post/create', [CreateController::class, '__invoke'  ])->name('post.create');
//Роут обработки добавления постов
    Route::post('/posts', [StoreController::class, '__invoke'  ])->name('post.store'); //название нужно, чтобы в форме указать куда отправлять данные

    Route::get('/posts/{post}/edit', [EditController::class, '__invoke'  ])->name('post.edit');
    Route::patch('/posts/{post}', [UpdateController::class, '__invoke'  ])->name('post.update');
    Route::delete('/posts/{post}', [DestroyController::class, '__invoke'  ])->name('post.delete');

//} );


//Route::get('/post/update', [PostController::class, 'update' ]);
//Route::get('/post/delete', [PostController::class, 'delete' ]);
//Route::get('/post/first_or_create', [PostController::class, 'firstOrCreate' ]);
//Route::get('/post/update_or_create', [PostController::class, 'updateOrCreate' ]);

Route::get('/about', [AboutController::class, 'index' ])->name('about.index');
Route::get('/contacts', [ContactsController::class, 'index' ])->name('contact.index');
Route::get('/main', [MainController::class, 'index' ])->name('main.index');


//Students
Route::get('/students', [StudentController::class, 'index' ])->name('student.index');
