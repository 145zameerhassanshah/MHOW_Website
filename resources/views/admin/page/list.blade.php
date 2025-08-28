@extends('admin.layouts.master')
@section('title', 'Page list')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline mt-3">
                    <div class="card-header">
                        <h3 class="card-title mt-1"><b>{{ __('List of Pages') }}</b></h3>
                        <div class="card-tools d-flex">
                            <a href="{{ route('admin.page.add') }}" class="btn btn-primary btn-sm mx-1">
                                <i class="fas fa-plus"></i> {{ __('Add Page') }}
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tableContent">
                            <table class="table table-striped table-bordered table-sm text-center data_table">
                                <thead>
                                    <tr>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        {{-- <th>{{ __('Route') }}</th> --}}
                                        <th>{{ __('Type') }}</th>
                                        <th>{{ __('Slug') }}</th>
                                        {{-- <th>{{ __('Link For') }}</th> --}}
                                        {{-- <th>{{ __('Order No') }}</th> --}}
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @forelse ($pages as $id => $page)
                                    <tr>
                                        <td class="text-center">{{ ++$id }}</td>
                                        <td>{{ __($page->title) }}</td>
                                        {{-- <td>{{ $page->route_name ?? 'N/A' }}</td> --}}
                                        <td>{{ ucfirst(str_replace('-', ' ', $page->type)) }}</td>
                                        {{-- <td>{{ ucfirst(str_replace('-', ' ', $page->page_link_for)) }}</td> --}}
                                        <td>{{ $page->slug }}</td>
                                        {{-- <td>{{ $page->order_no }}</td> --}}
                                        <td>
                                            {{-- <div class="btn-group">
                                                <button type="button" class="btn btn-success mb-1">Action</button>
                                                <button type="button"
                                                    class="btn btn-success dropdown-toggle dropdown-hover dropdown-icon mb-1"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{ route('admin.page.section.add', $page->id) }}">Add Section</a>
                                                    <a class="dropdown-item" href="{{ route('admin.page.section.index', $page->id) }}">Section List</a>
                                                    <a class="dropdown-item" href="{{ route('admin.element.index', $page->id) }}"> Element List</a>
                                                    <a class="dropdown-item" href="{{ route('admin.block.index', $page->id) }}"> Block List</a>
                                                </div>

                                            </div> --}}
                                            <div class="d-flex justify-content-center">
                                                <!-- Edit Button -->
                                                {{-- <a href="{{ route('admin.page.edit', ['id' => $page->id]) }}" class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a> --}}
                                                <!-- Details Button -->
                                                <a href="{{ route('admin.page.detail', ['slug' => $page->slug]) }}" class="btn btn-warning btn-sm mx-1 px-2"><i class="fas fa-info"></i> Detail</a>
                                                <!-- Delete Button -->
                                                {{-- <form id="deleteform" class="d-inline-block mx-1" action="{{ route('admin.page.delete', $page->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-muted">No Pages available.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="loader text-center" id="loader" style="display: none">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
