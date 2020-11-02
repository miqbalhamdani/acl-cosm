{{-- navabar  --}}
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu
@if(isset($configData['navbarType'])){{$configData['navbarClass']}} @endif"
data-bgcolor="@if(isset($configData['navbarBgColor'])){{$configData['navbarBgColor']}}@endif">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
          @if (request()->is('sk-layout-1-column'))
          <ul class="nav navbar-nav nav-back">
            <li class="nav-item mobile-menu d-xl-none mr-auto">
              <a class="nav-link nav-menu-main hidden-xs font-small-3 d-flex align-items-center" href="{{asset('sk-layout-2-columns')}}">
                <i class="bx bx-left-arrow-alt"></i>Back
              </a>
            </li>
          </ul>
          @else
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu d-xl-none mr-auto">
              <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                <i class="ficon bx bx-menu"></i>
              </a>
            </li>
          </ul>
          @endif
        </div>
        <ul class="nav navbar-nav float-right">
          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <span class="user-status text-muted">Available</span>
              </div>
              <span><img class="round" src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pb-0">
              <a
                class="dropdown-item"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
              >
                <i class="bx bx-power-off mr-50"></i>
                Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
