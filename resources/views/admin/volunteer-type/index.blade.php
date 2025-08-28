@extends('admin.layouts.master')
@section('title', 'Volunteer Type List')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('List of Volunteer Type') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.volunteer-type.add') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="fas fa-plus"></i> {{ __('Add Volunteer Type') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Icon</th>
                                            <th>Order No</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($types as $type)
                                            <tr>
                                                <td>{{ $type->id }}</td>
                                                <td>{{ $type->title }}</td>
                                                <td>{{ $type->icon }}</td>
                                                <td>{{ $type->order_no }}</td>
                                                <td>{{ ucfirst($type->status) }}</td>
                                                <td>
                                                    <a href="{{ route('admin.volunteer-type.edit', $type->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('admin.volunteer-type.delete', $type->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        <button onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger btn-sm">Trash</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
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
