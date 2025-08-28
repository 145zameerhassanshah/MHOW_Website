@extends('admin.layouts.master')
@section('title', 'Add City')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">
                        <form class="form-horizontal" action="{{ route('admin.city.store') }}" method="post">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title mt-1">{{ __('Add City') }}</h3>
                                <div class="card-tools">
                                    <input type="submit" value="Store" class="btn btn-sm btn-primary">
                                    <input type="hidden" name="country_id" value="{{ $country->id }}">
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pb-0">

                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 control-label">{{ __('City Name') }}<span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" id="name" class="form-control form-control-sm"
                                            name="name" value="{{ old('name') }}"
                                            placeholder="{{ __('Enter City Name') }}" required>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('List of Cities') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table-sm table table-striped table-bordered data_table">
                                <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Action') }}</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($cities as $id => $city)
                                        <tr>
                                            <td>
                                                {{ ++$id }}
                                            </td>
                                            <td>
                                                {{ $city->name }}
                                            </td>



                                            <td>
                                                <div class="float-end"> 
                                                <a href="{{ route('admin.city.edit', $city->id) }}"
                                                    class="btn btn-info btn-sm"><i
                                                        class="fas fa-pencil-alt"></i>{{ __('Edit') }}</a>

                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.city.delete', $city->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </section>


@endsection
