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
- Repository hanya digunakan untuk query kompleks atau yang digunakan di banyak tempat.
- CRUD sederhana langsung menggunakan Service → Model.

---

# Development Workflow

Sebelum membuat fitur baru:

1. Review struktur project.
2. Review Model.
3. Review Service.
4. Implementasi.

Setiap PATCH:

1. Implementasi
2. Testing
3. Commit
4. Update `docs/CONTEXT.md`
5. Update `docs/TASKS.md`
6. Update `docs/DECISIONS.md` (jika ada keputusan baru)

---

# Git Workflow

- Branch Sprint 1:

```
feature/tournament-workspace
```

- Merge ke `develop-v2` setelah Sprint 1 stabil.
- Satu PATCH = satu commit utama.
- Commit tambahan hanya untuk fix atau cleanup.

---

# AI Collaboration

Gunakan sebagai sumber konteks utama:

- docs/CONTEXT.md
- docs/TASKS.md
- docs/DECISIONS.md

---

# Tournament

### Required

- game_id
- point_system_template_id
- name

### Nullable

- description
- banner
- registration_start
- registration_end
- start_date
- end_date

### Default

- status = draft
- is_public = true

Seluruh string kosong (`""`) dinormalisasi menjadi `null` di Service.

---

# Tournament Module

Status: **COMPLETED (Sprint 1)**

Struktur:

```
app/Livewire/
├── Concerns/
│   └── WithTournamentForm.php
└── Tournament/
    ├── Index.php
    ├── Create.php
    ├── Edit.php
    └── Workspace.php

resources/views/livewire/tournament/
├── _form.blade.php
├── _header.blade.php
├── _table.blade.php
├── _delete-modal.blade.php
├── _workspace-header.blade.php
├── index.blade.php
├── create.blade.php
├── edit.blade.php
└── workspace.blade.php
```

Ketentuan:

- Create dan Edit menggunakan `WithTournamentForm`.
- Berbagi `_form.blade.php`.
- Delete diimplementasikan pada `Index`.
- Business logic berada di `TournamentService`.
- Workspace menjadi pusat pengelolaan Tournament.
- Tidak ada refactor tanpa keputusan arsitektur baru.

Flow:

```
Tournament
    ↓
Workspace
    ├── Overview
    ├── Team Manager
    ├── Stage Manager
    ├── Match Manager
    └── Leaderboard
```

---

# Team Manager

Status:

- **PATCH-014 DATABASE FOUNDATION LOCKED**
- **PATCH-015 TEAM LIST LOCKED**
- **PATCH-016 TEAM REGISTRATION LOCKED**

Struktur:

```
app/Livewire/Tournament/Teams/
└── Index.php

resources/views/livewire/tournament/teams/
└── index.blade.php
```

PATCH-014 Completed:

- Team Model
- TournamentEntry Model
- Team Migration
- TournamentEntry Migration
- Team Relationships
- Foreign Key Constraints
- SoftDeletes Support

PATCH-015 Completed:

- Team List

PATCH-016:

Business Process:

```
Tournament
      ↓
Register Team
      ↓
Create Team
      ↓
Create TournamentEntry
      ↓
Create Roster
      ↓
Finish
```

Arsitektur tetap:

```
Route
→ Livewire
→ Service
→ Model
→ Database
```

Ketentuan:

- Menggunakan Shared Workspace Header.
- Business logic berada di `TeamService`.
- `TeamService::registerTeam()` menjadi entry point registrasi.
- Seluruh proses registrasi menggunakan Database Transaction.
- Livewire tidak membuat Model secara langsung.
- Team hanya menyimpan identitas Team.
- TournamentEntry merepresentasikan Team pada Tournament.
- Roster merupakan snapshot pemain pada TournamentEntry.
- Roster tidak berelasi langsung dengan Team.
- Pagination menggunakan standar Laravel.
- Empty State wajib tersedia.
- Struktur folder tidak diubah tanpa keputusan arsitektur baru.
- File baru dibuat hanya saat diperlukan (Just In Time File Creation).

Relasi Domain:

```
Tournament
      │
      ▼
TournamentEntry
      │
      ▼
Roster
```

Entity:

Team

```
id
name
description
```

Roster

```
id
tournament_entry_id
player_name
order_number
timestamps
softDeletes
```

Database Constraint:

```
unique(
    tournament_entry_id,
    order_number
)
```

Workflow PATCH:

```
Business Process
        ↓
Architecture
        ↓
Database
        ↓
Model
        ↓
Service
        ↓
Livewire
        ↓
Blade
        ↓
Testing
        ↓
Architecture Review
        ↓
LOCK PATCH
        ↓
Commit
        ↓
Push
```

Prinsip:

- Business Process menjadi acuan selama tidak merusak arsitektur project.
- UI Enhancement dikerjakan pada patch terpisah agar menghindari scope creep.