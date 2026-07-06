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

PATCH-012

Tournament Workspace Overview

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
- Tournament Workspace Foundation

### In Progress

- Tournament Workspace Overview

### Next

1. Team Manager
2. Stage Manager
3. Match Manager
4. Leaderboard
5. Dashboard

---

## Current Notes

Tournament Module selesai sebagai fondasi.

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

Workspace menggunakan:

- Workspace.php
- workspace.blade.php

Workspace menjadi pusat seluruh manajemen Tournament.

---

## Last Commit

feat: implement tournament workspace foundation