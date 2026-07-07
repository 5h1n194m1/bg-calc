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
4. Baru implementasi.

Setiap PATCH:

1. Implementasi
2. Testing
3. Commit
4. Update `docs/CONTEXT.md`
5. Update `docs/TASKS.md`
6. Jika ada keputusan baru → Update `docs/DECISIONS.md`

---

# Git Workflow

- Seluruh Sprint 1 dikerjakan pada branch:

```
feature/tournament-workspace
```

- Merge ke `develop-v2` setelah Sprint 1 stabil.
- Satu PATCH = satu commit utama.
- Commit tambahan hanya untuk fix atau cleanup.

---

# AI Collaboration

Setiap berpindah chat, gunakan sebagai sumber konteks utama:

- docs/CONTEXT.md
- docs/TASKS.md
- docs/DECISIONS.md

Jawaban harus mengikuti kondisi project saat ini dan tidak mengulang perancangan dari awal.

---

# Tournament

Tournament dapat dibuat dengan data minimum.

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

Seluruh string kosong (`""`) dinormalisasi menjadi `null` di Service.

### Default

- status = draft
- is_public = true

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
- Create dan Edit berbagi `_form.blade.php`.
- Delete diimplementasikan pada `Index`.
- Seluruh business logic berada di `TournamentService`.
- Workspace menjadi pusat seluruh pengelolaan Tournament.
- Tidak ada refactor tambahan kecuali bug atau keputusan arsitektur baru.

Flow:

```
Tournament List
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

Status: **DATABASE FOUNDATION LOCKED**

Struktur awal:

```
app/Livewire/Tournament/Teams/
└── Index.php

resources/views/livewire/tournament/teams/
└── index.blade.php
```

Database Foundation:

- Team Model
- TournamentEntry Model
- Team Migration
- TournamentEntry Migration
- Team Relationships
- Foreign Key Constraints
- SoftDeletes Support

Ketentuan:

- Menggunakan Shared Workspace Header (`_workspace-header.blade.php`).
- Mengikuti arsitektur project:

```
Route
→ Livewire
→ Service
→ Model
→ Database
```

- Business logic tetap berada di Service.
- File baru dibuat hanya saat benar-benar diperlukan (Just In Time File Creation).
- Struktur folder Tournament Workspace tidak boleh diubah tanpa keputusan arsitektur baru.
- PATCH-015 melanjutkan implementasi Team CRUD di atas fondasi database yang telah di-lock.

---

# Team Manager

Status: **LIST LOCKED**

PATCH-014

Completed:

- Team Database Foundation

PATCH-015

Completed:

- Team List

Ketentuan:

- Team List mengambil data melalui TeamService.
- Livewire tidak mengandung business logic.
- Data Team berasal dari TournamentEntry.
- Pagination menggunakan standar Laravel.
- Empty State wajib tersedia ketika Tournament belum memiliki Team.

Workflow implementasi Team mengikuti pola:

Database Foundation
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

Review

↓

Lock PATCH

UI bukan prioritas pada Sprint 1.

Selama fungsionalitas telah sesuai arsitektur, improvement visual akan dilakukan pada patch atau sprint terpisah untuk menghindari scope creep.