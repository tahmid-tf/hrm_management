<?php

namespace App\View\Components\Kanban;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RemovedTasks extends Component
{
    /**
     * Create a new component instance.
     */

    public $tasks;

    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.kanban.removed_tasks');
    }
}
