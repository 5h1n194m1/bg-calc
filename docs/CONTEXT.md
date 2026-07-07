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

PATCH-019

Stage Foundation

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
→ Database

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
- Team Edit
- Team Delete
- Roster Foundation
- Stage Foundation

### In Progress

- Stage CRUD Preparation

### Next

1. Stage Create
2. Stage Edit
3. Stage Delete
4. Match Manager Foundation
5. Leaderboard Foundation
6. Dashboard

---

# Tournament Module

Status:

COMPLETED (Sprint 1)

Workspace menjadi pusat pengelolaan Tournament.

Flow:


Tournament
↓
Workspace
├── Overview
├── Team Manager
├── Stage Manager
├── Match Manager
└── Leaderboard


---

# Team Manager

Status:

- PATCH-014 DATABASE FOUNDATION LOCKED
- PATCH-015 TEAM LIST LOCKED
- PATCH-016 TEAM REGISTRATION LOCKED
- PATCH-017 TEAM EDIT LOCKED
- PATCH-018 TEAM DELETE LOCKED

Domain:


Team

↓

TournamentEntry

↓

Roster


Ketentuan:

- Team menyimpan identitas Team.
- TournamentEntry merepresentasikan keikutsertaan Team pada Tournament.
- Roster merupakan snapshot pemain pada TournamentEntry.
- Roster tidak berelasi langsung dengan Team.
- Business logic berada pada TeamService.
- Seluruh proses menggunakan Database Transaction.

---

# Stage Module

Status:

PATCH-019 STAGE FOUNDATION LOCKED

Stage merupakan fase Tournament.

Stage bukan Round.

Hierarchy:


Tournament

↓

Stage

↓

Match

↓

Result

↓

Leaderboard


Entity Stage:


id

tournament_id

name

description

order_number

status

timestamps

softDeletes


Status:


draft

published

running

finished


Relationship:

Tournament:


hasMany(Stage)


Stage:


belongsTo(Tournament)


Match:

Belum diimplementasikan.

---

# Current Notes

PATCH-019 hanya membangun pondasi Stage.

Tidak terdapat:

- Stage CRUD
- Match
- Bracket
- Generator
- Seeding
- Promotion

Fitur tersebut dipindahkan ke PATCH berikutnya.

---

# Last Commit

feat(stage): implement stage foundation