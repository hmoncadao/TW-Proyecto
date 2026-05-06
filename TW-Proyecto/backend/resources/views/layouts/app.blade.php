<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>

    <title>GovConnect</title>
</head>
<body>

    <x-header />

    <main class="min-h-screen ml-48 sm:ml-56 md:ml-64">
        @yield('content')
    
        <x-menu />
    </main>

    <x-footer />

</body>
</html>