@extends('layouts.masterlayout');
@section('content')
<div class="container mt-5">
    <h2>Add New Job Category</h2>
    <form method='POST' action='{{ route('add-category-form') }}' enctype='multipart/form-data'>
        @csrf
        <div class="mb-3">
            <label for="categoryTitle" class="form-label">Category Title:</label>
            <input type="text" name='job-category' class="form-control" id="categoryTitle" placeholder="Enter category title">
        </div>
        <div class="mb-3">
            <label for="categoryThumbnail" class="form-label">Category Thumbnail:</label>
            <input type="file" name='category_img' class="form-control" id="categoryThumbnail">
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>

    @endsection