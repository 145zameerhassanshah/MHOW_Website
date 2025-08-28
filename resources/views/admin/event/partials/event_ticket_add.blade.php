@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Add Event Ticket')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Add Event Ticket') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form class="form-horizontal" action="{{ route('admin.eventticket.store', ['slug' => $slug]) }}"
                            method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="order_no">{{ __('Order No') }}</label>
                                    <input type="number" class="form-control" id="order_no" name="order_no" value="{{ old('order_no') ?? 1 }}">
                                    @error('order_no')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="quantity">{{ __('Quantity') }} <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="amount">{{ __('Amount') }} <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" required>
                                    @error('amount')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-3">
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