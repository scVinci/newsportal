@extends('admin.layouts.app')
@section('content')
    <div class="bg-light rounded h-100 p-4">
        @if (session('message'))
            <div class="alert">{{ session('message') }}</div>
        @endif
        <h6 class="mb-4">Category list</h6>
        <a class="btn btn-sm btn-dark"
           href="{{route('admin.categories.create')}}">new category
        </a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">#parent</th>
                <th scope="col">Title</th>
                <th scope="col">Slag</th>
                <th scope="col">options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mainCategories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <th scope="row">{{$category->parent_id}}</th>
                    <td>{{$category->title}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        <a class="btn btn-sm btn-success"
                           href="{{route('admin.categories.edit', $category->id)}}">edit
                        </a>
                        <button class="btn btn-sm btn-danger"
                                type="submit" form="delete{{$category->id}}">delete
                        </button>
                        <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" id="delete{{$category->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @if(count($category->childs))
                    @include('admin.categories.childs', ['childs' =>$category->childs])
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
