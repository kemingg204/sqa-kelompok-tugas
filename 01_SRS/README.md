# Software Requirements Specification (SRS)
## CV Rofile Chetose - Sistem Penjualan Kursi

---

## DAFTAR ISI

1. Pendahuluan
2. Deskripsi Umum
3. Kebutuhan Fungsional
4. Kebutuhan Non-Fungsional
5. Spesifikasi REST API
6. Desain Database

---

## BAB 1: PENDAHULUAN

### 1.1 Tujuan Dokumen
Dokumen SRS ini mendefinisikan kebutuhan perangkat lunak **Sistem Informasi Manajemen Penjualan Kursi (CV Rofile Chetose)**.

### 1.2 Ruang Lingkup
Sistem ini adalah aplikasi berbasis web yang mengelola inventaris kursi, transaksi penjualan, laporan, dan 4 role pengguna.

### 1.3 Definisi Istilah

| Istilah | Definisi |
|---------|----------|
| SRS | Software Requirements Specification |
| CRUD | Create, Read, Update, Delete |
| Role | Hak akses (Admin, Manager, Kasir, Staff) |
| QRIS | Quick Response Code Indonesian Standard |

---

## BAB 2: DESKRIPSI UMUM

### 2.1 Fungsi Produk

| ID | Nama Fungsi | Deskripsi |
|----|-------------|-----------|
| F-01 | Manajemen Kursi | CRUD data kursi |
| F-02 | Manajemen Pengguna | Login dengan 4 role |
| F-03 | Transaksi Penjualan | Cash, Debit, QRIS |
| F-04 | Laporan & Grafik | Statistik penjualan |
| F-05 | Pencarian & Filter | Cari dan filter kursi |
| F-06 | Ekspor Data | Excel dan PDF |

### 2.2 Karakteristik Pengguna

| Role | Hak Akses |
|------|-----------|
| Admin | CRUD kursi, lihat semua transaksi |
| Manager | Lihat laporan, grafik, export data |
| Kasir | Input transaksi penjualan |
| Staff | Lihat stok kursi saja |

---

## BAB 3: KEBUTUHAN FUNGSIONAL

| ID | Nama | Prioritas |
|----|------|------------|
| F-01 | Login | Tinggi |
| F-02 | Logout | Tinggi |
| F-03 | Role-based Access | Tinggi |
| F-04 | Tampil Kursi | Tinggi |
| F-05 | Tambah Kursi | Tinggi |
| F-06 | Edit Kursi | Tinggi |
| F-07 | Hapus Kursi | Tinggi |
| F-08 | Transaksi Cash | Tinggi |
| F-09 | Transaksi Debit | Tinggi |
| F-10 | Transaksi QRIS | Tinggi |
| F-11 | Update Stok Otomatis | Tinggi |
| F-12 | Riwayat Penjualan | Sedang |
| F-13 | Grafik Penjualan | Rendah |
| F-14 | Export Excel | Rendah |
| F-15 | Export PDF | Rendah |

---

## BAB 4: KEBUTUHAN NON-FUNGSIONAL

| ID | Kebutuhan | Target |
|----|-----------|--------|
| NF-01 | Waktu respon API | < 3 detik |
| NF-02 | Responsive Design | Support HP & desktop |
| NF-03 | Validasi input | Tidak boleh kosong/harga negatif |
| NF-04 | Role-based Access | Halaman sesuai role |

---

## BAB 5: SPESIFIKASI REST API

| No | Endpoint | Method | Deskripsi |
|----|----------|--------|-----------|
| 1 | /api/api_tampil.php | GET | Menampilkan semua kursi |
| 2 | /api/api_tambah.php | POST | Menambah kursi |
| 3 | /api/api_edit.php | GET | Mengambil satu kursi |
| 4 | /api/api_ubah.php | POST | Mengubah kursi |
| 5 | /api/api_hapus.php | POST | Menghapus kursi |
| 6 | /api/api_search.php | GET | Mencari kursi |
| 7 | /api/api_filter.php | GET | Filter kursi |
| 8 | /api/api_statistik.php | GET | Statistik inventaris |

---

## BAB 6: DESAIN DATABASE

### Struktur Tabel

**Tabel: users**

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT | Primary Key |
| username | VARCHAR(50) | UNIQUE |
| password | VARCHAR(255) | NOT NULL |
| role | ENUM | admin/manager/kasir/staff |

**Tabel: kursi**

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT | Primary Key |
| kode_kursi | VARCHAR(20) | UNIQUE |
| nama_kursi | VARCHAR(100) | NOT NULL |
| harga | INT | NOT NULL |
| stok | INT | NOT NULL |

**Tabel: transaksi**

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | INT | Primary Key |
| no_invoice | VARCHAR(20) | UNIQUE |
| user_id | INT | Foreign Key |
| grand_total | INT | NOT NULL |
| payment_method | ENUM | cash/debit/qris |

---

**Dokumen ini bersumber dari SKPL CV Rofile Chetose**
