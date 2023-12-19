<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Routing\Controller;


class StoreController extends BaseController
{
public function __invoke(StoreRequest $request){

    $data = $request->validated();
    $this->service->store($data);
    return redirect()->route('post.index');
}
}
