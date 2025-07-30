<div class="max-w-xl mx-auto mt-10" x-data="{ filter: @entangle('filter') }">
    <!-- Conteneur principal centré avec Alpine.js :
         x-data initialise un état local Alpine contenant le filtre lié à Livewire (@entangle) -->

    <!-- Formulaire d'ajout d'une nouvelle tâche -->
    <form wire:submit.prevent="addTask" class="flex mb-4">
        <!-- Champ de saisie lié à la propriété Livewire 'title' (avec .defer pour éviter un update immédiat) -->
        <input wire:model.defer="title" type="text" class="flex-grow px-4 py-2 border rounded-l" placeholder="Nouvelle tâche...">

        <!-- Bouton pour soumettre le formulaire -->
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r">Ajouter</button>
    </form>

    <!-- Filtres pour trier les tâches : toutes, actives, terminées ou supprimées -->
    <div class="flex justify-center space-x-2 mb-4">
        <!-- Chaque bouton modifie le filtre avec Alpine.js.
             La classe 'font-bold underline' est appliquée si le filtre actif correspond -->
        <button @click="filter = 'all'" :class="{ 'font-bold underline': filter === 'all' }">Toutes</button>
        <button @click="filter = 'active'" :class="{ 'font-bold underline': filter === 'active' }">Actives</button>
        <button @click="filter = 'completed'" :class="{ 'font-bold underline': filter === 'completed' }">Terminées</button>
        <button @click="filter = 'deleted'" :class="{ 'font-bold underline': filter === 'deleted' }">Supprimées</button>
    </div>

    <!-- Liste des tâches filtrées -->
    <ul>
        <!-- Boucle sur chaque tâche retournée par la propriété Livewire $this->tasks -->
        @foreach ($this->tasks as $task)
            <li class="flex justify-between items-center mb-2 px-4 py-2 border rounded {{ $task->is_completed ? 'bg-gray-100 text-gray-500' : '' }}">
                <!-- Style différent si la tâche est complétée : fond gris clair, texte grisé -->

                <div class="flex items-center space-x-2">
                    <!-- Checkbox pour marquer comme complétée ou non (clic déclenche toggleCompleted) -->
                    <input type="checkbox" wire:click="toggleCompleted({{ $task->id }})" {{ $task->is_completed ? 'checked' : '' }}>

                    <!-- Affichage du titre de la tâche, barré si complétée -->
                    <span class="{{ $task->is_completed ? 'line-through' : '' }}">{{ $task->title }}</span>
                </div>

                <!-- Bouton de suppression affiché uniquement si la tâche n’est pas supprimée -->
                @if (is_null($task->deleted_at))
                    <button wire:click="deleteTask({{ $task->id }})" class="text-red-500 hover:underline">Supprimer</button>
                @endif
            </li>
        @endforeach
    </ul>
</div>
