<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestionnaire de Tâches</title> <!-- Titre de l'onglet -->

    <!-- Inclusion du fichier CSS compilé via Laravel Mix (généralement Tailwind) -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Inclusion du fichier JavaScript compilé (généralement Alpine, Livewire, etc.) -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Inclusion des styles nécessaires à Livewire -->
    @livewireStyles

    <!-- Inclusion d'Alpine.js (JS léger pour interactions frontend) -->
    <script defer src="https://unpkg.com/alpinejs"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
<!-- Corps du site avec fond gris clair, plein écran minimum, et padding -->
<div class="container mx-auto">
    <!-- Emplacement où sera injecté le contenu des vues enfants -->
    @yield('content')
</div>

<!-- Scripts nécessaires au bon fonctionnement de Livewire -->
@livewireScripts
</body>
</html>
