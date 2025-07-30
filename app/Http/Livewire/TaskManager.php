<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskManager extends Component
{
    // Propriété publique pour le titre de la tâche saisie par l'utilisateur
    public $title = '';

    // Propriété pour filtrer les tâches : 'all', 'active', 'completed', 'deleted'
    public $filter = 'all';

    /**
     * Méthode pour ajouter une nouvelle tâche
     */
    public function addTask()
    {
        // Validation : le titre est requis et doit faire au moins 2 caractères
        $this->validate([
            'title' => 'required|min:2',
        ]);

        // Création d'une nouvelle tâche en base de données
        Task::create(['title' => $this->title]);

        // Réinitialisation du champ de saisie
        $this->title = '';
    }

    /**
     * Méthode pour inverser l'état de complétion d'une tâche
     *
     * @param int $taskId L'identifiant de la tâche
     */
    public function toggleCompleted($taskId)
    {
        // On récupère la tâche (même si supprimée) via son ID
        $task = Task::withTrashed()->findOrFail($taskId);

        // On inverse la valeur du champ is_completed
        $task->is_completed = !$task->is_completed;

        // On sauvegarde la modification
        $task->save();
    }

    /**
     * Méthode pour supprimer (soft delete) une tâche
     *
     * @param int $taskId L'identifiant de la tâche
     */
    public function deleteTask($taskId)
    {
        // On récupère la tâche et on la supprime (soft delete)
        $task = Task::findOrFail($taskId);
        $task->delete();
    }

    /**
     * Propriété calculée pour récupérer les tâches selon le filtre sélectionné
     *
     * @return \Illuminate\Support\Collection
     */
    public function getTasksProperty()
    {
        // Utilise une expression match pour retourner les tâches filtrées
        return match ($this->filter) {
            'active' => Task::where('is_completed', false)->get(),    // Tâches non complétées
            'completed' => Task::where('is_completed', true)->get(),  // Tâches complétées
            'deleted' => Task::onlyTrashed()->get(),                  // Tâches supprimées (soft deletes)
            default => Task::all(),                                   // Toutes les tâches
        };
    }

    /**
     * Méthode de rendu du composant
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        // Retourne la vue associée au composant Livewire
        return view('livewire.task-manager');
    }
}
