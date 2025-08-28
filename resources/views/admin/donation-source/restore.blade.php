@extends('admin.layouts.master')
@section('title', 'Trash - Donation Sources')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('Trashed Donation Sources') }}</b></h3>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th>{{ __('Deleted At') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sources as $source)
                                            <tr>
                                                <td class="text-center">{{ $source->id }}</td>
                                                <td >{{ $source->name }}</td>
                                                <td >{{ $source->createdBy->name ?? '-' }}</td>
                                                <td class="text-center">{{ $source->deleted_at }}</td>
                                                <td style="white-space: nowrap; width: 1%; vertical-align: middle;">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <a href="{{ route('admin.donation-source.restore', $source->id) }}"
                                                           class="btn btn-info btn-sm mx-1">
                                                            <i class="fas fa-undo"></i> Restore
                                                        </a>
                                                
                                                        <form class="d-inline-block"
                                                              action="{{ route('admin.donation-source.force.delete', $source->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm mx-1">
                                                                <i class="fas fa-trash"></i> Delete Permanently
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">No Trashed Donation Sources</td>
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
