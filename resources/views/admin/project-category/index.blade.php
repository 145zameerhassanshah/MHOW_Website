@extends('admin.layouts.master')
@section('title', 'Project Category List')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('List of Project Categories') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.project-category.add') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="fas fa-plus"></i> {{ __('Add Project Category') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered data_table table-sm">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">{{ __('#') }}</th>
                                            <th style="width: 10%;">{{ __('Icon') }}</th>
                                            <th style="width: 30%;">{{ __('Name/Slug') }}</th>
                                            <th style="width: 15%;">{{ __('Status') }}</th>
                                            <th style="width: 23%;">{{ __('Created By') }}</th>
                                            <th style="white-space: nowrap; width: 17%;">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($project_categories as $project_category)
                                            <tr>
                                                <td class="text-center">{{ $project_category->id }}</td>
                                                <td>
                                                    @if ($project_category->icon)
                                                        <img src="{{ asset($project_category->icon) }}" alt="Icon"
                                                            width="50px">
                                                    @else
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $project_category->name }}
                                                    @if ($project_category->slug)
                                                    @endif
                                                </td>
                                                <td id="status-{{ $project_category->id }}" class="status-column">
                                                    <span
                                                        class="badge {{ $project_category->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                                        {!! $project_category->status === 'active'
                                                            ? '<i class="fa fa-check-circle text-white"></i> Active'
                                                            : '<i class="fa fa-times-circle text-white"></i> Inactive' !!}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    {{ $project_category->createdBy->name ?? '-' }}
                                                </td>
                                                <td>
                                                    <div class=" float-end" role="group"
                                                        aria-label="project-category Actions">
                                                        <!-- Edit Button -->
                                                        <a href="{{ route('admin.project-category.edit', $project_category->id) }}"
                                                            class="btn btn-info btn-sm" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Edit projec-category">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>

                                                        <!-- Delete Button -->
                                                        <form
                                                            action="{{ route('admin.project-category.delete', $project_category->id) }}"
                                                            method="POST" class="d-inline-block">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Delete project-category">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>

                                                        <!-- Toggle Status Button -->
                                                        <button
                                                            class="btn btn-sm {{ $project_category->status === 'active' ? 'btn-danger' : 'btn-success' }}"
                                                            id="toggle-status-{{ $project_category->id }}"
                                                            data-id="{{ $project_category->id }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="{{ $project_category->status === 'active' ? 'Inactivate project-category' : 'Activate project-category' }}">
                                                            {!! $project_category->status === 'active'
                                                                ? '<i class="fa fa-times-circle"></i>'
                                                                : '<i class="fa fa-check-circle"></i>' !!}
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">No project categories
                                                    found.</td>
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
    <script>
        $(document).ready(function() {
            // Handle toggle button click
            $('button[id^="toggle-status-"]').on('click', function() {
                    var project_categoryId = $(this).data('id');
                    var button = $(this);
                    var statusElement = $('#status-' + project_categoryId);

                    // Show loading state
                    button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Please wait...');

                    $.ajax({
                            url: '/admin/project-category/toggle-status/' + project_categoryId,
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.status === 'active') {
                                    button.removeClass('btn-success').addClass('btn-danger')
                                        .html('<i class="fa fa-times-circle"></i> Inactivate')
                                        .prop('disabled', false);

                                    statusElement.html(
                                        '<span class="badge bg-success"><i class="fa fa-check-circle text-white"></i> Active</span>'
                                    );
                                } else {
                                    button.removeClass('btn-danger').addClass('btn-success')
                                        .html('<i class="fa fa-check-circle"></i> Activate')
                                        .prop('disabled', false);

                                    statusElement.html(
                                        '<span class="badge bg-danger"><i class="fa fa-times-circle text-white"></i> Inactive</span>'
                                    );
                                }
                            },
                            error: function() {
                                alert('An error occurred. Please try again.');
                                button.prop('disabled', false).html(
                                    '<i class="fa fa-redo"></i> Try Again');
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
@endsection
@section('js')

    <script>
        $(document).ready(function() {
            $('button[id^="toggle-status-"]').on('click', function() {
                var project_categoryId = $(this).data('id');
                var button = $(this);
                var statusElement = $('#status-' + project_categoryId);

                // Show loading state
                button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Please wait...');

                $.ajax({
                    url: '/admin/project-category/toggle-status/' + project_categoryId,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status === 'active') {
                            button.removeClass('btn-success').addClass('btn-danger')
                                .html('<i class="fa fa-times-circle"></i> Inactivate');

                            statusElement.html(
                                '<span class="badge bg-success"><i class="fa fa-check-circle text-white"></i> Active</span>'
                            );
                        } else {
                            button.removeClass('btn-danger').addClass('btn-success')
                                .html('<i class="fa fa-check-circle"></i> Activate');

                            statusElement.html(
                                '<span class="badge bg-danger"><i class="fa fa-times-circle text-white"></i> Inactive</span>'
                            );
                        }

                        // Re-enable the button
                        button.prop('disabled', false);

                        // Optional: Reinitialize tooltip if needed
                        new bootstrap.Tooltip(button[0]);
                    },
                    error: function() {
                        alert('An error occurred while toggling status.');
                        button.prop('disabled', false).html(
                            '<i class="fa fa-redo"></i> Try Again');
                    }
                });
            });
        });
    </script>

@endsection
