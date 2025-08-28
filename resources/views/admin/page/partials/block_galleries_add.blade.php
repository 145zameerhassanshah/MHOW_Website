@extends('admin.layouts.master')
@section('title', 'Manage Block Galleries')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-2">
                        <form class="form-horizontal" action="{{ route('admin.block_gallery.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title mt-1">Add Gallery (Block: {{ $block->title }}) (Page: {{ ucfirst(str_replace('-', ' ', $slug)) }})</h3>
                                <div class="card-tools">
                                    <input type="submit" value="Store" class="btn btn-sm btn-primary">
                                </div>
                            </div>

                            <div class="card-body pb-0">
                                <div class="row">

                                    <input type="hidden" name="block_id" value="{{ $block->id }}" required>


                                    <!-- Image -->
                                    <div class="col-md-6">
                                        <label for="image">Image <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="custom-file-label" for="image">Choose New Image</label>
                                                <input type="file" class="custom-file-input up-img form-control"
                                                    name="image" id="image" required>
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset('assets/admin/img/img-demo.jpg') }}" alt=""
                                                    width="50px">
                                                @error('image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Order No -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="order_no">Order No <span class="text-danger">*</span></label>
                                            <input type="number" id="order_no" name="order_no"
                                                value="{{ old('order_no') ?? 1 }}" class="form-control" required>
                                            @error('order_no')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- /.row -->
                            </div> <!-- /.card-body -->
                        </form>
                    </div>
                </div>
            </div>
            {{-- List --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline mt-2">
                        <div class="card-header">
                            <h3 class="card-title mt-1">Gallery Images</h3>
                        </div>
                        <div class="card-body">
                            <table class="table-sm table table-striped table-bordered data_table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Order No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($block_galleries as $index => $gallery)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>
                                                @if ($gallery->image)
                                                    <img src="{{ asset($gallery->image) }}" width="50" alt="">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $gallery->order_no }}</td>
                                            <td>
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.block_gallery.edit', $gallery->id) }}"
                                                    class="btn btn-sm btn-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form id="deleteform" class="d-inline-block mx-1"
                                                action="{{ route('admin.block_gallery.delete', $gallery->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" id="delete">
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

        </div>
    </section>

@endsection
