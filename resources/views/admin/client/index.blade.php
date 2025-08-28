@extends('admin.layouts.master')
@section('title', 'Client')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Client') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> {{ __('Home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item">{{ __('Client') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Client List') }}</h3>
                        <div class="card-tools d-flex">
                            <div class="d-inline-block mr-4">
                                <!-- You can put filters or search bar here -->
                            </div>
                            <a href="{{ route('admin.client.add') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> {{ __('Add') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-striped table-responsive table-bordered data_table">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">#</th>
                                    <th style="width: 15%;">{{ __('Image') }}</th>
                                    <th style="width: 30%;">{{ __('Name') }}</th>
                                    <th style="width: 10%;">{{ __('Order') }}</th>
                                    <th style="width: 15%;">{{ __('Status') }}</th>
                                    <th style="width: 25%;">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('assets/admin/img/client/' . $client->image) }}" alt="{{ $client->name }}" style="width: 100px;">
                                    </td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->serial_number }}</td>
                                    <td>
                                        @if ($client->status == 1)
                                            <span class="badge badge-success">{{ __('Publish') }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ __('Unpublish') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.client.edit', $client->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                                        </a>

                                        <form class="d-inline-block delete-form" action="{{ route('admin.client.delete', $client->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
</section>
@endsection
