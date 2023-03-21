<!-- ========== Topbar Start ========== -->
@php
    $setting = \App\Models\SiteSetting::first();
@endphp
<div class="navbar-custom topnav-navbar">
  <div class="container-fluid detached-nav">

      <!-- Sidebar Menu Toggle Button -->
      {{-- <button class="button-toggle-menu">
          <i class="mdi mdi-menu"></i>
      </button> --}}

      <!-- Horizontal Menu Toggle Button -->
      {{-- <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
          <div class="lines">
              <span></span>
              <span></span>
              <span></span>
          </div>
      </button> --}}

      <ul class="list-unstyled topbar-menu float-end mb-0">
          {{-- <li class="dropdown notification-list d-lg-none">
              <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                  <i class="ri-search-line noti-icon"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                  <form class="p-3">
                      <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                  </form>
              </div>
          </li> --}}


          <li class="notification-list d-none d-sm-inline-block">
              <a class="nav-link" href="javascript:void(0)" id="light-dark-mode">
                  <i class="ri-moon-line noti-icon"></i>
              </a>
          </li>

          <li class="notification-list d-none d-md-inline-block">
              <a class="nav-link" href="#" data-toggle="fullscreen">
                  <i class="ri-fullscreen-line noti-icon"></i>
              </a>
          </li>

          <li class="dropdown notification-list">
              <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                  aria-expanded="false">
                  <span class="account-user-avatar"> 
                    @if (Auth::user()->profile_image!=null)
                      <img src="{{asset('admin/image/'.Auth::user()->profile_image)}}" alt="user-image" class="rounded-circle">
                    @endif
                  </span>
                  <span>
                      <span class="account-user-name">{{Auth::user()->name}}</span>
                      <span class="account-position">{{Auth::user()->roles->first()->name}}</span>
                  </span>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                  <!-- item-->
                  <div class=" dropdown-header noti-title">
                      <h6 class="text-overflow m-0">Welcome !</h6>
                  </div>

                  <!-- item-->
                  <a href="{{route('profile.edit')}}" class="dropdown-item notify-item">
                      <i class="mdi mdi-account-circle me-1"></i>
                      <span>My Account</span>
                  </a>

                  <!-- item-->
                  <a href="{{route('settings.index')}}" class="dropdown-item notify-item">
                      <i class="mdi mdi-account-edit me-1"></i>
                      <span>Settings</span>
                  </a>

                  <!-- item-->
                  <a href="{{route('logout')}}" class="dropdown-item notify-item">
                      <i class="mdi mdi-logout me-1"></i>
                      <span>Logout</span>
                  </a>
              </div>
          </li>
      </ul>

      <!-- Topbar Search Form -->
      {{-- <div class="app-search dropdown">
          <form>
              <div class="input-group">
                  <input type="search" class="form-control dropdown-toggle"  placeholder="Search..." id="top-search">
                  <span class="mdi mdi-magnify search-icon"></span>
                  <button class="input-group-text btn btn-primary" type="submit">Search</button>
              </div>
          </form>

          <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
              <!-- item-->
              <div class="dropdown-header noti-title">
                  <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
              </div>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="uil-notes font-16 me-1"></i>
                  <span>Analytics Report</span>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="uil-life-ring font-16 me-1"></i>
                  <span>How can I help you?</span>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <i class="uil-cog font-16 me-1"></i>
                  <span>User profile settings</span>
              </a>

              <!-- item-->
              <div class="dropdown-header noti-title">
                  <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
              </div>

              <div class="notification-list">
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="d-flex">
                          <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                          <div class="w-100">
                              <h5 class="m-0 font-14">Erwin Brown</h5>
                              <span class="font-12 mb-0">UI Designer</span>
                          </div>
                      </div>
                  </a>

                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="d-flex">
                          <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                          <div class="w-100">
                              <h5 class="m-0 font-14">Jacob Deo</h5>
                              <span class="font-12 mb-0">Developer</span>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
      </div> --}}
  </div>
</div>
<!-- ========== Topbar End ========== -->