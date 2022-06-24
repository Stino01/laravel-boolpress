@extends('layouts.app')

@section('content')
    <h1 class="text-center">SHOW</h1>
    <div class="card p-3">
        <h1 class="text-center">{{$article->title}}</h1>
        <p class="text-center"><small>{{$article->author}}</small></p>
        <p class="text-center"><small>{{$article->slug}}</small></p>
        <p class="m-5 text-center">{{$article->content}}</p>
        <a href="{{route('admin.articles.edit', $article->id)}}" class="btn btn-primary text-uppercase my-5" type="button">Edit</a>   
    </div>
@endsection