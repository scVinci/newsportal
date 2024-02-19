@extends('admin.layouts.app')
@section('content')
    <section id="newsSection">
        <div class="row">
            <h1>Редагувати категорію</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.categories.update', $category->id)}}" class="contact_form" method="post">
                @csrf
                @method('put')
                <input class="form-control"
                        type="text"
                       placeholder="Назва категорії" name="title"
                       value="{{old('title')? old('title') : $category->title}}">

                <input class="form-control"
                       type="text"
                       placeholder="Опис категорії" name="description"
                       value="{{old('description')? old('description') : $category->description}}">
                <input class="form-control"
                       type="text"
                       placeholder="Slug категорії" name="slug"
                       value="{{old('slug')? old('slug') : $category->slug}}">
                <input type="submit" value="Зберегти">
            </form>
        </div>
    </section>
@endsection
