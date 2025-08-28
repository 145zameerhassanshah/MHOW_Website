@extends('admin.layouts.master')
@section('title', 'ReferralSource List')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('List of ReferralSource') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.referralsource.add') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="fas fa-plus"></i> {{ __('Add ReferralSource') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">
                                <table class="table table-striped table-bordered table-sm data_table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th  style="white-space: nowrap; width: 35%; align-item:;">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($referralsource as $referral)
                                            <tr>
                                                <td class="text-center">{{ $referral->id }}</td>
                                                <td class="text-center">{{ $referral->title }}</td>

                                                <td id="status-{{ $referral->id }}" class="status-column">
                                                    <span
                                                        class="badge {{ $referral->status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                                        {!! $referral->status === 'active'
                                                            ? '<i class="fa fa-check-circle text-white"></i> Active'
                                                            : '<i class="fa fa-times-circle text-white"></i> Inactive' !!}
                                                    </span>
                                                </td>
                                                <td>  
                                                    <div class=" float-end" role="group" aria-label="referral source Actions">  
                                                        <!-- Edit Button -->  
                                                        <a href="{{ route('admin.referralsource.edit', $referral->id) }}"  
                                                           class="btn btn-info btn-sm"  
                                                           data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Referral Source">  
                                                            <i class="fas fa-pencil-alt"></i>  
                                                        </a>  
                                                
                                                        <!-- Delete Button -->  
                                                        <form action="{{ route('admin.referralsource.delete', $referral->id) }}" method="POST" class="d-inline-block">  
                                                            @csrf  
                                                            <button type="submit" class="btn btn-danger btn-sm"  
                                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Referral Source">  
                                                                <i class="fas fa-trash"></i>  
                                                            </button>  
                                                        </form>  
                                                

                                                                                                        </div>  
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

