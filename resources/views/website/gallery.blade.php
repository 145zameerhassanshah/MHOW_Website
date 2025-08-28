@extends('website.layouts.master')
@section('title', 'Gallery')

@section('content')

    <section class="page-header">
        <div class="page-header__bg">
            <img src="{{ asset('assets/core/volunte') }}" alt="">
        </div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title bw-split-in-left">Gallery</h2>
            <ul class="careox-breadcrumb list-unstyled">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><span>Gallery</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->



    {{-- <section class="service-two">
        <div class="service-two__shape" style="background-image: url(assets/images/shapes/service-shape-3.png);"></div>
        <div class="container">
            <div class="row">
                @foreach ($galleries as $gallery)
                    <div class="col-md-6 col-lg-3">
                        <div class="gallery-one__card">
                            <img src="{{ asset('assets/front/img/gallery/' . $gallery->image) }}" alt="">
                            <div class="gallery-one__card__hover">
                                <a href="{{ asset('assets/front/img/gallery/' . $gallery->image) }}" class="img-popup">
                                    <span class="gallery-one__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-one__card__hover -->
                        </div><!-- /.gallery-one__card -->
                    </div><!-- /.col-md-6 col-lg-4 -->
                @endforeach
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section> --}}

    <section class="gallery-one service-two">
        <div class="container-fluid">
            <div class="row masonry-layout" style="position: relative; height: 1073.28px;">
                @foreach ($galleries as $gallery)
                    <div class="col-md-6 col-lg-3" style="position: absolute; left: 0px; top: 0px;">
                        <div class="gallery-one__card">
                            <img src="{{ asset('assets/front/img/gallery/' . $gallery->image) }}" alt="">
                            <div class="gallery-one__card__hover">
                                <a href="{{ asset('assets/front/img/gallery/' . $gallery->image) }}" class="img-popup">
                                    <span class="gallery-one__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-one__card__hover -->
                        </div><!-- /.gallery-one__card -->
                    </div><!-- /.col-md-6 col-lg-4 -->
                @endforeach
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


@endsection
