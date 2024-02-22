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
                    <th scope="col">Дата</th>
                    <th scope="col">Опції</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row"><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a> </th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            <a href="{{route('admin.posts.edit', $post->id)}}">редагувати</a> /
                            <button type="submit" form="delete{{$post->id}}">Delete</button>
                            <form action="{{ route('admin.categories.delete', $post->id) }}" method="POST" id="delete{{$post->id}}">
                                @csrf
                                @method('DELETE')
                            </form></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            Сторінка {{$posts->currentPage()}} з {{$posts->lastPage()}}
            {{ $posts->onEachSide(5)->links() }}
            @if($posts->currentPage() == 1)
                << Попередня
                @else
                <a href="{{$posts->nextPageUrl()}}" title="Попередня"><< Попередня</a>
            @endif
            {{$posts->currentPage()}}
            @if($posts->lastPage() == $posts->currentPage())
                Наступна >>
            @else
                <a href="{{$posts->nextPageUrl()}}" title="Попередня">Наступна >></a>
            @endif
        </div>
    </section>
@endsection
