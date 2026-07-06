# BG-CALC Decisions

> Semua keputusan pada file ini dianggap FINAL sampai diputuskan untuk diubah.

---

## 2026-07-06

### Livewire

Status : ✅ LOCKED

Menggunakan Livewire 4 dengan pola **Class + Blade**.

Tidak menggunakan Single File Component (SFC) sebagai standar project.

---

### Architecture

Status : ✅ LOCKED

Flow aplikasi:

Route
→ Livewire
→ Service
→ Model

---

### Repository

Status : ✅ LOCKED

Repository hanya digunakan untuk query kompleks.

CRUD sederhana langsung melalui Service + Model.

---

### Styling

Status : ✅ LOCKED

- Tailwind CSS 4
- Vite
- Tidak menggunakan Tailwind CDN.

---

### Git Workflow

Status : ✅ LOCKED

Setiap PATCH:

1. Implementasi
2. Testing
3. Commit
4. Update `CONTEXT.md`
5. Update `TASKS.md`
6. Jika ada keputusan baru → Update `DECISIONS.md`

---

### Development Principle

Status : ✅ LOCKED

- Tidak mengubah arsitektur tanpa alasan yang jelas.
- Tidak membuat folder baru jika struktur yang ada sudah memadai.
- Reusable component lebih diutamakan daripada copy-paste.
- Semua perubahan besar harus melalui PATCH yang jelas.
