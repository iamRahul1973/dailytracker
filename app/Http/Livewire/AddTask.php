<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class AddTask extends Component
{
    public Task $task;
    public Collection $projects;

    protected $rules = [
        'task.project_id' => 'required|integer|exists:projects,id',
        'task.name' => 'required|string|min:3|max:191',
        'task.description' => 'required|string|min:3|max:255',
        'task.estimated' => 'required|integer|min:5'
    ];

    public function mount()
    {
        $this->initTask();
    }

    public function save()
    {
        $this->validate();
        $this->task->save();
        $this->initTask();

        $this->dispatchBrowserEvent('close-add-task-modal');
        $this->dispatchBrowserEvent('toastr', ['type' => 'success', 'message' => 'Task added succesfully']);

        $this->emit('newTaskAdded');
    }

    public function render()
    {
        return view('livewire.add-task');
    }

    private function initTask()
    {
        $this->task = new Task();
    }
}
