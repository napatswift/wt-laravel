@extends('layouts.main')

@section('content')
  <div class="space-y-4">
    <h1 class="text-2xl">{{$post->title}}</h1>

    <div class="flex gap-2">
      <p><span class="font-semibold">{{$post->like_count}}</span> likes</p>
      <p><span class="font-semibold">{{$post->view_count}}</span> views</p>
    </div>

    <div>
      <p>{{$post->description}}</p>
    </div>

    <div>
      <a class="bg-white px-2 py-1 rounded shadow" href={{route('posts.edit', ['post'=>$post->id])}}>Edit</a>
    </div>
  </div>
@endsection