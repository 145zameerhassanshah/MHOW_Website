@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Event Schedules')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Event Schedule List') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.event_schedule.add', ['slug' => $slug]) }}"
                                class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Add Event Schedule</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Start Time') }}</th>
                                    <th>{{ __('End Time') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Order No') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($event_schedules as $key => $event)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->order_no }}</td>
                                        <td>
                                            @if ($event->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-warning">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.event_schedule.edit', $event->id) }}"
                                                class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                            <form id="deleteform" class="d-inline-block"
                                                action="{{ route('admin.event_schedule.delete', $event->id) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                    <i class="fas fa-trash"></i>
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
    </section>

@endsection
