<?php

use App\Livewire\Tournament\Create;
use App\Livewire\Tournament\Edit;
use App\Livewire\Tournament\Index;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::redirect('/', '/admin/tournaments');

        Route::get('/tournaments', Index::class)
            ->name('tournaments.index');

        Route::get('/tournaments/create', Create::class)
            ->name('tournaments.create');

        Route::get('/tournaments/{tournament}/edit', Edit::class)
            ->name('tournaments.edit');

    });