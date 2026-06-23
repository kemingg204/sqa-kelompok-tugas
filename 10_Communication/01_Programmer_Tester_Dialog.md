# Komunikasi Programmer dan SQ Tester

**Proyek:** CV Rofile Chetose – Sistem Manajemen Penjualan Kursi  
**Tanggal:** 23 Juni 2026

---

## 1. Identitas Tim

| Peran | Nama | Tugas |
|-------|------|-------|
| **Programmer** | [Nama Programmer] | Mengembangkan kode, memperbaiki bug, push ke repository |
| **SQ Tester** | [Nama SQ Tester] | Merancang test case, menguji aplikasi, melaporkan bug |

---

## 2. Skenario Komunikasi

### Skenario 1: Menemukan Bug Stok Tidak Berkurang

| Waktu | Pelaku | Pesan |
|-------|--------|-------|
| 10:00 | **SQ Tester** | "Saya menemukan bug pada transaksi Cash. Stok tidak berkurang setelah transaksi sukses. Issue ID: **BUG-001** dengan label `critical`." |
| 10:15 | **Programmer** | "Terima kasih. Bisa tolong kirimkan langkah reproduksi dan screenshot di issue tersebut?" |
| 10:20 | **SQ Tester** | "Langkah reproduksi sudah saya tambahkan: (1) Login kasir, (2) Pilih kursi 'Kursi Kantor' (stok=10), (3) Input jumlah=1, (4) Pilih metode Cash, (5) Bayar Rp1.250.000, (6) Klik Proses. Hasil: alert 'Transaksi Berhasil' muncul tapi stok tetap 10." |
| 10:45 | **Programmer** | "Saya temukan penyebabnya. Variabel `$kursi_id` tidak terdefinisi di `proses_transaksi.php`. Saya perbaiki di branch `fix-stock-bug`." |
| 11:30 | **Programmer** | "Perbaikan sudah di-push ke branch `fix-stock-bug`. Pull request sudah saya buat. Mohon review dan regression testing." |
| 11:45 | **SQ Tester** | "Pull request sudah saya review. Query update stok sekarang pakai `$item['id']`. Saya akan jalankan regression testing." |
| 12:00 | **SQ Tester** | "Regression testing selesai. ✅ Stok berkurang. ✅ Fitur Debit & QRIS tidak terdampak. **BUG-001 siap ditutup**. Saya approve pull request." |

### Skenario 2: Diskusi Test Case White Box

| Waktu | Pelaku | Pesan |
|-------|--------|-------|
| 09:00 | **SQ Tester** | "Saya sudah menyusun White Box Testing dengan 6 metode di folder `07_White_Box_Testing`. Mohon dicek." |
| 09:15 | **Programmer** | "Saya cek. Untuk Basic Path Testing, V(G) = 3 dengan 3 jalur independen. Apakah sudah sesuai?" |
| 09:30 | **SQ Tester** | "Sudah sesuai. V(G) = 3 dari E - N + 2P (10 - 9 + 2 = 3). 3 jalur independen sudah saya uji dan semua Pass." |
| 10:00 | **SQ Tester** | "Black Box Testing juga sudah selesai di folder `08_Black_Box_Testing`. 10 test case Pass (100%)." |

### Skenario 3: Menutup Proyek

| Waktu | Pelaku | Pesan |
|-------|--------|-------|
| 15:00 | **SQ Tester** | "Semua pengujian selesai. ✅ White Box: 6 metode. ✅ Black Box: 10 TC. ✅ Gray Box: 4 model. Semua dokumentasi di GitHub sudah lengkap." |
| 15:15 | **Programmer** | "Laporan akhir sudah saya buat di `06_Final_Report`. Semua bug sudah diperbaiki. Proyek siap ditutup." |
| 15:30 | **SQ Tester** | "Saya setuju. Proyek dinyatakan **SELESAI** dan aplikasi **LAYAK** untuk User Acceptance Testing (UAT)." |

---

## 3. Alur Komunikasi di GitHub

| No | Langkah | Pelaku | Deskripsi |
|----|---------|--------|------------|
| 1 | Membuat Issue | SQ Tester | Membuat issue untuk melaporkan bug |
| 2 | Menambahkan Label | SQ Tester | Label: `bug`, `critical`, `enhancement` |
| 3 | Menentukan Prioritas | Programmer | High/Medium/Low |
| 4 | Membuat Branch | Programmer | Branch terpisah untuk perbaikan |
| 5 | Memperbaiki Kode | Programmer | Commit perbaikan |
| 6 | Membuat Pull Request | Programmer | Pull request untuk review |
| 7 | Review Code | SQ Tester | Review dan komentar |
| 8 | Testing | SQ Tester | Regression testing |
| 9 | Merge | Programmer | Merge setelah disetujui |
| 10 | Menutup Issue | SQ Tester | Issue ditutup |

---

**Dokumentasi ini dibuat sebagai bukti komunikasi antara Programmer dan SQ Tester selama proses pengujian di GitHub.**
