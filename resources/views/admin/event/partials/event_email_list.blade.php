@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Event Email')
@section('content')

    @include('admin.event.top-nav')

    <section class="content">
        @include('admin.event.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Event Email Tempate List') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.event.template.add', ['slug' => $slug]) }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Subject') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($event_email_templates as $key => $template)
                                    <tr>
                                        <td>{{ ++$key }}</td>

                                        <td>{{ $template->title }}</td>
                                        <td>{{ $template->subject }}</td>
                                        <td>{{ $template->status }}</td>
                                        <td>
                                            <a href="{{ route('admin.event.template.edit', $template->id) }}"
                                                class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i>
                                            </a>
                                            
                                            <form id="deleteform" class="d-inline-block"
                                                action="{{ route('admin.event.template.delete', $template->id) }}"
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
