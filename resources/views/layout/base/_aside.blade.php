{{-- Aside --}}

@php
    $kt_logo_image = 'logo-light.png';

    $categories= App\Http\Controllers\BookController::indexCategory();
    $sub_menu_categories= array();

    $publishedYears= App\Http\Controllers\BookController::indexPublishedYear();
    $sub_menu_publishedyear= array();

    foreach($categories as $arr)
    {
        array_push($sub_menu_categories, array( 'title' => $arr->category, 'page' => '/dashboard/book/category/'.strtolower($arr->category), 'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg') ); 
    }

    foreach($publishedYears as $arr)
    {
        array_push($sub_menu_publishedyear, array( 'title' => $arr->publishedYear, 'page' => '/dashboard/book/publishedyear/'.strtolower($arr->publishedYear), 'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg') ); 
    }

@endphp

@if (config('layout.brand.self.theme') === 'light')
    @php $kt_logo_image = 'logo-dark.png' @endphp
@elseif (config('layout.brand.self.theme') === 'dark')
    @php $kt_logo_image = 'logo-light.png' @endphp
@endif

<div class="aside aside-left {{ Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto" id="kt_aside">

    {{-- Brand --}}
    <div style="height: 200px;" class="brand flex-column-auto {{ Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo">
            <a href="{{ url('/') }}">
                <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
            </a>
        </div>

        @if (config('layout.aside.self.minimize.toggle'))
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                {{ Metronic::getSVG("media/svg/icons/Navigation/Angle-double-left.svg", "svg-icon-xl") }}
            </button>
        @endif

    </div>

    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        @if (config('layout.aside.self.display') === false)
            <div styel="height: 200px" class="header-logo">
                <a href="{{ url('/') }}">
                    <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
                </a>
            </div>
        @endif

        <div
            id="kt_aside_menu"
            class="aside-menu my-4 {{ Metronic::printClasses('aside_menu', false) }}"
            data-menu-vertical="1"
            {{ Metronic::printAttrs('aside_menu') }}>

            <ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
                {{ Menu::renderVerMenu( [ ['title' => 'Dashboard','root' => true,'icon' => 'media/svg/icons/Design/Layers.svg','page' => '/dashboard'],['title' => 'Create', 'icon' => 'media/svg/icons/Design/Layers.svg','page' => '/book/create'],['title' => 'Admin','bullet' => 'line','icon' => 'media/svg/icons/Design/Layers.svg', 'submenu' => [
                [
                    'title' => 'All Admins',
                    'page' => '/admins',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                ],
                [
                    'title' => 'Add an Admin',
                    'page' => '/admin/register',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                ],
            ]], [
             'section' => '',
        ], [
            'title' => 'Filter By',
            'bullet' => 'line',
            'icon' => 'media/svg/icons/Design/Layers.svg',
            'submenu' => [
                [
                    'title' => 'All',
                    'page' => '/dashboard',
                    'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
                
                ],
                [
                    'title' => 'Category',
                    'submenu' => $sub_menu_categories
                
                ],
                [
                    'title' => 'Published year',
                    'submenu' => $sub_menu_publishedyear
                ],
            ],

        ]] ) }}
            </ul>
        </div>
    </div>

</div>
