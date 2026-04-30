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
| F-12 | Riwayat Penjualan | TC_Laporan_Grafik.md (TC-LAP-02) | ✅ Covered |
| F-13 | Grafik Penjualan | TC_Laporan_Grafik.md (TC-LAP-02, TC-LAP-03) | ✅ Covered |
| F-14 | Export Excel | TC_Laporan_Grafik.md (TC-LAP-07, TC-LAP-09) | ✅ Covered |
| F-15 | Export PDF | TC_Laporan_Grafik.md (TC-LAP-08, TC-LAP-09) | ✅ Covered |

---

## Matriks Test Case → Bug

| Test Case | Bug ID | Status |
|-----------|--------|--------|
| TC_Login.md (TC-01 s/d TC-04) | BUG-001 | Open |
| TC_Transaksi.md (TC-TR-04) | - | Pending |
| TC_Transaksi.md (TC-TR-05) | - | Pending |
| TC_Laporan_Grafik.md (TC-LAP-01) | - | Pending |

---

## Matriks Bug → Requirement

| Bug ID | Requirement Terkait | Status |
|--------|---------------------|--------|
| BUG-001 | F-01, F-03 (Login Kasir) | Open |

---

## Summary Coverage

| Keterangan | Sebelum | Sesudah |
|------------|---------|---------|
| Total Requirement | 15 | 15 |
| Covered | 11 | 15 |
| Not Covered | 4 | 0 |
| **Coverage Percentage** | **73.3%** | **100%** |

---

## Grafik Coverage
