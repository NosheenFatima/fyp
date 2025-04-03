@extends('layouts.masterlayout') {{-- Assuming you have a layout file --}}

@section('content')
<div class="container mt-5">
    <h2>Job Categories</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
      @forelse ($jobCategories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>
            @if ($category->category_image)
                <img src="{{ asset('storage/' . $category->category_image) }}" alt="{{ $category->job_title }}" style="max-width: 50px; max-height: 50px;">
            @else
                No Image
            @endif
        </td>
        <td>{{ $category->job_title }}</td>
        @role('admin')
            <td>
                {{-- {{ route('jobs.category.edit', $category->id) }} --}}
                {{-- <a href="" class="btn btn-sm btn-primary">Edit</a> --}}
                <a href="{{ route('show-category-form', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('jobs.category.delete', $category->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                </form>
            </td>
        @endrole {{-- Add the closing @endrole directive here --}}
    </tr>
@empty
    <tr><td colspan="4" class="text-center">No job categories found.</td></tr>
@endforelse
        </tbody>
    </table>
</div>
@endsection