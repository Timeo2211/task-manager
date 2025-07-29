<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskManager extends Component
{
    public $title = '';
    public $filter = 'all';

    public function addTask()
    {
        $this->validate([
            'title' => 'required|min:2',
        ]);

        Task::create(['title' => $this->title]);

        $this->title = '';
    }

    public function toggleCompleted($taskId)
    {
        $task = Task::withTrashed()->findOrFail($taskId);
        $task->is_completed = !$task->is_completed; // ✅ Correction ici
        $task->save();
    }

    public function deleteTask($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->delete();
    }

    public function getTasksProperty()
    {
        return match ($this->filter) {
            'active' => Task::where('is_completed', false)->get(),   // ✅ Correction ici
            'completed' => Task::where('is_completed', true)->get(), // ✅ Correction ici
            'deleted' => Task::onlyTrashed()->get(),
            default => Task::all(),
        };
    }

    public function render()
    {
        return view('livewire.task-manager');
    }
}
