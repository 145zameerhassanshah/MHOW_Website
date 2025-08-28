@extends('admin.layouts.master')
@section('title', 'Booking List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2 card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{ __('Search Booking ') }}</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body py-2">
                            <div class="col-lg-12">
                                <form id="searchForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Search by Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="event_id" class="form-label">Event</label>
                                                <select class="form-control select2" name="event_id" id="event_id">
                                                    <option value="">Search Event</option>
                                                    @foreach ($events as $event)
                                                        <option value="{{ $event->id }}"
                                                            {{ isset($event_id) && $event_id == $event->id ? 'selected' : '' }}>
                                                            {{ $event->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="event_type" class="form-label">Event Type</label>
                                                <select class="form-control select2" name="event_type" id="event_type">
                                                    <option value="">Search Event Type</option>
                                                    <option value="free">Free
                                                    </option>
                                                    <option value="paid">Paid
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select class="form-control select2" name="gender" id="gender">
                                                    <option value="">Search Gender</option>
                                                    <option value="male">Male
                                                    </option>
                                                    <option value="female">Female
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-right align-self-center">
                                            <button type="button" class="btn btn-primary btn-sm mt-lg-2" id="refreshBtn">
                                                <i class="bi bi-arrow-clockwise"></i> Refresh
                                            </button>
                                            <button type="submit" class="btn btn-success btn-sm mt-lg-2" id="searchBtn">
                                                <i class="bi bi-search"></i> Search
                                            </button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('List of Bookings') }}</b></h3>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm data_table"
                                    style="table-layout: fixed; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">{{ __('#') }}</th>
                                            <th style="width: 5%;">{{ __('Event') }}</th>
                                            <th style="width: 40%;">{{ __('Schedule') }}</th>
                                            <th style="width: 20%;">{{ __('Name') }}</th>
                                            <th style="width: 10%;">{{ __('Email') }}</th>
                                            <th style="width: 10%;">{{ __('Phone') }}</th>
                                            <th style="white-space: nowrap; width: 10%;">{{ __('Action') }}</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @forelse ($bookings as $booking)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ ucfirst(str_replace('_', ' ', $booking->event->slug) ?? null) }}
                                                </td>
                                                <td>
                                                    {{ $booking->schedule_title ?? null }}
                                                </td>
                                                <td>
                                                    {{ $booking->name }}
                                                </td>
                                                <td>
                                                    {{ $booking->email }}
                                                </td>
                                                <td>
                                                    {{ $booking->phone_no }}
                                                </td>
                                                <td>
                                                    <div class=" float-end" role="group" aria-label="Department Actions">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('admin.booking.detail', $booking->id) }}"
                                                            class="btn btn-info btn-sm" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit Department">
                                                            <i class="fas fa-eye"></i>
                                                        </a>

                                                        <!-- Delete Button -->
                                                        <form action="{{ route('admin.booking.delete', $booking->id) }}"
                                                            method="POST" class="d-inline-block">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Delete Department">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('js')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- jQuery (required by DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    {{-- <script>
        $(document).ready(function () {
            $('#event_id').select2({
                allowClear: true
            });
        });
    </script>    --}}
    <script>
        $(document).ready(function() {
            // Initial DataTable setup (for first load)
            let dataTable = $('.data_table').DataTable({
                destroy: true // allow reinit
            });

            $('#searchForm').on('submit', function(e) {
                e.preventDefault();

                $('#searchBtn').html('<i class="fa fa-spinner fa-spin"></i> Searching...');
                $('#searchBtn').prop('disabled', true);

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.booking.search') }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        $('.tableContent').html(response.html);

                        // 🔁 Reapply DataTable after new content loads
                        $('.data_table').DataTable({
                            destroy: true // ensures it can re-bind
                        });
                    },
                    error: function(xhr) {
                        let errorMsg = 'Something went wrong.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        } else if (xhr.responseText) {
                            errorMsg = xhr.responseText;
                        }
                        alert(errorMsg);
                    },
                    complete: function() {
                        $('#searchBtn').html('<i class="bi bi-search"></i> Search');
                        $('#searchBtn').prop('disabled', false);
                    }
                });
            });

            $('#refreshBtn').on('click', function() {
                $('#searchForm')[0].reset();
                $('#searchForm').submit(); // Trigger search with default
            });
        });
    </script>

@endsection
