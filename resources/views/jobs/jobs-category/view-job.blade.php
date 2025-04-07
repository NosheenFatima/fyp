@extends('layouts.masterlayout')

@section('content')
    <div class="container mt-5">
        <h2>Job Listings</h2>
  @php
                            $jobs = DB::table('new_job')->get();
                        @endphp
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($jobs->isEmpty())
            <p>No jobs available yet.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Company Logo</th>
                        <th>Company</th>
                        <th>Job Title</th>
                        <th>Location</th>
                        <th>Salary</th>
                        <th>Type</th>
                        <th>Posted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($job->company_logo)
                                    <img src="{{ asset('storage/' . $job->company_logo) }}" alt="{{ $job->company }} Logo" style="max-width: 50px; height: auto;">
                                @else
                                    No Logo
                                @endif
                            </td>
                            <td>{{ $job->company }}</td>
                            <td>{{ $job->job_title }}</td>
                            <td>{{ $job->location ?: 'N/A' }}</td>
                            <td>{{ $job->salary ?: 'N/A' }}</td>
                            <td>{{ $job->type ?: 'N/A' }}</td>
                            <td>    {{ $job->posted_at ? \Carbon\Carbon::parse($job->posted_at)->diffForHumans() : 'N/A' }}
</td>@role('admin')
                            <td style="display: flex; gap:6px;">
                               
                                <a href="{{ route('show-new-job', $job->id) }}" class="btn btn-sm btn-primary">Update</a>
                                <form action="{{ route('jobs-delete', $job->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                   
                   
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                    @endrole
                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection