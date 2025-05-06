<?php
$links = [
    [
        'name' => 'Dashboard',
        'icon' => 'fa-solid fa-chart-line',
        'url' => route('admin.dashboard'),
        'active' => request()->routeIs('admin.dashboard')
    ],
    [
        'name' => 'Familias',
        'icon' => 'fa-solid fa-boxes-stacked',
        'url' => route('admin.families.index'),
        'active' => request()->routeIs('admin.families.*')

    ],
    [
        'name' => 'Categorías',
        'icon' => 'fa-solid fa-tag',
        'url' => route('admin.categories.index'),
        'active' => request()->routeIs('admin.categories.*')

    ],
    [
        'name' => 'Subcategorías',
        'icon' => 'fa-solid fa-tags',
        'url' => route('admin.subcategories.index'),
        'active' => request()->routeIs('admin.subcategories.*')
    ],
    [
        'name' => 'Productos',
        'icon' => 'fa-solid fa-box',
        'url' => route('admin.products.index'),
        'active' => request()->routeIs('admin.products.*')
    ]

]
?>
<aside id="logo-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-[100dvh] pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
       aria-label="Sidebar"
       :class="{
            '-translate-x-full': !openSidebar,
            'transform-none': openSidebar
       }"
>
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                @foreach($links as $link)
                    <li>
                        <a href="{{$link['url']}}"
                           class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{$link['active'] ? 'bg-gray-100 ' : '' }} ">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-gray-900">
                                <i class="{{$link['icon']}}"></i>
                            </span>
                            <span class="ml-2">{{$link['name']}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>
