@extends('layouts.main')

@section('content')
    <div class="space-y-4">
      
      <div class="space-y-2">
        <h1 class="text-xl">Edit Post</h1>
        
        <form action={{route('posts.update', ['post' => $post->id])}} method="POST">
          @csrf
          @method('PUT')

          <div>
            <label for="Title">Post title</label>
            <input class="border" type="text" name="title" id="" value="{{$post->title}}">
          </div>

          <div>
            <label for="description">Post description</label>
            <textarea class="border" name="description" id="" cols="30" rows="10">
              {{$post->description}}
            </textarea>
          </div>

          <div>
            <button class="shadow p-1 rounded bg-white" type="submit">Create</button>
          </div>
        </form>
      </div>

      <hr/>

      <div class="space-y-2">
        <h2 class="text-xl">⛔️ Danger Zone ⛔️</h2>
        <form action={{route('posts.destroy', ['post' => $post->id])}} method="POST">
          @csrf
          @method('DELETE')

          <div>
            <label for="title">Post title</label>
            <input class="border" type="text" name="title" id="">
          </div>
          <div>
            <button type="submit" class="p-1 text-white bg-red-500 rounded">Delete</button>
          </div>
        </form>
      </div>
    </div>
@endsection