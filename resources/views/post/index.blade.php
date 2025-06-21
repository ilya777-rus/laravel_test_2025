@extends('layout.main')
@section('content')
    <div>Создание поста</div>
    <div><a href="{{route('post.create')}}" class="btn btn-primary">Создание поста</a></div>
    <br>
    @foreach($posts as $post)
        <div><a href="{{route("post.show", [$post->id])}}">{{ $post->title  }}</a> </div>
    @endforeach
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            Меню
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Пункт 1</a></li>
        </ul>
    </div>
    <div class="alert alert-success mt-12" role="alert">
        Это успешное сообщение! Bootstrap CSS работает.
    </div>
@endsection

