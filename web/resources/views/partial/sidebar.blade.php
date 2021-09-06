<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="{{ url('/') }}" class="simple-text logo-mini">
            <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
            <!-- <p>CT</p> -->
        </a>
        <a href="{{ url('/') }}" class="simple-text logo-normal">
            <div class="logo-image-big">
                <img style="width: 70px" src="{{ asset('images/logo.png') }}">
                JDIH
            </div>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">

            <li class="{{ Request::is('admin/news*') ? 'active' : '' }}">
                <a href="{{ route('panel.news') }}">
                    <i class="fa fa-newspaper-o"></i>
                    <p>Berita</p>
                </a>
            </li>

            <li class="{{ Request::is('admin/perda*') ? 'active' : '' }}">
                <a href="{{ route('panel.perda') }}">
                    <i class="fa fa-book"></i>
                    <p>Peraturan Daerah</p>
                </a>
            </li>

            <li class="{{ Request::is('admin/perbup*') ? 'active' : '' }}">
                <a href="{{ route('panel.perbup') }}">
                    <i class="fa fa-black-tie"></i>
                    <p>Peraturan Bupati</p>
                </a>
            </li>

            <li class="{{ Request::is('admin/sk*') ? 'active' : '' }}">
                <a href="{{ route('panel.sk') }}">
                    <i class="fa fa-gavel"></i>
                    <p>SK Bupati</p>
                </a>
            </li>

            {{-- <li class="{{ Request::is('admin/carousel*') ? 'active' : '' }}">
                <a href="{{ route('panel.carousel') }}">
                    <i class="fa fa-picture-o"></i>
                    <p>Carousel/slider</p>
                </a>
            </li> --}}

        </ul>
    </div>
</div>
