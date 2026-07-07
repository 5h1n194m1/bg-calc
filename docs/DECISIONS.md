# BG-CALC Decisions

Seluruh keputusan pada file ini bersifat **LOCKED** dan dianggap final sampai diputuskan untuk diubah.

---

# Tech Stack

- Livewire 4 (Class + Blade)
- Tailwind CSS 4
- Vite
- Tidak menggunakan Single File Component (SFC)
- Tidak menggunakan Tailwind CDN

---

# Architecture

Flow aplikasi:

Route
→ Livewire
→ Service
→ Model
→ Database

Ketentuan:

- Seluruh business logic berada di Service.
- Livewire hanya menangani UI, state, validasi, dan pemanggilan Service.
- Repository hanya digunakan untuk query kompleks.
- CRUD sederhana langsung menggunakan Service → Model.

---

# Development Workflow

Setiap PATCH:

1. Business Process Review
2. Architecture Review
3. Implementation
4. Functional Test
5. Relationship Test
6. Data Integrity Test
7. QA Review
8. Architecture Review
9. LOCK PATCH
10. Commit
11. Push

---

# Git Workflow

Branch:


feature/tournament-workspace


Ketentuan:

- Satu PATCH = satu commit utama.
- Commit tambahan hanya untuk fix atau cleanup.

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

- PATCH-014 LOCKED
- PATCH-015 LOCKED
- PATCH-016 LOCKED
- PATCH-017 LOCKED
- PATCH-018 LOCKED

Architecture:


Route

↓

Livewire

↓

TeamService

↓

Model

↓

Database


Business Rule:

- Team menyimpan identitas.
- TournamentEntry menyimpan keikutsertaan Team.
- Roster adalah snapshot pemain.
- Roster tidak berelasi langsung dengan Team.

---

# Team Delete Decision

Status:

LOCKED

Team hanya boleh dihapus jika belum digunakan modul lain.

Validasi delete dipusatkan pada:


TeamService::canDelete()


Soft Delete digunakan pada:

- Team
- TournamentEntry
- Roster

Hard Delete bukan bagian business process normal.

---

# Stage Module

Status:

PATCH-019 LOCKED

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


---

# Stage Foundation Decision

Entity:


stages

id

tournament_id

name

description

order_number

status

timestamps

deleted_at


Status Enum:


draft

published

running

finished


Relationship:

Tournament:


hasMany(Stage)


Stage:


belongsTo(Tournament)


Match belum diimplementasikan.

---

# PATCH-019 Scope

Implementasi:

- Stage Migration
- Stage Model
- StageStatus Enum
- Tournament Relationship
- StageService Foundation
- Stage Manager Page

Tidak termasuk:

- Create Stage
- Edit Stage
- Delete Stage
- Match
- Bracket
- Generator
- Seeding
- Promotion

---

# Architecture Queue

Current:


PATCH-019

LOCKED

PATCH-020

LOCK

PATCH-021

DRAFT


PATCH-020:

Stage CRUD

Scope:

- Create Stage
- Edit Stage
- Delete Stage
- Validation
- Transaction

PATCH-021:

Match Foundation