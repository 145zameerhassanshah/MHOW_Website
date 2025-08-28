@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Event Tickets')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Event Ticket List') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.eventticket.add', ['slug' => $slug]) }}"
                                class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Add Event Ticket</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Amount') }}</th>
                                    <th>{{ __('Order No') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($event_tickets as $key => $ticket)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $ticket->title }}</td>
                                        <td>{{ $ticket->quantity }}</td>
                                        <td>{{ number_format($ticket->amount, 2) }}</td>
                                        <td>{{ $ticket->order_no }}</td>
                                        <td>
                                            <a href="{{ route('admin.eventticket.edit', $ticket->id) }}"
                                                class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                            <form id="deleteform" class="d-inline-block"
                                                action="{{ route('admin.eventticket.delete', $ticket->id) }}"
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