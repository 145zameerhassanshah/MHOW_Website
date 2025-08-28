<!-- fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet">


<link rel="stylesheet" href="{{ asset('website/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/bootstrap-select/bootstrap-select.min.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/fontawesome/css/all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/icofont/icofont.min.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/jquery-ui/jquery-ui.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/jarallax/jarallax.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/nouislider/nouislider.min.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/nouislider/nouislider.pips.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/tiny-slider/tiny-slider.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/careox-icons/style.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('website/assets/vendors/owl-carousel/css/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ asset('website/assets/vendors/owl-carousel/css/owl.theme.default.min.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<!-- template styles -->
<link rel="stylesheet" href="{{ asset('website/assets/css/careox.css') }}" />
<style>
    .service-one__item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
        padding: 30px 20px;
        background-color: #fff;
        /* Optional for clarity */
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        /* Optional */
    }

    .row.gutter-y-30>[class*='col-'] {
        display: flex;
    }

    .row.gutter-y-30 {
        align-items: stretch;
    }

    .service-one__item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100%;
        padding: 30px 20px;
        background-color: #fff;
        /* Optional: for visual consistency */
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        /* Optional */
        border-radius: 10px;
        /* Optional: adds a nice touch */
        text-align: center;
    }

    /* Ensure image, title, and description are stacked properly */
    .service-one__item img {
        margin: 0 auto;
    }

    .service-one__item__title {
        margin-top: 15px;
        margin-bottom: 10px;
    }

    .stripe-card-element {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background: white;
    }

    #card-errors {
        color: #dc3545;
        margin-top: 5px;
        font-size: 14px;
    }

    .error-label {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
        display: none;
    }

    #spinner {
        margin-left: 10px;
    }
</style>
