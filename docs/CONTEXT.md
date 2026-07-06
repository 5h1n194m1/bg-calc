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

PATCH-014

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

### In Progress

- Team CRUD

### Next

1. Stage Manager Foundation
2. Match Manager Foundation
3. Leaderboard Foundation
4. Dashboard

---

## Current Notes

Module Tournament telah di-lock.

Workspace menjadi pusat seluruh pengelolaan Tournament.

Team Manager Foundation telah selesai dan menjadi dasar implementasi Team CRUD.

Seluruh CRUD mengikuti pola:

Route
→ Livewire
→ Service
→ Model

---

## Last Commit

1940dcb

docs: update tournament workspace overview