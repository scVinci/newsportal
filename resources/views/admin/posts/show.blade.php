@extends('admin.layouts.app')
@section('content')
    <div class="bg-light rounded p-4">
        <p>
            <a class="btn btn-sm btn-success"
               href="{{route('admin.posts.edit', $post->id)}}">edit
            </a>
            <button class="btn btn-sm btn-danger"
                    type="submit" form="delete{{$post->id}}">delete
            </button>
        <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST" id="delete{{$post->id}}">
            @csrf
            @method('DELETE')
        </form>
        </p>
        <h6 class="mb-4">{{$post->title}}</h6>

        <p class="text-secondary">
            {{$post->created_at}} | {{$post->category->title}} | Admin
        </p>
        <div class="text-dark">
            <div class="text-center my-2">
                <img class="img-center w-50" src="{{asset('storage/'.$post->image)}}" alt="">
            </div>
            <div class="my-2">
                {{$post->text}}
            </div>
        </div>
        <p class="text-secondary py-4">
            @foreach($post->tags as $item)
                #{{$item->title}},
            @endforeach
        </p>
    </div>
@endsection
