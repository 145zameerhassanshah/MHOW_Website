@extends('admin.layouts.master')
@section('title', 'Restore Payment')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('Restore Payment') }}</b></h3>

                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('#') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($methods  as $payment)
                                            <tr>
                                                <td class="text-center">{{ $payment->id }}</td>
                                                
                                                <td>
                                                    {{ $payment->name }}
                                                    @if ($payment->slug)
                                                        <span
                                                            class="badge bg-secondary float-right">{{ $payment->slug }}</span>
                                                    @endif
                                                </td>
                                              
                                                <td class="text-center">
                                                    {{ $payment->createdBy->name ?? '-' }}
                                                </td>
                                                <td style="white-space: nowrap; width: 1%; vertical-align: middle;">
                                                    <div class="d-flex align-items-center gap-1">
                                                        <a href="{{ route('admin.payment.method.restore', $payment->id) }}" class="btn btn-info btn-sm mx-1">
                                                            <i class="fas fa-undo"></i> {{ __('Restore') }}
                                                        </a>
                                                
                                                        <form action="{{ route('admin.payment.method.force.delete', $payment->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm mx-1">
                                                                <i class="fas fa-trash"></i> {{ __('Delete Permanently') }}
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">No Payments found.</td>
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
