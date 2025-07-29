<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestionnaire de Tâches</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
<div class="container mx-auto">
    @yield('content')
</div>

@livewireScripts
</body>
</html>
