@extends('layouts.main')

@section('content')

<div>
    <div>
        <a  class='btn btn-primary' href="{{route('post.create')}}">Создать</a>
    </div>
  @foreach($allPosts as $post)
      <div><a href="{{route('post.show', $post->id)}}">{{$post->id}}.  {{$post->title}}</a></div>
  @endforeach
</div>


@endsection
