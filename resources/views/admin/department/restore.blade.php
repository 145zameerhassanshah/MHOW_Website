@extends('admin.layouts.master')
@section('title', 'Restore Department')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('Restore Department') }}</b></h3>

                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">{{ __('#') }}</th>
                                            <th style="width: 10%;">{{ __('Icon') }}</th>
                                            <th style="width: 25%;">{{ __('Name') }}</th>
                                            <th style="width: 18%;">{{ __('Slug') }}</th>
                                            <th style="width: 15%;">{{ __('Status') }}</th>
                                            <th style="white-space: nowrap; width: 27%;">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($departments as $department)
                                            <tr>
                                                <td class="text-center">{{ $department->id }}</td>
                                                <td>
                                                    @if ($department->icon)
                                                        <img src="{{ asset($department->icon) }}"
                                                            alt="{{ $department->name }}-icon"
                                                            style="width: 50px; height:50px;">
                                                    @else
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $department->name }}
                                                </td>
                                                <td>
                                                    {{ $department->slug ?? '' }}
                                                </td>
                                                <td class="text-center">
                                                    @if ($department->status == 'active')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-danger">In-Active</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.department.restore', $department->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fas fa-undo"></i>
                                                        {{ __('Restore') }}</a>


                                                    <form id="deleteform" class="d-inline-block"
                                                        action="{{ route('admin.department.force.delete', $department->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                            <i class="fas fa-trash"></i>{{ __('Delete') }}
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted">No departments found.</td>
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
