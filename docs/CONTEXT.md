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

PATCH-007

Tournament CRUD Foundation

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
- layouts
- livewire
- components/ui

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
- Tournament Index Foundation

### In Progress

- Tournament Create

### Next

1. Tournament Create
2. Dashboard
3. Tournament Workspace
4. Team Manager

---

## Current Notes

Tournament membutuhkan:

- Game
- Point System Template

Sebelum Dashboard selesai, Tournament CRUD harus selesai.

---

## Last Commit

b03c408

feat: implement tournament service


ingat juga untuk hanya memberikan penjelasan 3 point saja dengan max 2 paragraf aja per poin, jangan pernah lebih