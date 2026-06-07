# DESK CHECKING - WHITE BOX TESTING
## CV Rofile Chetose (Sistem Informasi Manajemen Penjualan Kursi)

---

## 1. DEFINISI (Dari Materi)
Desk Checking adalah pemeriksaan berfokus pada logika dan nilai variabel pada input dan output yang diperlukan oleh aplikasi.

---

## 2. STUDI KASUS
**Modul:** Transaksi Penjualan (Metode Cash)
**Data Awal:**
- Saldo awal stok = 10 unit
- Harga per unit = Rp 1.250.000
- Jumlah beli = 3 unit
- Uang bayar = Rp 4.000.000

---

## 3. TABEL DESK CHECKING

| Komponen | Nilai Awal | Kondisi | Perhitungan | Nilai Akhir | Status |
|----------|------------|---------|-------------|-------------|--------|
| Stok Kursi | 10 | 3 ≤ 10 = TRUE | 10 - 3 = 7 | 7 | ✅ PASS |
| Total Harga | - | - | 3 × 1.250.000 | 3.750.000 | ✅ PASS |
| Kembalian | - | 4.000.000 ≥ 3.750.000 = TRUE | 4.000.000 - 3.750.000 | 250.000 | ✅ PASS |

---

## 4. SKENARIO INVALID (ERROR)

| Skenario | Input | Kondisi | Hasil | Status |
|----------|-------|---------|-------|--------|
| Keranjang kosong | items = [] | items kosong = TRUE | Error "Keranjang kosong" | ✅ PASS |
| Bayar kurang | bayar = 1.000.000 | bayar < total = TRUE | Error "Uang tidak cukup" | ✅ PASS |

---

## 5. KESIMPULAN
Semua logika dan nilai variabel (baik valid maupun invalid) berfungsi dengan benar.

**Penguji:** [Nama Anda]
**Tanggal:** 7 Juni 2026
