<div class="collapse navbar-collapse justify-content-end" id="navigation">
  
  {{-- <form>
    <div class="input-group no-border">
      <input type="text" value="" class="form-control" placeholder="Search...">
      <div class="input-group-append">
        <div class="input-group-text">
          <i class="nc-icon nc-zoom-split"></i>
        </div>
      </div>
    </div>
  </form> --}}

  <ul class="navbar-nav">
    <li class="nav-item btn-rotate dropdown">
      <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-ellipsis-v"></i>
        <p>
          <span class="d-lg-none d-md-block">Some Actions</span>
        </p>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </li>
  </ul>
</div>
