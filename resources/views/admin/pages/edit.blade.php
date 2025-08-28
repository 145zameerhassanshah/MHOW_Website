@extends('admin.layouts.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Edit Page</h3>
                            <div class="card-tools d-flex ">

                                <div class="btn-group ms-auto" role="group" aria-label="Button Group" style="gap: 8px;">
                                    <a href="{{ route('admin.element.index', $page->id) }}"
                                        class="btn btn-sm btn-primary">Element List</a>
                                    <a href="{{ route('admin.element.add', $page->id) }}"
                                        class="btn btn-sm btn-secondary">Add Element</a>
                                    <a href="{{ route('admin.block.index', $page->id) }}"
                                        class="btn btn-sm btn-success">Block List</a>
                                    <a href="{{ route('admin.block.add', $page->id) }}" class="btn btn-sm btn-danger">Add
                                        Block</a>
                                    <a href="{{ route('admin.page.section.index', $page->id) }}"
                                        class="btn btn-sm btn-warning">Section List</a>
                                    <a href="{{ route('admin.page.section.add', $page->id) }}"
                                        class="btn btn-sm btn-info">Add Section</a>
                                </div>

                            </div>

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
                                </div>

                                <!-- Title -->
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ $page->title }}" required>
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="description">Description </label>
                                    <textarea class="form-control" id="description" name="description" rows="3">{{ $page->description }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_no">Order Number</label>
                                            <input type="number" class="form-control" id="order_no" name="order_no"
                                                value="{{ $page->order_no ?? 0 }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select id="status" name="status" class="form-control" required>
                                                <option value="draft" {{ $page->status == 'draft' ? 'selected' : '' }}>
                                                    Draft</option>
                                                <option value="published"
                                                    {{ $page->status == 'published' ? 'selected' : '' }}>Published</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="page_link_for">Page Link For <span
                                                    class="text-danger">*</span></label>
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
                                                <option value="none"
                                                    {{ $page->page_link_for == 'none' ? 'selected' : '' }}>None</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="route_name">Route Name</label>
                                            <input type="text" class="form-control" id="route_name" name="route_name"
                                                value="{{ $page->route_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Category Type</label>
                                            <select id="type" name="type" class="form-control" required>
                                                <option value="website"
                                                    {{ $page->type == 'website' ? 'selected' : '' }}> Website
                                                </option>
                                                <option value="marketing" {{ $page->type == 'marketing' ? 'selected' : '' }}>Marketingg
                                                </option>
                                                <option value="seo" {{ $page->type == 'seo' ? 'selected' : '' }}>SEO
                                                </option>
                                                <option value="whatsapp-Marketing"
                                                    {{ $page->type == 'whatsapp-Marketing' ? 'selected' : '' }}>Whatsapp-Marketing
                                                </option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <!-- Hero Image -->
                                <div class="form-group">
                                    <label for="hero_image">Hero Image</label>
                                    <input type="file" class="form-control" id="hero_image" name="hero_image">
                                    @if ($page->hero_image)
                                        <img src="{{ asset('assets/admin/img/' . $page->hero_image) }}" width="120"
                                            class="mt-2">
                                    @endif
                                    <small class="text-muted">Recommended size: 730x455 px. Formats: jpg, jpeg,
                                        png.</small>
                                </div>

                                <!-- Hero Title -->
                                <div class="form-group">
                                    <label for="hero_title">Hero Title </label>
                                    <input type="text" class="form-control" id="hero_title" name="hero_title"
                                        value="{{ $page->hero_title }}">
                                </div>

                                <!-- Hero Subtitle -->
                                <div class="form-group">
                                    <label for="hero_sub_title">Hero Subtitle </label>
                                    <input type="text" class="form-control" id="hero_sub_title" name="hero_sub_title"
                                        value="{{ $page->hero_sub_title }}">
                                </div>
                                <!-- Hero Description -->
                                <div class="form-group">
                                    <label for="hero_description">Hero Description </label>
                                    <textarea class="form-control" id="hero_description" name="hero_description" rows="3">{{ $page->hero_description }}</textarea>
                                </div>

                                <!-- SEO & Extras -->
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                        value="{{ $page->meta_title }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ $page->meta_description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                        value="{{ $page->meta_keywords }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Page</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
