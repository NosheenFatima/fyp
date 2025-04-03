@extends('layouts.masterlayout');
@section('content')
     <div class="container mt-5">
        <h2>Add New Job</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('add-new-job') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="company_logo">Company Logo :</label>
                <input type="file" class="form-control-file @error('company_logo') is-invalid @enderror" id="company_logo" name="company_logo">
                @error('company_logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Upload a logo for the company (optional).</small>
            </div>
            <div class="form-group">
                <label for="company">Company Name:</label>
                <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company') }}" required>
                @error('company')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" class="form-control @error('job_title') is-invalid @enderror" id="job_title" name="job_title" value="{{ old('job_title') }}" required>
                @error('job_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="location">Location :</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}">
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="salary">Salary :</label>
                <input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ old('salary') }}">
                @error('salary')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">Type :</label>
                <br>
                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                    <option value="">Select Job Type</option>
                    <option value="Full Time" {{ old('type') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                    <option value="Part Time" {{ old('type') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                    <option value="Contract" {{ old('type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                    <option value="Temporary" {{ old('type') == 'Temporary' ? 'selected' : '' }}>Temporary</option>
                    <option value="Internship" {{ old('type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
  <br>
            <div class="form-group">
                <label for="posted_at">Posted Date :</label>
                <br>
                <input type="datetime-local" class="form-control @error('posted_at') is-invalid @enderror" id="posted_at" name="posted_at" value="{{ old('posted_at') }}">
                @error('posted_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Leave blank to use the current date and time.</small>
            </div>

            <button type="submit" class="btn btn-primary">Add Job</button>
        </form>
    </div>
    @endsection