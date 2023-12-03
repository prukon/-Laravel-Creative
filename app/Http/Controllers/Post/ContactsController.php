<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Routing\Controller;


class ContactsController extends Controller
{
public function __invoke(){

    $allPosts = post::all();
    return view("contacts", compact("allPosts"));

}
}
