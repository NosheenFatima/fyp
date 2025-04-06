@extends('layouts.masterlayout')

@section('content')

    <div class="container">
        <h1 class="mb-4">Job Applications Details</h1>

        @php
            $applications = DB::table('job_applications')->get();
        @endphp

        @if ($applications->isEmpty())
            <p class="alert alert-info">No job applications submitted yet.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Cover Letter</th>
                            <th>Resume</th>
                            <th>Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->name }}</td>
                                <td>{{ $application->email }}</td>
                                <td>{{ $application->cover_letter ? Str::limit($application->cover_letter, 100) : 'N/A' }}</td>
                                <td>
                                    @if ($application->resume)
                                        <a href="{{ asset('storage/' . $application->resume) }}" target="_blank" class="btn btn-sm btn-primary">View Resume</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $application->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection