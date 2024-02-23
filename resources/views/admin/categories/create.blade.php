@extends('admin.layouts.app')
@section('content')
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">New category</h6>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.categories.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="title" class="form-label">Category title</label>
                <input type="text" class="form-control" id="title"
                       value="{{old('title')?old('title'):''}}"
                       name="title"
                >
            </div>
            <div class="mb-3">
                <label for="parent_id" class="form-label">Parent category</label>
                <select class="form-select" id="parent_id" aria-label="Floating label select example" name="parent_id">
                    <option selected="" value="0">Main category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug"
                       value="{{old('slug')?old('slug'):''}}"
                       name="slug"
                >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description"
                       value="{{old('description')?old('description'):''}}"
                       name="description"
                >
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection

