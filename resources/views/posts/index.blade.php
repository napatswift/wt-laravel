@extends('layouts.main')

@section('content')
<div class="gap-5">
    @foreach ($posts as $post)
        <div class="p-2 border rounded-md my-2 bg-white">
          <h1 class="text-lg underline">
            <a href="{{ route('posts.show', ['post'=>$post->id])}}">{{$post->title}}</a>
          </h1>
          <div class="flex gap-2">
            <p>{{$post->view_count}} views</p>
            <p>{{$post->like_count}} likes</p>
          </div>
        </div>
    @endforeach
</div>
@endsection