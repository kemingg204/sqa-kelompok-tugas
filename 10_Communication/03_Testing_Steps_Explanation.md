# Penjelasan Setiap Langkah Pengujian di GitHub

---

## 1. White Box Testing

| No | Langkah | Penjelasan |
|----|---------|------------|
| 1 | **Desk Checking** | Pengecekan logika dan nilai variabel secara manual pada transaksi Cash |
| 2 | **Code Walkthrough** | Review kode `proses_transaksi.php` bersama tim |
| 3 | **Formal Inspection** | Pengecekan format dan kelengkapan data pada form tambah kursi |
| 4 | **Control Flow Testing** | Pengecekan alur percabangan IF-ELSE pada transaksi |
| 5 | **Data Flow Testing** | Pengecekan aliran data variabel (`$items`, `$bayar`, `$no_invoice`) |
| 6 | **Basic Path Testing** | Menentukan Flow Graph, V(G)=3, Region=3, 3 Independent Path |

---

## 2. Black Box Testing

| No | Langkah | Penjelasan |
|----|---------|------------|
| 1 | **Equivalence Partitioning** | Membagi input ke kelas valid dan invalid (jumlah 1-10 valid, 0 invalid) |
| 2 | **Boundary Value Analysis** | Menguji nilai batas (Min=1, Max=10, Max+1=11) |
| 3 | **Error Guessing** | Menguji SQL Injection, XSS, field kosong, karakter spesial |

---

## 3. Gray Box Testing

| No | Langkah | Penjelasan |
|----|---------|------------|
| 1 | **Orthogonal Array Testing** | Menguji kombinasi 3 metode pembayaran × 3 jumlah item = 9 test case |
| 2 | **Matrix Testing** | Menguji interaksi parameter pencarian kursi |
| 3 | **Regression Testing** | Memastikan fitur QRIS tidak merusak Cash/Debit |
| 4 | **Pattern Testing** | Eksplorasi bug (fungsional dasar, batasan, performa, UX) |

---

## 4. Komunikasi Tim

| No | Langkah | Penjelasan |
|----|---------|------------|
| 1 | **Issue Tracker** | Melaporkan bug melalui GitHub Issues |
| 2 | **Pull Request** | Review kode sebelum merge |
| 3 | **Branching** | Isolasi perbaikan bug di branch terpisah |
| 4 | **Regression Testing** | Menguji ulang setelah perbaikan |

---

**Semua langkah di atas telah didokumentasikan di repository GitHub `sqa-kelompok-tugas`.**
