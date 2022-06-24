@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">SHOW</h1>
    <div class="card d-flex flex-column justify-content-center align-item-center p-4 col-6">
        <h1 class="text-center">{{$article->title}}</h1>
        <p class="text-center"><small>{{$article->author}}</small></p>
        <p class="text-center"><small>{{$article->slug}}</small></p>
        <p class="m-5 text-center">{{$article->content}}</p>
        <div>
            <p class="mb-0 text-center">Tags:</p>
            <ul class="list-group">
                @foreach ($article->tags as $item)
                    <li class="list-group-item text-center">{{$item->name}}</li>
                @endforeach
            </ul>
        </div>
        <a href="{{route('admin.articles.edit', $article->id)}}" class="btn btn-primary text-uppercase my-5" type="button">Edit</a>   
    </div>
</div>
@endsection