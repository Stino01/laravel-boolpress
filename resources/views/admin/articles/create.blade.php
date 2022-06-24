@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">CREATE</h1>
    <form action="{{route('admin.articles.store')}}" method="post" class="p-5">
        @csrf

        <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Inserisci il titolo">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{old('author')}}" placeholder="Inserisci l'autore">
        </div>

        <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" name="content" placeholder="Inserisci il contenuto">{{old('content')}}</textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="published">
            <label for="published" class="form-check-label" {{old('published') ? 'checked' : ' '}}>Published</label>
        </div>

        <div class="form-check mb-3">
            @foreach ($tags as $tag)
              <div class="form-check-inline">
                <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags" value="{{$tag->id}}" {{in_array($tag->id, old("tags", [])) ? 'checked' : ''}}>
                <label for="{{$tag->slug}}" class="form-check-label">{{$tag->name}}</label>
              </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category" class="form-select col-12">
                <option selected value="">Select category</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection