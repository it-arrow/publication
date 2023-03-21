  @php
      $setting = \App\Models\SiteSetting::first();
  @endphp
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      @if (!empty($setting->logo))
        <img src="{{asset('admin/image/'.$setting->logo)}}" alt="{{$setting->title}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      @endif
      @if (!empty($setting->title))
        <span class="brand-text font-weight-light">{{$setting->title}}</span>
      @endif
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" id="myInput">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="myUL">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
           
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link {{ Route::is('social','settings.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Frontend Settings
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('social')}}" class="nav-link {{ Route::is('social') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('settings.index')}}" class="nav-link {{ Route::is('settings.index') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Settings</p>
                </a>
              </li>
             
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link {{ Route::is('users.index','users.create','users.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link {{Route::is('users.index') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('users.create')}}" class="nav-link {{Route::is('users.create') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- @can('role-create')
          <li class="nav-item">
            <a href="#" class="nav-link @if(request()->is('roles'))  active @elseif(request()->is('permissions')) active @endif">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Roles & Permissions
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link {{request()->is('roles') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              @can('role-create')
              <li class="nav-item">
                <a href="{{route('permissions.index')}}" class="nav-link {{request()->is('permissions') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permissions</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
          @endcan --}}
          
          <li class="nav-item">
            <a href="{{route('sliders.index')}}" class="nav-link {{ Route::is('sliders.index','sliders.create','sliders.edit') ? 'active' : '' }}">
              {{-- <i class="nav-icon fa-solid fa-images"></i> --}}
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Sliders
                {{-- <i class="fas fa-angle-right right"></i> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('banners.index')}}" class="nav-link {{ Route::is('banners.index','banners.create','banners.edit') ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Parallax
                {{-- <i class="fas fa-angle-right right"></i> --}}
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{route('steps.index')}}" class="nav-link {{ Route::is('steps.index','steps.create','steps.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Steps
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{Route::is('categories.index','categories.create','categories.edit') ? 'active' : (Route::is('blogs.index','blogs.create','blogs.edit','blogs.show') ? 'active' : '')}}">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Articles
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link {{ Route::is('categories.index','categories.create','categories.edit') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('blogs.index')}}" class="nav-link {{ Route::is('blogs.index','blogs.create','blogs.edit','blogs.show') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Articles</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{route('opportunity.index')}}" class="nav-link {{ Route::is('opportunity.index','opportunity.show') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Career
              </p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="{{route('about.index')}}" class="nav-link {{ Route::is('about.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                About
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('teams.index')}}" class="nav-link {{ Route::is('teams.index','teams.create','teams.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Teams
                {{-- <i class="fas fa-angle-right right"></i> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('client.index')}}" class="nav-link {{ Route::is('client.index','client.create','client.edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Clients
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('why-us.index')}}" class="nav-link {{ Route::is('why-us.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Why Choose Us
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('services.index')}}" class="nav-link {{ Route::is('services.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Services
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="{{route('photo.index')}}" class="nav-link {{ Route::is('photo.index','photo.create') ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
                {{-- <i class="fas fa-angle-right right"></i> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('pages.index')}}" class="nav-link {{ Route::is('pages.index','pages.create','pages.edit','pages.show') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Custom Pages
                {{-- <i class="fas fa-angle-right right"></i> --}}
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>