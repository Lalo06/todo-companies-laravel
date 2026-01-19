<?php

namespace App\Http\Requests;

use App\Rules\MaxUserAssignedTasks;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => ['required', 'exists:user,id', new MaxUserAssignedTasks(5)],
            'company_id' => 'required|exists:companies_id',
            'is_completed' => 'boolean',
        ];
    }
}
