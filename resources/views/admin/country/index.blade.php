@extends('admin.layouts.master')
@section('title', 'List of Countries')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('List of Countries') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.country.add') }}" class="btn btn-sm btn-primary">Add New Country</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table-sm table table-striped table-bordered data_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        {{-- <th>Description</th> --}}
                                        <th>Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $id => $country)
                                        <tr>
                                            <td>{{ ++$id }}</td>
                                            <td>{{ $country->name }}</td>
                                            {{-- <td>{{ strip_tags($country->description) }}</td> --}}

                                            <td><img src="{{ asset($country->icon) }}" alt="icon"
                                                    style="width: 50px; height:50px;"></td>

                                            <td>
                                                <div class="d-flex float-end">
                                                    <a href="{{ route('admin.country.edit', $country->id) }}"
                                                        class="btn btn-info btn-sm mx-3">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>

                                                    <a href="{{ route('admin.city.add', $country->id) }}"
                                                        class="btn btn-success btn-sm mx-3">
                                                        <i class="fas fa-map"></i> Cities
                                                    </a>

                                                    <form action="{{ route('admin.country.delete', $country->id) }}"
                                                        method="POST" class="d-inline-block"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger">Delete</button>
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
    </section>

@endsection
