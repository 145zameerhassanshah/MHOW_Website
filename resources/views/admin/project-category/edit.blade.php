@extends('admin.layouts.master')
@section('title', 'Edit Project Category')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <form class="form-horizontal" action="{{ route('admin.project-category.update', $project_category->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1"> <b> {{ __('Edit Project Category') }} </b> </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.project-category.index') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-person-lines-fill"></i> {{ __('Project Category List') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body py-3">

                            <div class="row">
                                <!-- Project Category Name -->
                                <div class=" col-md-6">
                                    <label for="name">{{ __('Project Category Name') }} <span class="text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control form-control-sm"
                                        name="name" value="{{ old('name', $project_category->name) }}"
                                        placeholder="{{ __('Enter Project Category Name') }}" onkeyup="generateSlug()">
                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <!-- Slug -->
                                <div class=" col-md-6">
                                    <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                    <input required type="text" id="slug" class="form-control form-control-sm"
                                        name="slug" value="{{ old('slug', $project_category->slug) }}"
                                        placeholder="{{ __('Generated Slug') }}">
                                    @if ($errors->has('slug'))
                                        <p class="text-danger">{{ $errors->first('slug') }}</p>
                                    @endif
                                </div>

                                <!-- Description -->
                                <div class=" col-md-12">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea id="description" class="sumernote form-control form-control-sm" name="description"
                                        placeholder="{{ __('Enter Project Category Description') }}">{{ old('description', $project_category->description) }}</textarea>
                                    @if ($errors->has('description'))
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>

                                <!-- Status -->
                                <div class=" col-md-6">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select id="status" name="status" class="form-control form-control-sm">
                                        <option value="active" {{ old('status', $project_category->status) == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $project_category->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    @endif
                                </div>

                                <!-- Icon -->
                                <div class="col-lg-6 m-0 mt-1">
                                    <div class=" row">
                                        <label for="icon"
                                            class="col-sm-12 control-label m-0">{{ __('Icon') }}</label>

                                        <div class="col-sm-12">
                                            <div class="custom-file">
                                                <label class="custom-file-label"
                                                    for="icon">{{ __('Choose Icon') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="icon"
                                                    id="icon">
                                            </div>
                                            <!-- Display current icon if available -->
                                            @if ($project_category->icon)
                                                <img class="mw-400 mt-1 show-img img-demo"
                                                    src="{{ asset($project_category->icon) }}" alt=""
                                                    width="100px">
                                            @else
                                                <img class="mw-400 mt-1 show-img img-demo"
                                                    src="{{ asset('assets/uploads/core/img-demo.jpg') }}" alt=""
                                                    width="100px">
                                            @endif
                                            @if ($errors->has('icon'))
                                                <p class="text-danger"> {{ $errors->first('icon') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit"
                        class="btn btn-sm mb-1 btn-primary float-right">{{ __('Update Project Category') }}</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.row -->

</section>

@endsection

@section('js')
<script>
    function generateSlug() {
        let projectCategoryName = document.getElementById('name').value;
        let slug = projectCategoryName.toLowerCase().replace(/\s+/g, '-');
        document.getElementById('slug').value = slug;
    }
</script>
@endsection
