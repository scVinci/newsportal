@foreach($childs as $category)
    <tr>
        <th scope="row">{{$category->id}}</th>
        <th scope="row">{{$category->parent_id}}</th>
        <td>{{$category->title}}</td>
        <td>{{$category->slug}}</td>
        <td>
            <a class="btn btn-sm btn-success"
               href="{{route('admin.categories.edit', $category->id)}}">edit
            </a>
            <button class="btn btn-sm btn-danger"
                    type="submit" form="delete{{$category->id}}">delete
            </button>
            <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" id="delete{{$category->id}}">
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
@endforeach
