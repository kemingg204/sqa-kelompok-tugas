# Traceability Matrix (RTM)
## CV Rofile Chetose - Sistem Penjualan Kursi

---

## Matriks Ketertelusuran (Requirement → Test Case)

| ID Requirement | Deskripsi | Test Case | Status |
|----------------|-----------|-----------|--------|
| F-01 | Login | TC_Login.md | ✅ Covered |
| F-02 | Logout | TC_Login.md | ✅ Covered |
| F-03 | Role-based Access (4 role) | TC_Login.md | ✅ Covered |
| F-04 | Tampil Kursi | TC_Kelola_Kursi.md (TC-KURSUS-04) | ✅ Covered |
| F-05 | Tambah Kursi | TC_Kelola_Kursi.md (TC-KURSUS-01) | ✅ Covered |
| F-06 | Edit Kursi | TC_Kelola_Kursi.md (TC-KURSUS-02) | ✅ Covered |
| F-07 | Hapus Kursi | TC_Kelola_Kursi.md (TC-KURSUS-03) | ✅ Covered |
| F-08 | Transaksi Cash | TC_Transaksi.md (TC-TR-01) | ✅ Covered |
| F-09 | Transaksi Debit | TC_Transaksi.md (TC-TR-02) | ✅ Covered |
| F-10 | Transaksi QRIS | TC_Transaksi.md (TC-TR-03) | ✅ Covered |
| F-11 | Update Stok Otomatis | TC_Transaksi.md (TC-TR-01, TC-TR-04) | ✅ Covered |
| F-12 | Riwayat Penjualan | Belum ada test case | ❌ Not Yet |
| F-13 | Grafik Penjualan | Belum ada test case | ❌ Not Yet |
| F-14 | Export Excel | Belum ada test case | ❌ Not Yet |
| F-15 | Export PDF | Belum ada test case | ❌ Not Yet |

---

## Matriks Test Case → Bug

| Test Case | Bug ID | Status |
|-----------|--------|--------|
| TC_Login.md (TC-01 s/d TC-04) | BUG-001 | Open |
| TC_Transaksi.md (TC-TR-04) | - | Pending |
| TC_Transaksi.md (TC-TR-05) | - | Pending |

---

## Summary Coverage

| Keterangan | Jumlah |
|------------|--------|
| Total Requirement | 15 |
| Covered | 11 |
| Not Covered | 4 |
| **Coverage Percentage** | **73.3%** |

---

## Rekomendasi

1. Buat test case untuk requirement F-12 (Riwayat Penjualan)
2. Buat test case untuk requirement F-13 (Grafik Penjualan)
3. Buat test case untuk requirement F-14 & F-15 (Export Excel/PDF)
4. Perbaiki bug BUG-001 (Login kasir gagal)

---

**Terakhir diupdate:** 30 April 2026
