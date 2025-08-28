@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Why Us Images')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')

        <div class="row">
            <div class="col-md-12">
                <div class="card border-top border-5 border-primary">
                    <div class="card-header">
                        <h3 class="card-title mt-1">Why Us Image List</h3>
                        <a href="{{ route('admin.why-us-image.add', ['slug' => $slug]) }}"
                            class="btn btn-sm btn-primary float-right">
                            Add New
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle text-center">
                                <thead class="table-stripped">
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($why_us_images  as $whyUsImage)
                                        <tr>
                                            <td>{{ $whyUsImage->id }}</td>
                                        <td>
                                            <img src="{{ asset($whyUsImage->image)}}" alt="Image" width="50px">
                                        </td>
                                            <td>{{ $whyUsImage->title }}</td>

                                            <td>

                                                <a href="{{ route('admin.why-us-image.edit', ['slug' => $slug, 'id' => $whyUsImage->id]) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>

                                                <form
                                                    action="{{ route('admin.why-us-image.delete', ['slug' => $slug, 'id' => $whyUsImage->id]) }}"
                                                    method="POST" class="d-inline-block"
                                                    onsubmit="return confirm('Are you sure?');">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No records found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
