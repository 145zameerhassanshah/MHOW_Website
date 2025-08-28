@extends('admin.layouts.master')
@section('title', 'Booking List')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('List of Bookings') }}</b></h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-sm data_table">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">{{ __('#') }}</th>
                                            <th style="width: 15%;">{{ __('Event') }}</th>
                                            <th style="width: 15%;">{{ __('Name') }}</th>
                                            <th style="width: 12%;">{{ __('Phone No') }}</th>
                                            <th style="width: 8%;">{{ __('Type') }}</th>
                                            
                                            
                                            @foreach($extraFields as $field)
                                                <th style="width: 10%;">{{ $field->field_label }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bookings as $booking)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $booking->event->title }}</td>
                                                <td>{{ $booking->name }}</td>
                                                <td>{{ $booking->phone_no }}</td>
                                                <td>
                                                    @if ($booking->event_type == 'free')
                                                        <span class="badge badge-success">Free</span>
                                                    @else
                                                        <span class="badge badge-info">Paid</span>
                                                    @endif
                                                </td>
                                                
                                                
                                                @foreach($extraFields as $field)
                                                    <td>
                                                        @php
                                                            $fieldValue = $booking->bookingFieldValues
                                                                ->where('event_extra_field_id', $field->id)
                                                                ->first();
                                                        @endphp
                                                        {{ $fieldValue->value ?? '-' }}
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="{{ 6 + count($extraFields) }}" class="text-center text-muted">
                                                    No bookings found.
                                                </td>
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