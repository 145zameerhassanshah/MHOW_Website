<table class="table table-bordered table-striped data_table">
    <tbody>
        @forelse($donors as $key => $donor)
            <tr>
                <td><input type="checkbox" name="donors[]" value="{{ $donor->id }}" class="selectDonor"></td>
                <td>{{ $key + 1 }}</td>
                <td>{{ $donor->name }}</td>
                <td>{{ $donor->account_name }}</td>
                <td>{{ $donor->email ?? '-' }}</td>
                <td>{{ $donor->phone ?? '-' }}</td>
                <td id="status-{{ $donor->id }}" class="status-column">
                    <span class="badge {{ $donor->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                        {!! $donor->status === 'active' 
                            ? '<i class="fa fa-check-circle text-white"></i> Active' 
                            : '<i class="fa fa-times-circle text-white"></i> Inactive' !!}
                    </span>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('admin.donor.edit', $donor->id) }}"
                            class="btn btn-info btn-sm mx-1">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                        <form action="{{ route('admin.donor.delete', $donor->id) }}" method="post"
                              class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </td>
                        </form>

                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="8" class="text-center">No donors found.</td></tr>
        @endforelse
    </tbody>
    
</table>
