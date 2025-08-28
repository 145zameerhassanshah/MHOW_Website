@extends('website.layouts.master')
@section('title', 'Projects')

@section('content')

    <!-- main-slider-end -->
    <section class="page-header">
        <div class="page-header__bg">
            <img src="{{ asset('assets/core/BreadCrumb.png') }}" alt="">
        </div>
        <!-- /.page-header__bg -->
        <div class="container">
            <h2 class="page-header__title bw-split-in-left">Projects</h2>
            <ul class="careox-breadcrumb list-unstyled">
                <li><a href="{{ route('front.index') }}">Home</a></li>
                <li><span>Project</span></li>
            </ul><!-- /.thm-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->

    @include('website.partials.our-projects')



@endsection
