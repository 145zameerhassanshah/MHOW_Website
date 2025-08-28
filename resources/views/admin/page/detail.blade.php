@extends('admin.layouts.master')
@section('title', ucwords(str_replace('-', ' ', $slug)) . ' | Edit Page')
@section('content')

    @include('admin.page.top-nav')

    <section class="content">
        @include('admin.page.side-nav')
        <div class="row">



            <div class="col-md-12">
                {{-- content --}}
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Edit Page</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.page.update', $page->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Slug -->
                            <div class="form-group">
                                <label for="slug">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="slug" name="slug"
                                    value="{{ $page->slug }}" readonly required>
                                @if ($errors->has('slug'))
                                    <p class="text-danger"> {{ $errors->first('slug') }} </p>
                                @endif
                            </div>

                            <!-- Title -->
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $page->title }}" required>
                                @if ($errors->has('title'))
                                    <p class="text-danger"> {{ $errors->first('title') }} </p>
                                @endif
                            </div>
                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description </label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $page->description }}</textarea>
                                @if ($errors->has('description'))
                                    <p class="text-danger"> {{ $errors->first('description') }} </p>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="order_no">Order Number</label>
                                        <input type="number" class="form-control" id="order_no" name="order_no"
                                            value="{{ $page->order_no ?? 0 }}">
                                        @if ($errors->has('order_no'))
                                            <p class="text-danger"> {{ $errors->first('order_no') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select id="status" name="status" class="form-control" required>
                                            <option value="draft" {{ $page->status == 'draft' ? 'selected' : '' }}>
                                                Draft</option>
                                            <option value="published" {{ $page->status == 'published' ? 'selected' : '' }}>
                                                Published</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <p class="text-danger"> {{ $errors->first('status') }} </p>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="page_link_for">Page Link For <span class="text-danger">*</span></label>
                                        <select id="page_link_for" name="page_link_for" class="form-control" required>
                                            <option value="header"
                                                {{ $page->page_link_for == 'header' ? 'selected' : '' }}>Header
                                            </option>
                                            <option value="footer"
                                                {{ $page->page_link_for == 'footer' ? 'selected' : '' }}>Footer
                                            </option>
                                            <option value="services"
                                                {{ $page->page_link_for == 'services' ? 'selected' : '' }}>Services
                                            </option>
                                            <option value="none" {{ $page->page_link_for == 'none' ? 'selected' : '' }}>
                                                None</option>
                                        </select>
                                        @if ($errors->has('page_link_for'))
                                            <p class="text-danger"> {{ $errors->first('page_link_for') }} </p>
                                        @endif
                                    </div>
                                </div> --}}
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="route_name">Route Name</label>
                                        <input type="text" class="form-control" id="route_name" name="route_name"
                                            value="{{ $page->route_name }}">
                                        @if ($errors->has('route_name'))
                                            <p class="text-danger"> {{ $errors->first('route_name') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Category Type</label>
                                        <select id="type" name="type" class="form-control" required>
                                            <option value="website" {{ $page->type == 'website' ? 'selected' : '' }}>
                                                Website
                                            </option>
                                            <option value="marketing" {{ $page->type == 'marketing' ? 'selected' : '' }}>
                                                Marketingg
                                            </option>
                                            <option value="seo" {{ $page->type == 'seo' ? 'selected' : '' }}>SEO
                                            </option>
                                            <option value="whatsapp-Marketing"
                                                {{ $page->type == 'whatsapp-Marketing' ? 'selected' : '' }}>
                                                Whatsapp-Marketing
                                            </option>
                                        </select>
                                        @if ($errors->has('type'))
                                            <p class="text-danger"> {{ $errors->first('type') }} </p>
                                        @endif
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row">
                                <!-- Hero Image -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hero_image">Hero Image</label>
                                        <input type="file" class="form-control" id="hero_image" name="hero_image">
                                            @if ($page->hero_image)
                                                <img src="{{ asset($page->hero_image) }}" alt="Hero Image" width="100px" class="mt-2">
                                            @endif
                                        @if ($errors->has('hero_image'))
                                            <p class="text-danger">{{ $errors->first('hero_image') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if ($page->image)
                                            <img src="{{ asset($page->image) }}" alt="Image" width="100px" class="mt-2">
                                        @endif
                                        @if ($errors->has('image'))
                                            <p class="text-danger">{{ $errors->first('image') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Icon -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="icon">Icon</label>
                                        <input type="file" class="form-control" id="icon" name="icon">
                                        @if ($page->icon)
                                            <img src="{{ asset($page->icon) }}" alt="Icon" width="100px" class="mt-2">
                                        @endif
                                        @if ($errors->has('icon'))
                                            <p class="text-danger">{{ $errors->first('icon') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <!-- Hero Title -->
                            <div class="form-group">
                                <label for="hero_title_en">Hero Title </label>
                                <input type="text" class="form-control" id="hero_title" name="hero_title"
                                    value="{{ $page->hero_title }}">
                                @if ($errors->has('hero_title'))
                                    <p class="text-danger"> {{ $errors->first('hero_title') }} </p>
                                @endif
                            </div>

                            <!-- Hero Subtitle -->
                            <div class="form-group">
                                <label for="hero_sub_title">Hero Subtitle </label>
                                <input type="text" class="form-control" id="hero_sub_title" name="hero_sub_title"
                                    value="{{ $page->hero_sub_title }}">
                                @if ($errors->has('hero_sub_title'))
                                    <p class="text-danger"> {{ $errors->first('hero_sub_title.en') }} </p>
                                @endif
                            </div>

                            <!-- Hero Description -->
                            <div class="form-group">
                                <label for="hero_description">Hero Description </label>
                                <textarea class="form-control" id="hero_description" name="hero_description" rows="3">{{ $page->hero_description }}</textarea>
                                @if ($errors->has('hero_description'))
                                    <p class="text-danger"> {{ $errors->first('hero_description') }} </p>
                                @endif
                            </div>

                            <!-- SEO & Extras -->
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title"
                                    value="{{ $page->meta_title }}">
                                @if ($errors->has('meta_title'))
                                    <p class="text-danger"> {{ $errors->first('meta_title') }} </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ $page->meta_description }}</textarea>
                                @if ($errors->has('meta_description'))
                                    <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                    value="{{ $page->meta_keywords }}">
                                @if ($errors->has('meta_keywords'))
                                    <p class="text-danger"> {{ $errors->first('meta_keywords') }} </p>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Page</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
