@extends('layout.main')
@section('content')
    <form method="post" action="{{route('post.update', $post->id)}}" >
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">

        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content"  name="content">{{$post->content}}</textarea>

        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image"  name="image" value="{{$post->image}}">

        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">category</label>
            <select id="category_id" name="category_id" class="form-select" aria-label="Default select example">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{$category->id===$post->category_id ? 'selected' : ''}}>{{$category->title}}</option>
                 {{--   @if($category->id===$post->category_id)

                    <option value="{{$category->id}}" selected>{{$category->title}}</option>
                    @else
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endif--}}
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <select id="tags" name="tags[]" class="form-select" multiple aria-label="multiple select example">
                @foreach($tags as $tag)

                    <option value="{{$tag->id}}"
                    @foreach($post->tags as $postTag)
                        {{$tag->id===$postTag->id ? 'selected' : ''}}
                        @endforeach
                        >{{$tag->title}}</option>
                @endforeach

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

