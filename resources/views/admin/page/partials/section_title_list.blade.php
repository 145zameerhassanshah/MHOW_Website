@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Section Titles')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1">{{ __('Section Title List') }}</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.section_title.add', ['slug' => $slug]) }}"
                                class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Section Title</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-sm table-striped table-bordered data_table">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($section_titles as $key => $section_title)
                                    <tr>
                                        <td>
                                            {{ ++$key }}
                                        </td>
                                        <td>
                                            {{ $section_title->title }}
                                        </td>
                                         <td>
                                            {{ $section_title->type }}
                                        </td>
                                        <td>
                                            @if ($section_title->status == 'active')
                                                <span class="badge bg-primary">Active</span>
                                            @else
                                                <span class="badge bg-danger">In Active</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.section_title.edit', $section_title->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>
                                            <form id="deleteform" class="d-inline-block mx-1"
                                                action="{{ route('admin.section_title.delete', $section_title->id) }}" method="post">
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
