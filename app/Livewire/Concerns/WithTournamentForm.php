<?php

namespace App\Livewire\Concerns;

trait WithTournamentForm
{
    protected function rules(): array
    {
        return [
            'form.game_id' => ['required', 'exists:games,id'],
            'form.point_system_template_id' => ['required', 'exists:point_system_templates,id'],
            'form.name' => ['required', 'string', 'max:255'],
            'form.description' => ['nullable', 'string'],
            'form.registration_start' => ['nullable', 'date'],
            'form.registration_end' => ['nullable', 'date', 'after_or_equal:form.registration_start'],
            'form.start_date' => ['nullable', 'date'],
            'form.end_date' => ['nullable', 'date', 'after_or_equal:form.start_date'],
            'form.is_public' => ['boolean'],
        ];
    }
}