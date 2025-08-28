@php
    use Illuminate\Support\Facades\Route;
@endphp
<div class="bg-light p-2 rounded mb-3" style="overflow-x: auto; white-space: nowrap;">
    <ul class="nav nav-pills flex-row" style="min-width: max-content;">
        <li class="nav-item">
            <a href="{{ route('admin.event.detail', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.event.detail' ? 'active' : '' }}">
                Edit Event
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.event_schedule.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.event_schedule.index' || Route::currentRouteName() == 'admin.event_schedule.add' || Route::currentRouteName() == 'admin.event_schedule.edit' ? 'active' : '' }}">
                Schedules
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.event.template.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.event.template.edit' || Route::currentRouteName() == 'admin.event.template.index' || Route::currentRouteName() == 'admin.event.template.add' ? 'active' : '' }}">
                Email Template
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.event_extra_field.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.event_extra_field.index' || Route::currentRouteName() == 'admin.event_extra_field.add' || Route::currentRouteName() == 'admin.event_extra_field.edit' ? 'active' : '' }}">
                Extra Fields
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.eventticket.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.eventticket.index' || Route::currentRouteName() == 'admin.eventticket.add' || Route::currentRouteName() == 'admin.eventticket.edit' ? 'active' : '' }}">
                Event Ticket
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.event_image.index', ['slug' => $slug]) }}"
                class="nav-link {{ Route::currentRouteName() == 'admin.event_image.index' ||
                Route::currentRouteName() == 'admin.event_image.add' ||
                Route::currentRouteName() == 'admin.event_image.edit'
                    ? 'active'
                    : '' }}">
                Event Images
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
