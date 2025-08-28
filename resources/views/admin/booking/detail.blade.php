@extends('admin.layouts.master')
@section('title', 'Booking Detail')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                @csrf
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1"> <b> {{ __('Booking Detail') }} </b> </h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.booking.index') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-person-lines-fill"></i> {{ __('Booking List') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body py-3">

                            <div class="form-group row">
                                <label class="control-label">Event</label>
                                <input type="text" class="form-control" value="{{ $booking->event->title }}" disabled>
                            </div>

                            <div class="form-group row">
                                <label class="control-label">Name</label>
                                <input type="text" class="form-control" value="{{ $booking->name }}" disabled>
                            </div>

                            <div class="form-group row">
                                <label class="control-label">Email</label>
                                <input type="text" class="form-control" value="{{ $booking->email }}" disabled>
                            </div>

                            <div class="form-group row">
                                <label class="control-label">Phone No</label>
                                <input type="text" class="form-control" value="{{ $booking->phone_no }}" disabled>
                            </div>

                            <div class="form-group row">
                                <label class="control-label">Gender</label>
                                <input type="text" class="form-control" value="{{ $booking->gender }}" disabled>
                            </div>

                            @foreach ($booking->bookingFieldValues as $extra_field)
                                <div class="form-group row">
                                    <label class="control-label">{{ $extra_field->eventExtraField->field_label }}</label>
                                    <input type="text" class="form-control" value="{{ $extra_field->value }}" disabled>
                                </div>
                            @endforeach

                            <div class="form-group row">
                                <label class="control-label">Event Type</label>
                                <input type="text" class="form-control" value="{{ $booking->event_type }}" disabled>
                            </div>

                            @if ($booking->event_type == 'paid')
                                <div class="form-group row">
                                    <label class="control-label">Ticket Title</label>
                                    <input type="text" class="form-control" value="{{ $booking->ticket_title }}"
                                        disabled>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label">Ticket Quantity</label>
                                    <input type="text" class="form-control" value="{{ $booking->ticket_quantity }}"
                                        disabled>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label">Email</label>
                                    <input type="text" class="form-control" value="{{ $booking->email }}" disabled>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label">Transaction Date</label>
                                    <input type="text" class="form-control" value="{{ $booking->transaction_date }}"
                                        disabled>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label">Transaction ID</label>
                                    <input type="text" class="form-control" value="{{ $booking->transaction_id }}"
                                        disabled>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label">Payment Method</label>
                                    <input type="text" class="form-control" value="{{ $booking->payment_method }}"
                                        disabled>
                                </div>
                            @endif

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>



            </div>
        </div>
        <!-- /.row -->

    </section>

@endsection
