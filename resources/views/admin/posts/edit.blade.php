@extends('admin.layouts.app')
@section('script-section')

@endsection
@section('content')
    <section id="newsSection">
        <div class="row">
            <h1>Редагування статті</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.posts.update', $post->id)}}" class="contact_form" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <input class="form-control" type="file" name="image">
                <select class="form-control" name="category_id">
                    <option value="0">Main category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            {{
                                old('parent_id') == $category->id ? 'selected':
                                ($post->category_id == $category->id? 'selected' : '')
                            }}>{{$category->title}}</option>
                    @endforeach
                </select>
                <p></p>
                <input class="form-control" type="text" placeholder="Заголовок" name="title" value="{{old('title')?old('titlr'):$post->title}}">
                <textarea id="summernote" name="text" class="form-control" >{{ old('text')?old('text'):$post->text }}</textarea>
                <script>
                    $('#summernote').summernote({
                        placeholder: 'Твори тут',
                        height: 400,
                        toolbar: [
                            [ 'style', [ 'style' ] ],
                            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                            [ 'fontname', [ 'fontname' ] ],
                            [ 'fontsize', [ 'fontsize' ] ],
                            [ 'color', [ 'color' ] ],
                            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
                            [ 'table', [ 'table' ] ],
                            [ 'insert', [ 'link'] ],
                            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
                        ]
                    });
                </script>
                <select class="form-control row-cols-4" multiple name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}"{{
                                old('tags')?(
                                    in_array($tag->id, old('tags'))?'selected': ''
                                ):
                                (in_array($tag->id, $post->tags->pluck('id')->toArray())? 'selected': '')
                            }}>{{$tag->title}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Зберегти">
            </form>
        </div>
    </section>
@endsection
@section('scritp-footer-section')

@endsection
