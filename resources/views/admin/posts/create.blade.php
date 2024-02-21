@extends('admin.layouts.app')
@section('script-section')

@endsection
@section('content')
    <section id="newsSection">
        <div class="row">
            <h1>Нова стаття</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.posts.store')}}" class="contact_form" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <input class="form-control" type="file" name="image">
                <select class="form-control" name="category_id">
                    <option value="0">Main category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{old('parent_id') == $category->id ? 'selected': '' }}>{{$category->title}}</option>
                    @endforeach
                </select>
                <p></p>
                <input class="form-control" type="text" placeholder="Заголовок" name="title" value="{{old('title')}}">
                <textarea id="summernote" name="text" class="form-control" ></textarea>
                <script>
                    $('#summernote').summernote({
                        placeholder: 'Твори тут',
                        tabsize: 2,
                        height: 100
                    });
                </script>
                <select class="form-control row-cols-4" multiple name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Додати">
            </form>
        </div>
    </section>
@endsection
@section('scritp-footer-section')

@endsection
