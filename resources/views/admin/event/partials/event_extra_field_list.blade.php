@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Event Extra Fields')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Event Extra Field List') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.event_extra_field.add', ['slug' => $slug]) }}"
                                class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Add Extra Field</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Field Name') }}</th>
                                    <th>{{ __('Field Type') }}</th>
                                    <th>{{ __('Required') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($extraFields as $key => $field)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $field->field_name }}</td>
                                        <td>{{ ucfirst($field->field_type) }}</td>
                                        <td>
                                            @if($field->is_required)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-secondary">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($field->status)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.event_extra_field.edit', $field->id) }}"
                                                class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
                                            <form id="deleteform" class="d-inline-block"
                                                action="{{ route('admin.event_extra_field.delete', $field->id) }}"
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
