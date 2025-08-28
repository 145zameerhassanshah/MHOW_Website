@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Page Detail')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">
            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Feature Add') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form class="form-horizontal" action="{{ route('admin.feature.store', ['slug' => $slug]) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">


                                
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title">
                                    <span class="text-danger error" id="error_title"></span>

                                </div>
                                 <div class="col-md-6">
                                    <label for="subtitle">{{ __('SubTitle') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle">
                                    <span class="text-danger error" id="error_subtitle"></span>
                                </div>



                            </div>

                           
                                
                            

                            <div class="row">
                                
                                <div class="col-md-12">
                                    <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="description" name="description">
                                    <span class="text-danger error" id="error_description"></span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <label for="status">{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active">{{ __('Active') }}</option>
                                        <option value="inactive">{{ __('Inactive') }}</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="order_no">{{ __('Order No') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="order_no" name="order_no">
                                    <span class="text-danger error" id="error_order_no"></span>
                                </div>

                                <div class="col-md-4">
                                    <label for="icon">{{ __('Icon') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="icon" name="icon">
                                    <span class="text-danger error" id="error_icon"></span>
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
