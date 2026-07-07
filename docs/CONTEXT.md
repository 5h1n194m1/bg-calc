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

Team Registration

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

Business Logic selalu berada di Service.

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
- Team Registration
- Roster Foundation

### In Progress

- Documentation Update
- Final Review

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

PATCH-014 dan PATCH-015 tetap LOCKED.

PATCH-016 mengubah business process dari Team Create menjadi Team Registration.

Flow registrasi:

Tournament

↓

Create Team

↓

Create TournamentEntry

↓

Create Roster

↓

Finish

Roster merupakan snapshot pemain pada TournamentEntry.

Roster tidak berelasi langsung dengan Team.

Seluruh business logic berada di TeamService::registerTeam().

Seluruh proses registrasi menggunakan Database Transaction.

---

## Last Commit

feat(team): implement team list