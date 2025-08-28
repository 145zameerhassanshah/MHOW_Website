@extends('admin.layouts.master')
@section('title', 'Page Detail')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-tabs mt-2">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs mx-3 my-1" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white active" id="custom-tabs-testimonial-tab" data-toggle="pill"
                                    href="#custom-tabs-testimonial" role="tab" aria-controls="custom-tabs-testimonial" aria-selected="true">Testimonials</a>
                            </li>
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white" id="custom-tabs-hero-section-tab" data-toggle="pill"
                                    href="#custom-tabs-hero-section" role="tab"
                                    aria-controls="custom-tabs-hero-section" aria-selected="false">Hero Section</a>
                            </li>
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white" id="custom-tabs-intro-section-tab" data-toggle="pill"
                                    href="#custom-tabs-intro-section" role="tab"
                                    aria-controls="custom-tabs-intro-section" aria-selected="false">Intro Section</a>
                            </li>
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white" id="custom-tabs-section-title-tab" data-toggle="pill" href="#custom-tabs-section-title" role="tab" aria-controls="custom-tabs-section-title" aria-selected="false">Section Title</a>
                            </li>
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white" id="custom-tabs-feature-image-tab" data-toggle="pill"
                                    href="#custom-tabs-feature-image" role="tab"
                                    aria-controls="custom-tabs-feature-image" aria-selected="false">Feature Image</a>
                            </li>
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white" id="custom-tabs-procedure-tab" data-toggle="pill"
                                    href="#custom-tabs-procedure" role="tab"
                                    aria-controls="custom-tabs-procedure" aria-selected="false">Procedure</a>
                            </li>
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white" id="custom-tabs-cta-tab" data-toggle="pill"
                                    href="#custom-tabs-cta" role="tab"
                                    aria-controls="custom-tabs-cta" aria-selected="false">CallToAction</a>
                            </li>
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white" id="custom-tabs-faq-tab" data-toggle="pill"
                                    href="#custom-tabs-faq" role="tab"
                                    aria-controls="custom-tabs-faq" aria-selected="false">FAQs</a>
                            </li>
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white" id="custom-tabs-document-required-tab" data-toggle="pill"
                                    href="#custom-tabs-document-required" role="tab"
                                    aria-controls="custom-tabs-document-required" aria-selected="false">Document Required</a>
                            </li>
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white" id="custom-tabs-whychooseus-tab" data-toggle="pill"
                                    href="#custom-tabs-whychooseus" role="tab"
                                    aria-controls="custom-tabs-whychooseus" aria-selected="false">WhyChooseUs</a>
                            </li>
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white" id="custom-tabs-features-tab" data-toggle="pill"
                                    href="#custom-tabs-features" role="tab"
                                    aria-controls="custom-tabs-features" aria-selected="false">Features</a>
                            </li>
                            <li class="nav-item mx-1 my-1">
                                <a class="nav-link btn btn-success btn-sm text-white" id="custom-tabs-whyusimage-tab" data-toggle="pill"
                                    href="#custom-tabs-whyusimage" role="tab"
                                    aria-controls="custom-tabs-whyusimage" aria-selected="false">WhyUsImage</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-testimonial" role="tabpanel"
                                aria-labelledby="custom-tabs-testimonial-tab">
                                @include('admin.page.partials.testimonial')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-hero-section" role="tabpanel"
                                aria-labelledby="custom-tabs-hero-section-tab">
                                @include('admin.page.partials.hero-section')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-intro-section" role="tabpanel"
                                aria-labelledby="custom-tabs-intro-section-tab">
                                @include('admin.page.partials.intro-section')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-section-title" role="tabpanel"
                                aria-labelledby="custom-tabs-section-title-tab">
                                @include('admin.page.partials.section-title')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-feature-image" role="tabpanel"
                                aria-labelledby="custom-tabs-feature-image-tab">
                                @include('admin.page.partials.feature-image')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-procedure" role="tabpanel"
                                aria-labelledby="custom-tabs-procedure-tab">
                                @include('admin.page.partials.procedure')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-cta" role="tabpanel"
                                aria-labelledby="custom-tabs-cta-tab">
                                @include('admin.page.partials.call-to-action')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-faq" role="tabpanel"
                                aria-labelledby="custom-tabs-faq-tab">
                                @include('admin.page.partials.faqs')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-document-required" role="tabpanel"
                                aria-labelledby="custom-tabs-document-required-tab">
                                @include('admin.page.partials.document-required')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-whychooseus" role="tabpanel"
                                aria-labelledby="custom-tabs-whychooseus-tab">
                                @include('admin.page.partials.why-choose-us')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-features" role="tabpanel"
                                aria-labelledby="custom-tabs-features-tab">
                                @include('admin.page.partials.feature')
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-whyusimage" role="tabpanel"
                                aria-labelledby="custom-tabs-whyusimage-tab">
                                @include('admin.page.partials.why-us-image')
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
</section>
@endsection

@section('js')
@include('admin.page.partials.script')
@endsection