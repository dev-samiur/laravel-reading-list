{{-- Header --}}
<div id="kt_header" class="header {{ Metronic::printClasses('header', false) }}" {{ Metronic::printAttrs('header') }}>

    {{-- Container --}}
    <div class="container-fluid d-flex align-items-center justify-content-between">
        @if (config('layout.header.self.display'))

            @php
                $kt_logo_image = 'logo-light.png';
            @endphp

            @if (config('layout.header.self.theme') === 'light')
                @php $kt_logo_image = 'logo-dark.png' @endphp
            @elseif (config('layout.header.self.theme') === 'dark')
                @php $kt_logo_image = 'logo-light.png' @endphp
            @endif

            {{-- Header Menu --}}
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                @if(config('layout.aside.self.display') == false)
                    <div class="header-logo">
                        <a href="{{ url('/') }}">
                            <img alt="Logo" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
                        </a>
                    </div>
                @endif

                <div id="kt_header_menu" class="header-menu header-menu-mobile {{ Metronic::printClasses('header_menu', false) }}" {{ Metronic::printAttrs('header_menu') }}>
                    <ul class="menu-nav {{ Metronic::printClasses('header_menu_nav', false) }}">
                        {{-- Menu::renderHorMenu(config('menu_header.items')) --}}
                    </ul>
                </div>
            </div>

        @else
            <div><a href"/dashboard"><h1>Dashboard</h1></a></div>
        @endif

        {{-- @include('layout.partials.extras._topbar') --}}

        <div class="dropdown">

            <button style="font-size: 20px" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                {{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}}

                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                </svg>

            </button>

            <div style="margin-right: 50px; width: 150px;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item change-password" data-toggle="modal" data-target="#changePassModal" href="{{ url('/admin/changepassword') }}">Change Password</a>
                <a class="dropdown-item" href="{{ url('/logout') }}">Log Out</a>
            </div>

        </div>

    </div>

</div>

<div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="changePassModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="{{ url('/admin/changepassword') }}">
            @csrf
                <div class="modal-body">
                    <input type="password" name="password" placeholder="new password" style="height: 40px;"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
