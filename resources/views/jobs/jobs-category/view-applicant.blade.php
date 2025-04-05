@extends('layouts.masterlayout')

@section('content')

    <h1>Job Applications</h1>
@php
$applications = DB::table('job_applications')->get();
                        @endphp
    @if ($applications->isEmpty())
        <p>No job applications submitted yet.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead>
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
                        <td><a href="{{ asset('storage/' . $application->resume) }}" target="_blank">View Resume</a></td>
                        <td>{{ $application->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection