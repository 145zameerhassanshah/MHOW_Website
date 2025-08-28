@extends('admin.layouts.master')
@section('title', 'Trash Volunteer')

@section('content')
<div class="container mt-4">
    <div class="card border-top border-5 border-primary">
        <div class="card-header ">
            <h5>Trashed Volunteer Types</h5>
            <a href="{{ route('admin.volunteer-type.index') }}" class="btn btn-secondary btn-sm float-right">Back to List</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Order No</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->title }}</td>
                            <td>{{ $type->order_no }}</td>
                            <td>{{ ucfirst($type->status) }}</td>
                            <td>
                                <a href="{{ route('admin.volunteer-type.restore', $type->id) }}" class="btn btn-success btn-sm">Restore</a>
                                <form action="{{ route('admin.volunteer-type.forceDelete', $type->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Permanently delete?')" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $types->links() }}
        </div>
    </div>
</div>
@endsection
