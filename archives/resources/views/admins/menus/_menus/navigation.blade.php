<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat; filter:grayscale(20%);">
    <!-- Left navbar links -->
    <ul class="navbar-nav d-flex justify-content-center">
        <li class="nav-item">
            <a class="nav-link nav-link-heart" data-widget="pushmenu" href="#" role="button" style="font-size: 16px; color: #fff; font-family : 'Arial';"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="./dashboard" class="nav-link  nav-link-heart" style="font-size: 16px; color: #fff; font-family : 'Arial';">Home</a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link  nav-link-heart" style="font-size: 16px; color: #fff; font-family : 'Arial';">Contact</a>
        </li> --}}
    </ul>

    <!-- Right navbar links ui -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link nav-link-heart" data-widget="navbar-search" href="#" role="button" style="font-size: 16px; color: #fff; font-family : 'Arial';">
            <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
            <form class="form-inline">
                <div class="input-group input-gruop-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
            </form>
            </div>
        </li>
        <li class="nav-item">
            @if (Route::has('login'))
                @auth
                    <a class="nav-link nav-link-heart" id="profil" href="#" style="font-size: 16px; color: #fff; font-family : 'Arial';">
                        <span class="">
                            @if(Auth::user()->photo !=null)
                                <img src="{{asset(Auth::user()->le_profil)}}" alt="{{asset(Auth::user()->le_profil)}}" class="img img-circle" width="30" height="30">
                            @else
                                <img src="{{asset('/glbal/autres/images.png')}}" alt="{{asset('/glbal/autres/images.png')}}" class="img img-circle" width="30" height="30">
                            @endif
                        </span>

                    </a>
                @else
                    <a class="nav-link" id="profil" href="#" style="font-size: 16px; color: #fff; font-family : 'Arial';">
                        <span class="">
                            <img src="{{asset('/glbal/autres/images.png')}}" alt="{{asset('/glbal/autres/images.png')}}" class="img img-circle" width="30" height="30">
                        </span>
                    </a>
                @endauth
            @endif
        </li>
        <div class=" mprofil dropdown-menu dropdown-menu-right dropdown-menu-icon-list ">
            <a class="dropdown-item" href="./monprofil" style="color: var(--titre-couleur); font-family: italic;"><i class="fa fa-user msicons"></i>&ensp; Profil</a>
            <a class="dropdown-item" href="./aide" style="color: var(--titre-couleur); font-family: italic;"><i class="fa fa-lightbulb msicons"></i>&ensp;  Help</a>

            <form action="{{route('logout')}}" method="POST">
                @csrf

                <button class="dropdown-item btn" type="submit" style="color: var(--titre-couleur); font-family: italic;"><i class="fa fa-sign-out-alt msicons"></i>&ensp; Log Out</button>
            </form>
        </div>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
            <a class="nav-link nav-link-heart" data-toggle="dropdown" href="#" style="font-size: 16px; color: #fff; font-family : 'Arial';">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" style="font-size: 14px; color: #fff; font-family : 'Arial';">
                <!-- Message Start -->
                <div class="media">
                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                    <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
                </div>
                <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
            <a class="nav-link nav-link-heart" data-toggle="dropdown" href="#" style="font-size: 16px; color: #fff; font-family : 'Arial';">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" >
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-link-heart" data-widget="fullscreen" href="#" role="button" style="font-size: 16px; color: #fff; font-family : 'Arial';">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
  </nav>
