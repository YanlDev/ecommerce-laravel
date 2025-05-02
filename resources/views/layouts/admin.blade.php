@props(['breadcrumbs'=>[]])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/e1238f483a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased"
      x-data="{ openSidebar: false }"
      :class="{'overflow-y-hidden':openSidebar}"
>

<div class="fixed inset-0 bg-gray-900 opacity-50 z-20 sm:hidden"
     x-show="openSidebar"
     style="display: none"
     x-on:click="openSidebar = false"
>

</div>


@include('layouts.partials.admin.navigation')
@include('layouts.partials.admin.sidebar')

<div class="p-4 sm:ml-64">

    <div class="mt-14">

        <div class="flex justify-between items-center">
            @include('layouts.partials.admin.breadcrumbs')
            @isset($action)
                <div>
                    {{$action}}
                </div>
            @endisset
        </div>


        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            {{ $slot }}
        </div>

    </div>

</div>

@livewireScripts
@stack('js')

@if(session('swal'))
    <script>
        const swalConfig = @json(session('swal'));
        Swal.fire(swalConfig)
    </script>
@endif

</body>
</html>
