<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <!-- favicon-->

    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- styles-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    @livewireStyles

</head>
<body class="bg-gray-100">
    <x-jet-banner />
    @include('layouts.partials.header')
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $header }}
            </h2>
            </div>
        </header>
    @endif
    <main>
        <!-- nav -->
        @yield('content')
    </main>

    @include('layouts.partials.footer')
    @stack('modals')
    <!-- scripts -->
    @livewireScripts
</body>
</html>
