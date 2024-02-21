@extends('admin.layouts.app')
@section('content')
    <section id="newsSection">
        <div class="row">

            <h1>Список статей</h1>
            @if (session('message'))
                <div class="alert">{{ session('message') }}</div>
            @endif
            <p><a href="{{route('admin.posts.create')}}" title="Нова стаття" class="btn btn-sm btn-black">Нова стаття</a> </p>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Назва</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Опції</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row"><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a> </th>
                        <td>{{$post->title}}</td>
                        <td>$post</td>
                        <td><a href="{{route('admin.categories.edit', $post->id)}}">редагувати</a> /
                            <form action="{{ route('admin.categories.delete', $post->id) }}" method="POST">
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
