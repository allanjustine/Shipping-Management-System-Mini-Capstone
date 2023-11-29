<nav class="navbar navbar-expand-lg static-top shadow-lg sticky-top" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/images/icon.png" alt="Ferry MGTS" height="50">
        </a>
        <a class="navbar-brand" href="#">
            <h3 class="text-white" style="font-family: sans-serif"><strong>Ferries</strong></h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/"><i class="far fa-ship"></i> Ferries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/contact-us"><i class="far fa-light fa-phone"></i> Contact
                        Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/services"><i class="far fa-gears"></i> Services</a>
                </li>
                @role('User')
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/tickets"><i class="far fa-ticket"></i> My
                                Tickets</a>
                        </li>
                    @endauth
                @endrole
                <li class="nav-item dropdown">
                    <a class="btn border rounded-pill w-100 text-white" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @auth
                            {{ auth()->user()->name }}
                        @else
                            Get in touch
                        @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @auth
                            @role('Admin')
                                <li><a class="dropdown-item text-white" href="/admin/dashboard"><i class="far fa-arrow-up"></i>
                                        Admin Page</a>
                                </li>
                            @endrole
                            <li><a class="dropdown-item text-white" href="#"><i class="far fa-user"></i>
                                    {{ auth()->user()->name }}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-white" href="/logout"><i class="far fa-right-from-bracket"></i>
                                    Logout</a>
                            </li>
                        @else
                            <li><a class="dropdown-item text-white" href="/login"><i class="far fa-right-to-bracket"></i>
                                    Login</a>
                            </li>
                            <li><a class="dropdown-item text-white" href="/register"><i class="fa fa-up-from-bracket"></i>
                                    Register</a>
                            </li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<style>
    #navbar {
        background: #fccb90;

        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    .dropdown-menu {
        background: #fccb90;

        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    .dropdown-item:hover {
        background-color: #7beafe19;
    }

    #navbarDropdown {
        filter: drop-shadow(12px 12px 7px rgba(231, 41, 248, 0.7));
    }

    .navbar-brand img {
        filter: drop-shadow(12px 12px 7px rgba(0, 0, 0, 0.7));
    }
</style>
