@extends('admin.layouts.master')
@section('title', 'Restore Project')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('Restore Projects') }}</b></h3>

                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($projects as $project)
                                            <tr>
                                                <td class="text-center">{{ $project->id }}</td>
                                                <td>{{ $project->name }}</td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $project->status == 'active' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($project->status) }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::parse($project->start_date)->format('d M, Y') ?? '-' }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($project->end_date)->format('d M, Y') ?? '-' }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.project.restore', $project->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fas fa-undo"></i>
                                                        {{ __('Restore') }}</a>


                                                    <form id="deleteform" class="d-inline-block"
                                                        action="{{ route('admin.project.force.delete', $project->id) }}"
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
                                                <td colspan="6" class="text-center text-muted">No projects found.</td>
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
