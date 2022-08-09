{{-- resources/views/layouts/main.blade.php --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CS442 Sample Laravel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50">
    <div class="text-xl top-0 sticky p-4 bg-slate-50 shadow space-x-4">
        <a href="{{route('posts.index')}}">Home</a>
        <a href="{{route('posts.create')}}">Create Post</a>
    </div>
    <div class="max-w-5xl mx-auto my-2">
        @yield('content')
    </div>
    <div class="p-4 sticky bottom-0">
        <div class="mx-auto">
            Footer
        </div>
    </div>
</body>
</html>
