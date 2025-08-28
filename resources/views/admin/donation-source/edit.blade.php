@extends('admin.layouts.master')
@section('title', 'Edit Donation Source')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h3 class="card-title"><b>{{ __('Edit Donation Source') }}</b></h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.donation-source.update', $source->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Source Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $source->name) }}" required>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </section>
@endsection
