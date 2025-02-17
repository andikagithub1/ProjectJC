@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4>Edit Membership</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('membership.update', $membership->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $membership->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $membership->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="membership_type" class="form-label">Membership Type</label>
                    <select class="form-select" id="membership_type" name="membership_type" required>
                        <option value="basic" {{ $membership->membership_type == 'basic' ? 'selected' : '' }}>Basic</option>
                        <option value="premium" {{ $membership->membership_type == 'premium' ? 'selected' : '' }}>Premium</option>
                        <option value="vip" {{ $membership->membership_type == 'vip' ? 'selected' : '' }}>VIP</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="active" {{ $membership->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $membership->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('membership.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
