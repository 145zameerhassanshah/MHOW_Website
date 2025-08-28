@extends('website.layouts.master')
@section('title', 'Contact Us')

@section('content')

    <!-- main-slider-end -->
    <section class="page-header">
        <div class="page-header__bg">
            <img src="{{ asset('assets/core/BreadCrumb.png') }}" alt="">
        </div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title bw-split-in-left">Contact Us</h2>
            <ul class="careox-breadcrumb list-unstyled">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><span>Contact Us</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    <section class="contact-one contact-one--page service-two" style="background-color: #FFFFFF !important;">
        <div class="contact-one__shape" style="background-image: url(assets/images/shapes/contact-1-shape-2.png);"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="contact-one__image">
                        <div class="contact-one__image__shape"
                            style="background-image: url(assets/images/shapes/contact-1-shape-1.png);"></div>
                        <img src="{{ asset('assets/core/contact-img.jpg') }}" alt="careox">
                        <div class="contact-one__image__icon"><img src="{{ asset($setting->logo) }}" alt="mhow">
                        </div>
                        <div class="contact-one__image__info">
                            <div class="contact-one__image__info__icon"><i class="icofont-phone-circle"></i></div>
                            <p class="contact-one__image__info__title">Need Help Now?</p>
                            <p class="contact-one__image__info__text"><a
                                    href="tel:{{ $setting->phone_no }}">{{ $setting->phone_no }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <form id="contactform" class="contact-one__form contact-form-validated form-one wow fadeInUp animated"
                        data-wow-duration="1500ms" action="inc/sendemail.php" novalidate="novalidate"
                        style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInUp;">
                        <h1>Get in Touch with MHOW</h1>
                        <p class="contact-one__text">
                            Have a question or want to support our mission? Reach out — we’re here to help and always happy to connect.
                        </p>
                        <div class="form-one__group">
                            <div class="form-one__control">
                                <input type="text" name="name" placeholder="Your Name" required>
                            </div><!-- /.form-one__control -->
                            <div class="form-one__control">
                                <input type="email" name="email" placeholder="Email Address" required>
                            </div><!-- /.form-one__control -->
                            <div class="form-one__control">
                                <input type="tel" name="phone_no" placeholder="Phone No" required>
                            </div><!-- /.form-one__control -->
                            <div class="form-one__control">
                                <input type="text" name="subject" placeholder="Subject" required>
                            </div><!-- /.form-one__control -->
                            <div class="form-one__control form-one__control--full">
                                <textarea name="enquiry_message" placeholder="Write  a Message" required></textarea><!-- /# -->
                            </div><!-- /.form-one__control -->
                            <div class="form-one__control form-one__control--full">
                                <button type="submit" class="careox-btn"><span>Send Request</span></button>
                            </div><!-- /.form-one__control -->
                        </div><!-- /.form-one__group -->
                    </form>
                </div><!-- /.col-xl-7 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    @include('website.partials.footer-map')

@endsection
