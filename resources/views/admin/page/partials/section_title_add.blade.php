@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Section Title')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Section Title Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.section_title.store', ['slug' => $slug]) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title"
                                        name="title" value="{{ old('title') }}" required>
                                    @if ($errors->has('title'))
                                        <p class="text-danger"> {{ $errors->first('title') }} </p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="subtitle">{{ __('SubTitle') }} </label>
                                    <input type="text" class="form-control" id="subtitle"
                                        name="subtitle" value="{{ old('subtitle') }}">
                                    @if ($errors->has('subtitle'))
                                        <p class="text-danger"> {{ $errors->first('subtitle') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label for="description">{{ __('Description') }} </label>
                                    <input type="text" class="form-control" id="description"
                                        name="description" value="{{ old('description') }}">
                                    @if ($errors->has('description'))
                                        <p class="text-danger"> {{ $errors->first('description') }} </p>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="status">{{ __('Status') }} <span
                                            class="text-danger">*</span></label>
                                    <select required class="form-control" id="status" name="status">
                                        <option value="active">{{ __('Active') }}</option>
                                        <option value="inactive">{{ __('Inactive') }}</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <p class="text-danger"> {{ $errors->first('status') }} </p>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="type" class="control-label">{{ __('Type') }}<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control" name="type" id="type"required>
                                        <option value="">Select Type</option>
                                        @foreach ($section_types as $type)
                                            <option value="{{ $type }}">
                                                {{ ucfirst(str_replace('_', ' ', $type)) }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('type'))
                                        <p class="text-danger"> {{ $errors->first('type') }} </p>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-sm btn-primary mt-2 float-right">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection