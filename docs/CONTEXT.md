# BG-CALC Context

> Last Updated: 2026-07-07

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

PATCH-016

Team Create

---

## Tech Stack

- Laravel 13
- PHP 8.3
- Livewire 4
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
- Tournament Workspace Overview
- Team Database Foundation
- Team List

### In Progress

- Team Create

### Next

1. Team Edit
2. Team Delete
3. Stage Manager Foundation
4. Match Manager Foundation
5. Leaderboard Foundation
6. Dashboard

---

## Current Notes

Tournament Module telah di-lock.

Workspace menjadi pusat seluruh pengelolaan Tournament.

Team Database Foundation telah selesai.

Team List telah selesai.

Seluruh Team List menggunakan:

Route
→ Livewire
→ TeamService
→ Model

Business Logic tetap berada di TeamService.

PATCH-016 dimulai dari Team Create.

---

## Last Commit

feat(team): implement team list