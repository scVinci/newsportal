@foreach($childs as $category)
    <tr>

    <th scope="row"> |---- {{$category->title}}</th>
    <td>{{$category->title}}</td>
    <td>{{$category->slug}}</td>
    <td><a href="{{route('admin.categories.edit', $category->id)}}">редагувати</a> /
        <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST">
            @csrf

            @method('DELETE')

            <button type="submit" >Delete</button>
        </form></td>
</tr>
@endforeach
