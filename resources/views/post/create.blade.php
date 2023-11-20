@extends('layouts.main')

@section('content')

    <div>
        <form action="{{ route('post.store') }}" method="post">
{{--            Токен (система защиты) необходим при использовании любого роута кроме get.--}}
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <textarea name="content" class="form-control" id="content" ></textarea>
            </div>

            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <input type="text" name="image" class="form-control" id="Image">
            </div>

            <div class="mb-3">
                <label for="Likes" class="form-label">Likes</label>
                <input type="number" name="likes" class="form-control" id="Likes">
            </div>



            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
