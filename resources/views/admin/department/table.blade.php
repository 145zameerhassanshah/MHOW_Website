<table class="table table-striped table-bordered table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Icon</th>
            <th>Name/Slug</th>
            <th>Status</th>
            <th>Created By</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($departments as $department)
            <tr>
                <td class="text-center">{{ $department->id }}</td>
                <td>
                    @if ($department->icon)
                        <img src="{{ asset($department->icon) }}" alt="Icon" width="50px">
                    @endif
                </td>
                <td class="">
                    {{ $department->name }}
                    @if ($department->slug)
                        
                        <span class="badge bg-secondary float-right{{ $department->slug == 'active' ? 'success' : 'danger' }}">
                            {{ ucfirst($department->slug) }}
                        </span>
                    @endif
                </td>
                <td>
                    <span class="badge bg-{{ $department->status == 'active' ? 'success' : 'danger' }}">
                        {{ ucfirst($department->status) }}
                    </span>
                </td>
                <td class="text-center">
                    {{ $department->createdBy->name ?? '-' }}
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('admin.department.edit', $department->id) }}"
                            class="btn btn-info btn-sm mx-1">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                        <form action="{{ route('admin.department.delete', $department->id) }}" method="post"
                              class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted">No departments found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
