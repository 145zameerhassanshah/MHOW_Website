@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Document Required')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Document Required Edit') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('admin.document-required.update', $document->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="title" name="title" value="{{ $document->title }}">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                    <input required type="text" class="form-control" id="description" name="description" value="{{ $document->description }}">
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mt-3">
    
                                <div class="col-md-4">
                                    <label for="update_status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select required class="form-control" id="update_status" name="status">
                                        <option value="active" {{ $document->status == 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                        <option value="inactive" {{ $document->status == 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
    
                                <div class="col-md-4">
                                    <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="order_no" name="order_no" value="{{ $document->order_no }}">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Icon Upload -->
                                <div class="col-md-4">
                                    <label for="icon">{{ __('Icon') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label"
                                                for="icon">{{ __('Choose New Icon') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control"
                                                name="icon" id="icon">
                                                @if ($document->icon)
                                                    <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                        src="{{ asset('assets/admin/uploads/document/' . $document->icon) }}" alt="Current Image"
                                                        width="50px">
                                                @else
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="" width="50px">
                                                @endif
                                            @error('icon')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            <div class="row">

                                <div class="col-12 mt-2">
                                    <button class="btn btn-primary btn-sm float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
