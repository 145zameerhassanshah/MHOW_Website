@extends('admin.layouts.master')
@section('title', 'Tour List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2 card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{ __('Search Tour ') }}</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body py-2">
                            <div class="col-lg-12">
                                <form id="searchForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" id="name" name="name" class="form-control"
                                                    placeholder="Search by Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="event" class="form-label">Event</label>
                                                <select class="form-control" name="event" id="event">
                                                    <option value="">Search Event</option>
                                                    @foreach ($events as $event)
                                                        <option value="{{ $event }}">{{ $event }}
                                                        </option>
                                                    @endforeach
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
                            <h3 class="card-title mt-1"><b>{{ __('List of Tour') }}</b></h3>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-responsive table-striped table-sm data_table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tour</th>
                                            <th>Event</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                            <th>Request Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tours as $key => $tour)
                                            @php
                                                $eventTitle = $tour->event;
                                                $title = $tour->title;

                                                $eventNames = match ($title) {
                                                    'egypt-tour' => [
                                                        'cairo' => 'Cairo, Egypt',
                                                        'alexandria' => 'Alexandria, Egypt',
                                                        'tunis' => 'Tunis, Tunisia',
                                                        'upcoming_event_one' =>
                                                            'Steigenberger Hotel El Tahrir, 2 Kasr Al Nile, Ismailia, Qasr El Nil Cairo, 4272111 | Wednesday 15th May 2024 @ 19:00',
                                                        'upcoming_event_two' =>
                                                            'Holiday Inn Citystars, Ali Rashed Street, Cairo, 11757 | Sunday 19th May 2024 @ 18:00',
                                                        'upcoming_event_three' =>
                                                            'Tolip Royal Alexandria, 252 El Gaish Road Mustafa Kemal Alexandria, 5434044 | Tuesday 21st May 2024 @19:00',
                                                        'upcoming_event_four' =>
                                                            'Marigold Hotel, Angle Rue Ibn, Nadim & Chabia, Tunis, 1073 | Sunday 12th May 2024 @ 18:00',
                                                    ],
                                                    'centralasia-tour' => [
                                                        'upcoming_event_one' =>
                                                            '5TH AUGUST 2024 | 7pm | Plaza Hotel | Almaty, Kazakhstan',
                                                        'upcoming_event_two' =>
                                                            '8TH AUGUST 2024 | 7pm | Ambassador Hotel | Bishkek, Kyrgyzstan',
                                                        'upcoming_event_three' =>
                                                            '10th AUGUST 2024 | 2pm | Hampton by Hilton | Tashkent, Uzbekistan',
                                                        'upcoming_event_four' =>
                                                            '13th AUGUST 2024 | 7pm | Paradise Plaza Hotel | Bukhara, Uzbekistan',
                                                        'upcoming_event_five' =>
                                                            '14th AUGUST 2024 | 7pm | Movenpick Hotel | Samarkand, Uzbekistan',
                                                    ],
                                                    'eastafrica-tour' => [
                                                        'upcoming_event_one' =>
                                                            '15TH SEPTEMBER 2024 | 3pm | Skynest Residences | Nairobi, Kenya',
                                                        'upcoming_event_two' =>
                                                            '20TH SEPTEMBER 2024 | 7pm | Golden Tulip Venue | Dar Es Salaam, Tanzania',
                                                        'upcoming_event_three' =>
                                                            '22ND SEPTEMBER 2024 | 3pm | CBD Hotel | Dar Es Salaam, Tanzania',
                                                        'upcoming_event_four' =>
                                                            '29th SEPTEMBER 2024 | 3pm | Hyatt Regency | Addis Ababa, Ethiopia 🇪🇹',
                                                        'upcoming_event_five' =>
                                                            '17TH SEPTEMBER 2024 | 3pm | Skynest Residences | Nairobi, Kenya',
                                                    ],
                                                    'westafrica-tour' => [
                                                        'upcoming_event_one' =>
                                                            "23TH OCTOBER 2024 | 7pm | Sant'egidio | Abidjan, Côte d'Ivoire",
                                                        'upcoming_event_two' =>
                                                            "29TH OCTOBER 2024 | 7pm | Maurissonn Hotel | Bouake, Côte d'Ivoire",
                                                        'upcoming_event_five' =>
                                                            "26TH OCTOBER 2024 | 2pm | Universal Hotel | Yamoussoukro, Côte d'Ivoire",
                                                    ],
                                                    default => [],
                                                };

                                                $eventName = $eventNames[$eventTitle] ?? $eventTitle;
                                            @endphp
                                            <tr>
                                                <td>#{{ ++$key }}</td>
                                                <td>{{ ucfirst(str_replace('-', ' ', $tour->title)) }}</td>
                                                <td>{{ $eventName }}</td>
                                                <td>{{ $tour->first_name . ' ' . $tour->surname }}</td>
                                                <td>{{ $tour->email }}</td>
                                                <td>{{ $tour->phone }}</td>
                                                <td>{{ $tour->gender }}</td>
                                                <td>{{ $tour->created_at }}</td>
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
@section('js')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- jQuery (required by DataTables) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function () {
        // Optional: initialize table on page load if needed
        if ($.fn.DataTable && $('.data_table').length) {
            $('.data_table').DataTable({
                destroy: true
            });
        }

        $('#searchForm').on('submit', function (e) {
            e.preventDefault();

            $('#searchBtn').html('<i class="fa fa-spinner fa-spin"></i> Searching...');
            $('#searchBtn').prop('disabled', true);

            let formData = $(this).serialize();

            $.ajax({
                url: "{{ route('old.tours.search') }}",
                method: "POST",
                data: formData,
                success: function (response) {
                    $('.tableContent').html(response.html);

                    // ✅ Reinitialize DataTable if loaded
                    if ($.fn.DataTable && $('.data_table').length) {
                        $('.data_table').DataTable({
                            destroy: true
                        });
                    } else {
                        console.warn('DataTable plugin not loaded or table not found.');
                    }
                },
                error: function (xhr) {
                    let errorMsg = 'Something went wrong.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        errorMsg = xhr.responseText;
                    }
                    alert(errorMsg);
                },
                complete: function () {
                    $('#searchBtn').html('<i class="bi bi-search"></i> Search');
                    $('#searchBtn').prop('disabled', false);
                }
            });
        });

        $('#refreshBtn').on('click', function () {
            $('#searchForm')[0].reset();
            $('#searchForm').submit(); // Trigger search with default
        });
    });
</script>

@endsection
