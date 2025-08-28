@php
    use Illuminate\Support\Facades\Route;
@endphp
<div class="bg-light p-2 rounded mb-3" style="overflow-x: auto; white-space: nowrap;">
    <ul class="nav nav-pills flex-row" style="min-width: max-content;">
        <li class="nav-item">
            <a href="{{ route('admin.page.detail', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.page.detail' ? 'active' : '' }}">
                Edit Page
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.section_title.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.section_title.index' || Route::currentRouteName() == 'admin.section_title.add' || Route::currentRouteName() == 'admin.section_title.edit' ? 'active' : '' }}">
                Section Titles
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.page.section.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.page.section.index' || Route::currentRouteName() == 'admin.page.section.add' || Route::currentRouteName() == 'admin.page.section.edit' ? 'active' : '' }}">
                Sections
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.element.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.element.index' || Route::currentRouteName() == 'admin.element.add' || Route::currentRouteName() == 'admin.element.edit' ? 'active' : '' }}">
                Elements
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.block.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.block.index' || Route::currentRouteName() == 'admin.block.add' || Route::currentRouteName() == 'admin.block.edit' ? 'active' : '' }}">
                Blocks
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.introduction_section.index', ['slug' => $slug]) }}" class="nav-link {{ Route::currentRouteName() == 'admin.introduction_section.index' || Route::currentRouteName() == 'admin.introduction_section.add' || Route::currentRouteName() == 'admin.introduction_section.edit' ? 'active' : '' }}">
                Intros
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.why-us-image.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.why-us-image.index' || Route::currentRouteName() == 'admin.why-us-image.add' || Route::currentRouteName() == 'admin.why-us-image.edit' ? 'active' : '' }}">
                Why Us Images
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.call-to-action.index', ['slug' => $slug]) }}" class="nav-link {{ Route::currentRouteName() == 'admin.call-to-action.index' || Route::currentRouteName() == 'admin.call-to-action.add' || Route::currentRouteName() == 'admin.call-to-action.edit' ? 'active' : '' }}">
                Call to Actions
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.testimonial.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.testimonial.index' || Route::currentRouteName() == 'admin.testimonial.add' || Route::currentRouteName() == 'admin.testimonial.edit' ? 'active' : '' }}">
                Testimonials
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.faq.index',['slug' => $slug])}}" class="nav-link {{ Route::currentRouteName() == 'admin.faq.index' || Route::currentRouteName() == 'admin.faq.add' || Route::currentRouteName() == 'admin.faq.edit' ? 'active' : ''}}">
                FAQs
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.document-required.index', ['slug' => $slug]) }}" class="nav-link {{ Route::currentRouteName() == 'admin.document-required.index' || Route::currentRouteName() == 'admin.document-required.add' || Route::currentRouteName() == 'admin.document-required.edit' ? 'active' : '' }}">
                Document Requireds
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.hero_section.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.hero_section.index' || Route::currentRouteName() == 'admin.hero_section.add' || Route::currentRouteName() == 'admin.hero_section.edit' ? 'active' : '' }}">
                Heros
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.feature_image.index',['slug' => $slug])}}" class="nav-link {{ Route::currentRouteName() == 'admin.feature_image.index' || Route::currentRouteName() == 'admin.feature_image.add' || Route::currentRouteName() == 'admin.feature_image.edit' ? 'active' : ''}}">
                Feature Images
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.procedures.index', ['slug' => $slug]) }}" class="nav-link {{ Route::currentRouteName() == 'admin.procedures.index' || Route::currentRouteName() == 'admin.procedures.add' || Route::currentRouteName() == 'admin.procedures.edit' ? 'active' : '' }}">
                Procedures
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.why-choose-us.index',['slug' => $slug])}}" class="nav-link {{ Route::currentRouteName() == 'admin.why-choose-us.index' || Route::currentRouteName() == 'admin.why-choose-us.add' || Route::currentRouteName() == 'admin.why-choose-us.edit' ? 'active' : ''}}">
                Why Choose Us'
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.feature.index', ['slug' => $slug]) }}" class="nav-link {{ Route::currentRouteName() == 'admin.feature.index' || Route::currentRouteName() == 'admin.feature.add' || Route::currentRouteName() == 'admin.feature.edit' ? 'active' : '' }}">
                Features
            </a>
        </li>
    </ul>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const activeLink = document.querySelector('.nav-link.active');
        if (activeLink) {
            activeLink.scrollIntoView({
                behavior: 'smooth',
                inline: 'start'
            });
        }
    });
</script>
