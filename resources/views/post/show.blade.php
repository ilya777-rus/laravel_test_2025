@extends('layout.main')
@section('content')
    <div>
        <p>Информация о посте</p>
        <div>{{ $post->title  }}</div>
        <div>{{ $post->content  }}</div>
        <form action="{{route('post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger" >Удалить пост</button>
        </form>

        <a href="{{route('post.index')}}" class="btn btn-success" >К списку постов</a>
        <a href="{{route('post.edit', $post->id)}}" class="btn btn-success" >Редактировать пост</a>

    </div>
@endsection

