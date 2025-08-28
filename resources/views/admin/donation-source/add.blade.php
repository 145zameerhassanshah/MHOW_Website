@extends('admin.layouts.master')
@section('title', 'Add Donation Source')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline mt-3">
                    <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('Add Donation Source') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.donation-source.index') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="bi bi-person-lines-fill"></i> {{ __('Donation Source List') }}
                                </a>
                            </div>
                        </div>
                    
                    
                    

                    <form class="form-horizontal" action="{{ route('admin.donation-source.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{ __('Donation Source Name') }} <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control form-control-sm"
                                    value="{{ old('name') }}" placeholder="{{ __('Enter Donation Source Name') }}" required>
                                @if ($errors->has('name'))
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{ __('Save New Donation Source Name') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
