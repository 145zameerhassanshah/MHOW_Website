@extends('admin.layouts.master')
@section('title', 'Add Department')
@section('content')



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="form-horizontal" action="{{ route('admin.department.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline mt-2">
                            <div class="card-header">
                                <h3 class="card-title mt-1"> <b> {{ __('Add Department') }} </b> </h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.department.index') }}" class="btn btn-primary btn-sm">
                                        <i class="bi bi-person-lines-fill"></i> {{ __('Department List') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body py-3">

                                <div class="row">


                                    <!-- Department Name -->
                                    <div class=" col-md-6">
                                        <label for="name">{{ __('Department Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control form-control-sm"
                                            name="name" value="{{ old('name') }}"
                                            placeholder="{{ __('Enter Department Name') }}"
                                            onkeyup="generateSlug()" required>
                                        @if ($errors->has('name'))
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    <!-- Slug -->
                                    <div class=" col-md-6">
                                        <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="slug" class="form-control form-control-sm"
                                            name="slug" required value="{{ old('slug') }}"
                                            placeholder="{{ __('Generated Slug') }}">
                                        @if ($errors->has('slug'))
                                            <p class="text-danger">{{ $errors->first('slug') }}</p>
                                        @endif
                                    </div>

                                    <!-- Description -->
                                    <div class=" col-md-12 mt-3">
                                        <label for="description">{{ __('Description') }}</label>
                                        <textarea id="description" class=" summernote form-control form-control-sm" name="description"
                                            placeholder="{{ __('Enter Department Description') }}">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <p class="text-danger">{{ $errors->first('description') }}</p>
                                        @endif
                                    </div>
                                    <!-- Status -->
                                    <div class=" col-md-6">
                                        <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                        <select id="status" name="status" class="form-control form-control-sm">
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <p class="text-danger">{{ $errors->first('status') }}</p>
                                        @endif
                                    </div>
                                    
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
                                                <img class="mw-400 mt-1 show-img img-demo"
                                                    src="{{ asset('assets/uploads/core/img-demo.jpg') }}" alt=""
                                                    width="100px">
                                                @if ($errors->has('icon'))
                                                    <p class="text-danger"> {{ $errors->first('icon') }} </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <button type="submit"
                                        class="btn btn-sm mb-1 btn-primary float-right">{{ __('Save New Department') }}</button>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
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
        let departmentName = document.getElementById('name').value;
        let slug = departmentName.toLowerCase().replace(/\s+/g, '-');
        document.getElementById('slug').value = slug;
    }
</script>

@endsection