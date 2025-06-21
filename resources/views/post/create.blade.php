@extends('layout.main')
@section('content')
    <form method="post" action="{{route('post.store')}}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror

        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content"  name="content">{{old('content')}}</textarea>
            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image"  name="image" value="{{old('image')}}">
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">category</label>
        <select id="category_id" name="category_id" class="form-select" aria-label="Default select example">
            @foreach($categories as $category)
                <option
                    {{old('category_id')==$category->id ? 'selected' : ''}}
                    value="{{$category->id}}">{{$category->title}}</option>
            @endforeach

        </select>
        </div>

        <div class="mb-3">
            <select id="tags" name="tags[]" class="form-select" multiple aria-label="multiple select example">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

