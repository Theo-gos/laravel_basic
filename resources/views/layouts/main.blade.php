<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>To Do List</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        .to-do-list.striped>div:nth-child(even) {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity));
        }
    </style>

    @vite('resources/css/app.css')
</head>


<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">
        @include('layouts.navbar')

        @if (isset($msg))
        {{ $msg }}
        @endif

        @if (isset($header))
        <header class="text-left border-b-2 border-black px-2 mb-6 mx-3 md:mx-6 flex justify-between">
            {{ $header }}
        </header>
        @endif

        <!-- Page Content -->
        <main role="main" class="mt-16 mb-16 mx-3 md:mx-6">
            {{ $slot }}
        </main>
    </div>
</body>