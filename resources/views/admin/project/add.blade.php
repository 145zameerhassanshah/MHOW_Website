@extends('admin.layouts.master')
@section('title', 'Add Project')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="form-horizontal" action="{{ route('admin.project.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline mt-2">
                            <div class="card-header">
                                <h3 class="card-title mt-1"> <b> {{ __('Add Project') }} </b> </h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.project.index') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-person-lines-fill"></i> {{ __('Project List') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body py-3">

                                <div class="row">

                                    <!-- Department -->
                                    <div class="col-md-6">
                                        <label for="department_id">{{ __('Department') }} <span
                                                class="text-danger">*</span></label>
                                        <select id="department_id" name="department_id"
                                            class="form-control form-control-sm">
                                            <option value="">Select Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                    {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                    {{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('department_id'))
                                            <p class="text-danger">{{ $errors->first('department_id') }}</p>
                                        @endif
                                    </div>

                                    <!-- Project Category -->
                                    <div class="col-md-6">
                                        <label for="project_category_id">{{ __('Project Category') }} <span
                                                class="text-danger">*</span></label>
                                        <select id="project_category_id" name="project_category_id"
                                            class="form-control form-control-sm">
                                            <option value="">Select Project Category</option>
                                            @foreach ($project_categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('project_category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('project_category_id'))
                                            <p class="text-danger">{{ $errors->first('project_category_id') }}</p>
                                        @endif
                                    </div>
                                    <!-- Project Name -->
                                    <div class="col-md-6">
                                        <label for="name">{{ __('Project Name') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control form-control-sm"
                                            name="name" value="{{ old('name') }}"
                                            placeholder="{{ __('Enter Project Name') }}" onkeyup="generateSlug()">
                                        @if ($errors->has('name'))
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    <!-- Slug -->
                                    <div class="col-md-6">
                                        <label for="slug">{{ __('Slug') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="slug" class="form-control form-control-sm"
                                            name="slug" required value="{{ old('slug') }}"
                                            placeholder="{{ __('Generated Slug') }}">
                                        @if ($errors->has('slug'))
                                            <p class="text-danger">{{ $errors->first('slug') }}</p>
                                        @endif
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-12">
                                        <label for="description">{{ __('Description') }}</label>
                                        <textarea id="description" class="summernote form-control form-control-sm" name="description"
                                            placeholder="{{ __('Enter Project Description') }}">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <p class="text-danger">{{ $errors->first('description') }}</p>
                                        @endif
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <label for="status">{{ __('Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select id="status" name="status" class="form-control form-control-sm">
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <p class="text-danger">{{ $errors->first('status') }}</p>
                                        @endif
                                    </div>

                                    <!-- Target Amount -->
                                    <div class="col-md-6">
                                        <label for="target_amount">{{ __('Target Amount') }}</label>
                                        <input type="number" id="target_amount" class="form-control form-control-sm"
                                            name="target_amount" value="{{ old('target_amount') }}"
                                            placeholder="{{ __('Enter Target Amount') }}">
                                        @if ($errors->has('target_amount'))
                                            <p class="text-danger">{{ $errors->first('target_amount') }}</p>
                                        @endif
                                    </div>

                                    <!-- Start Date -->
                                    <div class="col-md-6">
                                        <label for="project_start_date">{{ __('Start Date') }}</label>
                                        <input type="date" id="project_start_date" class="form-control form-control-sm"
                                            name="start_date" value="{{ old('start_date') }}">
                                        @if ($errors->has('start_date'))
                                            <p class="text-danger">{{ $errors->first('start_date') }}</p>
                                        @endif
                                    </div>

                                    <!-- End Date -->
                                    <div class="col-md-6">
                                        <label for="end_date">{{ __('End Date') }}</label>
                                        <input type="date" id="end_date" class="form-control form-control-sm"
                                            name="end_date" value="{{ old('end_date') }}">
                                        @if ($errors->has('end_date'))
                                            <p class="text-danger">{{ $errors->first('end_date') }}</p>
                                        @endif
                                    </div>
                                    
                                    <!-- Donation Form -->
                                    <div class="col-md-6">
                                        <label for="donation_form_id">{{ __('Donation Form') }} <span
                                                class="text-danger">*</span></label>
                                        <select id="donation_form_id" name="donation_form_id"
                                            class="form-control form-control-sm">
                                            <option value="">Select Donation Form</option>
                                            @foreach ($donation_forms as $donation_form)
                                                <option value="{{ $donation_form->id }}"
                                                    {{ old('donation_form_id') == $donation_form->id ? 'selected' : '' }}>
                                                    {{ $donation_form->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('donation_form_id'))
                                            <p class="text-danger">{{ $errors->first('donation_form_id') }}</p>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="icon">{{ __('Icon') }} <span
                                                class="text-danger">*</span></label>
                                        <input required type="text" class="form-control form-control-sm" id="icon"
                                            name="icon" value="{{ old('icon') }}">
                                        @error('icon')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Image -->
                                    <div class="col-lg-12 m-0 mt-1">
                                        <label for="image"
                                            class="col-sm-12 control-label m-0">{{ __('Image') }}</label>

                                        <div class="col-sm-12">
                                            <div class="custom-file">
                                                <label class="custom-file-label"
                                                    for="image">{{ __('Choose Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="image"
                                                    id="image">
                                            </div>
                                            <img class="mw-400 mt-1 show-img img-demo"
                                                src="{{ asset('assets/uploads/core/img-demo.jpg') }}" alt=""
                                                width="100px">
                                            @if ($errors->has('image'))
                                                <p class="text-danger"> {{ $errors->first('image') }} </p>
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
                    class="btn btn-sm mb-1 btn-primary float-right">{{ __('Save New Project') }}</button>
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
            let projectName = document.getElementById('name').value;
            let slug = projectName.toLowerCase().replace(/\s+/g, '-');
            document.getElementById('slug').value = slug;
        }
    </script>

@endsection
