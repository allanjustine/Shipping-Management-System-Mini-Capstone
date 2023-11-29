<nav class="main-header navbar navbar-expand navbar-light fixed-top">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="far fa-bars-sort"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item mr-3">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img style="width: 40px; height: 40px; margin-top: -10px;" class="rounded-circle border"
                    src="{{ Auth::user()->profile_image === null && Auth::user()->gender === 'Male'
                        ? url('images/profile-image.png')
                        : (Auth::user()->profile_image === null && Auth::user()->gender === 'Female'
                            ? url('images/profile-image2.png')
                            : Storage::url(Auth::user()->profile_image)) }}"
                    alt=""></i>{{ Auth::user()->name }} <i class="far fa-circle-down"></i></a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right mr-3">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0" style="text-align: left;">Welcome! {{ Auth::user()->name }}
                    </h6>
                </div>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-user mr-2"></i>
                    <span>{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-regular fa-arrow-right-from-bracket mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-light-primary elevation-4"
    style="background: #fccb90;
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);">
    <a href="/admin/dashboard" class="brand-link">
        <img src="/images/icon.png" class="brand-image img-circle elevation-0" style="opacity: .8; border-radius: 50%;">
        <span class="brand-text text-white"><strong>Ferries booking</strong></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img id="sidebar-img"
                    src="{{ Auth::user()->profile_image === null && Auth::user()->gender === 'Male'
                        ? url('images/profile-image.png')
                        : (Auth::user()->profile_image === null && Auth::user()->gender === 'Female'
                            ? url('images/profile-image2.png')
                            : Storage::url(Auth::user()->profile_image)) }}"
                    class="img-circle elevation-2" alt="User Image"
                    style="border-radius: 50%; width: 40px; height: 40px;">
            </div>
            <div class="info">
                <a href="#" class="d-block text-white">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="/admin/dashboard"
                        class="nav-link text-white {{ 'admin/dashboard' == request()->path() ? 'active2' : '' }}">
                        <i class="nav-icon fa-regular fa-gauge-max"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/users" class="nav-link text-white {{ 'admin/users' == request()->path() ? 'active2' : '' }}">
                        <i class="nav-icon fa-regular fa-users"></i>
                        <p>
                            Users
                        </p>

                        <span class="right badge badge-primary">{{ App\Models\User::count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/categories"
                        class="nav-link text-white {{ 'admin/categories' == request()->path() ? 'active2' : '' }}">
                        <i class="nav-icon fa-regular fa-grid-2"></i>
                        <p>
                            Categories
                        </p>
                        <span class="right badge badge-primary">{{ App\Models\Category::count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/ships" class="nav-link text-white {{ 'admin/ships' == request()->path() ? 'active2' : '' }}">
                        <i class="nav-icon fa-regular fa-ship"></i>
                        <p>
                            Ships
                        </p>
                        <span class="right badge badge-primary">{{ App\Models\Ship::count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/tickets"
                        class="nav-link text-white {{ 'admin/tickets' == request()->path() ? 'active2' : '' }}">
                        <i class="nav-icon fa-regular fa-ticket"></i>
                        <p>
                            Tickets
                        </p>
                        <span class="right badge badge-primary">{{ App\Models\Ticket::count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/feedbacks"
                        class="nav-link text-white {{ 'admin/feedbacks' == request()->path() ? 'active2' : '' }}">
                        <i class="nav-icon fa-regular fa-comments"></i>
                        <p>
                            Feed Backs
                        </p>
                        <span class="right badge badge-primary">{{ App\Models\Contact::count() }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/logs" class="nav-link text-white {{ 'admin/logs' == request()->path() ? 'active2' : '' }}">
                        <i class="nav-icon fa-regular fa-notebook"></i>
                        <p>
                            Logs
                        </p>
                        <span class="right badge badge-primary">{{ App\Models\Log::count() }}</span>
                    </a>
                </li>
                <li class="nav-header text-white">SETTINGS</li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link text-white">
                        <i class="nav-icon fa-regular fa-gear"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white {{ '#' == request()->path() ? 'active2' : '' }}">
                                <i class="fa-regular fa-user nav-icon"></i>
                                <p>{{ auth()->user()->name }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="fa-regular fa-right-from-bracket nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="/logout" class="btn btn-danger">Yes, Logout</a>
            </div>
        </div>
    </div>
</div>

<style>
    .brand-link img {
        filter: drop-shadow(5px 5px 7px rgba(189, 187, 187, 0.7));
    }
</style>
