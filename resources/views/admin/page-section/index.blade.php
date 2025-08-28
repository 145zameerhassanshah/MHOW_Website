@extends('admin.layouts.master')
@section('title', 'Page Section')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                        <h3 class="card-title mt-1"><strong>Section List</strong></h3>
                            <div class="card-tools d-flex">
                         <a class="btn btn-sm btn-primary mr-2" href="{{ route('admin.page.index') }}"><i class=""></i> All Pages</a>

                                <a href="{{ route('admin.page.section.add', $page->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> {{ __('Add Section') }}
                                </a>
                                
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped data_table table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Type</th>
                                        <th>Order No</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pageSections as $section)
                                        <tr>
                                            <td>{{ $section->id }}</td>
                                            <td>{{ $section->getTranslation('title', 'en') ?? 'N/A' }}</td>
                                            <td>{{ $section->getTranslation('subtitle', 'en') ?? 'N/A' }}</td>
                                            <td>{!! $section->getTranslation('description', 'en') ?? 'N/A' !!}</td>
                                            <td><img src="{{ asset($section->image) }}" alt="Image" width="50px"></td>
                                            <td>{{ $section->type }}</td>
                                            <td>{{ $section->order_no }}</td>
                                            <td>
                                                <a href="{{ route('admin.page.section.edit', $section->id) }}"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>

                                                <form action="{{ route('admin.page.section.delete', $section->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this section?')"><i class="fas fa-trash"></i> Delete</button>
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
        </div>
        <!-- /.row -->

    </section>
@endsection