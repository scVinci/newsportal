@extends('admin.layouts.app')
@section('content')
    <section id="newsSection">
        <div class="row">
            <h1>Новий тег</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.tags.store')}}" class="contact_form" method="post">
                @csrf
                @method('post')

                <input class="form-control" type="text" placeholder="Назва тегу" name="title" value="{{old('title')}}">
                <input class="form-control" type="text" placeholder="Slug тегу" name="slug" value="{{old('slug')}}">
                <input type="submit" value="Створити">
            </form>
        </div>
    </section>
@endsection
