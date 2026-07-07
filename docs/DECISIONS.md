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

---

# Team Manager

Status:

- **PATCH-014 DATABASE FOUNDATION LOCKED**
- **PATCH-015 TEAM LIST LOCKED**
- **PATCH-016 TEAM REGISTRATION LOCKED**
- **PATCH-017 TEAM EDIT LOCKED**
- **PATCH-018 TEAM DELETE LOCKED**

Arsitektur tetap:

```
Route
→ Livewire
→ TeamService
→ Model
→ Database
```

Business Process Team Registration:

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

Business Process Team Edit:

```
TournamentEntry
      ↓
Update Team
      ↓
Replace Roster Snapshot
      ↓
Finish
```

Business Process Team Delete:

```
Open Team
      ↓
Delete
      ↓
canDelete()
      ↓
Soft Delete Team
      ↓
Soft Delete TournamentEntry
      ↓
Soft Delete Roster
      ↓
Finish
```

Ketentuan:

- Business logic berada di `TeamService`.
- `registerTeam()` menjadi entry point registrasi.
- `updateTeam()` menjadi entry point perubahan Team.
- `deleteTeam()` menjadi entry point penghapusan Team.
- Seluruh proses menggunakan Database Transaction.
- Livewire tidak membuat ataupun memodifikasi Model secara langsung.
- Team hanya menyimpan identitas Team.
- TournamentEntry merepresentasikan keikutsertaan Team pada Tournament.
- Roster merupakan snapshot pemain pada TournamentEntry.
- Roster tidak berelasi langsung dengan Team.
- Pagination menggunakan standar Laravel.
- Empty State wajib tersedia.

---

# Team Delete Decision

Status: **LOCKED**

Business Rule:

Team hanya boleh dihapus apabila belum digunakan oleh modul lain.

Untuk Sprint 1, seluruh Team dianggap masih dapat dihapus karena modul berikut belum tersedia:

- Stage
- Match
- Score
- Leaderboard

Seluruh validasi business rule delete dipusatkan pada:

```
TeamService::canDelete()
```

Modul lain tidak boleh melakukan validasi delete secara langsung.

Ketika modul Stage, Match, Score, dan Leaderboard selesai dibuat, seluruh aturan tambahan harus memperluas implementasi `canDelete()` tanpa mengubah business process Team Delete.

Soft Delete digunakan pada:

- Team
- TournamentEntry
- Roster

Hard Delete bukan bagian dari business process normal.

---

# Workflow PATCH

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
Functional Test
        ↓
Relationship Test
        ↓
Data Integrity Test
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

- Business Process menjadi sumber kebenaran utama.
- Architecture mengikuti Business Process.
- Implementasi mengikuti Architecture Lock.
- UI Enhancement dikerjakan pada patch terpisah untuk menghindari scope creep.