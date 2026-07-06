<?php

namespace App\Services;

use App\Models\Tournament;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TournamentService
{
    public function getAll()
    {
        return Tournament::query()
            ->with('game')
            ->latest()
            ->paginate(10);
    }

    public function create(array $data): Tournament
    {
        return DB::transaction(function () use ($data) {
            $data['slug'] = Str::slug($data['name']);

            return Tournament::create($data);
        });
    }

    public function update(Tournament $tournament, array $data): Tournament
    {
        return DB::transaction(function () use ($tournament, $data) {
            if (isset($data['name'])) {
                $data['slug'] = Str::slug($data['name']);
            }

            $tournament->update($data);

            return $tournament->fresh();
        });
    }

    public function delete(Tournament $tournament): void
    {
        $tournament->delete();
    }
}