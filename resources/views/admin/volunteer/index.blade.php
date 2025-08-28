@extends('admin.layouts.master')
@section('title', 'Volunteer List')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('List of Volunteer') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.volunteer.add') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="fas fa-plus"></i> {{ __('Add Volunteer') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered data_table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Volunteer Type</th>
                                <th>Phone & Email</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($volunteers as $volunteer)
                                <tr>
                                    <td>{{ $volunteer->id }}</td>
                                    <td><img src="{{ asset($volunteer->image) }}" width="50px" alt="image"></td>
                                    <td>{{ $volunteer->name }}</td>
                                    <td>{{ $volunteer->volunteerType->title ?? 'N/A' }}</td>
                                    <td>
                                        <strong>Email:</strong> {{ $volunteer->email }}<br>
                                        <strong>Phone:</strong> {{ $volunteer->phone }}
                                    </td>
                                    <td>{{ ucfirst($volunteer->status) }}</td>
                                    <td>
                                        <a href="{{ route('admin.volunteer.edit', $volunteer->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.volunteer.delete', $volunteer->id) }}" method="POST"
                                            class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            <button class="btn btn-sm btn-danger">Trash</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection