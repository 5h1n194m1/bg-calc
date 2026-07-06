# BG-CALC Context

> Last Updated: 2026-07-06

## Project

BG-CALC (Battleground Calculator)

Tournament Management System untuk game Battleground.

---

## Current Branch

feature/tournament-workspace

---

## Current Sprint

Sprint 1

---

## Current Patch

PATCH-011

Tournament Workspace Foundation

---

## Tech Stack

- Laravel 13
- PHP 8.3
- Livewire 4 (Class + Blade)
- Tailwind CSS 4
- Vite
- MySQL

---

## Architecture

Route
→ Livewire
→ Service
→ Model

Repository digunakan hanya untuk query kompleks.

---

## Current Structure

app/
- Livewire
- Models
- Services
- Repositories
- Actions
- Enums

resources/views/
- components/layouts
- components/ui
- livewire

---

## Progress

### Completed

- Database Foundation
- Models
- Migration
- Enum
- Service Foundation
- Livewire Configuration
- Project Cleanup
- Documentation
- Tournament CRUD
- Tournament Index
- Tournament Create
- Tournament Edit
- Tournament Delete

### In Progress

- Tournament Workspace Foundation

### Next

1. Tournament Workspace
2. Dashboard
3. Team Manager

---

## Current Notes

Tournament CRUD selesai.

Struktur yang digunakan:

Route
→ Livewire
→ Service
→ Model

Create & Edit menggunakan:

- WithTournamentForm
- _form.blade.php

Index menggunakan:

- _header.blade.php
- _table.blade.php
- _delete-modal.blade.php

Delete diimplementasikan langsung pada Index Livewire.

---

## Last Commit

feat: complete tournament crud