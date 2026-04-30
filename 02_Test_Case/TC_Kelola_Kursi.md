# Test Case - Modul Kelola Kursi (Admin)

## TC-KURSUS-01: Admin Tambah Kursi Baru

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Login sebagai admin | username: admin, password: admin123 | Masuk dashboard admin |
| 2. Klik menu Kelola Kursi | - | Halaman daftar kursi |
| 3. Klik tombol Tambah Kursi | - | Form tambah kursi muncul |
| 4. Isi kode kursi | KRS-001 | Data masuk |
| 5. Isi nama kursi | Kursi Kantor Eksekutif | Data masuk |
| 6. Pilih kategori | Kantor | Data masuk |
| 7. Isi harga | 1250000 | Data masuk |
| 8. Isi stok | 10 | Data masuk |
| 9. Isi berat | 5 | Data masuk |
| 10. Isi deskripsi | Kursi nyaman | Data masuk |
| 11. Pilih warna | Hitam | Data masuk |
| 12. Klik Simpan | - | Muncul notifikasi "Kursi berhasil ditambahkan" |

---

## TC-KURSUS-02: Admin Edit Kursi

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Login sebagai admin | - | Dashboard admin |
| 2. Klik menu Kelola Kursi | - | Daftar kursi |
| 3. Klik tombol Edit pada kursi | KRS-001 | Form edit muncul dengan data lama |
| 4. Ubah harga | 1250000 → 1350000 | Data berubah |
| 5. Ubah stok | 10 → 15 | Data berubah |
| 6. Klik Simpan | - | Data kursi berhasil diupdate |

---

## TC-KURSUS-03: Admin Hapus Kursi

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Login sebagai admin | - | Dashboard admin |
| 2. Klik menu Kelola Kursi | - | Daftar kursi |
| 3. Klik tombol Hapus pada kursi | KRS-001 | Muncul konfirmasi "Yakin hapus?" |
| 4. Klik Ya | - | Kursi hilang dari daftar |

---

## TC-KURSUS-04: Admin Lihat Daftar Kursi

| Langkah | Hasil yang Diharapkan |
|---------|----------------------|
| 1. Buka halaman Kelola Kursi | Semua kursi tampil dalam tabel |
| 2. Setiap kursi menampilkan | Kode, nama, kategori, harga, stok, berat, warna |

---

## TC-KURSUS-05: Admin Cari Kursi

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Klik kolom pencarian | - | Kursor aktif |
| 2. Ketik nama kursi | "Kantor" | Hanya kursi dengan kata "Kantor" yang muncul |

---

## TC-KURSUS-06: Admin Filter Kategori

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Klik filter kategori | "Kantor" | Hanya kursi kategori Kantor |
| 2. Klik filter kategori | "Rumah" | Hanya kursi kategori Rumah |
| 3. Klik filter kategori | "Taman" | Hanya kursi kategori Taman |
| 4. Klik Semua | - | Semua kursi muncul |
