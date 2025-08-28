@extends('admin.layouts.master')
@section('title', 'Event list')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline mt-3">
                    <div class="card-header">
                        <h3 class="card-title mt-1"><b>{{ __('List of Events') }}</b></h3>
                        <div class="card-tools d-flex">
                            <a href="{{ route('admin.event.add') }}" class="btn btn-primary btn-sm mx-1">
                                <i class="fas fa-plus"></i> {{ __('Add Event') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tableContent">
                            <table class="table table-striped table-bordered table-sm text-center data_table">
                                <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Bookings') }}</th>
                                        <th>{{ __('Slug') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @forelse ($events as $id => $event)
                                    <tr>
                                        <td class="text-center">{{ ++$id }}</td>
                                        <td>{{ __($event->title) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d M, Y') }}</td>
                                        <td><a href="{{ route('admin.booking.event-wise', ['slug' => $event->slug]) }}">({{ $event->bookings->count() }})</a></td>
                                        <td>{{ $event->slug }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('admin.event.detail', ['slug' => $event->slug]) }}" class="btn btn-warning btn-sm mx-1 px-2"><i class="fas fa-info"></i> Detail</a>
                                                <a href="{{route("admin.event.booking",$event->slug)}}" class="btn btn-primary btn-sm mx-1 px-2">Booking</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-muted">No Events available.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="loader text-center" id="loader" style="display: none">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
