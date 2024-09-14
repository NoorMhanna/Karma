<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/"><img src=" {{ asset('front/img/logo.png') }} "
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item {{ request()->routeIs('category') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('category') }}">Category</a></li>

                        @guest
                            <li class="nav-item">
                                <a href="{{ route('signin') }}" class="btn btn-sm btn-success"> Singin</a>
                            </li>
                        @endguest

                        @isAdmin
                            <li class="nav-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"><a
                                    class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        @endisAdmin


                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="{{ route('cart.index') }}" class="cart"><span
                                    class="ti-bag"></span></a>
                        </li>
                    </ul>


                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            @auth
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="btrn btn-danger btn-sm"> Logout </button>
                                </form>
                            @endauth
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
