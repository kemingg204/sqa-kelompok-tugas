# Bug Report - Sprint 1
## Aplikasi Penjualan Kursi Online "KursiKita"

**Periode:** 1 - 10 Maret 2025  
**Penguji:** Tim SQA Kelompok 17
**Sprint:** 1

---

## Ringkasan Bug

| ID | Tanggal | Modul | Ringkasan | Severity | Priority | Status |
|----|---------|-------|-----------|----------|----------|--------|
| BUG-KRS-001 | 2025-03-10 | Login | Gagal login setelah verifikasi email | High | High | Open |
| BUG-KRS-002 | 2025-03-10 | Keranjang | Jumlah kursi tidak berkurang setelah checkout | High | High | In Progress |
| BUG-KRS-003 | 2025-03-09 | Retur | Upload foto retur gagal untuk ukuran >2MB | Medium | Medium | Open |
| BUG-KRS-004 | 2025-03-09 | Pencarian | Filter kategori tidak berfungsi di mobile | Medium | Medium | Open |
| BUG-KRS-005 | 2025-03-08 | Laporan | Grafik penjualan tidak muncul di Firefox | Low | Low | Fixed |
| BUG-KRS-006 | 2025-03-08 | Admin | Tombol hapus kursi tidak muncul di halaman 2 | Medium | Medium | Open |

---

## Detail Bug

### BUG-KRS-001: Gagal login setelah verifikasi email
- **Severity:** High
- **Priority:** High
- **Status:** Open
- **Ditemukan oleh:** Budi (Tester)
- **Tanggal:** 2025-03-10
- **Modul:** Login & Registrasi

**Langkah reproduksi:**
1. Pelanggan registrasi dengan data: Budi, budi@email.com, password=12345
2. Cek email dan input kode verifikasi "123456"
3. Sistem alihkan ke halaman login
4. Input email "budi@email.com" dan password "12345"
5. Klik "Login"

**Expected Result:**
Berhasil masuk ke halaman utama dan melihat daftar kursi

**Actual Result:**
Muncul error popup: "Email atau password salah"

**Lampiran Error Log:**
