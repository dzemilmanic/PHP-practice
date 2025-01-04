@extends('admin.layout')
@section('content')
<h1>Categories</h1>
<a href="{{ route('categories.create')}}">Create new category</a>
<ul>
    @foreach ($categories as $category)
        <li>{{ $category->name}}
            <form action="{{ route('categories.destroy', $category->id)}}"
                method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection