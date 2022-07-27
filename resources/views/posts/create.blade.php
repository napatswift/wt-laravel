@extends('layouts.main')

@section('content')
    <div>
      <h1>Create New Post</h1>

      <div>
        <form action={{route('posts.store')}} method="post">
          @csrf
          <div>
            <label for="Title">Post title</label>
            <input class="border" type="text" name="title" id="">
          </div>

          <div>
            <label for="description">Post description</label>
            <textarea class="border" name="description" id="" cols="30" rows="10"></textarea>
          </div>

          <div>
            <button class="bg-white px-2 py-1 rounded shadow" type="submit">Create</button>
          </div>
        </form>
      </div>
    </div>
@endsection