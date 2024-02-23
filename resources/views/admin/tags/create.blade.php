@extends('admin.layouts.app')
@section('content')
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">New tag</h6>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.tags.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="title" class="form-label">Tag title</label>
                    <input type="text" class="form-control" id="title"
                        value="{{old('title')?old('title'):''}}"
                           name="title"
                    >
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug"
                           value="{{old('slug')?old('slug'):''}}"
                           name="slug"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
@endsection

