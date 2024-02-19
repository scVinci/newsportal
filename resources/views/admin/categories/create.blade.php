@extends('admin.layouts.app')
@section('content')
    <section id="newsSection">
        <div class="row">
            <h1>Нова категорія</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.categories.store')}}" class="contact_form" method="post">
                @csrf
                @method('post')
                <select class="form-control" name="parent_id">
                    <option value="0">Main category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{old('parent_id') == $category->id ? 'selected': '' }}>{{$category->title}}</option>
                    @endforeach
                </select>

                <input class="form-control" type="text" placeholder="Назва категорії" name="title" value="{{old('title')}}">

                <input class="form-control" type="text" placeholder="Опис категорії" name="description" value="{{old('description')}}">
                <input class="form-control" type="text" placeholder="Slug категорії" name="slug" value="{{old('slug')}}">
                <input type="submit" value="Додати">
            </form>
        </div>
    </section>
@endsection
