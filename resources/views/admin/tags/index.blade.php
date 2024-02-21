@extends('admin.layouts.app')
@section('content')
    <section id="newsSection">
        <div class="row">

            <h1>Список тегів</h1>
            @if (session('message'))
                <div class="alert">{{ session('message') }}</div>
            @endif
            <p><a href="{{route('admin.tags.create')}}" title="Створити тег" class="btn btn-sm btn-black">Створити тег</a> </p>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Назва</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Опції</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th scope="row">{{$tag->title}}</th>
                        <td>{{$tag->slug}}</td>
                        <td><a href="{{route('admin.tags.edit', $tag->id)}}">редагувати</a> / <button type="submit" form="delete{{$tag->id}}">Delete</button>
                            <form action="{{ route('admin.tags.delete', $tag->id) }}" method="POST" id="delete{{$tag->id}}">
                                @csrf

                                @method('DELETE')


                            </form></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
