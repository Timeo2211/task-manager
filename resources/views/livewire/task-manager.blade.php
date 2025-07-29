<div class="max-w-xl mx-auto mt-10" x-data="{ filter: @entangle('filter') }">
    <!-- Formulaire d'ajout -->
    <form wire:submit.prevent="addTask" class="flex mb-4">
        <input wire:model.defer="title" type="text" class="flex-grow px-4 py-2 border rounded-l" placeholder="Nouvelle tâche...">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-r">Ajouter</button>
    </form>

    <!-- Filtres -->
    <div class="flex justify-center space-x-2 mb-4">
        <button @click="filter = 'all'" :class="{ 'font-bold underline': filter === 'all' }">Toutes</button>
        <button @click="filter = 'active'" :class="{ 'font-bold underline': filter === 'active' }">Actives</button>
        <button @click="filter = 'completed'" :class="{ 'font-bold underline': filter === 'completed' }">Terminées</button>
        <button @click="filter = 'deleted'" :class="{ 'font-bold underline': filter === 'deleted' }">Supprimées</button>
    </div>

    <!-- Liste des tâches -->
    <ul>
        @foreach ($this->tasks as $task)
            <li class="flex justify-between items-center mb-2 px-4 py-2 border rounded {{ $task->is_completed ? 'bg-gray-100 text-gray-500' : '' }}">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" wire:click="toggleCompleted({{ $task->id }})" {{ $task->is_completed ? 'checked' : '' }}>
                    <span class="{{ $task->is_completed ? 'line-through' : '' }}">{{ $task->title }}</span>
                </div>
                @if (is_null($task->deleted_at))
                    <button wire:click="deleteTask({{ $task->id }})" class="text-red-500 hover:underline">Supprimer</button>
                @endif
            </li>
        @endforeach
    </ul>
</div>
