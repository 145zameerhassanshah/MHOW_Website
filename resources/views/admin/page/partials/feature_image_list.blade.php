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
                    <div class="card-header ">
                        <h3 class="card-title mt-1">{{ __('Feature Items List') }}</h3>
                       
                            <a href="{{ route('admin.feature_image.add', ['slug' => $slug]) }}" class="btn btn-sm btn-primary float-right ">
                            <i class="bi bi-plus-lg"></i> {{ __('Add') }}
                        </a>
                   
                        
                    </div>

                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{('Image') }}</th>
                                    <th>{{('Title') }}</th>
                                    <th>{{ ('SubTitle') }}</th>
                                    <th>{{ ('Status') }}</th>
                                    <th>{{('Order No') }}</th>
                                    <th>{{('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feature_image as $key => $feature)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($feature->image )}}" alt="Image" width="50px">
                                        </td>

                                        <td>{{ $feature->title}}</td>
                                        <td>{{ $feature->subtitle }}</td>
                                       
                                        <td>
                                            <span class="badge {{ $feature->status == 'active' ? 'badge-success' : 'badge-secondary' }}">
                                                {{ ucfirst($feature->status) }}
                                            </span>
                                        </td>
                                        <td>{{ $feature->order_no }}</td>
                                        
                                        <td>
                                            <a href="{{ route('admin.feature_image.edit', $feature->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form class="d-inline-block" action="{{ route('admin.feature_image.delete', $feature->id) }}" method="post" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">
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
