<?php

use App\Livewire\Tournament\Create;
use App\Livewire\Tournament\Edit;
use App\Livewire\Tournament\Index;
use App\Livewire\Tournament\Workspace;
use App\Livewire\Tournament\Teams\Create as TeamCreate;
use App\Livewire\Tournament\Teams\Edit as TeamEdit;
use App\Livewire\Tournament\Teams\Index as TeamIndex;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::redirect('/', '/admin/tournaments');

        Route::get('/tournaments', Index::class)
            ->name('tournaments.index');

        Route::get('/tournaments/create', Create::class)
            ->name('tournaments.create');

        Route::get('/tournaments/{tournament}', Workspace::class)
            ->name('tournaments.workspace');

        Route::get('/tournaments/{tournament}/edit', Edit::class)
            ->name('tournaments.edit');

        Route::get('/tournaments/{tournament}/teams', TeamIndex::class)
            ->name('tournaments.teams.index');

        Route::get('/tournaments/{tournament}/teams/create', TeamCreate::class)
            ->name('tournaments.teams.create');

        Route::get('/tournaments/{tournament}/teams/{entry}/edit', TeamEdit::class)
            ->name('tournaments.teams.edit');

    });