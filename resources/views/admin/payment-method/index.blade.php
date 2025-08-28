@extends('admin.layouts.master')
@section('title', 'Payment Method List')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('List of Payment Methods') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('payment.method.add') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="fas fa-plus"></i> {{ __('Add Payment Method') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm data_table">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">{{ __('#') }}</th>
                                            <th style="width: 60%;">{{ __('Name') }}</th>
                                            <th style="width: 35%;">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($methods as $method)
                                            <tr>
                                                <td class="text-center">{{ $method->id }}</td>
                                                <td>{{ $method->name }}</td>
                                                <td>
                                                    <div class="d-flex float-end">
                                                        <a href="{{ route('payment.method.edit', $method->id) }}"
                                                            class="btn btn-info btn-sm mx-4">
                                                            <i class="fas fa-pencil-alt"></i> {{ __('Edit') }}
                                                        </a>
                                                        <form id="deleteform" class="d-inline-block"
                                                            action="{{ route('payment.method.delete', $method->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                                <i class="fas fa-trash"></i> {{ __('Delete') }}
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">No Payment Method found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
