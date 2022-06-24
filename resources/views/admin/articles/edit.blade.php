@extends('layouts.app')

@section('content')
    <h1 class="text-center">EDIT</h1>
    <form action="{{route('admin.articles.update', $article->id)}}" method="post" class="p-5">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{$article->author}}">
        </div>
        <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" name="content">{{$article->content}}</textarea>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="published" {{$article->publish ? 'checked' : ''}}>
            <label for="published" class="form-check-label">Published</label>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category" class="form-select col-12">
                <option value="">Select category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
          </div>
        <button type="submit" class="btn btn-primary">Modify</button>
    </form>
@endsection