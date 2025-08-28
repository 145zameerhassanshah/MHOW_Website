@extends('admin.layouts.master')
@section('title', 'Edit Gallery Image')
@section('content')

<section class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline mt-2">
                <form class="form-horizontal" action="{{ route('admin.block_gallery.update', $block_galleries->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title mt-1">Edit Image</h3>
                        <div class="card-tools">
                            <input type="submit" value="Update" class="btn btn-sm btn-primary">
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">

                                <!-- Image Upload -->
                                <div class="col-md-6">
                                    <label for="image">{{ __('Image') }}</label>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="custom-file-label" for="image">{{ __('Choose New Image') }}</label>
                                            <input type="file" class="custom-file-input up-img form-control" name="image" id="image">
                                            @if ($block_galleries->image)
                                                <img class="mw-400 mb-3 show-img img-demo mt-2"
                                                    src="{{ asset($block_galleries->image) }}" alt="Current Image" width="50px">
                                            @endif
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            <!-- Order No -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="order_no">{{ __('Order No') }}</label>
                                    <input type="number" id="order_no" name="order_no" value="{{ old('order_no', $block_galleries->order_no) }}" class="form-control">
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
</div>
</section>

@endsection
