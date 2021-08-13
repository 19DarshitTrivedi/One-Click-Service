<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary"> <!--elevation-4-->
    <!-- Brand Logo -->
    <div class="bg-dark">  <!--style="background-color: #333333;"-->
    <a href="/" class="brand-link text-center text-white">
      <span class="font-weight-dark">One Click</span>
    </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar-color">
      <!-- Sidebar user panel (optional) -->
      {{--<div class="user-panel mt-2 pb-2 ml-2 d-flex">
        <a href="#" class="nav-item nav-link items" id="a-text-color">
          <i class="nav-icon fas fa-home mr-3"></i>
            Dashboard
        </a>
         <div class="image">
          <img src={{asset("dist/img/user2-160x160.jpg")}} class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ASJL Software</a>
        </div> 
      </div> --}}

      <!-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="/" class="nav-link items @if(\Request::is('dashboard')) active @endif" id="a-text-color">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li> --}}

          {{-- @if(in_array('View Student List',\Session::get('permissions'))) --}}
          <li class="nav-item">
            <a href="{{route('service.list')}}#" class="nav-link items @if(\Request::is('student*')) active @endif" id="a-text-color">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Services
              </p>
            </a>
          </li>
          {{-- @endif --}}


          {{-- @if(in_array('View Coach List',\Session::get('permissions')))   --}}
          <li class="nav-item">
            <a href="{{route('admin.order')}}" class="nav-link items id" id="a-text-color">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p>
                Orders
              </p>
            </a>
          </li>
          {{-- @endif --}}

           {{-- @if(in_array('View Location List',\Session::get('permissions'))) --}}
          <li class="nav-item">
            <a href="{{route('admin.provider')}}" class="nav-link items id" id="a-text-color">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Service Provider
              </p>
            </a>
          </li>
          {{-- @endif --}}

          {{-- @if(in_array('View Location List',\Session::get('permissions'))) --}}
          <li class="nav-item">
            <a href="{{route('admin.users')}}" class="nav-link items id" id="a-text-color">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          {{-- @endif --}}
          
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Coaches
                <i class="fas fa-angle-left right"></i> 
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <!--<i class="far fa-circle nav-icon"></i>-->
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <p>Boxed</p>
                </a>
              </li>
            </ul>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>