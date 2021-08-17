<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light sticky-top"> <!--navbar-white navbar-light-->
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      {{-- <li class="nav-item">
        <a class="nav-link text-white" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
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
      </li> --}}

      <!-- Zoom -->
      {{-- <li class="nav-item">
        <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> --}}

      {{-- image --}}
      <li class="dropdown ml-2 mt-1 mr-3">
        <li class="nav-item">
          @if (Session::has('admin'))
            <a class="nav-link" href="/adminlogout">Logout({{Session::get('admin')['name']}})</a>  
          @else
            <a class="nav-link" href="/loginIndex">Login</a>
          @endif
        </li>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->