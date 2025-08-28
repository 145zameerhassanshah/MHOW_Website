{{-- admin/page/layout.blade.php --}}
<div class="mb-3">
    <nav class="navbar navbar-expand navbar-light bg-white border-bottom">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-users"></i> Go back to All Pages
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-plus"></i> Visit Page
                </a>
            </li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-md-3">
        <aside class="sidebar bg-light p-3 rounded">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-pen"></i> Edit Page
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-tag"></i> Roles
                    </a>
                </li>
            </ul>
        </aside>
    </div>

    <div class="col-md-9">
        @yield('page-content')
    </div>
</div>
