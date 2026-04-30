# Test Case - Modul Laporan & Grafik (Manager)

## TC-LAP-01: Login Manager Berhasil

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Buka halaman login | - | Form login tampil |
| 2. Input username | manager | Data masuk |
| 3. Input password | manager123 | Data masuk |
| 4. Klik Login | - | Masuk ke dashboard manager |

---

## TC-LAP-02: Menampilkan Grafik Penjualan

| Langkah | Hasil yang Diharapkan |
|---------|----------------------|
| 1. Login sebagai manager | Dashboard manager tampil |
| 2. Lihat halaman utama | Grafik penjualan muncul (Line Chart atau Bar Chart) |
| 3. Grafik menampilkan data | Sumbu X: tanggal, Sumbu Y: jumlah penjualan |

---

## TC-LAP-03: Filter Grafik Berdasarkan Periode

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Klik filter periode | Hari Ini | Grafik menampilkan data hari ini |
| 2. Klik filter periode | 7 Hari | Grafik menampilkan data 7 hari terakhir |
| 3. Klik filter periode | Bulan Ini | Grafik menampilkan data bulan ini |
| 4. Klik filter periode | Tahun Ini | Grafik menampilkan data tahun ini |

---

## TC-LAP-04: Menampilkan Total Pendapatan

| Langkah | Hasil yang Diharapkan |
|---------|----------------------|
| 1. Login sebagai manager | Dashboard tampil |
| 2. Lihat card total pendapatan | Angka total penjualan (Rp) tampil sesuai periode |

---

## TC-LAP-05: Menampilkan Total Transaksi

| Langkah | Hasil yang Diharapkan |
|---------|----------------------|
| 1. Lihat card total transaksi | Jumlah transaksi (berapa kali transaksi) tampil |

---

## TC-LAP-06: Menampilkan Rata-rata Penjualan

| Langkah | Hasil yang Diharapkan |
|---------|----------------------|
| 1. Lihat card rata-rata penjualan | Angka rata-rata penjualan per hari tampil |

---

## TC-LAP-07: Export Laporan ke Excel

| Langkah | Hasil yang Diharapkan |
|---------|----------------------|
| 1. Klik tombol Export Excel | File .xls atau .xlsx terdownload |
| 2. Buka file Excel | Data laporan sesuai dengan yang ditampilkan di web |

---

## TC-LAP-08: Export Laporan ke PDF

| Langkah | Hasil yang Diharapkan |
|---------|----------------------|
| 1. Klik tombol Export PDF | File .pdf terdownload |
| 2. Buka file PDF | Data laporan sesuai dan format rapi |

---

## TC-LAP-09: Filter Laporan Sebelum Export

| Langkah | Data | Hasil yang Diharapkan |
|---------|------|----------------------|
| 1. Pilih filter periode | Bulan Ini | Data bulan ini tampil |
| 2. Klik Export Excel | File Excel berisi data bulan ini |
| 3. Klik Export PDF | File PDF berisi data bulan ini |

---

## TC-LAP-10: Akses Manager Tidak Bisa Edit Kursi

| Langkah | Hasil yang Diharapkan |
|---------|----------------------|
| 1. Login sebagai manager | Tidak ada menu Kelola Kursi |
| 2. Coba akses URL /kelola-kursi manual | Muncul pesan "Akses ditolak" atau redirect ke dashboard |
