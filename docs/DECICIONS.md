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
