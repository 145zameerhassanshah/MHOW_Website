@extends('admin.layouts.master')

@section('title', 'Campaigns')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt-2 card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><b>{{ __('Search Campaign ') }}</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body py-2">
                        <div class="col-lg-12">
                            <form id="searchForm">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="project_id" class="form-label">Project</label>
                                            <select class="form-control select2" name="project_id"
                                                id="project_id">
                                                <option value="">Search Project</option>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}">{{ $project->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="campaign_slug" class="form-label">Slug</label>
                                            <select class="form-control select2" name="campaign_slug"
                                                id="campaign_slug">
                                                <option value="">Search Slug</option>
                                                @foreach ($campaigns as $campaign)
                                                    <option value="{{ $campaign->slug }}">{{ $campaign->slug }}
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
                                    <div class="col-lg-3 align-self-center mt-lg-3 text-right">
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><i class="fas fa-table me-1"></i><b> Campaign List</b></h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.campaign.add') }}" class="btn btn-sm btn-primary">+ Add Campaign</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="tableContent table-sm table table-bordered table-striped data_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Project</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th  style="white-space: nowrap; width: 35%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($campaigns as $key => $campaign)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $campaign->title }}</td>
                                            <td>{{ optional($campaign->project)->name ?? '-' }}</td>
                                            <td>
                                                {{ $campaign->start_date ? \Carbon\Carbon::parse($campaign->start_date)->format('d M') : '-' }}
                                                -
                                                {{ $campaign->end_date ? \Carbon\Carbon::parse($campaign->end_date)->format('d M') : '-' }}
                                            </td>
                                            <td id="status-{{ $campaign->id }}" class="status-column">
                                                <span
                                                    class="badge {{ $campaign->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                                    {!! $campaign->status === 'active'
                                                        ? '<i class="fa fa-check-circle text-white"></i> Active'
                                                        : '<i class="fa fa-times-circle text-white"></i> Inactive' !!}
                                                </span>
                                            </td>
                                            <td>  
                                                <div class=" float-end" role="group" aria-label="project Actions">  
                                                    <!-- Edit Button -->  
                                                    <a href="{{ route('admin.campaign.edit', $campaign->id) }}"  
                                                       class="btn btn-info btn-sm"  
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Edit campaign">  
                                                        <i class="fas fa-pencil-alt"></i>  
                                                    </a>  
                                            
                                                    <!-- Delete Button -->  
                                                    <form action="{{ route('admin.campaign.delete', $campaign->id) }}" method="POST" class="d-inline-block">  
                                                        @csrf  
                                                        <button type="submit" class="btn btn-danger btn-sm"  
                                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete campaign">  
                                                            <i class="fas fa-trash"></i>  
                                                        </button>  
                                                    </form>  
                                            
                                                    <!-- Toggle Status Button -->  
                                                    <button class="btn btn-sm {{ $campaign->status === 'active' ? 'btn-danger' : 'btn-success' }}"
                                                        id="toggle-status-{{ $campaign->id }}"
                                                        data-id="{{ $campaign->id }}"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="{{ $campaign->status === 'active' ? 'Inactivate campaign' : 'Activate campaign' }}">
                                                    {!! $campaign->status === 'active'
                                                        ? '<i class="fa fa-times-circle"></i>'
                                                        : '<i class="fa fa-check-circle"></i>' !!}
                                                </button>
                                                                                                    </div>  
                                            </td>  
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No campaigns found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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
                    url: "{{ route('admin.campaign.search') }}",
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
            var campaignId = $(this).data('id');
            var button = $(this);
            var statusElement = $('#status-' + campaignId);

            // Show loading state
            button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Please wait...');

            $.ajax({
                url: '/admin/campaign/toggle-status/' + campaignId,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    let isActive = response.status === 'active';
                    let newClass = isActive ? 'btn-danger' : 'btn-success';
                    let newIcon = isActive ? '<i class="fa fa-times-circle"></i>' : '<i class="fa fa-check-circle"></i>';
                    let newTitle = isActive ? 'Inactivate campaign' : 'Activate campaign';
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