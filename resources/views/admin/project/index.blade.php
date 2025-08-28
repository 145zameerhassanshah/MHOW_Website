@extends('admin.layouts.master')
@section('title', 'Project List')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt-2 card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{ __('Search Project ') }}</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body py-2">
                            <div class="col-lg-12">
                                <form id="searchForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="project_category" class="form-label">Category</label>
                                                <select class="form-control select2" name="project_category" id="project_category">
                                                    <option value="">Search Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="project_name" class="form-label">Name</label>
                                                <select class="form-control select2" name="project_name" id="project_name">
                                                    <option value="">Search Name</option>
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->name }}">{{ $project->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="project_slug" class="form-label">Slug</label>
                                                <select class="form-control select2" name="project_slug" id="project_slug">
                                                    <option value="">Search Slug</option>
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->slug }}">{{ $project->slug }}
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
                                        <div class="col-lg-12 text-right">
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
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('List of Projects') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.project.add') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="fas fa-plus"></i> {{ __('Add Project') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm data_table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                              <th>{{ __('Image') }}</th>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th  style="white-space: nowrap; width: 35%; align-item:;">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($projects as $project)
                                            <tr>
                                                <td class="text-center">{{ $project->id }}</td>
                                               <td><img class="w-80" src="{{ asset('assets/uploads/project/image/' . $project->image) }}" alt=""></td>

                                                <td>{{ $project->name }}</td>
                                                <td id="status-{{ $project->id }}" class="status-column">
                                                    <span
                                                        class="badge {{ $project->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                                        {!! $project->status === 'active'
                                                            ? '<i class="fa fa-check-circle text-white"></i> Active'
                                                            : '<i class="fa fa-times-circle text-white"></i> Inactive' !!}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($project->start_date)->format('d M, Y') ?? '-' }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($project->end_date)->format('d M, Y') ?? '-' }}
                                                </td>
                                                <td>  
                                                    <div class=" float-end" role="group" aria-label="project Actions">  
                                                        <!-- Edit Button -->  
                                                        <a href="{{ route('admin.project.edit', $project->id) }}"  
                                                           class="btn btn-info btn-sm"  
                                                           data-bs-toggle="tooltip" data-bs-placement="top" title="Edit project">  
                                                            <i class="fas fa-pencil-alt"></i>  
                                                        </a>  
                                                
                                                        <!-- Delete Button -->  
                                                        <form action="{{ route('admin.project.delete', $project->id) }}" method="POST" class="d-inline-block">  
                                                            @csrf  
                                                            <button type="submit" class="btn btn-danger btn-sm"  
                                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete project">  
                                                                <i class="fas fa-trash"></i>  
                                                            </button>  
                                                        </form>  
                                                
                                                        <!-- Toggle Status Button -->  
                                                        <button class="btn btn-sm {{ $project->status === 'active' ? 'btn-danger' : 'btn-success' }}"
                                                            id="toggle-status-{{ $project->id }}"
                                                            data-id="{{ $project->id }}"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="{{ $project->status === 'active' ? 'Inactivate project' : 'Activate project' }}">
                                                        {!! $project->status === 'active'
                                                            ? '<i class="fa fa-times-circle"></i>'
                                                            : '<i class="fa fa-check-circle"></i>' !!}
                                                    </button>
                                                                                                        </div>  
                                                </td>  
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">No projects found.</td>
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
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();

                $('#searchBtn').html('<i class="fa fa-spinner fa-spin"></i> Searching...');
                $('#searchBtn').prop('disabled', true);

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.project.search') }}",
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

<script>  
    $(document).ready(function() {
        // Handle toggle button click
        $('button[id^="toggle-status-"]').on('click', function() {
            var projectId = $(this).data('id');
            var button = $(this);
            var statusElement = $('#status-' + projectId);

            // Show loading state
            button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Please wait...');

            $.ajax({
                url: '/admin/project/toggle-status/' + projectId,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    let isActive = response.status === 'active';
                    let newClass = isActive ? 'btn-danger' : 'btn-success';
                    let newIcon = isActive ? '<i class="fa fa-times-circle"></i>' : '<i class="fa fa-check-circle"></i>';
                    let newTitle = isActive ? 'Inactivate project' : 'Activate project';
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