<table class="table table-striped table-bordered table-sm data_table">
    <thead>
        <tr>
            <th style="width: 5%;">{{ __('#') }}</th>
            <th style="width: 17%;">{{ __('Event') }}</th>
            <th style="width: 17%;">{{ __('Name') }}</th>
            <th style="width: 32%;">{{ __('Phone No') }}</th>
            <th style="width: 10%;">{{ __('Event Type') }}</th>
            <th style="white-space: nowrap; width: 18%;">{{ __('Action') }}</th>
        </tr>

    </thead>
    <tbody>
        @forelse ($bookings as $booking)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>
                    {{ $booking->event->title ?? '' }}
                </td>
                <td>
                    {{ $booking->name }}
                </td>
                <td>
                    {{ $booking->phone_no }}
                </td>
                <td>
                    @if ($booking->event_type == 'free')
                        <span class="badge badge-success">Free</span>
                    @else
                        <span class="badge badge-info">Paid</span>
                    @endif
                </td>
                <td>
                    <div class=" float-end" role="group" aria-label="Department Actions">
                        <!-- Edit Button -->
                        <a href="{{ route('admin.booking.detail', $booking->id) }}" class="btn btn-info btn-sm"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Department">
                            <i class="fas fa-eye"></i>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.booking.delete', $booking->id) }}" method="POST"
                            class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Delete Department">
                                <i class="fas fa-trash"></i>
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
