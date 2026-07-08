# BG-CALC Decisions

Seluruh keputusan pada file ini bersifat LOCKED dan dianggap final sampai diputuskan untuk diubah.

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

- Business Logic berada di Service.
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

# Tournament Module

Status:

COMPLETED


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

PATCH-014 sampai PATCH-018 LOCKED


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


Reason:

Team dapat mengikuti banyak Tournament dengan roster berbeda.


Model:

GameMatch

(tabel: matches)


Tidak menyimpan:

- Score
- Result
- Ranking


---

# Result Module

Status:

PATCH-022 LOCKED


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

# Architecture Queue


PATCH-020

LOCKED


PATCH-021

LOCKED


PATCH-022

ACTIVE


Current:

Result CRUD Finalization