<?php

namespace App\Http\Livewire;

use App\Models\Progress;
use Livewire\Component;

class Trackersheet extends Component
{
    public $progress;

    protected $listeners = ['taskAssigned'];

    public function taskAssigned()
    {
        $this->setProgress();
    }

    public function mount()
    {
        $this->setProgress();
    }

    public function render()
    {
        return view('livewire.trackersheet', ['grouped' => $this->progress->groupBy('date')->all()]);
    }

    private function setProgress()
    {
        $this->progress = Progress::with(['task.project.manager', 'assignedTo'])
            ->orderByDesc('date')
            ->get();
    }
}
