@extends('admin.layouts.master')

@section('title', 'Restore Campaigns')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline mt-2">
                    <div class="card-header">
                        <h3 class="card-title mt-1"><i class="fas fa-table me-1"></i>Restore Campaign</h3>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Project</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th  style="white-space: nowrap; width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($campaigns as $key => $campaign)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $campaign->title }}</td>
                                        <td>{{ optional($campaign->project)->name ?? '-' }}</td>
                                        <td>
                                            {{ $campaign->start_date ? \Carbon\Carbon::parse($campaign->start_date)->format('d M') : '-' }}
                                            -
                                            {{ $campaign->end_date ? \Carbon\Carbon::parse($campaign->end_date)->format('d M') : '-' }}
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge bg-{{ $campaign->status == 'active' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($campaign->status) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.campaign.restore', $campaign->id) }}"
                                                class="btn btn-info btn-sm"><i class="fas fa-undo"></i>
                                                {{ __('Restore') }}</a>


                                            <form id="deleteform" class="d-inline-block"
                                                action="{{ route('admin.campaign.force.delete', $campaign->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                    <i class="fas fa-trash"></i>{{ __('Delete') }}
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No campaigns found.</td>
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
