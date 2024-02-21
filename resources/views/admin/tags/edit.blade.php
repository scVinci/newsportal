@extends('admin.layouts.app')
@section('content')
    <section id="newsSection">
        <div class="row">
            <h1>Редагувати тег</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.tags.update', $tag->id)}}" class="contact_form" method="post">
                @csrf
                @method('patch')

                <input class="form-control" type="text" placeholder="Назва тегу" name="title" value="{{old('title')?old('title'):$tag->title}}">
                <input class="form-control" type="text" placeholder="Slug тегу" name="slug" value="{{old('slug')?old('slug'):$tag->slug}}">
                <input type="submit" value="Зберегти">
            </form>
        </div>
    </section>
@endsection
