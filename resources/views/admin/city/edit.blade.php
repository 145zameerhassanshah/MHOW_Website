@extends('admin.layouts.master')
@section('title', 'Edit City')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">
                        <form class="form-horizontal" action="{{ route('admin.city.update', $city->id) }}" method="post">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title mt-1">{{ __('Edit City') }}</h3>
                                <div class="card-tools">
                                    <input type="submit" value="Update" class="btn btn-sm btn-primary">
                                    <input type="hidden" name="country_id" value="{{ $city->country->id }}">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pb-0">

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 control-label">{{ __('City Name') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" class="form-control form-control-sm"
                                            name="name" value="{{ old('name') ?? $city->name }}"
                                            placeholder="{{ __('Enter City Name') }}">
                                        @if ($errors->has('name'))
                                            <p class="text-danger"> {{ $errors->first('name') }} </p>
                                        @endif
                                    </div>
                                </div>



                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>


@endsection
