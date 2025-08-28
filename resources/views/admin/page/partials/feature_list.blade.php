@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Page Detail')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">{{ __('Features List') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.feature.add', ['slug' => $slug]) }}" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Add</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-sm table-striped table-bordered data_table">
                                <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($features as $key => $feature)
                                        <tr>
                                            <td>
                                                {{ ++$key }}
                                            </td>
                                            <td>
                                                {{ $feature->title}}
                                            </td>
                                            <td>
                                                @if ($feature->status == 'active')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.feature.edit', $feature->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i> </a>
                                                <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.feature.delete', $feature->id) }}"
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
