# CODE WALKTHROUGH - WHITE BOX TESTING
## CV Rofile Chetose (Sistem Informasi Manajemen Penjualan Kursi)

---

## 1. DEFINISI (Dari Materi)
Code Walkthrough adalah teknik review kode secara formal atau informal yang dilakukan bersama-sama antara developer dan tim terkait untuk memahami logika kode, kemudian mengidentifikasi potensi error.

---

## 2. TIM REVIEWER
| Peran | Nama |
|-------|------|
| Programmer | [Nama Programmer] |
| SQ Tester | [Nama SQ Tester] |
| Tim QA | [Nama Tim] |

---

## 3. KODE YANG DIREVIEW

![Screenshot Error Login](../screenshots/2026-06-07(8).png)

## 4. hasil rivew


---

## Hasil Review

| No | Yang Diperiksa | Temuan | Status | Rekomendasi |
|----|----------------|--------|--------|-------------|
| 1 | $transaksi_id = mysqli_insert_id() | Mengambil ID transaksi terakhir dengan benar | Pass | - |
| 2 | Casting (int) pada variabel | Mencegah SQL injection | Pass | - |
| 3 | Query INSERT detail_transaksi | Field sesuai tabel, query benar | Pass | - |
| 4 | Query UPDATE kursi | Logika stok = stok - jumlah benar | Pass | - |
| 5 | Query INSERT stok_history | Mencatat riwayat stok dengan benar | Pass | - |
| 6 | JSON response | Format sesuai standar API | Pass | - |
| 7 | Error handling query | Tidak ada pengecekan error | Minor | Tambahkan if(!mysqli_query(...)) |
| 8 | Prepared statement | Tidak digunakan | Minor | Gunakan prepared statement |

---

---

## Kesimpulan

| Aspek | Status |
|-------|--------|
| Fungsionalitas kode | Berfungsi dengan baik |
| Keamanan (casting int) | Sudah aman |
| Error handling | Perlu ditambahkan |
| Prepared statement | Disarankan |
