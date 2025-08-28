<nav class="navbar navbar-expand navbar-light bg-white border-bottom">
    <div class="collapse navbar-collapse">
      {{ ucwords(str_replace('-', ' ', $slug)) }}
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ route('admin.event.index') }}" class="nav-link">
            <i class="fas fa-users"></i> Go back to All Events
          </a>
        </li>
        <li class="nav-item">
          <a target="_blank" href="{{ route('front.event.detail', ['slug' => $slug]) }}" class="nav-link">
            <i class="fas fa-user-plus"></i> Visit Event
          </a>
        </li>
      </ul>
    </div>
  </nav>