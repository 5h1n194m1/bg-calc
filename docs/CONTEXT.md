# BG-CALC Context

> Last Updated: 2026-07-06

## Current Status

- Branch : `feature/tournament-workspace`
- Sprint : Sprint 1
- Current Patch : PATCH-004
- Focus : UI Foundation

---

## Tech Stack

- Laravel 13
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

Repository digunakan hanya untuk query yang kompleks.

---

## Current Structure

app/
- Actions
- Enums
- Models
- Repositories
- Services

resources/views/
- layouts
- components/ui
- livewire

---

## Progress

### ✅ Done

- Database Foundation
- Model & Migration
- Service Layer
- Repository Layer
- Livewire Configuration
- Cleanup Baseline

### 🔄 In Progress

- UI Foundation

### ⏭ Next

1. Dashboard
2. Create Tournament
3. Tournament Workspace

---

## Last Commit

9013c14
