@extends('admin.layouts.app')
@section('content')
    <section id="newsSection">
        <div class="row">

            <h1>Список категорій</h1>
            @if (session('message'))
                <div class="alert">{{ session('message') }}</div>
            @endif
            <p><a href="{{route('admin.categories.create')}}" title="Нова категорія" class="btn btn-sm btn-black">Нова категорія</a> </p>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Назва</th>
                    <th scope="col">Опис</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Опції</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categoryList as $category)
                <tr>
                    <th scope="row">{{$category->title}}</th>
                    <td>{{$category->title}}</td>
                    <td>{{$category->slug}}</td>
                    <td><a href="{{route('admin.categories.edit', $category->id)}}">редагувати</a> /
                        <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST">
                            @csrf

                            @method('DELETE')

                            <button type="submit" >Delete</button>
                        </form></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @endsection
