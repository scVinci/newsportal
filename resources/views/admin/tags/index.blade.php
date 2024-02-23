@extends('admin.layouts.app')
@section('content')
    <div class="bg-light rounded h-100 p-4">
        @if (session('message'))
            <div class="alert">{{ session('message') }}</div>
        @endif
        <h6 class="mb-4">Tags list</h6>
        <a class="btn btn-sm btn-dark"
           href="{{route('admin.tags.create')}}">new tag
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slag</th>
                <th scope="col">options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
            <tr>
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->title}}</td>
                <td>{{$tag->slug}}</td>
                <td>
                    <a class="btn btn-sm btn-success"
                        href="{{route('admin.tags.edit', $tag->id)}}">edit
                    </a>
                    <button class="btn btn-sm btn-danger"
                        type="submit" form="delete{{$tag->id}}">delete
                    </button>
                    <form action="{{ route('admin.tags.delete', $tag->id) }}" method="POST" id="delete{{$tag->id}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection
