@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm rounded mb-4 p-3">
        <div class="container">
            <a class="navbar-brand text-primary fw-bold" href="{{ url('/about') }}">
                <i class="fas fa-home"></i> Home
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Membership List Card -->
    <div class="card shadow-lg border-0 rounded">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="m-0"><i class="fas fa-users"></i> Membership List</h4>
            <a href="{{ route('membership.create') }}" class="btn btn-light btn-sm shadow-sm">
                <i class="fas fa-user-plus"></i> Add Membership
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Membership Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($memberships as $membership)
                            <tr class="hover-effect">
                                <td>{{ $membership->id }}</td>
                                <td>{{ $membership->name }}</td>
                                <td>{{ $membership->email }}</td>
                                <td><span class="badge bg-info">{{ $membership->membership_type }}</span></td>
                                <td>
                                    <span class="badge {{ $membership->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $membership->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('membership.edit', $membership->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('membership.destroy', $membership->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No membership data available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .hover-effect:hover {
        background-color: #f8f9fc !important;
        transition: all 0.3s ease-in-out;
    }
</style>

@endsection
