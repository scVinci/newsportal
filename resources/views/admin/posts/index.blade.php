@extends('admin.layouts.app')
@section('content')
    <div class="bg-light rounded h-100 p-4">
        @if (session('message'))
            <div class="alert">{{ session('message') }}</div>
        @endif
        <h6 class="mb-4">Posts list</h6>
        <a class="btn btn-sm btn-dark"
           href="{{route('admin.posts.create')}}">new post
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td><a href="{{route('admin.posts.show', $item->id)}}">{{$item->title}}</a></td>
                    <td>{{$item->category->title}}</td>
                    <td>
                        <a class="btn btn-sm btn-success"
                           href="{{route('admin.posts.edit', $item->id)}}">edit
                        </a>
                        <button class="btn btn-sm btn-danger"
                                type="submit" form="delete{{$item->id}}">delete
                        </button>
                        <form action="{{ route('admin.posts.delete', $item->id) }}" method="POST" id="delete{{$item->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            @if($posts->lastPage() > 1)
            <p>Page {{$posts->currentPage()}} of {{$posts->lastPage()}}</p>
            <div class="btn-group me-2" role="group" aria-label="First group">
                <a class="btn btn-primary" href="{{$posts->previousPageUrl()}}"> prev </a>
                <a class="btn btn-primary" href="#"> {{$posts->currentPage()}} </a>
                <a class="btn btn-primary" href="{{$posts->nextPageUrl()}}"> next </a>
            </div>
            @endif
    </div>
@endsection
