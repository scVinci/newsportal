@extends('admin.layouts.app')
@section('content')
    <div class="bg-light rounded p-4">
        <h6 class="mb-4">Edit post</h6>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title"
                       value="{{old('title')?old('title'):$post->title}}"
                       name="title"
                >
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" aria-label="Floating label select example" name="category_id">
                    <option selected="" value="0">Main category</option>
                    @foreach($categories as $item)
                        <option value="{{$item->id}}"
                            {{old('category_id') && old('category_id') == $item->id?'selected':
                            ($post->category_id == $item->id)?'selected':false }}
                        >{{$item->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Preview image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <div class="mb-3">
                <label for="floatingTextarea">Text</label>
                <textarea class="form-control" placeholder="Text here" id="floatingTextarea" style="height: 350px;" name="text">{{old('text')?old('text'):$post->text}}</textarea>
            </div>
            <div class="mb-3">
                <select class="form-select" multiple="" aria-label="multiple select example" name="tags[]">
                    @foreach($tags as $item)
                        <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

