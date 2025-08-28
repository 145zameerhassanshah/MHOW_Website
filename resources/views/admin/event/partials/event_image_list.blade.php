@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Event Images')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">

            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Event Image List') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.event_image.add', ['slug' => $slug]) }}"
                                class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Add Event Image</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Order No') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event_images as $key => $image)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <img src="{{ asset($image->image) }}" alt="{{ $image->title }}" style="max-width: 100px;">
                                        </td>
                                        <td>{{ $image->title }}</td>
                                        <td>{{ $image->order_no }}</td>
                                        <td>
                                            <span class="badge badge-{{ $image->status ? 'success' : 'danger' }}">
                                                {{ $image->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.event_image.edit', $image->id) }}"
                                                class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                            <form id="deleteform" class="d-inline-block"
                                                action="{{ route('admin.event_image.delete', $image->id) }}"
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