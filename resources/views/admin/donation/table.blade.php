<table class="table table-bordered table-striped data_table">
    {{-- <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Donar Name</th>
            <th>Compaign</th>
            <th>Amount</th>
            <th>Source</th>
            <th>Method</th>
            <th  style="white-space: nowrap; width: 8%;">Action</th>
        </tr>
    </thead> --}}
    <tbody>
        @forelse($donations as $key => $donation)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($donation->donation_date)->format('jS-M-y') }}</td>
                <td>{{ $donation->donor->name ?? 'N/A' }}</td>
                <td>{{ $donation->campaign->title ?? 'N/A' }}</td>
                <td>{{ $donation->amount ?? 'N/A' }}</td>
                <td>{{ $donation->source->name ?? 'N/A' }}</td>
                <td>{{ $donation->paymentmethod->name ?? 'N/A'}}</td>
                <td>
                    <a href="{{ route('admin.donation.edit', $donation->id) }}" class="btn btn-primary btn-sm w-100 my-1"><i class="bi bi-pencil"></i>Edit</a>
                    <form action="{{ route('admin.donation.delete', $donation->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this donation?');">
                        @csrf
                        <button class="btn btn-danger btn-sm w-100 my-1"><i class="bi bi-trash"></i>Delete</button>
                    </form>
                    

                </td>

            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No Donation found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
