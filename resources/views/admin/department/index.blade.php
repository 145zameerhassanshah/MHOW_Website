@extends('admin.layouts.master')
@section('title', 'Department List')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2 card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{ __('Search Department ') }}</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body py-2">
                            <div class="col-lg-12">
                                <form id="searchForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="department_name" class="form-label">Name</label>
                                                <select class="form-control select2" name="department_name"
                                                    id="department_name">
                                                    <option value="">Search Name</option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->name }}">{{ $department->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="department_slug" class="form-label">Slug</label>
                                                <select class="form-control select2" name="department_slug"
                                                    id="department_slug">
                                                    <option value="">Search Slug</option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->slug }}">{{ $department->slug }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="form-control select2" name="status" id="status">
                                                    <option value="">Select Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">InActive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 text-right align-self-center mt-lg-3">
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
                            <h3 class="card-title mt-1"><b>{{ __('List of Departments') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.department.add') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="fas fa-plus"></i> {{ __('Add Department') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm data_table">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">{{ __('#') }}</th>
                                            <th style="width: 17%;">{{ __('Icon') }}</th>
                                            <th style="width: 32%;">{{ __('Name/Slug') }}</th>
                                            <th style="width: 10%;">{{ __('Status') }}</th>
                                            <th style="width: 18%;">{{ __('Created By') }}</th>
                                            <th style="white-space: nowrap; width: 18%;">{{ __('Action') }}</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @forelse ($departments as $department)
                                            <tr>
                                                <td class="text-center">{{ $department->id }}</td>
                                                <td>
                                                    @if ($department->icon)
                                                        <img src="{{ asset($department->icon) }}"
                                                            alt="{{ $department->name }}-icon"
                                                            style="width: 50px; height:50px;">
                                                    @else
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $department->name }}
                                                </td>
                                                <td id="status-{{ $department->id }}" class="status-column">
                                                    <span
                                                        class="badge {{ $department->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                                        {!! $department->status === 'active'
                                                            ? '<i class="fa fa-check-circle text-white"></i> Active'
                                                            : '<i class="fa fa-times-circle text-white"></i> Inactive' !!}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    {{ $department->createdBy->name ?? '-' }}
                                                </td>
                                                <td>
                                                    <div class=" float-end" role="group" aria-label="Department Actions">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('admin.department.edit', $department->id) }}"
                                                            class="btn btn-info btn-sm" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit Department">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <!-- Delete Button -->
                                                        <form
                                                            action="{{ route('admin.department.delete', $department->id) }}"
                                                            method="POST" class="d-inline-block">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Delete Department">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>

                                                        <!-- Toggle Status Button -->
                                                        <button
                                                            class="btn btn-sm {{ $department->status === 'active' ? 'btn-danger' : 'btn-success' }}"
                                                            id="toggle-status-{{ $department->id }}"
                                                            data-id="{{ $department->id }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="{{ $department->status === 'active' ? 'Inactivate Department' : 'Activate Department' }}">
                                                            {!! $department->status === 'active'
                                                                ? '<i class="fa fa-times-circle"></i>'
                                                                : '<i class="fa fa-check-circle"></i>' !!}
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">No departments found.
                                                </td>
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
    <script>
        $(document).ready(function() {
            // Handle toggle button click
            $('button[id^="toggle-status-"]').on('click', function() {
                var departmentId = $(this).data('id');
                var button = $(this);
                var statusElement = $('#status-' + departmentId);

                // Show loading state
                button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Please wait...');

                $.ajax({
                    url: '/admin/department/toggle-status/' + departmentId,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        let isActive = response.status === 'active';
                        let newClass = isActive ? 'btn-danger' : 'btn-success';
                        let newIcon = isActive ? '<i class="fa fa-times-circle"></i>' :
                            '<i class="fa fa-check-circle"></i>';
                        let newTitle = isActive ? 'Inactivate Department' :
                            'Activate Department';
                        let newBadge = isActive ?
                            '<span class="badge bg-success"><i class="fa fa-check-circle text-white"></i> Active</span>' :
                            '<span class="badge bg-danger"><i class="fa fa-times-circle text-white"></i> Inactive</span>';

                        // Update status badge
                        statusElement.html(newBadge);

                        // Update button icon and class
                        button.removeClass('btn-success btn-danger').addClass(newClass).html(
                            newIcon);

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
                    error: function() {
                        alert('An error occurred while toggling status.');
                        button.prop('disabled', false);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();

                $('#searchBtn').html('<i class="fa fa-spinner fa-spin"></i> Searching...');
                $('#searchBtn').prop('disabled', true);

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.department.search') }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        $('.tableContent').html(response.html);
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