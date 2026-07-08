# BG-CALC Context

> Last Updated: 2026-07-08

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

PATCH-022

Result CRUD

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

# Progress

## Completed

- Database Foundation
- Models
- Migration
- Enum
- Service Foundation
- Livewire Configuration
- Project Cleanup
- Documentation

### Tournament Module

- Tournament CRUD
- Tournament Workspace Foundation
- Tournament Workspace Overview

### Team Manager

- Team Database Foundation
- Team List
- Team Registration
- Team Edit
- Team Delete
- Roster Foundation

### Stage Module

- Stage Foundation
- Stage CRUD

### GameMatch Module

- GameMatch Foundation
- GameMatchService
- GameMatch CRUD

### Result Module

- Result Foundation
- ResultService

---

## In Progress

- PATCH-022 Result CRUD Finalization

---

## Next

1. QA Result CRUD
2. PATCH-022 Lock
3. Leaderboard Foundation Planning
4. Dashboard


---

# Current Domain Flow

Tournament

↓

Stage

↓

GameMatch

↓

Result

↓

Leaderboard


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

PATCH-020 LOCKED


Stage merupakan fase Tournament.

Stage bukan Round.


Entity:

stages


Relationship:

Tournament:

hasMany(Stage)


Stage:

belongsTo(Tournament)


---

# GameMatch Module

Status:

PATCH-021 LOCKED


Entity:

matches


Architecture:

Tournament

↓

Stage

↓

GameMatch

↓

Result


Decision:

GameMatch menggunakan TournamentEntry sebagai peserta.

Tidak menggunakan Team langsung.


Reason:

Team dapat mengikuti banyak Tournament dengan roster berbeda.


Model:

GameMatch

(tabel: matches)


Note:

Match tidak mengetahui:

- Score
- Result
- Ranking


---

# Result Module

Status:

PATCH-022 ACTIVE


Entity:

results


Relationship:

GameMatch

↓

Result


Result:

belongsTo(GameMatch)


Winner:

belongsTo(TournamentEntry)


Business Rules:

- Satu Match hanya memiliki satu Result.
- Winner harus peserta Match.
- Score tidak boleh negatif.
- Result tidak menghitung Leaderboard.


---

# Last Commit

feat(result): implement result crud foundation

# Development Environment

Current Environment:

Docker

Project Location:

C:\project\bg-calc

Previous Environment:

Laragon

Migration Status:

Completed

Note:

Development tidak lagi menggunakan Laragon.
Semua testing dilakukan melalui Docker environment.

---

# Development Environment

Status:

DOCKER MIGRATION COMPLETE


Project Location:

C:\project\bg-calc


Runtime:

Docker Custom


Services:

Web:
laravel_bgcalc_web

Database:
laravel_bgcalc_db


Access:

http://localhost:8082


Database:

MySQL 8.4

Database Name:

bg_calc


Previous Environment:

Laragon


Note:

Laragon tidak digunakan lagi.
Semua development dan testing dilakukan melalui Docker.