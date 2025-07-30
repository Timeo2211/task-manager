@extends('layouts.app')
<!-- Cette vue étend le layout principal 'layouts.app' (définit dans layouts/app.blade.php) -->

@section('content')
    <!-- Cette section sera injectée dans @yield('content') du layout -->
    @livewire('task-manager')
    <!-- Inclusion du composant Livewire 'TaskManager' :
         il gère l'affichage, l'ajout, le filtre, la complétion et la suppression des tâches -->
@endsection
