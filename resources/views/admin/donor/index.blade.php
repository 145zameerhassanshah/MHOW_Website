@extends('admin.layouts.master')

@section('title', 'Donor List')

@section('content')
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2 card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{ __('Search Donor ') }}</b></h3>
                        </div>
                        <div class="card-body py-2">
                            <form id="searchForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="account_name">Account Name</label>
                                            <select class="form-control select2" name="account_name" id="account_name">
                                                <option value="">Search Account Name</option>
                                                @foreach ($donors->unique('account_name') as $donor)
                                                    <option value="{{ $donor->account_name }}">{{ $donor->account_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <select class="form-control select2" name="email" id="email">
                                                <option value="">Search Email</option>
                                                @foreach ($donors as $donor)
                                                    <option value="{{ $donor->email }}">{{ $donor->email }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control select2" name="status" id="status">
                                                <option value="">Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="donor_type">Donor Type</label>
                                            <select class="form-control select2" name="donor_type" id="donor_type">
                                                <option value="">Search Donor Type</option>
                                                <option value="individual">Individual</option>
                                                <option value="corporate">Corporate</option>
                                                <option value="recurring">Recurring</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="is_receive_email">Receive Email</label>
                                            <select class="form-control select2" name="is_receive_email"
                                                id="is_receive_email">
                                                <option value="">Receive Email</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 align-self-center mt-lg-4 text-end">
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
                        <h3 class="card-title mt-1"><i class="fas fa-users "></i> Donor List</h3>
                        <div class="card-tools d-flex gap-2">
                            <button class="btn btn-sm btn-primary excel_import mx-1">Excel Import</button>
                            <a href="{{ route('admin.donor.add') }}" class="btn btn-sm btn-primary mx-1">+ Add Donor</a>
                            <button class="btn btn-sm btn-success" id="sendEmailBtn" disabled>
                                <i class="fas fa-envelope"></i> Send Email
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped data_table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Account Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($donors as $key => $donor)
                                                        <tr>
                                                            <td><input type="checkbox" name="donors[]" value="{{ $donor->id }}" class="selectDonor">
                                                            </td>
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
                                                                <div class=" float-end" role="group" aria-label="donor Actions">
                                                                    <!-- Edit Button -->
                                                                    <a href="{{ route('admin.donor.edit', $donor->id) }}"
                                                                        class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Edit donor">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>

                                                                    <!-- Delete Button -->
                                                                    <form action="{{ route('admin.donor.delete', $donor->id) }}" method="POST"
                                                                        class="d-inline-block">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Delete donor">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </form>

                                                                    <!-- Toggle Status Button -->
                                                                    <button
                                                                        class="btn btn-sm {{ $donor->status === 'active' ? 'btn-danger' : 'btn-success' }}"
                                                                        id="toggle-status-{{ $donor->id }}" data-id="{{ $donor->id }}"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $donor->status === 'active' ? 'Inactivate donor' : 'Activate donor' }}">
                                                                        {!! $donor->status === 'active'
                                    ? '<i class="fa fa-times-circle"></i>'
                                    : '<i class="fa fa-check-circle"></i>' !!}
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No donors found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Excel Modal --}}
    <div class="modal fade" id="excelImportModal" tabindex="-1" aria-labelledby="excelImportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.donor.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Excel File</h5><button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label>Choose Excel File</label>
                        <input type="file" name="file" class="form-control" accept=".xlsx,.xls,.csv" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Upload</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Send Email Modal --}}
    <div class="modal fade" id="sendEmailModal" tabindex="-1" aria-labelledby="sendEmailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.donor.send-email') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Send Email to Donors</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="donor_ids" id="selectedDonorIds">

                        <div class="mb-3">
                            <label>Seletc Template</label>
                            <select name="template_id" class="form-control" required>
                                <option value="">Select a Template</option>
                                @foreach ($templates as $template)
                                    <option value="{{ $template->id }}">{{ $template->title }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            // Initialize select2
            $('.select2').select2();

            // Excel import modal
            $('.excel_import').click(() => $('#excelImportModal').modal('show'));

            // Send email modal
            $('#sendEmailBtn').click(function () {
                let selected = $('.selectDonor:checked').map(function () { return this.value }).get();
                $('#selectedDonorIds').val(selected.join(','));
                $('#sendEmailModal').modal('show');
            });

            // Enable/disable send email button based on donor selection
            $('.selectDonor').change(() => {
                $('#sendEmailBtn').prop('disabled', $('.selectDonor:checked').length === 0);
            });

            // Select all donors
            $('#selectAll').change(function () {
                $('.selectDonor').prop('checked', this.checked).trigger('change');
            });


            // Donation search
            $('#searchForm').submit(function (e) {
                e.preventDefault();
                $('#searchBtn').html('<i class="fa fa-spinner fa-spin"></i> Searching...').prop('disabled', true);

                $.ajax({
                    url: "{{ route('admin.donor.search') }}", // Make sure this route exists
                    method: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        // Update the donations table (tbody or whole table section)
                        $('table tbody').html(response.html);
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

            // Refresh button for Donation search
            $('#refreshBtn').click(function () {
                $('#searchForm')[0].reset();
                $('.select2').val(null).trigger('change'); // Reset select2 fields properly
                $('#searchForm').submit(); // Trigger search again with empty values
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            // Handle toggle button click
            $('button[id^="toggle-status-"]').on('click', function () {
                var donorId = $(this).data('id');
                var button = $(this);
                var statusElement = $('#status-' + donorId);

                // Show loading state
                button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Please wait...');

                $.ajax({
                    url: '/admin/donor/toggle-status/' + donorId,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        let isActive = response.status === 'active';
                        let newClass = isActive ? 'btn-danger' : 'btn-success';
                        let newIcon = isActive ? '<i class="fa fa-times-circle"></i>' : '<i class="fa fa-check-circle"></i>';
                        let newTitle = isActive ? 'Inactivate Department' : 'Activate Department';
                        let newBadge = isActive
                            ? '<span class="badge bg-success"><i class="fa fa-check-circle text-white"></i> Active</span>'
                            : '<span class="badge bg-danger"><i class="fa fa-times-circle text-white"></i> Inactive</span>';

                        // Update status badge
                        statusElement.html(newBadge);

                        // Update button icon and class
                        button.removeClass('btn-success btn-danger').addClass(newClass).html(newIcon);

                        // Update tooltip title
                        button.attr('title', newTitle);

                        // Dispose and re-init tooltip
                        let oldTooltip = bootstrap.Tooltip.getInstance(button[0]);
                        if (oldTooltip) {
                            oldTooltip.dispose();
                        }
                        new bootstrap.Tooltip(button[0]);

                        // Re-enable button
                        button.prop('disabled', false);
                    },
                    error: function () {
                        alert('An error occurred while toggling status.');
                        button.prop('disabled', false);
                    }
                });
            });
        });

    </script>
@endsection