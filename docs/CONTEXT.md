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

PATCH-015

Team CRUD

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
- Team Manager Foundation
- Team Database Foundation
- TournamentEntry Database Foundation
- Team Relationships

### In Progress

- Team CRUD

### Next

1. Team Service
2. Team Create
3. Team Edit
4. Team Delete
5. Team Validation
6. Stage Manager Foundation
7. Match Manager Foundation
8. Leaderboard Foundation
9. Dashboard

---

## Current Notes

Module Tournament telah di-lock.

Workspace menjadi pusat seluruh pengelolaan Tournament.

Team Manager Foundation telah selesai dan menjadi dasar implementasi Team CRUD.

PATCH-014 telah selesai dan di-freeze setelah implementasi database foundation untuk Team dan TournamentEntry berhasil divalidasi.

Seluruh CRUD mengikuti pola:

Route
→ Livewire
→ Service
→ Model

---

## Last Commit

feat(team): implement team database foundation