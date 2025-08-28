@extends('website.layouts.master')
@section('title', $project->name)

@section('content')

    @include('website.project.project-hero')

    @include('website.project.project-section')

    @include('website.project.project-why-images')

    @include('website.project.project-element')

    @if (!empty($page->whyChooseUs))
        @include('website.project.project-why-choose-us')
    @endif

    @include('website.project.project-block')

    @include('website.project.project-feature-images')

    @include('website.project.project-donate-now')

    @include('website.partials.footer-map')

@endsection
