@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Testimonials')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">

            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Testimonials List') }}</h3>
                        <a href="{{ route('admin.testimonial.add', ['slug' => $slug]) }}"
                            class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> {{ __('Add New Testimonial') }}</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('Id') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Image') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $id => $testimonial)
                                    <tr>
                                        <td>{{ ++$id }}</td>
                                        <td>{{ $testimonial->name }}</td> {{-- Removed getTranslation --}}
                                    <td><img src="{{ asset($testimonial->image) }}" width="50px" alt="image"></td>
                                        <td>
                                            <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <form id="deleteform" class="d-inline-block mx-1"
                                                action="{{ route('admin.testimonial.destroy', $testimonial->id) }}" method="post">
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
    </section>

@endsection
