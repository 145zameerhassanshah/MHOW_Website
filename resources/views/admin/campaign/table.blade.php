<table class="table-sm table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Project</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
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
                <td>
                    <span class="badge bg-{{ $campaign->status == 'active' ? 'success' : 'secondary' }}">
                        {{ ucfirst($campaign->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.campaign.edit', $campaign->id) }}"
                        class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i> Edit</a>

                    <form id="deleteform" class="d-inline-block"
                        action="{{ route('admin.campaign.delete', $campaign->id) }}" method="post">
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