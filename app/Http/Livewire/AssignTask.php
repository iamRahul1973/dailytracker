<?php

namespace App\Http\Livewire;

use App\Models\Progress;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use Auth;

class AssignTask extends Component
{
    public $projectList;
    public $taskList = null;
    public $developerList;
    public $project;
    public $task;
    public $date;
    public $developer;
    public $note;

    protected $rules = [
        'project' => 'required|integer|exists:projects,id',
        'task' => 'required|integer|exists:tasks,id',
        'date' => 'required|date',
        'developer' => 'required|integer|exists:users,id',
        'note' => 'nullable|string|min:3|max:255'
    ];

    protected $listeners = ['newTaskAdded'];

    public function mount()
    {
        $this->projectList = $this->getProjects();
        $this->setDateToToday();
    }

    public function newTaskAdded()
    {
        $this->reset(['project', 'task', 'taskList']);
    }

    public function updatedProject()
    {
        $this->taskList = Task::where('project_id', $this->project)->get();

        $this->developerList = User::role('employee')
            ->whereRelation('projectsPartOf', 'project_id', $this->project)
            ->get();
    }

    public function save()
    {
        $validated = $this->validate();

        Progress::create([
            'task_id' => $validated['task'],
            'date' => $this->date,
            'employee' => $validated['developer'],
            'remarks' => $validated['note']
        ]);

        $this->resetExcept(['projectList', 'taskList', 'developerList']);
        $this->setDateToToday();

        $this->dispatchBrowserEvent('close-assign-task-modal');
        $this->dispatchBrowserEvent('toastr', ['type' => 'success', 'message' => 'Data saved successfully']);

        $this->emit('taskAssigned');
    }

    public function render()
    {
        return view('livewire.assign-task');
    }

    private function setDateToToday()
    {
        $this->date = now()->format('Y-m-d');
    }

    private function getProjects()
    {
        if (Auth::user()->hasRole('project manager')) {
            return Project::where('manager_id', auth()->user()->id)->get();
        }

        return Project::all();
    }
}
