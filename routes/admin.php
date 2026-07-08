<?php

use App\Livewire\Tournament\Create;
use App\Livewire\Tournament\Edit;
use App\Livewire\Tournament\Index;
use App\Livewire\Tournament\Workspace;
use App\Livewire\Tournament\Teams\Create as TeamCreate;
use App\Livewire\Tournament\Teams\Edit as TeamEdit;
use App\Livewire\Tournament\Teams\Index as TeamIndex;
use Illuminate\Support\Facades\Route;
use App\Livewire\Tournament\Stages\Index as StageIndex;
use App\Livewire\Tournament\Stages\Create as StageCreate;
use App\Livewire\Tournament\Stages\Edit as StageEdit;
use App\Livewire\Tournament\Matches\Index as MatchIndex;
use App\Livewire\Tournament\Matches\Create as MatchCreate;
use App\Livewire\Tournament\Matches\Edit as MatchEdit;

use App\Livewire\Tournament\Results\Index as ResultIndex;
use App\Livewire\Tournament\Results\Create as ResultCreate;
use App\Livewire\Tournament\Results\Edit as ResultEdit;

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

        Route::get('/tournaments/{tournament}/stages', StageIndex::class)
            ->name('tournaments.stages.index');

        Route::get('/tournaments/{tournament}/stages/create', StageCreate::class)
            ->name('tournaments.stages.create');

        Route::get('/tournaments/{tournament}/stages/{stage}/edit', StageEdit::class)
            ->name('tournaments.stages.edit');

        Route::get('/tournaments/{tournament}/stages/{stage}/matches', MatchIndex::class)
            ->name('tournaments.stages.matches.index');

        Route::get('/tournaments/{tournament}/stages/{stage}/matches/create', MatchCreate::class)
            ->name('tournaments.stages.matches.create');

        Route::get('/tournaments/{tournament}/stages/{stage}/matches/{match}/edit', MatchEdit::class)
            ->name('tournaments.stages.matches.edit');

        Route::get('/tournaments/{tournament}/stages/{stage}/matches/{match}/results', ResultIndex::class)
            ->name('tournaments.stages.matches.results.index');

        Route::get('/tournaments/{tournament}/stages/{stage}/matches/{match}/results/create', ResultCreate::class)
            ->name('tournaments.stages.matches.results.create');

        Route::get('/tournaments/{tournament}/stages/{stage}/matches/{match}/results/{result}/edit', ResultEdit::class)
            ->name('tournaments.stages.matches.results.edit');

    });