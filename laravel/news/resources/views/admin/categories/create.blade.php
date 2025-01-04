@extends('admin.layout')
@section('content')
<h1>Create Category</h1>
<form action="{{ route('categories.store')}}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Category name">
    <button type="submit">Save</button>
</form>
@endsection