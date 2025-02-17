@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Membership List') }}</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Membership Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="membershipTable" width="100%" cellspacing="0">
                    <thead>
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
                        @if(isset($memberships) && count($memberships) > 0)
                            @foreach ($memberships as $membership)
                                <tr>
                                    <td>{{ $membership->id }}</td>
                                    <td>{{ $membership->name }}</td>
                                    <td>{{ $membership->email }}</td>
                                    <td>{{ $membership->membership_type }}</td>
                                    <td>
                                        <span class="badge {{ $membership->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                                            {{ ucfirst($membership->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('membership.edit', $membership->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('membership.destroy', $membership->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(event, this);">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No membership data available.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#membershipTable').DataTable();
    });

    function confirmDelete(event, form) {
        if (!confirm('Are you sure you want to delete this membership?')) {
            event.preventDefault();
        }
    }
</script>
@endpush
