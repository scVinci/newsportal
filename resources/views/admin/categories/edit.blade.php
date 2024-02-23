@extends('admin.layouts.app')
@section('content')
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Edit category</h6>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.categories.update', $category->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Category title</label>
                <input type="text" class="form-control" id="title"
                       value="{{old('title')?old('title'):$category->title}}"
                       name="title"
                >
            </div>
            <div class="mb-3">
                <label for="parent_id" class="form-label">Parent title</label>
                <select class="form-select" id="parent_id" aria-label="Floating label select example" name="parent_id">
                    <option value="0">Main category</option>
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}"
                            {{
                                old('parent_id')?
                                (old('parent_id') == $cat->id?'selected':''):
                                ($cat->id == $category->parent_id?'selected':'')}}
                        >{{$cat->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug"
                       value="{{old('slug')?old('slug'):$category->slug}}"
                       name="slug"
                >
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description"
                       value="{{old('description')?old('description'):$category->slug}}"
                       name="description"
                >
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection

