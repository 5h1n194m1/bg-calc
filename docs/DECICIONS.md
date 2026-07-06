# BG-CALC Decisions

Semua keputusan pada file ini dianggap FINAL sampai diputuskan untuk diubah.

---

## Livewire

Status : LOCKED

Menggunakan Livewire 4 dengan pola:

Class + Blade

Tidak menggunakan Single File Component (SFC).

---

## Architecture

Status : LOCKED

Flow aplikasi:

Route
→ Livewire
→ Service
→ Model

Repository hanya digunakan untuk query kompleks.

---

## Service Layer

Status : LOCKED

Semua business logic berada di Service.

Livewire tidak boleh berisi query database yang kompleks.

---

## Repository

Status : LOCKED

Repository hanya digunakan bila query mulai kompleks atau digunakan di banyak tempat.

CRUD sederhana menggunakan:

Service → Model

---

## Styling

Status : LOCKED

- Tailwind CSS 4
- Vite
- Tidak menggunakan Tailwind CDN.

---

## Git Workflow

Status : LOCKED

Setiap PATCH:

1. Implementasi
2. Testing
3. Commit
4. Update CONTEXT.md
5. Update TASKS.md
6. Jika ada keputusan baru → Update DECISIONS.md

---

## Development Workflow

Status : LOCKED

Sebelum membuat fitur baru:

1. Review struktur project.
2. Review Model.
3. Review Service.
4. Baru implementasi.

---

## Commit Rules

Status : LOCKED

Satu PATCH = satu commit utama.

Commit kecil hanya untuk fix atau cleanup.

---

## Branch Rules

Status : LOCKED

Semua implementasi Sprint 1 dilakukan di:

feature/tournament-workspace

Merge ke develop-v2 setelah Sprint 1 selesai dan stabil.

---

## AI Collaboration Rules

Status : LOCKED

Setiap berpindah chat, gunakan file berikut sebagai sumber konteks utama:

- docs/CONTEXT.md
- docs/TASKS.md
- docs/DECISIONS.md

Jawaban harus mengacu pada kondisi project saat ini, bukan mengulang desain dari awal.

---

## Tournament Rules

Status : LOCKED

Tournament dapat dibuat dengan informasi minimum.

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

Field tanggal bersifat nullable karena kondisi turnamen lokal sering kali belum memiliki jadwal tetap pada saat pertama kali dibuat.

Normalisasi nilai kosong ("") menjadi null dilakukan di Service Layer sebelum data disimpan ke database.

### Default

- status = draft
- is_public = true

---

## Tournament Module

Status : LOCKED

Tournament menggunakan struktur:

app/Livewire/
- Concerns/
    - WithTournamentForm.php
- Tournament/
    - Create.php
    - Edit.php
    - Index.php

resources/views/livewire/tournament/
- _form.blade.php
- _header.blade.php
- _table.blade.php
- _delete-modal.blade.php
- create.blade.php
- edit.blade.php
- index.blade.php

Create dan Edit berbagi validasi melalui WithTournamentForm.

Create dan Edit berbagi tampilan form melalui _form.blade.php.

Delete diimplementasikan sebagai action pada Index, bukan Livewire terpisah.

---

## Tournament

Status : LOCKED

Tournament CRUD menggunakan struktur:

Livewire

- Index
- Create
- Edit

Blade

- index
- create
- edit
- _form
- _header
- _table
- _delete-modal

Business logic tetap berada pada TournamentService.

Field jadwal (registration_start, registration_end, start_date, end_date) bersifat opsional (nullable) agar tournament dapat dibuat lebih awal dan dilengkapi kemudian melalui fitur Edit.

---

## Tournament Workspace

Status : LOCKED

Tournament Workspace menjadi halaman utama setelah admin memilih Tournament.

Flow navigasi:

Tournament List
→ Tournament Workspace
→ Team Manager
→ Stage Manager
→ Match Manager
→ Leaderboard

Workspace menggunakan struktur:

Livewire

- Workspace.php

Blade

- workspace.blade.php

Workspace menyediakan:

- Back to Tournaments
- Edit Tournament
- Navigation Tabs
- Overview

Seluruh fitur Tournament selanjutnya dikembangkan dari Workspace, bukan lagi dari halaman Index.


---

## Tournament Module

Status : LOCKED

Modul Tournament dinyatakan selesai pada Sprint 1.

Ruang lingkup modul meliputi:

- Tournament CRUD
- Tournament Workspace Foundation
- Tournament Workspace Overview

Workspace menjadi pusat seluruh pengelolaan Tournament.

Seluruh fitur berikutnya (Team Manager, Stage Manager, Match Manager, dan Leaderboard) dikembangkan melalui Workspace.

Tidak ada refactor tambahan pada modul Tournament kecuali ditemukan bug atau kebutuhan arsitektur baru.