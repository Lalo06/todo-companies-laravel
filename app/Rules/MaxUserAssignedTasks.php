<?php

namespace App\Rules;

use Closure;
use App\Models\Task;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxUserAssignedTasks implements ValidationRule
{

    protected $maxTask;

    public function __construct($maxTask = 5)
    {
        $this->maxTask = $maxTask;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pendingTask = Task::where('user_id', $value)
            ->where('is_completed', false)
            ->count();

        if ($pendingTask >= $this->maxTask) {
            $fail("EL usuario no puede tener mas de {$this->maxTask} tareas pendientes.");
        }
    }
}
