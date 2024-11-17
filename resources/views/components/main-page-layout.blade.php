<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<!--
This example requires updating your template:
```
<html class="h-full bg-gray-100">
<body class="h-full">
```
-->
<div class="min-h-full">

    <x-page-header />

    Hello before main

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
            {{ $slot }}
        </div>
    </main>

    Hello after main

    <x-page-footer />
</div>



</body>
</html>