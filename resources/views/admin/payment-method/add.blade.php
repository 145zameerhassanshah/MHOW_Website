@extends('admin.layouts.master')
@section('title', 'Add Payment Method')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline mt-3">
                    <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('Add Payment Method') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('payment.method.index') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="bi bi-person-lines-fill"></i> {{ __('Payment Method List') }}
                                </a>
                            </div>
                        </div>
                    
                    
                    

                    <form class="form-horizontal" action="{{ route('payment.method.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{ __('Payment Method Name') }} <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control form-control-sm"
                                    value="{{ old('name') }}" placeholder="{{ __('Enter Payment Method Name') }}">
                                @if ($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('Save New Payment Method') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
