@extends('admin.layouts.master')
@section('title', 'Donation Sources')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title"><b>{{ __('Donation Sources') }}</b></h3>
                            <a href="{{ route('admin.donation-source.add') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> {{ __('Add New Source') }}</a>
                        </div>

                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped data_table" style="width: 100%; table-layout: auto;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th>Name</th>
                                        <th>Created By</th>
                                        <th style="white-space: nowrap; width: 15% ;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donationSources as $source)  
                                        <tr>
                                            <td>{{ $source->id }}</td>
                                            <td>{{ $source->name }}</td>
                                            <td>{{ $source->createdBy->name ?? '-' }}</td>
                                            <td style="white-space: nowrap;">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <a href="{{ route('admin.donation-source.edit', $source->id) }}" class="btn btn-info btn-sm mx-1"><i class="fas fa-pencil-alt"></i> {{ __('Edit') }}</a>
                                                    <form action="{{ route('admin.donation-source.delete', $source->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1"><i class="fas fa-trash"></i> {{ __('Delete') }}</button>
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
