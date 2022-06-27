@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center">
    <h1 class="text-center">INDEX</h1>
    <a href="{{route('admin.articles.create')}}" class="btn btn-primary m-3">Crea nuovo post</a>
    <table class="table table-striped">
        <thead>
            <tr class="d-flex align-items-center justify-content-between col-12">
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Creation Date</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articles as $article)
                <tr class="d-flex align-items-center justify-content-between col-12">
                    <th scope="row">{{$article->id}}</th>
                    <td><a href="{{route('admin.articles.show', $article->id)}}">{{$article->title}}</a></td>
                    <td>{{$article->author}}</td>
                    <td>{{$article->created_at}}</td>
                    <td>
                        <form action="{{route('admin.articles.destroy', $article->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger text-uppercase col-12" value="Delete">
                        </form> 
                    </td>
                </tr>               
            @endforeach
        </tbody>
    </table>
</div>
@endsection