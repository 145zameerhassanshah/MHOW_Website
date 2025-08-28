@extends('admin.layouts.master')
@section('title', 'Restore Country')
@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Restore Country') }}</h3>
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

                                    @foreach ($countries as $id => $country)
                                        <tr>
                                            <td>
                                                {{ ++$id }}
                                            </td>
                                            <td>
                                                {{ $country->name }}
                                            </td>

                                            <td>
                                                <a href="{{ route('admin.country.restore', $country->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fas fa-undo"></i>
                                                    {{ __('Restore') }}</a>


                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.country.force.delete', $country->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                                                    </button>
                                                </form>

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
