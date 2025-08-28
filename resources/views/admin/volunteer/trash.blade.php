@extends('admin.layouts.master')
@section('title', 'Trash Volunteers')

@section('content')
{{-- @include('admin.page.top-nav') --}}
<section class="content">
{{-- @include('admin.page.side-nav') --}}
<div class="row">
    <div class="col-md-12">
        <div class="card border-top border-5 border-primary">
            <div class="card-header">
                <h3 class="card-title mt-1">Trashed Volunteers</h3>
                <a href="{{ route('volunteers.index') }}" class="btn btn-sm btn-secondary float-right">Back to List</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($volunteers as $volunteer)
                            <tr>
                                <td>{{ $volunteer->id }}</td>
                                <td><img src="{{ asset($volunteer->image) }}" width="50"></td>
                                <td>{{ $volunteer->name }}</td>
                                <td>
                                    <a href="{{ route('volunteers.restore', $volunteer->id) }}" class="btn btn-sm btn-success">Restore</a>
                                    <form action="{{ route('volunteers.forceDelete', $volunteer->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete permanently?');">
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-muted text-center">No trashed records.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
