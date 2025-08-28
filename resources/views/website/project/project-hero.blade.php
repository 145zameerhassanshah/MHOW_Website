<section class="position-relative py-5"
    @if (!empty($page?->hero_image)) style="background: url({{ asset($page->hero_image) }}) center center / cover no-repeat;" @endif>
    <!-- Black overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5); z-index: 1;">
    </div>

    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                @if (!empty($page?->hero_sub_title))
                    <h1 class="display-5 fw-bold text-white mb-4">
                        {{ $page->hero_sub_title }}
                    </h1>
                @endif

                @if (!empty($page?->hero_description))
                    <p class="lead text-white mb-5">
                        {!! $page->hero_description !!}
                    </p>
                @endif

                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('front.donate.now') }}" class="careox-btn careox-btn--base">
                        Donate Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
