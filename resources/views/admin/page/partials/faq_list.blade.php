@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | FAQs')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('FAQs') }}</h3>
                        <div class="card-tools d-flex">
                            <a href="{{ route('admin.faq.add', ['slug' => $slug]) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> {{ __('Add FAQ') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Question') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $id => $faq)
                                    <tr>
                                        <td>{{ $id + 1 }}</td>
                                        <td>{{ $faq->question }}</td>
                                        <td>
                                            <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form id="deleteform" class="d-inline-block"
                                                action="{{ route('admin.faq.delete', $faq->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
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
