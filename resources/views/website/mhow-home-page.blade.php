@extends('website.layouts.master')
@section('title','Home')

@section('content')


    <h1> Why Us Images </h1>

    {{-- Project Why us Images --}}
    @include('website.project.project-why-images')
    {{-- Project Why us Images --}}













        <!-- main-slider-end -->
        @include('website.partials.slider')
        <!-- Feature Start -->
        @include('website.partials.feature')
        <!-- Feature End -->

        <!-- main-slider-2 -->
        @include('website.partials.slider2')
        <br><br><br><br>

    @include('website.partials.our-projects')

        {{-- about two --}}
        @include('website.partials.about2')
        <!-- /.about-two -->
        {{-- about three --}}
        @include('website.partials.about3')
        <!-- /.about-three -->
        {{-- about four --}}
        @include('website.partials.about4')
        <!-- /.about-four -->


        <!-- Service Start -->
        @include('website.partials.services')
        <!-- Service End -->
        {{-- service two --}}
        @include('website.partials.services2')
        <!-- /.service-two -->

        {{-- cause --}}
        @include('website.partials.cause')
        <!-- /.cause-one -->
        {{-- cause two --}}
        @include('website.partials.cause2')
        <!-- /.cause-two -->
        {{-- cause three --}}
        @include('website.partials.cause3')
        <!-- /.cause-three -->

        {{-- why Choose Us --}}
        @include('website.partials.whychooseus')
        <!-- /.why-choose-us -->



        {{-- team  --}}
        @include('website.partials.team')
        <!-- /.team-one -->
        {{-- team two --}}
        @include('website.partials.team2')
        <!-- /.team-two -->



        {{-- testimonials --}}
        @include('website.partials.testimonials')
        <!-- /.testimonial-one -->

        {{-- donations --}}
        @include('website.partials.donations')

        {{-- faq start --}}
        @include('website.partials.faqs')
        <!-- /.faq-one -->

       {{-- events --}}
        @include('website.partials.events')
       {{-- end events  --}}

    {{-- update --}}
    @include('website.partials.update')
    {{-- end update --}}

    {{-- client-carousel --}}
    @include('website.partials.client-carousel')
    <!-- /.client-carousel -->

    {{-- testimonial --}}
    @include('website.partials.testimonials2')
    <!-- /.testimonials-two -->

    {{-- testimonial three--}}
    @include('website.partials.testimonials3')
    <!-- /.testimonials-three -->

    {{-- benefits --}}
     @include('website.partials.benefits')
    <!-- /.benefits-end -->

    {{-- countries --}}
    @include('website.partials.country')
    <!-- /.countries -->



    {{-- contact --}}
    @include('website.partials.contact')
    <!-- /.contact-one -->
    {{-- cta --}}
    @include('website.partials.cta')
    <!-- /.CTA -->

    {{-- blog --}}
    @include('website.partials.blog')
    <!-- /.blog-two -->

    {{-- donate section --}}
    @include('website.partials.donate')
    {{-- donate section end --}}

    {{-- donate two --}}
    @include('website.partials.donate2')
    <!-- /.donate-two -->
    {{-- donate three --}}
    @include('website.partials.donate3')
    <!-- /.donate-three -->




    {{-- cta --}}
    @include('website.partials.cta-two')
    <!-- /.cta-two -->
    {{-- cta three --}}
    @include('website.partials.cta-three')
    <!-- /.cta-three -->


@endsection
