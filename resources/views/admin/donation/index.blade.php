@extends('admin.layouts.master')

@section('title', 'Donation List')

@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2 card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{ __('Search Donation ') }}</b></h3>
                        </div>
                        <div class="card-body py-2">
                            <form id="searchForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Search Donor</label>
                                            <select class="form-control select2" name="donor_name" id="donor_name">
                                                <option value="">Search Donor</option>
                                                @foreach ($donations as $donation)
                                                    @if ($donation->donor)

                                                        <option value="{{ $donation->donor->name }}"> {{ $donation->donor->name   }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Campaign">Campaign</label>
                                            <select class="form-control select2" name="campaign_title" id="campaign_title">
                                                <option value="">Search Campaign</option>

                                                @foreach ($donations as $donation)
                                                    @if ($donation->campaign)
                                                        <option value="{{ $donation->campaign_id }}">
                                                            {{ $donation->campaign->title }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Search Payment Method</label>
                                            <select class="form-control select2" name="payment_method_id"
                                                id="payment_method_id">
                                                <option value="">Search Payment Method</option>

                                                @foreach ($donations as $donation)
                                                    @if ($donation->paymentmethod)
                                                        <option value="{{ $donation->payment_method_id }}">
                                                            {{ $donation->paymentmethod->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label>Select Source</label>
                                                <select class="form-control select2" name="donation_source_id"
                                                    id="donation_source_id">
                                                    <option value="">Search Source</option>
                                                    @foreach ($donations as $donation)
                                                        <option value="{{ $donation->donation_source_id }}">
                                                            {{ $donation->source->name  }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 align-self-center mt-lg-6 text-end">
                                            <button type="button" class="btn btn-primary btn-sm" id="refreshBtn">
                                                <i class="bi bi-arrow-clockwise"></i> Refresh
                                            </button>
                                            <button type="submit" class="btn btn-success btn-sm" id="searchBtn">
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
    </section>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline mt-2">
                    <div class="card-header">
                        <h3 class="card-title mt-1"><i class="fas fa-users me-1"></i> Donation List</h3>
                        <div class="card-tools d-flex gap-2">
                            <!-- Button trigger modal -->
                            <button class="btn btn-sm btn-success  excel_import mx-1">
                                Excel Import
                            </button>

                            <a href="{{ route('admin.donation.add') }}" class="btn btn-sm btn-primary mx-1">Add Donation</a>
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Donar Name</th>
                                    <th>Compaign</th>
                                    <th>Amount</th>
                                    <th>Source</th>
                                    <th>Method</th>
                                    <th style="white-space: nowrap; width: 8%;">Action</th>
                                </tr>
                            </thead>
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
                                            <a href="{{ route('admin.donation.edit', $donation->id) }}"
                                                class="btn btn-primary btn-sm w-100 my-1"><i class="bi bi-pencil"></i>Edit</a>
                                            <form action="{{ route('admin.donation.delete', $donation->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure to delete this donation?');">
                                                @csrf
                                                <button class="btn btn-danger btn-sm w-100 my-1"><i
                                                        class="bi bi-trash"></i>Delete</button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="excelImportModal" tabindex="-1" aria-labelledby="excelImportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="excelImportModalLabel">Import Excel File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.donation.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file" class="form-label">Choose Excel File</label>
                            <input type="file" class="form-control" name="file" accept=".xlsx,.xls,.csv" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Upload</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();

            $('.excel_import').on('click', function () {
                $('#excelImportModal').modal('show');
            });
            // Donor search
            $('#searchForm').submit(function (e) {
                e.preventDefault();
                $('#searchBtn').html('<i class="fa fa-spinner fa-spin"></i> Searching...').prop('disabled', true);
                $.ajax({
                    url: "{{ route('admin.donation.search') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function (response) {

                        $('.data_table tbody').html(response.html);
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
                        $('#searchBtn').html('<i class="bi bi-search"></i> Search').prop('disabled', false);
                    }
                });
            });

            // Refresh the form
            $('#refreshBtn').click(function () {
                $('#searchForm')[0].reset();
                $('#searchForm').submit(); // Trigger search with default
            });
        });


    </script>
@endsection