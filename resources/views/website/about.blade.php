@extends('website.layouts.master')
@section('title', 'About Us')

@section('content')

    <!-- main-slider-end -->
    @include('website.partials.breadcrumb')

    {{-- introduction --}}
    @include('website.partials.our-aboutus')


    <div class="container my-5">
        <div class="row align-items-center"> <!-- This aligns content vertically -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset('assets/core/our-mission.jpg') }}" alt="careox" class="img-fluid">
            </div><!-- /.col-lg-6 -->

            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                <div class="about-three__content">
                    <div class="sec-title text-left">
                        <h3 class="sec-title__title bw-split-in-left">Our Mission</h3>
                    </div>
                    <p class="about-three__content__text">
                        At MHOW – House of Wisdom, our mission is to foster hope and bring positive change to those in need.
                        We aim to empower individuals and communities through impactful initiatives focused on education,
                        healthcare, and social support. Guided by compassion and wisdom, we strive to create a better
                        tomorrow by addressing pressing challenges and promoting equality and opportunity for all. Together,
                        we can transform lives and build a brighter, more compassionate world.
                    </p>
                </div>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container my-5">
        <div class="row align-items-center"> <!-- This aligns content vertically -->

            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                <div class="about-three__content">
                    <div class="sec-title text-left">
                        <h3 class="sec-title__title bw-split-in-left">Our Vision</h3>
                    </div>
                    <p class="about-three__content__text">
                        At MHOW – House of Wisdom, our vision is to create a world where compassion, wisdom, and opportunity
                        thrive. We aspire to build stronger, self-reliant communities by fostering kindness, equity, and
                        support for those in need. Through sustainable initiatives and collaborative efforts, we envision a
                        future where every individual has the chance to lead a dignified and fulfilling life.
                    </p>
                </div>
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset('assets/core/our-vission.jpg') }}" alt="careox" class="img-fluid">
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->


    @include('website.partials.our-core-values')

    @include('website.partials.our-countries')
    
    @include('website.partials.cta-three')

    {{-- about two --}}
@endsection
