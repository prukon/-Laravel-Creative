@extends('layouts.main')

@section('content')

    <div>
        <form action="{{ route('post.store') }}" method="post">
            {{--            Токен (система защиты) необходим при использовании любого роута кроме get.--}}
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{old('title')}}"  type="text" name="title" class="form-control" id="title">
               @error('title')
                <p class="text-danger">{{ $message  }}</p>
            @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <textarea   name="content" class="form-control" id="content">{{old('content')}}</textarea>
                @error('content')
                <p class="text-danger">{{ $message  }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Image" class="form-label">Image</label>
                <input  value="{{old('image')}}" type="text" name="image" class="form-control" id="Image">
                @error('image')
                <p class="text-danger">{{ $message  }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Likes" class="form-label">Likes</label>
                <input type="number" name="likes" class="form-control" id="Likes">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id='category' name ='category_id'>
                    @foreach($categories as $category)
                        <option
                            {{old('category_id') == $category->id ? 'selected' : '' }}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="tag">Тег</label>
                <select multiple class="form-control" id='tag' name ='tags[]'>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
