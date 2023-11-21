@extends('layouts.main')

@section('content')

<div>
      <div>{{$post->id}}.  {{$post->title}}</div>
      <div>{{$post->contet}}</div>
</div>
<div>
    <a class='btn btn-primary mb-3' href="{{route('post.edit', $post->id)}}">Изменить</a>
</div>

<div>
    <form class="mb-3" action="{{route('post.delete', $post->id)}}" method="post">
    @csrf
        @method("delete")
        <input type="submit" value="Удалить" class="btn btn-danger">
    </form>
</div>

    <div>
        <a class='btn btn-primary' href="{{route('post.index')}}">Назад</a>
    </div>


@endsection
