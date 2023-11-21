@extends('layouts.main')

@section('content')

    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">
{{--            Токен (система защиты) необходим при использовании любого роута кроме get.--}}
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <textarea name="content" class="form-control" id="content" >{{$post->content}}</textarea>
            </div>

            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="Image" value="{{$post->image}}">
            </div>

            <div class="mb-3">
                <label for="Likes" class="form-label">Likes</label>
                <input type ="number" name="likes" class="form-control" id="Likes" value="{{$post->likes}}">
            </div>



            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>

@endsection
