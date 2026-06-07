# Formal Inspection – CV Rofile Chetose

## Informasi Umum

| Item | Keterangan |
|------|-------------|
| Metode Pengujian | White Box Testing – Formal Inspection |
| Modul yang Diuji | Form Tambah Kursi (Admin Panel) |
| Tanggal Inspeksi | 7 Juni 2026 |
| Inspektur | SQ Tester |

---

## Objek Inspeksi

Form Tambah Kursi pada halaman admin (`dashboard/admin.php`) dengan field-field berikut:

| Field | Tipe Data | Format yang Diharapkan |
|-------|-----------|------------------------|
| Nama Kursi | String | 1 - 100 karakter, tidak boleh kosong |
| Kode Kursi | String | Unique, maksimal 20 karakter |
| Harga | Integer | > 0, maksimal 100.000.000 |
| Stok | Integer | ≥ 0, maksimal 10.000 |
| Kategori | Enum | Kantor, Rumah, Gaming, Outdoor |
| Berat | Decimal | ≥ 0, maksimal 1.000 kg |
| Warna | String | Pilihan dari dropdown |
| Deskripsi | Text | Opsional, maksimal 500 karakter |

---

## Hasil Inspeksi

| No | Field | Format yang Diharapkan | Data Uji | Hasil | Status |
|----|-------|------------------------|----------|-------|--------|
| 1 | Nama Kursi | 1-100 karakter, tidak boleh kosong | "Kursi Kantor Executive" | Tersimpan | ✅ Pass |
| 2 | Nama Kursi | 1-100 karakter, tidak boleh kosong | "" (kosong) | Error: Nama wajib diisi | ✅ Pass |
| 3 | Nama Kursi | 1-100 karakter, tidak boleh kosong | (101 karakter) | Error: Nama terlalu panjang | ✅ Pass |
| 4 | Kode Kursi | Unique, maksimal 20 karakter | "KSR-001" | Tersimpan | ✅ Pass |
| 5 | Kode Kursi | Unique, maksimal 20 karakter | "KSR-001" (duplikat) | Error: Kode sudah ada | ✅ Pass |
| 6 | Harga | Integer > 0 | 1.250.000 | Tersimpan | ✅ Pass |
| 7 | Harga | Integer > 0 | 0 | Error: Harga harus > 0 | ✅ Pass |
| 8 | Harga | Integer > 0 | -100.000 | Error: Harga harus > 0 | ✅ Pass |
| 9 | Harga | Integer > 0 | 200.000.000 | Error: Harga terlalu besar | ✅ Pass |
| 10 | Stok | Integer ≥ 0 | 10 | Tersimpan | ✅ Pass |
| 11 | Stok | Integer ≥ 0 | 0 | Tersimpan (boleh 0) | ✅ Pass |
| 12 | Stok | Integer ≥ 0 | -5 | Error: Stok tidak boleh negatif | ✅ Pass |
| 13 | Stok | Integer ≥ 0 | 20.000 | Error: Stok melebihi batas | ✅ Pass |
| 14 | Kategori | Enum (Kantor/Rumah/Gaming/Outdoor) | "Kantor" | Tersimpan | ✅ Pass |
| 15 | Kategori | Enum (Kantor/Rumah/Gaming/Outdoor) | "Sekolah" (tidak valid) | Error: Kategori tidak tersedia | ✅ Pass |
| 16 | Berat | Decimal ≥ 0 | 12.5 | Tersimpan | ✅ Pass |
| 17 | Berat | Decimal ≥ 0 | -5 | Error: Berat tidak boleh negatif | ✅ Pass |
| 18 | Warna | Pilihan dropdown | "Hitam" | Tersimpan | ✅ Pass |
| 19 | Deskripsi | Maksimal 500 karakter | (500 karakter) | Tersimpan | ✅ Pass |
| 20 | Deskripsi | Maksimal 500 karakter | (501 karakter) | Error: Deskripsi terlalu panjang | ✅ Pass |

---

## Ringkasan Hasil Inspeksi

| Kategori | Jumlah | Status |
|----------|--------|--------|
| Total kasus uji | 20 | - |
| Pass | 20 | ✅ |
| Fail | 0 | - |
| **Pass Rate** | **100%** | ✅ |

---

## Kesimpulan

| Aspek | Status |
|-------|--------|
| Validasi field wajib isi | ✅ Berfungsi |
| Validasi panjang karakter | ✅ Berfungsi |
| Validasi tipe data integer | ✅ Berfungsi |
| Validasi nilai batas (min/max) | ✅ Berfungsi |
| Validasi enum (pilihan dropdown) | ✅ Berfungsi |

**Status Akhir:** ✅ **Lulus (Pass) – Semua validasi berfungsi dengan baik**

---

## Lampiran

- **Form yang diinspeksi:** `dashboard/admin.php`
- **File terkait:** `api/api_tambah.php`, `api/api_ubah.php`
