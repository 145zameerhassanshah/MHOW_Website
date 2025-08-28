@extends('admin.layouts.master')
@section('title', 'Edit Campaign')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form class="form-horizontal" action="{{ route('admin.campaign.update', $campaign->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>Edit Campaign</b></h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.campaign.index') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-list"></i> Campaign List
                                </a>
                            </div>
                        </div>

                        <div class="card-body py-3">
                            <div class="row">

                                <!-- Project -->
                                <div class="col-md-6">
                                    <label for="project_id">Project <span class="text-danger">*</span></label>
                                    <select id="project_id" name="project_id" class="form-control form-control-sm">
                                        <option value="">Select Project</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}" {{ old('project_id', $campaign->project_id) == $project->id ? 'selected' : '' }}>
                                                {{ $project->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('project_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select id="status" name="status" class="form-control form-control-sm">
                                        <option value="active" {{ old('status', $campaign->status) == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $campaign->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Title -->
                                <div class="col-md-6">
                                    <label for="title">Campaign Title <span class="text-danger">*</span></label>
                                    <input type="text" id="title" name="title" class="form-control form-control-sm" value="{{ old('title', $campaign->title) }}" placeholder="Enter Campaign Title">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Slug -->
                                <div class="col-md-6">
                                    <label for="slug">Slug <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" name="slug" class="form-control form-control-sm" value="{{ old('slug', $campaign->slug) }}" placeholder="Generated Slug">
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Start Date -->
                                <div class="col-md-6">
                                    <label for="start_date">Start Date <span class="text-danger">*</span></label>
                                    <input type="date" id="start_date" name="start_date" class="form-control form-control-sm" value="{{ old('start_date', $campaign->start_date) }}">
                                    @error('start_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- End Date -->
                                <div class="col-md-6">
                                    <label for="end_date">End Date <span class="text-danger">*</span></label>
                                    <input type="date" id="end_date" name="end_date" class="form-control form-control-sm" value="{{ old('end_date', $campaign->end_date) }}">
                                    @error('end_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Goal Amount -->
                                <div class="col-md-6">
                                    <label for="goal_amount">Goal Amount</label>
                                    <input type="number" id="goal_amount" name="goal_amount" class="form-control form-control-sm" value="{{ old('goal_amount', $campaign->goal_amount) }}" placeholder="Enter Goal Amount">
                                    @error('goal_amount')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Raised Amount -->
                                <div class="col-md-6">
                                    <label for="raised_amount">Raised Amount</label>
                                    <input type="number" id="raised_amount" name="raised_amount" class="form-control form-control-sm" value="{{ old('raised_amount', $campaign->raised_amount) }}" placeholder="Enter Raised Amount">
                                    @error('raised_amount')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="summernote form-control form-control-sm" placeholder="Enter Description">{{ old('description', $campaign->description) }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Icon -->
                                <div class="col-lg-12 mt-2">
                                    <div class="row">
                                        <label for="icon" class="col-sm-12 control-label m-0">Icon</label>
                                        <div class="col-sm-12">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="icon">Choose Icon</label>
                                                <input type="file" class="custom-file-input up-img" name="icon" id="icon">
                                            </div>
                                            <img class="mw-400 mt-1 show-img img-demo" src="{{ asset($campaign->icon) }}" alt="" width="100px">
                                            @error('icon')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- /.row -->
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-sm mb-1 btn-primary float-right">Update Campaign</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    // Auto generate slug from title
    document.getElementById('title').addEventListener('input', function () {
        const slug = this.value.toLowerCase().replace(/\s+/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection
