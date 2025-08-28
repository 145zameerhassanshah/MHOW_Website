@extends('admin.layouts.master')

@section('content')
    {{-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Donation Forms') }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('donation-forms.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> {{ __('Add New') }}
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Subtitle') }}</th>
                                        <th>{{ __('Order') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($donationForms as $key => $form)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @if($form->image)
                                            <img src="{{ asset('storage/'.$form->image) }}" alt="{{ $form->title }}"
                                                width="50">
                                            @else
                                            <img src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="Default"
                                                width="50">
                                            @endif
                                        </td>
                                        <td>{{ $form->title }}</td>
                                        <td>{{ $form->sub_title ?? '-' }}</td>
                                        <td>{{ $form->order_no ?? '0' }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('donation-forms.edit', $form->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('donation-forms.destroy', $form->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $donationForms->links() }}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section> --}}




    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><b>{{ __('List of Projects') }}</b></h3>
                            <div class="card-tools d-flex">
                                <a href="{{ route('donation-forms.create') }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="fas fa-plus"></i> {{ __('Add Project') }}
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tableContent">



                                <div class="table table-striped table-bordered table-sm ">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Image') }}</th>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Subtitle') }}</th>
                                                <th>{{ __('Order') }}</th>
                                                <th>{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($donationForms as $key => $form)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        @if($form->image)
                                                             <img src="{{ asset($form->image) }}" alt="{{ $form->title }}"
                                                width="50">
                                                        @else
                                                            <img src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt="Default"
                                                                width="50">
                                                        @endif
                                                    </td>

                                                    <td>{{ $form->title }}</td>
                                                    <td>{{ $form->sub_title ?? '-' }}</td>
                                                    <td>{{ $form->order_no ?? '0' }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('donation-forms.edit', $form->id) }}"
                                                                class="btn btn-sm btn-info">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            


                                                            <form action="{{ route('donation-forms.destroy', $form->id) }}" method="POST" class="d-inline-block">  
                                                            @csrf  
                                                             @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"  
                                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete project">  
                                                                <i class="fas fa-trash"></i>  
                                                            </button>  
                                                        </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')

@endsection