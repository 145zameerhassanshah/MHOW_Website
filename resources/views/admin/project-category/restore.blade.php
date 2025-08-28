@extends('admin.layouts.master')
@section('title', 'Restore Project Category')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('Restore Project Categories') }}</b></h3>

                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('Icon') }}</th>
                                            <th>{{ __('Name/Slug') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($project_categories as $project_category)
                                            <tr>
                                                <td class="text-center">{{ $project_category->id }}</td>
                                                <td>
                                                    @if ($project_category->icon)
                                                        <img src="{{ asset($project_category->icon) }}" alt="Icon"
                                                            width="50px">
                                                    @else
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $project_category->name }}
                                                    @if ($project_category->slug)
                                                        <span
                                                            class="badge bg-secondary float-right">{{ $project_category->slug }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $project_category->status == 'active' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($project_category->status) }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    {{ $project_category->createdBy->name ?? '-' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.project-category.restore', $project_category->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fas fa-undo"></i>
                                                        {{ __('Restore') }}</a>


                                                    <form id="deleteform" class="d-inline-block"
                                                        action="{{ route('admin.project-category.force.delete', $project_category->id) }}"
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
                                                <td colspan="6" class="text-center text-muted">No project categories
                                                    found.</td>
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
