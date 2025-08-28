@extends('admin.layouts.master')

@section('title', 'Restore Donor')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline mt-2">
                    <div class="card-header">
                        <h3 class="card-title mt-1"><i class="fas fa-users me-1"></i>Restore Donor</h3>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Account Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($donors as $key => $donor)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $donor->name }}</td>
                                        <td>{{ $donor->account_name }}</td>
                                        <td>{{ $donor->email ?? '-' }}</td>
                                        <td>{{ $donor->phone ?? '-' }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $donor->status == 'active' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($donor->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.donor.restore', $donor->id) }}"
                                                class="btn btn-info btn-sm"><i class="fas fa-undo"></i>
                                                {{ __('Restore') }}</a>


                                            <form id="deleteform" class="d-inline-block"
                                                action="{{ route('admin.donor.force.delete', $donor->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                    <i class="fas fa-trash"></i>{{ __('Delete') }}
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No donors found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
