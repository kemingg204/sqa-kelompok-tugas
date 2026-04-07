# Traceability Matrix
## Aplikasi Penjualan Kursi Online "KursiKita"

**Versi:** 1.0  
**Tanggal:** 10 Maret 2025  
**Penulis:** Tim SQA Kelompok 17

---

## Matriks Ketertelusuran

| Req ID | Requirement Description | Test Case ID | Bug ID | Status Coverage |
|--------|------------------------|--------------|--------|-----------------|
| FR-01-01 | Pelanggan dapat registrasi | TC-REG-01-01 | - | ✅ Covered |
| FR-01-02 | Sistem verifikasi email | TC-REG-01-01 | BUG-KRS-001 | ✅ Covered |
| FR-01-03 | Pelanggan dapat login | TC-LOGIN-01-01 | - | ✅ Covered |
| FR-01-04 | Gagal login jika password salah | TC-LOGIN-01-02 | - | ✅ Covered |
| FR-02-01 | Sistem tampilkan daftar kursi | TC-PRODUK-01-01 | - | ✅ Covered |
| FR-02-02 | Pelanggan dapat mencari kursi | TC-PRODUK-01-02 | - | ✅ Covered |
| FR-02-03 | Pelanggan dapat filter kategori | TC-PRODUK-01-03 | BUG-KRS-004 | ✅ Covered |
| FR-03-01 | Pelanggan dapat tambah ke keranjang | TC-CART-01-01 | - | ✅ Covered |
| FR-03-02 | Sistem validasi stok | TC-CART-01-02 | - | ✅ Covered |
| FR-04-01 | Sistem tampilkan ringkasan order | TC-CHECKOUT-01-01 | - | ✅ Covered |
| FR-04-02 | Pelanggan pilih metode pembayaran | TC-CHECKOUT-01-01, TC-CHECKOUT-01-02 | - | ✅ Covered |
| FR-04-03 | Sistem simpan pesanan | TC-CHECKOUT-01-01 | - | ✅ Covered |
| FR-05-01 | Admin dapat verifikasi pembayaran | TC-ADMIN-01-01 | - | ✅ Covered |
| FR-06-01 | Pelanggan dapat ajukan retur | TC-RETUR-01-01 | BUG-KRS-003 | ✅ Covered |
| FR-06-02 | Batas waktu retur 14 hari | TC-RETUR-01-02 | - | ✅ Covered |
| FR-07-01 | Admin dapat lihat laporan | TC-LAPORAN-01-01 | BUG-KRS-005 | ✅ Covered |
| FR-07-02 | Owner dapat lihat laporan stok | TC-LAPORAN-01-02 | - | ⚠️ Not Yet |

---

## Summary Coverage

| Keterangan | Jumlah |
|------------|--------|
| Total Functional Requirements | 17 |
| Covered by Test Case | 16 |
| Not Yet Covered | 1 |
| **Coverage Percentage** | **94.1%** |

| Bug ID | Req ID Terkait | Status |
|--------|---------------|--------|
| BUG-KRS-001 | FR-01-02 | Open |
| BUG-KRS-002 | FR-03-02 | In Progress |
| BUG-KRS-003 | FR-06-01 | Open |
| BUG-KRS-004 | FR-02-03 | Open |
| BUG-KRS-005 | FR-07-01 | Fixed |

---

## Rekomendasi

Berdasarkan traceability matrix di atas, direkomendasikan:

1. ✅ Semua requirement utama sudah memiliki test case
2. ⚠️ Requirement FR-07-02 perlu segera dibuat test case-nya
3. 🔴 Bug BUG-KRS-001 dan BUG-KRS-002 harus diprioritaskan karena menghambat fungsi utama
4. 📊 Coverage 94.1% sudah baik, target 100% di sprint berikutnya
