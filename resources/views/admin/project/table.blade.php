<table class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th>{{ __('#') }}</th>
            <th>{{ __('Title') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Date') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($projects as $project)
            <tr>
                <td class="text-center">{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>
                    <span
                        class="badge bg-{{ $project->status == 'active' ? 'success' : 'danger' }}">
                        {{ ucfirst($project->status) }}
                    </span>
                </td>
                <td class="text-center">
                    {{ \Carbon\Carbon::parse($project->start_date)->format('d M, Y') ?? '-' }}
                    -
                    {{ \Carbon\Carbon::parse($project->end_date)->format('d M, Y') ?? '-' }}
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('admin.project.edit', $project->id) }}"
                            class="btn btn-info btn-sm mx-1">
                            <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                        </a>

                        <form id="deleteform" class="d-inline-block"
                            action="{{ route('admin.project.delete', $project->id) }}"
                            method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"
                                id="delete">
                                <i class="fas fa-trash"></i>{{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">No projects found.</td>
            </tr>
        @endforelse
    </tbody>
</table>